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
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php
    require 'conn.php';
    $id = $_GET['idsp'];
    $_SESSION['idsp'] = $id; // gan idsp vao session de su dung o trang xuly_sua.
    // $con = new mysqli("localhost","id16220826_nhan","Pz@>i/z3O|mO6/NH","id16220826_buoi3");
    $sql = "SELECT * FROM sanpham WHERE idsp='$id'";
    $result = $con->query($sql);
    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    }
    ?>
    <h2 class="themsp_heading">Sửa sản phẩm</h2>
    <p class="themsp_desc">Vui lòng điền đầy đủ thông tin bên dưới để sửa sản phẩm</p>
    <form action="./xuly_sua.php" 
    enctype="multipart/form-data"
    method="POST">
        <div class="form__container">
        <table bgcolor="lightblue" class="bangthemsp">
            <tr>
                <td>Tên sản phẩm</td>
                <td>
                    <input type="text" name="tensp" id="tensp" value="<?php echo $row['tensp'];?>">
                </td>
            </tr>
            <tr>
                <td>Chi tiết sản phẩm</td>
                <td>
                    <textarea name="chitietsp" id="chitietsp" cols="50" rows="10" ><?php echo $row['chitietsp']?></textarea>
                    
                </td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td>
                    <input type="text" name="giasp" id="giasp" value="<?php echo $row['giasp']?>">
                    <span>(VND)</span>
                </td>
            </tr>
            <tr>
                <td>Hình đại diện</td>
                <td>
                    <input type="file" name="hinhdaidien" id="hinhdaidien">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Lưu sản phẩm">
                </td>
            </tr>
        </table>
        </div>
    </form>
</body>
</html>