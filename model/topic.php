<?php
class Topic
{
     private $db;
     public function __construct() 
     {
         $this->db = new Database();
     }
    
     public function getTopics()
     {
         $sql = 'select * from posting_profile order by hit limit 20';
         $result = $this->db->query($sql);
         $topics = $this->db->fetch_array($result);
        
         return $topics;
     }

     public function getTopic($posting_id)
     {
         $sql = "select * from posting_profile where posting_id=$posting_id";
         $topic = array();
         try {
             $result = $this->db->query($sql);
             $topic = $this->db->fetch_array($result);
         } catch (Exception $e) {
             echo $e->getMessage();
         }

         return $topic;
     }

     public function getComment($parent_id)
     {
         $sql = "select * from posting_profile where parent_posting_id=$parent_id";
         try {
             $result = $this->db->query($sql);
             $comment = $this->db->fetch_array($result);
         } catch (Exception $e) {
             echo $e->getMessage();
         }

         return $comment;
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
    
     public function addTopic($parent_id, $user_id, $title, $content, $tag_array, $isComment)
     {
         $sql = "insert into posting_profile (posting_id, parent_posting_id, user_id, title, content, hit, post_date, last_modify_date)
                             value (null, $parent_id, $user_id, '$title', '$content', 1, now(), now())";
         $this->db->query($sql);
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

