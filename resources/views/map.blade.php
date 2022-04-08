<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Google Map</title>
    <style>
        #map {
          height: 100%;
        }
        html, body {
          height: 100%;
          margin: 0;
          padding: 0;
        }
      </style>
</head>
<body>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125588.22161715763!2d105.3560292631847!3d10.371286447013539!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a72e46cd02693%3A0x230863470f76c9e3!2sLong%20Xuy%C3%AAn%2C%20An%20Giang%20Province%2C%20Vietnam!5e0!3m2!1sen!2s!4v1646968123339!5m2!1sen!2s" 
    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    <h1>Google Map</h1>
    <div id="map"></div>

    
    
    <script defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCrT4KyFoTSd0SPJ8gdjR__-DHuH57ilE&callback=initMap">
    </script>


    <script>
        // let map: google.maps.Map;
        var tytMyHoa = {lat:10.374079, lng:105.414622}
        var option = {
            center: tytMyHoa,
            zoom: 16,
        }

        function initMap(){
            map = new google.maps.Map(document.getElementById("map"), option);
            const marker = new google.maps.Marker({
                position: tytMyHoa,
                map: map,
                title: "Trạm y tế",
            });

            marker.addListener("click", () => {
                infowindow.open({
                    anchor: marker, map,
                    shouldFocus: false,
                });
            });
        }
    </script>
            
</body>
</html>