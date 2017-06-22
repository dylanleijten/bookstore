<?php
if(User::auth()) {
    $cart = User::get()->cart;
    $date = date("Y-m-d");
    $quantity = $cart->count();
    $amount = $cart->sum();
    $id = User::get()->klant_id;

    $sql = "INSERT INTO `order` (order_date, quantity, amount, klant_id) 
            VALUES(?,?,?,?) ";
    $insert = DB::query($sql)->bind($date,$quantity,$amount,$id)->exec();

    redirect(url('besteloverzicht'));
} else {
    echo "<h4>Log in om te kunnen bestellen!</h4>";
}