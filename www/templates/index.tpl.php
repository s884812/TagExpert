<?php
    foreach($this->tplVar as $row) {
        echo 'title: ' . $row['title'] . "<br />\n";
        echo 'content: ' . $row['content'];
    }
?>
