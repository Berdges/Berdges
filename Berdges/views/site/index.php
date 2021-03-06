<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
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
							<div class="js-button-campaign">Регистрация</div>
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
							<input  class="clear reg_input" id="login" type="text" name="login" placeholder="Логин"><div class="support_reg_input"></div><div></div>
						</li>
						<li>
							<input  class="clear reg_input" id="password" type="password" name="password" placeholder="Пароль"><div class="support_reg_input"></div>
						</li>
						<li>
							<input  class="clear reg_input" id="password2" type="password" name="password" placeholder="Повторите пароль"><div class="support_reg_input"></div>
						</li>
						<li class="index_choose_option">
							<input id="submit" type="submit" name = "registration" value="Зарегистрироваться" disabled>
						</li>
					</ul>
				</form>
			<div id="block" class="reset close-popup js-close-campaign"></div>
		</div>
	</div>
<?php include ROOT . '/views/layouts/footer.php'; ?>