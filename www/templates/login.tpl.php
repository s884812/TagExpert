<html>
<head>
    <script data-main="scripts/main" src="scripts/lib/require.js"></script>
    <script type="text/javascript">
        var xhr = new XMLHttpRequest();
        var acct;
        var GetEncryptPwd = function() {
            var url = 'index.php?act=getEncryptPwd&account=' + $('#account').val();
            xhr.open('GET', url, false);
            xhr.send();
            acct = JSON.parse(xhr.responseText);
        }

        var CheckPwd = function() {
            if(md5($('#password').val()) == acct.password) {
                $('#messege').html('密碼輸入正確');
                $('form').submit();
            } else {
                $('#messege').html('密碼尚未輸入正確');
            }
        }
    </script>
</head>
<body>
    <form method="post" action="index.php?act=login">
        帳號：<input type="text" name="account" id="account" onblur="GetEncryptPwd()" /><br />
        密碼：<input type="password" name="password" id="password" oninput="CheckPwd()" /><br />
    </form>
    <p id="messege"> </p>
</body>
</html>
