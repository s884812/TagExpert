<!DOCTYPE html>
<html>
<head>
    <style type="text/css"> @import url(css/bootstrap/bootstrap.css); </style>
    <style type="text/css"> @import url(css/index/index.css); </style>-
</head>
<body>
    <div class="navbar">
      <div class="navbar-inner">
        <a class="brand" href="#">Title</a>
        <ul class="nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">Link</a></li>
          <li><a href="#">Link</a></li>
        </ul>
      </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
             <div class="row-fluid">
                 <div class="span6 offset2" id="topic">
<?php
    foreach( $this->tplVar as $row ) {
        echo '                <div>' . "\n";
        echo '                    <h2>'. $row['title'] . "</h2>\n";
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

