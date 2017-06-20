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
	    					<img src="<?= $product->product_img ?>" alt="Item Name">
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
	    					<?=$product->info?>
	    				</p>
						<table class="shop-item-selections">
                            <!-- Quantity -->
                            <form action="<?= url('addtocart') ?>&product=<?=$product->product_id?>">
                                <input type="hidden" name="p" value="addtocart">
                                <input type="hidden" name="product" value="<?= $product->product_id ?>">
                            <tr>
                                <td><b>Aantal:</b></td>
                                <td>
                                    <input type="text" class="form-control input-sm input-micro" name="hoeveelheid" value="1" maxlength="2">
                                </td>
                            </tr>
                            <!-- Add to Cart Button -->
                            <tr>
                                <td>
                                    <button type="submit" class="btn"><i class="icon-shopping-cart icon-white"></i> Toevoegen</button>
                                </td>
                            </tr>
                            </form>
                        </table>
	    			</div>
	    			<!-- End Product Summary & Options -->
	    			
	    			<!-- Full Description & Specification -->
	    			<div class="col-sm-12">
	    				<div class="tabbable">
	    					<!-- Tabs -->
							<ul class="nav nav-tabs product-details-nav">
								<li class="active"><a href="#tab1" data-toggle="tab">Reviews</a></li>
							</ul>
								<!-- Tab Content (Reviews) -->
								<div class="tab-pane" id="tab1">
                                    <h4>Wat zeggen onze gebruikers?</h4>
								</div>
							</div>
						</div>
	    			</div>
	    			<!-- End Full Description & Specification -->
	    		</div>
			</div>
		</div>