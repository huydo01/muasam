<?php	if(!defined('_kiemtraweb') || _kiemtraweb!=$check_website) die("Error");

$act = (isset($_REQUEST['act'])) ? magic_quote($_REQUEST['act']) : "";

$chuoi_noi_curpage = ((@$_REQUEST['search']!="")?("&search=".$_REQUEST['search'].""):"").(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:'');
$chuoi_noi1 = ((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"");
$chuoi_noi_curpage1 = ((@$_REQUEST['search']!="")?("&search=".$_REQUEST['search'].""):"").((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:'');

switch($act){
	//CAT
	case "man_cat":
		get_cats(0,'man_cat');
		$template = "hinhanh/images/cat";
		break;
	case "add_cat":
		$template = "hinhanh/images/cat_add";
		break;
	case "edit_cat":
		get_cat(0,'man_cat');
		$template = "hinhanh/images/cat_add";
		break;
	case "save_cat":
		save_cat(0,'man_cat',432,600,2);
		break;
	case "delete_cat":
		delete_cat(0,'man_cat');
		break;
		
	//HÌNH ẢNH	
	case "man":
		get_items(0,'man');
		$template = "hinhanh/images/photos";
		break;
	case "add":
		$template = "hinhanh/images/photo_add";
		break;
	case "edit":
		get_item(0,'man');
		$template = "hinhanh/images/photo_edit";
		break;
	case "save":
		save_item(0,'man',432,600,2);
		break;
	case "delete":
		delete_item(0,'man');
		break;
	default:
		$template = "index";
}

#====================================
#==CẤP 1====================================
function get_cats($c,$act){
	global $d, $items, $paging, $chuoi_noi_curpage;
			
	thaydoi_hienthi('noibat','table_images_cat','images',$act,$chuoi_noi_curpage);
	thaydoi_hienthi('hienthi','table_images_cat','images',$act,$chuoi_noi_curpage);		
	
	$sql = "select * from #_images_cat where com=$c ";	
	if($_REQUEST['search']!=''){
		$ten = magic_quote($_REQUEST['search']);
		$ten = str_replace('%20',' ',$ten);
		$sql.=" and ten like '%$ten%'";
	}
	$sql .= " order by id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=images&act=$act";
	if(isset($_REQUEST['search']))
		$url .= "&search=".$_REQUEST['search'];	
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}
function get_cat($c,$act){
	global $d, $item, $chuoi_noi_curpage;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=images&act=$act".$chuoi_noi_curpage);
	
	$sql = "select * from #_images_cat where id=$id";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=images&act=$act".$chuoi_noi_curpage);
	$item = $d->fetch_array();
}
function save_cat($c,$act,$width,$height,$truonghop){
	global $d, $chuoi_noi_curpage;
	$file_name=q_tenhinh($_FILES['file']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=images&act=$act".$chuoi_noi_curpage);
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	//Chung
	$data['com'] = $c;
	$data['ten_vi'] = magic_quote($_POST['ten_vi']);
	$data['ten_en'] = magic_quote($_POST['ten_en']);
	$data['tenkhongdau'] = q_bodautv($_POST['ten_vi']);
	
	$data['mota_vi'] = magic_quote($_POST['mota_vi']);
	$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);
	
	$data['mota_en'] = magic_quote($_POST['mota_en']);
	$data['noidung_en'] = magic_quote($_POST['noidung_en']);
	
	
	$data['title'] = magic_quote($_POST['title']);
	$data['description'] = magic_quote($_POST['description']);
	$data['keywords'] = magic_quote($_POST['keywords']);
	
	$data['stt'] = magic_quote($_POST['stt']);
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
	
	if($id){		
		if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF',_upload_images,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], $width, $height, _upload_images,$file_name,$truonghop);
			$d->setTable('images_cat');
			$d->setWhere('id', $id);
			$d->setWhere('com', ''.$c);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_images.$row['photo']);
				delete_file(_upload_images.$row['thumb']);
			}
		}						
		$d->setTable('images_cat');
		$d->setWhere('id', $id);
		$d->setWhere('com', ''.$c);
		if($d->update($data))
				redirect("index.php?com=images&act=$act".$chuoi_noi_curpage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=images&act=$act".$chuoi_noi_curpage);
	}else{		
		if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF',_upload_images,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], $width, $height, _upload_images,$file_name,$truonghop);
		}						
		$d->setTable('images_cat');
		if($d->insert($data))
			redirect("index.php?com=images&act=$act");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=images&act=$act".$chuoi_noi_curpage);
	}
}
function delete_cat($c,$act){
	global $d, $chuoi_noi_curpage;
	
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		
		$d->reset();
		$sql = "select * from #_images where id_cat=$id";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_images.$row['photo']);
				delete_file(_upload_images.$row['thumb']);
			}
			$sql = "delete from #_images where id_cat=$id";
			$d->query($sql);
		}
		
		$d->reset();
		$sql = "select * from #_images_cat where id=$id";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_images.$row['photo']);
				delete_file(_upload_images.$row['thumb']);
			}
			$sql = "delete from #_images_cat where id=$id";
			$d->query($sql);
		}
		
		if($d->query($sql))
			redirect("index.php?com=images&act=$act".$chuoi_noi_curpage);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=images&act=$act".$chuoi_noi_curpage);
	}else transfer("Không nhận được dữ liệu", "index.php?com=images&act=$act".$chuoi_noi_curpage);
}



