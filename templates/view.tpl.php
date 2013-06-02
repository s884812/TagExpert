<?php
    foreach ( $this->tplVar as $row ) {
        echo '           <table id="topic" class="table table-bordered">' . "\n";
        echo '               <tr>' . "\n";
        echo '                   <td><h3>'. $row['title'] . "</h3></td>\n";
        echo '               </tr>' ."\n";
        echo '               <tr>' ."\n";
        echo '                   <td><div>' .  $row['content'] . '</div></td>' . "\n";
        echo '               </tr>' . "\n";
        echo '               <tr>' ."\n";
        echo '                   <td>' . "<a href='index.php?act=edit&p={$row['posting_id']}'> 回覆本文  </a></td>" . "\n";
        echo '               </tr>' . "\n";
        echo '           </table>' . "\n";
    }
?>
