<?php	if(!defined('_kiemtraweb') || _kiemtraweb!=$check_website) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

$chuoi_noi_curpage = (($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:'');

switch($act){
	//--BANNER--------------------------------
	case "capnhap_banner":
		get_banner('banner','capnhap_banner');
		$template = "photo/banner/logo_add";
		break;
	case "save_banner":
		save_banner('banner','capnhap_banner');
		break;
	
	
	//--BACKGROUND--------------------------------
	case "capnhap_background":
		get_background();
		$template = "photo/background/item_add";
		break;
	case "save_background":
		save_background();
		break;
	
		
	//--YAHOO-----------------------------------------
	case "man_yahoo":
		get_yahoos();
		$template = "photo/yahoo/items";
		break;
	case "add_yahoo":
		$template = "photo/yahoo/item_add";
		break;
	case "edit_yahoo":
		get_yahoo();
		$template = "photo/yahoo/item_add";
		break;
	case "save_yahoo":
		save_yahoo();
		break;
	case "delete_yahoo":
		delete_yahoo();
		break;	
	
	//--CHIA SẺ-----------------------------------------
	case "man_chiase":
		get_chiases();
		$template = "photo/chiase/items";
		break;
	case "add_chiase":
		$template = "photo/chiase/item_add";
		break;
	case "edit_chiase":
		get_chiase();
		$template = "photo/chiase/item_add";
		break;
	case "save_chiase":
		save_chiase();
		break;
	case "delete_chiase":
		delete_chiase();
		break;	
		
	//--LIÊN KẾT WEBSITE-----------------------------------------
	case "man_lkweb":
		get_lkwebs();
		$template = "photo/lkweb/items";
		break;
	case "add_lkweb":
		$template = "photo/lkweb/item_add";
		break;
	case "edit_lkweb":
		get_lkweb();
		$template = "photo/lkweb/item_add";
		break;
	case "save_lkweb":
		save_lkweb();
		break;
	case "delete_lkweb":
		delete_lkweb();
		break;		
		
	//--QUẢNG CÁO 2 BÊN LEFT-----------------------------------------
	case "man_quangcao2ben":
		get_quangcao2bens('quangcao2ben_left','man_quangcao2ben');
		$template = "photo/quangcao2ben/items";
		break;
	case "add_quangcao2ben":
		$template = "photo/quangcao2ben/item_add";
		break;
	case "edit_quangcao2ben":
		get_quangcao2ben('quangcao2ben_left','man_quangcao2ben');
		$template = "photo/quangcao2ben/item_add";
		break;
	case "save_quangcao2ben":
		save_quangcao2ben('quangcao2ben_left','man_quangcao2ben');
		break;
	case "delete_quangcao2ben":
		delete_quangcao2ben('quangcao2ben_left','man_quangcao2ben');
		break;
	
	//--QUẢNG CÁO 2 BÊN RIGHT-----------------------------------------
	case "man_quangcao2ben1":
		get_quangcao2bens('quangcao2ben_right','man_quangcao2ben1');
		$template = "photo/quangcao2ben/items1";
		break;
	case "add_quangcao2ben1":
		$template = "photo/quangcao2ben/item1_add";
		break;
	case "edit_quangcao2ben1":
		get_quangcao2ben('quangcao2ben_right','man_quangcao2ben1');
		$template = "photo/quangcao2ben/item1_add";
		break;
	case "save_quangcao2ben1":
		save_quangcao2ben('quangcao2ben_right','man_quangcao2ben1');
		break;
	case "delete_quangcao2ben1":
		delete_quangcao2ben('quangcao2ben_right','man_quangcao2ben1');
		break;
	
	//--VIDEO-----------------------------------------
	case "man_video":
		get_videos();
		$template = "photo/video/items";
		break;
	case "add_video":
		$template = "photo/video/item_add";
		break;
	case "edit_video":
		get_video();
		$template = "photo/video/item_add";
		break;
	case "save_video":
		save_video();
		break;
	case "delete_video":
		delete_video();
		break;
	
	//--HOTLINE-----------------------------------------
	case "man_hotline":
		get_hotlines();
		$template = "photo/hotline/items";
		break;
	case "add_hotline":
		$template = "photo/hotline/item_add";
		break;
	case "edit_hotline":
		get_hotline();
		$template = "photo/hotline/item_add";
		break;
	case "save_hotline":
		save_hotline();
		break;
	case "delete_hotline":
		delete_hotline();
		break;
	
	
	//--SLIDESHOW--------------------------------------
	case "man":
		gets('slideshow','man');
		$template = "photo/slider/items";
		break;
	case "add":		
		$template = "photo/slider/item_add";
		break;
	case "edit":
		get('slideshow','man');
		$template = "photo/slider/item_add";
		break;
	case "save":
		save('slideshow','man',954,252,2);
		break;
	case "delete":
		delete('slideshow','man');
		break;	
	
	//--SLIDESHOW 1--------------------------------------
	case "man1":
		gets('slideshow1','man1');
		$template = "photo/slider/items1";
		break;
	case "add1":		
		$template = "photo/slider/item1_add";
		break;
	case "edit1":
		get('slideshow1','man1');
		$template = "photo/slider/item1_add";
		break;
	case "save1":
		save('slideshow1','man1',130,53,2);
		break;
	case "delete1":
		delete('slideshow1','man1');
		break;	
	
	//--SLIDESHOW 2--------------------------------------
	case "man2":
		gets('slideshow2','man2');
		$template = "photo/slider/items2";
		break;
	case "add2":		
		$template = "photo/slider/item2_add";
		break;
	case "edit2":
		get('slideshow2','man2');
		$template = "photo/slider/item2_add";
		break;
	case "save2":
		save('slideshow2','man2',1366,774,2);
		break;
	case "delete2":
		delete('slideshow2','man2');
		break;		
		
	
				
	default:
		$template = "index";
}



//--BANNER -- Lưu 1 ảnh  -----------------------------------------------------------
function get_banner($c,$act){
	global $d, $item;

	$sql = "select * from #_photo where com='$c'";
	$d->query($sql);
	$item = $d->fetch_array();
}

function save_banner($c,$act){
	global $d;
	$file_name=q_tenhinh($_FILES['file']['name']);
	$file_name1=q_tenhinh($_FILES['file1']['name']);
	
	$sql = "select * from #_photo where com='$c'";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=intval($item['id']);	
	if($id){ // cap nhat
		if($photo = upload_image("file", 'swf|png|gif|jpeg|jpg|SWF|PNG|GIF|JPEG|JPG', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;
			$d->setTable('photo');
			$d->setWhere('com', "$c");
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['photo']);
		}
		if($photo = upload_image("file1", 'swf|png|gif|jpeg|jpg|SWF|PNG|GIF|JPEG|JPG', _upload_hinhanh,$file_name1)){
			$data['thumb'] = $photo;
			$d->setTable('photo');
			$d->setWhere('com', "$c");
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['thumb']);
		}
		$data['hienthi'] = 1;
		$d->setTable('photo');
		$d->setWhere('com', "$c");
		if($d->update($data))
			redirect("index.php?com=photo&act=$act");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=photo&act=$act");
	}else{ // them moi
		$data['photo'] = upload_image("file", 'swf|png|gif|jpeg|jpg|SWF|PNG|GIF|JPEG|JPG', _upload_hinhanh,$file_name);
		if(!$data['photo']) $data['photo']="";
		$data['thumb'] = upload_image("file1", 'swf|png|gif|jpeg|jpg|SWF|PNG|GIF|JPEG|JPG', _upload_hinhanh,$file_name1);
		if(!$data['thumb']) $data['thumb']="";
		
		$data['hienthi'] = 1;
		$data['com']="$c";
		$d->setTable('photo');
		if($d->insert($data))
			redirect("index.php?com=photo&act=$act");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=photo&act=$act");	
	}
}

