<?php

use Rubix\ML\Classifiers\KNearestNeighbors;
use Rubix\ML\CrossValidation\Metrics\Accuracy;
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Datasets\Unlabeled;
use Rubix\ML\Kernels\Distance\Euclidean;
use Rubix\ML\Transformers\LambdaFunction;

require_once("./../vendor/autoload.php");

class Fungsi
{
    private $file;
    private $delimiters;
    private $results = [];

    // database config
    private $host = "localhost";
    private $user = "root";
    private $pass = "root";
    private $base = "kucing";

    private $database;

    public function __construct()
    {
        $this->database = $this->database();
    }

    public function database()
    {
        $db = new Mysqli($this->host, $this->user, $this->pass, $this->base);

        // cek koneksi
        if ($db->connect_error) {
            die("Koneksi Database Bermasalah");
        }

        return $db;
    }

    public function predict($datatest)
    {

        $token_testing = uniqid();
        setcookie("history", $token_testing, time() + (3600 * 24 * 2));

        $result = [];

        $data = $this->database->query("SELECT * FROM dataset");
        $data = $data->fetch_all(MYSQLI_ASSOC);

        $dataset = Labeled::fromIterator($data);
        $dataset = $this->yesOrNo($dataset);

        $kucingName = $datatest['namaKucing'];
        unset($datatest['namaKucing']);
        $namaanda   = $datatest['namaanda'];
        unset($datatest['namaanda']);
        $k          = $datatest['k'];
        unset($datatest['k']);

        $knn = new KNearestNeighbors($k, false, new Euclidean());
        $knn->train($dataset);

        if ($knn->trained()) {
            $newdatatest = [$this->removeKeys($datatest)];
            $newdatatest = new Unlabeled($newdatatest);
            $newdatatest = $this->yesOrNo($newdatatest);

            $now = date('Y/d/m|H:i:s');

            $sql = "INSERT INTO testing_history VALUES 
            (null, '$token_testing', '$namaanda', '$kucingName', '" . json_encode($datatest) . "', '" . $knn->predict($newdatatest)[0] . "', '$now');";

            $this->database->query($sql);

            $result = [
                "status" => "success",
                "body" => [
                    "penyakit" => $knn->predict($newdatatest)[0],
                    "datatesting" => $datatest
                ]
            ];
        } else {
            $result = [
                "status" => "error",
            ];
        }

        return $result;
    }

    public function getAkurasi($post)
    {
        $result = [];

        $data = $this->database->query("SELECT * FROM dataset");
        $data = $data->fetch_all();

        $training = Labeled::fromIterator($data);
        $testing = $training->randomize()->take($post['dataTesting']);

        $training = $this->yesOrNo($training);
        $testing  = $this->yesOrNo($testing);

        $estimator = new KNearestNeighbors($post['k'], false, new Euclidean());
        $estimator->train($training);

        if ($estimator->trained()) {
            $predictions = $estimator->predict($testing);

            $metric = new Accuracy();

            $result = [
                "dataTesting"   => $post['dataTesting'],
                "dataTrain"     => count($training),
                "k"             => $post['k'],
                "score"         => $metric->score($predictions, $testing->labels())
            ];
        }

        return $result;
    }

    public function yesOrNo($dataset)
    {
        $binarize = function (&$sample) {
            for ($i = 0; $i < count($sample); $i++) {
                $sample[$i] = (strtolower($sample[$i]) == "yes") ? 1 : ((strtolower($sample[$i]) == "no") ? 0 : null);
            }
        };

        return $dataset->apply(new LambdaFunction($binarize));
    }

    public function generateDelimiter($f, $cl)
    {
        $this->file = new SplFileObject($f);
        $this->delimiters = array(',', '\t', ';', '|', ':');

        $i = 0;

        while ($this->file->valid() && $i <= $cl) {
            $line = $this->file->fgets();
            foreach ($this->delimiters as $delimiter) {
                $regExp = '/[' . $delimiter . ']/';
                $fields = preg_split($regExp, $line);
                if (count($fields) > 1) {
                    if (!empty($this->results[$delimiter])) {
                        $this->results[$delimiter]++;
                    } else {
                        $this->results[$delimiter] = 1;
                    }
                }
            }
            $i++;
        }

        /* Lash Check
            * check if delimiter not listed on $this->delimiters
            * @return string delimiter
            */
        if (!empty($this->results)) {
            $this->results = array_keys($this->results, max($this->results));
        } else {
            $this->results = [[
                'error' => "error",
                'code'  => "delimiter invalid"
            ]];
        }
        return $this->results[0];
    }

    public function removeKeys(array $array)
    {
        $array = array_values($array);
        foreach ($array as &$value) {
            if (is_array($value)) {
                $value = $this->removeKeys($value);
            }
        }
        return $array;
    }
}
