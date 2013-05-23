<!DOCTYPE html>
<html>
<head>
    <style type="text/css"> @import url(css/bootstrap/bootstrap.css); </style>
    <style type="text/css"> @import url(css/index/index.css); </style>-
</head>

<body>
    <div class="row-fluid">
        <div class="span12">
             <div class="row-fluid">
                 <div class="span7 offset2" id="topic">
<?php
    foreach( $this->tplVar as $row ) {
        echo '                <div>' . "\n";
        echo '                    <h2>'. $row['title'] . "</h1>\n";
        echo '                    <hr/>' . "\n";
        echo '                    <div id="box"" >' .  $row['content'] . '</div><br/>' . "\n";
        echo '                </div>' . "\n";
    }
?>
     
                 </div >
            <div class="row-fluid">
                 <div class="span2 offset1" id="control">
                     <table class = "table table-striped table-bordered" >
                         <tr>
                             <td>已訂閱標籤列表</td>
                         </tr>
                         <tr>
                             <td>標籤一</td>
                         </tr>
                         <tr>
                             <td>標籤二</td>
                         </tr>
                         <tr>
                             <td>標籤三</td>
                         </tr>
                     </table>
                     <form >
                         <button type="button" class="btn-large btn-primary" id="posting" onclick="window.location='index.php?act=edit'"> 發文 </button>
                     </form>
                 </div>
            </div>
        </div>
    </div>
</body> 
</html>

