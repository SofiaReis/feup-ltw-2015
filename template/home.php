<script src="./js/login_vale.js"></script>
<script src="./js/register_vale.js"></script>

<section class="billboard-body">
	<section class="caption">
		<p class="cap_title">Share Your Events</p>
		<p class="cap_desc">With Other People</p>
	</section>
</section><!-- Billboard End -->

	<section class="services wrapper" id="services">
			<ul class="desc">
				<li>
					<span><i class="fa fa-calendar-check-o"></i></span>
					<h3> Create and attend</h3>
					<p>Our website will provide you with a fast and organized way to create, share, attend and comment events.</p>
				</li>
				<li>
					<span><i class="fa fa-user-plus"></i></span>
					<h3>Invite people</h3>
					<p>You can invite other people to see and attend to your events.</p>
				</li>
				<li>
					<span><i class="fa fa-user-secret"></i></span>
					<h3>Events privacy</h3>
					<p>You can have public and private events.</p>
				</li>
			</ul>
	</section><!-- services End -->

	<section class="call_to_action" id="join">
		<div class="wrapper">
			<!--<img src="img/cta_image.png" alt="" title="">-->
			<section class="cta_desc">
				<h3>Join Us.</h3>
				<p>
				Get in this adventure with us!
				</p>
				<a href="#modal" class="cta_btn" id="modal_trigger" >Login or Register</a>

				<div id="modal" class="popupContainer" style="display:none;">
		<header class="popupHeader">
			<span class="header_title">Login</span>
			<span class="modal_close"><i class="fa fa-times"></i></span>
		</header>

		<section class="popupBody">
			<!-- Social Login -->
			<div class="social_login">
				

				<div class="centeredText">
					<span>Please, Join Us!</span>
				</div>

				<div class="action_btns">
					<div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
					<div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
				</div>
			</div>

			<!-- Username & Password Login form -->
			<div class="user_login" name="login">
				<form action="./php/action_login.php" method="post" enctype="multipart/form-data" name="login_form">
					<label>Username</label>
					<input type="text" name="username" id="inpt_username"/>
					<br />

					<label>Password</label>
					<input type="password" name="password" id="inpt_pass"/>
					<br />

					<div class="checkbox">
						<input id="remember" type="checkbox" />
						<label for="remember">Remember me on this computer</label>
					</div>

					<div class="action_btns">
						<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
						<!-- <div class="one_half last"><a href="#" class="btn btn_red">Login</a></div> -->
						<div class="one_half last"><button class="btn btn_red" type="submit" onClick="return validateLogin();">Login</button></div>
					</div>
				</form>

				<a href="#" class="forgot_password">Forgot password?</a>
			</div>

			<!-- Register Form -->
			<div class="user_register" name="register">
				<form action="./php/action_register.php" method="post" enctype="multipart/form-data" name="register_form">
					<label>First Name</label>
					<input type="text" name="firstname" id="firstname"/>
					<br />

					<label>Last Name</label>
					<input type="text" name="lastname" id="lastname"/>
					<br />

					<label>Username</label>
					<input type="text" name="username" id="username"/>
					<br />

					<label>Email Address</label>
					<input type="email" name="email" id="email"/>
					<br />

					<label>Password</label>
					<input type="password" name="password" id="pass"/>
					<br />

					<label>Password comfirmation</label>
					<input type="password" name="cpassword" id="cpass"/>
					<br />

					<div class="action_btns">
						<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
						<div class="one_half last"><button class="btn btn_red" type="submit" onClick="return validateRegister();">Register</button></div>

						<!-- <div class="one_half last"><a href="#"  class="btn btn_red" >Register</a></div> -->
					</div>
				</form>
			</div>
		</section>


	</div>

	<script type="text/javascript">
	$("#modal_trigger").leanModal({top : 150, overlay : 0.6, closeButton: ".modal_close" });

	$(function(){
		// Calling Login Form
		$("#login_form").click(function(){
			$(".social_login").hide();
			$(".user_login").show();
			return false;
		});

		// Calling Register Form
		$("#register_form").click(function(){
			$(".social_login").hide();
			$(".user_register").show();
			$(".header_title").text('Register');
			return false;
		});

		// Going back to Social Forms
		$(".back_btn").click(function(){
			$(".user_login").hide();
			$(".user_register").hide();
			$(".social_login").show();
			$(".header_title").text('Login');
			return false;
		});

	})
</script>


			</section>
		</div>

	</section><!-- call_to_action End -->
