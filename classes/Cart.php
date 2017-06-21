<?php


class Cart {

    public function addProduct($product, $amount) {

        $product->amount = $amount;

        if(Session::exists('products')) {
            Session::append('products', $product);
        } else {
            Session::set('products', []);
        }

    }

    public function getProducts() {

        if(!Session::exists('products'))
            return [];

        return Session::get('products');
    }

    public function remove($key) {
        unset($_SESSION['products'][$key]);
    }

    public function update($key, $amount) {
        $_SESSION['products'][$key]->amount = $amount;
    }

    public function incrementAmount($key) {
        $_SESSION['products'][$key]->amount++;
    }

    public function clear() {
        if(Session::exists('products')) Session::set('products', []);
    }

    public function count() {

        $amount = 0;

        if(!Session::exists('products'))
            return 0;

        foreach(Session::get('products') as $product) {
            $amount += $product->amount;
        }

        return $amount;

    }

    public function sum() {

        $selected = 0;
        $sum = 0;
        if(isset($_POST['keuze'])){
            $selected = $_POST['verzendkeuze'];
        }

        if(!Session::exists('products'))
            return $sum;

        foreach(Session::get('products') as $product) {
            $sum += ($product->price*$product->amount);
        }

        return $sum + $selected;

    }


}