//--BACKGROUND------------------------------------------
function get_background(){
	global $d, $item;

	$sql = "select * from #_photo where com='background'";
	$d->query($sql);
	$item = $d->fetch_array();
}
function save_background(){
	global $d;
	$file_name=q_tenhinh($_FILES['file']['name']);
	
	$sql = "select * from #_photo where com='background'";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=intval($item['id']);	
	//Dùng chung
	$data['ten'] = magic_quote($_POST['ten']);
	$data['ten1'] = magic_quote($_POST['ten1']);
	$data['ten2'] = magic_quote($_POST['ten2']);
	$data['link'] = isset($_POST['link']) ? 1 : 0;
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
	
	if($id){ // cap nhat
		if($photo = upload_image("file", 'png|gif|jpeg|jpg|PNG|GIF|JPEG|JPG', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;
			$d->setTable('photo');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['photo']);
		}
			
		$d->setTable('photo');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=photo&act=capnhap_background");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=photo&act=capnhap_background");
	}else{ // them moi
		$data['photo'] = upload_image("file", 'png|gif|jpeg|jpg|PNG|GIF|JPEG|JPG', _upload_hinhanh,$file_name);
		if(!$data['photo']) $data['photo']="";		
		$data['com']='background';
			
		$d->setTable('photo');
		if($d->insert($data))
			redirect("index.php?com=photo&act=capnhap_background");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=photo&act=capnhap_background");
	
	}
}

