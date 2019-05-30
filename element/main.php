<?php
require 'db.php';
if (isset($_SESSION['logged_user'])) {
  require 'element/posts.php';
  exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title><?php echo $sitetitle; ?></title>
    <?php bootstrap('4'); ?>
    <link href="/links/auth.css" rel="stylesheet">
    <link href="/links/header.css" rel="stylesheet">
    <link href="/links/footer.css" rel="stylesheet">
    <?php jquery(); ?>
  </head>
  <body class="text-center">
    <div class="container-page">
      <header>
        <?php require __dir__.'/header.php'; ?>
      </header>
    </div>
    <main>
      <form class="form-signin" method="POST">
        <img class="mb-4 x65" src="/links/images/logo.gif" alt="" width="72" height="72">
        <label for="inputEmail" class="sr-only">Почта или Имя пользователя</label>
        <input type="text" name="login" id="inputEmail" class="form-control" placeholder="Почта или Имя пользователя" required autofocus>
        <label for="inputPassword" class="sr-only">Пароль</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Пароль" required>
        <div class="checkbox mb-3">
            <input type="checkbox" value="remember-me"><label>Запомнить данные входа</label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="do_login">Авторизация</button>
        <div class="g832">
          <p>Ещё не зарегистрированы?<br><a href="/signup/">Регистрация</a></p>
        </div>
        <?php
if (isset($_SERVER['HTTP_REFERER'])){
  if ($_SERVER['HTTP_REFERER'] == 'http://'.$_SERVER['HTTP_HOST'].'/signup/') {
    echo '<div class="alert alert-success" role="alert">Вы успешно зарегистрировались, попробуйте войти в аккаунт!</div>';
  }
}
$data = $_POST;
if ( isset($data['do_login']) )
{
    $user = R::findOne('users', 'login = ?', array($data['login']));
    if ( $user )
    {
        //логин существует
        if ( password_verify($data['password'], $user->password) )
        {
            //если пароль совпадает, то нужно авторизовать пользователя
            $_SESSION['logged_user'] = $user;
            echo '<div class="alert alert-success" role="alert">Вы авторизованы</div>';
        }else{
            $errors[] = '<div class="alert alert-danger" role="alert">Неверно введен пароль!</div>';
        }
 
    }elseif ($usere = R::findOne('users', 'email = ?', array($data['login']))) {
                //логин существует
        if ( password_verify($data['password'], $usere->password) )
        {
          //$emailcheck = R::findOne('confirmemail', 'email = ?', array($data['login']));
          //if ($emailcheck['status'] == '0') {

           // $errors[] = '<div class="alert alert-danger" role="alert">Подтвердите свой E-Mail! Мы вас выслали ссылку с подтверждением!</div>';
          //}else{
            //если пароль совпадает, то нужно авторизовать пользователя
            $_SESSION['logged_user'] = $usere;
            echo '<div class="alert alert-success" role="alert">Вы авторизованы</div>';
          //}
        }else{
            $errors[] = '<div class="alert alert-danger" role="alert">Неверно введен пароль!</div>';
        }
 
    }else{
        $errors[] = '<div class="alert alert-danger" role="alert">Пользователь  не найден!</div>';
    }
     if ( ! empty($errors) )
    {
        //выводим ошибки авторизации
        echo array_shift($errors);
    }
}
?>
      </form>
    </main>
  <footer>
    <?php require __dir__.'/footer.php'; ?>
  </footer>
</body>
</div>
</body>
</html>
