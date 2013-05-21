<html>
<head>
    <style type="text/css"> @import url(css/index/index.css); </style>
</head>

<body>
    <table border="1" class = "relative" >
        <tr>
            <td class="backcolor" >已訂閱標籤列表</td>
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

    <?php
        foreach( $this->tplVar as $row ) {
            echo '    <div id="topic">' . "\n";
            echo '        <h1>'. $row['title'] . "</h1>\n";
            echo '        <hr/>' . "\n";
            echo '        <div id="box"" >' .  $row['content'] . '</div><br/>' . "\n";
            echo '    </div>' . "\n";
        }
    ?>

    <form >
        <button type="button" id="posting" class="posting" onclick="window.location='index.php?act=edit'"> 發文 </button>
    </form>
<body> 
</html>

