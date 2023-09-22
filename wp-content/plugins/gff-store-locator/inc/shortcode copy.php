<?php
function gff_store_locator_map_shortcode($atts){

    $html = '
    <div style="height:500px;width:100%" id="map"></div>
    <script>
    var map = L.map("map").setView([51.505, -0.09], 13);

    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: "&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors"
    }).addTo(map);

    L.marker([51.5, -0.09]).addTo(map)
        .bindPopup("A pretty CSS popup.<br> Easily customizable.")
        .openPopup();
    </script>';

    // $html = '
    // <div style="height:500px;width:100%" id="map">
    // <script>
    // var map = L.map("map").setView([51.505, -0.09], 13);

    // L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    //     attribution: "&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors"
    // }).addTo(map);';

    // $maps = get_post_meta($atts['id'],'maps',true);
    // if(is_array($maps) && !empty($maps)){
    //     foreach($maps as $map){
    //         $html .='L.marker(['.$map['latitude'].', '.$map['longitude'].']).addTo(map)
    //         .bindPopup("'.$map['title'].'");';
    //     }
    // }

    // $html .= '</script>

    // $html .=';

    // return var_dump($maps);
    return $html;
}
add_shortcode('gff-store-locator','gff_store_locator_map_shortcode');