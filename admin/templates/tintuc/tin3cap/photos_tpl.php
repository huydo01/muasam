<?php if(!defined('_kiemtraweb') || _kiemtraweb!=$check_website) daysangtranglogin(); ?>

<!-- Breadcrumbs Start -->
  <div class="row breadcrumbs">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <ul class="breadcrumbs">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li><a href="index.php?com=tin3cap&act=man_photo">Hình ảnh</a></li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumbs End -->
        
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  	  	<!--
        <div class="inner" style="margin-bottom:10px;">
            <div class="message-box info">
              <i class="fa fa-exclamation-circle"></i>
              <p>Lưu ý: Tin tức nổi bật sẽ hiển thị ngoài trang chủ, có ít nhất 8 Tin tức.</p>
            </div>
        </div>
        -->
        
      <!-- Inline Form Start -->      	      
        <div class="boxed no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="inner">
          	            
            <!-- Title Bar Start -->
            <div class="title-bar">
              <div class="col-md-8" style="padding-left:0px; padding-top:7px; padding-bottom:7px;">                 
              	<h4><a href="index.php?com=tin3cap&act=add_photo<?=$chuoi_noi_curpage?>" class="btn btn-success"><i class="fa fa-check"></i> Thêm hình ảnh</a></h4>      
              </div>              
              <div class="clear"></div>  
            </div>
            
            <div class="title-bar" style="padding-bottom:0px;">
              <div class="col-md-2 paging_0px" style="padding-top:5px;"><label>Lọc thông tin:</label></div>
              <div class="col-md-10 paging_0px">
                  <div class="col-md-3 paging_right_10px" style="margin-bottom:10px;">                 
                    <?=get_main_category();?>
                  </div>                           
              </div>
              <div class="clear"></div>  
            </div>
            <!-- Title Bar End -->              
			<?php
                function get_main_category()
            	{
            		$sql="select * from table_tin3cap where id='".intval($_REQUEST["id_cat"])."' order by stt asc,id desc";
            		$stmt=mysql_query($sql);
            		$str='
            			<select id="id_cat" name="id_cat" class="main_font">			 
            			';
            		while ($row=@mysql_fetch_array($stmt)) 
            		{
            			if($row["id"]==(int)@$_REQUEST["id_cat"])
            				$selected="selected";
            			else 
            				$selected="";
            			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
            		}
            		$str.='</select>';
            		return $str;
            	}
					
			?>                     
            
            <!-- Table Holder Start -->
            <div class="table-holder">                            
              <table class="stripe-rows" cellspacing="0" cellpadding="0" width="100%" border="1">   
                <thead>                
                  <th style="width:5%;">STT</th>
                  <th style="width:25%;">Danh mục</th>
            		<th style="width:20%;">Tên</th>   
                    <th style="width:20%;">Hình ảnh</th>                 
            		<th style="width:5%;">Hiển thị</th>
                    <th style="width:5%;">Sửa</th>
            		<th style="width:5%;">Xóa</th>
                </thead>
                <tbody>
                  <?php for($i=0, $count=count($items); $i<$count; $i++){?>
                	<tr>
                		<td style="width:5%;"><?=$items[$i]['stt']?></td>
                        <td style="width:25%;">		
                		<?php
                		$sql_danhmuc1="select ten_vi from table_tin3cap where id='".$items[$i]['id_cat']."'";
                		$result=mysql_query($sql_danhmuc1);
                	 	$item_danhmuc1 =mysql_fetch_array($result);
                	 	echo @$item_danhmuc1['ten_vi'];
                		?>
                        
                        </td>
                		<td style="width:20%;">     
                        <a href="index.php?com=tin3cap&act=edit_photo&id=<?=$items[$i]['id']?><?=($_REQUEST['id_cat']!=0)?"&id_cat=".$_REQUEST['id_cat']:""?><?=($_REQUEST['curPage']!="")?"&curPage=".$_REQUEST['curPage']:""?>"> 
                        <?=$items[$i]['ten_vi']?>
                        </a>
                        </td>
                        <td style="width:20%;">     
                        <a href="index.php?com=tin3cap&act=edit_photo&id=<?=$items[$i]['id']?><?=($_REQUEST['id_cat']!=0)?"&id_cat=".$_REQUEST['id_cat']:""?><?=($_REQUEST['curPage']!="")?"&curPage=".$_REQUEST['curPage']:""?>"> 
                        <img src="<?=_upload_tin3cap.$items[$i]['photo']?>" width="100" height="100" />
                        </a>
                        </td>
                        
                		<td style="width:5%;">
                			<?php 
                		if(@$items[$i]['hienthi']==1)
                		{
                		?>
                        
                        <a href="index.php?com=tin3cap&act=man_photo&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_1.png" border="0" /></a>
                		<? 
                		}
                		else
                		{
                		?>
                         <a href="index.php?com=tin3cap&act=man_photo&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>
                         <?php
                		 }?>   
                        </td>
                        <td style="width:5%;"><a href="index.php?com=tin3cap&act=edit_photo&id=<?=$items[$i]['id']?><?=($_REQUEST['id_cat']!=0)?"&id_cat=".$_REQUEST['id_cat']:""?><?=($_REQUEST['curPage']!="")?"&curPage=".$_REQUEST['curPage']:""?>"><img src="media/images/edit.png" border="0" /></a></td>
                		<td style="width:5%;"><a href="index.php?com=tin3cap&act=delete_photo&id=<?=$items[$i]['id']?><?=($_REQUEST['id_cat']!=0)?"&id_cat=".$_REQUEST['id_cat']:""?><?=($_REQUEST['curPage']!="")?"&curPage=".$_REQUEST['curPage']:""?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
                	</tr>
                	<?php	}?>
                                                      
                </tbody>
              </table>
              <div class="clear"></div>
                           
            </div>
            <!-- Table Holder End -->
            
			<div class="col-md-12 margin_bottom_10px">
                <div class="col-md-6 paging_right_10px">                  
                  <a href="index.php?com=tin3cap&act=add_photo<?=$chuoi_noi_curpage?>" class="btn btn-success"><i class="fa fa-check"></i> Thêm hình ảnh</a>
                  <a href="index.php?com=tin3cap&act=man_photo" class="btn btn-info"><i class="fa fa-share"></i> Thoát</a>         
                </div>
                <div class="col-md-6 paging_0px">    
                  <div class="paging"><?=$paging['paging']?></div>
                </div>
    
                <div class="clearfix"></div>
			</div>
            <div class="clearfix"></div>

          </div>
        </div>
        <!-- Inline Form End -->
  </div>