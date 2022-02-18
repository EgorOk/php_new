<?php
$db_connect = mysqli_connect('localhost', 'mysql', 'mysql', "login_email_password") or die("mysql");
$konstruktion_id = $_GET['forum'];
