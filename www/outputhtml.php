<?php
class OutputHtml extends View
{
    private $dir;
    public function  __construct()
    {
        $this->dir = 'templates' . DIRECTORY_SEPARATOR;
    }

    public function render($tplFile)
    {
        echo $this->fetch($tplFile);
    }

    protected function fetch($tplFile)
    {
        ob_start();
        require($this->dir . $tplFile);
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }
}
?>
