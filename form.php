<?php
$condition = $_GET['autorize'];

$someRememberedValue = "Укажите логин";

require_once("header.php");
?>


<?php if ($condition) : ?>
  <h1>Вход на сайт</h1>
  <form action="http://test/user.php?formVhode=true" method="POST">
    <p>
      <label for="F_EMAIL">Почта:</label>
      <input required type="email" id="F_EMAIL" name="email" placeholder="<?php echo $someRememberedValue ?>">
    </p>
    <p>
      <label for="F_PASSWORD">Пароль:</label>
      <input required type="password" id="F_PASSWORD" name="password" placeholder="Укажите пароль">
    </p>
    <button type="submit">Вход</button>
  </form>

<?php else : ?>
  <h1>Регистрация на сайте</h1>
  <form action="http://test/user.php?registration=true.php" method="POST">
    <p>
      <label for="F_LOGIN">Логин:</label>
      <input required type="text" id="F_LOGIN" name="login" pattern="[a-zA-Z0-9]+" placeholder="<?php echo $someRememberedValue ?>">
    </p>
    <p>
      <label for="F_EMAIL">Почта:</label>
      <input required type="email" id="F_EMAIL" name="email" placeholder="Укажите e-mail">
    </p>
    <p>
      <label for="F_PASSWORD">Пароль:</label>
      <input required type="password" id="F_PASSWORD" name="password" placeholder="Укажите пароль">
      <label id="error"></div>
    </p>
    <p>
      <label for="F_REPASSWORD">Повторите пароль:</label>
      <input required type="password" id="F_REPASSWORD" name="repassword" placeholder="Повторите пароль">
    </p>
    <button type="submit">Регистрация</button>
    <label id="login_length"></div>
  </form>
<?php endif; ?>

<?php
require_once("footer.php");
?>