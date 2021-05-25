<?php
    session_start();
    require 'conn.php';
    if(isset($_SESSION['username']) && isset($_SESSION['idtv'])) {
        $idtv = $_SESSION['idtv'];
        $tensp = $_POST['tensp'];
        $chitietsp = $_POST['chitietsp'];
        $giasp = $_POST['giasp'];
        $duongdan = 'sanpham/'.$_FILES['hinhdaidien']['name'];

        // $con = new mysqli("localhost","id16220826_nhan","Pz@>i/z3O|mO6/NH","id16220826_buoi3");
        // $con->set_charset("utf8");
        $sql = "INSERT INTO sanpham(tensp,chitietsp, giasp, hinhanhsp, idtv)
                            values('$tensp','$chitietsp','$giasp','$duongdan','$idtv')";
        move_uploaded_file($_FILES['hinhdaidien']['tmp_name'],
                        $duongdan);
        
        $con->query($sql);
        $con->close();

        header("Location: ./danhsachsp.php");
    } else {
        echo "<p>Bạn chưa đăng nhập</p>";
    }
    
?>