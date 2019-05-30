<?php
http_response_code(404);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $sitetitle; ?></title>
</head>
<body>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="page-wrap d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <span class="display-1 d-block">404</span>
                <div class="mb-4 lead">Вероятнее всего ошибка произошла из-а не правильного URL!<br>Проверьте правильность введёного вами URL!</div>
                <a href="/" class="btn btn-link">Вернуться на главную</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>