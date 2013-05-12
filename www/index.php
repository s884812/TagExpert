<?php
    session_start();
    function __autoload($class)
    {
        require_once(strtolower($class) . '.php');
    }

    $action = new Action();
    $action->run();
?>

