<?php

/**
* 
*
*/

/**
* Build the url query for the specified page
*
*/
function url($page) {
	return 'index.php?p=' . $page;
}

function email_exists($email) {
	return DB::query("SELECT * FROM klant WHERE email = ?")->bind($email)->count();
}

function old($key) {
	return isset($_POST[$key]) ? $_POST[$key] : '';
}