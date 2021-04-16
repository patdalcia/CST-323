<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once dirname(dirname(__DIR__, 2)) . '\\Autoloader.php';

$foo = unserialize($_POST['postsObject']);

echo '<pre>';
var_dump($foo);
echo '</pre>';

/*
$now = new DateTime("today");
$date = $now->format('Y-m-d');

$post = new Post("Test Title", "Test Body", $date);

$service = new PostBusinessService();
$service->getAllPosts();