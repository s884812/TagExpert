<?php header('Content-type: text/html; charset=utf-8'); ?>
<html>
    <style>@import url(css/bootstrap/bootstrap.css) </style>
    <style type="text/css"> 
        form {
            text-align: center;
        }

        #user, #password, #host {
            height: 24px;
        }
        h3 {
            text-align: center;
        }
    </style>
<head>
</head>
<body>
    <?php
        function PrintLogin($step)
        {
            echo '<form method="post" action="install.php?step=' . $step . '">' . "\n";
            echo '    <fieldset>';
            echo '            <label> user: </label> <input type="text" name="user" placeholder="帳號"/>' . "\n";
            echo '            <label> password: </label> <input type="password" name="password" placeholder="密碼"/>' . "\n";
            echo '            <label> host: </label> <input type="text" name="host" placeholder="主機">' . "\n";
            echo '            <label> host 為空則使用預設值 localhost </label>';
            echo '            <input type="submit" class="btn btn-primary">' . "\n";
            echo '    </fieldset>';
            echo '</form>';
        }

        function ReadyToLoginRoot($step) 
        {
            PrintLogin($step);
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

        function GetUser($step)
        {
            PrintLogin($step);
        }

        function CreateDatabase()
        {
            $link = Login($_COOKIE['root_host'], $_COOKIE['root_user'], $_COOKIE['root_password']);
            if ($link) {
                if (mysql_query('create database TagExpert'))
                    echo 'success to create database' . "<br />\n";
                if (mysql_select_db('TagExpert'))
                    echo 'success to use TagExpert';
                if (mysql_query('
                        create table user_profile (
                            user_id int unsigned not null auto_increment primary key,
                            fname varchar(20) not null,
                            lname varchar(20) not null,
                            email varchar(50),
                            password varchar(256) not null,
                            user_group varchar(20) not null
                        )'))
                  echo 'success to create user_profile' . "<br />\n";

                if (mysql_query('
                        create table tag_profile (
                            tag_id int unsigned auto_increment primary key not null,
                            tag_name varchar(20) not null
                        )'))
                     echo 'success to create tag_profile' . "<br />\n";

                if (mysql_query('
                        create table user_tag_score (
                            user_id int unsigned not null,
                            tag_id int unsigned not null,
                            foreign key(tag_id) references tag_profile(tag_id),
                            foreign key(user_id) references user_profile(user_id),
                            score int not null
                        )'))
                     echo 'success to create user_tag_score' . "<br />\n";

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

                if (mysql_query('
                            create table posting_refer_tag (
                                posting_id int unsigned not null,
                                tag_id int unsigned not null,
                                foreign key(posting_id) references posting_profile(posting_id),
                                foreign key(tag_id) references tag_profile(tag_id)
                            )'))
                      echo 'success to create posting_refer_tag' . "<br />\n";

                if (mysql_query('
                            create table user_description (
                                user_id int unsigned not null,
                                tag_id int unsigned not null,
                                foreign key(user_id) references user_profile(user_id),
                                foreign key(tag_id) references tag_profile(tag_id)
                            )'))
                      echo 'suess to create user_description' . "<br />\n";

                $user = $_POST['user'];
                $password = $_POST['password'];
                $host = strcmp($_POST['host'], "") ? $_POST['host'] : 'localhost';
                echo 'create user "' . $user . '"@"' . $host . '" identified by "' . $password . '"';
                if (mysql_query('create user "' . $user . '"@"' . $host . '" identified by "' . $password . '"'))
                    echo 'succes to create user';

                if (mysql_query('grant all on TagExpert.* to "' . $user . '"@"' . $host  . '"'))
                    echo 'success to grant';
            }
        }

        $step = isset($_GET['step']) ? $_GET['step'] : 0;
        switch($step) {
        case 0:
            echo '<h3> 請輸入 mysql root 帳號密碼 </h3>' . "<br />\n";
            ReadyToLoginRoot(1);
            break;
        case 1:
            if (LoginRoot())
                header('Refresh:1; url=install.php?step=2');
            break;
        case 2:
            echo '<h3> 請為 TagExpert 新增一個帳號 </h3>';
            GetUser(3);
            break;
        case 3:
            CreateDatabase();
        }
    ?>
</body>
</html>
