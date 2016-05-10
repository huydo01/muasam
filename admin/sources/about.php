<?php if(!defined('_kiemtraweb') || _kiemtraweb!=$check_website) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
switch($act){
	//GIỚI THIỆU
	case "capnhap":
		gets(0,'capnhap');
		$template = "about/item_add";
		break;
	case "save":
		save(0,'capnhap');
		break;
	
	//GIỚI THIỆU 1
	case "capnhap1":
		gets(1,'capnhap1');
		$template = "about/item1_add";
		break;
	case "save1":
		save(1,'capnhap1');
		break;
		
	//GIỚI THIỆU 2
	case "capnhap2":
		gets(2,'capnhap2');
		$template = "about/item2_add";
		break;
	case "save2":
		save(2,'capnhap2');
		break;
	
		
	default:
		$template = "index";
}


//GIỚI THIỆU
function gets($c,$act){
	global $d, $item;

	$sql = "select * from #_about where com=$c";
	$d->query($sql);
	$item = $d->fetch_array();
}

function save($c,$act){
	global $d;
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=about&act=$act");			
	
	$sql = "select * from #_about where com=$c limit 0,1";
	$d->query($sql);
	if($d->num_rows()!=0){
		$d->reset();
		
		$data['mota_vi'] = magic_quote($_POST['mota_vi']);
		$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);
		
		$data['mota_en'] = magic_quote($_POST['mota_en']);
		$data['noidung_en'] = magic_quote($_POST['noidung_en']);
		
		$data['title'] = magic_quote($_POST['title']);
		$data['description'] = magic_quote($_POST['description']);
		$data['keywords'] = magic_quote($_POST['keywords']);
		
		$d->setTable('about');
		$d->setWhere('com',''.$c);
		if($d->update($data))
			transfer("Dữ liệu được cập nhập", "index.php?com=about&act=$act");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=about&act=$act");
	}
	else{
		$d->reset();
		$data['com'] = $c;
		
		$data['mota'] = magic_quote($_POST['mota']);
		$data['noidung'] = magic_quote($_POST['noidung']);
		
		$data['title'] = magic_quote($_POST['title']);
		$data['description'] = magic_quote($_POST['description']);
		$data['keywords'] = magic_quote($_POST['keywords']);
		
		$d->setTable('about');
		if($d->insert($data))
			transfer("Dữ liệu được thêm vào", "index.php?com=about&act=$act");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=about&act=$act");	
	}
			
}


?>