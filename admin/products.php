<?php
/*
=============================================
== Manage Products Page
== You can Add | Edit | Delete | Products from here
=============================================
*/

session_start();
$pageTitle = 'Products';

if(isset($_SESSION['username'])) {
	include 'init.php';

	$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

	if ($do == 'Manage') {
		// Manage Products Page 
			// Select all Products
			$sql = "SELECT product.product_id product_id, isbn, title, author, edition,release_date, stock, price, category.category_name AS category
			        FROM product
			        LEFT JOIN product_has_category ON product.product_id = product_has_category.product_id
			        LEFT JOIN category ON category.category_id = product_has_category.category_id";

			$stmt = $db->prepare($sql);
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$stmt->closeCursor();

		?>

			<h1 class="text-center">Manage Products</h1>
			<div class="container">
				<div class="table-responsive">
					<table class="main-table table table-hover table-bordered text-center">
						<thead>
							<tr>
								<th>#ID</th>
								<th>ISBN</th>
								<th>Title</th>
								<th>Author</th>
								<th>Edition</th>
								<th>Release Date</th>
								<th>Stock</th>
								<th>Category</th>
								<th>Price</th>
								<th>Control</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							foreach($rows as $row) {
								echo "<tr>";
									echo "<td>" . $row['product_id']   .  "</td>";
									echo "<td>" . $row['isbn']  .  "</td>";
									echo "<td>" . $row['title']  .  "</td>";
									echo "<td>" . $row['author']  .  "</td>";
									echo "<td>" . $row['edition']  .  "</td>";
									echo "<td>" . $row['release_date']  .  "</td>";
									echo "<td>" . $row['stock']  .  "</td>";
									echo "<td>" . $row['category']  .  "</td>";
									echo "<td>" . $row['price']  .  "</td>";
									echo "<td>" .
										   '<a href="?do=View&prd_id='. $row['product_id'] . '" class="btn btn-primary"><i class="fa fa-eye"></i>View</a>
										    <a href="?do=Edit&prd_id='. $row['product_id'] . '" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a>
											<a href="?do=Delete&prd_id=' . $row['product_id'] . '" class="btn btn-danger confirm"><i class="fa fa-trash-o"></i>Delete</a>'
									   . "</td>";
								echo "</tr>";
							}
						 ?>
						</tbody>
					</table>
				</div>
				<a href="?do=Add" class="btn btn-success"><i class="fa fa-plus"></i> New Product</a>
			</div>
	
<?php

	} elseif ($do == 'View') {

		echo "Welcome";

	} elseif ($do == 'Add') { //Add Product?>
		
		<h1 class="text-center">Add New Product</h1>
				<div class="container">
					<form class="form-horizontal" action="?do=Insert" method="POST">
						<!-- Start ISBN Field -->
						<div class="form-group form-group-lg">
							<label for="isbn" class="col-sm-2 control-label">ISBN</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="isbn" id="isbn" autocomplete="off" required="required" placeholder="">
							</div>
						</div>
						<!-- End ISBN Field -->
						<!-- Start Title Field -->
						<div class="form-group form-group-lg">
							<label for="title" class="col-sm-2 control-label">Title</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="title" id="title" autocomplete="off" required="required" placeholder="">
							</div>
						</div>
						<!-- End Title Field -->
						<!-- Start Author Field -->
						<div class="form-group form-group-lg">
							<label for="author" class="col-sm-2 control-label">Author</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="author" id="author" autocomplete="off" required="required" placeholder="">
							</div>
						</div>
						<!-- End Author Field -->
						<!-- Start Edition Field -->
						<div class="form-group form-group-lg">
							<label for="edition" class="col-sm-2 control-label">Edition</label>
							<div class="col-sm-10 col-md-6">
								<select name="edition" id="edition">
									<option value=""></option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select>
							</div>
						</div>
						<!-- End Edition Field -->
						<!-- Start Publisher Field -->
						<div class="form-group form-group-lg">
							<label for="edition" class="col-sm-2 control-label">Publisher</label>
							<div class="col-sm-10 col-md-6">
								<select name="publisher_id" id="publisher">
								<?php 
								    // Select all publisher´s
									$sql = "SELECT * FROM publisher";
									$stmt = $db->prepare($sql);
									$stmt->execute();
									$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
									$stmt->closeCursor();

								?>
								    <option value=""></option>
								<?php
									foreach ($rows as $row) {
										echo "<option value=" . $row['publisher_id'] .">" . $row['publisher'] . "</option>";
									}
								?>
								</select>
							</div>
						</div>
						<!-- End Publisher Field -->
						<!-- Start Category Field -->
						<div class="form-group form-group-lg">
							<label for="edition" class="col-sm-2 control-label">Category</label>
							<div class="col-sm-10 col-md-6">
								<select name="category_id" id="category_id">
								<?php 
								    // Select all publisher´s
									$sql = "SELECT * FROM category";
									$stmt = $db->prepare($sql);
									$stmt->execute();
									$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
									$stmt->closeCursor();

								?>
								    <option value=""></option>
								<?php
									foreach ($rows as $row) {
										echo "<option value=" . $row['category_id'] .">" . $row['category_name'] . "</option>";
									}
								?>
								</select>
							</div>
						</div>
						<!-- End Category Field -->
						<!-- Start Release Date Field -->
						<div class="form-group form-group-lg">
							<div class="form-group form-group-lg">
							<label for="author" class="col-sm-2 control-label">Date</label>
								<div class="col-sm-10 col-md-6">
									<input class="form-control" type="date" name="date" id="date" autocomplete="off" required="required" placeholder="">
								</div>
							</div>
						</div>
						<!-- End Release Date Field -->

						<!-- Start Stock Field -->
						<div class="form-group form-group-lg">
							<label for="author" class="col-sm-2 control-label">Stock</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="number" name="stock" id="stock" autocomplete="off" required="required" placeholder="">
							</div>
						</div>
						<!-- End Stock Field -->
						<!-- Start Price Field -->
						<div class="form-group form-group-lg">
							<label for="author" class="col-sm-2 control-label">Price</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="price" id="price" autocomplete="off" required="required" placeholder="">
							</div>
						</div>
						<!-- End Price Field -->
			

						<!-- Start Submit Field -->
						<div class="form-group form-group-lg">
							<div class="col-sm-offset-2 col-sm-10">
								<input class="btn btn-primary btn-lg" type="submit" value="Add Product">
							</div>
						</div>
						<!-- End Submit Field -->
					</form>
				</div>

	<?php
    
    } elseif ($do == 'Insert') {

    	// Insert new category

		 	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		 		echo '<h1 class="text-center">Insert Product</h1>';
		 		echo '<div class="container">';

		 		// Get variables from the form
		 		$isbn   	  = trim($_POST['isbn']);
		 		$title  	  = $_POST['title'];
		 		$author 	  = $_POST['author'];
		 		$edition 	  = $_POST['edition'];
		 		$date  		  = $_POST['date'];
		 		$stock 		  = $_POST['stock'];
		 		$publisher_id = $_POST['publisher_id'];
		 		$category_id  = $_POST['category_id'];
		 		$price 		  = $_POST['price'];

		 	   // Validate the form
		 	     $formErrors = array();

		 	     // ISBN
		 	      if (empty($isbn)) {
		 	     	$formErrors[] = 'ISBN cant be <strong>empty</strong>';
		 	     }

		 	     if (strlen($isbn) < 12 || strlen($isbn) > 15) {
		 	     	$formErrors[] = 'ISBN cant be less than <strong>12 digits</strong> and more than <strong>15 digits</strong>';
		 	     }

		 	     if (!is_numeric($isbn)) {
		 	     	$formErrors[] = 'ISBN must be a <strong>number</strong>';
		 	     }

				// Title
		 	     if (empty($title)) {
		 	     	$formErrors[] = 'Title cant be <strong>empty</strong>';
		 	     }

		 	     if (strlen($title) < 3) {
		 	     	$formErrors[] = 'Title cant be less than <strong>3 characters</strong>';
		 	     }

		 	     if (strlen($title) > 20) {
		 	     	$formErrors[] = 'Title cant be more than <strong>20 characters</strong>';
		 	     }

		 	     if (empty($author)) {
		 	     	$formErrors[] = 'Title cant be <strong>empty</strong>';
		 	     }

		 	     // Author
		 	     if (strlen($author) < 3) {
		 	     	$formErrors[] = 'Author Name cant be less than <strong>3 characters</strong>';
		 	     }

		 	     if (strlen($author) > 20) {
		 	     	$formErrors[] = 'Author Name cant be more than <strong>20 characters</strong>';
		 	     }

		 	     if (is_numeric($author)) {
		 	     	$formErrors[] = 'Author Name cant be a <strong>numeric</strong> value';
		 	     }

		 	     if (empty($author)) {
		 	     	$formErrors[] = 'Author Name cant be <strong>empty</strong>';
		 	     } 
                 
                 // ISBN
		 	      if (empty($edition)) {
		 	     	$formErrors[] = 'Edition cant be <strong>empty</strong>';
		 	     }

		 	     // Price
		 	     
		 	     if (filter_var($author, FILTER_VALIDATE_FLOAT)) {
		 	     	$formErrors[] = 'Price must be a <strong>numeric</strong> value';
		 	     }

		 	     if (empty($author)) {
		 	     	$formErrors[] = 'Price cant be <strong>empty</strong>';
		 	     } 


		 	     // Check if there's no error, proceed the update operation

		 	     if (empty($formErrors)) { 

		 	     	// Check of user exist in Database
		 	     	if (checkItem('isbn', 'product', $isbn)) {
		 	     		$theMsg = '<div class="alert alert-danger">This username exist already.</div>';
   	 	     		    redirectHome($theMsg, 'back');
		 	     	} else {

				 		// Insert product in the DB
				 		$sql = "INSERT INTO product (isbn, title, author, edition, release_date, stock, publisher_id, price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
				 		$stmt = $db->prepare($sql);
	                    $data = array($isbn, $title, $author, $edition, $date, $stock,$publisher_id, $price);
				 		$stmt->execute($data);
				 		$prd_id = $db->lastInsertId(); 
				 		// $stmt->closeCursor();

				 		// Insert Category in the DB
				 		$sql = "INSERT INTO product_has_category (product_id, category_id) VALUES (?, ?)";
				 		$stmt = $db->prepare($sql);
	                    $data = array($prd_id, $category_id);
				 		$stmt->execute($data);
				 		$stmt->closeCursor();

				 		// Echo success message
				 		 $theMsg = '<div class="alert alert-success">' . $stmt->rowCount() . ' Record Inserted</div>';   
				 		 redirectHome($theMsg, 'products');

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

	} elseif ($do == 'Update') {

	} elseif ($do == 'Delete') {

	}

	include $tpl . 'footer.inc.php';
} else {
	header('Location: index.php');
	exit();
}