<?php
class Topic
{
    private $db;
    public function __construct() 
    {
        require_once('database.php');
        $this->db = $db;
    }
    
    function getTopic()
    {
        $query_str = 'select * from posting_profile order by hit limit 1';
        $result = $this->db->query($query_str);
        return $this->db->fetch_array($result);
    }

    public function addTopic($user_id, $title, $content)
    {
        $query_str = 'insert into posting_profile (parent_posting_id, user_id, title, content, hit, post_date, last_modify_date)
                                  value (null, ' . $user_id . ', ' . $title . ', ' . $content . ', 1, now(), now())';
        return $this->db->query($query_str);
    }

    public function __destruct()
    {
        unset($db);
    }
}

$topic = new Topic();
$topic->addTopic(1, 'hello', 'fuck');
?>

