<?php
session_start();
include_once ("bd.php");
include_once ("../sys/inc/start.php");
if (empty($_SESSION['login']) or empty($_SESSION['id'])) {
    header('Location: /');
    exit('Ви не авторизовані');
}
?>
<html>
<head>
<meta charset="UTF-8">
<title>Редагування анкети</title>
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
<?php
if (!empty($_SESSION['msg'])) {
    $msg = $_SESSION['msg']; ?>
    <div class="msg"><?php echo "$msg";?></div>
<?php
} ?>
<div class="wrapper">
<div class="tabs">
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-1" checked class="tab-switch">
      <label for="tab-1" class="tab-label">Заповніть анкету ВАШИМИ даними</label>
    <div class="tab-content">
    <?php
    ?>
        <form action="save_ank.php" method="post">
            <label>Прізвище:<br></label>
            <input name="lastname" type="text" size="15" maxlength="32">
            <label>Ім'я:<br></label>
            <input name="firstname" type="text" size="15" maxlength="32">
            <label>Вік:<br></label>
            <input name="age" type="text" size="15" maxlength="2">
            <label>E-mail:<br></label>
            <input name="vis_mail" type="email" size="15" maxlength="255">
            <p>
            <input type="submit" name="submit" value="Зберегти">
            </p>
            </form>
    </div>
    </div>
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
      <label for="tab-2" class="tab-label">Додаткові анкетні дані</label>
    <div class="tab-content">
    <?php
    ?>
        <form action="save_ank2.php" method="post">
            <label>Прізвище:<br></label>
            <input name="lastname" type="text" size="15" maxlength="32">
            <label>Ім'я:<br></label>
            <input name="firstname" type="text" size="15" maxlength="32">
            
            <label>Вік:<br></label>
            <input name="age" type="text" size="15" maxlength="2">
            <label>E-mail:<br></label>
            <input name="vis_mail" type="email" size="15" maxlength="255">
            <p>
            <input type="submit" name="submit" value="Зберегти">
            </p>
            </form>
    </div>
    </div>
</div>
</div>
</body>
</html>
