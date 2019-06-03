<?php
header('Content-type: text/html; charset=utf8');
global $CFG;
?>
<html>
<head>
    <base href="http://<?= ($_SERVER['HTTP_HOST'] . $CFG['dir_of_site']); ?>/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Blockchain Online</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap3/dashboard.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    -->
    <![endif]-->
    <script src="bootstrap3/js/jquery.min.js"></script>
    <script src="bootstrap3/js/bootstrap.min.js"></script>
    <script src="bootstrap3/js/site.js"></script>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Blockchain Online</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="visible-xs visible-sm <?= (strtolower($data['controller']) == 'news' && strtolower($data['action']) == 'index') ? 'active' : '' ?>"><a href="news"><i class="fas fa-newspaper"></i> Новости</a></li>
            <li class="visible-xs visible-sm <?= (strtolower($data['controller']) == 'chat' && strtolower($data['action']) == 'index') ? 'active' : '' ?>"><a href="chat"><i class="far fa-comments"></i> Сообщения (<?=$data['unread_msg_count'];?>)</a></li>
            <li class="<?= (strtolower($data['controller']) == 'login' && strtolower($data['action']) == 'index') ? 'active' : '' ?>">
                <a href="login/?out"><?= (empty($data['current_user'])) ? 'Войти' : 'Выйти'; ?></a>
            </li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
          </ul>
        </div>
      </div>
    </nav>
    
 <div class="container-fluid">
     <div class="row">
         
         <?if(!empty($data['current_user'])){?>
         <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <!--<li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>!-->
            <!--<li class=""><a><span class="sr-only"></span></a></li>-->
            <li class="<?= (strtolower($data['controller']) == 'main' && strtolower($data['action']) == 'index') ? 'active' : '' ?>"><a href="main/index"><i class="fas fa-briefcase"></i> Валютный портфель</a></li>
			<li class="<?= (strtolower($data['controller']) == 'news' && strtolower($data['action']) == 'index') ? 'active' : '' ?>"><a href="news"><i class="fas fa-newspaper"></i> Новости</a></li>
            <li class="<?= (strtolower($data['controller']) == 'chat' && strtolower($data['action']) == 'index') ? 'active' : '' ?>"><a href="chat"><i class="far fa-comments"></i> Сообщения (<?=intval($data['unread_msg_count']);?>)</a></li>
            
            <li class="<?= (strtolower($data['controller']) == 'main' && strtolower($data['action']) == 'new_page') ? 'active' : '' ?>"><a href="main/new_page"><i class="far fa-comments"></i> Новая страница</a></li>
          </ul>
        </div>
        <?}?>

<div class="<?= (empty($data['current_user'])) ? 'col-sm-12 col-md-12 main' : 'col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'; ?>">
    
        <?php include 'app/views/' . $content_view; ?>
        
			<br><br>
            <div class="footer" >
				<!--
                <div class="col-xs-8">
                    Маштаб страницы:
                    <a href="javascript:" class="glyphicon glyphicon-minus" onclick="updateZoom(-0.05)"></a>
                    <a href="javascript:" class="glyphicon glyphicon-plus" onclick="updateZoom(0.05)"></a>
                </div>
				-->
                <div class="col-xs-12" style="text-align: center;">
                    BC-Online <?php echo date ( 'Y' ) ; ?>
                </div>
        
            </div>
        </div>
    </div>

</div>


</body>
</html>