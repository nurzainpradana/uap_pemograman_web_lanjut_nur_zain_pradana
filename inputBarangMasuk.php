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


    <form id="formBarangMasuk" action="javascript:void(0)">
        <table style="border: 1px solid black;">
            <tr>
                <td colspan="3"><h3>INPUT BARANG MASUK</h3></td>
            </tr>
            <tr class="kode_barang">
                <td>Kode Barang Masuk</td>
                <td>:</td>
                <td>
                    <input type="text" name="kode_barang_masuk" id="kode_barang_masuk" required>
                </td>
            </tr>
            
            <tr class="kode_barang">
                <td>Kode Barang</td>
                <td>:</td>
                <td>
                    <select name="kode_barang" id="kode_barang" onchange="setNamaBarang(event.target)">
                        <option value="">-- Pilih Barang --</option>
                        <?php
                            include('Koneksi.php');

                            $query = mysqli_query($conn, "SELECT * FROM table_barang") or die(mysqli_error($conn));
                            $result = mysqli_fetch_array($query);

                            while($r = mysqli_fetch_array($query)) {
                        ?>
                        <option data-nama-barang="<?= $r['nama_barang'];?>" value="<?= $r['kode_barang'];?>"><?= $r['kode_barang'];?></option>
                        <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td>Nama Barang</td>
                <td>:</td>
                <td>
                    <input type="text" name="nama_barang" id="nama_barang" required readonly>
                </td>
            </tr>
            
            <tr>
                <td>Jumlah Barang Masuk</td>
                <td>:</td>
                <td>
                    <input type="text" name="jumlah_barang_masuk" id="jumlah_barang_masuk" required>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <button id="btn-simpan" href="javascript:void(0)" type="button" onclick="simpanBarang()">Simpan</button>
                    <button type="button" onclick="clearBarang()">Reset</button>
                </td>
            </tr>
        </table>
    </form>

    <br>

    <a  href="index.php"><center>Input Barang</center></a> <br>

    <hr>

    <div id="dataBarangMasuk" hidden>   
        <h3>Data Barang Masuk</h3>

        <table id="tableResult">
            <tr>
                <td>Kode Barang Masuk</td>
                <td>:</td>
                <td><bold><span id="dataKodeBarangMasuk" ></span></bold></td>
            </tr>
            <tr>
                <td>Kode Barang</td>
                <td>:</td>
                <td><bold><span id="dataKodeBarang"></span></bold></td>
            </tr>
            <tr>
                <td>Nama Barang</th>
                <td>:</td>
                <td><bold><span id="dataNamaBarang"></span></bold></td>
            </tr>
            
            <tr>
                <td>Jumlah Barang Masuk</td>
                <td>:</td>
                <td><bold><span id="dataJumlahBarangMasuk"></span></bold></td>
            </tr>    

        </table>
    </div>

    <script type="text/javascript">
        function clearBarang() {
            
            $("#kode_barang").val('');
            $("#kode_barang_masuk").val('');
            $("#nama_barang").val('');
            $("#jumlah_barang_masuk").val('');
        }

        function simpanBarang(){
            var kode_barang_masuk = $("#kode_barang_masuk").val();
            var kode_barang = $("#kode_barang").val();
            var nama_barang = $("#nama_barang").val();
            var jumlah_barang_masuk = $("#jumlah_barang_masuk").val();

            if(kode_barang_masuk == '' ||kode_barang == '' || nama_barang == '' || jumlah_barang_masuk == '' ) {
                alert('Data Belum Lengkap');
            } else {
                let _url = "simpanBarangMasuk.php";

                $.ajax({
                    url: _url,
                    type: "POST",
                    data: $("#formBarangMasuk").serialize(),
                    success: function(response) {
                        if(response.message == 'success') {
                            // location.reload();
                            $("#dataBarangMasuk").removeAttr('hidden');

                            $("#dataKodeBarangMasuk").html(kode_barang_masuk);
                            $("#dataKodeBarang").html(kode_barang);
                            $("#dataNamaBarang").html(nama_barang);
                            $("#dataJumlahBarangMasuk").html(jumlah_barang_masuk);
                        } else {
                            alert(response.message);
                        }
                    }
                });
            }
        }

        function setNamaBarang(event){
            var nama_barang = $("#kode_barang option:selected").attr('data-nama-barang');

            console.log(nama_barang);

            $("#nama_barang").val(nama_barang);

        }
    </script>
</body>
</html>