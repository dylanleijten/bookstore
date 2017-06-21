<?php

if(isset($_POST['sort_title'])) {
    $sql = 'SELECT * FROM product ORDER BY price';
} elseif (isset($_POST['sort_price'])) {
    $sql = 'SELECT * FROM product ORDER BY title';
} else {
    $sql = 'SELECT * FROM product';
}
$products = DB::query($sql)->fetchAll();

?>
        <!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Ons aanbod</h1>
                        <form>
                            <input type="checkbox" name="sort" name="sort_title"><p style="color:#adadad" onclick="changesort(0)">Sorteer op titel</p>
                            <input type="checkbox" name="sort" name="sort_price"><p style="color:#adadad" onclick="changesort(1)">Sorteer op prijs</p>
                        </form>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
				<div class="row">
					<?php foreach($products as $product): ?>
					<div class="col-sm-4">
						<!-- Product -->
						<div class="shop-item">
							<!-- Product Image -->
							<div class="image">
								<a href="<?= url('product') ?>&product=<?=$product->product_id?>"><img src="<?=$product->product_img?>" alt="Item Name"></a>
							</div>
							<!-- Product Title -->
							<div class="title">
								<h3><a href="<?= url('product') ?>"><?= $product->title ?></a></h3>
							</div>
							<!-- Product Price-->
							<div class="price">
								&euro;<?= $product->price ?>
							</div>
							<!-- Add to Cart Button -->
							<div class="actions">
								<a href="<?= url('addtocart') ?>&product=<?=$product->product_id?>" class="btn"><i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
							</div>
						</div>
						<!-- End Product -->
					</div>
					<?php endforeach; ?>

				</div>
				<div class="pagination-wrapper ">
					<ul class="pagination pagination-lg">
						<li class="disabled"><a href="#">Previous</a></li>
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">6</a></li>
						<li><a href="#">7</a></li>
						<li><a href="#">8</a></li>
						<li><a href="#">9</a></li>
						<li><a href="#">10</a></li>
						<li><a href="#">Next</a></li>
					</ul>
				</div>
			</div>
	    </div>