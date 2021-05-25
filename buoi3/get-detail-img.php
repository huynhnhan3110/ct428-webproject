<?php
    $idsp = $_GET['idsp'];
    require 'conn.php';
    $sql = "SELECT hinhanhsp FROM sanpham WHERE idsp= '".$idsp."'";

    $result = $con->query($sql);
    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo "<img class='anhchitiet' src='".$row['hinhanhsp']."' alt='lỗi ảnh'>";
    }
?>