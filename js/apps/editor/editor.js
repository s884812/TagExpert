var editor = {
    initialize: function() {
        $('#content').on('input', this.convertToDemo);
    },

    convertToDemo: function() {
        converter = new Showdown.converter();
        $('#demo').html(converter.makeHtml($('#content').val()));
    }
};

define(['editor'], editor);
