<?php
/*
=============================================
== Manage XX Page
== You can Add | Edit | Delete | XX from here
=============================================
*/

session_start();
$pageTitle = 'Categories';

if(isset($_SESSION['username'])) {
	include 'init.php';

	$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

	if ($do == 'Manage') {

	} elseif ($do == 'Add') {

	} elseif ($do == 'Insert') {

	} elseif ($do == 'Edit') {

	} elseif ($do == 'Update') {

	} elseif ($do == 'Delete') {

	}

	include $tpl . 'footer.inc.php';
} else {
	header('Location: index.php');
	exit();
}