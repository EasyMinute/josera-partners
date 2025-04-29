var infoWindows = [];
var allMarkers = [];
var readyMap;


(function( $ ) {

/**
 * initMap
 *
 * Renders a Google Map onto the selected jQuery element
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @return  object The map instance.
 */
function initMap( $el, $state ) {

    
    // Find marker elements within map.
    var $markers = $el.find('.marker');
    


    // Create gerenic map.
    var mapArgs = {
        zoom        : $el.data('zoom') || 16,
        mapTypeId   : google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map( $el[0], mapArgs );

    // Add markers.
    map.markers = [];
    $markers.each(function(){
        initMarker( $(this), map );
    });

    // Center map based on markers.
    centerMap( map );


   // Add a marker clusterer to manage the markers.
    var clusterStyles = [
      {
        textColor: 'black',
        url: '/wp-content/uploads/2021/04/m1.png',
        height: 50,
        width: 55,

      },
     {
        textColor: 'black',
        url: '/wp-content/uploads/2021/04/m2.png',
        height: 50,
        width: 55,

      },
     {
        textColor: 'black',
        url: '/wp-content/uploads/2021/04/m3.png',
        height: 50,
        width: 55,

      }
    ];
    var mcOptions = {
        gridSize: 50,
        styles: clusterStyles,
        maxZoom: 15
    };
    var markerCluster = new MarkerClusterer(map, map.markers, mcOptions);





    readyMap = map;


    // Return map instance.
    return map;
}


// Close all markers' inowimdows on map
function closeAllInfoWindows() {
  for (var i=0;i<infoWindows.length;i++) {
     infoWindows[i].close();
  }
}

$('.locations__item').click(function(){

    $('.locations__item').removeClass('active');
    $(this).addClass('active');

    // Map vars
    var count = $(this).data('count');
    var lat = $(this).data('lat');
    var lng = $(this).data('lng');

    // Click on marker 
    new google.maps.event.trigger( allMarkers[count], 'click' );
       
    // Center map to marker
    var latLng = new google.maps.LatLng(lat, lng);
    readyMap.panTo(latLng);
    readyMap.setZoom(17);
});



/**
 * initMarker
 *
 * Creates a marker for the given jQuery element and map.
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @param   object The map instance.
 * @return  object The marker instance.
 */
function initMarker( $marker, map ) {

    // Get position from marker.
    var lat = $marker.data('lat');
    var lng = $marker.data('lng');
    var state = $marker.data('state');
    var city = $marker.data('city');
    var latLng = {
        lat: parseFloat( lat ),
        lng: parseFloat( lng )
    };

    // Create marker instance.
    var marker = new google.maps.Marker({
        position : latLng,
        map: map,
        icon: '/wp-content/uploads/2021/04/pin.jpg',
        state: state,
        city: city
    });

    // Append to reference for later use.
    map.markers.push( marker );

    allMarkers.push( marker );

    // If marker contains HTML, add it to an infoWindow.
    if( $marker.html()){


        // Create info window.
        var infowindow = new google.maps.InfoWindow({
            content: $marker.html()
        });
        infoWindows.push(infowindow); 

        // Show info window when marker is clicked.
        google.maps.event.addListener(marker, 'click', function() {
            closeAllInfoWindows();
            infowindow.open( map, marker );
            // infowindow.close( map, marker );
            // console.log(infowindow.anchor);
        });
    }

}


/**
 * centerMap
 *
 * Centers the map showing all markers in view.
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   object The map instance.
 * @return  void
 */
function centerMap( map ) {

    // Create map boundaries from all map markers.
    var bounds = new google.maps.LatLngBounds();
    map.markers.forEach(function( marker ){
        bounds.extend({
            lat: marker.position.lat(),
            lng: marker.position.lng()
        });
    });

    // Case: Single marker.
    if( map.markers.length == 1 ){
        map.setCenter( bounds.getCenter() );

    // Case: Multiple markers.
    } else{
        map.fitBounds( bounds );
    }
}

// Render maps on page load.
$(document).ready(function(){
    $('.acf-map').each(function(){
        var $state = 'all';
        var map = initMap( $(this), $state );
    });
});

// $(document).ready(function(){
//     if (typeof google !== 'undefined' && google.maps) {
//         $('.acf-map').each(function(){
//             var $state = 'all';
//             var map = initMap( $(this), $state );
//         });
//     } else {
//         console.error('Google Maps API is not loaded');
//     }
// });


// Filtering
$('#states-filter').on('change', function(){
    var filterSt = $('#states-filter');
    var state = filterSt.val();
    
    window.location.href =  state;

});
$('#cities-filter').on('change', function(){
    var filterSt = $('#cities-filter');
    var city = filterSt.val();
    
    window.location.href =  city;

});





})(jQuery);