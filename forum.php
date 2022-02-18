<?php
require_once("header.php");
require_once("forum_array.php");

?>

<h2>Темы форума</h2>
<?php
if (isset($_SESSION['topic_name']))
    for ($qwe = 0; $qwe < $_SESSION['string_forum']; $qwe++) {
        echo $_SESSION['topic_name'][$qwe];
        echo ' - ';
        echo $_SESSION['topic_author'][$qwe];
        echo ' - ';
        echo $_SESSION['time'][$qwe];
        echo "</br>";
        echo $_SESSION['topic_preview'][$qwe];
        echo "</br>";
?>
    <a href="/forum_konstruktion.php?forum=<?php echo $_SESSION['topic_id'][$qwe] ?>">Открыть</a>

    <?php
        if ($_SESSION['topic_author'][$qwe] == $_SESSION['login']) : ?>
        <a href="/user_delite.php?delite_forum=<?php echo $_SESSION['topic_id'][$qwe] ?>">Удалить</a>
<?php endif;
        echo "</br>";
        echo "</br>";
    }
?>
<hr>
<h2>Создать новый тему форума</h2>
<form action="http://test/forum_server.php?formForum=true" method="POST">
    <p>
        <label for="F_NAME">Название:</label>
        <input required type="text" id="F_NAME" name="name" placeholder="Укажите имя">
    </p>
    <p>
        <label for="F_PREWIEW">Анонс:</label>
        <textarea id="F_PASSWORD" name="preview" rows="5" cols="33" placeholder="Напишите анонс"></textarea>
    </p>
    <button type="submit">Сохранить</button>
</form>

<?php
require_once("footer.php");
?>