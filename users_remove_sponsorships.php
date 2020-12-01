<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "USERS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

if (isset($_POST['user-id'])) {
    $userId = $_POST['user-id'];
}
$removeSponsorshipsSuccess = false;
if (isset($_POST['remove-sponsorships-submit'])) {
    if (isset($_POST['removeSponsorshipsId'])) {
        $removeSponsorshipsSuccess = true;
        $countSponsorships = count($_POST['removeSponsorshipsId']);
        for ($i = 0; $i < $countSponsorships; $i++) {
            $bookId = $_POST['removeSponsorshipsId'][$i];
            $sql = "DELETE FROM users_books WHERE user_id = '$userId' AND book_id = '$bookId'";
            $result = mysqli_query($db, $sql);

            if(!$result) {
                $removeSponsorshipsSuccess = false;
            }
        }
    }
    if (!$removeSponsorshipsSuccess) {
        echo '<script type="text/javascript">
                alert("Error removing one or more sponsorships.");
                window.location = "users_modify.php?id='.$userId.'"
                </script>';
    } else {
        echo '<script type="text/javascript">
                alert("Sponsorships removed.");
                window.location = "users_modify.php?id='.$userId.'"
                </script>';
    }
}
