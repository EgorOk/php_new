<?php
$konstruktion_id = $_GET['forum'];
$db_connect = mysqli_connect('localhost', 'mysql', 'mysql', "login_email_password") or die("mysql");
$res = mysqli_query($db_connect, 'SELECT comment_id, topic_id, comment_author, comment_messeng, comment_time FROM comments');
$shet = 0;

while ($row = $res->fetch_array()) {
    if ($konstruktion_id == $row[1]) {
        $comments[$row[0]] = new messeng;
        $comments[$row[0]]->$comment_author = $row[2];
        $comments[$row[0]]->$comment_messeng = $row[3];
        $comments[$row[0]]->$comment_time = $row[4];

        $comments_number[$shet] = $row[0];
        $shet++;
    }
}
$_SESSION['comments'] = $comments;
$_SESSION['comments_number'] = $comments_number;

$_SESSION['konstruktion_id'] = $konstruktion_id;

$_SESSION['topic_name'] = preview($db_connect, $konstruktion_id, 1);
$_SESSION['topic_preview'] = preview($db_connect, $konstruktion_id, 2);
$_SESSION['topic_author'] = preview($db_connect, $konstruktion_id, 3);
$_SESSION['time'] = preview($db_connect, $konstruktion_id, 4);

class messeng
{
    public $comment_author;
    public $comment_messeng, $comment_time;
}

function preview($db_connect, $konstruktion_id, $shet)
{
    $res1 = mysqli_query($db_connect, 'SELECT topic_id, topic_name, topic_preview, topic_author, time FROM forum_topic');

    while ($row = $res1->fetch_array()) {
        if ($konstruktion_id == $row[0]) {
            return $row[$shet];
        }
    }
}
