<?php


//index.php?p=producs&order=asc

$sql = $sql = 'SELECT * FROM product';
$order = isset($_GET['order']) ? $_GET['order'] : 0;
if($order === 'title'){
    $sql = 'SELECT * FROM product ORDER BY title';
} elseif ($order === 'price') {
    $sql = 'SELECT * FROM product ORDER BY price';
} else {
    $sql = $sql = 'SELECT * FROM product';
}

$products = DB::query($sql)->fetchAll();

if(isset($_POST['search'])) {
	$title = $_POST['title'];

	$products = DB::query("SELECT * FROM product WHERE title LIKE ?")->bind("%$title%")->fetchAll();

}

?>

        <!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Ons aanbod</h1>
                        <form name="sort_boxes">
                            <input type="checkbox" name="sort" name="sort_title" onclick="javascript:window.location.href='<?= url('products') ?>&order=title'"><p style="color:#adadad">Sorteer op titel</p>
                            <input type="checkbox" name="sort" name="sort_price" onclick="javascript:window.location.href='<?= url('products') ?>&order=price'"><p style="color:#adadad">Sorteer op prijs</p>
                        </form>

						<form method="POST" action="">
							<h1>Zoeken op titel</h1><br>
							<input value="<?= old('title') ?>" name="title" placeholder="Titel" type="text" class="form-control" required><br>
							<button name="search" style="width:150px;" class="form-control" type="submit">Zoeken</button>
						</form>

					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
				<div class="row">
					<?php if(isset($_POST['search'])): ?>
						<h1><?= count($products) ?> Resultaten gevonden</h1>
					<?php endif; ?>
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
			</div>
	    </div>


