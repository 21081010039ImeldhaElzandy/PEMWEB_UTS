<?php
include ('koneksi.php');

$status = '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_driver'])) {
        //query untuk mengupdate data
        $id_driver_upd = $_GET['id_driver'];
        $query = "SELECT * FROM driver WHERE id_driver = '$id_driver_upd'";

        //eksekusi query
        $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_driver = $_POST['id_driver'];
    $nama = $_POST['nama'];
    $no_sim = $_POST['no_sim'];
    $alamat = $_POST['alamat'];
    
    //query SQL
    $sql = "UPDATE driver SET id_driver='$id_driver', nama ='$nama', no_sim='$no_sim', alamat='$alamat'
    WHERE id_driver='$id_driver'";

    //eksekusi query
    $result = mysqli_query(connection(),$sql);
    if ($result) {
        $status = 'ok';
    }
    else {
        $status = 'err';
    }

    //redirect ke halaman lain
    header('Location: tabelDriver.php?status='.$status);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE BUS</title>
</head>
<body>
    <ul>
        <li>
            <a href="<?php echo "tabelDriver.php"; ?>">TABEL DRIVER</a>
        </li>
        <li>
            <a href="<?php echo "createDriver.php"; ?>">CREATE DRIVER</a>
        </li>
    </ul>

    <h2>UPDATE BUS</h2>
    <form action="updateDriver.php" method="POST">
        <?php while($data = mysqli_fetch_array($result)) : ?>
        <div class="form-group">
            <label>Id Driver</label>
            <input type="text" class="form-control" placeholder="Id Driver" name="id_driver" required="required">        
        </div>
    
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" placeholder="Nama" name="nama" required="required">
        </div>

        <div class="form-group">
            <label>No Sim</label>
            <input type="text" class="form-control" placeholder="No Sim" name="no_sim" required="required">
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" placeholder="Alamat" name="alamat" required="required">
        </div>

        <?php endwhile; ?>

        <button type="submit">Update</button>
    </form>
</body>
</html>