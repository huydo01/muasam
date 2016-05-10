<?php if(!defined('_kiemtraweb') || _kiemtraweb!=$check_website) daysangtranglogin(); ?>

<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
        elements : "noidung",
		theme : "advanced",
		convert_urls : false,
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,imagemanager,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
height:"500px",
    width:"100%",
	remove_script_host : false,

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",		
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>

<!-- Breadcrumbs Start -->
  <div class="row breadcrumbs">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <ul class="breadcrumbs">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li><a href="index.php?com=donhang&act=man">Đơn Hàng</a></li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumbs End -->
        
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    	<!--<div class="inner" style="margin-bottom:10px;">
            <div class="message-box info">
              <i class="fa fa-exclamation-circle"></i>
              <p>Lưu ý: Chỉ nên có tối đa 4-5 bản đồ, tên bản đồ không nên đặt dài quá, nên đặt số thứ tự chính xác để dễ quản lý!</p>
            </div>
        </div>-->
    
    
		<!-- Inline Form Start -->
          <div class="boxed no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="inner">

              <!-- Title Bar Start -->
              <div class="title-bar">
                <h4>Đơn Hàng</h4>
              </div>
              <!-- Title Bar End -->
			  <?php
				  function tinhtrang($i=0)
				  {
					  $sql="select * from table_product_phu where com='tinhtrang' order by stt,id desc";
					  $stmt=mysql_query($sql);
					  $str='
						  <select id="id_trangthai" name="id_trangthai" class="main_font">					
						  ';
					  while ($row=@mysql_fetch_array($stmt)) 
					  {
						  if($row["id"]==$i || ($i==0 && $row["noibat"]==1))
							  $selected="selected";
						  else 
							  $selected="";
						  $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
					  }
					  $str.='</select>';
					  return $str;
				  }			  
			  ?>                             
              <form method="post" name="frm" action="index.php?com=donhang&act=save<?=$chuoi_noi_curpage?>" enctype="multipart/form-data" class="basic-form inline-form">
              	
                <div class="col-md-2"><label>Mã đơn hàng </label></div>
                <div class="col-md-10 text">: <?=@$item['madonhang']?></div>
                <div class="clearfix"></div>
                <div class="col-md-2"><label>Họ tên </label></div>
                <div class="col-md-10 text">: <?=@$item['hoten']?></div>
                <div class="clearfix"></div>
                <div class="col-md-2"><label>Điện thoại </label></div>
                <div class="col-md-10 text">: <?=@$item['dienthoai']?></div>
                <div class="clearfix"></div>
                <div class="col-md-2"><label>Email </label></div>
                <div class="col-md-10 text">: <?=@$item['email']?></div>
                <div class="clearfix"></div>
                <div class="col-md-2"><label>Địa chỉ </label></div>
                <div class="col-md-10 text">: <?=@$item['diachi']?></div>
                <div class="clearfix"></div>
                
                <div class="col-md-2" style="width:100%"><label>Danh sách SP</label></div>
                <div class="col-md-10"><?=@$item['donhang']?><br /></div> 
                <div class="clearfix"></div>
                
                <div class="col-md-2"><label>Ghi chú của khách hàng</label></div>
                <div class="col-md-10 text">: <?=@$item['noidung']?><br /></div> 
                <div class="clearfix"></div>                               
                               
                <div class="col-md-2">Tình trạng</div>
                <div class="col-md-10"><?=tinhtrang($item['trangthai'])?></div>
                <div class="clearfix"></div>
                
                <div class="col-md-2"><label>Ghi chú</label></div>
                <div class="col-md-10"><textarea name="ghichu" id="ghichu" cols="50" rows="6"><?=$item['ghichu']?></textarea><br /></div> 
                <div class="clearfix"></div>
                
				<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
                
                <div class="col-md-10 col-md-offset-2">                  
                  <button type="button" onclick="javascript:document.frm.submit()" class="btn btn-success"><i class="fa fa-check"></i> Lưu</button>
                  <button type="button" onclick="javascript:window.location='index.php?com=donhang&act=man<?=$chuoi_noi_curpage?>'" class="btn btn-info"><i class="fa fa-share"></i> Thoát</button>
                </div>

                <div class="clearfix"></div>

              </form>

            </div>
          </div>
          <!-- Inline Form End -->
	</div>