<?php 
	$site = BASEURL;
	require 'header.php'; 
?>
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="<?php echo $site; ?>login/singIn" method="POST">
							<input type="email" name="email" placeholder="Email Address" />
							<input type="password" name="senha" placeholder="Senha" />
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="<?php echo $site; ?>cadastro" method="POST">
							<input type="text" name="nome" placeholder="Name"/>
							<input type="email" name="email" placeholder="Email Address" />
							<input type="password" name="senha" placeholder="Senha" />
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
<?php require 'footer.php'; ?>