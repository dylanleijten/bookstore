<?php


$errors = [];


if(isset($_POST['login'])) {

	$email = $_POST['email'];
	$password = $_POST['password'];


	$user  = DB::query('SELECT * FROM klant WHERE email = ?')->bind($email)->fetch();

	if(!$user)
		$errors[] = "Dit email is niet bij ons bekend";

	if(!count($errors)) {
		if(password_verify($password, $user->password)) {

			$success = true;
			Session::set('user', $user);

		} else {
			$errors[] = "Je wachtwoord is incorrect";
		}
	}

	

}

?>

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
					<?php if(isset($success)): ?>
							<div class="alert alert-success">
								Je bent ingelogd!
							</div>
						<?php endif; ?>
					<?php if(count($errors)): ?>
							<div class="alert alert-danger">
								<?php foreach($errors as $error): ?>
									<p><?= $error ?></p>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
						<div class="basic-login">
							<form role="form" role="form" action="" method="post">
								<div class="form-group">
		        				 	<label for="login-username"><i class="icon-user"></i> <b>Email</b></label>
									<input class="form-control" name="email" id="login-username" type="text" placeholder="Email" required>
								</div>
								<div class="form-group">
		        				 	<label for="login-password"><i class="icon-lock"></i> <b>Wachtwoord</b></label>
									<input class="form-control" name="password" id="login-password" type="password" placeholder="Wachtwoord" required>
								</div>
								<div class="form-group">
									<a href="<?= url('register') ?>" class="forgot-password">Nog geen account?</a>
									<button type="submit" name="login" class="btn pull-right">Inloggen</button>
									<div class="clearfix"></div>
								</div>

								<a href="page-password-reset.html" style="margin-top:20px;" class="forgot-password pull-right">Wachtwoord vergeten?</a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>