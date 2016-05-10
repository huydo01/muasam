<?php if(!defined('_kiemtraweb') || _kiemtraweb!=$check_website) daysangtranglogin(); ?>

	<!-- Logo Start -->
    <a href="index.php">
      <div class="logo-container">
        <h1>ADMIN</h1>
      </div>
    </a>
    <!-- Logo End -->    
	
    <!-- Sidebar -->
    <div class="responsive-menu">
      <a href="#" onclick="return false;"><i class="fa fa-bars"></i></a>
    </div>
    <!-- Sidebar End -->   

    <!-- Menu Start -->
    <div class="tocify-nav-container">
    <ul class="menu tocify-box"> 
		<li class="parent purple <?=($com=='product')?'active':''?>">
			<a href="product" class="menu_click <?=($_SESSION['menu']['product']==2)?'':' close-child'?>">
				<span class="menu-icon"><i class="fa fa-align-justify"></i></span>
				<span class="menu-text">MODULE SẢN PHẨM</span>
			</a>
			<ul class="child" <?=($_SESSION['menu']['product']==2)?' style="display: none;"':' style="display: block;"'?>>
				<li <?=($com=='product' && $act=='man_cat')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=product&act=man_cat">Danh mục cấp 1</a></li>
		
				<li <?=($com=='product' && $act=='man_cat1')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=product&act=man_cat1">Danh mục cấp 2</a></li>
				
				<li <?=($com=='product' && $act=='man_cat2')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=product&act=man_cat2">Danh mục cấp 3</a></li>
		
				<li <?=($com=='product' && $act=='man')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=product&act=man">Danh sách sản phẩm</a></li>          
	
		        <li <?=($com=='product1' && $act=='man_ptthanhtoan')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=product1&act=man_ptthanhtoan">Phương thức thanh toán</a></li> 
		  
				<li <?=($com=='product1' && $act=='man_ptgiaonhan')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=product1&act=man_ptgiaonhan">Phương thức giao nhận</a></li> 
				
				<li <?=($com=='donhang')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=donhang&act=man">Đơn hàng</a></li>
		
			</ul>
		</li>
	  
	  
		<li class="parent purple <?=($com=='tin3cap')?'active':''?>">
			<a href="tinnho" class="menu_click <?=($_SESSION['menu']['tin3cap']==2)?'':' close-child'?>">
				<span class="menu-icon"><i class="fa fa-clipboard"></i></span>
				<span class="menu-text">MODULE TIN TỨC</span>
			</a>
			<ul class="child" <?=($_SESSION['menu']['tin3cap']==2)?' style="display: none;"':' style="display: block;"'?>>
				<li <?=($com=='tin3cap' && $act=='man_cat')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=tin3cap&act=man_cat">Danh mục cấp 1</a></li>   

				<li <?=($com=='tin3cap' && $act=='man_cat1')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=tin3cap&act=man_cat1">Danh mục cấp 2</a></li>    
         
				<li <?=($com=='tin3cap' && $act=='man_cat2')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=tin3cap&act=man_cat2">Danh mục cấp 3</a></li>

				<li <?=($com=='tin3cap' && $act=='man')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=tin3cap&act=man">Tin tức</a></li>                    
			</ul>
		</li>
	  <!--
	        <li class="parent purple <?=($com=='congtrinh')?'active':''?>">
        <a href="tinnho" class="menu_click <?=($_SESSION['menu']['congtrinh']==2)?'':' close-child'?>">
          <span class="menu-icon"><i class="fa fa-clipboard"></i></span>
          <span class="menu-text">MODULE BÁO GIÁ</span>
        </a>
        <ul class="child" <?=($_SESSION['menu']['congtrinh']==2)?' style="display: none;"':' style="display: block;"'?>>
           <li <?=($com=='congtrinh' && $act=='man_cat')?' class="active"':''?>><i class="fa fa-check"></i> 
        <a href="index.php?com=congtrinh&act=man_cat">Danh mục cấp 1</a></li>    

          <li <?=($com=='congtrinh' && $act=='man_cat1')?' class="active"':''?>><i class="fa fa-check"></i> 
          <a href="index.php?com=congtrinh&act=man_cat1">Danh mục cấp 2</a></li>    
          <li <?=($com=='congtrinh' && $act=='man_cat2')?' class="active"':''?>><i class="fa fa-check"></i> 
          <a href="index.php?com=congtrinh&act=man_cat2">Danh mục cấp 3</a></li>

          <li <?=($com=='congtrinh' && $act=='man')?' class="active"':''?>><i class="fa fa-check"></i> 
          <a href="index.php?com=congtrinh&act=man">Báo giá</a></li>                    
        </ul>
      </li>
	  -->
	  
	  

	  
		<li class="parent purple <?=($com=='images')?'active':''?>">
			<a href="about" class="menu_click <?=($_SESSION['menu']['images']==2)?'':' close-child'?>">
				<span class="menu-icon"><i class="fa fa-file-text-o"></i></span>
				<span class="menu-text">MODULE ALBUM ẢNH</span>
			</a>
			<ul class="child" <?=($_SESSION['menu']['images']==2)?' style="display: none;"':' style="display: block;"'?>>
				<li <?=($com=='images')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=images&act=man_cat">Hình ảnh</a></li>                               
		  
			</ul>
		</li>

		<li class="parent purple <?=($com=='about')?'active':''?>">
			<a href="about" class="menu_click <?=($_SESSION['menu']['about']==2)?'':' close-child'?>">
				<span class="menu-icon"><i class="fa fa-file-text-o"></i></span>
				<span class="menu-text">MODULE 1 BÀI VIẾT</span>
			</a>
			<ul class="child" <?=($_SESSION['menu']['about']==2)?' style="display: none;"':' style="display: block;"'?>>
				<li <?=($com=='about' && $act=='capnhap')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=about&act=capnhap">Giới thiệu</a></li>   
			<!--<li <?=($com=='about' && $act=='capnhap1')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=about&act=capnhap1">Đại lý</a></li>-->
   
				<li <?=($com=='about' && $act=='capnhap2')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=about&act=capnhap2">Tuyển dụng</a></li>
			</ul>
		</li>


      <!--<li class="parent purple <?=($com=='tinnho' || $com=='tracking')?'active':''?>">
        <a href="tinnho" class="menu_click <?=($_SESSION['menu']['tinnho']==2 || $_SESSION['menu']['tracking']==2)?'':' close-child'?>">
          <span class="menu-icon"><i class="fa fa-clipboard"></i></span>
          <span class="menu-text">MODULE TIN TỨC</span>
        </a>
        <ul class="child" <?=($_SESSION['menu']['tinnho']==2 || $_SESSION['menu']['tracking']==2)?' style="display: none;"':' style="display: block;"'?>>
		   
          <li <?=($com=='tinnho' && $act=='man')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=tinnho&act=man">Góc làm đẹp</a></li>   
		  
          
          <li <?=($com=='tinnho' && $act=='man1')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=tinnho&act=man1">Sau khi sử dụng</a></li>
		

         <li <?=($com=='tinnho' && $act=='man2')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=tinnho&act=man2">Sao nói gì</a></li>
      
           <!--     <li <?=($com=='tinnho' && $act=='man3')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=tinnho&act=man3">Tuyển dụng</a></li>

          <li <?=($com=='tinnho' && $act=='man4')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=tinnho&act=man4">Slogan </a></li>    
		 
			<li <?=($com=='tinnho' && $act=='man5')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=tinnho&act=man5">Slogan </a></li> 
			
		 
        </ul>
      </li> -->
      




		<li class="parent purple <?=($com=='photo')?'active':''?>">
			<a href="photo" class="menu_click <?=($_SESSION['menu']['photo']==2)?'':' close-child'?>">
          <span class="menu-icon"><i class="fa fa-th"></i></span>
          <span class="menu-text">MODULE KHÁC</span>
        </a>
        <ul class="child" <?=($_SESSION['menu']['photo']==2)?' style="display: none;"':' style="display: block;"'?>>          
 <li <?=($com=='photo' && $act=='capnhap_banner')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=photo&act=capnhap_banner">Cập nhật Banner</a></li>
          <li <?=($com=='photo' && $act=='man')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=photo&act=man">Quản lý SlideShow</a></li> 	    
      <!--<li <?=($com=='photo' && $act=='man1')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=photo&act=man1">Đối tác</a></li>-->
          
          <!--<li class="likc"></li>
         <li <?=($com=='photo' && $act=='capnhap_background')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=photo&act=capnhap_background">Cập nhật Background</a></li>
		 -->
       <li <?=($com=='photo' && $act=='man_yahoo')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=photo&act=man_yahoo">Hỗ trợ trực tuyến</a></li>
		  <!--
         <li <?=($com=='photo' && $act=='man_hotline')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=photo&act=man_hotline">Quản lý Hotline</a></li>
		 -->
          <li <?=($com=='photo' && $act=='man_video')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=photo&act=man_video">Video</a></li>	
		<!--
          <li <?=($com=='photo' && $act=='man_chiase')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=photo&act=man_chiase">Quản lý link</a></li>
