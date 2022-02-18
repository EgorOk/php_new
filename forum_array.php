<?php
$db_connect = mysqli_connect('localhost', 'mysql', 'mysql', "login_email_password") or die("mysql");
$res = mysqli_query($db_connect, 'SELECT topic_id, topic_name, topic_preview, topic_author, time FROM forum_topic');

$string_sql = 0;
$topic_id = f_array_empty();
$topic_name = f_array_empty();
$topic_preview = f_array_empty();
$topic_author = f_array_empty();
$time = f_array_empty($time);
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
    $_SESSION['topic_name'] = f_array_empty();

    $_SESSION['topic_id'] = $topic_id;
    $_SESSION['topic_name'] = $topic_name;
    $_SESSION['topic_preview'] = $topic_preview;
    $_SESSION['topic_author'] = $topic_author;
    $_SESSION['time'] = $time;
    $_SESSION['string_forum'] = $string_forum;
}

function f_array_empty()
{
    return array();
}
