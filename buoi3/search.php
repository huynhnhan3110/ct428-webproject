<?php
    session_start();
    $keyword = $_GET['keyword'];
    $idtv = $_SESSION['idtv'];
    require 'conn.php';
    $sql = "SELECT * FROM sanpham WHERE tensp LIKE '%".$keyword."%' AND idtv = '$idtv'";
    
    $result = $con->query($sql);
    $sothutu = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$sothutu++."</td>
        <td><div class='hiddenanhsp' id='anhsp".$row['idsp']."'>
        <img src='".$row['hinhanhsp']."'/></div>
        <span onmouseout='hienhinh(0)' onmouseover='hienhinh(".$row['idsp'].")'>".$row['tensp']."</span></td>

        <td>".number_format($row['giasp'])."(VND)</td>

        <td><a class='xemchitietbtn' href='#' onclick='xemchitiet(".$row['idsp'].")'>Xem chi tiết</a></td>

        <td><a href='./suasanpham.php?idsp=".$row['idsp']."'><img class='optionimg' alt='Lỗi ảnh' src='./icon/edit.png'></a></td>

        <td><a href='./xoasanpham.php?idsp=".$row['idsp']."'><img class='optionimg' alt='Lỗi ảnh' src='./icon/delete.png'></a></td>

        </tr>";
    }
?>