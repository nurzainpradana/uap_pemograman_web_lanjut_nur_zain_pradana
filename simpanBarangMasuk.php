<?php

require_once('Koneksi.php');

$kode_barang_masuk = $_POST['kode_barang_masuk'];
$kode_barang = $_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$jumlah_barang_masuk = $_POST['jumlah_barang_masuk'];


$query = mysqli_query($conn, "SELECT * FROM table_barang_masuk WHERE kode_barang_masuk = '".$kode_barang_masuk."'") or die(mysqli_error($conn));

// print_r(mysqli_fetch_lengths($query));
if(mysqli_num_rows($query) > 0) {
    $data = array(
        'message' => "Kode Barang Masuk Sudah Terdaftar",
        );
        
        header('Content-Type: application/json');
        echo json_encode($data);
} else {

    $query = mysqli_query($conn, "INSERT INTO table_barang_masuk VALUES ('$kode_barang_masuk', '$kode_barang', '$nama_barang', '$jumlah_barang_masuk')") or die(mysqli_error($conn));

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
}

