<?php	if(!defined('_kiemtraweb') || _kiemtraweb!=$check_website) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

#=========TIN TỨC==================================================
$chuoi_noi = ((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['id_cat1']!="")?("&id_cat1=".$_REQUEST['id_cat1'].""):"").((@$_REQUEST['id_cat2']!="")?("&id_cat2=".$_REQUEST['id_cat2'].""):"");
$chuoi_noi_curpage = ((@$_REQUEST['search']!="")?("&search=".$_REQUEST['search'].""):"").$chuoi_noi.((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):"");
#=========DANH MỤC CẤP 1 ================================	
$chuoi_noi_curpage1 = ((@$_REQUEST['search']!="")?("&search=".$_REQUEST['search'].""):"").((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):"");
#======DANH MỤC CẤP 2====================================
$chuoi_noi2 = ((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"");
$chuoi_noi_curpage2 = ((@$_REQUEST['search']!="")?("&search=".$_REQUEST['search'].""):"").$chuoi_noi2.((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):"");
#==========DANH MỤC CẤP 3================================	
$chuoi_noi3 = ((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['id_cat1']!="")?("&id_cat1=".$_REQUEST['id_cat1'].""):"");
$chuoi_noi_curpage3 = ((@$_REQUEST['search']!="")?("&search=".$_REQUEST['search'].""):"").$chuoi_noi3.((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):"");

switch($act){

	#==DANH MỤC CẤP 1=====================================	
	case "man_cat":
		get_cats();
		$template = "tintuc/congtrinh/cap1/cats";
		break;
	case "add_cat":
		$template = "tintuc/congtrinh/cap1/cat_add";
		break;
	case "edit_cat":
		get_cat();
		$template = "tintuc/congtrinh/cap1/cat_add";
		break;
	case "save_cat":
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;
		
	#==DANH MỤC CẤP 2=====================================	
	case "man_cat1":
		get_cat1s();
		$template = "tintuc/congtrinh/cap2/items";
		break;
	case "add_cat1":
		$template = "tintuc/congtrinh/cap2/item_add";
		break;
	case "edit_cat1":
		get_cat1();
		$template = "tintuc/congtrinh/cap2/item_add";
		break;
	case "save_cat1":
		save_cat1();
		break;
	case "delete_cat1":
		delete_cat1();
		break;
		
	#==DANH MỤC CẤP 3===================================	
	case "man_cat2":
		get_cat2s();
		$template = "tintuc/congtrinh/cap3/items";
		break;
	case "add_cat2":
		$template = "tintuc/congtrinh/cap3/item_add";
		break;
	case "edit_cat2":
		get_cat2();
		$template = "tintuc/congtrinh/cap3/item_add";
		break;
	case "save_cat2":
		save_cat2();
		break;
	case "delete_cat2":
		delete_cat2();
		break;
	
	#==TIN TỨC =======================================
	case "man":
		gets();
		$template = "tintuc/congtrinh/items";
		break;
	case "add":
		$template = "tintuc/congtrinh/item_add";
		break;
	case "edit":		
		get();		
		$template = "tintuc/congtrinh/item_add";
		break;
	case "save":
		save();
		break;
	case "delete":
		delete();
		break;
	
	
	
	//HÌNH ẢNH	
	case "man_photo":
		get_photos();
		$template = "tintuc/congtrinh/photos";
		break;
	case "add_photo":
		$template = "tintuc/congtrinh/photo_add";
		break;
	case "edit_photo":
		get_photo();
		$template = "tintuc/congtrinh/photo_edit";
		break;
	case "save_photo":
		save_photo();
		break;
	case "delete_photo":
		delete_photo();
		break;
	

	default:
		$template = "index";
}


###################################################################

//==DANH MỤC CẤP 1-1 ==================================================
function get_cats(){
	global $d, $items, $paging, $chuoi_noi_curpage1;
	
	thaydoi_hienthi('noibat','table_congtrinh_cat','congtrinh','man_cat',$chuoi_noi_curpage1);
	thaydoi_hienthi('hienthi','table_congtrinh_cat','congtrinh','man_cat',$chuoi_noi_curpage1);
	
	$sql = "select * from #_congtrinh_cat where com='cat' ";
	if($_REQUEST['search']!=''){
		$ten = magic_quote($_REQUEST['search']);
		$ten = str_replace('%20',' ',$ten);
		$sql.=" and ten_vi like '%$ten%'";
	}
	$sql .= " order by stt asc,id desc";
		
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=congtrinh&act=man_cat";
	if(isset($_REQUEST['search']))
		$url .= "&search=".$_REQUEST['search'];	
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item, $chuoi_noi_curpage1;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=congtrinh&act=man_cat".$chuoi_noi_curpage1);
	
	$sql = "select * from #_congtrinh_cat where id=$id and com='cat'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=congtrinh&act=man_cat".$chuoi_noi_curpage1);
	$item = $d->fetch_array();
}

