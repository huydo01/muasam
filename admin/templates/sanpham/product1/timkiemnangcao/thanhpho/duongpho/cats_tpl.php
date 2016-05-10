<h3><a href="index.php?com=product1&act=add_duongpho<?=((@$_REQUEST['id_cat']!="")?("&id_cat=".@$_REQUEST['id_cat']):"")?><?=((@$_REQUEST['id_cat1']!="")?("&id_cat1=".@$_REQUEST['id_cat1']):"")?><?=((@$_REQUEST['curPage']!="")?("&curPage=".@$_REQUEST['curPage']):"")?>">Thêm Phường / Xã</a>
<!--&nbsp;&nbsp;&nbsp;&nbsp;Thành phố&nbsp;<?=get_main_category();?>-->
&nbsp;&nbsp;&nbsp;&nbsp;Quận / Huyện&nbsp;<?=get_main_category1();?></h3>

<script language="javascript">
function select_onchange()
	{
		var b=document.getElementById("id_cat");
		if(b!=0)
			window.location ="index.php?com=product1&act=man_duongpho&id_cat="+b.value+"";	
		else
			window.location ="index.php?com=product1&act=man_duongpho";	
		return true;
	}
/*function select_onchange1()
	{
		var b=document.getElementById("id_cat");
		var c=document.getElementById("id_cat1");
		if(c!=0)
			window.location ="index.php?com=product1&act=man_duongpho&id_cat="+b.value+"&id_cat1="+c.value+"";	
		else
			window.location ="index.php?com=product1&act=man_duongpho&id_cat="+b.value+"";
		return true;
	}	*/
function select_onchange1()
	{		
		var c=document.getElementById("id_cat1");
		if(c!=0)
			window.location ="index.php?com=product1&act=man_duongpho&id_cat1="+c.value+"";	
		else
			window.location ="index.php?com=product1&act=man_duongpho";
		return true;
	}	
</script>
<?php

function get_main_category()
	{
		$sql="select * from table_product_phu where com='thanhpho'  order by stt asc,id desc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_cat" name="id_cat" onchange="select_onchange()" class="main_font">
			 <option value="0">Chọn danh mục</option>
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_cat"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
function get_main_category1()
	{
		$sql="select * from table_product_phu where com='quanhuyen' and id_cat='".(int)@$_REQUEST["id_cat"]."' order by stt asc,id desc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_cat1" name="id_cat1" onchange="select_onchange1()" class="main_font">
			 <option value="0">Chọn quận huyện</option>
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_cat1"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}	
	
?>

<table class="blue_table">
	<tr>
		<th style="width:6%;">Stt</th>		
        <!--<th style="width:20%;">Thành phố</th>-->
        <th style="width:20%;">Quận huyện</th>
        <th style="width:20%;">Tên</th>
		<th style="width:6%;">Hiển thị</th>
		<th style="width:6%;">Sửa</th>
		<th style="width:6%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;"><?=$items[$i]['stt']?></td>
        <!--<td style="width:20%;">
        	<?php
			$sql_danhmuc1="select ten from table_product_phu where id='".$items[$i]['id_cat']."'";
			$result=mysql_query($sql_danhmuc1);
			$item_danhmuc1 =mysql_fetch_array($result);
			echo @$item_danhmuc1['ten'];
			?>
        </td>-->	
        <td style="width:20%;">
        	<?php
			$sql_danhmuc1="select ten from table_product_phu where id='".$items[$i]['id_cat1']."'";
			$result=mysql_query($sql_danhmuc1);
			$item_danhmuc2 =mysql_fetch_array($result);
			echo @$item_danhmuc2['ten'];
			?>
        </td>		       
		<td style="width:20%;"><a href="index.php?com=product1&act=edit_duongpho&id=<?=$items[$i]['id']?><?=((@$_REQUEST['id_cat']!="")?("&id_cat=".@$_REQUEST['id_cat']):"")?><?=((@$_REQUEST['id_cat1']!="")?("&id_cat1=".@$_REQUEST['id_cat1']):"")?><?=((@$_REQUEST['curPage']!="")?("&curPage=".@$_REQUEST['curPage']):"")?>" style="text-decoration:none;"><?=$items[$i]['ten']?></a></td>
       
        
        
		<td style="width:6%;">
        	<a href="index.php?com=product1&act=man_duongpho&hienthi=<?=$items[$i]['id']?><?=((@$_REQUEST['id_cat']!="")?("&id_cat=".@$_REQUEST['id_cat']):"")?><?=((@$_REQUEST['id_cat1']!="")?("&id_cat1=".@$_REQUEST['id_cat1']):"")?><?=((@$_REQUEST['curPage']!="")?("&curPage=".@$_REQUEST['curPage']):"")?>">
			<?php 
            	if(@$items[$i]['hienthi']==1)
            	{
            ?>
            <img src="media/images/active_1.png" />
            <?php 
            	}
            	else
            	{
            ?>
            <img src="media/images/active_0.png" />
             <?php
             	}?>
        	</a>
        </td>
		<td style="width:6%;"><a href="index.php?com=product1&act=edit_duongpho&id=<?=$items[$i]['id']?><?=((@$_REQUEST['id_cat']!="")?("&id_cat=".@$_REQUEST['id_cat']):"")?><?=((@$_REQUEST['id_cat1']!="")?("&id_cat1=".@$_REQUEST['id_cat1']):"")?><?=((@$_REQUEST['curPage']!="")?("&curPage=".@$_REQUEST['curPage']):"")?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:6%;"><a href="index.php?com=product1&act=delete_duongpho&id=<?=$items[$i]['id']?><?=((@$_REQUEST['id_cat']!="")?("&id_cat=".@$_REQUEST['id_cat']):"")?><?=((@$_REQUEST['id_cat1']!="")?("&id_cat1=".@$_REQUEST['id_cat1']):"")?><?=((@$_REQUEST['curPage']!="")?("&curPage=".@$_REQUEST['curPage']):"")?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=product1&act=add_duongpho<?=((@$_REQUEST['id_cat']!="")?("&id_cat=".@$_REQUEST['id_cat']):"")?><?=((@$_REQUEST['id_cat1']!="")?("&id_cat1=".@$_REQUEST['id_cat1']):"")?><?=((@$_REQUEST['curPage']!="")?("&curPage=".@$_REQUEST['curPage']):"")?>"><img src="media/images/add.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>