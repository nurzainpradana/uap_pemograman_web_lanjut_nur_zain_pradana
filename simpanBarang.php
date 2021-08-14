<?php

require_once('Koneksi.php');

$kode_barang = $_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$harga_barang = $_POST['harga_barang'];
$jumlah_barang = $_POST['jumlah_barang'];


$query = mysqli_query($conn, "SELECT * FROM table_barang WHERE kode_barang = '".$kode_barang."'") or die(mysqli_error($conn));

// print_r(mysqli_fetch_lengths($query));
if(mysqli_num_rows($query) > 0) {
    $data = array(
        'message' => "Kode Barang Sudah Terdaftar",
        );
        
        header('Content-Type: application/json');
        echo json_encode($data);
} else {

    $query = mysqli_query($conn, "INSERT INTO table_barang VALUES ('$kode_barang', '$nama_barang', '$harga_barang', '$jumlah_barang')") or die(mysqli_error($conn));

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

