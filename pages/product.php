<?php

$productId = $_GET['product'];

$product = DB::query('SELECT * FROM product WHERE product_id = ?')->bind($productId)->fetch();

?>
        <!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Product Details</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
	    		<div class="row">
	    			<!-- Product Image & Available Colors -->
	    			<div class="col-sm-6">
	    				<div class="product-image-large">
	    					<img src="<?= $product->img_link ?>" alt="Item Name">
	    				</div>
	    			</div>
	    			<!-- End Product Image -->
	    			<!-- Product Summary & Options -->
	    			<div class="col-sm-6 product-details">
	    				<h4><?= $product->title ?></h4>
	    				<div class="price">
							&euro; <?= $product->price ?>
						</div>
						<h5>Beknopte info</h5>
	    				<p>
	    					Morbi eleifend congue elit nec sagittis. Praesent aliquam lobortis tellus, nec consequat massa ornare vitae. Ut fermentum justo vel venenatis eleifend. Fusce id magna eros.
	    				</p>
                        <form action="add.php" method="post">
						<table class="shop-item-selections">
                            <!-- Product Nummer -->
                            <tr>
                                <td>
                                    <input type="hidden" name="productnummer" value="1">
                                </td>
                            </tr>
                            <!-- Quantity -->
                            <tr>
                                <td><b>Aantal:</b></td>
                                <td>
                                    <input type="text" class="form-control input-sm input-micro" name="hoeveelheid" value="1" maxlength="2">
                                </td>
                            </tr>
                            <!-- Add to Cart Button -->
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <input type="submit" value="Toevoegen">
                                </td>
                            </tr>

                        </table>
                        </form>
	    			</div>
	    			<!-- End Product Summary & Options -->
	    			
	    			<!-- Full Description & Specification -->
	    			<div class="col-sm-12">
	    				<div class="tabbable">
	    					<!-- Tabs -->
							<ul class="nav nav-tabs product-details-nav">
								<li class="active"><a href="#tab1" data-toggle="tab">Beschrijving</a></li>
								<li><a href="#tab2" data-toggle="tab">Reviews?</a></li>
							</ul>
							<!-- Tab Content (Full Description) -->
							<div class="tab-content product-detail-info">
								<div class="tab-pane active" id="tab1">
									<h4>Product Description</h4>
									<p>
										Donec hendrerit massa metus, a ultrices elit iaculis eu. Pellentesque ullamcorper augue lacus. Phasellus et est quis diam iaculis fringilla id nec sapien. Sed tempor ornare felis, non vulputate dolor. Etiam ornare diam vitae ligula malesuada tempor. Vestibulum nec odio vel libero ullamcorper euismod et in sapien. Suspendisse potenti.
									</p>
									<h4>Product Highlights</h4>
									<ul>
										<li>Nullam dictum augue nec iaculis rhoncus. Aenean lobortis fringilla orci, vitae varius purus eleifend vitae.</li>
										<li>Nunc ornare, dolor a ultrices ultricies, magna dolor convallis enim, sed volutpat quam sem sed tellus.</li>
										<li>Aliquam malesuada cursus urna a rutrum. Ut ultricies facilisis suscipit.</li>
										<li>Duis a magna iaculis, aliquam metus in, luctus eros.</li>
										<li>Aenean nisi nibh, imperdiet sit amet eleifend et, gravida vitae sem.</li>
										<li>Donec quis nisi congue, ultricies massa ut, bibendum velit.</li>
									</ul>
								</div>
								<!-- Tab Content (Reviews) -->
								<div class="tab-pane" id="tab2">
                                    <h4>Wat zeggen onze gebruikers?</h4>
								</div>
							</div>
						</div>
	    			</div>
	    			<!-- End Full Description & Specification -->
	    		</div>
			</div>
		</div>