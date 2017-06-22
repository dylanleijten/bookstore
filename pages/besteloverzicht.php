<?php
$cart = User::get()->cart;

if(isset($_POST['keuze'])){
    $selected = $_POST['verzendkeuze'];
} else {
    $selected = "0";
}
?>
<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>BEDANKT VOOR UW BESTELLING!</h1>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <?php if(!$cart->count()): ?>
                <h1>Je hebt nog geen producten om te bestellen.</h1>
            <?php else: ?>
                <h2>Uw bestelde producten</h2>
                <?php foreach($cart->getProducts() as $key => $product): ?>
                    <div class="col-md-12">
                        <!-- Overview Items -->
                        <table class="shopping-cart">
                            <!-- Overview Item -->
                            <tr>
                                    <!-- Overview Image -->
                                    <td class="image"><a href="<?= url('product') ?>&product=<?=$product->product_id?>"><img src="<?= $product->product_img ?>" alt="Item Name"></a></td>
                                    <!-- Overview Item Description & Features -->
                                    <td>
                                        <div class="cart-item-title"><a href="<?= url('product') ?>&product=<?=$product->product_id?>"><?=$product->title?></a></div>
                                    </td>
                                    <!-- Overview Quantity -->
                                    <td class="quantity">
                                        <input disabled="disabled" name="hoeveelheid" class="form-control input-sm input-micro" type="number" value="<?=$product->amount?>">
                                    </td>
                                    <!-- Overview Item Price -->
                                    <td class="price">&euro;<?=($product->price)*($product->amount)?></td>
                            </tr>
                            <!-- End Overview Item -->
                        </table>
                        <!-- End Overview Items -->
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
        <div class="row">
            <!-- Shipment Options -->
            <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-6">
                <div class="cart-shippment-options">
                    <h6><i class="glyphicon glyphicon-plane"></i> Verzendkosten</h6>
                    <div class="input-append">
                        <form action="" method="post">
                            <select disabled name="verzendkeuze" class="form-control input-sm">
                                <option value="0">Standaard - Gratis</option>
                                <option value="10.00">Europa - &euro;10.00</option>
                                <option value="20.00">Wereldwijd - &euro;20.00</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Shopping Cart Totals -->
            <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-6">
                <table class="cart-totals">
                    <tr>
                        <td><b>Verzendkosten</b></td>
                        <td>
                            <?= '&euro;'.$selected ?>
                        </td>
                    </tr>
                    <tr class="cart-grand-total">
                        <td><b>Totaal</b></td>
                        <td><b>&euro;<?= $cart->sum() ?></b></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
$cart->clear();
?>