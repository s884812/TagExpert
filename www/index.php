<?php
    function __autoload($class)
    {
        require_once(strtolower($class) . '.php');
    }

    $ctrler = new Controller();
    $ctrler->run();
?>

