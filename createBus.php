<?php 
include ('koneksi.php');

$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_bus = $_POST['id_bus'];
    $plat = $_POST['plat'];
    $status = $_POST['status'];

    //query untuk menambah data
    $query = "INSERT INTO bus (id_bus, plat, status) 
        VALUES ('$id_bus', '$plat', '$status')";

    //eksekusi query
    $result = mysqli_query(connection(), $query);
    if($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE BUS</title>
</head>
<body>
    <ul>
        <li>
            <a href="<?php echo "tabelBus.php"; ?>">TABEL BUS</a>
        </li>        
    </ul>

    <main role="main">
    <?php 
        if ($status=='ok') {
            echo '<br><div>Data trans_upn berhasil disimpan </div>';
        } elseif ($status=='err') {
            echo '<br><div>Data trans_upn gagal disimpan</div>';
        }
    ?>

    <h2>CREATE BUS</h2>
    <form action="createBus.php" method = "POST">
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

    <button type="submit" class="btn btn-primary">Create</button>
    </form>        
    </main>

</body>
</html>