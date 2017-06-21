<?php

// Wanneer de gebruiker op de register knop heeft geklikt

$errors = [];

if(isset($_POST['register'])) {

	unset($_POST['register']);

	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];

	// Check of de wachtwoorden overeen komen
	if($password != $repassword) {
		$errors[] = "De wachtwoorden komen niet overeen";
	}

	// Checken of het email bestaat
	if(email_exists($email)) {
		$errors[] = "Dit emailadres is al in gebruik";
	}
	
	// Check of het wachtwoord uit minimaal 6 karakters bestaat
	if(strlen($password) < 6) {
		$errors[] = "Het wachtwoord moet uit minimaal 6 karakters bestaan";
	}


	foreach($_POST as $veld) {
		if(empty($veld)) {
			$errors[] = "Niet alle velden zijn ingevuld";
			break;
		}
	}

	//Als er geen errors zijn maak de gebruiker aan
	if(!count($errors)) {

		$success = true;

		$password = password_hash($password, PASSWORD_DEFAULT);

		DB::query(
		"INSERT INTO klant (password, email, full_name, phone_number, street, house_number, zip_code) VALUES (?,?,?,?,?,?,?)"
		)->bind($password, $_POST['email'], $_POST['name'], $_POST['telefoon'], $_POST['huisnummer'], $_POST['straat'], $_POST['postcode'])->exec();
		

	}


}


?>

		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Register</h1>
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
								Je account is aangemaakt!
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
							<form role="form" method="POST" action="">
								<div class="form-group">
		        				 	<label for="register-username"><i class="icon-user"></i> <b>Naam</b></label>
									<input class="form-control" value="<?=old('name')?>" name="name" id="register-username" type="text" placeholder="Naam" required>
								</div>
								<div class="form-group">
		        				 	<label for="register-password"><i class="icon-lock"></i> <b>Straat</b></label>
									<input class="form-control" name="straat" value="<?=old('straat')?>" id="straat" type="text" placeholder="Straat" required>
								</div>
								<div class="form-group">
		        				 	<label for="register-password"><i class="icon-lock"></i> <b>Huisnummer</b></label>
									<input class="form-control" name="huisnummer" value="<?= old('huisnummer') ?>" id="huisnummer" type="text" placeholder="Huisnummer" required>
								</div>
								<div class="form-group">
		        				 	<label for="register-password"><i class="icon-lock"></i> <b>Postcode</b></label>
									<input class="form-control" name="postcode" value="<?= old('postcode') ?>" id="postcode" type="text" placeholder="Postcode" required>
								</div>
								<div class="form-group">
		        				 	<label for="register-password"><i class="icon-lock"></i> <b>Woonplaats</b></label>
									<input class="form-control" name="woonplaats" value="<?= old('woonplaats') ?>" id="woonplaats" type="text" placeholder="Woonplaats" required>
								</div>
								<div class="form-group">
		        				 	<label for="register-password2"><i class="icon-lock"></i> <b>Telefoonnummer</b></label>
									<input class="form-control" name="telefoon" value="<?= old('telefoon') ?>" id="phone" type="text" placeholder="Telefoonnummer" required>
								</div>
								<hr>
								<div class="form-group">
		        				 	<label for="register-username"><i class="icon-user"></i> <b>Email</b></label>
									<input class="form-control" name="email" value="<?= old('email') ?>" id="register-username" type="text" placeholder="Email" required>
								</div>
								<div class="form-group">
		        				 	<label for="register-password"><i class="icon-lock"></i> <b>Wachtwoord</b></label>
									<input class="form-control" name="password" id="register-password" type="password" placeholder="Wachtwoord" required>
								</div>
								<div class="form-group">
		        				 	<label for="register-password2"><i class="icon-lock"></i> <b>Wachtwoord herhalen</b></label>
									<input class="form-control" name="repassword" id="register-password2" type="password" placeholder="Wachtwoord" required>
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