<?php

include 'connect.php';

// Routes
$tpl 	= 'includes/templates/'; // Templates directory
$lang 	= 'includes/languages/'; // Languages directory
$func 	= 'includes/functions/'; // Functions directory
$css 	= 'layout/css/'; // Css directory
$js  	= 'layout/js/'; // Js directory


// Include the important files
  include $func . 'functions.php';
  include $lang . 'english.php';
  include $tpl . 'header.inc.php'; 

 // Include Navbar on all pages expect the one with $noNavbar variable
  if (!isset($noNavbar)) { include $tpl . 'navbar.php'; }
  
