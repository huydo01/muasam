<style>
@font-face{
font-family:"UTM Caviar";
src:url(UTM Caviar.ttf);
}
.dangnhaptt{font-family:"UTM Caviar"}
</style>
<section class="content login-page">

  <div class="login-page-container">

    <div class="boxed animated flipInY">
      <div class="inner1" style="background-image: url('media/images/backgroundduoi.png');background-color:none">
        <form action="index.php?com=user&act=login" method="post" class="nhaplieu" id="login">
          <div class="login-title text-center" style="text-align:center;  padding-top: 20px;">
            <h4 style="color:#fff" class="dangnhaptt">Đăng nhập quản trị Website</h4>
          
          </div>
			
			
		   <div class="input-group" style="text-align:center;width:100%;padding-top: 15px;
">
           <h5 style="text-align:center;width:100%;color:#fff;font-family:'UTMCaviar'" >Design by <a style="color:#fff;font-family:'UTMCaviar'">Trần Thị Thuận An</a></h5>
          </div>

		  
          <div class="input-group">
            <span class="input-group-addon" style="background-color:#FFB400;margin-bottom:40px!important"><img src="media/images/user.png" width="100%"/></span>
            <input type="text" name="username" id='username' style="    /* background-image: url('media/images/backgroundinput.png'); */
    /* opacity: 0.3; */
    font-family: 'UTMCaviar';
    color: #000;
    font-weight: bold;
    background-color: #fff;" class="form-control" placeholder="Username" required />
          </div>

          <div class="input-group">
            <span class="input-group-addon" style="background-color:#7BD900"><img src="media/images/key.png" width="100%"/></span>
            <input type="password" name="password" style="      /* background-image: url('media/images/backgroundinput.png'); */
    /* opacity: 0.3; */
    font-family: 'UTMCaviar';
    color: #000;
    font-weight: bold;
    background-color: #fff;" id='password' class="form-control" placeholder="Password" required />
          </div>

          <input style="text-align:center;font-family:'UTMCaviar'" type="submit" class="btn btn-lg btn-success" value="LOGIN" name="submit" id="submit" />

          <p class="footer" style="margin-bottom:0px;color:#fff;font-family:'UTMCaviar'">Vui lòng nhập Username và Password.</p>

		  <p class="footer" style="border-bottom:1px dotted #fff;margin-bottom:17px;width:150px;margin:auto"><!--<i class="fa fa-volume-up"></i>--></p>
		  <p class="footer" style="margin-bottom:17px;width:150px;margin:auto;height:30px"><!--<i class="fa fa-volume-up"></i>--></p>
                          
        </form>
      </div>
    </div>

  </div>

</section>
