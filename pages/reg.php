<?php
include_once ("bd.php");
session_start();
if (!empty($_SESSION['login']) and !empty($_SESSION['id'])){
  $id = $_SESSION['id'];
  $result = mysql_query("SELECT * FROM users WHERE id='$id'",$db); 
  $user = mysql_fetch_array($result);
}
?>
<html>
<head>
<title>Реєстрація</title>
<meta charset="UTF-8">
<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./sys/css/normalize.css">
<link rel="stylesheet" href="./sys/css/style.css">
</head>
<body>
<?php
include("../sys/template/left_menu.php");
?>
<div class="wrapper">
<div class="tabs">
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-1" checked class="tab-switch">
      <label for="tab-1" class="tab-label">Реєстрація</label>
        <div class="tab-content">
        <?php
        if (!empty($user['id'])) { ?>
          <h2>Ви вже зареєстровані!</h2>
          <a href="/">На головну</a>
        <?php } else { ?>
          <h2>Заповніть форму:</h2>
          <form action="save_user.php" method="post" enctype="multipart/form-data">
            <label>Логін:<br></label>
            <input name="login" type="text" size="15" maxlength="15">
            <label>Пароль:<br></label>
            <input name="password" type="password" size="15" maxlength="15">
            <label>Підтвердження пароля:<br></label>
            <input name="password2" type="password" size="15" maxlength="15">
            <label>Реєстраційний e-mail(не відображається в анкеті):<br></label>
            <input name="reg_mail" type="email" size="15" maxlength="255"><br/>
            <label>Стать:<br/></label>
            <select name="sex" size = "2" multiple> 
            <option value="0">Жіноча</option> 
            <option value="1">Чоловіча</option> 
            </select>
             <p>
              <label>Оберіть аватар. Зображення повинно бути формату jpg, gif або png:<br></label>
              <input type="FILE" name="fupload">
            </p>
            <p>
            <input type="submit" name="submit" value="Зареєструватися">
            </p>
          </form>
        <?php } ?>
</div>
</div>
</div>
</div>
</body>
</html>
