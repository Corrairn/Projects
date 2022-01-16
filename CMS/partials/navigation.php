<?php
/**
 * @file
 *  File containing navigation.
 */
?>

<nav class="grid-container">
    <a href="index.php">Начало</a>
    <?php if(!isLoggedIn()) { ?>
    <a href="register.php">Регистрация</a>
    <a href="login.php">Вход</a>
    <?php } else { ?>
    <a href="add.php">Добави албум</a>
    <a href="edit.php">Редактирай албум</a>
    <a href="delete.php">Изтрий албум</a>
	<a href="create-page.php">Добави страница</a>
    <a href="logout.php">Изход</a>
    <?php } ?>
</nav>