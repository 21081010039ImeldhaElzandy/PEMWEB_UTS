<?php
include ('koneksi.php');

$status = '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_driver'])) {

    //mengambil data products yg akan dihapus
    $id_driver = $_GET['id_driver'];

    //query untuk menghapus data
    $query = "DELETE FROM driver WHERE id_driver = '$id_driver'";

    //eksekusi query
    $result = mysqli_query(connection(), $query);

    if($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }
          //redirect ke halaman lain
          header('Location: tabelDriver.php?status='.$status);
      }  
  }
  