<?php
session_destroy();
setcookie("username", "", time() - 3600, "/");
header("Location: /login.php");
