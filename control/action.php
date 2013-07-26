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
        $output->setTplVar($topic->getTopics());
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
        $parent_id = isset($_GET['parent']) ? $_GET['parent'] : 'null';
        $isComment = isset($_GET['isComment']) ? $_GET['isComment'] : false;
        if (isset($_SESSION['user_id'])) {
            if ($topic->addTopic($parent_id, $_SESSION['user_id'], $_POST['title'], $_POST['content'], $tag_array, $isComment))
                $this->redirectTo('index.php');
            else
                $this->redirectTo('index.php?act=edit');
        } else {
            echo 'please login <br />\n';
        }
    }

    protected function view()
    {
         if (isset($_GET['p'])) {
             $posting = array();
             $topic = new Topic();
             $posting = array_merge($posting, $topic->getTopic($_GET['p']));
             $posting = array_merge($posting, $topic->getComment($_GET['p']));
             $output = new OutputHtml();
             $output->setTplVar($posting);
             $output->render('view.tpl.php');
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

    protected function register()
    {
        if(isset($_POST['account']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['sex'])) {
            $acct = new Account();
            $acct->register($_POST['account'], $_POST['email'], $_POST['password'], $_POST['fname'], $_POST['lname'], $_POST['sex']);
        }
    }

    protected function logout()
    {
        $acct = new Account();
        $acct->logout();
        header('Location: index.php');
    }

    protected function getEncryptPwd()
    {
        if (isset($_GET['account'])) {
            $acct = new Account();
            $output = new OutputJson();
            $pwd['password'] = $acct->getEncryptPwd($_GET['account']);
            $output->render($pwd);
            
        } else {
             echo 'not set account' . "<br />\n";
             return null;
        }
    }

	protected function isReuse() 
	{
		 $acct = new Account();
	     $output = new OutputJson();
         if (isset($_POST['account'])) {
             $result['isreuse'] = $acct->isAcctReuse($_POST['account']);
             $output->render($result);
         }
    }  	

    protected function addScore()
    {
        $score = new Score();
        $score->addTargetTagScore($_SESSION['user_id'], 2, $score->getPostingScore(1));
    }
		 
}
?>
