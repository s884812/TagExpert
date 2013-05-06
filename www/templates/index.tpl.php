<html>
<head>
    <style type="text/css">
        #topic {
            position: relative;
            width: 35%;
            left:20%;
        }

        #box{ border-style: solid; 
              height:120px; 
              width:450px;
        }

        #box.topic {
            position: relative;
        }


        hr {
            position: relative;
            height: 10px;
            color: gray;
            background-color: gray;
        }

        h1.topic {
            position: relative;
            size: 20;
            color: 000000;
        }

        table.relative {
            position: absolute;
            left: 70%;
            top:  20%;
        }

        table{border-style:solid;  width:200px; font-size: 18px;}

        td.backcolor{
            background-color: gray;
            font-size: 20px;
        }

        font.relative3{
            position: absolute;
            left: 610px;
            top: 260px;
            font-size: 15px:
        }

        button.posting{
            position: absolute;
            left: 70%;
            top: 50%;
            height:50px;
            width:150px;
            font-size: 30px;
        }

    </style>
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

