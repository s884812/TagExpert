<html>
<head>
    <script data-main="js/apps/login/main" src="js/lib/require.js"></script>
</head>
<body>
    <form method="post" action="index.php?act=login">
        帳號：<input type="text" name="account" id="account" /><br />
        密碼：<input type="password" name="password" id="password" /><br />
        <input type="submit" value="確定送出" />
    </form>
    <p id="messege"> </p>
</body>
</html>
