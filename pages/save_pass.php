<html>
<head>
<meta charset="UTF-8">
<title>Зміна паролю, зачекайте</title>
<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./sys/css/normalize.css">
<link rel="stylesheet" href="./sys/css/style.css">
</head>
<body>
<?php
session_start();
unset($_SESSION['msg']);
$id=$_SESSION['id'];
echo "<div class='wrapper'>";
session_start();
if (isset($_POST['old'])) {
	$old = $_POST['old']; 
	if ($old == '') { 
		unset($old);
	} 
} 
if (isset($_POST['new'])) { 
	$new=$_POST['new']; 
	if ($new =='') { 
		unset($new);
	} 
}
if (isset($_POST['new2'])) { 
	$new2=$_POST['new2']; 
	if ($new2 =='') { 
		unset($new2);
	} 
}
if (empty($old) or empty($new) or empty($new2))
{
exit ("Ви заповнили не усі дані");
}
$old = stripslashes($old);
$old = htmlspecialchars($old);
$new = stripslashes($new);
$new = htmlspecialchars($new);
$new2 = stripslashes($new2);
$new2= htmlspecialchars($new2);

$old = trim($old);
$new = trim($new);
$new2 = trim($new2);

$old = md5($old);
$old = strrev($old);
$old = $old."b3p6f";

$new = md5($new);
$new = strrev($new);
$new = $new."b3p6f";

$new2 = md5($new2);
$new2 = strrev($new2);
$new2 = $new2."b3p6f";

include ("./bd.php");

$result = mysql_query("SELECT * FROM users WHERE id='$id'",$db);
$user = mysql_fetch_array($result);
if ($user['password'] != $old)
{
exit ("Ви ввели невірний пароль");
}
elseif ($new!==$new2) {
 	exit("Введені паролі не збігаються");
 } {
          	if ($new==$new2) {
          	$editank = mysql_query("UPDATE users SET password='$new' WHERE id='$id'");
          		if ($editank = 'TRUE') {
          			$_SESSION['msg'] = 'Зміни збережено';
          			header('Location: '.$_SERVER['HTTP_REFERER']);
          		}
          	} else {
          	$_SESSION['msg'] = 'Сталася якась помилка. Зверніться до системного Адміністратора';
          	header('Location: '.$_SERVER['HTTP_REFERER']);
       		exit ("Сталася якась помилка, повторть спробу");
	   		}
}
echo "</div>";
?>
</body>
</html>