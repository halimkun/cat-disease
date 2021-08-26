<?php 
    require_once('./fungsi.php');

    $fungsi = new Fungsi();
    
    if (isset($_POST['predict'])) {
        unset($_POST['predict']);
    
        $data = $fungsi->predict($_POST);
        if ($data['status'] == "success") {
            header('Location: ./result.php');
        } else {
            header('Location: ./predict.php');
        }

    }else {
        header('Location: ./index.php');
    }