//--YAHOO-------------------------------------------------------
function get_yahoos(){
	global $d, $items, $paging, $chuoi_noi_curpage;		
	
	thaydoi_hienthi('hienthi','table_photo','photo','man_yahoo',$chuoi_noi_curpage);
	
	$sql = "select * from #_photo where com='yahoo' order by stt asc,id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=photo&act=man_yahoo";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_yahoo(){
	global $d, $item, $chuoi_noi_curpage;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man_yahoo".$chuoi_noi_curpage);
	
	$sql = "select * from #_photo where id=$id";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=photo&act=man_yahoo".$chuoi_noi_curpage);
	$item = $d->fetch_array();
}

function save_yahoo(){
	global $d, $chuoi_noi_curpage;		
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man_yahoo".$chuoi_noi_curpage);
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	
	$data['photo'] = magic_quote($_POST['photo']);	
	$data['thumb'] = magic_quote($_POST['thumb']);		
	$data['ten'] = magic_quote($_POST['ten']);	
	$data['ten_vi'] = magic_quote($_POST['ten_vi']);	
	$data['ten_en'] = magic_quote($_POST['ten_en']);	
	$data['link'] = magic_quote($_POST['link']);		
	$data['stt'] = magic_quote($_POST['stt']);		
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;	
	
	if($id){																		
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('com', 'yahoo');
		if($d->update($data))
				redirect("index.php?com=photo&act=man_yahoo".$chuoi_noi_curpage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=photo&act=man_yahoo".$chuoi_noi_curpage);
	}else{				
		$data['com'] = 'yahoo';
		
		$d->setTable('photo');
		if($d->insert($data))
			redirect("index.php?com=photo&act=man_yahoo");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=photo&act=man_yahoo".$chuoi_noi_curpage);
	}
}

function delete_yahoo(){
	global $d, $chuoi_noi_curpage;
	
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		
		$d->reset();		
		$sql = "delete from #_photo where id='".$id."' and com='yahoo'";		
		if($d->query($sql))
			redirect("index.php?com=photo&act=man_yahoo".$chuoi_noi_curpage);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=photo&act=man_yahoo".$chuoi_noi_curpage);
	}else transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man_yahoo".$chuoi_noi_curpage);
}

//--CHIA SẺ-------------------------------------------------------
function get_chiases(){
	global $d, $items, $paging, $chuoi_noi_curpage;	
	
	thaydoi_hienthi('hienthi','table_photo','photo','man_chiase',$chuoi_noi_curpage);	
		
	$sql = "select * from #_photo where com='chiase' order by stt asc,id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=photo&act=man_chiase";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_chiase(){
	global $d, $item, $chuoi_noi_curpage;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man_chiase".$chuoi_noi_curpage);
	
	$sql = "select * from #_photo where id=$id and com='chiase'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=photo&act=man_chiase".$chuoi_noi_curpage);
	$item = $d->fetch_array();
}

function save_chiase(){
	global $d, $chuoi_noi_curpage;	
	$file_name=q_tenhinh($_FILES['file']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man_chiase".$chuoi_noi_curpage);
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	//Dùng chung
	$data['ten'] = magic_quote($_POST['ten']);	
	$data['link'] = magic_quote($_POST['link']);
	$data['stt'] = magic_quote($_POST['stt']);		
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;	
	
	if($id){		
		if($photo = upload_image("file", 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;			
			$d->setTable('photo');
			$d->setWhere('id', $id);
			$d->setWhere('com', 'chiase');
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['photo']);				
			}
		}
							
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('com', 'chiase');
		if($d->update($data))
				redirect("index.php?com=photo&act=man_chiase".$chuoi_noi_curpage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=photo&act=man_chiase".$chuoi_noi_curpage);
	}else{		
		if($photo = upload_image("file", 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;				
		}
		$data['com'] = 'chiase';
		
		$d->setTable('photo');
		if($d->insert($data))
			redirect("index.php?com=photo&act=man_chiase");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=photo&act=man_chiase".$chuoi_noi_curpage);
	}
}

function delete_chiase(){
	global $d, $chuoi_noi_curpage;
	
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=photo&act=man_chiase".$chuoi_noi_curpage);
		$row = $d->fetch_array();
		delete_file(_upload_hinhanh.$row['photo']);
		
		$d->reset();		
		$sql = "delete from #_photo where id=$id";		
		if($d->query($sql))
			redirect("index.php?com=photo&act=man_chiase".$chuoi_noi_curpage);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=photo&act=man_chiase".$chuoi_noi_curpage);
	}else transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man_chiase".$chuoi_noi_curpage);
}

//--LIÊN KẾT WEBSITE-------------------------------------------------------
function get_lkwebs(){
	global $d, $items, $paging, $chuoi_noi_curpage;	
	
	thaydoi_hienthi('hienthi','table_photo','photo','man_lkweb',$chuoi_noi_curpage);	
		
	$sql = "select * from #_photo where com='lkweb' order by stt asc,id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=photo&act=man_lkweb";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_lkweb(){
	global $d, $item, $chuoi_noi_curpage;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man_lkweb".$chuoi_noi_curpage);
	
	$sql = "select * from #_photo where id=$id and com='lkweb'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=photo&act=man_lkweb".$chuoi_noi_curpage);
	$item = $d->fetch_array();
}

function save_lkweb(){
	global $d, $chuoi_noi_curpage;	
	$file_name=q_tenhinh($_FILES['file']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man_lkweb".$chuoi_noi_curpage);
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	//Dùng chung
	$data['ten'] = magic_quote($_POST['ten']);	
	$data['link'] = magic_quote($_POST['link']);
	$data['stt'] = magic_quote($_POST['stt']);		
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;	
	
	if($id){		
		if($photo = upload_image("file", 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;			
			$d->setTable('photo');
			$d->setWhere('id', $id);
			$d->setWhere('com', 'lkweb');
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['photo']);				
			}
		}
							
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('com', 'lkweb');
		if($d->update($data))
				redirect("index.php?com=photo&act=man_lkweb".$chuoi_noi_curpage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=photo&act=man_lkweb".$chuoi_noi_curpage);
	}else{		
		if($photo = upload_image("file", 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;				
		}
		$data['com'] = 'lkweb';
		
		$d->setTable('photo');
		if($d->insert($data))
			redirect("index.php?com=photo&act=man_lkweb");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=photo&act=man_lkweb".$chuoi_noi_curpage);
	}
}

function delete_lkweb(){
	global $d, $chuoi_noi_curpage;
	
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=photo&act=man_lkweb".$chuoi_noi_curpage);
		$row = $d->fetch_array();
		delete_file(_upload_hinhanh.$row['photo']);
		
		$d->reset();		
		$sql = "delete from #_photo where id=$id";		
		if($d->query($sql))
			redirect("index.php?com=photo&act=man_lkweb".$chuoi_noi_curpage);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=photo&act=man_lkweb".$chuoi_noi_curpage);
	}else transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man_lkweb".$chuoi_noi_curpage);
}


//--QUẢNG CÁO 2 BÊN LEFT------------------------------------------
function get_quangcao2bens($c,$act){
	global $d, $items, $paging, $chuoi_noi_curpage;	
	
	thaydoi_hienthi('hienthi','table_photo','photo',$act,$chuoi_noi_curpage);			
	
	$sql = "select * from #_photo where com='$c' order by stt asc,id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=photo&act=$act";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_quangcao2ben($c,$act){
	global $d, $item, $chuoi_noi_curpage;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=photo&act=$act".$chuoi_noi_curpage);
	
	$sql = "select * from #_photo where id=$id and com='$c'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=photo&act=$act".$chuoi_noi_curpage);
	$item = $d->fetch_array();
}

function save_quangcao2ben($c,$act){
	global $d, $chuoi_noi_curpage;	
	$file_name=q_tenhinh($_FILES['file']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=photo&act=$act".$chuoi_noi_curpage);
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	//Dùng chung
	$data['ten'] = magic_quote($_POST['ten']);		
	$data['link'] = magic_quote($_POST['link']);
	$data['stt'] = magic_quote($_POST['stt']);		
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
	
	if($id){
		if($photo = upload_image("file", 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;			
			$d->setTable('photo');
			$d->setWhere('id', $id);
			$d->setWhere('com', $c);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['photo']);
			}
		}
					
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('com', $c);
		if($d->update($data))
				redirect("index.php?com=photo&act=$act".$chuoi_noi_curpage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=photo&act=$act".$chuoi_noi_curpage);
	}else{		
		if($photo = upload_image("file", 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;					
		}
		$data['com'] = $c;
				
		$d->setTable('photo');
		if($d->insert($data))
			redirect("index.php?com=photo&act=$act".$chuoi_noi_curpage);
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=photo&act=$act".$chuoi_noi_curpage);
	}
}

function delete_quangcao2ben($c,$act){
	global $d, $chuoi_noi_curpage;
	
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('com', $c);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=photo&act=$act".$chuoi_noi_curpage);
		$row = $d->fetch_array();
		delete_file(_upload_hinhanh.$row['photo']);
		
		$d->reset();		
		$sql = "delete from #_photo where id=$id and com='$c'";		
		if($d->query($sql))
			redirect("index.php?com=photo&act=$act".$chuoi_noi_curpage);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=photo&act=$act".$chuoi_noi_curpage);
	}else transfer("Không nhận được dữ liệu", "index.php?com=photo&act=$act".$chuoi_noi_curpage);
}


//--VIDEO-------------------------------------------------------
function get_videos(){
	global $d, $items, $paging, $chuoi_noi_curpage;	
	
	thaydoi_hienthi('hienthi','table_photo','photo','man_video',$chuoi_noi_curpage);			
	
	$sql = "select * from #_photo where com='video' order by stt asc,id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=photo&act=man_video";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_video(){
	global $d, $item, $chuoi_noi_curpage;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man_video".$chuoi_noi_curpage);
	
	$sql = "select * from #_photo where id=$id and com='video'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=photo&act=man_video".$chuoi_noi_curpage);
	$item = $d->fetch_array();
}

function save_video(){
	global $d, $chuoi_noi_curpage;	
	$file_name=q_tenhinh($_FILES['file']['name']);
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man_video".$chuoi_noi_curpage);
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	//Dùng chung
	$data['ten'] = magic_quote($_POST['ten']);	
	$data['ten_vi'] = magic_quote($_POST['ten_vi']);	
	$data['ten_en'] = magic_quote($_POST['ten_en']);		
	$data['link'] = magic_quote($_POST['link']);
	$data['stt'] = magic_quote($_POST['stt']);		
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;	
	
	if($id){
		if($photo = upload_image("file", 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 20, 20, _upload_hinhanh,$file_name,2);
			$d->setTable('photo');
			$d->setWhere('id', $id);
			$d->setWhere('com', 'video');
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['photo']);
				delete_file(_upload_hinhanh.$row['thumb']);
			}
		}					
		
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('com', 'video');
		if($d->update($data))
				redirect("index.php?com=photo&act=man_video".$chuoi_noi_curpage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=photo&act=man_video".$chuoi_noi_curpage);
	}else{		
		if($photo = upload_image("file", 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 20, 20, _upload_hinhanh,$file_name,2);			
		}
		$data['com'] = 'video';
		
		$d->setTable('photo');
		if($d->insert($data))
			redirect("index.php?com=photo&act=man_video");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=photo&act=man_video".$chuoi_noi_curpage);
	}
}

function delete_video(){
	global $d, $chuoi_noi_curpage;
	
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=photo&act=man_video".$chuoi_noi_curpage);
		$row = $d->fetch_array();
		delete_file(_upload_hinhanh.$row['photo']);
		delete_file(_upload_hinhanh.$row['thumb']);
		
		$d->reset();		
		$sql = "delete from #_photo where id=$id and com='video'";		
		if($d->query($sql))
			redirect("index.php?com=photo&act=man_video".$chuoi_noi_curpage);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=photo&act=man_video".$chuoi_noi_curpage);
	}else transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man_video".$chuoi_noi_curpage);
}


//--HOTLINE-------------------------------------------------------
function get_hotlines(){
	global $d, $items, $paging, $chuoi_noi_curpage;	
	
	thaydoi_hienthi('hienthi','table_photo','photo','man_hotline',$chuoi_noi_curpage);		
		
	$sql = "select * from #_photo where com='hotline' order by stt asc,id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=photo&act=man_hotline";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_hotline(){
	global $d, $item, $chuoi_noi_curpage;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man_hotline".$chuoi_noi_curpage);
	
	$sql = "select * from #_photo where id=$id and com='hotline'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=photo&act=man_hotline".$chuoi_noi_curpage);
	$item = $d->fetch_array();
}

function save_hotline(){
	global $d, $chuoi_noi_curpage;	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man_hotline".$chuoi_noi_curpage);
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	//Dùng chung
	$data['link'] = magic_quote($_POST['link']);
	$data['stt'] = magic_quote($_POST['stt']);		
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
	
	if($id){				
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('com', 'hotline');
		if($d->update($data))
				redirect("index.php?com=photo&act=man_hotline".$chuoi_noi_curpage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=photo&act=man_hotline".$chuoi_noi_curpage);
	}else{		
		$data['com'] = 'hotline';				
		
		$d->setTable('photo');
		if($d->insert($data))
			redirect("index.php?com=photo&act=man_hotline");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=photo&act=man_hotline".$chuoi_noi_curpage);
	}
}

function delete_hotline(){
	global $d, $chuoi_noi_curpage;
	
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		
		$d->reset();		
		$sql = "delete from #_photo where id=$id and com='hotline'";		
		if($d->query($sql))
			redirect("index.php?com=photo&act=man_hotline".$chuoi_noi_curpage);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=photo&act=man_hotline".$chuoi_noi_curpage);
	}else transfer("Không nhận được dữ liệu", "index.php?com=photo&act=man_hotline".$chuoi_noi_curpage);
}




//--SLIDESHOW----------------------------------------------------------
function gets($c,$act){
	global $d, $items, $paging, $chuoi_noi_curpage;
	
	thaydoi_hienthi('hienthi','table_photo','photo',$act,$chuoi_noi_curpage);		
	
	$d->setTable('photo');
	$d->setWhere('com',$c);
	$d->setOrder('stt,id desc');
	$d->select('*');
	$d->query();
	$items = $d->result_array();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=photo&act=$act";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];

}

function get($c,$act){
	global $d, $item, $chuoi_noi_curpage;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id) transfer("Không nhận được dữ liệu", "index.php?com=photo&act=$act".$chuoi_noi_curpage);
	$d->setTable('photo');
	$d->setWhere('id', $id);
	$d->setWhere('com', $c);
	$d->select();
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=photo&act=$act".$chuoi_noi_curpage);
	$item = $d->fetch_array();	
}

function save($c,$act,$width,$height,$truonghop){
	global $d, $chuoi_noi_curpage;
	$file_name=q_tenhinh($_FILES['file']['name']);
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=photo&act=$act".$chuoi_noi_curpage);
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	$d->reset();
	//Dùng chung
	$data['stt'] = magic_quote($_POST['stt']);
	$data['link'] = magic_quote($_POST['link']);	
	$data['mota'] = magic_quote($_POST['mota']);	
	$data['ten'] = magic_quote($_POST['ten']);	
	$data['ten_vi'] = magic_quote($_POST['ten_vi']);	
	$data['ten_en'] = magic_quote($_POST['ten_en']);	
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
	
	if($id){			
		if($photo = upload_image("file", 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], $width, $height, _upload_hinhanh,$file_name,$truonghop);
			$d->setTable('photo');
			$d->setWhere('id', $id);
			$d->setWhere('com', $c);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['photo']);
				delete_file(_upload_hinhanh.$row['thumb']);
			}
		}				
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('com', $c);
		if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=photo&act=$act".$chuoi_noi_curpage);
		redirect("index.php?com=photo&act=$act".$chuoi_noi_curpage);
			
	}else{ 	
		$data['com'] = $c;	
		if($photo = upload_image("file", 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], $width, $height, _upload_hinhanh,$file_name,$truonghop);			
		}		
		$d->setTable('photo');
		if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=photo&act=$act".$chuoi_noi_curpage);						
		redirect("index.php?com=photo&act=$act".$chuoi_noi_curpage);
	}
}

function delete($c,$act){
	global $d, $chuoi_noi_curpage;
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('com', $c);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=photo&act=$act".$chuoi_noi_curpage);
		$row = $d->fetch_array();
		delete_file(_upload_hinhanh.$row['photo']);
		delete_file(_upload_hinhanh.$row['thumb']);
		
		if($d->delete())
			redirect("index.php?com=photo&act=$act".$chuoi_noi_curpage);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=photo&act=$act".$chuoi_noi_curpage);
	}else transfer("Không nhận được dữ liệu", "index.php?com=photo&act=$act".$chuoi_noi_curpage);
}

?>