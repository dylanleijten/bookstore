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


	/*
	** Function to check if item exist in Database
	** $select = The item to select [ Example: username, product_name ]
	** $from = The table To select from [ Example: klant, product, category ]
	** $value = The value of $select 
	*/

	function checkItem($select, $table, $value) {

		global $db;

		$statement = $db->prepare("SELECT $select FROM $table WHERE $select = ?");
		$statement->execute(array($value));

		return $statement->rowCount();
	}


	/*
	** Home redirect function [This function accept parameters]
	** $theMsg = Echo the the message [ Error | Success | Warning ]
	** $url = The link you want to redirect to
	** $seconds = Seconds before redirecting
	*/

	function redirectHome($theMsg, $url=null, $seconds = 3) {

		if ($url === null) {
			$url = 'index.php';
			$link = 'Homepage';
		} elseif ($url != 'back') {
			$url = $url.'.php';
			$link = 'previouse page';
		} else {

			if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
				$url = $_SERVER['HTTP_REFERER'];
				$link = 'previouse page';
			} else {
				$url 	= 'index.php';
				$link 	= 'Homepage'; 
			}
					
		}

		echo $theMsg;
		echo "<div class='alert alert-info'>You will be redirected to $link after $seconds</div>";

		header("refresh:$seconds;url=$url");
		exit();
	}
