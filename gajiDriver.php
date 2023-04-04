<?php 
    //memanggil file conn.php yang berisi koneski ke database
    //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
    include ('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAJI DRIVER</title>
</head>
<body>
    <ul>
        <li>
            <a href="<?php echo "tabelDriver.php"; ?>">TABEL DRIVER</a>
        </li>
    </ul>

    <div>
        <h2>Gaji Driver</h2>
    </div>

    <form action="" method="post">
        <label for="bulan">Pilih Bulan</label>
        <select name="bulan" id="bulan">
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select>
        <button type = "submit">Submit</button>
    </form>

    <table border=1px>
        <thead bgcolor="silver">
            <tr>
                <th>id_driver</th>
                <th>nama</th>
                <th>no_sim</th>
                <th>alamat</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php
                if (isset($_POST['bulan'])) {
                    $bulan = $_POST['bulan'];
                } else {
                      $bulan = "01";
                }
            ?>

            <h2>GAJI DRIVER BULAN KE - <?php echo $bulan ?></h2>
            <?php
                $query = "SELECT driver.id_driver, driver.nama, SUM(trans_upn.jumlah_km) as total_km
                FROM driver
                JOIN trans_upn ON driver.id_driver = trans_upn.id_driver
                WHERE MONTH(trans_upn.tanggal) = '$bulan' AND YEAR(trans_upn.tanggal) = YEAR(CURRENT_DATE())
                GROUP BY driver.id_driver";

                $result = mysqli_query(connection(), $query);
                if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

            ?>

            <tr>
                <td><?php echo $row['id_driver']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['total_km']; ?></td>
                <td><?php echo "Rp ".$row['total_km']*3000; ?></td>
            </tr>

            <?php
                }
                mysqli_free_result($result);
                } else {        
                    echo "Tidak ada data";
                } mysqli_close(connection());
            ?>
        </tbody>
    </table>
</body>
</html>