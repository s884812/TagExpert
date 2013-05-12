<?php
abstract class Controller {
    protected $act;
    abstract protected function index();

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
    
