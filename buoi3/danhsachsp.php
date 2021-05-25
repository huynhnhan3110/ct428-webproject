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

    <title>Danh sách sản phẩm</title>
	<link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/style-dssp.css">

    <link rel="stylesheet" href="./css/reset.css">

    <script>
        function xemchitiet(idsp) {
            var bangchitiet = document.getElementById("bangchitiet");
            if(idsp == 0) {
                bangchitiet.innerHTML = '';
            } else { 
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        bangchitiet.innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","get-detail-product.php?idsp="+idsp,true);
                xmlhttp.send();
            }
        }
        function hienhinh(idsp) {
            var wrapImg = document.getElementsByClassName('hiddenanhsp');
            
            if(idsp == 0) {
                for(var i = 0; i<wrapImg.length; i++) {
                    wrapImg[i].style.display = 'none';
                }
                
            } else {
                var idhinhsp = 'anhsp'+idsp;
                var popupImg = document.getElementById(idhinhsp);
                popupImg.style.display = 'block';
            
            }
        }
        function timkiem(keyword){
            var tbody = document.getElementById("tableBody");
            if(keyword == "" || keyword == null) {
                keyword = " ";
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    tbody.innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET","search.php?keyword="+keyword,true);
            xmlhttp.send();
        }
    </script>
</head>

<body>
   
    <?php
           
            require 'conn.php';

            $tendangnhap = $_SESSION['username'];

            $idtv = $_SESSION['idtv'];

            // $con = new mysqli("localhost","id16220826_nhan","Pz@>i/z3O|mO6/NH","id16220826_buoi3");

            $sql = "SELECT * FROM sanpham WHERE idtv='$idtv'";

            $result = $con->query($sql);

            echo "<h3 class='headerxinchao'>Chào bạn ".$tendangnhap."!</h3>";

            echo "<div class='container'>";

            echo "<p class='danhsachsp_desc'>Danh sách sản phẩm của bạn</p>";
            
            echo "<input type='text' onkeyup='timkiem(this.value)' id='inputSearch' placeholder='Nhập sản phẩm cần tìm'>
                  ";
            echo "<table border='1' class='bangds' id='tableDs'>";
            echo "<thead>";
            echo "<tr>

                    <th>STT</th>

                    <th>Tên sản phẩm</th>

                    <th>Giá sản phẩm</th>

                    <th colspan='3'>Lựa chọn</th>

                </tr>";
            echo "</thead>";
            echo "<tbody id='tableBody'>";
            $sothutu = 1;
            while($row = $result->fetch_assoc()){
                // <td><a class='xemchitietbtn' href='./chitietsp.php?idsp=".$row['idsp']."'>Xem chi tiết</a></td>
                echo "<tr>

                    <td>".$sothutu++."</td>

                    <td><div class='hiddenanhsp' id='anhsp".$row['idsp']."'>
                    <img src='".$row['hinhanhsp']."'/></div>
                    <span onmouseout='hienhinh(0)' onmouseover='hienhinh(".$row['idsp'].")'>".$row['tensp']."</span></td>
                    
                    <td>".number_format($row['giasp'])."(VND)</td>

                    <td><a class='xemchitietbtn' href='javascript:void(0)' onclick='xemchitiet(".$row['idsp'].")'>Xem chi tiết</a></td>

                    <td><a href='./suasanpham.php?idsp=".$row['idsp']."'><img class='optionimg' alt='Lỗi ảnh' src='./icon/edit.png'></a></td>

                    <td><a href='./xoasanpham.php?idsp=".$row['idsp']."'><img class='optionimg' alt='Lỗi ảnh' src='./icon/delete.png'></a></td>

                </tr>";

            };
            
            echo "</tbody>";
            echo "</table><div class='anhpopup' id='popupImg'></div>";
            
            echo "<div class='txtcenter'><a href='./themsanpham.php' class='dangxuat_btn'>Thêm sản phẩm</a>

                    <a href='./logout.php' class='dangxuat_btn'>Đăng xuất</a></div>";

            echo "</div>";

            
            $con->close();

    ?>
    <!-- ket thuc bang danh sach -->
    <!-- bat dau bang chi tiet san pham -->
    <div id="bangchitiet"></div>
</body>

</html>