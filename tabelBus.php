<?php 
    //memanggil file conn.php yang berisi koneski ke database
    //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
    include ('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bus</title>

    <style>
        .hijau{
            background-color : green;
        }
        .kuning{
            background-color : yellow;
        }
        .merah{
            background-color : red;
        }
    </style>
</head>
<body>

    <h2>TABLE BUS</h2>
        <div>
            <table border=1px>
                <thead bgcolor=silver>
                    <tr>
                        <th> <p>id_bus</th>
                        <th>plat</th>
                        <th>status</th>
                        <th>jumlah km</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //filter status bus
                        $status = "";
                        if(isset($_GET['status'])) {
                            $status = $_GET['status'];
                            if($status == "semua") {
                              $query = "SELECT bus.id_bus, bus.plat, bus.status, SUM(trans_upn.jumlah_km) as jumlah_km FROM bus LEFT JOIN trans_upn ON bus.id_bus = trans_upn.id_bus GROUP BY bus.id_bus ORDER BY status ASC";
                            } else {
                              $query = "SELECT bus.id_bus, bus.plat, bus.status, SUM(trans_upn.jumlah_km) as jumlah_km FROM bus LEFT JOIN trans_upn ON bus.id_bus = trans_upn.id_bus WHERE status = '$status' GROUP BY bus.id_bus";
                            }
                          } else {
                            $query = "SELECT bus.id_bus, bus.plat, bus.status, SUM(trans_upn.jumlah_km) as jumlah_km FROM bus LEFT JOIN trans_upn ON bus.id_bus = trans_upn.id_bus GROUP BY bus.id_bus";
                          }
                          $result = mysqli_query(connection(),$query);
                    ?>         
                    
                    <form method="get">
                        <div class = "form-group">
                            <label for="status">Filter Status Bus :</label>
                            <select class = "form-control" id = "status" name="status" onchange="this.form.submit()">
                                <option value="semua" <?php if($status == 'semua') echo 'selected="selected"'; ?>>Semua</option>
                                <option value="0" <?php if($status == '0') echo 'selected="selected"'; ?>>0</option>
                                <option value="1" <?php if($status == '1') echo 'selected="selected"'; ?>>1</option>
                                <option value="2" <?php if($status == '2') echo 'selected="selected"'; ?>>2</option>
                            </select>
                        </div>
                    </form>    
                            
                    <?php while($data = mysqli_fetch_array($result)) : ?>
                        <tr class="<?php echo $data['status'] == 1 ? 'hijau' : ($data['status'] == 2 ? 'kuning' : 'merah') ?>">
                            <td> <?php echo $data['id_bus']; ?> </td>
                            <td> <?php echo $data['plat']; ?> </td>
                            <td> <?php echo $data['status']; ?> </td>
                            <td> <?php echo $data['jumlah_km']; ?> </td>
                            <td>
                                <a href="<?php echo "createBus.php?id_bus=".$data['id_bus'] ?>"> Create</a> &nbsp;&nbsp;
                                <a href="<?php echo "updateBus.php?id_bus=".$data['id_bus'] ?>"> Update</a> &nbsp;&nbsp;
                                <a href="<?php echo "deleteBus.php?id_bus=".$data['id_bus'] ?>"> Delete</a>
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