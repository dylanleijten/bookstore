<?php
 // Database connection
 $dsn 		= 'mysql:host=localhost;dbname=books_db';
 $username	= 'root';
 $password	= 'myadminpassword321@#';
 $option = array(
 			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
 	);

 try {
 	$db = new PDO($dsn, $username, $password, $option); 
 	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
 }catch (Exception $e) {
 	echo 'Failed To connect' . $e->getMessage();  
 }
