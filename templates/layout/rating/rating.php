						
							<a id="shop"></a>
							<script>
								(function() {

								'use strict';

								// SHOP ELEMENT
								var shop = document.querySelector('#shop');

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

							<!-- EXTERNAL SCRIPTS FOR CALLMENICK.COM, PLEASE DO NOT INCLUDE -->
							<script>
							  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
							  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
							  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
							  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
							  ga('create', 'UA-34160351-1', 'auto');
							  ga('send', 'pageview');
							</script>
							<!-- /EXTERNAL SCRIPTS -->