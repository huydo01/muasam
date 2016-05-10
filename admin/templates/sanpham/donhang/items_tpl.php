<?php if(!defined('_kiemtraweb') || _kiemtraweb!=$check_website) daysangtranglogin(); ?>

<!-- Breadcrumbs Start -->
  <div class="row breadcrumbs">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <ul class="breadcrumbs">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li><a href="index.php?com=donhang&act=man">Đơn hàng</a></li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumbs End -->
        
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  	  	<!--<div class="inner" style="margin-bottom:10px;">
            <div class="message-box info">
              <i class="fa fa-exclamation-circle"></i>
              <p>Lưu ý: Nổi bật thì danh mục sẽ được hiển thị ngoài trang chủ</p>
            </div>
        </div>-->
        
      <!-- Inline Form Start -->      	      
        <div class="boxed no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="inner">
          	            
            <!-- Title Bar Start -->
            <div class="title-bar"> 
              <div class="col-md-8" style="padding-left:0px; padding-top:7px; padding-bottom:7px;">                 
              	<h4>Đơn hàng</h4>      
              </div>
              <div class="col-md-4 paging_0px">  
              	<form action="index.php?com=donhang&act=man<?=$chuoi_noi_curpage?>" method="post" class="inline-form">
                	<div id="timkiem_khung">
                    	<input type="text" name="search" id='search' value="<?=@$_REQUEST['search']?>" placeholder="Nhập tên cần tìm ..." class='timkiem_input' />
                        <input type="image" name="btnSearch" src="media/images/search-focus.png" value="Tìm kiếm" id='nut_timkiem' />
                    </div>                    
                </form>
              </div>
              <div class="clear"></div>      
            </div>
            <!-- Title Bar End -->                           
                               
            
            <!-- Table Holder Start -->
            <div class="table-holder">

              <table class="stripe-rows" cellspacing="0" cellpadding="0" width="100%" border="1">
                <thead>
                  <tr>
                      <th style="width:5%">ID</th>
                      <th style="width:10%">Mã đơn hàng</th>
                      <th style="width:20%">Họ tên</th>
                      <th style="width:20%">Ngày đặt</th>
                      <th style="width:20%">Số tiền</th>
                      <th style="width:10%">Tình trạng</th>
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
                    <td style="width:5%"><?=$v['id']?></td>
                    <td style="width:10%"><a href="index.php?com=donhang&act=edit&id=<?=$v['id']?><?=$chuoi_noi_curpage?>"><?=$v['madonhang']?></a></td>
                    <td style="width:20%"><a href="index.php?com=donhang&act=edit&id=<?=$v['id']?><?=$chuoi_noi_curpage?>"><?=$v['hoten']?></a></td>
                    <td style="width:20%"><a href="index.php?com=donhang&act=edit&id=<?=$v['id']?><?=$chuoi_noi_curpage?>"><?=date('d/m/Y',$v['ngaytao'])?></a></td>
                    <td style="width:20%"><a href="index.php?com=donhang&act=edit&id=<?=$v['id']?><?=$chuoi_noi_curpage?>"><?=number_format($v['tonggia'],0, ',', '.')?>&nbsp;VNĐ</a></td>
                    
                    <td style="width:10%"><a href="index.php?com=donhang&act=edit&id=<?=$v['id']?><?=$chuoi_noi_curpage?>">
						<?php 
							$sql="select ten from table_product_phu where com='tinhtrang' and id= '".$v['trangthai']."' ";
							$d->query($sql);
							$result=$d->fetch_array();
							if($result['ten']==''){
								$sql="select ten from table_product_phu where com='tinhtrang' and noibat=1 order by stt,id desc";
								$d->query($sql);
								$result=$d->fetch_array();					
							}
							echo $result['ten'];
					   ?>
                    </a></td>
                    
                    <td style="width:5%;"><a href="index.php?com=donhang&act=edit&id=<?=$v['id']?><?=$chuoi_noi_curpage?>"><img src="media/images/edit.png" border="0" title="Sửa" /></a></td>
                    <td style="width:5%;"><a href="index.php?com=donhang&act=delete&id=<?=$v['id']?><?=$chuoi_noi_curpage?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" title="Xóa" /></a></td>
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
                  <a href="index.php?com=donhang&act=add<?=$chuoi_noi_curpage?>" class="btn btn-success"><i class="fa fa-check"></i> Thêm danh mục cấp 1</a>
                  <a href="index.php?com=donhang&act=man" class="btn btn-info"><i class="fa fa-share"></i> Thoát</a> 
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