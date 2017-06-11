		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Login</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-5 col-md-push-4">
						<div class="basic-login">
							<form role="form" role="form">
								<div class="form-group">
		        				 	<label for="login-username"><i class="icon-user"></i> <b>Email</b></label>
									<input class="form-control" id="login-username" type="text" placeholder="Email">
								</div>
								<div class="form-group">
		        				 	<label for="login-password"><i class="icon-lock"></i> <b>Wachtwoord</b></label>
									<input class="form-control" id="login-password" type="password" placeholder="Wachtwoord">
								</div>
								<div class="form-group">
									<a href="<?= url('register') ?>" class="forgot-password">Nog geen account?</a>
									<button type="submit" class="btn pull-right">Inloggen</button>
									<div class="clearfix"></div>
								</div>

								<a href="page-password-reset.html" style="margin-top:20px;" class="forgot-password pull-right">Wachtwoord vergeten?</a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>