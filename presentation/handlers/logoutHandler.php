<?php

//require_once dirname(dirname(__DIR__, 1)) . '\\Autoloader.php';
session_start();

unset($_SESSION['currentUser']);
header("Location: /index.php");
