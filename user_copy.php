<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    if ($_SESSION["user_id"] == "00000001") {
        header("Location: user_manager.php");
    }
    else if (mb_substr($_SESSION["user_id"], 0, 1) == "1") {
        header("Location: user_member.php");
    }
    else if (mb_substr($_SESSION["user_id"], 0, 1) == "2") {
        header("Location: user_employee.php");
    }
}

?>