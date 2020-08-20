<?php

session_start();

unset($_SESSION['members']);  // 清除某個 session 變數

// session_destroy(); // 清除所有的 session

header('Location: login.php');

