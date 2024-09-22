<?php

$title = get_field('title-apoteke');
$description = get_field('dedescription');

$args = [
    'post_type' => 'apoteka',
    'posts_per_page' => -1,
    'order' => 'ASC'
];
$apoteke_posts = get_posts($args);

$adress_values = [];

foreach ($apoteke_posts as $post) {
    $adress = get_field('adresa', $post->ID);
    $adress.= ' montenegro';
    $adress_values[] = $adress;
}
?>

<!--apikey: AIzaSyB-DtodHkNP9LDy87TI9HJngnb8Z0klr5E-->
<head>

</head>
<section class="container mx-auto">
    <div class="flex flex-col lg:flex-row items-center justify-between mb-20">
    <div class="w-full lg:w-[30%] mb-12 lg:mb-0">
        <h2 class="text-4xl font-bold text-[#001047] mb-4"><?php echo $title; ?></h2>
        <p class="text-base font-normal text-[#929292] mb-8"><?php echo $description; ?></p>
        <a href="https://www.google.com/maps/search/?api=1&query=montefarm" target="_blank"><button id="apoteke-lokacija" class="text-[#001047] text-base px-6 py-3 border-solid border-2 border-[#001047] rounded-3xl">Pronađi najbližu apoteku</button></a>
    </div>
    <div id="map" class="rounded-2xl w-full lg:w-1/2 h-[25rem] z-10"></div>
    </div>
    <div class="flex flex-wrap gap-3 justify-between">
        <?php
        foreach ($apoteke_posts as $post) {
        $title = get_the_title($post->ID);
        $title = str_replace('-', ' ', $title);
        $title = str_replace('"', ' ', $title);
        $adresa = get_field('adresa', $post->ID);
        $broj_telefona = get_field('broj_telefona', $post->ID);
        $broj_telefona = str_replace(" ", "", $broj_telefona);
        $ljetnje_radno_vrijeme= get_field('ljetnje_radno_vrijme', $post->ID);
        $dezurna_apoteka = get_field('dezurna_apoteka', $post->ID);
//        $radno_vrijeme = get_field('radno_vrijeme', $post->ID);
        $mail = get_field('mail', $post->ID);
        $apoteka_radi = get_field('apoteka_radi', $post->ID);
        $apoteka_detalji = get_field('apoteka_detalji', $post->ID);
        $fiksni_telefon= get_field('broj_fiksnog', $post->ID);
        

        echo '<div class="w-full lg:w-[48%] mb-8 text-center px-8 py-8 shadow-[0_2px_12px_0_rgba(0,0,0,0.1)] rounded-2xl bg-white flex flex-col justify-between"> 
                <div>
                <h2 class="text-2xl font-semibold mb-3">' . $title . '</h2>
                <p class="text-base font-normal mb-2"><strong>Adresa</strong>: ' . $adresa . '</p>
                <p class="text-base font-normal mb-2"><strong>Broj telefona</strong>: ' . $broj_telefona . '</p>
                <p class="text-base font-normal mb-2"><strong>Fiksni telefon</strong>: ' . $fiksni_telefon . '</p>';

                if($dezurna_apoteka) {
                   echo'<p class="font-bold text-base mb-6">Dežurna apoteka od 00-24h</p>';
                } else {
                    echo '
                    <div class="flex flex-col lg:flex-row justify-center gap-12"> 
                    <div>
                    <p class="text-base font-bold mb-3">Radno vrijeme</p>';

                    if( have_rows('radno-vrijeme-repeater', $post->ID) ):
                        while ( have_rows('radno-vrijeme-repeater',$post->ID) ) : the_row();
                            $radno_vrijeme = get_sub_field('radno-vrijeme');
                            echo '<p class="text-base font-normal mb-2">' . $radno_vrijeme . '</p>';
                        endwhile;
                    else:
                        echo 'Nema radnog vremena';
                    endif;
                    echo '</div>';

        if ($ljetnje_radno_vrijeme) {
            echo'<div>';
            echo '<p class="text-base font-bold mb-3">Ljetnje radno vrijeme</p>';
            if (have_rows('ljetnje_radno_vrijeme_repeater', $post->ID)) {
                while (have_rows('ljetnje_radno_vrijeme_repeater', $post->ID)) : the_row();
                    $ljetnje_radno_vrijeme = get_sub_field('ljetnje_radno_vrijeme');
                    echo '<p class="text-base font-normal mb-2">' . $ljetnje_radno_vrijeme . '</p>';
                endwhile;
            } else {
                echo 'Nema ljetnjeg radnog vremena';
            }
            echo'</div>';
        }
                echo '</div>';
    }
                echo'</div>';
                echo '<div class="flex justify-center">';
                if($apoteka_radi) {
                    echo '<a href="tel: '.$broj_telefona.'" class="w-4/5 lg:w-3/5"><button id="apoteke-poziv" class=" py-2 px-8 rounded-3xl border-2 border-solid border-[#0E559D] text-base text-[#0e559d] font-bold"> Pozovite nas </button></a>';
                } else {
                    echo '<button class=" cursor-default py-3 px-8 rounded-3xl text-base font-bold text-white bg-gradient-to-r from-[#1580EB] to-[#0C4885] ">' . $apoteka_detalji . '</button>';
                }
                echo '</div>';
                echo '</div>';
                }
                ;
        ?>
    </div>

</section>


<script src="https://unpkg.com/@googlemaps/markerclustererplus/dist/index.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-DtodHkNP9LDy87TI9HJngnb8Z0klr5E&callback=initMap">
</script>
<script>
    var gmarkers = [];
    var map;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 42.670150,
                lng: 19.263027
            },
            zoom: 9
        });

        var markers = [];
        var addresses = <?php echo json_encode($adress_values); ?>;

        var fetchPromises = addresses.map(function(address) {
            var requestUrl = 'https://maps.googleapis.com/maps/api/geocode/json?address=' + encodeURIComponent(address) + '&key=AIzaSyB-DtodHkNP9LDy87TI9HJngnb8Z0klr5E';
            return fetch(requestUrl)
                .then(response => {
                    return response.json();
                })
                .then(data => {
                    if (data.status === 'OK') {
                        var lat = data.results[0].geometry.location.lat;
                        var lng = data.results[0].geometry.location.lng;
                        markers.push({
                            coords: {
                                lat: lat,
                                lng: lng
                            },
                            content: '<p>' + address + '</p>'
                        });
                    }
                })
                .catch(error => console.error('Error:', error));
        });

        Promise.all(fetchPromises).then(function() {
            var bounds = new google.maps.LatLngBounds();
            for (var i = 0; i < markers.length; i++) {
                gmarkers.push(addMarker(markers[i]));
                bounds.extend(markers[i].coords);
            }
            map.fitBounds(bounds);

            var markerCluster = new MarkerClusterer(map, gmarkers, {
                imagePath: 'https://unpkg.com/@google/markerclustererplus@4.0.1/images/m'
            });
        });

        function addMarker(props) {
            var marker = new google.maps.Marker({
                position: props.coords,
                map: map,
            });

            if (props.content) {
                var infoWindow = new google.maps.InfoWindow({
                    content: props.content
                });

                marker.addListener('click', function() {
                    infoWindow.open(map, marker);
                });
            }
            return marker;
        }

    }
</script>