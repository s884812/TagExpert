<?php
abstract class Control {
    abstract protected function index();

    public function setRouter($router)
    {
        $act = $router->getAction();
    }

    final public function run() 
    {
        $this->{$this->act}();
    }

    protected function redirectTo($url)
    {
        header('Location: ' . $url);
    }

    protected function refreshTo($time, $url)
    {
        header('Refresh: ' . sprintf("%d", $time) . '; url=' . $url);
    }
}
?>
    
