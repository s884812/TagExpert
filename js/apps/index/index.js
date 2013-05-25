var index = function() {
    this.initialize = function() {
        $('#btnRegister').bind('click', showRegister);
        $('#btnSubmitReg').bind('click', checkNotNul);
        $('.alignment .btn').click(chooseSex);
    };

    var showRegister = function() {
        $('#register').modal({
            show: true
        });
    };

    var checkNotNul = function() {
        if ($('#account').val() && $('#email').val() && $('#password').val() && $('#sex').val()) {
            var success = false;
            $.ajax({
                type: 'POST',
                url: 'index.php?act=register',
                success: function() {
                     console.log('success');
                }
                 
            });
            $('#register').modal({
                show: false
            });
        } else {
            $('#registerMsg').text('有欄沒有填唷');
        }
    };

    var chooseSex = function() {
        if ($(this).val() == "男生")
            $('#sex').val('male');
        else if ($(this).val() == "女生")
            $('#sex').val('female');
    }
}

define(['index'], new index());
