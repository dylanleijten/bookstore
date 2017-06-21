<?php
	session_start(); 
	$noNavbar = '';
	$pageTitle = 'Login';
	if (isset($_SESSION['username'])) {
		header('Location: dashboard.php'); // Redirect to dashboard.php
	}
	include 'init.php';
	
	// Check if user coming from http request
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$username = $_POST['user'];
		$password = $_POST['pass'];

		$hashedPass = sha1($password);

		 //Check if the user exist in Database
		 $sql = "SELECT klant_id, username, password FROM klant WHERE username = :user AND password = :pass AND group_id = :group_id LIMIT 1";
		 $stmt =  $db->prepare($sql);
		 $stmt->bindValue(':user', $username);
		 $stmt->bindValue(':pass', $hashedPass);
		 $stmt->bindValue(':group_id',1);
		 $stmt->execute(); 
		 $row = $stmt->fetch();
		 $count = $stmt->rowCount();

		 // If count > 0, this mean the database contain record about this usename
		 if ($count > 0) {
		 	$_SESSION['username'] = $username; // Register session name 
		 	$_SESSION['id']	= $row['klant_id'];// Register session id
		 	header('Location: dashboard.php'); // Redirect to dashboard.php
		 	exit();
		 }

	}
?>


<form class="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<h4 class="text-center">Admin Login</h4>
	<input class="form-control" type="text" name="user" placeholder="Username" autocomplete="off">
	<input class="form-control" type="password" name="pass" placeholder="Password" autocomplete="new-password">
	<input class="btn btn-primary btn-block" type="submit" value="Login">
</form>
	
<?php include $tpl . 'footer.inc.php'; ?>
