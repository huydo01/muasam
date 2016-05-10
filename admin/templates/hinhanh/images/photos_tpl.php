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
  	  	<?php if($_REQUEST['id_cat']==''){ ?>
        <div class="inner" style="margin-bottom:10px;">
            <div class="message-box info">
              <i class="fa fa-exclamation-circle"></i>
              <p>Lưu ý: Bạn cần vào Danh sách Album, tìm đến sản phẩm cần xem, nhấn +Add phần Hình ảnh để xem danh sách hình ảnh của sản phẩm đó!</p>
            </div>
        </div>
        <?php  } ?>
        
      <!-- Inline Form Start -->      	      
        <div class="boxed no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="inner">
          	            
            <!-- Title Bar Start -->            
            <div class="title-bar">
              <h4>Hình ảnh cho Album : <b><?=$pro['ten']?></b></h4>
			   <a href="index.php?com=images&act=add<?=$chuoi_noi_curpage1?>" class="btn btn-success"><i class="fa fa-check"></i> Thêm hình ảnh</a>
            </div>
            <!-- Title Bar End -->  
                        
            <!-- Table Holder Start -->
            <div class="table-holder">

              <table class="stripe-rows" cellspacing="0" cellpadding="0" width="100%" border="1">         
                <thead>
                  <th style="width:5%;">STT</th>                                                
                  <th>Hình Ảnh</th>
                  <th>Tên</th>
                  <th style="width:5%;">Hiển thị</th>
                  <th style="width:5%;">Sửa</th>
                  <th style="width:5%;">Xóa</th>
                </thead>
                <tbody>
                  <?php 
				  	if(count($items)!=0){
						foreach($items as $k=>$v){
				  ?>
                  <tr>
                    <td style="width:5%;"><?=$v['stt']?></td>                    
                    <td><a href="index.php?com=images&act=edit&id=<?=$v['id']?><?=$chuoi_noi_curpage1?>"><img src="<?=_upload_images.$v['photo']?>" height="200" style="max-width:200px;" border="0" /></a></td>
                    <td><a href="index.php?com=images&act=edit&id=<?=$v['id']?><?=$chuoi_noi_curpage1?>"><?=$v['ten_vi']?></a></td>                    
                    <td style="width:5%;"><a href="index.php?com=images&act=man&hienthi=<?=$v['id']?><?=$chuoi_noi_curpage1?>"><img src="<?=($v['hienthi']==1)?'media/images/active_1.png':'media/images/active_0.png'?>" border="0" /></a></td>
                    <td style="width:5%;"><a href="index.php?com=images&act=edit&id=<?=$v['id']?><?=$chuoi_noi_curpage1?>"><img src="media/images/edit.png" border="0" title="Sửa" /></a></td>
                    <td style="width:5%;"><a href="index.php?com=images&act=delete&id=<?=$v['id']?><?=$chuoi_noi_curpage1?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" title="Xóa" /></a></td>
                  </tr>
                  <?php	
						}
					}
				  ?>
                                                      
                </tbody>
              </table>
              <div class="clear"></div>              

            </div>
            <!-- Table Holder End -->
            
			<div class="col-md-12 margin_bottom_10px">
                <div class="col-md-4 paging_right_10px">                  
                  <a href="index.php?com=images&act=add<?=$chuoi_noi_curpage1?>" class="btn btn-success"><i class="fa fa-check"></i> Thêm hình ảnh</a>
                  <a href="index.php?com=images&act=man" class="btn btn-info"><i class="fa fa-share"></i> Thoát</a> 
                </div>
                <div class="col-md-8 paging_0px">    
                  <div class="paging"><?=$paging['paging']?></div>
                </div>
    
                <div class="clearfix"></div>
			</div>
            <div class="clearfix"></div>

          </div>
        </div>
        <!-- Inline Form End -->
  </div>