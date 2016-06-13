<?php
session_start();
include_once ("bd.php");
$user_id = $_SESSION['id'];
$ank_id=$_GET['id'];
$q = mysql_query("SELECT * FROM users WHERE id='$ank_id'",$db);
$ank = mysql_fetch_array($q);
$qq = mysql_query("SELECT * FROM users WHERE id='$user_id'",$db);
$user = mysql_fetch_array($qq);
$test_q = mysql_query("SELECT * FROM tests WHERE user_id='$ank_id' ORDER BY proba LIMIT 12",$db);
?>
<html>
<head>
<meta charset="UTF-8">
<title>Профіль</title>
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
      <label for="tab-1" class="tab-label">Загальна інформація</label>
    <div class="tab-content">
    <?php
    	 if ($ank['sex'] == 1 ) {
			$asex = 'Чоловіча';
		 } else {
			$asex = 'Жіноча';
		 }
    	echo "ID: ".$ank_id."<br/>";
    	echo "Прізвище: ".$ank['lastname']."<br/>";
    	echo "Ім'я: ".$ank['firstname']."<br/>";
    	echo "Логін: ".$ank['login']."<br/>";
    	echo "Вік: ".$ank['age']."<br/>";
    	echo "Стать: ".$asex."<br/>";
        echo "E-mail: ".$ank['vis_mail']."<br/>";
    ?>
    </div>
    </div>
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
      <label for="tab-2" class="tab-label">Анкета</label>
    <div class="tab-content">
    <?php
    	echo "Прізвище: ".$ank['lastname']."<br/>";
    	echo "По-батькові:<br/>";
    	echo "Ім'я: ".$ank['firstname']."<br/>";
    	echo "Логін: ".$ank['login']."<br/>";
    	echo "Вік: ".$ank['age']."<br/>";
    	echo "Стать: ".$asex."<br/>";
    	echo "Факультет:<br/>";
    	echo "Група:<br/>";
    	echo "Номер мобільного:<br/>";
    	echo "Кількість спроб у тесті:<br/>";
    	echo "Останнє відвідування:<br/>";
    ?>
    </div>
    </div>
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-3" class="tab-switch">
      <label for="tab-3" class="tab-label">Результати</label>
    <div class="tab-content">
    <?php
    while ($test = mysql_fetch_array($test_q)) {
    	?>
    <div class="resultBox">
    <?php
    echo "ID тесту:".$test['id']."<br/>";
    echo "Спроба:".$test['proba']."<br/>";
    echo "Час:".$test['time']."<br/>";
    echo "Кількість помилок:".$test['errors']."<br/>";
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