function save_cat(){
	global $d, $chuoi_noi_curpage1;
	$file_name=q_tenhinh($_FILES['file']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=congtrinh&act=man_cat".$chuoi_noi_curpage1);
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	//Dùng chung
	$data['ten_vi'] = magic_quote($_POST['ten_vi']);	
	$data['tenkhongdau'] = q_bodautv($_POST['ten_vi']); 
	$data['ten_en'] = magic_quote($_POST['ten_en']);	
	$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);	
	$data['noidung_en'] = magic_quote($_POST['noidung_en']);	
	
	$data['title'] = magic_quote($_POST['title']);
	$data['description'] = magic_quote($_POST['description']);
	$data['keywords'] = magic_quote($_POST['keywords']);
	
	$data['stt'] = magic_quote($_POST['stt']);		
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
	
	if($id){		
		if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF',_upload_congtrinh,$file_name)){
			$data['photo'] = $photo;			
			$d->setTable('congtrinh_cat');
			$d->setWhere('id', $id);
			$d->setWhere('com', 'cat');
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_congtrinh.$row['photo']);
			}
		}
						
		$d->setTable('congtrinh_cat');
		$d->setWhere('id', $id);
		$d->setWhere('com', 'cat');
		if($d->update($data))
			redirect("index.php?com=congtrinh&act=man_cat".$chuoi_noi_curpage1);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=congtrinh&act=man_cat".$chuoi_noi_curpage1);
	}else{
		$data['com'] = 'cat';
		
		if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF',_upload_congtrinh,$file_name)){
			$data['photo'] = $photo;					
		}					
		
		$d->setTable('congtrinh_cat');
		if($d->insert($data))
			redirect("index.php?com=congtrinh&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=congtrinh&act=man_cat".$chuoi_noi_curpage1);
	}
}

function delete_cat(){
	global $d, $chuoi_noi_curpage1;
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		$d->reset();	
		
		//Xóa tin nhỏ.
		$sql = "select * from #_congtrinh where id_cat=$id";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_congtrinh.$row['photo']);
				delete_file(_upload_congtrinh.$row['thumb']);
			}
			$sql = "delete from #_congtrinh where id_cat='".$id."'";
			$d->query($sql);
		}
		
		//Xóa cấp 2 và cấp 3 của nó.
		$sql = "select * from #_congtrinh_cat where id_cat=$id";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_congtrinh.$row['photo']);
			}
			$sql = "delete from #_congtrinh_cat where id_cat=$id";
			$d->query($sql);
		}						
		
		//Xóa ảnh của nó
		$sql = "select * from #_congtrinh_cat where id=$id";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_congtrinh.$row['photo']);
			}
		}
		//Xóa nó
		$sql = "delete from #_congtrinh_cat where id=$id";
		if($d->query($sql))
			redirect("index.php?com=congtrinh&act=man_cat".$chuoi_noi_curpage1);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=congtrinh&act=man_cat".$chuoi_noi_curpage1);
	}else transfer("Không nhận được dữ liệu", "index.php?com=congtrinh&act=man_cat".$chuoi_noi_curpage1);
}

//==DANH MỤC CẤP 2-1 =================================================
function get_cat1s(){
	global $d, $items, $paging, $chuoi_noi_curpage2;
	
	thaydoi_hienthi('noibat','table_congtrinh_cat','congtrinh','man_cat1',$chuoi_noi_curpage2);
	thaydoi_hienthi('hienthi','table_congtrinh_cat','congtrinh','man_cat1',$chuoi_noi_curpage2);
	
	$sql = "select * from #_congtrinh_cat where com='cat1'";
		
	if((int)$_REQUEST['id_cat']!='')
		$sql.=" and id_cat=".$_REQUEST['id_cat']."";
	
	if($_REQUEST['search']!=''){
		$ten = magic_quote($_REQUEST['search']);
		$ten = str_replace('%20',' ',$ten);
		$sql.=" and ten_vi like '%$ten%'";
	}
	
	$sql.=" order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=congtrinh&act=man_cat1";
	if(isset($_REQUEST['id_cat']))
		$url .= "&id_cat=".$_REQUEST['id_cat'];		
	if(isset($_REQUEST['search']))
		$url .= "&search=".$_REQUEST['search'];	
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat1(){
	global $d, $item, $chuoi_noi_curpage2;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=congtrinh&act=man_cat1".$chuoi_noi_curpage2);
	
	$sql = "select * from #_congtrinh_cat where id=$id and com='cat1'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=congtrinh&act=man_cat1".$chuoi_noi_curpage2);
	$item = $d->fetch_array();
}