-->		  
          <li <?=($com=='photo' && $act=='man_lkweb')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=photo&act=man_lkweb">Liên kết mạng xã hội</a></li>        
		<!--<li <?=($com=='photo' && $act=='man2')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=photo&act=man2">Background</a></li>         
          <li class="likc"></li>
		  -->  
		  <!--
          <li <?=($com=='photo' && $act=='man_quangcao2ben')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=photo&act=man_quangcao2ben">Quảng cáo 2 bên LEFT</a></li>       
          <li <?=($com=='photo' && $act=='man_quangcao2ben1')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=photo&act=man_quangcao2ben1">Quảng cáo 2 bên RIGHT</a></li>
		  -->
        </ul>
      </li>     
      
      <li class="parent purple <?=($com=='company')?'active':''?>">
        <a href="photo" class="menu_click <?=($_SESSION['menu']['company']==2)?'':' close-child'?>">
          <span class="menu-icon"><i class="fa fa-th"></i></span>
          <span class="menu-text">THÔNG TIN CÔNG TY</span>
        </a>
        <ul class="child" <?=($_SESSION['menu']['company']==2)?' style="display: none;"':' style="display: block;"'?>>          
          <li <?=($com=='company' && $act=='capnhap')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=company&act=capnhap">Thông Tin Công Ty</a></li>
          <li <?=($com=='company' && $act=='man1')?' class="active"':''?>><i class="fa fa-check"></i> <a href="index.php?com=company&act=man1">Bản đồ</a></li>                    
        </ul>
      </li>     
                  
            
    </ul>   
    </div>     
    <!-- Menu End -->        