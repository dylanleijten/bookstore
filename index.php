<?php
session_start();

require_once(__DIR__ . '/helpers/helpers.php');

spl_autoload_register(function($class) {
	require_once(__DIR__ . '/classes/' . $class . '.php');
});

/**
 * DB class examples
 *
 * Count results:
 *
 * DB::query("SELECT * FROM product")->count();
 *
 *
 * Bind & fetch/fetchAll
 *
 *
 * fetch haalt 1 result op
 * fetchAll haalt meerdere resulaten op
 * Met bind kan je een waarde binden aan ?
 *
 * DB::query("SELECT * FROM product")->fetchAll();
 *
 * $product = DB::query("SELECT * FROM product WHERE product_id = ?")->bind(1)->fetch();
 * $product->title etc..
 */

$user = new User();

$pageManager = new PageManager();

$pageManager->header();

$pageManager->manage();

$pageManager->footer();
