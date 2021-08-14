<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAP 2 - PEMOGRAMAN WEB LANJUT</title>
</head>
<style>
    body {
        margin: auto;
        width: 50%;
    }

    h3 {
        text-align: center;
    }

    table {
        margin: auto;
        border-collapse: collapse;
    }

    table th, td {
        padding:10px;
    }
</style>

<script src="js/jquery-3.6.0.min.js"></script>
<body>

    <h3>UAP 2 - Pemograman Web Lanjut</h3>


    <form id="formBarang" action="javascript:void(0)">
        <table style="border: 1px solid black;">
            <tr>
                <td colspan="3"><h3>TABLE BARANG</h3></td>
            </tr>
            <tr class="kode_barang">
                <td>Kode Barang</td>
                <td>:</td>
                <td>
                    <input type="text" name="kode_barang" id="kode_barang" required>
                </td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td>:</td>
                <td>
                    <input type="text" name="nama_barang" id="nama_barang" required>
                </td>
            </tr>
            <tr>
                <td>Harga Barang</td>
                <td>:</td>
                <td>
                    <input type="number" name="harga_barang" id="harga_barang" required>
                </td>
            </tr>
            <tr>
                <td>Jumlah Barang</td>
                <td>:</td>
                <td>
                    <input type="text" name="jumlah_barang" id="jumlah_barang" required>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <button id="btn-simpan" href="javascript:void(0)" type="button" onclick="simpanBarang()">Simpan</button>
                    <button id="btn-simpan-update" href="javascript:void(0)" type="button" onclick="simpanUpdateBarang()" hidden>Simpan Update</button>
                    <button type="button" onclick="clearBarang()">Reset</button>
                </td>
            </tr>
        </table>
    </form>

    <br>

    <a  href="inputBarangMasuk.php"><center>Input Barang Masuk</center></a> <br>

    <hr>

  

        <?php
            include('Koneksi.php');

            $query = mysqli_query($conn, "SELECT * FROM table_barang") or die(mysqli_error($conn));
            $result = mysqli_fetch_array($query);?>
            
        <table border="1">
        <tr>
            <th>#</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga Barang</th>
            <th>Jumlah Barang</th>
            <th>Action</th>
        
        </tr>
            
            <?php

            // print_r($result);
            $no = 0;

            while($r = mysqli_fetch_array($query)) {
            $no++;
                

        ?>

        <tr>
            <td><?= $no;?></td>
            <td><?= $r['kode_barang'];?></td>
            <td><?= $r['nama_barang'];?></td>
            <td><?= $r['harga_barang'];?></td>
            <td><?= $r['jumlah_barang'];?></td>
            <td>
                <a href="javascript:void(0)" data-barang="<?= $r['kode_barang']; ?>" onclick="editBarang(event.target)">Edit</a> |
                <a href="javascript:void(0)" data-kode-barang="<?= $r['kode_barang']; ?>" onclick="hapusBarang(event.target)">Hapus</a> 
            </td>
        
        </tr>

        <?php 
            }
        ?>

    </table>

    <script type="text/javascript">
        function clearBarang() {
            
            $('#kode_barang').removeAttr('readonly');
            $('#btn-simpan-update').attr('hidden', 'hidden');
            $('#btn-simpan').removeAttr('hidden');

            $("#kode_barang").val('');
            $("#nama_barang").val('');
            $("#harga_barang").val('');
            $("#jumlah_barang").val('');
        }

        function editBarang(event) {
            $('#kode_barang').attr('readonly', 'readonly');
            $('#btn-simpan').attr('hidden', 'hidden');
            $('#btn-simpan-update').removeAttr('hidden');

            var kode_barang = $(event).data("barang")

            $("#kode_barang").val(kode_barang);

            let _url = "editBarang.php";

            $.ajax({
                url: _url,
                type: "POST",
                data: {
                    kode_barang: kode_barang
                },
                success: function(response) {
                    if(response) {
                        $("#nama_barang").val(response.data.nama_barang);
                        $("#harga_barang").val(response.data.harga_barang);
                        $("#jumlah_barang").val(response.data.jumlah_barang);
                        $("#alamat").val(response.alamat);
                    }
                }
            });
        }

        function simpanBarang(){
            var kode_barang = $("#kode_barang").val();
            var nama_barang = $("#nama_barang").val();
            var harga_barang = $("#harga_barang").val();
            var jumlah_barang = $("#jumlah_barang").val();

            if(kode_barang == '' || nama_barang == '' || harga_barang == '' || jumlah_barang == '' ) {
                alert('Data Belum Lengkap');
            } else {
                let _url = "simpanBarang.php";

                $.ajax({
                    url: _url,
                    type: "POST",
                    data: $("#formBarang").serialize(),
                    success: function(response) {
                        if(response.message == 'success') {
                            location.reload();
                        } else {
                            alert(response.message);
                        }
                    }
                });
            }
        }

        function simpanUpdateBarang(){
            var kode_barang = $("#kode_barang").val();
            var nama_barang = $("#nama_barang").val();
            var harga_barang = $("#harga_barang").val();
            var jumlah_barang = $("#jumlah_barang").val();

            if(kode_barang == '' || nama_barang == '' || harga_barang == '' || jumlah_barang == '' ) {
                alert('Data Belum Lengkap');
            } else {
                let _url = "simpanUpdateBarang.php";

                $.ajax({
                    url: _url,
                    type: "POST",
                    data: $("#formBarang").serialize(),
                    success: function(response) {
                        if(response.message == 'success') {
                            location.reload();
                        } else {
                            alert(response.message);
                        }
                    }
                });
            }
        }

        function hapusBarang(event){
            var kode_barang = $(event).data("kode-barang");

            let _url = "hapusBarang.php";

                $.ajax({
                    url: _url,
                    type: "POST",
                    data: {
                        kode_barang: kode_barang
                    },
                    success: function(response) {
                        if(response.message == 'success') {
                            location.reload();
                        } else {
                            alert(response.message);
                        }
                    }
                });

        }
    </script>
</body>
</html>