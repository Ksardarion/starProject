<?php
session_start();
include_once ("bd.php");
$user_id = $_SESSION['id'];
$qq = mysql_query("SELECT * FROM users WHERE id='$user_id'",$db);
$user = mysql_fetch_array($qq);
?>
<html>
<head>
<meta charset="UTF-8">
<title>Список користувачів</title>
<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./sys/css/normalize.css">
<link rel="stylesheet" href="./sys/css/style.css">
</head>
<body>
<?php
if (!empty($user['id']))
include("../sys/template/user_menu.php");
?>
<?php
include("../sys/template/left_menu.php");
?>
<div class="wrapper">
<div class="tabs">
	<div class="tab">
      <input type="radio" name="css-tabs" id="tab-1" checked class="tab-switch">
      <label for="tab-1" class="tab-label">Усі зареєстровані</label>
    <div class="tab-content">
    <form action="search.php">
        <input type="text" placeholder="Пошук по користувачах" size="25" />
    </form>
    <?php
    $us = mysql_query("SELECT * FROM users ORDER BY id DESC LIMIT 30",$db);
    while ($users = mysql_fetch_array($us)) {
        ?>
    <div class="resultBox">
    <a href=""></a>
    <?php
    echo "ID:".$users['id']."<br/>";
    echo "Прізвище:".$users['lastname']."<br/>";
    echo "Ім'я:". $users['firstname']."<br/>";
    echo "Логін:". $users['login']."<br/>";
    echo "<a href ='/id".$users['id']."'><img src='../sys/icon/user_page.svg' class='to_user'/></a>";
    ?>
    </div>
    <?php
    }
    ?>
    </div>
    </div>
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
      <label for="tab-2" class="tab-label">Хлопці</label>
    <div class="tab-content">
    <?php
    $us = mysql_query("SELECT * FROM users WHERE sex='1' ORDER BY id DESC LIMIT 30",$db);
    while ($users = mysql_fetch_array($us)) {
        ?>
    <div class="resultBox">
    <?php
    echo "ID:".$users['id']."<br/>";
    echo "Прізвище:".$users['lastname']."<br/>";
    echo "Ім'я:". $users['firstname']."<br/>";
    echo "Логін:". $users['login']."<br/>";
    echo "<a href ='/id".$users['id']."'><img src='../sys/icon/user_page.svg' class='to_user'/></a>";
    ?>
    </div>
    <?php
    }
    ?>
    </div>
    </div>
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-3" class="tab-switch">
      <label for="tab-3" class="tab-label">Дівчата</label>
    <div class="tab-content">
    <?php
    $us = mysql_query("SELECT * FROM users WHERE sex='0' ORDER BY id DESC LIMIT 30",$db);
    while ($users = mysql_fetch_array($us)) {
    	?>
    <div class="resultBox">
    <?php
    echo "ID:".$users['id']."<br/>";
    echo "Прізвище:".$users['lastname']."<br/>";
    echo "Ім'я:". $users['firstname']."<br/>";
    echo "Логін:". $users['login']."<br/>";
    echo "<a href ='/id".$users['id']."'><img src='../sys/icon/user_page.svg' class='to_user'/></a>";
    ?>
    </div>
    <?php
    }
    ?>
    </div>
    </div>
</div>
</div>
</body>
</html>
