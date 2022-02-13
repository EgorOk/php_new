<?php
require_once("header.php");
?>


<div id="content">
    <h2>Пользователи сайта</h2>
    <?php
    if (isset($_SESSION['array_users']))
        for ($qwe = 0; $qwe < $_SESSION['string_sql']; $qwe++) {
            echo $qwe + 1;
            echo ' - ';
            echo $_SESSION['array_users'][$qwe];
            echo ' - ';
            echo $_SESSION['array_email'][$qwe];
            echo ' - ';
            echo $_SESSION['array_status'][$qwe];
    ?>
        <?php if ($_SESSION['array_status'][$qwe] != "admin" && $_SESSION['status'] == 'admin') : ?>
            <a href="/user_delite.php?delite_user=<?php echo $_SESSION['array_email'][$qwe] ?>">Удалить пользователя</a>
        <?php endif; ?>
        <br />
    <?php
        }
    ?>
</div>

<?php
require_once("footer.php");
?>