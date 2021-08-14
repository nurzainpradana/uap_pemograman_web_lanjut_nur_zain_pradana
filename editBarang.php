<?php

require_once('Koneksi.php');

$kode_barang = $_POST['kode_barang'];

$query = mysqli_query($conn, "SELECT * FROM table_barang WHERE kode_barang = '".$kode_barang."'") or die(mysqli_error($conn));

header('Content-Type: application/json');

if ($query) {
    
    $data = array(
        'kode_barang' => 'success',
        'data' => mysqli_fetch_assoc($query)
    );
    echo json_encode($data);

} else {

}


