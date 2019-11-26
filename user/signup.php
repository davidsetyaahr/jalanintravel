  <?php
  	$title = "Jalanin | Sign In";
  	$top['first'] = "User";
  	$top['second'] = "Sign Up";
  	include "../common/top.php";
  ?>
  <div class="bg-grey">
  	<br>
  <div class="container next-content">
  	<div class="row">
  		<div class="col-md-8 col-md-offset-2">
  			<div class="box-border" style="position: relative;">
  				<div class="logo-white"><span id="jalan" class="jalan">SIGN</span><span class="in">UP</span>
  				</div>
  				<div class="logo-white-bbottom"></div>
  				<div class="next-content">
            <?php 
              if(isset($_GET['msg'])){
                echo "<div class='alert alert-success'><b>Pendaftaran Berhasil</b></div>";
              }
            ?>
  					<form id="register" action="<?php echo base_url()."user/register" ?>" method="post">
              <div class="row">
                <div class="col-md-6">
                  <div class="content-title">First Name</div>
      						<div class="f-12 mb-10">
                    <p>enter your name here</p>
                  </div>
                  <label class="error"><small id="error_first"></small></label>
                  <input type="text" class="form-control radius0 input-bbottom" id="first_name">
                </div>
                <div class="col-md-6">
                  <div class="content-title">Last Name</div>
                  <div class="f-12 mb-10">
                    <p>enter your name here</p>
                  </div>
                  <label class="error"><small id="error_last"></small></label>
                  <input type="text" class="form-control radius0 input-bbottom" id="last_name">
                </div>
                <div class="col-md-6">
                  <br>
                  <div class="content-title">Email</div>
                  <div class="f-12 mb-10">
                    <p>Enter your email addres</p>
                  </div>
                  <label class="error"><small id="error_email"></small></label>
                  <input type="email" class="form-control input-bbottom radius0" id="email">
                </div>
                <div class="col-md-6">
                  <br>
                  <div class="content-title">Phone Number</div>
                  <div class="f-12 mb-10">
                    <p>Enter your number Phone</p>
                  </div>
                  <label class="error"><small id="error_number"></small></label>
                  <input type="text" class="form-control radius0 input-bbottom" id="number">
                </div>
                <div class="col-md-6">
                  <br>
                  <div class="content-title">Password</div>
                  <div class="f-12 mb-10">
                    <p>Enter your password here</p>
                  </div>
                  <label class="error"><small id="error_pass"></small></label>
                  <input type="password" class="form-control input-bbottom radius0" id="password">
                </div>
                <div class="col-md-6">
                  <br>
                  <div class="content-title">Re Password</div>
                  <div class="f-12 mb-10">
                    <p>Enter your password here</p>
                  </div>
                  <label class="error"><small id="error_repass"></small></label>
                  <input type="password" class="form-control input-bbottom radius0" id="repassword">
                </div>
              </div>
  						<br>
  						<br>
  						<input type="submit" class="btn btn-custom green btn-block" value="Sign Up">
  					</form>
  					<br>
  					<div class="text-center">
  						Already have an account? Sign In <a href="signin" class="custom-link green">here</a>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
  <br>
  </div>
  <?php
  	include "../common/bottom.php";
  ?>
