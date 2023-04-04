<?php
include ('koneksi.php');

$status = '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_bus'])) {
        //query untuk mengupdate data
        $id_bus_upd = $_GET['id_bus'];
        $query = "SELECT * FROM bus WHERE id_bus = '$id_bus_upd'";

        //eksekusi query
        $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_bus = $_POST['id_bus'];
    $plat = $_POST['plat'];
    $status = $_POST['status'];
    
    //query SQL
    $sql = "UPDATE bus SET id_bus='$id_bus', plat ='$plat', status='$status'
    WHERE id_bus='$id_bus'";

    //eksekusi query
    $result = mysqli_query(connection(),$sql);
    if ($result) {
        $status = 'ok';
    }
    else {
        $status = 'err';
    }

    //redirect ke halaman lain
    header('Location: tabelBus.php?status='.$status);
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
            <a href="<?php echo "tabelBus.php"; ?>">TABEL BUS</a>
        </li>
        <li>
            <a href="<?php echo "createBus.php"; ?>">CREATE BUS</a>
        </li>
    </ul>

    <h2>UPDATE BUS</h2>
    <form action="updateBus.php" method="POST">
        <?php while($data = mysqli_fetch_array($result)) : ?>
        <div class="form-group">
            <label>Id Bus</label>
            <input type="text" class="form-control" placeholder="Id Bus" name="id_bus" required="required">        
        </div>
    
        <div class="form-group">
            <label>Plat</label>
            <input type="text" class="form-control" placeholder="Plat" name="plat" required="required">
        </div>

        <div class="form-group">
            <label>Status</label>
            <input type="text" class="form-control" placeholder="Status" name="status" required="required">
        </div>

        <?php endwhile; ?>

        <button type="submit">Update</button>
    </form>
</body>
</html>