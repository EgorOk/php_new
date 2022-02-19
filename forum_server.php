<?php
if (!isset($_SESSION['entrance'])) {
    session_start();
}
$formForum = $_GET['formForum'];
$forum_topic = $_GET['forum_topic'];

$preview = $_POST["preview"];
$author = $_SESSION['login'];

require_once("forum_array.php");

?>
<?php if ($formForum) :
    $name = $_POST['name'];
    // $date = date('m/d/Y h:i:s a', time());

    $res = mysqli_query($db_connect, 'SELECT topic_id FROM forum_topic');
    $id_sum = f_shetId($res);

    $query = "INSERT INTO `forum_topic`(topic_id, topic_name, topic_preview, topic_author, time) VALUES ('$id_sum', '$name', '$preview', '$author', 'now()')";
    if (!mysqli_query($db_connect, $query)) {
        header('Location: error_user.php');
    }
    header('Location: forum.php');
?>
<?php elseif ($forum_topic) :
    // $date = date('m/d/Y h:i:s a', time());
    $id_sum = $_SESSION['konstruktion_id'];
    $res = mysqli_query($db_connect, 'SELECT topic_id FROM comments');
    $comment_id = f_shetId($res);

    $query = "INSERT INTO `comments`(comment_id, topic_id, comment_author, comment_messeng, comment_time) VALUES ('$comment_id', '$id_sum', '$author', '$preview', 'now()')";
    if (!mysqli_query($db_connect, $query)) {
        header('Location: error_user.php');
    }
?>
<?php endif;
?>

<?php
function f_shetId($res)
{
    $shet_id = f_array_empty();
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