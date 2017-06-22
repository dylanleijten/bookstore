<?php 

/*
=============================================
== Manage Members Page
== You can Add | Edit | Delete | members from here
=============================================
*/

session_start();
$pageTitle = 'Members';

if(isset($_SESSION['username'])) {
		include 'init.php';

		$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
		if($do == 'Manage') { // Manage Members Page 
			// Select all users except Admin
			$sql = "SELECT * FROM klant";
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$stmt->closeCursor();

		?>

			<h1 class="text-center">Manage Members</h1>
			<div class="container">
				<div class="table-responsive">
					<table class="main-table table table-hover table-bordered text-center">
						<thead>
							<tr>
								<th>#ID</th>
								<th>Username</th>
								<th>Email</th>
								<th>Full Name</th>
								<th>Phone Number</th>
								<th>Street</th>
								<th>House Number</th>
								<th>Zip Code</th>
								<th>City</th>
								<th>Country</th>
								<th>Control</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							foreach($rows as $row) {
								echo "<tr>";
									echo "<td>" . $row['klant_id']   .  "</td>";
									echo "<td>" . $row['username']  .  "</td>";
									echo "<td>" . $row['email']     .  "</td>";
									echo "<td>" . $row['full_name'] .  "</td>";
									echo "<td>" . $row['phone_number'] 		.  "</td>";
									echo "<td>" . $row['street'] 		.  "</td>";
									echo "<td>" . $row['house_number'] 		.  "</td>";
									echo "<td>" . $row['zip_code'] 		.  "</td>";
									echo "<td>" . $row['city'] 		.  "</td>";
									echo "<td>" . $row['country'] 		.  "</td>";
									echo "<td>" .
										   '<a href="?do=Edit&userid='. $row['klant_id'] . '" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a>
											<a href="?do=Delete&userid=' . $row['klant_id'] . '" class="btn btn-danger confirm"><i class="fa fa-trash-o"></i>Delete</a>'
									   . "</td>";
								echo "</tr>";
							}
						 ?>
						</tbody>
					</table>
				</div>
				<a href="members.php?do=Add" class="btn btn-success"><i class="fa fa-plus"></i> New Member</a>
			</div>
	
	<?php	} elseif ($do == 'Add') { // Add member page ?>

			<h1 class="text-center">Add New Member</h1>
				<div class="container">
					<form class="form-horizontal" action="?do=Insert" method="POST"> 
						<!-- Start Username Field -->
						<div class="form-group form-group-lg">
							<label for="username" class="col-sm-2 control-label">Username</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="username" id="username" autocomplete="off" required="required" placeholder="">
							</div>
						</div>
						<!-- End Username Field -->
						<!-- Start Password Field -->
						<div class="form-group form-group-lg">
							<label for="password" class="col-sm-2 control-label">Password</label>
							<div class="col-sm-10 col-md-6">
								<input class="password form-control" type="password" name="password" id="password" autocomplete="new-password" required="required" placeholder="">
								<i class="show-pass fa fa-eye fa-lg"></i>
							</div>
						</div>
						<!-- End Password Field -->
						<!-- Start Email Field -->
						<div class="form-group form-group-lg">
							<label for="email" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="email" name="email" id="email" required="required" placeholder="">
							</div>
						</div>
						<!-- End Email Field -->
						<!-- Start Fullname Field -->
						<div class="form-group form-group-lg">
							<label for="fullname" class="col-sm-2 control-label">Full Name</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="fullname" id="fullname" required="required" placeholder="">
							</div>
						</div>
						<!-- End Fullname Field -->
						<!-- Start Phone Field -->
						<div class="form-group form-group-lg">
							<label for="fullname" class="col-sm-2 control-label">Phone Number</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="tel" name="phone" id="phone" required="required" placeholder="">
							</div>
						</div>
						<!-- End Phone Field -->
						<!-- Start Street Field -->
						<div class="form-group form-group-lg">
							<label for="fullname" class="col-sm-2 control-label">Street</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="street" id="street" required="required" placeholder="">
							</div>
						</div>
						<!-- End Street Field -->
						<!-- Start House Field -->
						<div class="form-group form-group-lg">
							<label for="fullname" class="col-sm-2 control-label">House Number</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="house_number" id="house_number" required="required" placeholder="">
							</div>
						</div>
						<!-- End House Field -->
						<!-- Start Zip Field -->
						<div class="form-group form-group-lg">
							<label for="fullname" class="col-sm-2 control-label">Zip Code</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="zip_code" id="zip_code" required="required" placeholder="">
							</div>
						</div>
						<!-- End Zip Field -->
						<!-- Start city Field -->
						<div class="form-group form-group-lg">
							<label for="fullname" class="col-sm-2 control-label">City</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="city" id="city" required="required" placeholder="">
							</div>
						</div>
						<!-- End city Field -->
						<!-- Start Country Field -->
						<div class="form-group form-group-lg">
							<label for="fullname" class="col-sm-2 control-label">Country</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="country" id="country" required="required" placeholder="">
							</div>
						</div>
						<!-- End Country Field -->
						<!-- Start Submit Field -->
						<div class="form-group form-group-lg">
							<div class="col-sm-offset-2 col-sm-10">
								<input class="btn btn-warning btn-lg" type="submit" value="Add Member">
							</div>
						</div>
						<!-- End Submit Field -->
					</form>
				</div>

  <?php 
  		} elseif ($do == 'Insert') {
  			// Insert new member

		 	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		 		echo '<h1 class="text-center">Insert Member</h1>';
		 		echo '<div class="container">';

		 		// Get variables from the form
		 		$username 	  = $_POST['username'];
		 		$password     = $_POST['password'];
		 		$email 		  = $_POST['email'];
		 		$fullname 	  = $_POST['fullname'];
		 		$phone        = $_POST['phone'];
		 		$street       = $_POST['street'];
		 		$house_number = $_POST['house_number'];
		 		$zip_code	  = $_POST['zip_code'];
		 		$city         = $_POST['city'];
		 		$country      = $_POST['country'];


		 		$hashPass = sha1($_POST['password']);

		 	   // Validate the form
		 	     $formErrors = array();

		 	     if (strlen($username) < 4) {
		 	     	$formErrors[] = 'Username cant be less than <strong>4 characters</strong>';
		 	     }

		 	     if (strlen($username) > 20) {
		 	     	$formErrors[] = 'Username cant be more than <strong>20 characters</strong>';
		 	     }

		 	     if (empty($username)) {
		 	     	$formErrors[] = 'Username cant be <strong>empty</strong>';
		 	     } 

		 	     if (empty($password )) {
		 	     	$formErrors[] = 'Password cant be <strong>empty</strong>';
		 	     } 


		 	     if (empty($email)) {
		 	     	$formErrors[] = 'Email cant be <strong>empty</strong>';
		 	     } 

		 	     if (empty($fullname)) {
		 	     	$formErrors[] = 'Full Name cant be <strong>empty</strong>';
		 	     }

		 	     foreach($formErrors as $error) {
		 	     	echo '<div class="alert alert-danger">' . $error . '</div>';
		 	     }  

		 	     // Check if there's no error, proceed the update operation

		 	     if (empty($formErrors)) { 

		 	     	// Check of user exist in Database
		 	     	if (checkItem('username', 'klant', $username)) {
		 	     		$theMsg = '<div class="alert alert-danger">This username exist already.</div>';
	;	 	     		redirectHome($theMsg, 'back');
		 	     	} else {

				 		// Insert user info in the database
				 		$sql = "INSERT INTO klant (username, password, email, full_name, phone_number, street, house_number, zip_code, city, country) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
				 		$stmt = $db->prepare($sql);
				 		$data = array($username, $password, $email, $fullname, $phone, $street, $house_number, $zip_code, $city, $country);
				 		$stmt->execute($data);
				 		$stmt->closeCursor();

				 		// Echo success message
				 		 $theMsg = '<div class="alert alert-success">' . $stmt->rowCount() . ' Record Inserted</div>';   
				 		 redirectHome($theMsg, 'members');
			 		 } 	 
				}
			} else {

				echo '<div class="container">';
						$theMsg = '<div class="alert alert-danger">Sorry you cant browse this page directly</div>';
						redirectHome($theMsg, 'back');
			    echo '</div>';
			}

		} elseif ($do == 'Edit') {
		 // Edit Page

			// Check if get request userid is numeric & get the integer value of it
		 	$userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
            
            // Select all data depend on this id
            $sql = "SELECT * FROM klant WHERE klant_id = :user_id";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':user_id', $userid);
            $stmt->execute(); 
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            // If theres such id show the form 
            if ($stmt->rowCount() > 0) { ?>

				<h1 class="text-center">Edit Member</h1>
				<div class="container">
					<form class="form-horizontal" action="?do=Update" method="POST"> 
					<input type="hidden" name="userid" value="<?php echo $userid; ?>">
						<!-- Start Username Field -->
						<div class="form-group form-group-lg">
							<label for="username" class="col-sm-2 control-label">Username</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="username" value="<?php echo $row['username']; ?>" id="username" autocomplete="off" required="required" placeholder="">
							</div>
						</div>
						<!-- End Username Field -->
						<!-- Start Password Field -->
						<div class="form-group form-group-lg">
							<label for="password" class="col-sm-2 control-label">Password</label>
							<div class="col-sm-10 col-md-6">
								<input type="hidden" name="oldpassword" value="<?php echo $row['password']; ?>">
								<input class="form-control" type="password" name="newpassword" id="password" autocomplete="new-password" placeholder="Leave blank if you dont want to change">
								<i class="show-pass fa fa-eye fa-lg"></i>
							</div>
						</div>
						<!-- End Password Field -->
						<!-- Start Email Field -->
						<div class="form-group form-group-lg">
							<label for="email" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="email" name="email" value="<?php echo $row['email']; ?>" id="email" required="required" placeholder="">
							</div>
						</div>
						<!-- End Email Field -->
						<!-- Start Fullname Field -->
						<div class="form-group form-group-lg">
							<label for="fullname" class="col-sm-2 control-label">Full Name</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="fullname" value="<?php echo $row['full_name']; ?>" id="fullname" required="required" placeholder="">
							</div>
						</div>
						<!-- End Fullname Field -->
						<!-- Start Phone Field -->
						<div class="form-group form-group-lg">
							<label for="fullname" class="col-sm-2 control-label">Phone Number</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="tel" name="phone" value="<?php echo $row['phone_number']; ?>" id="phone" required="required" placeholder="">
							</div>
						</div>
						<!-- End Phone Field -->
						<!-- Start Street Field -->
						<div class="form-group form-group-lg">
							<label for="fullname" class="col-sm-2 control-label">Street</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="street" value="<?php echo $row['street']; ?>" id="street" required="required" placeholder="">
							</div>
						</div>
						<!-- End Street Field -->
						<!-- Start House Field -->
						<div class="form-group form-group-lg">
							<label for="fullname" class="col-sm-2 control-label">House Number</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="house_number" value="<?php echo $row['house_number']; ?>" id="house_number" required="required" placeholder="">
							</div>
						</div>
						<!-- End House Field -->
						<!-- Start Zip Field -->
						<div class="form-group form-group-lg">
							<label for="fullname" class="col-sm-2 control-label">Zip Code</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="zip_code" value="<?php echo $row['zip_code']; ?>" id="zip_code" required="required" placeholder="">
							</div>
						</div>
						<!-- End Zip Field -->
						<!-- Start city Field -->
						<div class="form-group form-group-lg">
							<label for="fullname" class="col-sm-2 control-label">City</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="city" value="<?php echo $row['city']; ?>" id="city" required="required" placeholder="">
							</div>
						</div>
						<!-- End city Field -->
						<!-- Start Country Field -->
						<div class="form-group form-group-lg">
							<label for="fullname" class="col-sm-2 control-label">Country</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="country" value="<?php echo $row['country']; ?>" id="country" required="required" placeholder="">
							</div>
						</div>
						<!-- End Country Field -->
						<!-- Start Submit Field -->
						<div class="form-group form-group-lg">
							<div class="col-sm-offset-2 col-sm-10">
								<input class="btn btn-warning btn-lg" type="submit" value="Add Member">
							</div>
						</div>
						<!-- End Submit Field -->
					</form>
				</div>
				
		<?php
	
			// Else show Error Message
			} else {
				 echo '<div class="container">';
						$theMsg = '<div class="alert alert-danger">There is no such id</div>';
						redirectHome($theMsg);
				 echo '</div>';
			}
		 } elseif ($do == 'Update') {
		 	echo '<h1 class="text-center">Update Member</h1>';
		 	echo '<div class="container">';

		 	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		 		// Get variables from the form
		 		$id 		  = $_POST['userid'];
		 		$username 	  = $_POST['username'];
		 		$password     = $_POST['newpassword'];
		 		$email 		  = $_POST['email'];
		 		$fullname 	  = $_POST['fullname'];
		 		$phone        = $_POST['phone'];
		 		$street       = $_POST['street'];
		 		$house_number = $_POST['house_number'];
		 		$zip_code	  = $_POST['zip_code'];
		 		$city         = $_POST['city'];
		 		$country      = $_POST['country'];
		 		// Password Edit 
		 		 $pass = empty($_POST['newpassword']) ? $_POST['oldpassword'] : sha1($_POST['newpassword']);

		 	   // Validate the form
		 	     $formErrors = array();

		 	     if (strlen($username) < 4) {
		 	     	$formErrors[] = 'Username cant be less than <strong>4 characters</strong>';
		 	     }

		 	     if (strlen($username) > 20) {
		 	     	$formErrors[] = 'Username cant be more than <strong>20 characters</strong>';
		 	     }

		 	     if (empty($username)) {
		 	     	$formErrors[] = 'Username cant be <strong>empty</strong>';
		 	     } 

		 	     if (empty($email)) {
		 	     	$formErrors[] = 'Email cant be <strong>empty</strong>';
		 	     } 

		 	     if (empty($fullname)) {
		 	     	$formErrors[] = 'Full Name cant be <strong>empty</strong>';
		 	     }

		 	     foreach($formErrors as $error) {
		 	     	echo '<div class="alert alert-danger">' . $error . '</div>';
		 	     }  

		 	     // Check if there's no error, proceed the update operation

		 	     if (empty($formErrors)) { 

			 		// Update the database with this info
			 		$sql = "UPDATE klant SET username = ?,  password = ?, email = ?, full_name = ?, phone_number = ?, street = ?, house_number = ?, zip_code = ?, city = ?, country = ?
			 		        WHERE klant_id = ?";
			 		$data = array($username, $password, $email, $fullname, $phone, $street, $house_number, $zip_code, $city, $country, $id);
			 		$stmt = $db->prepare($sql);
			 		$stmt->execute($data);
			 		$stmt->closeCursor();

			 		// Echo success message
			 		$theMsg =  '<div class="alert alert-success">' . $stmt->rowCount() . ' Record Updated</div>'; 
			 		redirectHome($theMsg, 'members');  
		 	   }
		 	} else {
		 		$theMsg = '<div class="alert alert-danger">You cant browse this page directly</div>'; 
		 		redirectHome($theMsg);
		 	}
		 	echo '</div>';
		 } elseif ($do == 'Delete') {
		 	echo '<h1 class="text-center">Delete Member</h1>';
		 	echo '<div class="container">';
		 	// Delete member page

		 	// Check if get request userid is numeric & get the integer value of it
		 	$userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
            
            // Select all data depend on this id
            
		 	if (checkItem('klant_id', 'klant', $userid)) {
			 	$sql = "DELETE FROM klant WHERE klant_id = :user_id";
			 	$stmt = $db->prepare($sql);
			 	$stmt->bindValue(':user_id', $userid);
			 	$stmt->execute();
			 	$stmt->closeCursor();

			 	// Echo success message
				$theMsg = '<div class="alert alert-success">' . $stmt->rowCount() . ' Record Deleted</div>';   
				redirectHome($theMsg, 'back');
			} else {
				$theMsg = '<div class="alert alert-success">This id is not exist</div>';
				redirectHome($theMsg);
			}
		  echo '</div>';
		 }



		include $tpl . 'footer.inc.php';
} else {
	header('Location: index.php');
	exit();
}