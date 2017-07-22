<?php
include_once('../ToMysql.php');
include('../class/myclass.php');
include('../class/loginclass.php');
$obj = new myclass;      
$objnew = new loginclass;
$objnew->IsiUserId($_POST['userid'],$_POST['password'],$_POST['planid']);
$objnew->ceklogin('../ToMysql.php');
?>