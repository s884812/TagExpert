<?php
class Router {
    protected $act = 'index';
    public function __construct()
    {
        $this->act = isset($_GET['act']) ? $_GET['act'] : 'index';
    }

    public function getAction()
    {
        return $this->act;
    }
}
