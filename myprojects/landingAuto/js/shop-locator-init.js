(function ($) {
    "use strict";

    $(document).ready(function () {
        $ (".mapa-autoefe").ShopLocator({
            map:{
                scrollwheel: false,
                mapStyle: [{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2e5d4"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"}]},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{"featureType":"road","elementType":"all","stylers":[{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#e4d7c6"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]}]
            },
            pluginStyle: "metro",
            paginationStyle: 1,
            markersIcon: "src/style/metro/images/marker.png",
            infoBubble: {
                visible: true,
                backgroundColor: 'transparent',
                arrowSize: 20,
                arrowPosition: 50,
                minHeight: 127,
                maxHeight: 175,
                minWidth: 170,
                maxWidth: 400,
                getDirectionsButtonName: "¿Cómo llegar?",
                hideCloseButton: false
            },   
            cluster:{
                enable: true,
                gridSize: 20,
                style:{
                    textColor: '#79aacf',
                    textSize: 18,
                    heightSM: 54,
                    widthSM: 54,
                    heightMD: 64,
                    widthMD: 64,
                    heightBIG: 74,
                    widthBIG: 74,
                    iconSmall: "src/style/metro/images/clusterSmall.png",
                    iconMedium: "src/style/metro/images/clusterMedium.png",
                    iconBig: "src/style/metro/images/clusterBig.png"
                }
            },
            sidebar: {
                visible: true,
                selectSection:{
                    visible: true,
                    difFiles: [["Todo México", "locales"], ["Zona Sur", "locales-sur"], ["Zona Norte", "locales-norte"], ["Zona Centro", "locales-centro"] ]
                },
                searchBox: {
                    visible: true,
                    search: true
                },
                results:{
                    pageSize: 8,
                    paginationItems: 5
                }
            }
        });

    });



}(jQuery));



