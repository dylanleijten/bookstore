<?php

spl_autoload_register(function($class) {
	require_once(__DIR__ . '/classes/' . $class . '.php');
});

$db = new Db('localhost', 'bookstore', 'root', '');
$user = new User($db);

define('PAGES_FOLDER', __DIR__ . '/pages');
define('DEFAULT_PAGE', 'index');
define('PAGE_KEY', 'p');

/**
* Build the page path for the specified page
*
*/
function pageFile($page) {
	return PAGES_FOLDER . '/' . $page . '.php';
}

/**
* Build the url query for the specified page
*
*/
function url($page) {
	return 'index.php?'. PAGE_KEY . '=' . $page;
}

// Include the header template
require_once(__DIR__ . '/includes/header.php');

// Pages will be included here
$page = pageFile(DEFAULT_PAGE);

if (isset($_GET[PAGE_KEY])) {

	$requestPage = pageFile($_GET[PAGE_KEY]);

	if (file_exists($requestPage))
		$page = $requestPage;

}


if(file_exists($page))
	require_once($page);
else
	die('Pagina niet gevonden');

// Include the footer template
require_once(__DIR__ . '/includes/footer.php');
