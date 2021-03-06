<?php
if (!isset($_SESSION['entrance'])) {
   session_start();
}
$vhod = $_GET['formVhode'];
$registration_user = $_GET['registration'];
$db_connect = mysqli_connect('localhost', 'mysql', 'mysql', "login_email_password") or die("mysql");

$login = f_test_input($_POST['login']);
$email = f_test_input($_POST["email"]);
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$emailErr = "";

$email = trim($email);
$password = trim($password);
define('PASSWORD_DEFAULT', "2y");

$hash = password_hash($password, PASSWORD_DEFAULT);
$proverka_hesh = ($password != $repassword);

$sql = "SELECT login, email, password, status FROM login";
$result = $db_connect->query($sql);
$registration = false;

if ($result->num_rows > 0)
   while ($qwe = $result->fetch_assoc())
      if ($email == $qwe["email"]) {
         $row = $qwe;

         if (password_verify($password, $row["password"])) {
            $login = $row["login"];
            $email = $row["email"];
            $password = $row["password"];

            $_SESSION['entrance'] = f_session_entrance($row["email"]);
            $_SESSION['login'] = $row["login"];
            $_SESSION['status'] = f_session_status($row["status"]);

            $registration = true;
         }
      }
?>
<?php if ($vhod) :
   if ($registration == true) {
      header('Location: index.php');
   } else {
      header('Location: error_user.php');
   }

?>
<?php elseif ($registration_user) :
   if ($registration == true) {
      header('Location: error_user.php');
   } else if ($proverka_hesh) {
      header('Location: error_user.php');
   } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header('Location: error_user.php');
   } else
      if (mail($email, "egorcud333@gmail.com", "Регистрация успешна", "Спасибо за регистрацию на сайте! Почта: $email")) {
      $res = mysqli_query($db_connect, 'SELECT id FROM login');
      $id_sum = f_shetId($res);

      $query = "INSERT INTO `login`(id, login, email, password, status) VALUES ('$id_sum', '$login', '$email', '$hash', 'user')";
      if (!mysqli_query($db_connect, $query)) {
         header('Location: error_user.php');
      } else
         header('Location: index.php');
   } else {
      header('Location: error_user.php');
   }
?>

<?php endif; ?>

<?php
function f_test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

function f_session_entrance($email)
{
   if (!isset($_SESSION['entrance'])) {
      return $email;
   }
}
function f_session_status($status)
{
   if (!isset($_SESSION['status'])) {
      return $status;
   }
}

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

function f_array_empty()
{
   return array();
}
?>