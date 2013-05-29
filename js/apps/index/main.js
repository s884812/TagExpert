require.config({
    paths: {
        'jquery': '/js/lib/jquery/jquery',
        'bootstrap': '/js/lib/bootstrap/bootstrap'
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
