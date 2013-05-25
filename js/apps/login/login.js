var login = function() {
    this.initialize = function() {
        $('#account').blur(GetEncryptPwd);
        $('#password').on("input", CheckPwd);
    }

    var xhr = new XMLHttpRequest();
    var acct;
    var GetEncryptPwd = function() {
        var url = 'index.php?act=getEncryptPwd&account=' + $('#account').val();
            xhr.open('GET', url, false);
            xhr.send();
            acct = JSON.parse(xhr.responseText);
    }

    var CheckPwd = function() {
        if($.md5($('#password').val()) == acct.password) {
            $('#messege').html('密碼輸入正確');
            $('form').submit();
        } else {
            $('#messege').html('密碼尚未輸入正確');
        }
    }
}

define(['login'], new login()); 
