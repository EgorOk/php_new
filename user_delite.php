<?php
if (!isset($_SESSION['entrance'])) {
    session_start();
}
$db_connect = new mysqli('localhost', 'mysql', 'mysql', "login_email_password");

$delite_user = ($_GET['delite_user']);
$delite_forum = $_GET['delite_forum'];
?>
<?php if (isset($delite_user))
    if ($_SESSION['status'] == "admin") {
        $sql = "DELETE FROM login WHERE email='$delite_user'";
        if (mysqli_query($db_connect, $sql)) {
            header('Location: users_server.php');
        }
    } else {
        header('Location: error_user.php');
    }
?>
<?php if (isset($delite_forum) && $delite_forum != NULL)
    $sql = "DELETE FROM forum_topic WHERE topic_name='$delite_forum'";
if (mysqli_query($db_connect, $sql)) {
    header('Location: forum_server.php');
} else {
    header('Location: error_user.php');
}
?>