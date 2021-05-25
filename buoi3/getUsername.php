<?php
    $username = $_GET['username'];
    require 'conn.php';
    $sql = "SELECT * FROM thanhvien WHERE tendangnhap = '".$username."'";
    $result = $con->query($sql);
    if($result->num_rows == 1) {
        echo "Tên đăng nhập đã tồn tại";
    } else {
        echo "Tên đăng nhập có thể sử dụng";
    }
?>