<?php
    require 'conn.php';
    if(isset($_GET['idsp'])) {
        $id = $_GET['idsp'];
        // $con = new mysqli("localhost","id16220826_nhan","Pz@>i/z3O|mO6/NH","id16220826_buoi3");

        $sql = "DELETE FROM sanpham WHERE idsp ='$id'";
        $result = $con->query($sql);
        header("Location: ./danhsachsp.php");
        $con->close();
        
    }
?>