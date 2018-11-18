$(window).ready(function() {
    $('#zip1').jpostal({
        postcode : [
            '#zip1',
            '#zip2'
        ],
        address : {
            '#pref'       : '%3',
            '#city'       : '%4',
            '#street'     : '%5',
            '#street_kana': '%10'
        }
    });
});

function deletePost(e) {
    'use strict';
    if (confirm('本当に削除してよろしいですか？')) {
    document.getElementById('form_' + e.dataset.id).submit();
    }
};

$(function() {
    $('.edit').on('click', function() {
        var code = $(this).data('code');
        var name = $(this).data('name');
        $('#code').val(code);
        $('#name').val(name);
    });
});
