<?php require_once("./fungsi.php");

$fungsi = new Fungsi();
$db = $fungsi->database();

$data = $db->query("SELECT * FROM v_penyakit");
$data = $data->fetch_all();

function array_to_obj($array, &$obj)
{
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $obj->$key = new stdClass();
            array_to_obj($value, $obj->$key);
        } else {
            $obj->$key = $value;
        }
    }
    return $obj;
}

function arrayToObject($array)
{
    $object = new stdClass();
    return array_to_obj($array, $object);
}

$data = [
    'data' => $data
];

echo json_encode($data);