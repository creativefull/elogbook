<?php
	$gaSql['user']     = 'root';
	$gaSql['password'] = 'toor';
	$gaSql['db']       = 'elogbook';
	$gaSql['server']   = 'localhost';
	$gaSql['port']     = 3306; // 3306 is the default MySQL port

	$gaSql['charset']  = 'utf8';

	/**
	* MySQL connection
	*/
	$db = new mysqli($gaSql['server'], $gaSql['user'], $gaSql['password'], $gaSql['db'], $gaSql['port']);
	if (mysqli_connect_error()) {
		die( 'Error connecting to MySQL server (' . mysqli_connect_errno() .') '. mysqli_connect_error() );
	}

	if (!$db->set_charset($gaSql['charset'])) {
		die( 'Error loading character set "'.$gaSql['charset'].'": '.$db->error );
	}
?>