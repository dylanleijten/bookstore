<?php

require_once(__DIR__ . '/helpers/helpers.php');

spl_autoload_register(function($class) {
	require_once(__DIR__ . '/classes/' . $class . '.php');
});

$db = DB::query('SELECT * FROM USERS')->fetchAll();

$pageManager = new PageManager();

$pageManager->header();

$pageManager->manage();

$pageManager->footer();
