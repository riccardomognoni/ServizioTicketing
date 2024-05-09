<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["is_logged"]) && $_SESSION["is_logged"] !== true) {
    header("Location: ../login.php");
    exit();
}

if ($_SESSION["role"] !== "admin") {
    header("Location: ../login.php");
    exit();
}

?>