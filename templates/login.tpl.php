<!DOCTYPE html>
<html>
<head>
    <script data-main="js/apps/login/main" src="js/lib/require.js"></script>
    <style> @import url(css/bootstrap/bootstrap.css) </style>
    <style> @import url(css/login/login.css) </style>
</head>
<body>
    <form method="post" action="index.php?act=login">
        <fieldset>
            <label> 帳號：</label>
            <input type="text" placeholder="請輸入帳號" name="account" id="account" /><br />
            <label>密碼：</label>
            <input type="password" placeholder="請輸入密碼" name="password" id="password" /><br />
            <input type="submit" class="btn btn-primary" value="確定送出" />
        </fieldset>
    </form>
    <p id="messege"> </p>
</body>
</html>
