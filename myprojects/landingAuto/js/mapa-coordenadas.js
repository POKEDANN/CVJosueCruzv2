google.maps.event.addDomListener(window, 'load', init);
        
            function init() {
               
                var mapOptions = {
                    
                    zoom: 5,

                    center: new google.maps.LatLng(24.678737,  -99.189677), // New York

                    scrollwheel: false,

                    styles: [{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2e5d4"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"}]},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{"featureType":"road","elementType":"all","stylers":[{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#e4d7c6"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]}]
                };

               
                var mapElement = document.getElementById('map');

                
                var map = new google.maps.Map(mapElement, mapOptions);

                setMarkers(map, sucursales);

          

            }


         
          var sucursales = [

            ['ZONA SURESTE (MÉRIDA)', 21.055552, -89.631151 ],
            ['ZONA SUR (PUEBLA)', 19.0754412 , -98.320802 ],
            ['ZONA NORTE (MONTERREY)', 25.743704, -100.207479 ],
            ['ZONA CENTRO (LEÓN)', 21.047852, -101.577772 ],
            ['ZONA CENTRO (GUADALAJARA)', 20.71915 , -103.472199 ],
            ['ZONA METROPOLITANA (TLÁHUAC)', 19.306734, -99.050809 ],
            ['ZONA SURESTE (VILLAHERMOSA)', 17.988953, -92.97789 ],
            ['ZONA SUR (VERACRUZ)', 19.165592, -96.223118 ],
            ['ZONA NORTE (TAMPICO)', 22.223835, -97.907058 ],
            ['ZONA NOROESTE (CULIACÁN)', 24.73812 , -107.452783 ],
            ['ZONA NOROESTE (TIJUANA)', 32.540772, -117.047964 ],
            ['ZONA NOROESTE (LA PAZ)', 24.062825, -110.305052 ],
            ['ZONA NOROESTE (HERMOSILLO)', 29.122329, -110.985622 ],
            ['ZONA NORTE (CHIHUAHUA)', 28.599934, -106.103189 ],
            ['ZONA SURESTE (CANCÚN)', 20.992214, -86.854606 ],
            ['ZONA NOROESTE (MEXICALI)', 32.653627, -115.430565 ],
            ['ZONA SUR (OAXACA)', 17.134506, -96.774364 ],
            ['ZONA SURESTE (TUXTLA GUTIÉRREZ)', 16.756843, -93.170704 ],
            ['ZONA NORTE (CD. JUÁREZ)', 31.710216, -106.453164 ],
            ['ZONA NORTE (TORREÓN)', 25.558277, -103.469603 ],
            ['ZONA CENTRO (QUERÉTARO)', 20.730139, -100.417145 ],
            ['ZONA METROPOLITANA (TOLUCA)', 19.281737, -99.492772 ],
            ['ZONA SUR (CUERNAVACA)', 18.893649, -99.131162 ],
            ['ZONA METROPOLITANA (CUAUTITLAN)', 19.678737, -99.189677 ],
            ['ZONA METROPOLITANA (SAN JERONIMO)', 19.678737, -99.189677 ],
            ['ZONA NORTE (MONTERREY II)', 25.743704, -100.207479 ],
            ['ZONA NORTE (PACHUCA)', 25.743704, -100.207479 ],
            ['ZONA NORTE (NUEVO LAREDO)', 25.743704, -100.207479 ],
            ['ZONA NORTE (SAN LUIS POTOSÍ)', 25.743704, -100.207479 ],
            ['(ACAPULCO)', 26.743704, -99.207479 ]
          ];

          function setMarkers(map, locations) {
            // Add markers to the map

            // Marker sizes are expressed as a Size of X,Y
            // where the origin of the image (0,0) is located
            // in the top left of the image.

            // Origins, anchor positions and coordinates of the marker
            // increase in the X direction to the right and in
            // the Y direction down.
            var image = {
              url: 'images/beachflag.png',
              // This marker is 20 pixels wide by 32 pixels tall.
              size: new google.maps.Size(20, 32),
              // The origin for this image is 0,0.
              origin: new google.maps.Point(0,0),
              // The anchor for this image is the base of the flagpole at 0,32.
              anchor: new google.maps.Point(0, 32)
            };
            // Shapes define the clickable region of the icon.
            // The type defines an HTML &lt;area&gt; element 'poly' which
            // traces out a polygon as a series of X,Y points. The final
            // coordinate closes the poly by connecting to the first
            // coordinate.
            var shape = {
                coords: [1, 1, 1, 20, 18, 20, 18 , 1],
                type: 'poly'
            };
            for (var i = 0; i < locations.length; i++) {
              var beach = locations[i];
              var myLatLng = new google.maps.LatLng(beach[1], beach[2]);
              var marker = new google.maps.Marker({
                  position: myLatLng,
                  map: map,
                  //icon: image,
                  shape: shape,
                  title: beach[0],
                  zIndex: beach[3]
              });
            }
          }
          
