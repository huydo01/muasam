<?php if(!defined('_kiemtraweb') || _kiemtraweb!=$check_website) daysangtranglogin(); ?>

<!-- Breadcrumbs Start -->
  <div class="row breadcrumbs">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <ul class="breadcrumbs">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li><a href="index.php?com=congtrinh&act=man_cat">Danh mục cấp 1</a></li>
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

              <form method="post" name="frm" action="index.php?com=congtrinh&act=save_cat<?=$chuoi_noi_curpage1?>" enctype="multipart/form-data" class="basic-form inline-form">
              <!--
                <?php if ($_REQUEST['act']=='edit_cat'){?>
                <div class="col-md-2"><label>Hình hiện tại</label></div>
                <div class="col-md-10"><img src="<?=_upload_congtrinh.$item['photo']?>"  width="296" alt="NO PHOTO" /><br /><br /></div>
                <?php }?>
                <div class="col-md-2"><label>Hình ảnh</label></div>
                <div class="col-md-10">
                	<input type="file" name="file" /> 
                    <span class="description">Type: .jpg|.gif|.png|.jpeg &nbsp;&nbsp;;&nbsp;&nbsp; Ảnh chuẩn: 296x188 (theo px).</span>
                    <br /><br />
                </div>
               -->
                
                 <div class="col-md-2"><label>Tên tiếng việt</label></div>
                <div class="col-md-10"><input type="text" name="ten_vi" id="ten" value="<?=$item['ten_vi']?>" placeholder="Tên" /></div>
				
				
				 <div class="col-md-2"><label>Tên tiếng anh</label></div>
                <div class="col-md-10"><input type="text" name="ten_en" id="ten" value="<?=$item['ten_en']?>" placeholder="Tên" /></div>
				<!--
				 <div class="col-md-2"><label>Nội dung tiếng việt</label></div>
                <div class="col-md-10"><textarea name="noidung_vi" id="noidung_vi" cols="50" rows="6"><?=$item['noidung_vi']?></textarea><br /></div> 
				
				
				  <div class="col-md-2"><label>Nội dung tiếng anh</label></div>
                <div class="col-md-10"><textarea name="noidung_en" id="noidung_en" cols="50" rows="6"><?=$item['noidung_en']?></textarea><br /></div> 
				
                -->
				<!--
                <div class="col-md-2"><label>Title</label></div>
                <div class="col-md-10"><input type="text" name="title" id="title" value="<?=$item['title']?>" placeholder="Title" /></div>
                <div class="col-md-2"><label>Keywords</label></div>
                <div class="col-md-10"><textarea name="keywords" cols="50" rows="6" placeholder="Keywords"><?=$item['keywords']?></textarea></div>
                <div class="col-md-2"><label>Description</label></div>
                <div class="col-md-10"><textarea name="description" cols="50" rows="6" placeholder="Description"><?=$item['description']?></textarea></div>   
                -->
                <div class="col-md-2"><label>Số thứ tự</label></div>
                <div class="col-md-10"><input  type="text" name="stt" id="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" placeholder="Số thứ tự" /></div>
                <div class="col-md-2"></div>
                <div class="col-md-10"><input type="checkbox" name="hienthi" class="icheck-blue" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /> <span class="hienthi_text">Hiển thị</span></div>
                
                
				<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
                
                <div class="col-md-10 col-md-offset-2">                  
                  <button type="button" onclick="javascript:document.frm.submit()" class="btn btn-success"><i class="fa fa-check"></i> Lưu</button>
                  <button type="button" onclick="javascript:window.location='index.php?com=congtrinh&act=man_cat<?=$chuoi_noi_curpage1?>'" class="btn btn-info"><i class="fa fa-share"></i> Thoát</button>
                </div>

                <div class="clearfix"></div>

              </form>

            </div>
          </div>
          <!-- Inline Form End -->
	</div>