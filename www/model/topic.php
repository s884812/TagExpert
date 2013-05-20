<?php
class Topic
{
    private $db;
    public function __construct() 
    {
        $this->db = new Database();
    }
    
    public function getTopic()
    {
        $query_str = 'select * from posting_profile order by hit limit 20';
        $result = $this->db->query($query_str);
        $topic = $this->db->fetch_array($result);
        
        return $topic;
    }

    private function handleTag($posting_id, $tagname)
    {
        $tag = new Tag();
        $tag_id = $tag->queryTag($tagname);
        if (!$tag_id) {
            $tag_id = $tag->addTag($tagname);
        }

        $tag->addPostingTag($posting_id, $tag_id);
    }
    
    public function addTopic($user_id, $title, $content, $tag_array)
    {
        $query_str = 'insert into posting_profile (posting_id, parent_posting_id, user_id, title, content, hit, post_date, last_modify_date)
                                  value (null, null, "' . $user_id . '", "' . $title . '", "' . $content . '", 1, now(), now())';
        $this->db->query($query_str);
        $posting_id = $this->db->getLastID();
        while ($tagname = array_pop($tag_array)) {
            $this->handleTag($posting_id, $tagname);
        }

        return true;
    }

    public function __destruct()
    {
        unset($this->db);
    }
}

?>

