<?php if(!defined('_kiemtraweb') || _kiemtraweb!=$check_website) daysangtranglogin(); ?>

<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
        elements : "noidung_vi,mota_vi,mota_en,noidung_en",
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


<script>
	$(document).ready(function(e) {
        $("#id_cat").change(function(e) {
            var id=$(this).val();
			$.ajax({
				url:'ajax/cat.php',
				type:'get',
				data:'id='+id,
				dataType:'html',
				success:function(data){
					$("#cat_div").html(data);
					$("#id_cat1").selectbox();  	
					
					$("#id_cat1").change(function(e) {
						var id=$(this).val();
						$.ajax({
							url:'ajax/cat1.php',
							type:'get',
							data:'id='+id,
							dataType:'html',
							success:function(data){
								$("#cat1_div").html(data);	
								$("#id_cat2").selectbox();  
							}
						});
					});
					
				}
			});
        });
		$("#id_cat1").change(function(e) {
            var id=$(this).val();
			$.ajax({
				url:'ajax/cat1.php',
				type:'get',
				data:'id='+id,
				dataType:'html',
				success:function(data){
					$("#cat1_div").html(data);	
					$("#id_cat2").selectbox();  
				}
			});
        });
				
    });
</script>

<!-- Breadcrumbs Start -->
  <div class="row breadcrumbs">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <ul class="breadcrumbs">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li><a href="index.php?com=product&act=man">Sản phẩm</a></li>
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
                <h4><button type="button" onclick="javascript:document.frm.submit()" class="btn btn-success"><i class="fa fa-check"></i> Lưu</button></h4>
              </div>
              <!-- Title Bar End -->
			
              <?php
				function get_main_category($a)
					{
						$sql="select * from table_product_cat where com='cat' order by stt asc,id desc";
						$stmt=mysql_query($sql);
						$str='
							<select id="id_cat" name="id_cat">
							 <option value="0">Chọn danh mục cấp 1</option>
							';
						while ($row=@mysql_fetch_array($stmt)) 
						{
							if($row["id"]==(int)@$a)
								$selected="selected";
							else 
								$selected="";
							$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
						}
						$str.='</select>';
						return $str;
					}
					function get_main_category1($a,$b)
					{
						$sql="select * from table_product_cat where com='cat1' and id_cat=$a order by stt asc,id desc";
						$stmt=mysql_query($sql);
						$str='
							<select id="id_cat1" name="id_cat1">
							 <option value="0">Chọn danh mục cấp 2</option>
							';
						while ($row=@mysql_fetch_array($stmt)) 
						{
							if($row["id"]==(int)@$b)
								$selected="selected";
							else 
								$selected="";
							$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
						}
						$str.='</select>';
						return $str;
					}
					function get_main_category2($a,$b)
					{
						$sql="select * from table_product_cat where com='cat2' and id_cat1=$a order by stt asc,id desc";
						$stmt=mysql_query($sql);
						$str='
							<select id="id_cat2" name="id_cat2">
							 <option value="0">Chọn danh mục cấp 3</option>
							';
						while ($row=@mysql_fetch_array($stmt)) 
						{
							if($row["id"]==(int)@$b)
								$selected="selected";
							else 
								$selected="";
							$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
						}
						$str.='</select>';
						return $str;
					}
					
				?>               
              <form method="post" name="frm" action="index.php?com=product&act=save<?=$chuoi_noi_curpage?>" enctype="multipart/form-data" class="basic-form inline-form">
              	<?php if ($_REQUEST['act']=='edit'){?>
                <div class="col-md-2"><label>Hình hiện tại</label></div>
                <div class="col-md-10"><img src="<?=_upload_sanpham.$item['photo']?>"  width="341" alt="NO PHOTO" /><br /><br /></div>
                <?php }?>
                <div class="col-md-2"><label>Hình ảnh</label></div>
                <div class="col-md-10">
                	<input type="file" name="file" /> 
                    <span class="description">Type: .jpg|.gif|.png|.jpeg &nbsp;&nbsp;;&nbsp;&nbsp; Ảnh chuẩn: Width:253px - Height:343px.</span>
                    <br /><br />
                </div>
              
                <div class="col-md-2"><label>Danh mục cấp 1 </label></div>
                <div class="col-md-10"><?=get_main_category($item['id_cat']);?></div>
			
                <div class="col-md-2"><label>Danh mục cấp 2 </label></div>
                <div class="col-md-10" id='cat_div'><?=get_main_category1(@$item["id_cat"],$item["id_cat1"]);?></div>
				
                <div class="col-md-2"><label>Danh mục cấp 3 </label></div>
                <div class="col-md-10" id='cat1_div'><?=get_main_category2(@$item["id_cat1"],$item["id_cat2"]);?></div>
            
                <div class="col-md-2"><label>Tên tiếng việt</label></div>
                <div class="col-md-10"><input type="text" name="ten_vi" id="ten" value="<?=$item['ten_vi']?>" placeholder="Tên sản phẩm tiếng việt " /></div>
				
				
				<div class="col-md-2"><label>Tên tiếng anh</label></div>
                <div class="col-md-10"><input type="text" name="ten_en" id="ten" value="<?=$item['ten_en']?>" placeholder="Tên sản phẩm tiếng anh" /></div>
				
                <div class="col-md-2"><label>Mã SP </label></div>
                <div class="col-md-10"><input type="text" name="masp" id="masp" value="<?=$item['masp']?>" placeholder="Mã sản phẩm" /></div>
				
				<div class="col-md-2"><label>Size </label></div>
                <div class="col-md-10"><input type="text" name="size" id="size" value="<?=$item['size']?>" placeholder="size" /></div>
				
				<div class="col-md-2"><label>Color </label></div>
                <div class="col-md-10"><input type="text" name="color" id="color" value="<?=$item['color']?>" placeholder="color" /></div>
				
                
                <div class="col-md-2"><label>Số lượng </label></div>
                <div class="col-md-10"><input type="text" name="soluong" id="soluong" value="<?=$item['soluong']?>" placeholder="Số lượng" /></div>
				
				<div class="col-md-2"><label>Giá gốc</label></div>
                <div class="col-md-10"><input type="text" name="gia" id="gia" value="<?=$item['gia']?>" placeholder="Giá gốc" /></div>
				
                
                <div class="col-md-2"><label>Giá đã giảm</label></div>
                <div class="col-md-10"><input type="text" name="giacu" id="giacu" value="<?=$item['giacu']?>" placeholder="Giá đã giảm" /></div>
                
               
                <div class="col-md-2"><label>Mô tả tiếng việt</label></div>
                <div class="col-md-10"><textarea name="mota_vi" id="mota_vi" cols="50" rows="6"><?=$item['mota_vi']?></textarea><br /></div>
				
				 <div class="col-md-2"><label>Mô tả tiếng anh</label></div>
                <div class="col-md-10"><textarea name="mota_en" id="mota_en" cols="50" rows="6"><?=$item['mota_en']?></textarea><br /></div>
          
                <div class="col-md-2"><label>Nội dung tiếng việt</label></div>
                <div class="col-md-10"><textarea name="noidung_vi" id="noidung_vi" cols="50" rows="6"><?=$item['noidung_vi']?></textarea><br /></div> 
				
				
				<div class="col-md-2"><label>Nội dung tiếng anh</label></div>
                <div class="col-md-10"><textarea name="noidung_en" id="noidung_en" cols="50" rows="6"><?=$item['noidung_en']?></textarea><br /></div> 
                
				
                <div class="col-md-2"><label>Tag từ khóa </label></div>
                <div class="col-md-10"><input type="text" name="tag" id="tag" value="<?=$item['tag']?>" placeholder="Tag từ khóa" /></div>
                
                <div class="col-md-2"><label>Title</label></div>
                <div class="col-md-10"><input type="text" name="title" id="title" value="<?=$item['title']?>" placeholder="Title" /></div>
                <div class="col-md-2"><label>Keywords</label></div>
                <div class="col-md-10"><textarea name="keywords" cols="50" rows="6" placeholder="Keywords"><?=$item['keywords']?></textarea></div>
                <div class="col-md-2"><label>Description</label></div>
                <div class="col-md-10"><textarea name="description" cols="50" rows="6" placeholder="Description"><?=$item['description']?></textarea></div>   
                
                <div class="col-md-2"><label>Số thứ tự</label></div>
                <div class="col-md-10"><input type="text" name="stt" id="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" placeholder="Số thứ tự" /></div>
                <div class="col-md-2"></div>
                <div class="col-md-10"><input type="checkbox" name="hienthi" class="icheck-blue" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /> <span class="hienthi_text">Hiển thị</span></div>
                
                
				<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
                
                <div class="col-md-10 col-md-offset-2">                  
                  <button type="button" onclick="javascript:document.frm.submit()" class="btn btn-success"><i class="fa fa-check"></i> Lưu</button>
                  <button type="button" onclick="javascript:window.location='index.php?com=product&act=man<?=$chuoi_noi_curpage?>'" class="btn btn-info"><i class="fa fa-share"></i> Thoát</button>
                </div>

                <div class="clearfix"></div>

              </form>

            </div>
          </div>
          <!-- Inline Form End -->
	</div>