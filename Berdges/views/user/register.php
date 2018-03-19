<?php include ROOT . '/views/layouts/header.php'; ?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form class="enter_site" action="user/register" method="POST">
					<ul>
						<li>
							<input type="text" name="login" placeholder="Логин"><div class="support"></div>
						</li>
						<li>
							<input type="password" name="password" placeholder="Пароль"><div class="support"></div>
						</li>
						<li class="index_choose_option">
							<input type="submit" name = "registration" value="Зарегистрироваться">
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
</section>
<?php include ROOT . '/views/layouts/footer.php'; ?>