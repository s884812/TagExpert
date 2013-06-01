require.config({
    paths: {
        "jquery": "/js/lib/jquery/jquery",
        "showdown": "/js/lib/showdown/showdown"
    }, 
    shim: {
        'showdown': ['jquery']
   }
});

require([
    'editor',
    'showdown',
    'jquery'
], function() {
    console.log(editor);
    editor.initialize();
});

