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
