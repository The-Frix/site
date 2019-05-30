<?php
require 'db.php';
if (isset($_SESSION['logged_user'])) {
  header("Location: /feed/");
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
        <div class="b806"><h5>Регистрация</h5></div>
        <label for="inputEmail" class="sr-only">Почта</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Почта" required autofocus>
        <label for="inputName" class="sr-only">Имя и фамилия</label>
        <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Имя и фамилия" required autofocus>
        <label for="inputLogin" class="sr-only">Имя пользователя</label>
        <input type="text" name="login" id="inputEmail" class="form-control" placeholder="Имя пользователя" required autofocus>
        <label for="inputPassword" class="sr-only">Пароль</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Пароль" required>
        <label for="inputPassword" class="sr-only">Повторите пароль</label>
        <input type="password" name="password_2" id="inputPassword" class="form-control" placeholder="Повторите пароль" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="do_signup">Регистрация</button>
        <div class="g832">
          <p>Уже зарегистрированы?<br><a href="/signin/">Авторизация</a></p>
        </div>
      </form>
    </main>
  <footer>
    <?php require __dir__.'/footer.php'; ?>
  </footer>
</body>
</div>
</body>
</html>
<?php 
$data = $_POST;
 
//если кликнули на button
if ( isset($data['do_signup']) )
{
// проверка формы на пустоту полей
    $errors = array();
    if ( trim($data['login']) == '' )
    {
        $errors[] = 'Введите имя пользователя!';
    }

    if ( trim($data['username']) == '') {
      $errors[] = 'Введите ваше настоящее имя!';
    }
 
    if ( trim($data['email']) == '' )
    {
        $errors[] = 'Введите Email!';
    }
 
    if ( $data['password'] == '' )
    {
        $errors[] = 'Введите пароль!';
    }

    if ( $data['password_2'] == '' )
    {
        $errors[] = 'Повторите пароль!';
    }
 
    if ( $data['password_2'] != $data['password'] )
    {
        $errors[] = 'Повторный пароль введен не верно!';
    }
 
    //проверка на существование одинакового логина
    if ( R::count('users', "login = ?", array($data['login'])) > 0)
    {
        $errors[] = 'Пользователь с таким логином уже существует!';
    }
 
//проверка на существование одинакового email
    if ( R::count('users', "email = ?", array($data['email'])) > 0)
    {
        $errors[] = 'Пользователь с таким Email уже существует!';
    }
 
    /*if ($response != null && $response->success) {
        
    }else{
      $errors[] = 'Подтвердите что вы не робот!';
    }*/

    if ( empty($errors) )
    {
        //ошибок нет, теперь регистрируем
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->namesurname = $data['username'];
        $user->ip = $_SERVER['REMOTE_ADDR'];
        $user->avatar = 'data/users/images/defaultuser.png';
        $user->pdadmin = '0';
        $user->reputation = '0';
        $user->activation = '0';
        $user->status = '1';
        $user->datesignup = date("Y-m-d H:i:s");
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT); 
        //пароль нельзя хранить в открытом виде, 
        //мы его шифруем при помощи функции password_hash для php > 5.6
         
        R::store($user);

        $token=md5($email.time());

        $emailconf = R::dispense('confirmemail');
        $emailconf->email = $data['email'];
        $emailconf->token = $token;
        $emailconf->status = '0';
         
        R::store($emailconf);

        echo '<div class="alert alert-success" role="alert">Вы успешно зарегистрировались!</div>';
        header('Location: /');
    }else
    {
        echo '<div class="alert alert-danger" role="alert">' .array_shift($errors). '</div>';
    }
 
}
?>