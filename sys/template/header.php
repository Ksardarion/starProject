<?php
session_start();
include ("./pages/bd.php");
if (!empty($_SESSION['login']) and !empty($_SESSION['id'])){
  $id = $_SESSION['id'];
  $result = mysql_query("SELECT * FROM users WHERE id='$id'",$db); 
  $user = mysql_fetch_array($result);
}
?>