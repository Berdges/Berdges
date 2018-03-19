<?php include ROOT . '/views/layouts/header.php'; ?>
<h1>Приветствуем вас,<?php echo $user['login'];?></h1>
<h2>Это ваш личный кабинет!</h2>
<h3>Ваш id = <?php echo $user['id']?></h3>
<a href="logout">Выйти</a>
<?php include ROOT . '/views/layouts/footer.php'; ?>