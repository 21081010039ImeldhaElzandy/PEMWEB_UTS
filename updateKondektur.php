<?php
include ('koneksi.php');

$status = '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_kondektur'])) {
        //query untuk mengupdate data
        $id_kondektur_upd = $_GET['id_kondektur'];
        $query = "SELECT * FROM kondektur WHERE id_kondektur = '$id_kondektur_upd'";

        //eksekusi query
        $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kondektur = $_POST['id_kondektur'];
    $nama = $_POST['nama'];
    
    //query SQL
    $sql = "UPDATE kondektur SET id_kondektur='$id_kondektur', nama ='$nama'
    WHERE id_kondektur='$id_kondektur'";

    //eksekusi query
    $result = mysqli_query(connection(),$sql);
    if ($result) {
        $status = 'ok';
    }
    else {
        $status = 'err';
    }

    //redirect ke halaman lain
    header('Location: tabelKondektur.php?status='.$status);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE KONDEKTUR</title>
</head>
<body>
    <ul>
        <li>
            <a href="<?php echo "tabelKondektur.php"; ?>">TABEL KONDEKTUR</a>
        </li>
        <li>
            <a href="<?php echo "createKondektur.php"; ?>">CREATE KONDEKTUR</a>
        </li>
    </ul>

    <h2>UPDATE KONDEKTUR</h2>
    <form action="updateKondektur.php" method="POST">
        <?php while($data = mysqli_fetch_array($result)) : ?>
        <div class="form-group">
            <label>Id Kondektur</label>
            <input type="text" class="form-control" placeholder="Id Kondektur" name="id_kondektur" required="required">        
        </div>
    
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" placeholder="Nama" name="nama" required="required">
        </div>
        
        <?php endwhile; ?>

        <button type="submit">Update</button>
    </form>
</body>
</html>