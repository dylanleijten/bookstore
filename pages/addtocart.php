<?php

$cart = User::get()->cart;

$products = $cart->getProducts();

$productId = $_GET['product'];

$amount = $_GET['hoeveelheid'];

$product = DB::query('SELECT * FROM product WHERE product_id = ?')->bind($productId)->fetch();

//foreach ($products as $entry) {
//    if($entry->product_id === $product->product_id) {
//        $cart->update($key, $entry);
//    } else {
//        $cart->addProduct($product, $amount);
//    }
//}

$cart->addProduct($product, $amount);

header('Location: '.url('shopping-cart'));