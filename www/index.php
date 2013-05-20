<?php
    session_start();
    function __autoload($class)
    {
        require_once(strtolower($class) . '.php');
    }

    header('Content-type: text/html;charset=utf-8');
    $action = new Action();
    $action->run();
?>

