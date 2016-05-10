<h3>Thêm Đường Phố</h3>
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
function get_main_category1($a,$b)
	{
		//$sql="select * from table_product_phu where com='quanhuyen' and id_cat=$a order by stt asc,id desc";
		$sql="select * from table_product_phu where com='quanhuyen' order by stt asc,id desc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_cat1" name="id_cat1"  class="main_font">
			 <option value="0">Chọn quận huyện</option>
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$b)
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
?>

<script type="text/javascript">
	$(document).ready(function(e) {
        $("#id_cat").change(function(e) {
            var id=$(this).val();
			$.ajax({
				url:'ajax/timkiemnangcao/duongpho.php',
				type:'get',
				data:'id='+id,
				dataType:'html',
				success:function(data){
					$("#cat_div").html(data);	
				}
			});
        });
    });
</script>

<form name="frm" method="post" action="index.php?com=product1&act=save_duongpho<?=((@$_REQUEST['id_cat']!="")?("&id_cat=".@$_REQUEST['id_cat']):"")?><?=((@$_REQUEST['id_cat1']!="")?("&id_cat1=".@$_REQUEST['id_cat1']):"")?><?=((@$_REQUEST['curPage']!="")?("&curPage=".@$_REQUEST['curPage']):"")?>" enctype="multipart/form-data" class="nhaplieu">	
	<!--<b>Chọn Thành phố:</b><?=get_main_category($item['id_cat']);?><br /><br />-->
    <b>Chọn Quận huyện:</b><div id='cat_div'><?=get_main_category1(@$item["id_cat"],$item["id_cat1"]);?></div><br /><br />   
    
	<b>Tên</b> <input type="text" name="ten" value="<?=$item['ten']?>" class="input" /><br /><br>
    
    <b>Title :</b> <input type="text" name="title" value="<?=$item['title']?>" class="input" style="width:500px;" /><br /><br>
	<b>Keywords :</b> <textarea name="keywords" cols="50" rows="6"><?=$item['keywords']?></textarea><br /><br>
    <b>Description :</b> <textarea name="description" cols="50" rows="6"><?=$item['description']?></textarea><br /><br>
              
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product1&act=man_duongpho<?=((@$_REQUEST['id_cat']!="")?("&id_cat=".@$_REQUEST['id_cat']):"")?><?=((@$_REQUEST['id_cat1']!="")?("&id_cat1=".@$_REQUEST['id_cat1']):"")?><?=((@$_REQUEST['curPage']!="")?("&curPage=".@$_REQUEST['curPage']):"")?>'" class="btn" />
</form>