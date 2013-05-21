require.config({
    paths: {
        "lib" : "../../lib"
    }, 
    shim: {
        'showndown': {
            exports: 'showndown'
        }
   }
});

require([
    'editor',
    'lib/showdown',
    'lib/jquery'
], function() {
    console.log(editor);
    editor.initialize();
});

