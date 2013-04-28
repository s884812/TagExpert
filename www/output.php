<?php
class Output
{
    private $dir;
    private $tplVar;
    public function  __construct()
    {
        $this->dir = 'templates/';
    }

    public function setTplVar($tplVar)
    {
        $this->tplVar = $tplVar;
    }


    public function render($tplFile)
    {
        echo $this->fetchHtml($tplFile);
    }

    private function fetchHtml($tplFile)
    {
        ob_start();
        require_once($this->dir . $tplFile);
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }

}
?>
