<!DOCTYPE html>
<html>
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
		<?php 

      $host = "localhost";
      $dbuser = "root";
      $dbpassword = "";
      $dbname = "fegion";
      $dbarticles = "particles";
      $connection = mysqli_connect("$host", "$dbuser", "$dbpassword", "$dbname");
      mysqli_set_charset($connection,"utf8");

      if($connection == false){
        echo "Error!";
        echo mysqli_connect_errno();
        exit();
      }
      if (isset($_GET['page'])){
        $page = (INT)$_GET['page'];
      } else {
        $page = 1;
      }
      $limit = 5;
      $number = ($page * $limit) - $limit;
      $res_count = mysqli_query($connection, "SELECT COUNT(*) FROM `$dbarticles`");
      $row = mysqli_fetch_row($res_count);
      $total = $row[0];
      $str_pag = ceil($total / $limit);
      $query = mysqli_query($connection, "SELECT * FROM $dbarticles ORDER BY id DESC LIMIT $number, $limit ");
		?>
<main role="main">
    <div class="container">
        <div class="row">
          <div class="card bg-light">
              <div class="card-body">
        <!-- START THE FEATURETTES -->
        <h1>Статьи</h1>
        <?php 
        echo '<div class="row">';
          if(mysqli_num_rows($query) == 0){
            header('Location: http://gg-play.xyz/404');
            header("HTTP/1.0 404 Not Found");
            echo "Страница не найдена!";
            exit;
          } else {
          while($article = mysqli_fetch_assoc($query)){
          	  /*
          	  echo "string";
              echo '<a href="/newspage/'.$article['id'].'">';
              echo '<div class="media text-muted pt-3">';
              echo '<img src="/uploads/userimg/'.$article['icon'].'" height="370" width="420" class="mr-2 rounded">';
              //echo '<p class="media-body pb-3 mb-3 small lh-125 border-bottom border-gray">';
              echo '<h5 style="clear:both;" class="media-body border-bottom border-gray"><strong class="d-block text-gray-dark">'.$article['name'].'</strong></h5>';
              echo '<br>';
              echo '<p  class="media-body border-bottom border-gray">'.$article['descripreview'].'</p>';
              echo '</div>';
              echo '</a>';
              */
        echo '<div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src="/uploads/userimg/'.$article['icon'].'" width="100%" height="225" class="mr-2 rounded">
            <div class="card-body">
              <p class="card-text">'.$article['descripreview'].'</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="/article/'.$article['id'].'"><button type="button" class="btn btn-sm btn-outline-secondary">Читать</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>';
              $code404 = 'false';
              }
          }
            if ($code404 == 'true') {
    $nexttf = '<span aria-hidden="false">&raquo;</span>';
  }else{
    $nexttf = '<span>&raquo;</span>';
  }
        ?>
          </div>
        </div>
      </div>
    </div>
</div> 
<br>
 <nav class="pagination-outer" aria-label="Page navigation">
 <ul class="pagination">
 <li class="page-item">
<?php
$ni = ($page - 1);
if ($ni <= 0) {
  echo '<a class="page-link" aria-label="Следующяя">
 <span aria-hidden="false">&laquo;</span>
 </a>';
}else{
  echo '<a href="/articles/'.$ni.'" class="page-link" aria-label="Следующяя">
 <span aria-hidden="true">&laquo;</span>
 </a>';
}
 ?>
 </li>
<?php
  for ($i = 1; $i <=$str_pag; $i++){
    echo '<li class="page-item"><a class="page-link" href=/articles/'.$i.'>'.$i.'</a></li>';
  }
?>
 <li class="page-item">
 <a href="/articles/<?php $ni = ($page + 1); echo $ni; ?>" class="page-link" aria-label="Далее">
  <?php echo $nexttf; ?>
 </a>
 </li>
 </ul>
 </nav>
</div>
</div>
        </small>
      <!-- FOOTER -->
      <footer class="container">
        <p>&copy;  <?php echo date('o'); ?> Fegion, Inc. &middot; <a href="/info">О нас</a> &middot; <a href="#">Terms</a></p>
      </footer>
	</main>
</div>
</body>
</html>