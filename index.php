<?php
include_once ("./sys/template/header.php");
?>
<html>
<head>
<title>Психологічні тести</title>
<meta charset="UTF-8">
<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./sys/css/normalize.css">
<link rel="stylesheet" href="./sys/css/style.css">
</head>
<body>
<?php
if (!empty($user['id']))
include("./sys/template/user_menu.php");
?>
<?php
include("./sys/template/left_menu.php");
?>
<div class="wrapper">
<div class="tabs">
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-1" checked class="tab-switch">
      <label for="tab-1" class="tab-label">Головна</label>
    <div class="tab-content">
    <p>
      Для повноцінного користування сайтом радимо зареєструватися!
     
    </p>
    <p>
       P.S З повагою Адміністрація проекту!
    </p>
    </div>
    </div>
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
      <label for="tab-2" class="tab-label">Новини проекту</label>
    <div class="tab-content">
    <h3>Ми стартували!!!</h3>
    <p>
      Всім привіт! Наш проект стартував у Альфа-версії!<br/>
      Допомогти нами ви можете виявленням багів, і регулярним відвідуванням сайту!<br/>
    </p>
    <p>
       P.S З повагою Адміністрація проекту!
    </p>
    </div>
    </div>
    <?php
    if (!empty($_SESSION['login']) or !empty($_SESSION['id'])) {
      ?>
    <?php } ?>
</div>
</div>
</body>
</html>
