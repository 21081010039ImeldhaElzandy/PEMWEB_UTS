<?php 
include ('koneksi.php');

$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kondektur = $_POST['id_kondektur'];
    $nama = $_POST['nama'];

    //query untuk menambah data
    $query = "INSERT INTO kondektur (id_kondektur, nama) 
        VALUES ('$id_kondektur', '$nama')";

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
    <title>CREATE KONDEKTUR</title>
</head>
<body>
    <ul>
        <li>
            <a href="<?php echo "tabelKondektur.php"; ?>">TABEL KONDEKTUR</a>
        </li>        
    </ul>

    <main role="main">
    <?php 
        if ($status=='ok') {
            echo '<br><div>Data kondektur berhasil disimpan </div>';
        } elseif ($status=='err') {
            echo '<br><div>Data kondektur gagal disimpan</div>';
        }
    ?>

    <h2>CREATE KONDEKTUR</h2>
    <form action="createKondektur.php" method = "POST">
    <div class="form-group">
        <label>Id Kondektur </label>
        <input type="text" class="form-control" placeholder="Id Kondektur" name="id_kondektur" required="required">        
    </div>
    
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" placeholder="Nama" name="nama" required="required">
    </div>
    
    <button type="submit" class="btn btn-primary">Create</button>
    </form>        
    </main>

</body>
</html>