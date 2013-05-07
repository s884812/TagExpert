<?php
class Account {
    private $db;
    public function __construct()
    {
        //session_start();
        $this->db = new Database();
    }

    public function login($account, $password)
    {
        $result = $this->db->query('select * from user_profile where email = "' . 
                                    $account . '" and password = sha2(256, "' . $password . '")' );
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
}
?>
