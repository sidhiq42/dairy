<?php
session_unset();
session_destroy();
setcookie("logined",null);
Header("location:index.php");
?>