<?php session_start();
	if(!isset($_SESSION['username'])) {
		header("Location: ./dangnhap.php");
	}
	require './conn.php';
	$idtv = $_SESSION['idtv'];
	$sql = "SELECT idsp, tensp, hinhanhsp FROM sanpham WHERE idtv='".$idtv."'";
	$result = $con->query($sql);
	$arrIMG = array();
	$index = 0;
	while($row = $result->fetch_assoc()) {
		// echo "<img src='../".$row['hinhanhsp']."' width='300px' height='300px'/>";
		$arrIMG[$index] = $row['hinhanhsp'];
		$index++;
	}
?>
<!DOCTYPE html>
<html>
<head> 
	<title> Lập trình web (CT428) </title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="../js/style-buoi4.css" media="screen" />

<script>

// bai tap co nhieu cach lam, code trong tap tin nay chi la vi du ve 1 trong nhung cach lam de sinh vien tham khao
// var IMAGE_PATHS = [];
var IMAGE_PATHS = <?php echo json_encode($arrIMG,JSON_UNESCAPED_SLASHES);?>;
// JSON_UNESCAPED_SLASHES de xoa bo dau \ phia truoc / vd: sanpham\/kiemtra.jpg=> sanpham/kiemtra.jpg
// console.log(ANHCSDL);
// IMAGE_PATHS[0] = "img/hp.jpg";
// IMAGE_PATHS[1] = "img/dell.jpg";
// IMAGE_PATHS[2] = "img/acer.jpg";
// IMAGE_PATHS[3] = "img/asus.jpg";
// console.log(IMAGE_PATHS);
var inext = 0;
function changeSlide(pos) {
	var image = document.getElementById("laptopImg");
	var selects = document.getElementById("selectWrap");
	
// sinh vien tu viet code cho changeSlide:
// pos = 1: hien thi file anh tiep theo 
// pos = -1: hien thi file anh truoc do
	if(pos == 1) {
		inext++;
		if(inext == IMAGE_PATHS.length) {
			inext = 0;
		}
		// console.log("next:",inext);
		image.src = IMAGE_PATHS[inext];
		selects.selectedIndex = inext; // thay doi select value
	} else {
		inext--;
		if(inext < 0) {
			inext = IMAGE_PATHS.length-1;
		}
		// console.log("previous:",inext);
		image.src = IMAGE_PATHS[inext];
		selects.selectedIndex = inext; // thay doi select value
	}	
}


function chooseSlide(pos) {
	var image = document.getElementById("laptopImg");
// sinh vien tu viet code cho chooseSlide:
// pos = x: hien thi file anh x
	inext = pos;
	image.src = IMAGE_PATHS[inext];
}
	
//-->
</script>

</head>	
<body>

<div id="wrap">
	<div id="title">
		<h1>Bài 4 - Buổi 4</h1>
	</div> <!--end div title-->
	<div id="menu">
	<ul>
			<li><a href="#">Buổi 1</a>
				<ul>
					<li><a href="../../../web/THbuoi1/bai1.html">Bài 1</a></li>
					<li><a href="../../../web/THbuoi1/bai2.html">Bài 2</a></li>
					<li><a href="../../../index.html">Bài 3</a></li>
				</ul>
			</li>
			<li><a href="#">Buổi 2</a>
				<ul>
					<li><a href="../../../web/THbuoi2/bai1.html">Bài 1</a></li>
					<li><a href="../../../web/THbuoi2/div.html">Bài 2</a></li>
					<li><a href="../../../web/THbuoi2/Buoi2_Bai3/index.html">Bài 3</a></li>
				</ul>
			</li>
			<li><a href="#">Buổi 3</a>
				<ul>
					<li><a href="../../../buoi3/dangky.php">Bài 1</a></li>
					<li><a href="../../../buoi3/dangnhap.php">Bài 2</a></li>
					<li><a href="../../../buoi3/themsanpham.php">Bài 3</a></li>
					<li><a href="../../../buoi3/danhsachsp.php">Bài 4</a></li>
				</ul>
			</li>

			<li><a href="#">Buổi 4</a>
				<ul>
					<li><a href="../../../buoi3/dangnhap.php">Bài 1</a></li>
					<li><a href="../../../js/Buoi4_Bai2.html">Bài 2</a></li>
					<li><a href="../../../js/Buoi4_Bai3.html">Bài 3</a></li>
					<li><a href="../buoi3/Buoi4_Bai2.php">Bài 4</a></li>
				</ul>
			</li>
			<li><a href="#">Buổi 5</a>
				<ul>
					<li><a href="#">Bài 1</a></li>
					<li><a href="#">Bài 2</a></li>
					<li><a href="#">Bài 3</a></li>
					<li><a href="#">Bài 4</a></li>
				</ul>		
			</li>
		</ul>
	</div>
	<div id="content">
		<!--Nội dung trang web-->
		<h1>Slide show</h1>
	
		<form>
			<img id="laptopImg" src="<?php echo $arrIMG[0]?>" height="300" width="300" />
			<br/>
			<input type="button" name="previous" value="Previous" onclick="changeSlide(-1)">
			<input type="button" name="next" value="Next" onclick="changeSlide(1)">
			<br/>
			<select id="selectWrap" name="laptopSel" onchange="chooseSlide(value)">
				<?php 
					$indexSelect = 0;
					$sql = "SELECT idsp, tensp, hinhanhsp FROM sanpham WHERE idtv='".$idtv."'";
					$resultx = $con->query($sql);
					echo $row['idsp'];
					while($row = $resultx->fetch_assoc()) {
						echo "<option value='".$indexSelect."'>".$row['tensp']."</option>";
						$indexSelect++;
					}
				?>
				
				<!-- <option value="0">HP</option>
				<option value="1">Dell</option>
				<option value="2">Acer</option>
				<option value="3">Asus</option> -->
			</select> 
		</form>
		<p>Yêu cầu:<br/>
		Có 4 hình ảnh về máy tính đính kèm, mặc định hiển thị hình máy HP.<br/>
			<ul>
				<li>Khi người dùng nhấn Next thì hiển thị hình tiếp theo (theo thứ tự Hp -> Dell -> Acer -> Asus).</li>
				<li>Khi người dùng nhấp Previous thì hiển thị hình trước đó.</li>
				<li>Cả nút Next và Previous đều hiển thị vòng tròn (nếu đang xem hình HP mà nhấn Previous thì sẽ chuyển sang hình Asus).</li>
				<li>Người dùng có thể chọn xem một hình nào đó từ danh sách bên dưới nút Previous và Next.</li>
				<li>Khi người dùng thay đổi hình bằng cách nhấn Previous hoặc Next thì tên hiển thị bên dưới cũng thay đổi theo.</li>
			</ul>	
		</p>
	</div> <!--end div content-->
	<div id="footer">
		<p>Họ tên SV: Huỳnh Hữu Nhân<br/> Email: huynhnhan.dev@gmail.com</p>
	</div> <!--end div footer-->
</div> <!--end div wrap-->
</body>
</html>