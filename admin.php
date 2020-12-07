<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "RELEASES";
require_once __DIR__ . '/bootstrap.php';
require ROOT_DIR . '/db_configuration.php';
include(ROOT_DIR . '/nav.php');
?>

<?php



    if(isset($_SESSION['logged_in'])){
     
        $role = $_SESSION['role'];
        if($role == "ADMIN" || $role == "SUPER_ADMIN"){
       
            ?>
            <div class="right-content">
    <div class="container">

        <h3>Hello (admin)!</h3>
        <h4>Welcome to Indic Puzzles administration panel!</h4>

    </div>
</div>
<?php    }else{
          
            header('location: login.php');
        }
        
    }else{
        header('location: login.php');
    }


?>

<?php include("footer.php"); ?>

