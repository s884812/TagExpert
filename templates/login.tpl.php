<!doctype html>
<html>
<head>
    <script data-main="js/apps/login/main" src="js/lib/require.js"></script>
    <style> @import url(css/bootstrap/bootstrap.css) </style>
    <style> @import url(css/login/login.css) </style>
</head>
<body>
    <div class="row-fluid">
        <div class="span4 offset4">
            <form class="well form-horizontal" method="post" action="index.php?act=login">
                <fieldset>
                    <legend> 請先登入 </legend>
                        <div class="control-group">
                            <label class="control-label" for="account"> 帳號：</label>
                            <div class="controls"><input type="text" placeholder="請輸入帳號" name="account" id="account" /></div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="password">密碼：</label>
                            <div class="controls"><input type="password" placeholder="請輸入密碼" name="password" id="password" /></div>
                        </div>
                        <div class="control-group">
                            <div class="controls"><input type="submit" class="btn btn-primary" value="確定送出" /></div>
                        </div>
                </fieldset>
            </form>
        </div>
    </div>
    <p id="messege"> </p>
</body>
</html>
