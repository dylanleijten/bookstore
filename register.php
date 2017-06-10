<?php include __DIR__ . '/includes/messages.php' ;

if(isset($_POST['register'])) {
}

?>

<?php include __DIR__ . '/templates/nav.php' ?>

        <!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Register</h1>
					</div>
				</div>
			</div>
		</div>

		<?php include __DIR__ . '/templates/messages.php' ?>
        
        <div class="section">
	    	<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-5 col-md-push-4">
						<div class="basic-login">
							<form role="form" method="POST" action="">
								<div class="form-group">
		        				 	<label for="register-username"><i class="icon-user"></i> <b>Email</b></label>
									<input class="form-control" name="email" id="register-username" type="text" placeholder="Email" required>
								</div>
								<div class="form-group">
		        				 	<label for="register-password"><i class="icon-lock"></i> <b>Wachtwoord</b></label>
									<input class="form-control" name="password" id="register-password" type="password" placeholder="Wachtwoord" required>
								</div>
								<div class="form-group">
		        				 	<label for="register-password2"><i class="icon-lock"></i> <b>Wachtwoord herhalen</b></label>
									<input class="form-control" id="register-password2" type="password" placeholder="Wachtwoord" required>
								</div>
								<div class="form-group">
									<button type="submit" name="register" class="btn pull-right">Registreren</button>
									<div class="clearfix"></div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php include __DIR__ . '/templates/footer.php' ?>