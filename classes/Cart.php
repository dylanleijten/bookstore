<?php

/**
 * Created by IntelliJ IDEA.
 * User: Ralph
 * Date: 6/19/2017
 * Time: 8:58 PM
 */
class Cart {

    public function addProduct($product, $amount = 1) {

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

    public function clear() {
        if(Session::exists('products')) Session::set('products', []);
    }

    public function count() {

        return Session::exists('products') ? count(Session::get('products')) : 0;
    }

    public function sum() {

        $sum = 0;

        if(!Session::exists('products'))
            return $sum;

        foreach(Session::get('products') as $product) {
            $sum += $product->price;
        }

        return $sum;

    }


}