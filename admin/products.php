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

	    // Manage Products Page 
	    // Check if get request category_id is numeric & get the integer value of it
		 	$prd_id = isset($_GET['prd_id']) && is_numeric($_GET['prd_id']) ? intval($_GET['prd_id']) : 0;
			// Select all Products
			$sql = "SELECT product.product_id product_id, isbn, title, author, edition,release_date,product_img, stock, price, category.category_name AS category
			        FROM product
			        LEFT JOIN product_has_category ON product.product_id = product_has_category.product_id
			        LEFT JOIN category ON category.category_id = product_has_category.category_id
			        WHERE product.product_id = :prd_id";

			$stmt = $db->prepare($sql);
			$stmt->bindValue(':prd_id', $prd_id);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
      ?>
		<h1 class="text-center">Product</h1>
				<div class="container">
					<div class="row">
						<div class="col-md-5 col-xs-12">
							<img src="<?php echo 'data/uploads/' . $row['product_img']; ?>" alt="book image" class="img-responsive">
						</div>
						<div class="col-md-7 col-xs-12">
							<table class="product">
								<tr>
									<td>ISBN&nbsp;&nbsp;&nbsp;</td>
									<td><?php echo $row['isbn']; ?></td>
								</tr>
								<tr>
									<td>Title&nbsp;&nbsp;&nbsp;</td>
									<td><?php echo $row['title']; ?></td>
								</tr>
								<tr>
									<td>Author&nbsp;&nbsp;&nbsp;</td>
									<td><?php echo $row['author']; ?></td>
								</tr>
								<tr>
									<td>Edition&nbsp;&nbsp;&nbsp;</td>
									<td><?php echo $row['edition']; ?></td>
								</tr>
								<tr>
									<td>Release Date&nbsp;&nbsp;&nbsp;</td>
									<td><?php echo $row['release_date']; ?></td>
								</tr>
								<tr>
									<td>Stock&nbsp;&nbsp;&nbsp;</td>
									<td><?php echo $row['stock']; ?></td>
								</tr>
								<tr>
									<td>Price&nbsp;&nbsp;&nbsp;</td>
									<td><?php echo $row['price']; ?></td>
								</tr>
								<tr>
									<td>Category&nbsp;&nbsp;&nbsp;</td>
									<td><?php echo $row['category']; ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
    <?php
	} elseif ($do == 'Add') { //Add Product?>
		
		<h1 class="text-center">Add New Product</h1>
				<div class="container">
					<form class="form-horizontal" action="?do=Insert" method="POST" enctype='multipart/form-data'>
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
						<!-- Start Image Field -->
						<div class="form-group form-group-lg">
							<div class="form-group form-group-lg">
							<label for="author" class="col-sm-2 control-label">Image</label>
								<div class="col-sm-10 col-md-6">
									<input class="form-control" type="file" name="image-data" id="image-data">
								</div>
							</div>
						</div>
						
						<!-- End Image Field -->

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
		 		$fileName     = $_FILES["image-data"]["name"];

		 		/* File updload */
						 $target_dir = "data/uploads/";
						 $target_file = $target_dir . basename($_FILES["image-data"]["name"]);
						 $uploadOk = 1;
						 $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						// Check if image file is a actual image or fake image
						 if(isset($_POST["submit"])) {
						 	$check = getimagesize($_FILES["image-data"]["tmp_name"]);
						 	if($check !== false) {
						 		echo "File is an image - " . $check["mime"] . ".";
						 		$uploadOk = 1;
						 	} else {
						 		echo "File is not an image.";
						 		$uploadOk = 0;
						 	}
						 }
						// Check if file already exists
						if (file_exists($target_file)) {
							echo "Sorry, file already exists.";
							$uploadOk = 0;
						}
						// Check file size
						if ($_FILES["image-data"]["size"] > 500000) {
							echo "Sorry, your file is too large.";
							$uploadOk = 0;
						}
						// Allow certain file formats
						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
							&& $imageFileType != "gif" ) {
							echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
						$uploadOk = 0;
											}
						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
							echo "Sorry, your file was not uploaded.";
						// if everything is ok, try to upload file
						} else {
							if (move_uploaded_file($_FILES["image-data"]["tmp_name"], $target_file)) {
								echo "The file ". basename( $_FILES["image-data"]["name"]). " has been uploaded.";
							} else {
								echo "Sorry, there was an error uploading your file.";
							}
						}
		 		/* File updload */

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

		 	     if (strlen($title) > 40) {
		 	     	$formErrors[] = 'Title cant be more than <strong>40 characters</strong>';
		 	     }

		 	     if (empty($author)) {
		 	     	$formErrors[] = 'Title cant be <strong>empty</strong>';
		 	     }

		 	     // Author
		 	     if (strlen($author) < 3) {
		 	     	$formErrors[] = 'Author Name cant be less than <strong>3 characters</strong>';
		 	     }

		 	     if (strlen($author) > 40) {
		 	     	$formErrors[] = 'Author Name cant be more than <strong>40 characters</strong>';
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
				 		$sql = "INSERT INTO product (isbn, title, author, edition, release_date, product_img, stock, publisher_id, price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
				 		$stmt = $db->prepare($sql);
	                    $data = array($isbn, $title, $author, $edition, $date, $fileName, $stock,$publisher_id, $price);
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
		// Edit Page

			// Check if get request category_id is numeric & get the integer value of it
		 	$prd_id = isset($_GET['prd_id']) && is_numeric($_GET['prd_id']) ? intval($_GET['prd_id']) : 0;
            
            // Select all data depend on this id
            $sql = "SELECT * FROM product WHERE product_id = :prd_id";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':prd_id', $prd_id);
            $stmt->execute(); 
            $row1 = $stmt->fetch(PDO::FETCH_ASSOC);
            // $stmt->closeCursor();
            $pub_id = $row1['publisher_id'];

            // If theres such id show the form 
            if ($stmt->rowCount() > 0) { ?>
	
            <h1 class="text-center">Edit Product</h1>
				<div class="container">
					<form class="form-horizontal" action="?do=Insert" method="POST" enctype='multipart/form-data'>
						<input type="hidden" name="prd_id" value="<?php echo $prd_id; ?>">
						<!-- Start ISBN Field -->
						<div class="form-group form-group-lg">
							<label for="isbn" class="col-sm-2 control-label">ISBN</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="isbn" value="<?php echo $row1['isbn']; ?>" id="isbn" autocomplete="off" required="required" placeholder="">
							</div>
						</div>
						<!-- End ISBN Field -->
						<!-- Start Title Field -->
						<div class="form-group form-group-lg">
							<label for="title" class="col-sm-2 control-label">Title</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="title" value="<?php echo $row1['title']; ?>" id="title" autocomplete="off" required="required" placeholder="">
							</div>
						</div>
						<!-- End Title Field -->
						<!-- Start Author Field -->
						<div class="form-group form-group-lg">
							<label for="author" class="col-sm-2 control-label">Author</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="author" value="<?php echo $row1['author']; ?>" id="author" autocomplete="off" required="required" placeholder="">
							</div>
						</div>
						<!-- End Author Field -->
						<!-- Start Edition Field -->
						<div class="form-group form-group-lg">
							<label for="edition" class="col-sm-2 control-label">Edition</label>
							<div class="col-sm-10 col-md-6">
								<select name="edition" id="edition">
									<option value="<?php echo $row1['edition']; ?>"><?php echo $row1['edition']; ?></option>
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

									// Select all publisher´s
									$sql = "SELECT publisher FROM publisher WHERE publisher_id = :pub_id";
									$stmt1 = $db->prepare($sql);
									$stmt1->bindValue(':pub_id', $pub_id);
									$stmt1->execute();
									$row_pub = $stmt1->fetch(PDO::FETCH_ASSOC);
								    $stmt1->closeCursor();
									print_r($row_pub);
								?>
								    <option value="<?php echo $row1['publisher_id']; ?>"><?php echo $row_pub['publisher']; ?></option>
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
									<input class="form-control" type="text" name="date" value="<?php $row['release_date']; ?>" id="date" autocomplete="off" required="required" placeholder="">
								</div>
							</div>
						</div>
						<!-- End Release Date Field -->
						<!-- Start Image Field -->
						<div class="form-group form-group-lg">
							<div class="form-group form-group-lg">
							<label for="author" class="col-sm-2 control-label">Date</label>
								<div class="col-sm-10 col-md-6">
									<input class="form-control" type="file" name="image-data" value="<?php $row['product_img'] ?>" id="image-data">
								</div>
							</div>
						</div>
						<?php 
						 $target_dir = "data/uploads/";
						 $target_file = $target_dir . basename($_FILES["image-data"]["name"]);
						 $uploadOk = 1;
						 $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						// Check if image file is a actual image or fake image
						 if(isset($_POST["submit"])) {
						 	$check = getimagesize($_FILES["image-data"]["tmp_name"]);
						 	if($check !== false) {
						 		echo "File is an image - " . $check["mime"] . ".";
						 		$uploadOk = 1;
						 	} else {
						 		echo "File is not an image.";
						 		$uploadOk = 0;
						 	}
						 }
						
						// Check file size
						if ($_FILES["image-data"]["size"] > 500000) {
							echo "Sorry, your file is too large.";
							$uploadOk = 0;
						}
						// Allow certain file formats
						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
							&& $imageFileType != "gif" ) {
							echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
						$uploadOk = 0;
											}
						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
							echo "Sorry, your file was not uploaded.";
						// if everything is ok, try to upload file
						} else {
							if (move_uploaded_file($_FILES["image-data"]["tmp_name"], $target_file)) {
								echo "The file ". basename( $_FILES["image-data"]["name"]). " has been uploaded.";
							} else {
								echo "Sorry, there was an error uploading your file.";
							}
						}
						 ?>
						<!-- End Image Field -->

						<!-- Start Stock Field -->
						<div class="form-group form-group-lg">
							<label for="author" class="col-sm-2 control-label">Stock</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="number" name="stock" value="<?php $row['stock']; ?>" id="stock" autocomplete="off" required="required" placeholder="">
							</div>
						</div>
						<!-- End Stock Field -->
						<!-- Start Price Field -->
						<div class="form-group form-group-lg">
							<label for="author" class="col-sm-2 control-label">Price</label>
							<div class="col-sm-10 col-md-6">
								<input class="form-control" type="text" name="price" value="<?php $row['price']; ?>" id="price" autocomplete="off" required="required" placeholder="">
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
     <?php }

	} elseif ($do == 'Update') {

	} elseif ($do == 'Delete') {

		echo '<h1 class="text-center">Delete Category</h1>';
		 	echo '<div class="container">';
		 	// Delete Category page

		 	// Check if get request userid is numeric & get the integer value of it
		 	$prd_id = isset($_GET['prd_id']) && is_numeric($_GET['prd_id']) ? intval($_GET['prd_id']) : 0;
            
            // Select all data depend on this id
            
		 	if (checkItem('product_id', 'product', $prd_id)) {

		 		$sql = "DELETE FROM product_has_category WHERE product_has_category.product_id = :prd_id";
			 	$stmt = $db->prepare($sql);
			 	$stmt->bindValue(':prd_id', $prd_id);
			 	$stmt->execute();

			 	$sql = "DELETE FROM product WHERE product_id = :prd_id ";
			 	$stmt = $db->prepare($sql);
			 	$stmt->bindValue(':prd_id', $prd_id);
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