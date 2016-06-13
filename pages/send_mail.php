<html>
<head>
<meta charset="UTF-8">
	<title>Відправка даних на e-mail</title>
	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="../sys/css/normalize.css">
	<link rel="stylesheet" href="../sys/css/style.css">
</head>
<body>
<?php 
session_start();
include_once "bd.php";
if (!empty($_SESSION['login']) and !empty($_SESSION['id'])){
  $id = $_SESSION['id'];
  $q = mysql_query("SELECT * FROM users WHERE id='$id'",$db); 
  $user = mysql_fetch_array($q);
} else {
	exit();
}
if (!empty($_POST['sendData'])) {
    include_once("../sys/classes/mail_class.php");
    $mail = new Mail();
    $mail->to = $user['reg_mail'];
    $mail->subject = "Результати психологічного тесту ЗІРКА";
    $mail->msg = "testing...<br/>";
    $mail->msg = "testing...";
    $mail->rigorous_email_check = 0;
    if($mail->send()){
        echo "Відпрвлено</br>";
        echo "Зверніть увагу на те, що ваш лист може бути помічено як СПАМ</br>";
    }else{
        echo "Стався якийсь збій. Повідомте про це Адміністратора</br>";
    }
    echo "<br/>";
    echo $mail -> msg; 
}
?>
</body>
</html>