<div class="controlBox">
<?php
if (empty($_SESSION['login']) or empty($_SESSION['id'])) {
?>
<form action="login.php" method="post">
  <p>
    <label><br></label>
    <input placeholder="Логін" name="login" type="text" size="15" maxlength="15">
  </p>
  <p>
    <label><br></label>
    <input placeholder="Пароль" name="password" type="password" size="15" maxlength="15">
  </p>
<p>
<input type="submit" name="submit" value="Вхід" id="apply">
<br>
</p>
</form>
<form action="./reg.php">
<input type="submit" name="submit" value="Реєстрація" id="apply">
</form>
<br>
<?php
} else { ?>
    <div id="friendlist">
    <div>
    <p>
    <a href='/' class="friend">На головну<img src="/sys/icon/home.svg" class="friend_i"></a>
    </p>
    </div>
    <div>
    <p>
    <a href='/ank.edit' class="friend">Редагувати анкету<img src="/sys/icon/edit.svg" class="friend_i"></a>
    </p>
    </div>
    <div>
    <p>
    <a href='/faq' class="friend">Інструкції<img src="/sys/icon/help.svg" class="friend_i"></a>
    </p>
    </div>
    <div>
    <p>
    <a href='/settings' class="friend">Налаштування<img src="/sys/icon/config.svg" class="friend_i"></a>
    </p>
    </div>
    <div>
    <p>
    <a href='/users' class="friend">Користувачі<img src="/sys/icon/users.svg" class="friend_i"></a>
    </p>
    </div>
    </div>
   <? } ?>
</div>