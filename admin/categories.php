<?php
/*
=============================================
== Manage Categories Page
== You can Add | Edit | Delete | Categories from here
=============================================
*/

session_start();
$pageTitle = 'Categories';

if(isset($_SESSION['username'])) {
	include 'init.php';

	$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

	if ($do == 'Manage') {

	   // Manage Categories Page 
			// Select all categories
			$sql = "SELECT * FROM category";
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$stmt->closeCursor();

		?>

			<h1 class="text-center">Manage Categories</h1>
			<div class="container">
				<div class="table-responsive">
					<table class="main-table table table-hover table-bordered text-center">
						<thead>
							<tr>
								<th>#ID</th>
								<th>Category</th>
								<th>Control</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							foreach($rows as $row) {
								echo "<tr>";
									echo "<td>" . $row['category_id']   .  "</td>";
									echo "<td>" . $row['category_name']  .  "</td>";
									echo "<td>" .
										   '<a href="?do=Edit&cat_id='. $row['category_id'] . '" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a>
											<a href="?do=Delete&cat_id=' . $row['category_id'] . '" class="btn btn-danger confirm"><i class="fa fa-trash-o"></i>Delete</a>'
									   . "</td>";
								echo "</tr>";
							}
						 ?>
						</tbody>
					</table>
				</div>
				<a href="?do=Add" class="btn btn-success"><i class="fa fa-plus"></i> New Category</a>
			</div>
	
<?php
	} elseif ($do == 'Add') { //Add Categories?>
		
			<h1 class="text-center">Add New Category</h1>
				<div class="container">
					<form class="form-horizontal" action="?do=Insert" method="POST"> 
						<!-- Start Category Field -->
						<div class="form-group form-group-lg">
							<label for="cat_name" class="col-sm-2 control-label">Category Name</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="cat_name" id="cat_name" autocomplete="off" required="required" placeholder="">
							</div>
						</div>
						<!-- End Category Field -->
			

						<!-- Start Submit Field -->
						<div class="form-group form-group-lg">
							<div class="col-sm-offset-2 col-sm-10">
								<input class="btn btn-primary btn-lg" type="submit" value="Add Category">
							</div>
						</div>
						<!-- End Submit Field -->
					</form>
				</div>

	<?php } elseif ($do == 'Insert') {

		// Insert new category

		 	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		 		echo '<h1 class="text-center">Insert Member</h1>';
		 		echo '<div class="container">';

		 		// Get variables from the form
		 		$cat_name 	= $_POST['cat_name'];

		 	   // Validate the form
		 	     $formErrors = array();

		 	     if (strlen($cat_name) < 3) {
		 	     	$formErrors[] = 'Username cant be less than <strong>4 characters</strong>';
		 	     }

		 	     if (strlen($cat_name) > 20) {
		 	     	$formErrors[] = 'Category Name cant be more than <strong>20 characters</strong>';
		 	     }

		 	     if (is_numeric($cat_name)) {
		 	     	$formErrors[] = 'Category Name cant be a <strong>numeric</strong> value';
		 	     }

		 	     if (empty($cat_name)) {
		 	     	$formErrors[] = 'Category Name cant be <strong>empty</strong>';
		 	     } 

		 	     // Check if there's no error, proceed the update operation

		 	     if (empty($formErrors)) { 

		 	     	// Check of user exist in Database
		 	     	if (checkItem('category_name', 'category', $cat_name)) {
		 	     		$theMsg = '<div class="alert alert-danger">This username exist already.</div>';
   	 	     		    redirectHome($theMsg, 'back');
		 	     	} else {

				 		// Insert user info in the database
				 		$sql = "INSERT INTO category (category_name) VALUES (:cat_name)";
				 		$stmt = $db->prepare($sql);
				 		$stmt->bindValue(':cat_name',$cat_name);
				 		$stmt->execute();
				 		$stmt->closeCursor();

				 		// Echo success message
				 		 $theMsg = '<div class="alert alert-success">' . $stmt->rowCount() . ' Record Inserted</div>';   
				 		 redirectHome($theMsg, 'categories');
			 		 } 	 
				} else {
					$theMsg = '';
					foreach($formErrors as $error) {
		 	     	$theMsg .= '<div class="alert alert-danger">' . $error . '</div>';
		 	     }  
		 	     redirectHome($theMsg, 'back');
				}
			} else {

				echo '<div class="container">';
						$theMsg = '<div class="alert alert-danger">Sorry you cant browse this page directly</div>';
						redirectHome($theMsg, 'back');
			    echo '</div>';
			}


	} elseif ($do == 'Edit') {
		// Edit Page

			// Check if get request category_id is numeric & get the integer value of it
		 	$cat_id = isset($_GET['cat_id']) && is_numeric($_GET['cat_id']) ? intval($_GET['cat_id']) : 0;
            
            // Select all data depend on this id
            $sql = "SELECT category_name FROM category WHERE category_id = :cat_id";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':cat_id', $cat_id);
            $stmt->execute(); 
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            // If theres such id show the form 
            if ($stmt->rowCount() > 0) { ?>

            <h1 class="text-center">Edit Category</h1>
				<div class="container">
					<form class="form-horizontal" action="?do=Update" method="POST">
						<input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>">
						<!-- Start Category Field -->
						<div class="form-group form-group-lg">
							<label for="cat_name" class="col-sm-2 control-label">Category Name</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="cat_name" value="<?php echo $row['category_name']; ?>" id="cat_name" autocomplete="off" required="required" placeholder="">
							</div>
						</div>
						<!-- End Category Field -->
			

						<!-- Start Submit Field -->
						<div class="form-group form-group-lg">
							<div class="col-sm-offset-2 col-sm-10">
								<input class="btn btn-success btn-lg" type="submit" value="Save">
							</div>
						</div>
						<!-- End Submit Field -->
					</form>
				</div>
<?php } //show form

	} elseif ($do == 'Update') {
		echo '<h1 class="text-center">Update Member</h1>';
		echo '<div class="container">';

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		 	// Get variables from the form
		 	$cat_id   = $_POST['cat_id'];
		 	$cat_name = $_POST['cat_name'];

		     // Validate the form
		 	     $formErrors = array();

		 	     if (strlen($cat_name) < 3) {
		 	     	$formErrors[] = 'Username cant be less than <strong>4 characters</strong>';
		 	     }

		 	     if (strlen($cat_name) > 20) {
		 	     	$formErrors[] = 'Category Name cant be more than <strong>20 characters</strong>';
		 	     }

		 	     if (is_numeric($cat_name)) {
		 	     	$formErrors[] = 'Category Name cant be a <strong>numeric</strong> value';
		 	     }

		 	     if (empty($cat_name)) {
		 	     	$formErrors[] = 'Category Name cant be <strong>empty</strong>';
		 	     } 

		 	     // Check if there's no error, proceed the update operation

		 	     if (empty($formErrors)) { 
		 	     	// Update the database with this info
			 		$sql = "UPDATE category SET category_name = :cat_name WHERE category_id = :cat_id";
			 		$stmt = $db->prepare($sql);
			 		$stmt->bindValue(':cat_id', $cat_id);
			 		$stmt->bindValue(':cat_name', $cat_name);
			 		$stmt->execute();
			 		$stmt->closeCursor();

			 		// Echo success message
			 		$theMsg =  '<div class="alert alert-success">' . $stmt->rowCount() . ' Record Updated</div>'; 
			 		redirectHome($theMsg, 'categories');
			 	} else {
			 		$theMsg = '';
					foreach($formErrors as $error) {
		 	     		$theMsg .= '<div class="alert alert-danger">' . $error . '</div>';
			 		}
			 	redirectHome($theMsg, 'back');
		 	   }
		 	} else {
		 		echo '<div class="container">';
						$theMsg = '<div class="alert alert-danger">Sorry you cant browse this page directly</div>';
						redirectHome($theMsg, 'back');
			    echo '</div>';
		 	}

	} elseif ($do == 'Delete') {
		echo '<h1 class="text-center">Delete Category</h1>';
		 	echo '<div class="container">';
		 	// Delete member page

		 	// Check if get request userid is numeric & get the integer value of it
		 	$cat_id = isset($_GET['cat_id']) && is_numeric($_GET['cat_id']) ? intval($_GET['cat_id']) : 0;
            
            // Select all data depend on this id
            
		 	if (checkItem('category_id', 'category', $cat_id)) {
			 	$sql = "DELETE FROM category WHERE category_id = :cat_id";
			 	$stmt = $db->prepare($sql);
			 	$stmt->bindValue(':cat_id', $cat_id);
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
