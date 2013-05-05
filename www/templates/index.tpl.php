<html>
<div>
    <a href="/index.php?act=edit"> edit </a>
</div>
<?php
    foreach($this->tplVar as $row) {
        echo 'title: ' . $row['title'] . "<br />\n";
        echo 'content: ' . $row['content'] . "<br />\n";
    }
?>
</html>
