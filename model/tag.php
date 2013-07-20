<?php
class Tag {
    private $db;
    public function __construct($db = NULL)
    {
        if (isset($db)) {
            $this->db = $db;
        } else {
            $this->db = new Database();
        }
    }

    public static function convertToTagArray($originStr)
    {
        $tag_array = array();
        $tagname = strtok($originStr, ', ');
        do {
            array_push($tag_array, $tagname);
        } while($tagname = strtok(', '));

        if (count($tag_array) > 0)
            return $tag_array;

        return null;
    }

    public function addTag($tagname)
    {
        $sql = "insert into tag_profile (tag_id, tag_name) value (null, '$tagname')";
        $this->db->query($sql);
        return $this->db->getLastID();
    }

    public function queryTag($tagname)
    {
        $sql = "select tag_id from tag_profile where tag_name='$tagname'";
        $result = $this->db->query($sql);
        $tag_id = $result->fetch();
        return $tag_id;
    }

    public function addPostingTag($posting_id, $tag_id)
    {
        $sql = 'insert into posting_refer_tag(posting_id, tag_id) value (' . sprintf("%d", $posting_id) . ', ' .
                         sprintf("%d", $tag_id) . ')';
        try {
            $this->db->query($sql);
        } catch(Database_Exception $e) {
            trigger_error($e);
        }
    }

}
?>
