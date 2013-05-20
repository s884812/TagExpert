<?php
abstract class View 
{
    protected $tplVar;
    public function setTplVar($tplVar)
    {
        $this->tplVar = $tplVar;
    }

    abstract public function render($tplFile);
    abstract protected function fetch($tplFile);
}
