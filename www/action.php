<?php
class Action extends Control
{
    private $user_id;
    public function __construct()
    {
        $this->act = isset($_GET['act'])
                     ? strtolower($_GET['act'])
                     : 'index';
    }

    protected function index()
    {
        $topic = new Topic();
        $output = new OutputHtml();
        $output->setTplVar($topic->getTopic());
        $output->render('index.tpl.php');
    }

    protected function edit()
    {
        $output = new OutputHtml();
        if (isset($_SESSION['user_id'])) {
            $output->render('edit.tpl.php');
        } else {
            $this->refreshTo(1, 'index.php?act=login');
            echo 'please log in <br />' . "\n";
        }
    }

    protected function add()
    {
        $topic = new Topic();
        $tag_array = Tag::convertToTagArray($_POST['tag']);
        if (isset($_SESSION['user_id'])) {
            if ($topic->addTopic($_SESSION['user_id'], $_POST['title'], $_POST['content'], $tag_array))
                $this->redirectTo('index.php');
            else
                $this->redirectTo('index.php?act=edit');
        } else {
            echo 'please login <br />\n';
        }
    }
    
    protected function login()
    {
        if (isset($_POST['account']) or isset($_POST['password']))
        {
            $acct = new Account();
            if($acct->login($_POST['account'], $_POST['password']))
                $this->redirectTo('index.php');
        } else {
            $output = new OutputHtml();
            $output->render('login.tpl.php');
        }
    }

    protected function logout()
    {
        $acct = new Account();
        $acct->logout();
        header('Location: index.php');
    }

}
?>
