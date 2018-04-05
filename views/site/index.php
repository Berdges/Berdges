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
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="index_logotip">
	       				 <a href="/">Berdges</a>
	    			</div>
					<form class="enter_site" action="user/login" method="POST">
						<ul>
							<li>
								<input type="text" name="login" placeholder="Логин"><div class="support"></div>
							</li>
							<li>
								<input type="password" name="password" placeholder="Пароль"><div class="support"></div>
							</li>
							<li class="index_choose_option">
								<input type="submit" name = "enter" value="Войти" >
								<div class="js-button-campaign_registr">Регистрация</div>
							</li>
						</ul>
					</form>
				</div>
			</div>
		</div>
	</section>
	<div class="overlay js-overlay-campaign">
			<div class="popup js-popup-campaign">
				<form name="register" class="enter_site" action="user/register" method="POST">
						<ul>
							<li>
								<input  class="clear" id="login" type="text" name="login" placeholder="Логин"><div class="support_reg_input"></div><div></div>
							</li>
							<li>
								<input  class="clear" id="password" type="password" name="password" placeholder="Пароль"><div class="support_reg_input"></div>
							</li>
							<li>
								<input  class="clear" id="password2" type="password" name="password" placeholder="Повторите пароль"><div class="support_reg_input"></div>
							</li>
							<li class="index_choose_option">
								<input id="submit" type="submit" name = "registration" value="Зарегистрироваться" disabled>
							</li>
						</ul>
					</form>
				<div id="block" class="reset close-popup js-close-campaign_registr"></div>
			</div>
		</div>
	<?php include ROOT . '/views/layouts/footer.php'; ?>