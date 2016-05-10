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
              	<h4><button type="button" onclick="javascript:document.frm.submit()" class="btn btn-success"><i class="fa fa-check"></i> Lưu</button></h4>      
              </div>              
              <div class="clear"></div>  
            </div>                        
            <!-- Title Bar End -->              
			<?php

        	function get_main_category()
        		{
        			$sql="select * from table_tin3cap where id='".(intval($_REQUEST['id_cat']))."' order by stt asc,id desc";
        			$stmt=mysql_query($sql);
        			$str='
        				<select id="id_cat" name="id_cat" onchange="select_onchange1()" class="main_font">
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
            
            <form name="frm" method="post" action="index.php?com=tin3cap&act=save_photo&id=<?=$_REQUEST['id'];?><?=($_REQUEST['id_cat']!=0)?"&id_cat=".$_REQUEST['id_cat']:""?><?=($_REQUEST['curPage']!="")?"&curPage=".$_REQUEST['curPage']:""?>" enctype="multipart/form-data" class="nhaplieu">
                <div class="col-md-2"><label>Danh mục cấp 1 </label></div>
                <div class="col-md-10"><?=get_main_category();?></div>
                
                <?php if ($_REQUEST['act']=='edit'){?>
                <div class="col-md-2"><label>Hình hiện tại</label></div>
                <div class="col-md-10"><img src="<?=_upload_tin3cap.$item['photo']?>"  width="150" alt="NO PHOTO" /><br /><br /></div>
                <?php }?>
                <div class="col-md-2"><label>Hình ảnh</label></div>
                <div class="col-md-10">
                	<input type="file" name="file" /> 
                    <span class="description">Type: .jpg|.gif|.png|.jpeg &nbsp;&nbsp;;&nbsp;&nbsp; Ảnh chuẩn: Width:1366px - Height:670px</span>
                    <br /><br />
                </div>
                <div class="clear"></div>
                <div class="col-md-2"><label>Tên tiếng việt</label></div>
                <div class="col-md-10"><input type="text" name="ten_vi" id="ten" value="<?=$item['ten_vi']?>" placeholder="Tên " /></div>
				
				 <div class="col-md-2"><label>Tên tiếng anh</label></div>
                <div class="col-md-10"><input type="text" name="ten_en" id="ten" value="<?=$item['ten_en']?>" placeholder="Tên " /></div>
                
                <div class="col-md-2"><label>Số thứ tự</label></div>
                <div class="col-md-10"><input type="text" name="stt" id="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" placeholder="Số thứ tự" /></div>
                <div class="col-md-2"></div>
                <div class="col-md-10"><input type="checkbox" name="hienthi" class="icheck-blue" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /> <span class="hienthi_text">Hiển thị</span></div>                
                
				<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
                
                <div class="col-md-10 col-md-offset-2">                  
                  <button type="button" onclick="javascript:document.frm.submit()" class="btn btn-success"><i class="fa fa-check"></i> Lưu</button>
                  <button type="button" onclick="javascript:window.location='index.php?com=tin3cap&act=man<?=$chuoi_noi_curpage?>'" class="btn btn-info"><i class="fa fa-share"></i> Thoát</button>
                </div>

                <div class="clearfix"></div>
            
            </form>
            			
            <div class="clearfix"></div>

          </div>
        </div>
        <!-- Inline Form End -->
  </div>