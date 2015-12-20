jQuery(document).ready(function($) {

    var position = {lat: 50.01554381, lng: 36.22370481};

    map = new google.maps.Map(document.getElementById('contact-map'), {
        center: position,
        zoom: 15
    });

    var infoWindow = new google.maps.InfoWindow({
        content: $('.contact-marker-info').html()
    });

    var marker = new google.maps.Marker({
        position: position,
        title: 'Address',
        map: map,
        infoWindow: infoWindow
    });

    infoWindow.open(map, marker);

} );
