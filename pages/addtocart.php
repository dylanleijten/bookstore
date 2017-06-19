<?php

$cart = User::get()->cart;

$productId = $_GET['product'];

$product = DB::query('SELECT * FROM product WHERE product_id = ?')->bind($productId)->fetch();


$cart->addProduct($product);