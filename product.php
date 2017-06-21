<?php

$productId = $_GET['product'];

$product = DB::query('SELECT * FROM product WHERE product_id = ?')->bind($productId)->fetch();

$reviews = DB::query('SELECT * FROM beoordeling WHERE product_product_id = ?')->bind($product->product_id)->fetchAll();

if(isset($_POST['plaats']) && User::auth()) {
	echo '<h1>TEST</h1>';

	$review = $_POST['review'];
	$rating = $_POST['rating'];
	$date = date('Y-m-d');


	$query = "
	INSERT INTO beoordeling (review, review_date, klant_klant_id, product_product_id, beoordeling_ster_rating_id)
	VALUES (?,?,?,?,?)
	";


	$insert = DB::query($query)->bind($review, $date, User::get()->klant_id, $product->product_id, $rating)->exec();
}

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
                                    <p><?php foreach($reviews as $review): ?>
                                         <p>Bericht:<br><?= $review->review ?> </p>
										 <p><i><?php foreach(range(1, $review->beoordeling_ster_rating_id) as $i) { echo '&#9734;';} ?></i></p>
                                    <?php endforeach; ?></p>
                                    
                                    
									<?php if(User::auth()): ?>
                                        <form action="" method="post" accept-charset="utf-8">
                                    <fieldset>	
                                        <p><label for="rating">beoordeling</label><input type="radio" name="rating"
                                  value="5" /> 5 <input type="radio" name="rating" value="4" /> 4
                                  <input type="radio" name="rating" value="3" /> 3 <input type="radio"
                                  name="rating" value="2" /> 2 <input type="radio" name="rating" value="1" /> 1</p>
                                        <p><label for="review">Bericht</label><textarea name="review" rows="8" cols="40"></textarea></p>
                                        <p><input type="submit" name="plaats" value="Plaats bericht"></p>
                                <input type="hidden" name="product_type" value="actual_product_type" id="product_type">
                                <input type="hidden" name="product_id" value="actual_product_id" id="product_id">
                                    </fieldset>
                                        </form>

									<?php else: ?>
									<h2>Log in om een review te plaatsen</h2>

									<?php endif; ?>
                            
								</div>
							</div>
						</div>
	    			</div>
	    			<!-- End Full Description & Specification -->
	    		</div>
			</div>
		</div>