<?php

$productId = $_GET['product'];

$product = DB::query('SELECT * FROM product WHERE product_id = ?')->bind($productId)->fetch();

$reviews = DB::query('SELECT * FROM beoordeling WHERE product_product_id = ?')->bind($product->product_id)->fetchAll();

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
	    					Morbi eleifend congue elit nec sagittis. Praesent aliquam lobortis tellus, nec consequat massa ornare vitae. Ut fermentum justo vel venenatis eleifend. Fusce id magna eros.
	    				</p>
						<table class="shop-item-selections">
                            <!-- Quantity -->
                            <tr>
                                <td><b>Aantal:</b></td>
                                <td>
                                    <input type="text" class="form-control input-sm input-micro" name="hoeveelheid" value="1" maxlength="2">
                                </td>
                            </tr>
                            <!-- Add to Cart Button -->
                            <tr>
                                <td>
                                    <a href="<?= url('addtocart') ?>&product=<?=$product->product_id?>" class="btn"><i class="icon-shopping-cart icon-white"></i> Toevoegen</a>
                                </td>
                            </tr>

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
                                    <p><?php foreach($reviews as $review): ?>
                                         <p>Bericht:<br><?= $review->review ?> </p>
                                    <?php endforeach; ?></p>
                                    
                                    
                                    <form action="product.php" method="post" accept-charset="utf-8">
                                <fieldset>	
                                <p><label for="rating">beoordeling</label><input type="radio" name="rating"
                                  value="5" /> 5 <input type="radio" name="rating" value="4" /> 4
                                  <input type="radio" name="rating" value="3" /> 3 <input type="radio"
                                  name="rating" value="2" /> 2 <input type="radio" name="rating" value="1" /> 1</p>
                                <p><label for="review">Bericht</label><textarea name="review" rows="8" cols="40">
                                   </textarea></p>
                                <p><input type="submit" value="Plaats bericht"></p>
                                <input type="hidden" name="product_type" value="actual_product_type" id="product_type">
                                <input type="hidden" name="product_id" value="actual_product_id" id="product_id">
                            </fieldset>
                            </form>
								</div>
							</div>
						</div>
	    			</div>
	    			<!-- End Full Description & Specification -->
	    		</div>
			</div>
		</div>