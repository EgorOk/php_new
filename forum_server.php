<?php
$forum = $_GET['formForum'];

if (!isset($_SESSION['entrance'])) {
    session_start();
}

$db_connect = mysqli_connect('localhost', 'mysql', 'mysql', "login_email_password") or die("mysql");
$res = mysqli_query($db_connect, 'SELECT topic_name, topic_preview, topic_author, time FROM forum_topic');

?>
<?php if ($forum) :
    $name = $_POST['name'];
    $preview = $_POST["preview"];
    $author = $_SESSION['login'];
    $date = date('m/d/Y h:i:s a', time());

    $query = "INSERT INTO `forum_topic`(topic_name, topic_preview, topic_author, time) VALUES ('$name', '$preview', '$author', 'now()')";
    if (!mysqli_query($db_connect, $query)) {
        header('Location: error_user.php');
    }
?>
<?php endif;
$string_sql = 0;

while ($row = $res->fetch_array()) {
    $topic_name[] = $row[0];
    $topic_preview[] = $row[1];
    $topic_author[] = $row[2];
    $time[] = $row[3];
    $string_forum++;
}
if (isset($topic_name)) {
    $_SESSION['topic_name'] = $topic_name;
    $_SESSION['topic_preview'] = $topic_preview;
    $_SESSION['topic_author'] = $topic_author;
    $_SESSION['time'] = $time;
    $_SESSION['string_forum'] = $string_forum;
}

header('Location: forum.php');
?>