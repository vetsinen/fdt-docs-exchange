<?php
session_destroy();
setcookie("username", "", time() - 3600, "/");
setcookie("doc", "", time() - 3600, "/");
setcookie("img", "", time() - 3600, "/");

header("Location: /login.php");
