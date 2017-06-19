<?php
$cart = User::get()->cart;
?>
<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Shopping Cart</h1>
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
                    <a href="#" class="btn btn-grey"><i class="glyphicon glyphicon-refresh"></i> UPDATE</a>
                    <a href="#" class="btn"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> CHECK OUT</a>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if(!$cart->count()): ?>
                <h1>Je hebt nog geen producten in je winkelwagen.</h1>
            <?php else: ?>
            <?php foreach($cart->getProducts() as $product): ?>
            <div class="col-md-12">
                <!-- Shopping Cart Items -->
                <table class="shopping-cart">
                    <!-- Shopping Cart Item -->
                    <tr>
                        <!-- Shopping Cart Item Image -->
                        <td class="image"><a href="<?= url("product") ?>"><img src="img/product1.jpg" alt="Item Name"></a></td>
                        <!-- Shopping Cart Item Description & Features -->
                        <td>
                            <div class="cart-item-title"><a href="<?= url("product") ?>"><?= $product->title ?></a></div>
                        </td>
                        <!-- Shopping Cart Item Quantity -->
                        <td class="quantity">
                            <input class="form-control input-sm input-micro" type="text" value="1">
                        </td>
                        <!-- Shopping Cart Item Price -->
                        <td class="price">&euro;<?=$product->price?></td>
                        <!-- Shopping Cart Item Actions -->
                        <td class="actions">
                            <a href="#" class="btn btn-xs btn-grey"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a href="#" class="btn btn-xs btn-grey"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>
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
                    <h6><i class="glyphicon glyphicon-plane"></i> Shippment options</h6>
                    <div class="input-append">
                        <select class="form-control input-sm">
                            <option value="1">Standard - FREE</option>
                            <option value="2">Next day delivery - $10.00</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Shopping Cart Totals -->
            <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-6">
                <table class="cart-totals">
                    <tr>
                        <td><b>Verzendkosten</b></td>
                        <td>Gratis</td>
                    </tr>
                    <tr class="cart-grand-total">
                        <td><b>Totaal</b></td>
                        <td><b>&euro;<?= $cart->sum() ?></b></td>
                    </tr>
                </table>
                <!-- Action Buttons -->
                <div class="pull-right">
                    <a href="#" class="btn btn-grey"><i class="glyphicon glyphicon-refresh"></i> UPDATE</a>
                    <a href="#" class="btn"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> CHECK OUT</a>
                </div>
            </div>
        </div>
    </div>
</div>