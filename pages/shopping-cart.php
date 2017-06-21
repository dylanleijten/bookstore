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
                <h1>Winkelwagen</h1>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Action Buttons -->
                <div class="pull-right">
                    <a href="<?=url('removeall')?>" class="btn btn-grey"><i class="glyphicon glyphicon-refresh"></i> LEEGMAKEN</a>
                    <a href="<?=url('checkout')?>" class="btn"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> AFREKENEN</a>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if(!$cart->count()): ?>
                <h1>Je hebt nog geen producten in je winkelwagen.</h1>
            <?php else: ?>
            <?php foreach($cart->getProducts() as $key => $product): ?>
            <div class="col-md-12">
                <!-- Shopping Cart Items -->
                <table class="shopping-cart">
                    <!-- Shopping Cart Item -->
                    <tr>
                        <form method="GET" action="index.php">
                            <input name="p" value="updatecart" type="hidden">
                            <input type="hidden" value="<?=$key?>" name="productIndex">
                        <!-- Shopping Cart Item Image -->
                        <td class="image"><a href="<?= url('product') ?>&product=<?=$product->product_id?>"><img src="<?= $product->product_img ?>" alt="Item Name"></a></td>
                        <!-- Shopping Cart Item Description & Features -->
                        <td>
                            <div class="cart-item-title"><a href="<?= url('product') ?>&product=<?=$product->product_id?>"><?=$product->title?></a></div>
                        </td>
                        <!-- Shopping Cart Item Quantity -->
                        <td class="quantity">
                            <input name="hoeveelheid" class="form-control input-sm input-micro" type="number" value="<?=$product->amount?>">
                        </td>
                        <!-- Shopping Cart Item Price -->
                        <td class="price">&euro;<?=($product->price)*($product->amount)?></td>
                        <!-- Shopping Cart Item Actions -->
                        <td class="actions">
                            <button type="submit" class="btn btn-xs btn-grey"><i class="glyphicon glyphicon-pencil"></i></button>
                            <a href="<?= url('removefromcart') ?>&productIndex=<?=$key?>" class="btn btn-xs btn-grey"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>
                        </form>
                    </tr>
                    <!-- End Shopping Cart Item -->
                </table>
                <!-- End Shopping Cart Items -->
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
                            <select name="verzendkeuze" class="form-control input-sm">
                                <option value="0">Standaard - Gratis</option>
                                <option value="10.00">Europa - &euro;10.00</option>
                                <option value="20.00">Wereldwijd - &euro;20.00</option>
                            </select>
                            <input type="submit" name="keuze" value="Kies Verzendoptie">
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
                <!-- Action Buttons -->
                <div class="pull-right">
                    <a href="<?= url('removeall')?>" class="btn btn-grey"><i class="glyphicon glyphicon-refresh"></i> LEEGMAKEN</a>
                    <a href="<?= url('checkout')?>" class="btn"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> AFREKENEN</a>
                </div>
            </div>
        </div>
    </div>
</div>