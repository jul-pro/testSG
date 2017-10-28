<?php
	require_once("config.php");
	
	// populate_gbook();



	if(isset($_GET["captcha"])) {
		
		if(strtoupper($_GET['captcha']) == $_SESSION['captcha_id'])
			echo 'true';
		// Else echo '0' as a string
		else
			echo 'false';
	} elseif($_POST) {
		
		if(isset($_POST["refresh"])) {
			
			populate_gbook();

		} elseif(strtoupper($_POST["captcha"]) != $_SESSION['captcha_id']) {
			exit("Invalid captcha");

		} elseif($_POST["u_name"]) {
			$name = $_POST["u_name"];
			$email = $_POST["u_email"];
			$message = $_POST["u_msg"];

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
		    if ($stmt->execute()) {
		        populate_gbook();
		    }
		}
	} else {
		
	}
	