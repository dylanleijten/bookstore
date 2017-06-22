<?php

$query = "SELECT product.*, `order`.* FROM `order` 
JOIN product_order ON `order`.order_id = product_order.order_id JOIN product ON product.product_id = product_order.product_id WHERE `order`.klant_id = ? ";

$orders = DB::query($query)->bind(User::get()->klant_id)->fetchAll();

?>

<div class="section">
    <div class="container">
        <div class="row">
            <h1>Mijn bestellingen</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>Titel</th>
                    <th>Auteur</th>
                    <th>Aantal</th>
                    <th>Prijs</th>
                    <th>Totaal</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?=$order->title?></td>
                    <td><?=$order->author?></td>
                    <td><?=$order->quantity?></td>
                    <td><?=$order->price?></td>
                    <td><?=$order->amount?></td>
                    <td></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
