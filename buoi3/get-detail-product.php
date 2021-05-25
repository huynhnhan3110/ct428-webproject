<?php
    // buoc1: lay du lieu ve
    $idsp = $_GET['idsp'];

    // buoc2: ket noi csdl
    require 'conn.php';

    // buoc3: viet cau lenh sql
    $sql = "SELECT * FROM sanpham WHERE idsp= '".$idsp."'";

    // buoc4: truy van & xu ly
    $result = $con->query($sql);
    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo "<table class='bangct'>";
            echo "<i class='fa fa-times exitbangct' onclick='xemchitiet(0)' aria-hidden='true'></i>";
            echo "<tr><td><img class='anhchitiet' src='".$row['hinhanhsp']."'></td>";
            echo "<td class='fullwidth'><div class='info'><h2 class='tensp'>".$row['tensp']."</h2>";
            echo "<p class='giasp'>".number_format($row['giasp'])."<sup>đ</sup></p>";
            echo "<p class='chitietsp'>".$row['chitietsp']."</p></div></td></tr>";
        echo "</table>";
    }

    // buoc5: dong csdl
    $con->close();
?>