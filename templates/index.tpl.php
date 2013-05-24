<!DOCTYPE html>
<html>
<head>
    <style type="text/css"> @import url(css/bootstrap/bootstrap.css); </style>
    <style type="text/css"> @import url(css/index/index.css); </style>-
</head>
<body>
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="#">TagExpert</a>
                <ul class="nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                </ul>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6 offset2">
<?php
    foreach( $this->tplVar as $row ) {
        echo '                <table id="topic" class="table table-bordered">' . "\n";
        echo '                    <tr>' . "\n";
        echo '                        <td><h3>'. $row['title'] . "</h3></td>\n";
        echo '                    </tr>' ."\n";
        echo '                    <tr>' ."\n";
        echo '                        <td><div>' .  $row['content'] . '</div></td>' . "\n";
        echo '                    </tr>' . "\n";
        echo '                </table>' . "\n";
    }
?>
     
        </div >
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

    <div class="pagination">
      <ul>
        <li><a href="#">Prev</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">Next</a></li>
      </ul>
    </div>
</body> 
</html>

