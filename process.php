<?php
	require_once("config.php");
	

	if(isset($_GET["captcha"])) {
		
		if(strtoupper($_GET['captcha']) == $_SESSION['captcha_id'])
			echo 'true';
		// Else echo '0' as a string
		else
			echo 'false';
	}

	if($_POST) {
		
		if(strtoupper($_POST["captcha"]) != $_SESSION['captcha_id']) {
			exit("Invalid captcha!");

		} else {

			if(!isset($_POST["u_name"]) || trim($_POST["u_name"]) == "") {

				exit("Empty name!");

			} elseif (!isset($_POST["u_email"]) || trim($_POST["u_email"]) == "") {
				
				exit("Empty email!");
			
			} elseif(!isset($_POST["u_msg"]) || trim($_POST["u_msg"]) == "") {
				
				exit("Empty message!");
			} 			


			$name = htmlspecialchars(stripslashes(trim($_POST["u_name"])));
			$email = htmlspecialchars(stripslashes(trim($_POST["u_email"])));
			$message = htmlspecialchars(stripslashes(trim($_POST["u_msg"])));

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 				exit("Invalid email!");
			}

			if(!preg_match("/^[a-z0-9]/i", $name)) {
				exit("Invalid name!");
			}

			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
		    $sql = "INSERT INTO messages (date_time, name, email, message)
		            VALUES (NOW(), :name, :email, :message)";
		    /*** prepare the statement ***/
		    $stmt = $dbh->prepare($sql);
		 
		    /*** bind the params ***/
		    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
		    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
		    $stmt->bindParam(':message', $message, PDO::PARAM_STR);
		 
		    /*** run the sql statement ***/
		    $stmt->execute();
		}
	}