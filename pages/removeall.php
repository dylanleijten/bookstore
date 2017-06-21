<?php
$cart = User::get()->cart;

$cart->clear();

redirect(url('shopping-cart'));