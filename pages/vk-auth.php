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
include_once("../sys/template/left_menu.php");
?>
<div class="wrapper">
<div class="tabs">
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-1" checked class="tab-switch">
      <label for="tab-1" class="tab-label">Реєстрація через ВК</label>
        <div class="tab-content">
        <?php
        if (!empty($user['id'])) { ?>
          <h2>Ви вже зареєстровані!</h2>
          <a href="/">На головну</a>
        <?php } else { 

    $client_id = '4646126'; // ID приложения
    $client_secret = 'w6hr1Yq4m0kLBE6Y4MQL'; // Защищённый ключ
    $redirect_uri = 'http://ademo.96.lt/vk-auth'; // Адрес сайта

    $url = 'http://oauth.vk.com/authorize';

    $params = array(
        'client_id'     => $client_id,
        'redirect_uri'  => $redirect_uri,
        'response_type' => 'code'
    );

    echo $link = '<a href="' . $url . '?' . urldecode(http_build_query($params)) . '" class="tab-label">Аутентификация через ВКонтакте</a>';

if (isset($_GET['code'])) {
    $result = false;
    $params = array(
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'code' => $_GET['code'],
        'redirect_uri' => $redirect_uri
    );

    $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

    if (isset($token['access_token'])) {
        $params = array(
            'uids'         => $token['user_id'],
            'fields'       => 'uid,first_name,last_name,screen_name,sex,bdate,photo_big',
            'access_token' => $token['access_token']
        );

        $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
        if (isset($userInfo['response'][0]['uid'])) {
            $userInfo = $userInfo['response'][0];
            $result = true;
        }
    }

    if ($result) {
        echo "Социальный ID пользователя: " . $userInfo['uid'] . '<br />';
        echo "Имя пользователя: " . $userInfo['first_name'] . '<br />';
        echo "Ссылка на профиль пользователя: " . $userInfo['screen_name'] . '<br />';
        echo "Пол пользователя: " . $userInfo['sex'] . '<br />';
        echo "День Рождения: " . $userInfo['bdate'] . '<br />';
        echo '<img src="' . $userInfo['photo_big'] . '" />'; echo "<br />";
    }
}
}
?>
</div>
</div>
</div>
</div>
</body>
</html>