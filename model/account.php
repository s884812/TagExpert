<?php
class Account {
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function login($account, $password)
    {
        $result = $this->db->query('select * from user_profile where email = "' . 
                                    $account . '" or account = "' . $account . '" and password = md5("' . $password . '")' );
        $result = $this->db->fetch_array($result);
        if ($result) {
            $user = array_pop($result);
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['fname'] = $user['fname'];
            $_SESSION['lname'] = $user['lname'];
            $_SESSION['user_group'] = $user['user_group'];
            echo '歡迎' . $_SESSION['fname'] . $_SESSION['lname'];
            return true;
        } else {
            echo "fail to login <br />\n";
            return false;
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
    }

    public function getEncryptPwd($account)
    {
        $pwd = $this->db->query('select password from user_profile where email ="' . $account . '"');
        $pwd = array_pop($this->db->fetch_array($pwd));
        $pwd = $pwd['password'];
        return $pwd;
    }

    public function isAcctReuse($account)
    {
        $result = $this->db->query('select user_id from user_profile where account= ' . $account . '" or email="' . $account . '"');
        $this->db->fetch_array($result);
        if (count($result))
            return true;
        return false;
    }

    public function register($account, $email, $password, $fname, $lname, $sex)
    {
        $this->db->query('insert into user_profile(user_id, account, email, password, fname, lname, sex, birth, user_group) value (null, "' .
                         $account . '", "' . $email  . '", md5("' .  $password . '"), "' . $fname . '", "' . $lname . '", "' . $sex . 
                         '", null, "normal")');
                            
    }
}
?>
