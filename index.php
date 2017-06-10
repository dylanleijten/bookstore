<?php

define('PAGES_FOLDER', __DIR__ . '/pages');
define('DEFAULT_PAGE', 'index');
define('PAGE_KEY', 'p');


function pageFile($page) {
	return PAGES_FOLDER . '/' . $page . '.php';
}

function url($page) {
	return 'index.php?'. PAGE_KEY . '=' . $page;
}


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

require_once(__DIR__ . '/includes/footer.php');
