<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Главная</title>
        <link href="/template/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../../template/web-fonts-with-css/css/fontawesome-all.css">
        <link href="/template/css/main.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="/template/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/template/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/template/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/template/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/template/images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body>
      <header id="header">
          <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="main_logo">
                      <a href="#">Berdges</a>
                    </div>
                </div>
                <div class="col-md-8">
                  <div class = "header_right">
                      <a href="cabinet" id = "bet_result"><?php  if($_SESSION['count_bet_result'] > 0){
                          echo $_SESSION['count_bet_result'];
                      }?></a>
                      <a>score <span id = "my_score_header"><?php echo number_format($_SESSION['score'], 2, '.', ' ');?></span></a>
                    <ul>
                      <li><a href="#"><?php echo $_SESSION['login']?></a></li>
                      <li class="sub_menu_header">
                        <a href="../logout">Выйти</a>
                      </li>
                    </ul>
                  </div>
                </div>
            </div>
          </div>      
      </header>
