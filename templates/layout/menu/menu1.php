<nav class="navbar navbar-inverse styleheader2">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">LOGO</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Product <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
		<li><a href="#">Blog</a></li>
		<li><a href="#">About</a></li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Search" name="q">
			<div class="input-group-btn">
				<button class="btn btn-default" type="submit">Search</a></button>
			</div>
		</div>
	</form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="fa fa-gift bigicon"></span> 4 - Items in Cart<span class="caret"></span></a>
          <ul class="dropdown-menu dropdown-cart styleimgcart2" role="menu">
			<?php for($i=0; $i<6; $i++) { ?>
              <li class="styleimgcart3">
                  <div class="divcart1">
                    <div class="divcart2">
						<div class="divcart3">
							<img class="styleimgcart1" src="images/sanpham/sanpham1.jpg" alt="" />
						</div>
                        <div class="divcart4">
                            <a>Tên:hhhhhhhhhhhhhhhhhhhhhh</a></br>
                            <a>Giá:njj</a>
                        </div>
                    </div>
                    <div class="divcart5">
                        <button class="btn btn-danger  fa fa-close divcart6"></button>
                    </div>
                </div>
              </li>  
			<?php } ?>
              <li><a class="text-center styleimgcart4" href="#">View Cart</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
</nav>