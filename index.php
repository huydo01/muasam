<?php
	session_start();
	$mang_nn = array("vi","en");
	if(!isset($_SESSION["nn"])){
		$_SESSION["nn"]="vi";
	}
	if(isset($_GET["lang"])){
		$lang = $_GET["lang"];
		if(in_array($lang,$mang_nn))
		$_SESSION["nn"] = $lang;
		
	}
	
	switch($_SESSION["nn"]){
		case "vi": require "languages/vi.php";
		break;
		case "en": require "languages/en.php";
		break;
		default : require "languages/vi.php";
	}
	$ten = "ten_".$_SESSION["nn"];
	$mota = "mota_".$_SESSION["nn"];
	$mota1 = "mota1_".$_SESSION["nn"];
	$mota2 = "mota2_".$_SESSION["nn"];
	$noidung = "noidung_".$_SESSION["nn"];
	$xuatxu = "xuatxu_".$_SESSION["nn"];
	$diachi = "diachi_".$_SESSION["nn"];
	$title = "title_".$_SESSION["nn"];
	
	
	
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	error_reporting(E_ALL & ~E_NOTICE & ~8192);

	$session=session_id();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './admin/lib/');

	include_once _lib."config.php";
	
	@define ( '_kiemtraweb' , $check_website);  //Một đoạn mã dành riêng cho 1 website.
	
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."q_functions.php";	//Các hàm bổ sung
	include_once _lib."functions_giohang.php";		
	include_once _lib."class.database.php";
	include_once _lib."file_requick.php";
	include_once _lib."new.php";
	
	
	if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
	$pid=$_REQUEST['productid'];
	$nid=($_REQUEST['productnum'])?$_REQUEST['productnum']:1;
		addtocart($pid,$nid);
		redirect("gio-hang.html");}	
?>

<!doctype html>
<html>
<head>
<!--Xác định URL của một trang hoặc một tên của đường link tới trang mục tiêu.-->
<base href="http://<?=$config_url?>/" />

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta name="description" content="<?=$description?>" />
<meta name="keywords" content="<?=$keywords?>" />

<meta name="robots" content="noodp,index,follow" />
<meta name='revisit-after' content='7 days' />
<meta http-equiv="content-language" content="vi" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/icon.ico" rel="shortcut icon" type="image/x-icon" />
<!--<meta name = "viewport" content = "user-scalable=no, width=device-width">-->

<meta name="author" content="" />
<meta name="copyright" content="" />

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/stylechung.css"/>
<link href="css/thumbnail-slider.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<link rel="stylesheet" type="text/css" href="css/component.css" />
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.min.css">
<link rel="stylesheet" href="css/rating.min.css">
<link rel="stylesheet" href="css/normalize.css" media="all" type="text/css"/>
<link rel="stylesheet" href="css/stylemenudoc.css" media="all" type="text/css"/>
<link rel="stylesheet"  type="text/css" href="http://fonts.googleapis.com/css?family=Rufina" />
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="css/flexslider.css" />
<link rel="stylesheet" type="text/css" href="css/style-less.css" />

<body style="background-color:#F6F6F6">
<!-- menu ngang-->
<nav class="navbar navbar-inverse">
	<div class="container">
		<?php include_once _template."layout/menu/menu1.php"; ?>
	</div>
</nav>
<!-- Menu dưới tìm kiếm-->

<!-- Nội dung-khung chính -->
<div class="container">
	<?php include_once _template.$template."_tpl.php"; ?>
</div>
<footer>
	<?php include_once _template."layout/footer/footer1.php"; ?>	
</footer>
		
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/rating.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/thumbnail-slider.js" type="text/javascript"></script>
<script src="js/index.js" type="text/javascript"></script>

</body>
</html>
