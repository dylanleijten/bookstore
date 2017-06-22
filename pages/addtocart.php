<?php

$itemIncremented = false;

$cart = User::get()->cart;

$products = $cart->getProducts();

$productId = $_GET['product'];

$amount = isset($_GET['hoeveelheid']) ? $_GET['hoeveelheid'] : 1;

$product = DB::query('SELECT * FROM product WHERE product_id = ?')->bind($productId)->fetch();

foreach (Session::get('products') as $key => $entry) {

        if($entry->product_id === $product->product_id) {
            $cart->incrementAmount($key, $amount);
            $itemIncremented = true;
        }
}

if(!$itemIncremented) {
    $cart->addProduct($product, $amount);
}

var_dump($amount);

redirect(url('shopping-cart'));