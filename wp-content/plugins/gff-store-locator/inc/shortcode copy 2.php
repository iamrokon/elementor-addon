<?php
function gff_store_locator_map_shortcode($atts){
    $html = '
    <div style="height:500px;width:100%" id="map">
    <script>
    var markers = [];
    var map = L.map("map").setView([51.505, -0.09], 13);

    L.tileLayer(\'https://tile.openstreetmap.org/{z}/{x}/{y}.png\', {
    }).addTo(map);

    var marker1 = L.marker([51.5, -0.09]).addTo(map)
        .bindPopup("A pretty CSS popup.<br> Easily customizable.")
        .openPopup();

    var marker2 = L.marker([51.49, -0.09]).addTo(map)
        .bindPopup("Map 2.")
        .openPopup();
    markers.push(marker1);
    markers.push(marker2);
    var bounds = L.latLngBounds([]);
    markers.forEach(function(marker) {
        bounds.extend(marker.getLatLng());
    });

    map.fitBounds(bounds);
    </script></div>';



    // $maps = get_post_meta($atts['id'], 'maps', true);

    // $html = '';
    // $html .='
    
    // <div style="height: 500px;width: 100%"  id="map">
    // <script>
    // var markers = []; 
    // var map = L.map("map").setView([51.505, -0.09], 13);

    // L.tileLayer(\'https://tile.openstreetmap.org/{z}/{x}/{y}.png\', {
    // }).addTo(map);';


    // if(!empty($maps)){
    //     foreach($maps as $map){
    //         $html .= 'var marker = L.marker(['.$map['latitude'].', '.$map['longitude'].']).addTo(map)
    //         .bindPopup("<h4>'.$map['title'].'</h4><br>Address : '.$map['address'].'<br>Phone : '.$map['phone'].'<br>Hours : '.$map['hours'].'<br>Website : '.$map['website'].'")
    //         .openPopup();
    //         markers.push(marker);';
    //     }
    // }

    

    // $html .='
    // var bounds = L.latLngBounds([]);
    // markers.forEach(function(marker) {
    //     bounds.extend(marker.getLatLng());
    // });

    // map.fitBounds(bounds);

    // </script></div>';


    return $html;
}
add_shortcode('gff-store-locator','gff_store_locator_map_shortcode');