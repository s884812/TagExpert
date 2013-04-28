<?php
class Topic
{
    private $db;
    public function __construct() 
    {
        // require_once('database.php');
        $this->db = new Database();
    }
    
    public function getTopic()
    {
        $query_str = 'select * from posting_profile order by hit limit 20';
        $result = $this->db->query($query_str);
        $topic = array();
        while ($row = $this->db->fetch_array($result)) {
            array_push($topic, $row);
        }

        
        return $topic;
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

?>