function save_cat1(){
	global $d, $chuoi_noi_curpage2, $chuoi_noi2;
	$file_name=q_tenhinh($_FILES['file']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=congtrinh&act=man_cat1".$chuoi_noi_curpage2);
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	//Dùng chung
	$data['id_cat'] = intval($_POST['id_cat']);		
	$data['ten_vi'] = magic_quote($_POST['ten_vi']);	
	$data['ten_en'] = magic_quote($_POST['ten_en']);	
	$data['tenkhongdau'] = q_bodautv($_POST['ten_vi']);
	$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);			
	$data['noidung_en'] = magic_quote($_POST['noidung_en']);			
	$data['title'] = magic_quote($_POST['title']);
	$data['description'] = magic_quote($_POST['description']);
	$data['keywords'] = magic_quote($_POST['keywords']);	
	$data['stt'] = magic_quote($_POST['stt']);	
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;	
	
	if($id){		
		if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF',_upload_congtrinh,$file_name)){
			$data['photo'] = $photo;			
			$d->setTable('congtrinh');
			$d->setWhere('id', $id);
			$d->setWhere('com', 'cat1');
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_congtrinh.$row['photo']);
			}
		}
			
		$d->setTable('congtrinh_cat');
		$d->setWhere('id', $id);
		$d->setWhere('com', 'cat1');
		if($d->update($data))
			redirect("index.php?com=congtrinh&act=man_cat1".$chuoi_noi_curpage2);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=congtrinh&act=man_cat1".$chuoi_noi_curpage2);
	}else{
		$data['com'] = 'cat1';		
		if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF',_upload_congtrinh,$file_name)){
			$data['photo'] = $photo;					
		}			
		
		$d->setTable('congtrinh_cat');
		if($d->insert($data))
			redirect("index.php?com=congtrinh&act=man_cat1".$chuoi_noi2);
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=congtrinh&act=man_cat1".$chuoi_noi_curpage2);
	}
}

function delete_cat1(){
	global $d, $chuoi_noi_curpage2;
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		$d->reset();	
		
		//Xóa tin nhỏ.
		$sql = "select * from #_congtrinh where id_cat1=$id";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_congtrinh.$row['photo']);
				delete_file(_upload_congtrinh.$row['thumb']);
			}
			$sql = "delete from #_congtrinh where id_cat1=$id";
			$d->query($sql);
		}
		
		//Xóa cấp 3 của nó
		//Xóa ảnh của nó
		$sql = "select * from #_congtrinh_cat where id_cat1=$id";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_congtrinh.$row['photo']);
			}
		}			
		$sql = "delete from #_congtrinh_cat where id_cat1=$id";
		$d->query($sql);		
		
		//Xóa ảnh của nó
		$sql = "select * from #_congtrinh_cat where id=$id";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_congtrinh.$row['photo']);
			}
		}
			
		$sql = "delete from #_congtrinh_cat where id=$id";
		if($d->query($sql))
			redirect("index.php?com=congtrinh&act=man_cat1".$chuoi_noi_curpage2);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=congtrinh&act=man_cat1".$chuoi_noi_curpage2);
	}else transfer("Không nhận được dữ liệu", "index.php?com=congtrinh&act=man_cat1".$chuoi_noi_curpage2);
}

