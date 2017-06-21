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
			$sql = "SELECT product_id, isbn, title, author, edition,release_date, stock, price
			        FROM product";
			        // INNER JOIN category ON 'product.category_id '= 'product_has_category.category_id'
			        // INNER JOIN product_has_category ON 'product_has_category.category_id' = 'category.category_id'";
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
								<select name="edtion" id="edition">
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
								<input class="btn btn-primary btn-lg" type="submit" value="Add Category">
							</div>
						</div>
						<!-- End Submit Field -->
					</form>
				</div>

	<?php
    
    } elseif ($do == 'Insert') {

	} elseif ($do == 'Edit') {

	} elseif ($do == 'Update') {

	} elseif ($do == 'Delete') {

	}

	include $tpl . 'footer.inc.php';
} else {
	header('Location: index.php');
	exit();
}