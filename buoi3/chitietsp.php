<?php session_start(); 
    if(!isset($_SESSION['username'])) {
        header("Location: ./dangnhap.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style-chitiet.css">
</head>
<body>
    <div class="container ctsp">
    <h3 class='hello'>Chi tiết sản phẩm</h3>
    <table border='1' class='bangds'>
        <?php
                require 'conn.php';
                $idsp = $_GET['idsp'];
                // $con = new mysqli("localhost","id16220826_nhan","Pz@>i/z3O|mO6/NH","id16220826_buoi3");
                $sql = "SELECT * FROM sanpham WHERE idsp='$idsp'";
                $result = $con->query($sql);
                $row = $result->fetch_assoc();
                echo "<tr><td><img class='anhchitiet' src='".$row['hinhanhsp']."'></td>";
                echo "<td><div class='info'><h2 class='tensp'>".$row['tensp']."</h2>";
                echo "<p class='giasp'>".$row['giasp']."<sup>đ</sup></p>";
                echo "<p class='chitietsp'>".$row['chitietsp']."</p></div></td></tr>";
                echo "<tr><td colspan='2'><a href='./danhsachsp.php' class='dangxuat_btn'>Trở về danh sách</a></td></tr>";
                $con->close();
        ?>
    </table>
    </div>
</body>
</html>