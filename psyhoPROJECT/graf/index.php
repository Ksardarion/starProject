<?php
session_start();
include_once ("../../pages/bd.php");
include_once ("../../sys/inc/start.php");
if (empty($_SESSION['login']) or empty($_SESSION['id'])) {
    header('Location: /');
    exit('Ви не авторизовані');
}
?>
<html>
<head>
	<title>Графік результатів</title>
	<script type="text/javascript" src="Chart.js"></script>
	<script type="text/javascript" src="testChart.js"></script>
	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="../../sys/css/normalize.css">
	<link rel="stylesheet" href="../../sys/css/style.css">
	<meta charset="utf-8">
</head>
<body>
<?php
if (!empty($user['id']))
include("../../sys/template/user_menu.php");
?>
<?php
include("../../sys/template/left_menu.php");
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
      <label for="tab-1" class="tab-label">Помилки</label>
    <div class="tab-content">
	<canvas id="myErrors" width="750" height="400"></canvas>
	</div>
    </div>
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
      <label for="tab-2" class="tab-label">Час</label>
    <div class="tab-content">
	<canvas id="myTime" width="750" height="400"></canvas>
	</div>
    </div>
</div>
</div>
</body>
</html>