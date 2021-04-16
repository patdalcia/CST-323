<?php
session_start();
spl_autoload_register(function($class) {

//Getting difference in folder
$lastdirectories = substr(getcwd(), strlen(__DIR__));

//Counting number of slashes
$numberoflastdirectories = substr_count($lastdirectories, '\\');

//List of possible locations
$directories = ['/business', '/business/model', '/database', '/presentation', '/presentation/handlers', '/presentation/views', '/utility','/api'];

foreach($directories as $d) {
    $currentdirectory = $d;
    for($x = 0; $x < $numberoflastdirectories; $x++) {
        $currentdirectory = "..\\" . $currentdirectory;
    }
    $classfile = $currentdirectory . '\\' . $class . '.php';

    if(is_readable($classfile)){
        if(require $d . '\\' . $class . ".php") {
            break;
        }
    }
}

});