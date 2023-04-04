<?php 
    //memanggil file conn.php yang berisi koneski ke database
    //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
    include ('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Driver</title>
</head>
<body>

    <h2>TABLE DRIVER</h2>
        <div>
            <table border=1px>
                <thead bgcolor=silver>
                    <tr>
                        <th> <p>id_driver</th>
                        <th>nama</th>
                        <th>no_sim</th>
                        <th>alamat</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        //proses menampilkan data dari database:
                        //siapkan query SQL
                        $query = "SELECT * FROM driver";
                        $result = mysqli_query(connection(),$query);
                    ?>
                            
                    <?php while($data = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <td> <?php echo $data['id_driver']; ?> </td>
                            <td> <?php echo $data['nama']; ?> </td>
                            <td> <?php echo $data['no_sim']; ?> </td>
                            <td> <?php echo $data['alamat']; ?> </td>
                            <td>
                                <a href="<?php echo "createDriver.php?id_driver=".$data['id_driver'] ?>"> Create</a> &nbsp;&nbsp;
                                <a href="<?php echo "updateDriver.php?id_driver=".$data['id_driver'] ?>"> Update</a> &nbsp;&nbsp;
                                <a href="<?php echo "deleteDriver.php?id_driver=".$data['id_driver'] ?>"> Delete</a>
                            </td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>    
        </main>
    </div>
</div>
</body>
</html>