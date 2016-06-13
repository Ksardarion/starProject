<html>
<head>
<meta charset="UTF-8">
<title>Збереження, зачекайте</title>
<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./sys/css/normalize.css">
<link rel="stylesheet" href="./sys/css/style.css">
</head>
</html>
<?php
session_start();
unset($_SESSION['msg']);

if (isset($_POST['firstname'])) { 
	$firstname = $_POST['firstname']; 
	if ($firstname == '') { 
		unset($firstname);
	} 
} 
if (isset($_POST['lastname'])) { 
	$lastname = $_POST['lastname']; 
	if ($lastname == '') { 
		unset($lastname);
	} 
} 
if (isset($_POST['age'])) { 
	$age = $_POST['age']; 
	if ($age == '') { 
		unset($age);
	} 
}
if (isset($_POST['vis_mail'])) { 
	$vis_mail = $_POST['vis_mail']; 
	if ($vis_mail == '') { 
		unset($vis_mail);
	} 
}

include_once ("bd.php");
$user_id = $_SESSION['id'];
$editank = mysql_query("UPDATE users SET firstname='$firstname',lastname='$lastname',age='$age',vis_mail='$vis_mail' WHERE id='$user_id'");
if ($editank = 'TRUE') {
$_SESSION['msg'] = 'Зміни збережено';
} else {
$_SESSION['msg'] = 'Сталася якась помилка. Зверніться до системного Адміністратора';
}
header('Location: '.$_SERVER['HTTP_REFERER']);
?>