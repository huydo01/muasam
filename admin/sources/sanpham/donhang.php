<?php	if(!defined('_kiemtraweb') || _kiemtraweb!=$check_website) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$id=$_REQUEST['id'];
switch($act){

	case "man":
		get_items();
		$template = "sanpham/donhang/items";
		break;
	case "add":		
		$template = "sanpham/donhang/item_add";
		break;
	case "edit":		
		get_item();
		$template = "sanpham/donhang/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;	
	default:
		$template = "index";
}

#====================================

function get_items(){
	global $d, $items, $paging;
	
	$sql = "select * from #_donhang";		
	$sql.=" order by id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=donhang&act=man";
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=donhang&act=man");
	
	$sql = "select * from #_donhang where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=donhang&act=man");
	$item = $d->fetch_array();	
}

function save_item(){
	global $d;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=donhang&act=man");
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	
	
	if($id){
		$id =  intval($_POST['id']);			
		
		$data['ghichu'] = magic_quote($_POST['ghichu']);
		$data['trangthai'] = magic_quote($_POST['id_trangthai']);				
		$d->setTable('donhang');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=donhang&act=man&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=donhang&act=man");
	}else{
			
		/*$data['ghichu'] = magic_quote($_POST['ghichu']);		
		$data['noidung'] = magic_quote($_POST['noidung']);
		$data['trangthai'] = magic_quote($_POST['id_trangthai']);	
		$d->setTable('donhang');
		if($d->insert($data))
			redirect("index.php?com=donhang&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=donhang&act=man");*/
	}
}

function delete_item(){
	global $d;
	if($_REQUEST['id_cat']!='')
	{ $id_catt="&id_cat=".$_REQUEST['id_cat'];
	}
	if($_REQUEST['curPage']!='')
	{ $id_catt.="&curPage=".$_REQUEST['curPage'];
	}
	
	
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		$d->reset();
		$sql = "delete from #_donhang where id='".$id."'";
		$d->query($sql);
		if($d->query($sql))
			redirect("index.php?com=donhang&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=donhang&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=donhang&act=man");
}
?>