<?php

require_once('Koneksi.php');

$kode_barang = $_POST['kode_barang'];


$query = mysqli_query($conn, "DELETE FROM table_barang WHERE kode_barang = '".$kode_barang."'") or die(mysqli_error($conn));

if ($query) {
    $data = array(
        'message' => "success",
    );
    
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    $data = array(
        'message' => "failed to delete data",
    );
    
    header('Content-Type: application/json');
    echo json_encode($data);
}

