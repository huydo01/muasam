<?php	if(!defined('_kiemtraweb') || _kiemtraweb!=$check_website) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

$chuoi_noi_curpage = (($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:'');

switch($act){
	
	
	//THÔNG TIN CÔNG TY-----------------------------
	case "capnhap":
		get_capnhap();
		$template = "company/item_add";
		break;
	case "save_capnhap":
		save_capnhap();
		break;
	
	
	//BẢN ĐỒ --------------------------
	case "man":
		get_items();
		$template = "company/address/items";
		break;
	case "add":
		$template = "company/address/item_add";
		break;
	case "edit":		
		get_item();		
		$template = "company/address/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	
	//BẢN ĐỒ DẠNG TỌA ĐỘ --------------------------
	case "man1":
		get_items1();
		$template = "company/toado/items";
		break;
	case "add1":
		$template = "company/toado/item_add";
		break;
	case "edit1":		
		get_item1();		
		$template = "company/toado/item_add";
		break;
	case "save1":
		save_item1();
		break;
	case "delete1":
		delete_item1();
		break;
	
		
	default:
		$template = "index";
}


//THÔNG TIN CÔNG TY-----------------------------
function get_capnhap(){
	global $d, $item;

	$sql = "select * from #_company where com='company' limit 0,1";
	$d->query($sql);	
	$item = $d->fetch_array();
}

function save_capnhap(){
	global $d;
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=company&act=capnhap");
	
	$data['com'] = 'company';
	
	$data['title'] = magic_quote($_POST['title']);
	$data['description'] = magic_quote($_POST['description']);
	$data['keywords'] = magic_quote($_POST['keywords']);
	
	$data['ten_vi'] = magic_quote($_POST['ten_vi']);
	
	$data['mota_vi'] = magic_quote($_POST['mota_vi']);
	$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);
	
	
	$data['ten_en'] = magic_quote($_POST['ten_en']);
	
	$data['mota_en'] = magic_quote($_POST['mota_en']);
	$data['noidung_en'] = magic_quote($_POST['noidung_en']);
	
	
	
	
	$data['script'] = magic_quote($_POST['script']);		
	$data['vchat'] = magic_quote($_POST['vchat']);		
	
	$data['email'] = magic_quote($_POST['email']);
	$data['website'] = magic_quote($_POST['website']);
	$data['fanface'] = magic_quote($_POST['fanface']);
	$data['diachi_vi'] = magic_quote($_POST['diachi_vi']);
	$data['diachi_en'] = magic_quote($_POST['diachi_en']);
	$data['dienthoai'] = magic_quote($_POST['dienthoai']);
	
	$d->reset();
	
	$sql = "select * from #_company where com='company' limit 0,1";
	$d->query($sql);
	if($d->num_rows()==0){	//Nếu chưa tồn tại thông tin công ty
		$d->reset();
		$d->setTable('company');
		if($d->insert($data))
			transfer("Thêm dữ liệu thành công", "index.php?com=company&act=capnhap");
	}
	else{					//Nếu đã tồn tại cập nhật com='company'
		$d->reset();
		$d->setTable('company');
		$d->setWhere('com', 'company');	
		if($d->update($data))
		transfer("Dữ liệu đã được cập nhật", "index.php?com=company&act=capnhap");	
	}					
}


//BẢN ĐỒ --------------------------
function get_items(){
	global $d, $items, $paging;
	
	if(@$_REQUEST['hienthi']!='')
	{
		$id_up = intval($_REQUEST['hienthi']);
		$sql_sp = "SELECT id,hienthi FROM table_company where id='$id_up' ";
		$d->query($sql_sp);
		$cats= $d->fetch_array();
		$hienthi=$cats['hienthi'];		
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_company SET hienthi =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_company SET hienthi =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
		redirect("index.php?com=company&act=man".$chuoi_noi_curpage);	
	}
	
	$sql = "select * from #_company where com='bando' order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=company&act=man";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=company&act=man".$chuoi_noi_curpage);
	
	$sql = "select * from #_company where id='".$id."' and com='bando'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=company&act=man".$chuoi_noi_curpage);
	$item = $d->fetch_array();
}

