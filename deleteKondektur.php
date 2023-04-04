<?php
include ('koneksi.php');

$status = '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_kondektur'])) {

    //mengambil data products yg akan dihapus
    $id_kondektur = $_GET['id_kondektur'];

    //query untuk menghapus data
    $query = "DELETE FROM kondektur WHERE id_kondektur = '$id_kondektur'";

    //eksekusi query
    $result = mysqli_query(connection(), $query);

    if($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }
          //redirect ke halaman lain
          header('Location: tabelKondektur.php?status='.$status);
      }  
  }
  