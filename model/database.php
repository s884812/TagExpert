<?php
class Database
{
    private $link;
    public function __construct($link = NULL)
    {
        if (isset($link)) {
            $this->link = $link;
        } else {
            require('config.php');
            $dsn = "mysql:host={$config['db']['host']};dbname=TagExpert";
            try {
                $this->link = new PDO($dsn, $config['db']['user'], $config['db']['password']);
            } catch (PDOException $e) { 
                trigger_error($e->getMessage());
            }
        }

        $this->link->exec('set names utf8');
    }

    public function query($query)
    {
        
        $result = $this->link->query($query);
        if (!$result)
            throw new Database_Exception("$query");

        return $result;
    }

    public function fetch_array($result)
    {
        return $result->fetchAll();
    }

    public function getLastID()
    {
        if ($result = $this->query('select last_insert_id()')) {
            $id = $result->fetch()['last_insert_id()'];
        } else {
            throw new Database_Exception("wrong id: $id");
        }
        return $id;
    }


}
?>
        
