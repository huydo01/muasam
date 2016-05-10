<?php if(!defined('_kiemtraweb') || _kiemtraweb!=$check_website) daysangtranglogin(); ?>

<!-- Breadcrumbs Start -->
  <div class="row breadcrumbs">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <ul class="breadcrumbs">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li><a href="index.php?com=product1&act=man_khoanggia">Khoảng giá</a></li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumbs End -->
        
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  	  	<!--<div class="inner" style="margin-bottom:10px;">
            <div class="message-box info">
              <i class="fa fa-exclamation-circle"></i>
              <p>Lưu ý: Nổi bật là Khoảng giá mặc định khi nhập đơn hàng, lưu ý chỉ có 1 Khoảng giá là Nổi bật</p>
            </div>
        </div>-->
        
      <!-- Inline Form Start -->      	      
        <div class="boxed no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="inner">
          	            
            <!-- Title Bar Start -->
            <div class="title-bar"> 
              <div class="col-md-8" style="padding-left:0px; padding-top:7px; padding-bottom:7px;">                 
              	<h4>Khoảng giá</h4>      
              </div>              
              <div class="clear"></div>      
            </div>
            <!-- Title Bar End -->                           
                               
            
            <!-- Table Holder Start -->
            <div class="table-holder">

              <table class="stripe-rows" cellspacing="0" cellpadding="0" width="100%" border="1">
                <thead>
                  <tr>
                      <th style="width:5%">STT</th>
                      <th>Giá từ</th>
                      <th>Giá đến</th>
                      <th style="width:5%;">Hiển thị</th>
                      <th style="width:5%;">Sửa</th>
                      <th style="width:5%;">Xóa</th>	
                  </tr>
                </thead>
                               
                <tbody>
                  <?php 
				  	if(count($items)!=0){
						foreach($items as $k=>$v){
				  ?>
                  <tr>
                    <td style="width:5%"><?=$v['stt']?></td>
                    <td><a href="index.php?com=product1&act=edit_khoanggia&id=<?=$v['id']?><?=$chuoi_noi_curpage?>"><?=($v['ten']!=0)?(number_format($v['ten'],0, ',', '.')." VND"):"0 VND" ?></a></td>
                    <td><a href="index.php?com=product1&act=edit_khoanggia&id=<?=$v['id']?><?=$chuoi_noi_curpage?>"><?=($v['ten2']!=0)?(number_format($v['ten2'],0, ',', '.')." VND"):"" ?></a></td>
                    
                    <td style="width:5%;"><a href="index.php?com=product1&act=man_khoanggia&hienthi=<?=$v['id']?><?=$chuoi_noi_curpage?>"><img src="<?=($v['hienthi']==1)?'media/images/active_1.png':'media/images/active_0.png'?>" border="0" /></a></td>
                    <td style="width:5%;"><a href="index.php?com=product1&act=edit_khoanggia&id=<?=$v['id']?><?=$chuoi_noi_curpage?>"><img src="media/images/edit.png" border="0" title="Sửa" /></a></td>
                    <td style="width:5%;"><a href="index.php?com=product1&act=delete_khoanggia&id=<?=$v['id']?><?=$chuoi_noi_curpage?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" title="Xóa" /></a></td>
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
                <div class="col-md-4 paging_0px">                  
                  <a href="index.php?com=product1&act=add_khoanggia<?=$chuoi_noi_curpage?>" class="btn btn-success"><i class="fa fa-check"></i> Thêm Khoảng giá</a>
                  <a href="index.php?com=product1&act=man_khoanggia" class="btn btn-info"><i class="fa fa-share"></i> Thoát</a> 
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