//==DANH MỤC CẤP 3-1 =================================================
function get_cat2s(){
	global $d, $items, $paging, $chuoi_noi_curpage3;
	
	thaydoi_hienthi('noibat','table_congtrinh_cat','congtrinh','man_cat2',$chuoi_noi_curpage3);
	thaydoi_hienthi('hienthi','table_congtrinh_cat','congtrinh','man_cat2',$chuoi_noi_curpage3);
		
	$sql = "select * from #_congtrinh_cat where com='cat2' ";
	if((int)$_REQUEST['id_cat']!='')
		$sql.=" and id_cat=".$_REQUEST['id_cat']."";
	if((int)$_REQUEST['id_cat1']!='')
		$sql.=" and id_cat1=".$_REQUEST['id_cat1']."";
	
	if($_REQUEST['search']!=''){
		$ten = magic_quote($_REQUEST['search']);
		$ten = str_replace('%20',' ',$ten);
		$sql.=" and ten_vi like '%$ten%'";
	}
	$sql .= " order by stt asc, id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=congtrinh&act=man_cat2";
	if(isset($_REQUEST['search']))
		$url .= "&search=".$_REQUEST['search'];	
		
	if(isset($_REQUEST['id_cat']))
		$url .= "&id_cat=".$_REQUEST['id_cat'];
	if(isset($_REQUEST['id_cat1']))
		$url .= "&id_cat1=".$_REQUEST['id_cat1'];
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat2(){
	global $d, $item, $chuoi_noi_curpage3;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=congtrinh&act=man_cat2".$chuoi_noi_curpage3);
	
	$sql = "select * from #_congtrinh_cat where id=$id and com='cat2'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=congtrinh&act=man_cat2".$chuoi_noi_curpage3);
	$item = $d->fetch_array();
}

function save_cat2(){
	global $d, $chuoi_noi_curpage3, $chuoi_noi3;
	$file_name=q_tenhinh($_FILES['file']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=congtrinh&act=man_cat2".$chuoi_noi_curpage3);
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	//Dùng chung
	$data['id_cat'] = intval($_POST['id_cat']);
	$data['id_cat1'] = intval($_POST['id_cat1']);	
	$data['ten_vi'] = magic_quote($_POST['ten_vi']);	
	$data['ten_en'] = magic_quote($_POST['ten_en']);
	$data['tenkhongdau'] = q_bodautv($_POST['ten_vi']);
	$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);
	$data['noidung_en'] = magic_quote($_POST['noidung_en']);		
	$data['title'] = magic_quote($_POST['title']);
	$data['description'] = magic_quote($_POST['description']);
	$data['keywords'] = magic_quote($_POST['keywords']);
	
	$data['stt'] = magic_quote($_POST['stt']);	
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
	
	if($id){		
		if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF',_upload_congtrinh,$file_name)){
			$data['photo'] = $photo;			
			$d->setTable('congtrinh');
			$d->setWhere('id', $id);
			$d->setWhere('com', 'cat2');
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_congtrinh.$row['photo']);
			}
		}
				
		$d->setTable('congtrinh_cat');
		$d->setWhere('id', $id);
		$d->setWhere('com', 'cat2');
		if($d->update($data))
			redirect("index.php?com=congtrinh&act=man_cat2".$chuoi_noi_curpage3);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=congtrinh&act=man_cat2".$chuoi_noi_curpage3);
	}else{
		$data['com'] = 'cat2';
		
		if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF',_upload_congtrinh,$file_name)){
			$data['photo'] = $photo;					
		}				
		
		$d->setTable('congtrinh_cat');
		if($d->insert($data))
			redirect("index.php?com=congtrinh&act=man_cat2".$chuoi_noi3);
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=congtrinh&act=man_cat2".$chuoi_noi_curpage3);
	}
}

function delete_cat2(){
	global $d, $chuoi_noi_curpage3;
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		$d->reset();	
		
		//Xóa tin nhỏ.
		$sql = "select * from #_congtrinh where id_cat2=$id";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_congtrinh.$row['photo']);
				delete_file(_upload_congtrinh.$row['thumb']);
			}
			$sql = "delete from #_congtrinh where id_cat2=$id";
			$d->query($sql);
		}						
		
		//Xóa ảnh của nó
		$sql = "select * from #_congtrinh_cat where id=$id";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_congtrinh.$row['photo']);
			}
		}
			
		$sql = "delete from #_congtrinh_cat where id=$id";
		if($d->query($sql))
			redirect("index.php?com=congtrinh&act=man_cat2".$chuoi_noi_curpage3);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=congtrinh&act=man_cat2".$chuoi_noi_curpage3);
	}else transfer("Không nhận được dữ liệu", "index.php?com=congtrinh&act=man_cat2".$chuoi_noi_curpage3);
}

