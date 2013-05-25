var index = function() {
    this.initialize = function() {
        $('#btnRegister').bind('click', showRegister);
    };

    var showRegister = function() {
        console.log('hello');
        $('#register').modal({
            show: true
        });
    };
}

define(['index'], new index());
