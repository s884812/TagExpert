<?php
class Database
{
    private $link;
    public function __construct()
    {
        require_once('config.php');
        $this->link = mysql_connect($config['db']['host'], 
                              $config['db']['user'],
                              $config['db']['password']);
        mysql_select_db('TagExpert', $this->link);
    }

    public function query($query)
    {
        return mysql_query($query);
    }

    public function fetch_array($result)
    {
        return mysql_fetch_array($result);
    }

    public function __destruct()
    {
        mysql_close($this->link);
    }
}

$db = new Database();
?>
        
