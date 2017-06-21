<?php

   /*
	** Title function that echo the page title in case
	** has the variable $pageTitle And echo default title for other pages
	*/

	function getTitle() {

		global $pageTitle;

		if(isset($pageTitle)) {
			echo $pageTitle;
		} else {
			echo 'Default';
		}
	}


   /*
	** Count number of items
	** Function to count number of items rows
	**
	*/

	function countItems($item, $table) {

		global $db;
		$stmt = $db->prepare("SELECT COUNT($item) FROM $table");
    	$stmt->execute();
        return $stmt->fetchColumn();

	}