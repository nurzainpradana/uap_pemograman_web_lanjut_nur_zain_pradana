<?php

require_once('Koneksi.php');

$kode_barang = $_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$harga_barang = $_POST['harga_barang'];
$jumlah_barang = $_POST['jumlah_barang'];


$query = mysqli_query($conn, "UPDATE table_barang SET 
    nama_barang = '$nama_barang', 
    harga_barang = '$harga_barang',
    jumlah_barang = '$jumlah_barang'
    WHERE kode_barang = '$kode_barang'") or die(mysqli_error($conn));

if ($query) {
    $data = array(
        'message' => "success",
    );
    
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    $data = array(
        'message' => "failed to save data",
    );
    
    header('Content-Type: application/json');
    echo json_encode($data);
}

