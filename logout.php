<?php
session_name('user_login');
session_start();
session_destroy();
header("location:index.php");

?>