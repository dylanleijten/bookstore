<?php
$cart = User::get()->cart;

$productIndex = $_GET['productIndex'];

$cart->remove($productIndex);

header('Location:'.url('shopping-cart'));