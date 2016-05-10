
	<!--chi tiết sản phẩm-->
	<div class="row">
		<div class="col-md-9 col-sm-9 col-xs-12" style="background-color:#fff">
			<!--chi tiết sản phẩm-->
			<div class="row styleimgcart4">
				<div class="col-md-4 col-sm-4 col-xs-12" style="background-color:#fff">
					<a href="#" class="thumbnail"><img src="images/sanpham/sanpham1.jpg"></a>
				</div>
				<div class="col-md-8 col-sm-8 col-xs-12" style="background-color:#fff">
				<h3>Tên sản phẩm</h3>
				<a>Giá:</a></br>
				<a>Mô tả:</a>
				</br>
				Chọn size: <span><button type="button" class="btn btn-default">S</button></span>
				<span><button type="button" class="btn btn-default">M</button></span>
				<span><button type="button" class="btn btn-default">L</button></span></br>
				</br><button type="button" class="btn btn-primary">Mua ngay</button>
				<button type="button" class="btn btn-default">Thêm vào giỏ hàng</button></br>
				<a id="shopa"></a>
				<script>
				(function() {

				// SHOP ELEMENT
				var shop = document.querySelector('#shopa');

				// DUMMY DATA
				var data = [
				{
					rating: 3
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
			<!-- Mô tả sản phẩm & đánh giá-->
			<div class="row styleimgcart4 danhgiasanpham">
				<ul class="nav nav-tabs" role="tabs">
					<li class="active">
						<a href="#" role="tab" data-toggle="tab">Thông tin sản phẩm</a>
					</li>
					<li>
						<a href="#" role="tab" data-toggle="tab">Đánh giá</a>
					</li>
					<li>
						<a href="#" role="tab" data-toggle="tab">Bình luận</a>
					</li>
				</ul>
				<div class="tab-content">
					<div id="noidung" class="tab-pane fade in active">
						<a></a>
					</div>
					<div id="danhgia" class="tab-pane fade">
						
					</div>
					<div id="binhluan" class="tab-pane fade">
						   <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div>
					</div>
				</div>
			</div>
			<!--./mô tả sản phẩm & đánh giá-->
		</div>
		<div class="col-md-3 col-sm-3 hidden-xs">
			<?php for($i=0; $i<3;$i++) { ?>
			<div class="col-md-12 stylecontainer2">
				<div class="span3">
					<div class="thumbnail">
						<a href="#">
							<img src="images/sanpham/sanpham1.jpg" alt="" style="width:100%; height:100%">
						</a>
					</div>
				</div>
			
			</div>
			<?php } ?>
		</div>
	</div>
	<!--sản phẩm cùng loại-->
	<div class="row">
		<div class="page-header">
			<h3><a>Sản phẩm cùng loại</a></h3>
		</div>
	</div>
	<div class="row-fluid">
		<?php for($i=0; $i<4;$i++) { ?>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 stylecontainer2">
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
									rating: 3
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