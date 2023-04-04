<?php
include ('koneksi.php');

$status = '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_bus'])) {

    //mengambil data products yg akan dihapus
    $id_bus = $_GET['id_bus'];

    //query untuk menghapus data
    $query = "DELETE FROM bus WHERE id_bus = '$id_bus'";

    //eksekusi query
    $result = mysqli_query(connection(), $query);

    if($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }
          //redirect ke halaman lain
          header('Location: tabelBus.php?status='.$status);
      }  
  }
  