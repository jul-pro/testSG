<?php
	ini_set('session.use_trans_sid', '0');
	session_start();

	require_once("dbsettings.php");

	$dsn = "mysql:host=".HOST.";dbname=".DBNAME.";charset=".CHARSET;
	try {
		$dbh = new PDO($dsn, USER, PASSWORD);
	} catch(PDOException $e) {
		echo $e->getMessage();
	}
