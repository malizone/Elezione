<?php

use Elezione\classes\DBConnector;
use Elezione\classes\User;

//connection create
$con = DBConnector::getConnection();
if (isset($_GET["verify"])) {
    if (!empty($_GET["verify"])) {
        $user = new User($_GET["verify"]);
        if (($user->is_verified($con)) === 1) {
            echo "Confirm Your Email<br/>Thank you! Your email has been confirmed successfully.";
        } elseif (($user->is_verified($con)) === 2) {
            echo "Your email already verified.";
        }else{
            echo "Invalid verification link.";
        }
    }else{
        echo "Invalid verification link.";
    }

} else {
    header("Location: error");
}
?>
