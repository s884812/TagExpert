<?php
    session_start();
    function __autoload($class)
    {
        require_once(strtolower($class) . '.php');
    }

    $include_path = array();
    $include_path[] = get_include_path();
    $include_path[] = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'core';
    $include_path[] = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'model';
    $include_path[] = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'view';
    $include_path[] = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'control';
    set_include_path(join(PATH_SEPARATOR, $include_path));
    header('Content-type: text/html; charset=utf-8');

    $action = new Action();
    $action->setRouter(new Router());
    $action->run();
?>

