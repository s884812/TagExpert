<?php
class Controller
{
    private $act;
    public function __construct()
    {
        $this->act = isset($_GET['act'])
                     ? strtolower($_GET['act'])
                     : 'index';
    }

    public function run()
    {
        $this->{$this->act}();
    }

    private function index()
    {
        $topic = new Topic();
        $output = new Output();
        $output->setTplVar($topic->getTopic());
        $output->render('index.tpl.php');
    }
}
?>
