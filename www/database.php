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
        $retVal = array();
        while ($row = mysql_fetch_array($result)) {
            array_push($retVal, $row);
        }

        return $retVal;
    }

    public function __destruct()
    {
        mysql_close($this->link);
    }
}

?>
        
