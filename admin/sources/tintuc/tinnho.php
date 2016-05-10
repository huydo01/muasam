<?php	if(!defined('_kiemtraweb') || _kiemtraweb!=$check_website) die("Error");

$act = (isset($_REQUEST['act'])) ? magic_quote($_REQUEST['act']) : "";

$chuoi_noi_curpage = ((@$_REQUEST['search']!="")?("&search=".$_REQUEST['search'].""):"").(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:'');

switch($act){
	//$c là biến lưu vào com để phân biệt tin tức -> là các số từ 0-99, $act là $_REQUEST['act'] của mỗi tin tức;
	//$width: độ rộng ảnh thumb , $height: độ cao ảnh thumb , $truonghop: là các trường hợp 1,2,3 khi tạo ảnh thumb.

	//--TIN TỨC-----------------------------------
	case "man":
		gets(0,'man');
		$template = "tintuc/tinnho/item";
		break;
	case "add":
		$template = "tintuc/tinnho/item_add";
		break;
	case "edit":
		get(0,'man');
		$template = "tintuc/tinnho/item_add";
		break;
	case "save":
		save(0,'man',300,300,2);
		break;
	case "delete":
		delete(0,'man');
		break;
	
	//TIN TỨC 1 -----------------------------------
	case "man1":
		gets(1,'man1');
		$template = "tintuc/tinnho/item1";
		break;
	case "add1":
		$template = "tintuc/tinnho/item1_add";
		break;
	case "edit1":
		get(1,'man1');
		$template = "tintuc/tinnho/item1_add";
		break;
	case "save1":
		save(1,'man1',300,300,2);
		break;
	case "delete1":
		delete(1,'man1');
		break;
		
	//TIN TỨC 2 -----------------------------------
	case "man2":
		gets(2,'man2');
		$template = "tintuc/tinnho/item2";
		break;
	case "add2":
		$template = "tintuc/tinnho/item2_add";
		break;
	case "edit2":
		get(2,'man2');
		$template = "tintuc/tinnho/item2_add";
		break;
	case "save2":
		save(2,'man2',170,126,2);
		break;
	case "delete2":
		delete(2,'man2');
		break;
	
	//TIN TỨC 3 -----------------------------------
	case "man3":
		gets(3,'man3');
		$template = "tintuc/tinnho/item3";
		break;
	case "add3":
		$template = "tintuc/tinnho/item3_add";
		break;
	case "edit3":
		get(3,'man3');
		$template = "tintuc/tinnho/item3_add";
		break;
	case "save3":
		save(3,'man3',112,72,2);
		break;
	case "delete3":
		delete(3,'man3');
		break;
	
	
	
	//TIN TỨC 4 -----------------------------------
	case "man4":
		gets(4,'man4');
		$template = "tintuc/tinnho/item4";
		break;
	case "add4":
		$template = "tintuc/tinnho/item4_add";
		break;
	case "edit4":
		get(4,'man4');
		$template = "tintuc/tinnho/item4_add";
		break;
	case "save4":
		save(4,'man4',112,72,2);
		break;
	case "delete4":
		delete(4,'man4');
		break;
		
	//TIN TỨC 5 -----------------------------------
	case "man5":
		gets(5,'man5');
		$template = "tintuc/tinnho/item5";
		break;
	case "add5":
		$template = "tintuc/tinnho/item5_add";
		break;
	case "edit5":
		get(5,'man5');
		$template = "tintuc/tinnho/item5_add";
		break;
	case "save5":
		save(5,'man5',112,72,2);
		break;
	case "delete5":
		delete(5,'man5');
		break;	
	
	
	default:
		$template = "index";
}

#==TIN TỨC==================================
//$c là biến lưu vào com để phân biệt tin tức -> là các số từ 0-99, $act là $_REQUEST['act'] của mỗi tin tức;
//$width: độ rộng ảnh thumb , $height: độ cao ảnh thumb , $truonghop: là các trường hợp 1,2,3 khi tạo ảnh thumb.

