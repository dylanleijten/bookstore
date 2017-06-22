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

    $orderId = DB::lastInsertId();

    foreach ($cart->getProducts() as $product) {
        $prodid = $product->product_id;

            $sql = "INSERT INTO product_order (product_id, order_id) VALUES (?, ?)";

        DB::query($sql)->bind($prodid, $orderId)->exec();
    }

    redirect(url('besteloverzicht'));
} else {
    echo "<h4>Log in om te kunnen bestellen!</h4>";
}