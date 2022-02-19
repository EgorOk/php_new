<?php
require_once("header.php");
require_once("forum_server.php");
require_once("forum_konstruktion.php");
?>
<h2><?php echo $_SESSION['topic_name'] ?></h2>
<p><?php echo $_SESSION['topic_author'] ?> - <?php echo $_SESSION['time'] ?></p>
<p><?php echo $_SESSION['topic_preview'] ?></p>

<?php
for ($qwe = 0; $qwe < count($comments_number); $qwe++) {
    echo $_SESSION['comments'][$comments_number[$qwe]]->$comment_author;
    echo ' - ';
    echo $_SESSION['comments'][$comments_number[$qwe]]->$comment_time;
    echo "</br>";
    echo $_SESSION['comments'][$comments_number[$qwe]]->$comment_messeng;
    echo "</br>";
    echo "</br>";
}
?>

<h2>Оставить комментарий</h2>
<form action="http://test/forum_topic.php?forum_topic=true&forum=&forum=<?php echo $_SESSION['konstruktion_id'] ?>" method="POST">
    <p>
        <label for="F_PREWIEW">Ответить:</label>
        <textarea name="preview" rows="5" cols="33" placeholder="Напишите ответ"></textarea>
    </p>
    <button type="submit">Сохранить</button>
</form>


<?php
require_once("footer.php");
?>