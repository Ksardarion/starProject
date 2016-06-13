<div class="user_menu">
    <div id="user_menu">
    <?
    echo "<img class='avatar' alt='".$_SESSION['login']."' src='".$user['avatar']."'><a class='us_link' href='/id".$_SESSION['id']."'>".$_SESSION['login']."</a><br/>";
    ?>
    <div>
    <p>
    <a href='/psyhoPROJECT/' class="um_link" target="_blank">Почати експеримент</a>
    </p>
    <p>
      <a href="/exit?conf" class="um_link">Вихід<img src="/sys/icon/exit.svg" class="um_link_i"></a>
    </p>
    </div>
    </div>
</div>