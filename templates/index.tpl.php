<!doctype html>
<html>
<head>
    <script data-main="js/apps/index/main" src="js/lib/require.js"></script>
    <style type="text/css"> @import url(css/bootstrap/bootstrap.css); </style>
    <style type="text/css"> @import url(css/index/index.css); </style>
</head>
<body>
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="#">TagExpert</a>
                <ul class="nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a id="member">會員專區</a></li>
                    <li><a href="#">Link</a></li>
                </ul>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6 offset2">
<?php
    foreach( $this->tplVar as $row ) {
        echo '           <table id="topic" class="table table-bordered">' . "\n";
        echo '               <tr>' . "\n";
        echo '                   <td><h3>'. $row['title'] . "</h3></td>\n";
        echo '               </tr>' ."\n";
        echo '               <tr>' ."\n";
        echo '                   <td><div>' .  $row['content'] . '</div></td>' . "\n";
        echo '               </tr>' . "\n";
        echo '           </table>' . "\n";
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
                 <input type="button", class="btn-large btn-success" id="btnRegister" value="註冊"/>
             </form>
             <form>
                 <input type="button" class="btn-large btn-primary" id="posting" value="發文"onclick="window.location='index.php?act=edit'" />
             </form>
        </div>
    </div>
    <div id="register" class="modal hide fade" tabindex="-1" role="dialog" area-hiden="true">
        <div class="modal-header">
            <h3> 會員註冊 </h3>
        </div>        
        <div class="modal-body">
            <form method="post" action="index.php?act=register" class="well form-horizontal" id="register-form">
                <div class="control-group">
                    <label class="control-label" for="account"> 帳號 </label>
                    <div class="controls"><input type="text" name="account" id="account" placeholder="Account"/></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="email"> 信箱 </label> 
                    <div class="controls"><input type="email" name="email" id="email" placeholder="E-mail"/></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="email"> 密碼 </label>
                    <div class="controls"><input type="password" name="password" id="password" placeholder="Password" /></div>
                </div>
                <div class="control-group">
                            <label class="control-label" for="fname"> 名字 </label> 
                            <div class="controls"><input type="text" name="fname" id="fname" placeholder="First Name" /></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="lname"> 姓氏 </label> 
                    <div class="controls"><input type="text" name="lname" id="lname" placeholder="Last Name" /></div>
                </div>
                <div>
                    <label class="control-label" for="sex"> 性別 </label> 
                    <div class="controls">
                        <input type="hidden" id = "sex" name="sex" value=""/>
                            <div class="btn-group alignment" data-toggle="buttons-radio" name="sex"> 
                            <input type="button" class="btn btn-primary" value="男生" />
                            <input type="button" class="btn btn-danger" value="女生" />
                            </div>
                    </div>
               </div>
            </form>
            <p id="registerMsg"></p>
        </div>
        <div class="modal-footer">
            <input type="submit" data-loading-text="傳送中.." class="btn-large btn-success" id="btnSubmitReg"  value="確定送出" />
            <input type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true" value="取消" />
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

