<?php
if (!isset($_SESSION['entrance'])) {
    session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        ul.hr {
            margin: 0;
            padding: 4px;
        }

        ul.hr li {
            display: inline;
            margin-right: 5px;
            padding: 3px;
        }

        body {
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            line-height: 150%;
        }
    </style>

</head>

<body>
    <div id="header">
        <h2>Шапка сайта</h2>
        <ul class="hr">
            <li>
                <?php if ($_SERVER['REQUEST_URI'] != "/index.php" && $_SERVER['REQUEST_URI'] != "http://test/") : ?>
                    <a href="/index.php">
                    <?php endif; ?>
                    Главная</a>
            </li>

            <?php if (!isset($_SESSION['entrance'])) : ?>
                <li>
                    <?php if ($_SERVER['REQUEST_URI'] != "/form.php") : ?>
                        <a href="/form.php">
                        <?php endif; ?>
                        Регистрация</a>
                </li>
                <li>
                    <?php if ($_SERVER['REQUEST_URI'] != "/form.php?autorize=true") : ?>
                        <a href="/form.php?autorize=true">
                        <?php endif; ?>
                        Авторизация</a>
                </li>

            <?php else : ?>
                <?php if ($_SERVER['REQUEST_URI'] == "/users.php") : ?>
                    Пользователи
                <?php else : ?>
                    <a href="/users_server.php">Пользователи</a>
                <?php endif; ?>
                <li>
                    <?php if ($_SERVER['REQUEST_URI'] != "/forum.php") : ?>
                        <a href="/forum_server.php">
                        <?php endif; ?>
                        Форум</a>
                </li>
                <li>
                    <a href="/exit.php">Выход</a>
                </li>
            <?php endif ?>
            <li>
                <?php
                if (isset($_SESSION['entrance'])) {
                    echo "ВЫ вошли как: ";
                    echo $_SESSION['login'];
                }
                ?>
            </li>
        </ul>
    </div>