function gets($c,$act){ 	//$c là biến lưu vào com để phân biệt tin tức, $act là $_REQUEST['act'] của mỗi tin tức;
	global $d, $items, $paging, $chuoi_noi_curpage;
	
	thaydoi_hienthi('noibat','table_tinnho','tinnho',$act,$chuoi_noi_curpage);
	thaydoi_hienthi('tinmoi','table_tinnho','tinnho',$act,$chuoi_noi_curpage);
	thaydoi_hienthi('hienthi','table_tinnho','tinnho',$act,$chuoi_noi_curpage);
			
	$sql = "select * from #_tinnho where com=$c ";
	
	if($_REQUEST['search']!=''){
		$ten = magic_quote($_REQUEST['search']);
		$ten = str_replace('%20',' ',$ten);
		$sql.=" and ten_vi like '%$ten%'";
	}
	$sql .= " order by id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=tinnho&act=$act";
	if(isset($_REQUEST['search']))
		$url .= "&search=".$_REQUEST['search'];	
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get($c,$act){
	global $d, $item, $chuoi_noi_curpage;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=tinnho&act=$act".$chuoi_noi_curpage);
	
	$sql = "select * from #_tinnho where com=$c and id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=tinnho&act=$act".$chuoi_noi_curpage);
	$item = $d->fetch_array();
}

function save($c,$act,$width,$height,$truonghop){
	global $d, $chuoi_noi_curpage;
	$file_name=q_tenhinh($_FILES['file']['name']);
		$file_name1=q_tenhinh($_FILES['file1']['name']);
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=tinnho&act=$act".$chuoi_noi_curpage);
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
		
	$data['ten_vi'] = magic_quote($_POST['ten_vi']);
	$data['ten_en'] = magic_quote($_POST['ten_en']);
	$data['tenkhongdau'] = q_bodautv($_POST['ten_vi']);
	
	$data['mota_vi'] = magic_quote($_POST['mota_vi']);
	$data['mota_en'] = magic_quote($_POST['mota_en']);
	
	
	$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);
	$data['noidung_en'] = magic_quote($_POST['noidung_en']);
	
	$data['title'] = magic_quote($_POST['title']);
	$data['description'] = magic_quote($_POST['description']);
	$data['keywords'] = magic_quote($_POST['keywords']);
	
	$data['stt'] = magic_quote($_POST['stt']);
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
	if($id){		
		if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF',_upload_tinnho,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], $width, $height, _upload_tinnho,$file_name,$truonghop);
			$d->setTable('tinnho');
			$d->setWhere('id', $id);
			$d->setWhere('com', ''.$c);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_tinnho.$row['photo']);
				delete_file(_upload_tinnho.$row['thumb']);
			}
		}			


		if($download = upload_image("file1", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF|doc|DOC|docx|DOCX|pdf|PDF|xlsx|XLSX',_upload_tinnho,$file_name1)){
			$data['download'] = $download;
		
			$d->setTable('tinnho');
			$d->setWhere('id', $id);
			$d->setWhere('com', ''.$c);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_tinnho.$row['download']);
				
			}
		}			

		$data['ngaytao'] = time();
		$data['ngaysua'] = time();
		
		$d->setTable('tinnho');
		$d->setWhere('id', $id);
		$d->setWhere('com', ''.$c);
		if($d->update($data))
				redirect("index.php?com=tinnho&act=$act".$chuoi_noi_curpage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=tinnho&act=$act".$chuoi_noi_curpage);
	}else{		
		if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF',_upload_tinnho,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], $width, $height, _upload_tinnho,$file_name,$truonghop);
		}	

		if($download = upload_image("file1", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF|doc|DOC|docx|DOCX|pdf|PDF|xlsx|XLSX',_upload_tinnho,$file_name1)){
			$data['download'] = $download;
			
		}			
		
		$data['com'] = $c;				
		$data['ngaytao'] = time();
		
		$d->setTable('tinnho');
		if($d->insert($data))
			redirect("index.php?com=tinnho&act=$act");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=tinnho&act=$act".$chuoi_noi_curpage);
	}
}

function delete($c,$act){
	global $d, $chuoi_noi_curpage;
	
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		
		$d->reset();
		$sql = "select * from #_tinnho where id=$id and com=$c";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_tinnho.$row['photo']);
				delete_file(_upload_tinnho.$row['thumb']);
			}
			$sql = "delete from #_tinnho where id=$id and com=$c";
			$d->query($sql);
		}
		
		if($d->query($sql))
			redirect("index.php?com=tinnho&act=$act".$chuoi_noi_curpage);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=tinnho&act=$act".$chuoi_noi_curpage);
	}else transfer("Không nhận được dữ liệu", "index.php?com=tinnho&act=$act".$chuoi_noi_curpage);
}

?>