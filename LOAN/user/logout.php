<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location:login.php?login-error=You are Logged-Out");
?>