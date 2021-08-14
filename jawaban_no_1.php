<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ujian Akhir Paket 2</title>
</head>
<body>

    <form action="" method="GET">
        <div>
            <label>Baris</label> <br>
            <input name="baris" type="text" placeholder="Masukkan Baris">
        </div>
        <br>
        <div>
            <label>Kolom</label> <br>
            <input name="kolom" type="text" placeholder="Masukkan Kolom">
        </div>
        <br>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
    <br>

    
    <?php
    if ( isset($_GET['baris']) && isset($_GET['kolom'])) {
        $baris = $_GET['baris'];
        $kolom = $_GET['kolom'];

        if(isset($baris) && isset($kolom)) {

            echo "<table border=1>";

            for ($i = 1; $i <= $baris; $i++) {
                echo "<tr>";
                for ($j = 1; $j <= $kolom; $j++) {
                    echo "<td>202043579117</td>";
                }
                echo "</tr>";
            }

            echo "</table>";
        }
    }

?>
    
</body>
</html>