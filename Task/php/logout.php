<?php
session_start();
unset($_SESSION["details"]);
session_destroy();
header("Location:../index.html");
?>