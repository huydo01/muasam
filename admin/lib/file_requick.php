<?php
	if(!defined('_kiemtraweb') || _kiemtraweb!=$check_website) die('Eror');
	
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$d = new database($config['database']);
	$trangchu_index = 0;
	switch($com){
						
		//Tin 1 nội dung
	
		case 'gioi-thieu':			
			$source = "about/about";
			$template = "about/about";
			break;
		
		case 'about-us':			
			$source = "about/about-us";
			$template = "about/about-us";
			break;

			
        case 'dai-ly':			
			$source = "about/about1";
			$template = "about/about1";
			break;
			
		/*case 'tuyen-dung':			
			$source = "about/about2";
			$template = "about/about2";
			break;*/	
        
        case 'cataloge':			
			$source = "cataloge";
			$template = "cataloge";
			break;	
            
        case 'can-ho-mau':			
			$source = "canhomau";
			$template = "canhomau";
			break;		
					
		
		//Tin bài viết
		case 'goc-lam-dep':	
			$trangchu_index = 1;				
			$source = "tintuc/news";
			$template = "tintuc/news";
			break;
			
		case 'sao-noi-gi':	
			$trangchu_index = 1;				
			$source = "tintuc/news2";
			$template = "tintuc/news2";
			break;
			
		case 'sau-khi-su-dung':	
			$trangchu_index = 1;				
			$source = "tintuc/news1";
			$template = "tintuc/news1";
			break;	
		
		case 'tuyen-dung':	
			$trangchu_index = 1;				
			$source = "tintuc/news3";
			$template = "tintuc/news3";
			break;	
			
		case 'gioi-thieu':	
			$trangchu_index = 1;				
			$source = "tintuc/news4";
			$template = "tintuc/news4";
			break;		

			
		case 'dich-vu-tu-van1':							
			$source = "tintuc/baitext/news";
			$template = "tintuc/baitext/news";
			break;
            
            
		case 'hoan-thien':					
			$source = "tintuc/tin1cap/news";
			$template = isset($_GET['id']) ? "tintuc/tin1cap/news_projects_detail" :"tintuc/tin1cap/news";
			break;
		case 'bao-gia':					
			$source = "tintuc/tin1cap/news1";
			$template = "tintuc/tin1cap/news1";
			break;
		
		
			
			
			
			
		
		//CÔNG TY
		/*case 'ban-do':
			$trangchu_index = 1;
			$source = "contact/map";
			$template = "contact/map";
			break;*/
		/*case 'so-do-trang':			
			$source = "contact/so-do-trang";
			$template = "contact/so-do-trang";
			break;*/
		case 'lien-he':		
			$source = "contact/contact";
			$template = "contact/contact_toado";
			break;		
		/*case 'gui-thong-tin':
			$source = "contact/thongtin";
			break;*/
			
							
		//ALBUM HÌNH ẢNH
		case 'hinh-anh':			
			$source = "hinhanh/hinhanh";
			$template = "hinhanh/hinhanh";
			break;	
			
		case 'video':			
			$source = "hinhanh/video";
			$template = "hinhanh/video";
			break;		
		
		
					
		
		//Sản phẩm
		/*case 'tim-kiem':
			$trangchu_index = 2;
			$source = "sanpham/timkiem";
			$template = "sanpham/timkiem";
			break;*/	
		/*case 'tim-kiem-nang-cao':
			$source = "sanpham/timkiemnangcao";
			$template = "sanpham/product";
			break;				
		case 'dia-diem':
			if($_SESSION['tknc']) unset($_SESSION['tknc']);
			$source = "sanpham/diadiem";
			$template = "sanpham/product";	
			break;*/
		case 'san-pham':						
			$source = "sanpham/product";
			$template = isset($_GET['id']) ? "sanpham/product_detail_news" : "sanpham/product";	
			break;		
			
		case 'kk-furniture':						
			$source = "sanpham/kkfurniture";
			$template = isset($_GET['id']) ? "sanpham/kkfurniture_news" : "sanpham/kkfurniture";	
			break;	
			
		case 'kk-kids':						
			$source = "sanpham/kkkids";
			$template = isset($_GET['id']) ? "sanpham/kkkids_news" : "sanpham/kkkids";	
			break;		

			
		case 'gio-hang':
			$trangchu_index = 2;
			$source = "sanpham/giohang";
			$template = "sanpham/giohang";
			break;	
		case 'thanh-toan':
			$trangchu_index = 2;
			$source = "sanpham/thanhtoan";
			$template = "sanpham/thanhtoan";
			break;
		
		
		
		//USER
		/*case 'dang-ky':
			$source = "member/register";
			$template = "member/register";
			break;
		case 'dang-nhap':
			$source = "member/login";
			$template = "member/login";			
			break;
		case 'activation':
			$source = "member/activation";
			$template = "index";
			break;*/
		
		//ĐĂNG KÝ NHẬN TIN
		/*case 'dang-ky-nhan-tin':
			$source = "newsletter/newsletter";
			break;*/
		
		default: 			
			$trangchu_index = 1;
			$source = "index";
			$template = "index";
			break;
	}
	
	//CODE SÀI CHUNG CHO WEBSITE	
	$d->reset();
	$sql= "select * from #_product_cat where hienthi=1 and com='cat' order by stt asc, id desc";
	$d->query($sql);
	$cat_main = $d->result_array();		
	$d->reset();	
	$sql = "select * from #_company where com='toado' limit 0,1";
	$d->query($sql);
	$toado = $d->fetch_array();	
	
	//Thông tin Website
	$sql = "select * from #_company where com='company' limit 0,1";
	$d->query($sql);
	$company = $d->fetch_array();			
	
	$title_bar = $company['title'];
	$description = $company['description'];
	$keywords = $company['keywords'];
	
	if($source!="") include _source.$source.".php";			
				
?>