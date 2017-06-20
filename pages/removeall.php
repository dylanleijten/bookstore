<?php
$cart = User::get()->cart;

$cart->clear();

header('Location:'.url('shopping-cart'));