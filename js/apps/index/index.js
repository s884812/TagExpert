var index = function() {
    var accountReuse = true;
    var emailReuse = true;
    this.initialize = function() {
        $('#btnRegister').bind('click', showRegister);
        $('#btnSubmitReg').bind('click', checkNotNul);
        $('#account').bind('blur', isAcctReuse);
        $('#email').bind('blur', isEMailReuse);
        $('.alignment .btn').click(chooseSex);
    };

    var showRegister = function() {
        $('#register').modal({
            show: true
        });
    };

    var checkNotNul = function() {
        if ($('#account').val() && $('#email').val() && $('#password').val() && $('#sex').val() && !accountReuse && emailReuse) {
            var success = false;
            $.ajax({
                type: 'POST',
                url: 'index.php?act=register',
                data: {
                    account: $('#account').val(),
                    email: $('#email').val(),
                    password: $('#password').val(),
                    fname: $('#fname').val(),
                    lname: $('#lname').val(),
                    sex: $('#sex').val()
                },
                success: function() {
                    $('#register').modal({
                        show: false
                    });
                }
                 
            });

        } else {
            $('#registerMsg').text('有欄位沒有填唷');
        }
    };

    var isAcctReuse = function() {
        if ($('#account').val() != '') {
            $.ajax({
                type: 'POST',
                url: 'index.php?act=isReuse',
                data: {
                    account: $('#account').val()
                },
                success: function(response) {
                    var result = JSON.parse(response);
                    this.accountReuse = result.isreuse;
                    if (this.accountReuse)
                        $('#registerMsg').text('帳號名稱已經有人使用');
                },
            });
        }
    }

    var isEMailReuse = function() {
        if ($('#email').val() != '') {
            $.ajax({
                type: 'POST',
                url: 'index.php?act=isReuse',
                data: {
                    account: $('#email').val()
                },
                success: function(response) {
                    var result = JSON.parse(response);
                    this.emailReuse = result.isreuse;
                    if (this.emailReuse)
                        $('#registerMsg').text('信箱已經有人使用');
                },
            });
        }
    }

    var chooseSex = function() {
        if ($(this).val() == "男生")
            $('#sex').val('male');
        else if ($(this).val() == "女生")
            $('#sex').val('female');
    }
}

define(['index'], new index());
