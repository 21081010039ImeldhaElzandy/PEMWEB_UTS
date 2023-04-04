<?php 
include ('koneksi.php');

$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_driver = $_POST['id_driver'];
    $nama = $_POST['nama'];
    $no_sim = $_POST['no_sim'];
    $alamat = $_POST['alamat'];

    //query untuk menambah data
    $query = "INSERT INTO driver (id_driver, nama, no_sim, alamat) 
        VALUES ('$id_driver', '$nama', '$no_sim', '$alamat')";

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
    <title>CREATE DRIVER</title>
</head>
<body>
    <ul>
        <li>
            <a href="<?php echo "tabelBus.php"; ?>">TABEL DRIVER</a>
        </li>        
    </ul>

    <main role="main">
    <?php 
        if ($status=='ok') {
            echo '<br><div>Data driver berhasil disimpan </div>';
        } elseif ($status=='err') {
            echo '<br><div>Data driver gagal disimpan</div>';
        }
    ?>

    <h2>CREATE DRIVER</h2>
    <form action="createDriver.php" method = "POST">
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

    <button type="submit" class="btn btn-primary">Create</button>
    </form>        
    </main>

</body>
</html>