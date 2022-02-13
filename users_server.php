<?php
if (!isset($_SESSION['entrance'])) {
    session_start();
}
$db_connect = mysqli_connect('localhost', 'mysql', 'mysql', "login_email_password") or die("mysql");
$res = mysqli_query($db_connect, 'SELECT login, email, status FROM login');

$string_sql = 0;

while ($row = $res->fetch_array()) {
    $array_users[] = $row[0];
    $array_email[] = $row[1];
    $array_status[] = $row[2];
    $string_sql++;
}
if (isset($array_users)) {
    $_SESSION['array_users'] = $array_users;
    $_SESSION['array_email'] = $array_email;
    $_SESSION['array_status'] = $array_status;
    $_SESSION['string_sql'] = $string_sql;
}
header('Location: users.php');