function save_item(){
	global $d;	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=company&act=man".$chuoi_noi_curpage);
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	$file_name=q_tenhinh($_FILES['file']['name']);
	
	if($id){
		$id =  intval($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF',_upload_hinhanh,$file_name)){
			$data['email'] = $photo;			
			$d->setTable('company');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['email']);				
			}
		}
		$data['ten'] = magic_quote($_POST['ten']);
		$data['mota'] = magic_quote($_POST['mota']);
		$data['noidung'] = magic_quote($_POST['noidung']);
		
		
		$data['stt'] = magic_quote($_POST['stt']);
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('company');
		$d->setWhere('id', $id);
		$d->setWhere('com', 'bando');
		if($d->update($data))
				redirect("index.php?com=company&act=man".$chuoi_noi_curpage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=company&act=man".$chuoi_noi_curpage);
	}else{				
		if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF',_upload_hinhanh,$file_name)){
			$data['email'] = $photo;						
		}
		
		$data['com'] = 'bando';
		
		$data['ten'] = magic_quote($_POST['ten']);
		$data['mota'] = magic_quote($_POST['mota']);
		$data['noidung'] = magic_quote($_POST['noidung']);
		
		
		$data['stt'] = magic_quote($_POST['stt']);
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('company');
		if($d->insert($data))
			redirect("index.php?com=company&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=company&act=man".$chuoi_noi_curpage);
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		
		$d->reset();
		$sql = "select * from #_company where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_hinhanh.$row['email']);
			}		
		}
		
		$sql = "delete from #_company where id='".$id."'";
		
		if($d->query($sql))
			redirect("index.php?com=company&act=man".$chuoi_noi_curpage);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=company&act=man".$chuoi_noi_curpage);
	}else transfer("Không nhận được dữ liệu", "index.php?com=company&act=man".$chuoi_noi_curpage);
}


//BẢN ĐỒ TỌA ĐỘ --------------------------
function get_items1(){
	global $d, $items, $paging;
	
	if(@$_REQUEST['hienthi']!='')
	{
		$id_up = intval($_REQUEST['hienthi']);
		$sql_sp = "SELECT id,hienthi FROM table_company where id='$id_up' ";
		$d->query($sql_sp);
		$cats= $d->fetch_array();
		$hienthi=$cats['hienthi'];		
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_company SET hienthi =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_company SET hienthi =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
		redirect("index.php?com=company&act=man1".$chuoi_noi_curpage);	
	}
	
	$sql = "select * from #_company where com='toado' order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=company&act=man1";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item1(){
	global $d, $item;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=company&act=man1".$chuoi_noi_curpage);
	
	$sql = "select * from #_company where id='".$id."' and com='toado'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=company&act=man1".$chuoi_noi_curpage);
	$item = $d->fetch_array();
}

function save_item1(){
	global $d;	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=company&act=man1".$chuoi_noi_curpage);
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	
	if($id){		
		$data['ten_vi'] = magic_quote($_POST['ten_vi']);
		$data['ten_en'] = magic_quote($_POST['ten_en']);
		$data['diachi_vi'] = magic_quote($_POST['diachi_vi']);
		$data['diachi_en'] = magic_quote($_POST['diachi_en']);
		$data['dienthoai'] = magic_quote($_POST['dienthoai']);
		$data['website'] = magic_quote($_POST['website']);
		$data['title'] = magic_quote($_POST['title']);
		
		$data['title_vi'] = magic_quote($_POST['title_vi']);
		$data['title_en'] = magic_quote($_POST['title_en']);
		
		$data['stt'] = magic_quote($_POST['stt']);
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('company');
		$d->setWhere('id', $id);
		$d->setWhere('com', 'toado');
		if($d->update($data))
				redirect("index.php?com=company&act=man1".$chuoi_noi_curpage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=company&act=man1".$chuoi_noi_curpage);
	}else{						
		$data['com'] = 'toado';
		
		$data['ten'] = magic_quote($_POST['ten']);
		$data['diachi'] = magic_quote($_POST['diachi']);
		$data['dienthoai'] = magic_quote($_POST['dienthoai']);
		$data['website'] = magic_quote($_POST['website']);
		$data['title'] = magic_quote($_POST['title']);
		
		$data['stt'] = magic_quote($_POST['stt']);
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('company');
		if($d->insert($data))
			redirect("index.php?com=company&act=man1");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=company&act=man1".$chuoi_noi_curpage);
	}
}

function delete_item1(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);				
		$sql = "delete from #_company where id='".$id."' and com='toado'";
		
		if($d->query($sql))
			redirect("index.php?com=company&act=man1".$chuoi_noi_curpage);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=company&act=man1".$chuoi_noi_curpage);
	}else transfer("Không nhận được dữ liệu", "index.php?com=company&act=man1".$chuoi_noi_curpage);
}


?>