<div class="col-md-3 hidden-xs hidden-sm stylecontainer3 stylesildertop1">
<div class="container1">
  <ul>
    <li class="dropdown1">
      <a href="#" data-toggle="dropdown1"><span class="glyphicon glyphicon-list"></span> Danh muc<i class="icon-arrow open"></i></a>
      <ul class="dropdown1-menu show">
        <li class="stylemenutrai1" ><a href="#">Thoi trang nam</a></li>
        <li class="stylemenutrai1" ><a href="#">Thoi trang nu</a></li>
        <li class="stylemenutrai1" ><a href="#">Thoi trang tre em</a></li>
      </ul>
    </li>
    <li class="dropdown1">
      <a href="#" data-toggle="dropdown1"><span class="glyphicon glyphicon-certificate"></span> Thuong hieu<i class="icon-arrow open"></i></a>
      <ul class="dropdown1-menu show">
        <li class="stylemenutrai1" ><a href="#"><label><input type="checkbox"> Check me out</label></a></li>
        <li class="stylemenutrai1" ><a href="#"><label><input type="checkbox"> Check me out</label></a></li>
        <li class="stylemenutrai1" ><a href="#"><label><input type="checkbox"> Check me out</label></a></li>
        <li class="stylemenutrai1" ><a href="#"><label><input type="checkbox"> Check me out</label></a></li>
		<li class="stylemenutrai1" ><a href="#"><label><input type="checkbox"> Check me out</label></a></li>
      </ul>
    </li>
    <li class="dropdown1">
      <a href="#" data-toggle="dropdown1"><span class="glyphicon glyphicon-usd"></span> Gia<i class="icon-arrow open"></i></a>
      <ul class="dropdown1-menu show">
        <li class="stylemenutrai1" ><a href="#"><label><input type="checkbox"> 100000-500000</label></a></li>
        <li class="stylemenutrai1" ><a href="#"><label><input type="checkbox"> 500000-1000000</label></a></li>
        <li class="stylemenutrai1" ><a href="#"><label><input type="checkbox"> 1000000-2000000</label></a></li>
        <li class="stylemenutrai1" ><a href="#"><label><input type="checkbox"> Tren 2000000</label></a></li>
      </ul>
    </li>
	<li class="dropdown1">
      <a href="#" data-toggle="dropdown1"><span class="glyphicon glyphicon-usd"></span> Size<i class="icon-arrow open"></i></a>
      <ul class="dropdown1-menu show">
        <li class="stylemenutrai1" ><a href="#"><label><input type="checkbox"> Size S</label></a></li>
        <li class="stylemenutrai1" ><a href="#"><label><input type="checkbox"> Size M</label></a></li>
        <li class="stylemenutrai1" ><a href="#"><label><input type="checkbox"> Size L</label></a></li>
        <li class="stylemenutrai1" ><a href="#"><label><input type="checkbox"> Size XL</label></a></li>
		<li class="stylemenutrai1" ><a href="#"><label><input type="checkbox"> Size XXL</label></a></li>
      </ul>
    </li>
  </ul>
</div>
</div>
<div class="col-md-9 stylecontainer1">
	<div class="row-fluid stylecontainer1">
		<img class="styleimage1" src="images/slide/4.jpg">
	</div>
	<div class="row-fluid">
		<?php for($i=0; $i<12;$i++) { ?>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 stylecontainer2">
				<div class="span3">
					<div class="thumbnail">
						<a href="#"><img src="images/sanpham/sanpham1.jpg" alt="" style="width:100%; height:100%"></a>
						<p><strong>Tên</strong></p>
						<p>Giá</p>
						<a class="btn btn-default btn-sm" href="#">&raquo; Chi tiết</a>
						<a class="btn btn-primary btn-sm" href="#">&raquo; Đặt hàng</a>
							<?php $shop='shop'.$i; ?>					
							<a id="<?=$shop?>"></a>
							<script>
								(function() {

								'use strict';

								// SHOP ELEMENT
								var shop = document.querySelector('#<?=$shop?>');

								// DUMMY DATA
								var data = [
								  {
									rating: 0
								  }
								];

								// INITIALIZE
								(function init() {
								  for (var i = 0; i < data.length; i++) {
									addRatingWidget(buildShopItem(data[i]), data[i]);
								  }
								})();

								// BUILD SHOP ITEM
								function buildShopItem(data) {
								  var shopItem = document.createElement('div');

								  var html = '<a class="c-rating"></a>' ;

								  shopItem.classList.add('c-shop-item');
								  shopItem.innerHTML = html;
								  shop.appendChild(shopItem);

								  return shopItem;
								}

								// ADD RATING WIDGET
								function addRatingWidget(shopItem, data) {
								  var ratingElement = shopItem.querySelector('.c-rating');
								  var currentRating = data.rating;
								  var maxRating = 5;
								  var callback = function(rating) { alert(rating); };
								  var r = rating(ratingElement, currentRating, maxRating, callback);
								}

							  })();

							</script>
					</div>
				</div>
			
			</div>
		<?php } ?>
	</div>
</div>
<script src="js/indexmenudoc.js" type="text/javascript"></script>