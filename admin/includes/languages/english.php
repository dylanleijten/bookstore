<?php

function lang($phrase) {

	static $lang = array(

		// Dashboard page

		// Navbar Links
		'HOME_ADMIN' => 'Book Store',
		'CATEGORIES' => 'Categories',
		'ITEMS'		 => 'Products',
		'ORDERS' 	 => 'Orders',
		'MEMBERS'	 => 'Members',
		'LOGS'		 => 'Logs',

		//Dasboard Home
		'TOTAL MEMBERS' => 'Total Members',
		'TOTAL ITEMS'	=> 'Total Products',
		'NEW ORDERS'	=> 'New Orders',
		'TOTAL REVIEWS' => 'Total Comments',
		'MORE INFO'		=> 'More info',
		'LATEST USERS'  => 'Latest registerd users',
		'LATEST ITEMS' => 'Latest Products'

		);
        

	return $lang[$phrase];

}