<?php
$cart = User::get()->cart;

$productIndex = $_GET['productIndex'];
$amount = $_GET['hoeveelheid'];

$cart->update($productIndex, $amount);

header('Location:'.url('shopping-cart'));