<?php 
    // Allow the config
    define('__CONFIG__', true);
    // require the config file
    require_once "config.php";
    // Set error reporting on
    error_reporting(-1);
    ini_set('display', 'on');

?>

    <!-- HTML function calls -->
    <?=print_header('Home')?>
    <?=print_footer()?>
