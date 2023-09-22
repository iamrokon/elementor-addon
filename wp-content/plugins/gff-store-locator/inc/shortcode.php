<?php
function gff_store_locator_map_shortcode($atts){
    $html = '
    <div style="height:500px;width:100%" id="map">
    <script>
    var map = L.map("map").setView([51.505, -0.09], 13);

    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    }).addTo(map);';

    $maps = get_post_meta($atts['id'],'maps',true);
    if(is_array($maps) && !empty($maps)){
        foreach($maps as $map){
            $html .='L.marker(['.$map['latitude'].', '.$map['longitude'].']).addTo(map)
            .bindPopup("<h4>'.$map['title'].'</h4><br>Address : '.$map['address'].'<br>Phone : '.$map['phone'].'<br>Hours : '.$map['hours'].'<br>Website : '.$map['website'].'");';
        }
    }

    $html .= '</script></div>';

    // return var_dump($maps);

    return $html;
}
add_shortcode('gff-store-locator','gff_store_locator_map_shortcode');