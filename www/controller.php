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

    private function edit()
    {
        $output = new Output();
        $output->render('edit.tpl.php');
    }

    private function add()
    {
        $topic = new Topic();
        if ($topic->addTopic(1, $_POST['title'], $_POST['content'])) {
            echo 'success';
        } else {
            echo 'fail';
        }
    }
}
?>