#==HÌNH ẢNH==================================
function get_items($c,$act){
	global $d, $items, $paging, $chuoi_noi_curpage1;
			
	thaydoi_hienthi('hienthi','table_images','images',$act,$chuoi_noi_curpage1);	
	
	$sql = "select * from #_images where id_cat='".(intval($_REQUEST['id_cat']))."' and com=$c order by id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=images&act=$act";
	if(isset($_REQUEST['id_cat']))
		$url .= "&id_cat=".$_REQUEST['id_cat'];	
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item($c,$act){
	global $d, $item, $chuoi_noi_curpage1;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=images&act=$act".$chuoi_noi_curpage1);
	
	$sql = "select * from #_images where id=$id";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=images&act=$act".$chuoi_noi_curpage1);
	$item = $d->fetch_array();
}

function save_item($c,$act,$width,$height,$truonghop){
	global $d, $chuoi_noi_curpage1, $chuoi_noi1;
	$file_name=q_tenhinh($_FILES['file']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=images&act=$act".$chuoi_noi_curpage1);
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	//Dùng chung	
	
	if($id){	
		if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF',_upload_images,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], $width, $height, _upload_images,$file_name,$truonghop1);
			$d->setTable('images');
			$d->setWhere('id', $id);
			$d->setWhere('com', ''.$c);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_images.$row['photo']);
				delete_file(_upload_images.$row['thumb']);
			}
		}		
		$data['ten_vi'] = magic_quote($_POST['ten_vi']);		
		$data['ten_en'] = magic_quote($_POST['ten_en']);		
		$data['tenkhongdau'] = q_bodautv($_POST['ten_vi']);
		$data['stt'] = magic_quote($_POST['stt']);
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('images');
		$d->setWhere('id', $id);
		$d->setWhere('com', ''.$c);
		if($d->update($data))
				redirect("index.php?com=images&act=$act".$chuoi_noi_curpage1);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=images&act=$act".$chuoi_noi_curpage1);
	}else{
		$data['id_cat'] = intval($_REQUEST['id_cat']);	
		$data['com'] = $c;
		for($i=0;$i<5;$i++){
			$file_name=q_tenhinh($_FILES['file'.$i]['name']);
			if($photo = upload_image("file$i", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF',_upload_images,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], $width, $height, _upload_images,$file_name,$truonghop1);
				
				$data['ten_vi'] = magic_quote($_POST['ten_vi'.$i]);
				$data['ten_en'] = magic_quote($_POST['ten_en'.$i]);					
				$data['stt'] = magic_quote($_POST['stt'.$i]);
				$data['hienthi'] = isset($_POST['hienthi'.$i]) ? 1 : 0;
								
				$d->setTable('images');
				if($d->insert($data)){
				}
				else
					transfer("Lưu dữ liệu bị lỗi", "index.php?com=images&act=$act".$chuoi_noi_curpage1);
			}		
			
		}
		redirect("index.php?com=images&act=$act".$chuoi_noi1);
	}
}

function delete_item($c,$act){
	global $d, $chuoi_noi_curpage1;
	
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		
		$d->reset();
		$sql = "select * from #_images where id=$id";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_images.$row['photo']);
				delete_file(_upload_images.$row['thumb']);
			}
			$sql = "delete from #_images where id=$id";
			$d->query($sql);
		}
		
		if($d->query($sql))
			redirect("index.php?com=images&act=$act".$chuoi_noi_curpage1);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=images&act=$act".$chuoi_noi_curpage1);
	}else transfer("Không nhận được dữ liệu", "index.php?com=images&act=$act".$chuoi_noi_curpage1);
}


?>