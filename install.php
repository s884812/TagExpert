<?php header('Content-type: text/html; charset=utf-8'); ?>
<html>
<head>
</head>
<body>
    <?php
        function PrintLogin($step)
        {
            echo '<form method="post" action="install.php?step=' . $step . '">' . "\n";
            echo '    <table>';
            echo '        <tr>';
            echo '            <td> user: </td> <td><input type="text" name="user"/></td>' . "\n";
            echo '        </tr>';
            echo '        <tr>';
            echo '            <td>password: </td><td><input type="password" name="password" /></td>' . "\n";
            echo '        </tr>';
            echo '        <tr>';
            echo '            <td>host: </td><td><input type="text" name="host"></td>' . "\n";
            echo '            <td> host 為空則使用預設值 localhost </td>';
            echo '        </tr>';
            echo '        <tr>';
            echo '             <td></td><td><input type="submit"></td>' . "\n";
            echo '        </tr>';
            echo '    </table>';
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
                echo $host;
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
            echo '請輸入 mysql root 帳號密碼' . "<br />\n";
            ReadyToLoginRoot(1);
            break;
        case 1:
            if (LoginRoot())
                header('Refresh:1; url=install.php?step=2');
            break;
        case 2:
            echo '請為 TagExpert 新增一個帳號';
            GetUser(3);
            break;
        case 3:
            CreateDatabase();
        }
    ?>
</body>
</html>
