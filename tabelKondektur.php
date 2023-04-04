<?php 
    //memanggil file conn.php yang berisi koneski ke database
    //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
    include ('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kondektur</title>
</head>
<body>

    <h2>TABLE KONDEKTUR</h2>
        <div>
            <table border=1px>
                <thead bgcolor=silver>
                    <tr>
                        <th> <p>id_kondektur</th>
                        <th>nama</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        //proses menampilkan data dari database:
                        //siapkan query SQL
                        $query = "SELECT * FROM kondektur";
                        $result = mysqli_query(connection(),$query);
                    ?>
                            
                    <?php while($data = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <td> <?php echo $data['id_kondektur']; ?> </td>
                            <td> <?php echo $data['nama']; ?> </td>
                            <td>
                                <a href="<?php echo "createKondektur.php?id_kondektur=".$data['id_kondektur'] ?>"> Create</a> &nbsp;&nbsp;
                                <a href="<?php echo "updateKondektur.php?id_kondektur=".$data['id_kondektur'] ?>"> Update</a> &nbsp;&nbsp;
                                <a href="<?php echo "deleteKondektur.php?id_kondektur=".$data['id_kondektur'] ?>"> Delete</a>
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