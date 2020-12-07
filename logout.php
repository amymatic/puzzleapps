<?php
$nav_selected = "LOGOUT";
$left_buttons = "NO";
$left_selected = "";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

?>

<div class="right-content">
    <div class="container">

    <?php

    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
    unset($_SESSION['email']);
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
    unset($_SESSION['role']);
    unset($_SESSION['logged_in']);
    unset($_SESSION['bookSponsor']);
    
    header('location: index.php');
?>

    </div>
</div>

<?php include("footer.php"); ?>
