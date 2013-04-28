<?php
class Controller
{
    private act;
    public function __construct()
    {
        $this->act = isset($_GET['act']) ? 
                     strtolower($_GET['act'] :
                     'index';
    }

    public function run()
    {
    }
}
?>
