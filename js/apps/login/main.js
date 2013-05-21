/*
 * 先設定路徑 lib 代表讓 require 知道各個的路徑位置
 * 那原有支援 requirejs 的第三方函式庫只有 jQuery
 * 但我用到的 jQuery-MD5 這個第三方的函式庫並不支援
 * 因此需要用到 shim 去做一些動作
 */
require.config({
    paths: {
        'jquery': '/js/lib/jquery',
        'jquery.md5': '/js/lib/jquery.md5'
    },
    shim: {
        'jquery.md5': {
            deps: ['jquery'], // 依賴哪個 lib
            exports: 'md5'    // 取名
        }
    }
});

/* 
 * require(dep, callback)
 * 在這邊 dep 是用陣列代表各個需要依賴的 lib
 * 之後 requirejs 會載入這些 lib 並且用變數代表這些模組回傳的物件
 * 如果在模組裡面有使用 defined(id, object) 那就會用全域變數代表該 object
 * 如果沒有宣告 id 只有 define(object) 他會傳到 callback 函數的參數裡
 * 如果連 define 都沒有的話會出錯
 * 所以要像上面那樣利用 shim 說明是不支援 requirejs 的物件
 */
require(
    [
     'login',
     'jquery',
     'jquery.md5'
    ],
    function(login, $, md5) { // 如果在 login.js 裡頭沒有 define(id, object) 只有 define(object) 的話，需要傳進來
        console.log(login);   // ['login', 'jquery', 'jquery.md5'] 會一一對應參數 login, $, md5
        console.log(md5);     // 這裡的 login 其實也可以不用當參數傳進來，如果有 define(id, object) 的話, requirejs 載入完會用全域變數
        login.initialize();   // 宣告 login, $ 當中 md5 因為沒有使用 define 所以不支援 requirejs，需要靠上面的 shim 解決問題
    }
);
