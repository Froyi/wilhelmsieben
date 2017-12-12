$(document).ready(function () {
    $(".rslides").responsiveSlides({
        auto: true,             // Boolean: Animate automatically, true or false
        speed: 500,            // Integer: Speed of the transition, in milliseconds
        timeout: 5000,          // Integer: Time between slide transitions, in milliseconds
        pager: false,           // Boolean: Show pager, true or false
        nav: false,             // Boolean: Show navigation, true or false
        random: false,          // Boolean: Randomize the order of the slides, true or false
        pause: false,           // Boolean: Pause on hover, true or false
        pauseControls: true,    // Boolean: Pause when hovering controls, true or false
        prevText: "Previous",   // String: Text for the "previous" button
        nextText: "Next",       // String: Text for the "next" button
        maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
        navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
        manualControls: "",     // Selector: Declare custom pager navigation
        namespace: "rslides",   // String: Change the default namespace used
        before: function () {
        },   // Function: Before callback
        after: function () {
        }     // Function: After callback
    });
});

//noinspection JSUnusedGlobalSymbols
function initMap() {
    var cafe = {lat: 51.797032, lng: 11.740374};
    var map = new google.maps.Map(document.getElementById('googleMaps'), {
        zoom: 15,
        center: cafe
    });

    //noinspection JSUnusedLocalSymbols
    var marker = new google.maps.Marker({
        position: cafe,
        map: map
    });

    var infoWindow = new google.maps.InfoWindow({
        content: "<div class='maps-info-window'><h3>Café Wilhelm 7ieben</h3><span>Wilhelmstraße 7</span><span>06406 Bernburg</span><span>01525-5366682</span></div>"
    });

    infoWindow.open(map, marker);

    marker.addListener('click', function () {
        infoWindow.open(map, marker);
    });
}

$(function() {
    $(".sceditor").sceditor({
        /*plugins: "xhtml",*/
        style: "templates/cafe/js/editor/minified/jquery.sceditor.default.min.css",
        toolbar: "bold,italic,underline, strike|left,center,right,justify|size,color|email,link,unlink|source",
        emoticonsEnabled: false
    });
});

$(document).on('click', ".js-fancy-box", function () {
    var images = [];

    $('.js-album-image').each(function () {
        console.log($(this).data('albumImage'));
        var image = {
            href: $(this).data('albumImage'),
            title: $(this).data('albumImageTitle')
        };

        images.push(image);
    });

    return false;
});

$(document).on('click', ".js-delete", function (event) {
    var confirm = window.confirm('Wirklich löschen?');

    if (confirm !== true) {
        event.preventDefault();
    }
});