#==TIN TỨC================================================
function gets(){
	global $d, $items, $paging, $chuoi_noi_curpage;
	
	thaydoi_hienthi('noibat','table_congtrinh','congtrinh','man',$chuoi_noi_curpage);
	thaydoi_hienthi('tinmoi','table_congtrinh','congtrinh','man',$chuoi_noi_curpage);
	thaydoi_hienthi('hienthi','table_congtrinh','congtrinh','man',$chuoi_noi_curpage);
			
	$sql = "select * from #_congtrinh where id<>0 ";
	if((int)$_REQUEST['id_cat']!=''&&(int)$_REQUEST['id_cat']!=0)	
		$sql.=" and id_cat=".(int)$_REQUEST['id_cat']."";
	if((int)$_REQUEST['id_cat1']!=''&&(int)$_REQUEST['id_cat1']!=0)
		$sql.=" and id_cat1=".(int)$_REQUEST['id_cat1']."";
	if((int)$_REQUEST['id_cat2']!=''&&(int)$_REQUEST['id_cat2']!=0)	
		$sql.=" and id_cat2=".(int)$_REQUEST['id_cat2']."";		
	
	if($_REQUEST['search']!=''){
		$ten = magic_quote($_REQUEST['search']);
		$ten = str_replace('%20',' ',$ten);
		$sql.=" and ten_vi like '%$ten%'";
	}
	$sql.=" order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=congtrinh&act=man";
	if(isset($_REQUEST['search']))
		$url .= "&search=".$_REQUEST['search'];	
	
	if(isset($_REQUEST['id_cat']))
		$url .= "&id_cat=".$_REQUEST['id_cat'];
	if(isset($_REQUEST['id_cat1']))
		$url .= "&id_cat1=".$_REQUEST['id_cat1'];
	if(isset($_REQUEST['id_cat2']))
		$url .= "&id_cat2=".$_REQUEST['id_cat2'];
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get(){
	global $d, $item, $chuoi_noi_curpage;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=congtrinh&act=man".$chuoi_noi_curpage);
	
	$sql = "select * from #_congtrinh where id=$id";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=congtrinh&act=man".$chuoi_noi_curpage);
	$item = $d->fetch_array();
}

function save(){
	global $d, $chuoi_noi_curpage, $chuoi_noi;
	$file_name=q_tenhinh($_FILES['file']['name']);
	$file_name1=q_tenhinh($_FILES['file1']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=congtrinh&act=man".$chuoi_noi_curpage);
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	//Dùng chung
	$data['id_cat'] = intval($_POST['id_cat']);
	$data['id_cat1'] = intval($_POST['id_cat1']);
	$data['id_cat2'] = intval($_POST['id_cat2']);	
	$data['ten_vi'] = magic_quote($_POST['ten_vi']);
	$data['ten_en'] = magic_quote($_POST['ten_en']);
	$data['tenkhongdau'] = q_bodautv($_POST['ten_vi']);
	$data['ten2'] = magic_quote($_POST['ten2']);	
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
		if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF',_upload_congtrinh,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 296, 188, _upload_congtrinh,$file_name,2);
			$d->setTable('congtrinh');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_congtrinh.$row['photo']);
				delete_file(_upload_congtrinh.$row['thumb']);
			}
		}
		
		if($download = upload_image("file1", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF|doc|DOC|docx|DOCX|pdf|PDF|xlsx|XLSX|pr|PR|zip|ZIP|rar|RAR',_upload_congtrinh,$file_name1)){
			$data['download'] = $download;
		
			$d->setTable('congtrinh');
			$d->setWhere('id', $id);
		
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_congtrinh.$row['download']);
				
			}
		}			
		
		$data['ngaytao'] = time();
		$data['ngaysua'] = time();
		
		$d->setTable('congtrinh');
		$d->setWhere('id', $id);
		if($d->update($data))
				redirect("index.php?com=congtrinh&act=man".$chuoi_noi_curpage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=congtrinh&act=man".$chuoi_noi_curpage);
	}else{		
		if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF',_upload_congtrinh,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 296, 188, _upload_congtrinh,$file_name,2);
		}
		if($download = upload_image("file1", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF|doc|DOC|docx|DOCX|pdf|PDF|xlsx|XLSX|pr|PR|zip|ZIP|rar|RAR',_upload_congtrinh,$file_name1)){
			$data['download'] = $download;
			
		}			
		
		$data['ngaytao'] = time();
		
		$d->setTable('congtrinh');
		if($d->insert($data))
			redirect("index.php?com=congtrinh&act=man".$chuoi_noi);
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=congtrinh&act=man".$chuoi_noi_curpage);
	}
}

