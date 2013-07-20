<?php
    require_once('Michelf/Markdown.php');
    use \Michelf\Markdown;
    foreach ( $this->tplVar as $row ) {
?>
<table id="topic" class="table table-bordered">
    <tr>
        <td><h3><?php echo $row['title']; ?></h3></td>
    </tr>
    <tr>
        <td><div>
            <?php 
                echo Markdown::defaultTransform($row['content']);
            ?>
        </div></td>
    </tr>
    <tr>
    <td><a href='index.php?act=edit&p=<?php echo $row['posting_id']; ?>> 回覆本文 </a></td>
    </tr>
</table>
<?php
    }
?>
