<?php
    session_start();
    unset($_SESSION["id"]);
    unset($_SESSION["name"]);
    unset($_SESSION["email"]);
    unset($_SESSION["username"]);
    session_destroy();
    header('Location: http://localhost/flippwheels');
?>