<?php
	include("../koneksi.php");

	$nim = $_POST['nim'];
	$userid = $_POST['userid'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "INSERT INTO usertbl VALUES (null,'$userid','$username','$nim','$password','2') ";
	if (mysqli_query($db, $sql)) {
		$response = array(
			'status' => 200
		);
		echo json_encode($response);
	} else {
		$response = array(
			'status' => 503
		);
		echo json_encode($response);
	}
?>