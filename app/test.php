<?php

use Rubix\ML\Classifiers\KNearestNeighbors;
use Rubix\ML\CrossValidation\Metrics\Accuracy;
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Datasets\Unlabeled;
use Rubix\ML\Extractors\CSV;
use Rubix\ML\Kernels\Distance\Euclidean;
use Rubix\ML\Transformers\LambdaFunction;

require_once('./../vendor/autoload.php');
require_once('./fungsi.php');

// ========== ========== ========== ========== //

$del = new Fungsi();
$knn = new KNearestNeighbors(3, false, new Euclidean());

// ========== ========== ========== ========== //

$file   = "./../data/data.csv";
$del    = $del->generateDelimiter($file, 5);
$header = true;

// ========== ========== ========== ========== //

$dataset = Labeled::fromIterator(new CSV($file, $header, $del));

$binarize = function (&$sample) {
    for ($i=0; $i < count($sample); $i++) { 
        $sample[$i] = $sample[$i] == "Yes" ? 1 : 0;
    }
};

$dataset->apply(new LambdaFunction($binarize));

// $testing = $dataset->randomize()->take(50);

$knn->train($dataset);

// ========== ========== ========== ========== //

$testing = [
    ["No", "No", "No", "No", "No", "No", "No", "No", "No", "No", "No", "No", "No", "No", "No", "No"],
    ["No", "No", "No", "No", "No", "No", "No", "No", "No", "No", "No", "No", "No", "No", "No", "No"],
    ["No", "No", "No", "No", "No", "No", "No", "No", "No", "No", "No", "No", "No", "No", "No", "No"],
];

$testing = Unlabeled::fromIterator($testing);
$testing->apply(new LambdaFunction($binarize));

$penyakit = $knn->predict($testing);

$accuracy = new Accuracy();
// $score = $accuracy->score($penyakit, $testing->labels());

var_dump($penyakit);
// echo "Akurasi : $score";