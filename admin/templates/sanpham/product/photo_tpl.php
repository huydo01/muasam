<?php if(!defined('_kiemtraweb') || _kiemtraweb!=$check_website) daysangtranglogin(); ?>

<!-- Breadcrumbs Start -->
  <div class="row breadcrumbs">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <ul class="breadcrumbs">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li>Sản phẩm : <b><?php
				$sql="select ten_vi from #_product where id='".intval($_REQUEST['id_cat'])."'";	
				$d->query($sql);
				$pro = $d->fetch_array();
				echo $pro['ten_vi'];
			?></b>
        </li>
        <li><a href="index.php?com=product&act=man_photo<?=$chuoi_noi_curpage2?>">Hình ảnh</a></li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumbs End -->
        
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  	  	<?php if($_REQUEST['id_cat']==''){ ?>
        <div class="inner" style="margin-bottom:10px;">
            <div class="message-box info">
              <i class="fa fa-exclamation-circle"></i>
              <p>Lưu ý: Bạn cần vào Danh sách sản phẩm, tìm đến sản phẩm cần xem, nhấn +Add phần Hình ảnh để xem danh sách hình ảnh của sản phẩm đó!</p>
            </div>
        </div>
        <?php  } ?>
        
      <!-- Inline Form Start -->      	      
        <div class="boxed no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="inner">
          	            
            <!-- Title Bar Start -->            
            <div class="title-bar">
              <h4>Hình ảnh cho sản phẩm : <b><?=$pro['ten_vi']?></b></h4>
			  <a href="index.php?com=product&act=add_photo<?=$chuoi_noi_curpage?>" class="btn btn-success"><i class="fa fa-check"></i> Thêm hình ảnh</a>
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
                    <td><a href="index.php?com=product&act=edit_photo&id=<?=$v['id']?><?=$chuoi_noi_curpage2?>" style="text-decoration:none;"><img src="<?=_upload_sanpham.$v['photo']?>" height="200" style="max-width:200px;" border="0" /></a></td>
                    <td><a href="index.php?com=product&act=edit_photo&id=<?=$v['id']?><?=$chuoi_noi_curpage2?>" style="text-decoration:none;"><?=$v['ten_vi']?></a></td>                    
                    <td style="width:5%;"><a href="index.php?com=product&act=man_photo&hienthi=<?=$v['id']?><?=$chuoi_noi_curpage2?>"><img src="<?=($v['hienthi']==1)?'media/images/active_1.png':'media/images/active_0.png'?>" border="0" /></a></td>
                    <td style="width:5%;"><a href="index.php?com=product&act=edit_photo&id=<?=$v['id']?><?=$chuoi_noi_curpage2?>"><img src="media/images/edit.png" border="0" title="Sửa" /></a></td>
                    <td style="width:5%;"><a href="index.php?com=product&act=delete_photo&id=<?=$v['id']?><?=$chuoi_noi_curpage2?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" title="Xóa" /></a></td>
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
                  <a href="index.php?com=product&act=add_photo<?=$chuoi_noi_curpage?>" class="btn btn-success"><i class="fa fa-check"></i> Thêm hình ảnh</a>
                  <a href="index.php?com=product&act=man_photo" class="btn btn-info"><i class="fa fa-share"></i> Thoát</a> 
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