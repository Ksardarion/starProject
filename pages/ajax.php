<?php
session_start();
include_once "bd.php";
if ($_POST['usrData']) {
	echo "Response";
	$usrData = json_decode($_POST['usrData'], true);
	$_SESSION['usrData'] = $usrData;
	$i="0";
	while ($i <=11) {
	$j=$i+1;
	$q = mysql_query("INSERT INTO tests (user_id, time, errors, proba) 
		VALUES ('".$_SESSION['id']."','".$usrData[$i]['time']."','".$usrData[$i]['error']."','$j');");
	if ($q = 'TRUE') {
		echo "Результати збережено";
	}
	$i++;
	}
	$q1 = mysql_query("UPDATE `users` SET `last_test_data`='".$_POST['usrData']."' WHERE `id` = '".$_SESSION['id']."'");
	if ($q1 = 'TRUE') {
		echo "last data: OK";
	}
} else {
	echo "Дані не отримано";
}
?>