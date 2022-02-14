<?php
$forum = $_GET['formForum'];

if (!isset($_SESSION['entrance'])) {
    session_start();
}

$db_connect = mysqli_connect('localhost', 'mysql', 'mysql', "login_email_password") or die("mysql");

?>
<?php if ($forum) :
    $name = $_POST['name'];
    $preview = $_POST["preview"];
    $author = $_SESSION['login'];
    $date = date('m/d/Y h:i:s a', time());

    $qwe = "SELECT COUNT(1) FROM forum_topic";
    $resultat = $db_connect->query($qwe);
    $id = $resultat->fetch_array(MYSQLI_NUM);
    $id_sum = count($id) + 1;


    $query = "INSERT INTO `forum_topic`(topic_id, topic_name, topic_preview, topic_author, time) VALUES ('$id_sum', '$name', '$preview', '$author', 'now()')";
    if (!mysqli_query($db_connect, $query)) {
        header('Location: error_user.php');
    }
?>
<?php endif; ?>
<?php
$res = mysqli_query($db_connect, 'SELECT topic_id, topic_name, topic_preview, topic_author, time FROM forum_topic');

$string_sql = 0;
$topic_id = array_empty($topic_id);
$topic_name = array_empty($topic_name);
$topic_preview = array_empty($topic_preview);
$topic_author = array_empty($topic_author);
$time = array_empty($time);
$string_forum = 0;

while ($row = $res->fetch_array()) {
    $topic_id[] = $row[0];
    $topic_name[] = $row[1];
    $topic_preview[] = $row[2];
    $topic_author[] = $row[3];
    $time[] = $row[4];
    $string_forum++;
}
if (isset($topic_name)) {
    $_SESSION['topic_name'] = array_empty($_SESSION['topic_name']);

    $_SESSION['topic_id'] = $topic_id;
    $_SESSION['topic_name'] = $topic_name;
    $_SESSION['topic_preview'] = $topic_preview;
    $_SESSION['topic_author'] = $topic_author;
    $_SESSION['time'] = $time;
    $_SESSION['string_forum'] = $string_forum;
}
header('Location: forum.php');

function array_empty($arr)
{
    return array();
}
?>