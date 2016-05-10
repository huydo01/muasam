<h3>Thêm Quận Huyện</h3>
<?php
function get_main_category($a)
	{
		$sql="select * from table_product_phu where com='thanhpho' order by stt asc,id desc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_cat" name="id_cat"  class="main_font">
			 <option value="0">Chọn thành phố</option>
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$a)
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
?>

<form name="frm" method="post" action="index.php?com=product1&act=save_quanhuyen<?=((@$_REQUEST['id_cat']!="")?("&id_cat=".@$_REQUEST['id_cat']):"")?><?=((@$_REQUEST['curPage']!="")?("&curPage=".@$_REQUEST['curPage']):"")?>" enctype="multipart/form-data" class="nhaplieu">	
	<!--<b>Thuộc thành phố:</b><?=get_main_category($item['id_cat']);?><br /><br />-->
	<b>Tên</b> <input type="text" name="ten" value="<?=$item['ten']?>" class="input" /><br /><br>
    
    <b>Title :</b> <input type="text" name="title" value="<?=$item['title']?>" class="input" style="width:500px;" /><br /><br>
	<b>Keywords :</b> <textarea name="keywords" cols="50" rows="6"><?=$item['keywords']?></textarea><br /><br>
    <b>Description :</b> <textarea name="description" cols="50" rows="6"><?=$item['description']?></textarea><br /><br> 
              
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product1&act=man_quanhuyen<?=((@$_REQUEST['id_cat']!="")?("&id_cat=".@$_REQUEST['id_cat']):"")?><?=((@$_REQUEST['curPage']!="")?("&curPage=".@$_REQUEST['curPage']):"")?>'" class="btn" />
</form>