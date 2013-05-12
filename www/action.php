<?php
class Action extends Controller
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
        $output = new Output();
        $output->setTplVar($topic->getTopic());
        $output->render('index.tpl.php');
    }

    protected function edit()
    {
        $output = new Output();
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
        
        if (isset($_SESSION['user_id'])) {
            if ($topic->addTopic($_SESSION['user_id'], $_POST['title'], $_POST['content']))
                header('Location: index.php');
            else
                header('Locateion: index.php?act=edit');
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
                header('Refresh: 1; url=/index.php');
        } else {
            $output = new Output();
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