function delete(){
	global $d, $chuoi_noi_curpage;
	
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		
		$d->reset();
		$sql = "select * from #_congtrinh where id=$id";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_congtrinh.$row['photo']);
				delete_file(_upload_congtrinh.$row['thumb']);
			}
			$sql = "delete from #_congtrinh where id=$id";
			$d->query($sql);
		}
		
		if($d->query($sql))
			redirect("index.php?com=congtrinh&act=man".$chuoi_noi_curpage);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=congtrinh&act=man".$chuoi_noi_curpage);
	}
	else if (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  intval($idTin);		
			
			$d->reset();
					
			$d->reset();
			$sql = "select * from #_congtrinh where id=$id";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_congtrinh.$row['photo']);
					delete_file(_upload_congtrinh.$row['thumb']);
				}
				$sql = "delete from #_congtrinh where id=$id";
				$d->query($sql);
			}

		}
		transfer("Xóa dữ liệu thành công", "index.php?com=congtrinh&act=man".$chuoi_noi_curpage);
	}	
	else transfer("Không nhận được dữ liệu", "index.php?com=congtrinh&act=man".$chuoi_noi_curpage);
}



#==HÌNH ẢNH==================================
function get_photos(){
	global $d, $items, $paging;
	
	
	
	
	if(@$_REQUEST['hienthi']!='')
	{
		$id_up = @$_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_congtrinh_photo where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		//echo "id:". $spdc1;
		if($hienthi==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_congtrinh_photo SET hienthi =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_congtrinh_photo SET hienthi =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	
		}	
		redirect("index.php?com=congtrinh&act=man_photo".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'').(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));	
	}
	
	$sql = "select * from #_congtrinh_photo where id_cat='".(intval($_REQUEST['id_cat']))."' order by id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=congtrinh&act=man_photo".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'');
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_photo(){
	global $d, $item;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=congtrinh&act=man_photo".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'').(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
	
	$sql = "select * from #_congtrinh_photo where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=congtrinh&act=man_photo".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'').(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
	$item = $d->fetch_array();
}

function save_photo(){
	global $d;
	$file_name=q_tenhinh($_FILES['file']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=congtrinh&act=man_photo".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'').(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	if($id){
		$data['id_cat'] = ($_POST['id_cat']);	
		if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF',_upload_congtrinh,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 296, 188, _upload_congtrinh,$file_name,2);
			$d->setTable('congtrinh_photo');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_congtrinh.$row['photo']);
				delete_file(_upload_congtrinh.$row['thumb']);
			}
		}		
		$data['ten_vi'] = ($_POST['ten_vi']);
		$data['ten_en'] = ($_POST['ten_en']);
		$data['tenkhongdau'] = q_bodautv($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('congtrinh_photo');
		$d->setWhere('id', $id);
		if($d->update($data))
				redirect("index.php?com=congtrinh&act=man_photo".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'').(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=congtrinh&act=man_photo".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'').(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
	}else{
		$data['id_cat'] = ($_POST['id_cat']);	
		for($i=0;$i<5;$i++){
			$file_name=q_tenhinh($_FILES['file'.$i]['name']);
			if($photo = upload_image("file$i", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF',_upload_congtrinh,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], 296, 188, _upload_congtrinh,$file_name,2);
				
				$data['ten_vi'] = ($_POST['ten_vi'.$i]);	
				$data['ten_en'] = ($_POST['ten_en'.$i]);				
			
				$data['stt'] = $_POST['stt'.$i];
				$data['hienthi'] = isset($_POST['hienthi'.$i]) ? 1 : 0;
				
				
				$d->setTable('congtrinh_photo');
				if($d->insert($data)){
				}
				else
					transfer("Lưu dữ liệu bị lỗi", "index.php?com=congtrinh&act=man_photo".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'').(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
			}		
			
		}
		redirect("index.php?com=congtrinh&act=man_photo".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'').(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
	}
}

function delete_photo(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		
		$d->reset();
		$sql = "select * from #_congtrinh_photo where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_congtrinh.$row['photo']);
				delete_file(_upload_congtrinh.$row['thumb']);
			}
			$sql = "delete from #_congtrinh_photo where id='".$id."'";
			$d->query($sql);
		}
		
		if($d->query($sql))
			redirect("index.php?com=congtrinh&act=man_photo".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'').(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=congtrinh&act=man_photo".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'').(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
	}else transfer("Không nhận được dữ liệu", "index.php?com=congtrinh&act=man_photo".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'').(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
}


?>