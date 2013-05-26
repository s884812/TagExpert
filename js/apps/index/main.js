require.config({
    paths: {
        'jquery': '/js/lib/jquery',
        'bootstrap': '/js/lib/bootstrap'
    },
    shim: {
        'bootstrap': ['jquery']
    }
});

require([
    'index',
    'jquery',
    'bootstrap'
    ],
    function(index) {
        index.initialize();
    }
);
