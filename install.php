<?php header('Content-type: text/html; charset=utf-8'); ?>
<!doctype html>
<html>
    <style>@import url(css/bootstrap/bootstrap.css) </style>
    <style type="text/css"> 
        #msg {
            text-align: center;
            vertical-align: middle;
        }
    </style>
<head>
</head>
<body>
<?php
    function PrintLogin($step, $msg)
    {
?>
    <div class="row-fluid">
        <div class="span4 offset4">
            <form class="well form-horizontal" method="post" action="install.php?step='<?php echo $step; ?>">
                <fieldset>
                    <legend><?php echo $msg; ?></legend>
                        <div class="control-group">
                            <label class="control-label" for="user"> 帳號 </label> 
                            <div class="controls"><input type="text" name="user" placeholder="帳號"/></div>
                        </div>
                    <div class="control-group">
                        <label class="control-label" for="password"> 密碼 </label>
                        <div class="controls"><input type="password" name="password" placeholder="密碼"/></div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="host"> 主機 </label>
                        <div class="controls"><input type="text" name="host" placeholder="host 為空則預設為 localhost"></div>
                    </div>
                    <div class="control-group">
                        <div class="controls"><input type="submit" class="btn btn-primary"></div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
<?php
    }
?>

<?php
    function ReadyToLoginRoot($step, $msg) 
    {
        PrintLogin($step, $msg);
    }

    function Login($host, $user, $password)
    {
        return mysql_connect($host, $user, $password);
    }

    function LoginRoot()
    {
        $user = $_POST['user'];
        $password = $_POST['password'];
        $host = strcmp($_POST['host'], "") ? $_POST['host'] : 'localhost';
        $link = Login($host, $user, $password);
        if ($link) {
            setcookie('root_host', $host);
            setcookie('root_user', $user);
            setcookie('root_password', $password);
            echo 'login success' . "<br />\n";
            return true;
        }
        return false;
    }

    function GetUser($step, $msg)
    {
        PrintLogin($step, $msg);
    }

    function CreateDatabase()
    {
        $success = true;
        $link = Login($_COOKIE['root_host'], $_COOKIE['root_user'], $_COOKIE['root_password']);
        if ($link) {
            if (mysql_query('create database TagExpert'))
                echo 'success to create database' . "<br />\n";
            else
                $success = false;
            if (mysql_select_db('TagExpert'))
                echo 'success to use TagExpert';
            else
                $success = false;
            if (mysql_query('
                create table user_profile (
                    user_id int unsigned not null auto_increment primary key,
                    account varchar(50) not null,
                    email varchar(50) not null,
                    password varchar(256) not null,
                    fname varchar(20) ,
                    lname varchar(20) ,
                    sex varchar(20),
                    birth date,
                    user_group varchar(20) not null
                )'))
              echo 'success to create user_profile' . "<br />\n";
            else
                $success = false;

            if (mysql_query('
                    create table tag_profile (
                        tag_id int unsigned auto_increment primary key not null,
                        tag_name varchar(20) not null
                    )'))
                 echo 'success to create tag_profile' . "<br />\n";
            else
                $success = false;

            if (mysql_query('
                    create table user_tag_score (
                        user_id int unsigned not null,
                        tag_id int unsigned not null,
                        foreign key(tag_id) references tag_profile(tag_id),
                        foreign key(user_id) references user_profile(user_id),
                        score int not null
                    )'))
                 echo 'success to create user_tag_score' . "<br />\n";
            else
                $success = false;

            if (mysql_query('
                        create table posting_profile (
                            posting_id int unsigned auto_increment primary key not null,
                            parent_posting_id int unsigned,
                            user_id int unsigned not null,
                            title varchar(80) not null,
                            content mediumtext not null,
                            hit int unsigned not null,
                            post_date datetime not null,
                            last_modify_date datetime,
                            foreign key(user_id) references user_profile(user_id),
                            foreign key(parent_posting_id) references posting_profile(posting_id)
                        )'))
                 echo 'success to create posting_profile' . "<br />\n";
            else
                $success = false;

            if (mysql_query('
                        create table posting_refer_tag (
                            posting_id int unsigned not null,
                            tag_id int unsigned not null,
                            foreign key(posting_id) references posting_profile(posting_id),
                            foreign key(tag_id) references tag_profile(tag_id)
                        )'))
                  echo 'success to create posting_refer_tag' . "<br />\n";
            else
                $success = false;

            if (mysql_query('
                        create table user_description (
                            user_id int unsigned not null,
                            tag_id int unsigned not null,
                            foreign key(user_id) references user_profile(user_id),
                            foreign key(tag_id) references tag_profile(tag_id)
                        )'))
                  echo 'suess to create user_description' . "<br />\n";
            else
                $success = false;

            $user = $_POST['user'];
            $password = $_POST['password'];
            $host = strcmp($_POST['host'], "") ? $_POST['host'] : 'localhost';
            echo 'create user "' . $user . '"@"' . $host . '" identified by "' . $password . '"';
            if (mysql_query('create user "' . $user . '"@"' . $host . '" identified by "' . $password . '"'))
                echo 'succes to create user';
            else
                $success = false;

            if (mysql_query('grant all on TagExpert.* to "' . $user . '"@"' . $host  . '"'))
                echo 'success to grant';
            else
                $success = false;

        } else {
            $success = false;
        }

        return $success;
    }

    $step = isset($_GET['step']) ? $_GET['step'] : 0;
    switch($step) {
    case 0:
        $msg = '請輸入 mysql root 帳號密碼';
        ReadyToLoginRoot(1, $msg);
        break;
    case 1:
        if (LoginRoot())
            header('Refresh:1; url=install.php?step=2');
        else
            header('Refresh:1; url=install.php?step=1');
        break;
    case 2:
        $msg = '請為 TagExpert 新增一個帳號';
        GetUser(3, $msg);
        break;
    case 3:
        if(CreateDatabase())
            header('Refresh:1; url=index.php');
        else
            header('Refresh:1; url=install.php?step=2');
    }
?>
</body>
</html>
