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
    $res = mysqli_query($db_connect, 'SELECT topic_id FROM forum_topic');

    $id_sum = shetId($res);

    $query = "INSERT INTO `forum_topic`(topic_id, topic_name, topic_preview, topic_author, time) VALUES ('$id_sum', '$name', '$preview', '$author', 'now()')";
    if (!mysqli_query($db_connect, $query)) {
        header('Location: error_user.php');
    }
?>
<?php endif; ?>
<?php
$res = mysqli_query($db_connect, 'SELECT topic_id, topic_name, topic_preview, topic_author, time FROM forum_topic');

$string_sql = 0;
$topic_id = array_empty();
$topic_name = array_empty();
$topic_preview = array_empty();
$topic_author = array_empty();
$time = array_empty($time);
$string_forum = 0;


while ($row = $res->fetch_array()) {
    $topic_id[$string_forum] = $row[0];
    $topic_name[$string_forum] = $row[1];
    $topic_preview[$string_forum] = $row[2];
    $topic_author[$string_forum] = $row[3];
    $time[$string_forum] = $row[4];
    $string_forum++;
}
if (isset($topic_name)) {
    $_SESSION['topic_name'] = array_empty();

    $_SESSION['topic_id'] = $topic_id;
    $_SESSION['topic_name'] = $topic_name;
    $_SESSION['topic_preview'] = $topic_preview;
    $_SESSION['topic_author'] = $topic_author;
    $_SESSION['time'] = $time;
    $_SESSION['string_forum'] = $string_forum;
}
header('Location: forum.php');

function array_empty()
{
    return array();
}


function shetId($res)
{
    $shet_id = array_empty();
    $string_id = 0;

    while ($resultat = $res->fetch_array()) {
        $shet_id[$string_id] = $resultat[0];
        $string_id++;
    }
    array_multisort($shet_id);
    $shet = 1;

    while ($shet == $shet_id[$shet - 1]) {
        $shet++;
    }
    return $shet;
}
?>