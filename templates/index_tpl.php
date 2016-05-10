<!-- slide banner-->
	<div class="row-fluid stylesildertop1">
        <?php include_once _template."layout/slide/slide1.php"; ?>
	</div><!--/.slide banner-->
	<!--mục sản phẩm -->
	<hr  width="100%" align="center" /> 
	<div class="row maunen1">
		<div class="col-xs-6 col-sm-3 col-md-3">
			<a href="#" class="thumbnail">
				<img src="images/hinhanh/zara.png" alt="...">
			</a>
		</div>
		<div class="col-xs-6 col-sm-3 col-md-3">
			<a href="#" class="thumbnail">
				<img src="images/hinhanh/zara.png" alt="...">
			</a>
		</div>
		<div class="col-xs-6 col-sm-3 col-md-3">
			<a href="#" class="thumbnail">
				<img src="images/hinhanh/zara.png" alt="...">
			</a>
		</div>
		<div class="col-xs-6 col-sm-3 col-md-3">
			<a href="#" class="thumbnail">
				<img src="images/hinhanh/zara.png" alt="...">
			</a>
		</div>
	</div><!--/.mục sản phẩm-->
	
	<!--Tiêu đề sản phẩm mới nhất-->
	<div class="row-fluid">
		<div class="page-header">
		<div>
			<h3><a href="#">SẢN PHẨM MỚI NHẤT</a></h3>
			<div class="control-box">                            
				<a data-slide="prev" href="#myCarousel" class="carousel-control left">‹</a>
				<a data-slide="next" href="#myCarousel" class="carousel-control right">›</a>
			</div><!--/control-box -->
		</div>
		</div>
	</div><!--/.Tiêu đề sản phẩm mới nhất-->
	<!--Hiển thị sản phẩm mới nhất-->
	<div class="row-fluid">
		<div class="carousel slide" id="myCarousel">
			<div class="carousel-inner">
				<!--/Slide1 --> 
				<div class="item active">
					<ul class="thumbnails">
						<?php for($i=0; $i<4;$i++) { ?>
						<li class="span3">
							<div class="thumbnail">
								<a href="#"><img class="styleimghinhsanpham1" src="images/sanpham/sanpham1.jpg" alt=""></a>
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
						</li>
						<?php } ?>
					</ul>
				</div><!--/.Slide1 -->
				<!--Slide2 --> 				
				<div class="item">
					<ul class="thumbnails">
						<?php for($i=0; $i<4;$i++) { ?>
						<li class="span3">
							<div class="thumbnail">
								<a href="#"><img class="styleimghinhsanpham1" src="images/sanpham/sanpham1.jpg" alt=""></a>
								<p><strong>Tên</strong></p>
								<p>Giá</p>
								<a class="btn btn-default btn-sm" href="#">&raquo; Chi tiết</a>
								<a class="btn btn-primary btn-sm" href="#">&raquo; Đặt hàng</a>
								<?php $shop='shop'.$i.$i; ?>					
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
						</li>
						<?php } ?>
					</ul>
				</div><!--/.Slide2 --> 
				
			</div><!--carousel-inner-->
			
		</div><!--carousel slide-->
	</div>
	<!--Tiêu đề sản phẩm mới nhất-->
	<div class="row-fluid">
		<div class="page-header">
		<div>
			<h3><a href="#">BÁN CHẠY NHẤT</a></h3>
			<div class="control-box">                            
				<a data-slide="prev" href="#myCarousel1" class="carousel-control left">‹</a>
				<a data-slide="next" href="#myCarousel1" class="carousel-control right">›</a>
			</div><!--/control-box -->
		</div>
		</div>
	</div><!--/.Tiêu đề sản phẩm mới nhất-->
	<!--Hiển thị sản phẩm mới nhất-->
	<div class="row-fluid">
		<div class="carousel slide" id="myCarousel1">
			<div class="carousel-inner">
				<!--/Slide1 --> 
				<div class="item active">
					<ul class="thumbnails">
						<?php for($i=0; $i<4;$i++) { ?>
						<li class="span3">
							<div class="thumbnail">
								<a href="#"><img class="styleimghinhsanpham1" class="styleimghinhsanpham1" src="images/sanpham/sanpham1.jpg" alt=""></a>
								<p><strong>Tên</strong></p>
								<p>Giá</p>
								<a class="btn btn-default btn-sm" href="#">&raquo; Chi tiết</a>
								<a class="btn btn-primary btn-sm" href="#">&raquo; Đặt hàng</a>
								<?php $shop='shop'.$i.$i.$i; ?>					
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
						</li>
						<?php } ?>
					</ul>
				</div><!--/.Slide1 -->
				<!--Slide2 --> 				
				<div class="item">
					<ul class="thumbnails">
						<?php for($i=0; $i<4;$i++) { ?>
						<li class="span3">
							<div class="thumbnail">
								<a href="#"><img class="styleimghinhsanpham1" src="images/sanpham/sanpham1.jpg" alt=""></a>
								<p><strong>Tên</strong></p>
								<p>Giá</p>
								<a class="btn btn-default btn-sm" href="#">&raquo; Chi tiết</a>
								<a class="btn btn-primary btn-sm" href="#">&raquo; Đặt hàng</a>
								<?php $shop='shop'.$i.$i.$i.$i; ?>					
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
						</li>
						<?php } ?>
					</ul>
				</div><!--/.Slide2 --> 
				
			</div><!--carousel-inner-->
			
		</div><!--carousel slide-->
	</div>
	<!--Tiêu đề sản phẩm mới nhất-->
	<div class="row-fluid">
		<div class="page-header">
		<div>
			<h3><a href="#">GIÁ TỐT NHẤT</a></h3>
			<div class="control-box">                            
				<a data-slide="prev" href="#myCarousel2" class="carousel-control left">‹</a>
				<a data-slide="next" href="#myCarousel2" class="carousel-control right">›</a>
			</div><!--/control-box -->
		</div>
		</div>
	</div><!--/.Tiêu đề sản phẩm mới nhất-->
	<!--Hiển thị sản phẩm mới nhất-->
	<div class="row-fluid">
		<div class="carousel slide" id="myCarousel2">
			<div class="carousel-inner">
				<!--/Slide1 --> 
				<div class="item active">
					<ul class="thumbnails">
						<?php for($i=0; $i<4;$i++) { ?>
						<li class="span3">
							<div class="thumbnail">
								<a href="#"><img class="styleimghinhsanpham1" src="images/sanpham/sanpham1.jpg" alt=""></a>
								<p><strong>Tên</strong></p>
								<p>Giá</p>
								<a class="btn btn-default btn-sm" href="#">&raquo; Chi tiết</a>
								<a class="btn btn-primary btn-sm" href="#">&raquo; Đặt hàng</a>
								<?php $shop='shop'.$i.$i.$i.$i.$i; ?>					
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
						</li>
						<?php } ?>
					</ul>
				</div><!--/.Slide1 -->
				<!--Slide2 --> 				
				<div class="item">
					<ul class="thumbnails">
						<?php for($i=0; $i<4;$i++) { ?>
						<li class="span3">
							<div class="thumbnail">
								<a href="#"><img class="styleimghinhsanpham1" src="images/sanpham/sanpham1.jpg" alt=""></a>
								<p><strong>Tên</strong></p>
								<p>Giá</p>
								<a class="btn btn-default btn-sm" href="#">&raquo; Chi tiết</a>
								<a class="btn btn-primary btn-sm" href="#">&raquo; Đặt hàng</a>
								<?php $shop='shop'.$i.$i.$i.$i.$i.$i; ?>					
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
						</li>
						<?php } ?>
					</ul>
				</div><!--/.Slide2 --> 
				
			</div><!--carousel-inner-->
			
		</div><!--carousel slide-->
	</div>