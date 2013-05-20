<?php
class Database
{
    private $link;
    public function __construct()
    {
        require('config.php');
        $this->link = mysql_connect($config['db']['host'], 
                                    $config['db']['user'],
                                    $config['db']['password']);
        mysql_select_db($config['db']['dbName'], $this->link);
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

    public function getLastID()
    {
        if ($result = $this->query('select last_insert_id()')) {
            $id = $this->fetch_array($result);
            $id = array_pop($id);
        } else {
            echo "error";
        }
        return $id;
    }


}
?>
        
