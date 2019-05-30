<div class="p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <div class="ml-5 mr-5 d-flex flex-column flex-md-row align-items-center">
          <h5 class="my-0 mr-md-auto font-weight-normal"><?php echo $headername; ?></h5>
  <nav class="ml-3 my-2 my-md-0 mr-md-3">
    <?php
      if (isset($_SESSION['logged_user'])){
        echo '<a class="p-2 text-dark" href="/#userprofilename/">Профиль</a>';
      }else{
        if ($_SERVER['REQUEST_URI'] == "/") {
          echo '<a class="p-2 text-dark" href="/signup/">Регистрация</a>';
        }elseif ($_SERVER['REQUEST_URI'] == "/signin/") {
          echo '<a class="p-2 text-dark" href="/">Главная</a>';
          echo '<a class="p-2 text-dark" href="/signup/">Регистрация</a>';
        }elseif ($_SERVER['REQUEST_URI'] == "/signup/") {
          echo '<a class="p-2 text-dark" href="/">Главная</a>';
          echo '<a class="p-2 text-dark" href="/signin/">Авторизация</a>';
        }
      }
    ?>
    </nav>
  </div>
</div>