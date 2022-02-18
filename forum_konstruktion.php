<?php
$konstruktion_id = $_GET['forum'];
$db_connect = mysqli_connect('localhost', 'mysql', 'mysql', "login_email_password") or die("mysql");
$res = mysqli_query($db_connect, 'SELECT topic_id, comment_id, comment_author, comment_messeng, comment_time FROM comments');
$shet = 0;

while ($row = $res->fetch_array()) {
    if ($konstruktion_id == $row[0]) {
        $comments[$row[1]] = new messeng;
        $comments[$row[1]]->$comment_author = $row[2];
        $comments[$row[1]]->$comment_messeng = $row[3];
        $comments[$row[1]]->$comment_time = $row[4];

        $comments_number[$shet] = $row[1];
        $shet++;
    }
}
$_SESSION['comments'] = $comments;
$_SESSION['comments_number'] = $comments_number;
preview($db_connect, $konstruktion_id);
header('Location: forum_topic.php');

class messeng
{
    public $comment_author, $comment_messeng, $comment_time;
}

function f_array_empty()
{
    return array();
}

function preview($db_connect, $konstruktion_id)
{
    $res1 = mysqli_query($db_connect, 'SELECT topic_id, topic_name, topic_preview, topic_author, time FROM forum_topic');

    while ($row = $res1->fetch_array()) {
        if ($konstruktion_id == $row[0]) {
            $_SESSION['konstruktion_id'][0] = $konstruktion_id;
            $_SESSION['topic_name'][0] = $row[1];
            $_SESSION['topic_preview'][0] = $row[2];
            $_SESSION['topic_author'][0] = $row[3];
            $_SESSION['time'][0] = $row[4];
        }
    }
}
