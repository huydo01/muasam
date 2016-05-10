<?php if(!defined('_kiemtraweb') || _kiemtraweb!=$check_website) daysangtranglogin(); ?>

<!-- Breadcrumbs Start -->
  <div class="row breadcrumbs">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <ul class="breadcrumbs">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li>Album : <b><?php
				$sql="select ten_vi from #_images_cat where id='".intval($_REQUEST['id_cat'])."'";	
				$d->query($sql);
				$pro = $d->fetch_array();
				echo $pro['ten_vi'];
			?></b>
        </li>
        <li><a href="index.php?com=images&act=man<?=$chuoi_noi_curpage1?>">Hình ảnh</a></li>
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
                <h4>Thêm hình ảnh cho Album : <b><?=$pro['ten']?></b></h4>
				<button type="button" onclick="javascript:document.frm.submit()" class="btn btn-success"><i class="fa fa-check"></i> Lưu</button>
              </div>
              <!-- Title Bar End -->
			            
              <form method="post" name="frm" action="index.php?com=images&act=save<?=$chuoi_noi_curpage1?>" enctype="multipart/form-data" class="basic-form inline-form">
              	<?php if ($_REQUEST['act']=='edit'){?>
                <div class="col-md-2"><label>Hình hiện tại</label></div>
                <div class="col-md-10"><img src="<?=_upload_images.$item['photo']?>"  width="432" alt="NO PHOTO" /><br /><br /></div>
                <?php }?>
                <div class="col-md-2"><label>Hình ảnh</label></div>
                <div class="col-md-10">
                	<input type="file" name="file" /> 
                    <span class="description">Type: .jpg|.gif|.png|.jpeg &nbsp;&nbsp;;&nbsp;&nbsp; Ảnh chuẩn: 576x800 (theo px) .</span>
                    <br /><br />                    
                </div>          
                    
                <div class="col-md-2"><label>Tên tiếng việt </label></div>
                <div class="col-md-10"><input type="text" name="ten_vi" value="<?=$item['ten_vi']?>" placeholder="Tên" /></div>
				
				 <div class="col-md-2"><label>Tên tiếng anh </label></div>
                <div class="col-md-10"><input type="text" name="ten_en" value="<?=$item['ten_en']?>" placeholder="Tên" /></div>
                
                <div class="col-md-2"><label>Số thứ tự</label></div>
                <div class="col-md-10"><input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" placeholder="Số thứ tự" /></div>
                <div class="col-md-2"></div>
                <div class="col-md-10"><input type="checkbox" name="hienthi" class="icheck-blue" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /> <span class="hienthi_text">Hiển thị</span></div>
                
				<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
                
                <div class="col-md-10 col-md-offset-2">                  
                  <button type="button" onclick="javascript:document.frm.submit()" class="btn btn-success"><i class="fa fa-check"></i> Lưu</button>
                  <button type="button" onclick="javascript:window.location='index.php?com=images&act=man<?=$chuoi_noi_curpage1?>'" class="btn btn-info"><i class="fa fa-share"></i> Thoát</button>
                </div>

                <div class="clearfix"></div>

              </form>

            </div>
          </div>
          <!-- Inline Form End -->
	</div>