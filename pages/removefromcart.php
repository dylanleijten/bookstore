<?php
$cart = User::get()->cart;

$productIndex = $_GET['productIndex'];

$cart->remove($productIndex);

redirect(url('shopping-cart'));