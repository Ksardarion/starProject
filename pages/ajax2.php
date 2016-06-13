<?php
	session_start();
	include_once "bd.php";
	$ank_id = $_POST['id'];
	$q = mysql_result(mysql_query("SELECT `last_test_data` FROM users WHERE id='".$ank_id."'",$db),0);
	// $qq = mysql_fetch_array($q);
	// $usrData = json_encode($qq);
	// $usrData = json_decode($_POST['usrData'], true);
	// $usrData = json_encode($_SESSION['usrData']);
	// echo "$_SESSION[usrData]";
	echo $q;
	// $i="0";
	// while ($i <=11) {
	// $j=$i+1;
	// $q = mysql_query("INSERT INTO tests (user_id, time, errors, proba) 
	// 	VALUES ('".$_SESSION['id']."','".$usrData[$i]['time']."','".$usrData[$i]['error']."','$j');");
	// if ($q = 'TRUE') {
	// 	echo "Результати збережено";
	// }
	// $i++;
	// }
?>