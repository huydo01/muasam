<h3><a href="index.php?com=product1&act=add">Thêm Hãng sản xuất</a></h3>

<table class="blue_table">
	<tr>
		<th style="width:6%;">Stt</th>		
        <th style="width:50%;">Tên</th>
		<th style="width:6%;">Hiển thị</th>
		<th style="width:6%;">Sửa</th>
		<th style="width:6%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;"><?=$items[$i]['stt']?></td>		       
		<td style="width:50%;"><a href="index.php?com=product1&act=edit&id=<?=$items[$i]['id']?>&curPage=<?=$_REQUEST['curPage']?>" style="text-decoration:none;"><?=$items[$i]['ten']?> </a></td>
        
        
        
		<td style="width:6%;">
        	<a href="index.php?com=product1&act=man&hienthi=<?=$items[$i]['id']?>&curPage=<?=$_REQUEST['curPage']?>">
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
		<td style="width:6%;"><a href="index.php?com=product1&act=edit&id=<?=$items[$i]['id']?>&curPage=<?=$_REQUEST['curPage']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:6%;"><a href="index.php?com=product1&act=delete&id=<?=$items[$i]['id']?>&curPage=<?=$_REQUEST['curPage']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=product1&act=add"><img src="media/images/add.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>