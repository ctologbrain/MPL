<div class="modal fade routeMasterModel" id="TouchPointModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                 
                        <table class="table mb-0" style="width: 100%;">
                                <tr>
                                    <td class="p-1 text-start" style="width: 15%;font-size: 12px!important ;">Route Name</td>
                                    <td class="p-1 text-start" style="width: 20%;font-size: 12px!important;">gurgaon - agra</td>
                                    <td rowspan="7" class="p-1 text-start" style="width: 40%;font-size: 12px!important;">
                                        <div class="mapouter">
                                            <div class="gmap_canvas" id="dvMap">
                                        
                                            </div>
                                            <style>
                                            .mapouter{position:relative;text-align:right;width:100%;height:50vh;}
                                            .gmap_canvas {overflow:hidden;background:none!important;width:100%;height:50vh;}
                                            .gmap_iframe {width:100%!important;height:50vh!important;}
                                            </style>
                                        </div>
                                    </td>
                                    <td class="p-1 text-start" style="width: 25%;font-size: 12px!important;">Activation Status</td>
                                </tr>
                                <tr>
                                    <td class="p-1 text-start" style="font-size: 12px!important;">Route Code/ID</td>
                                    <td class="p-1 text-start" style="font-size: 12px!important;">{{$route->id}}</td>
                                    <td class="p-1 text-start" style="font-size: 12px!important;">Active <span style="color: blue;"><i class="fa fa-pencil" aria-hidden="true"></i></span></td>
                               </tr>
                               <tr>
                                    <td class="p-1 text-start" style="font-size: 12px!important;">Route Cities</td>
                                    <td class="p-1 text-start" style="font-size: 12px!important;">{{$route->StatrtPointDetails->CityName}}~{{$route->EndPointDetails->CityName}}</td>
                                    <td class="p-1 text-start" style="font-size: 12px!important;line-height:18px;">
                                        Status Date(s):<br>
                                        01 Jan 1970 05:30 AM TO 01 Jan 1970 05:30 AM 
                                    </td>
                               </tr>
                               <tr>
                                    <td class="p-1 text-start" style="font-size: 12px!important;">Transit Days</td>
                                    <td class="p-1 text-start" style="font-size: 12px!important;">{{$route->TransitDays}}</td>
                                    <td class="p-1 text-start" style="font-size: 12px!important;"> 
                                    </td>
                               </tr>
                               <tr>
                                    <td class="p-1 text-start" style="font-size: 12px!important;">Touching</td>
                                    <td class="p-1 text-start" style="font-size: 12px!important;">@foreach($touchPoint as $tcpoint){{$tcpoint->CityName}}- @endforeach</td>
                                    <td class="p-1 text-start" style="font-size: 12px!important;line-height: 18px;"> 
                                        Status reason:<br>
                                        inactive
                                    </td>
                               </tr>
                               <tr>
                                    <td class="p-1 text-start" style="font-size: 12px!important;">Cretaed On</td>
                                    <td class="p-1 text-start" style="font-size: 12px!important;">20 Apr 2020 12:11 PM</td>
                                    <td class="p-1 text-start" style="font-size: 12px!important;"> 
                                    </td>
                               </tr>
                               <tr>
                                    <td class="p-1 text-start" style="font-size: 12px!important;" colspan="2">
                                        <button class="btn bg-light"><span style="color:blue;"><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp; Edit</span></button>
                                    </td>
                                    <td class="p-1 text-start"></td>
                                    <td class="p-1 text-start" style="font-size: 12px!important;"> 
                                    </td>
                               </tr>
                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            
                        </div>
                    </div>
                </div>
            </div>
</div>

<script>
      $('#TouchPointModal').modal('toggle');
      var markers = [
            {
                "title": 'BANGALORE',
                "lat": '12.9716',
                "lng": '77.5946',
                "description": 'Alibaug is a coastal town and a municipal council in Raigad District in the Konkan region of Maharashtra, India.'
            }
        ,
            {
                "title": 'DELHI',
                "lat": '28.7041',
                "lng": '77.1025',
                "description": 'Mumbai formerly Bombay, is the capital city of the Indian state of Maharashtra.'
            }
        
];

      $(document).ready(function(){
       var mapOptions = {
                center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
            var infoWindow = new google.maps.InfoWindow();
            var lat_lng = new Array();
            var latlngbounds = new google.maps.LatLngBounds();
            for (i = 0; i < markers.length; i++) {
                var data = markers[i]
                var myLatlng = new google.maps.LatLng(data.lat, data.lng);
                lat_lng.push(myLatlng);
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title: data.title
                });
                latlngbounds.extend(marker.position);
                (function (marker, data) {
                    google.maps.event.addListener(marker, "click", function (e) {
                        infoWindow.setContent(data.description);
                        infoWindow.open(map, marker);
                    });
                })(marker, data);
            }
            map.setCenter(latlngbounds.getCenter());
            map.fitBounds(latlngbounds);

            //***********ROUTING****************//

            //Intialize the Path Array
            var path = new google.maps.MVCArray();

            //Intialize the Direction Service
            var service = new google.maps.DirectionsService();

            //Set the Path Stroke Color
            var poly = new google.maps.Polyline({ map: map, strokeColor: '#4986E7' });

            //Loop and Draw Path Route between the Points on MAP
            for (var i = 0; i < lat_lng.length; i++) {
                if ((i + 1) < lat_lng.length) {
                    var src = lat_lng[i];
                    var des = lat_lng[i + 1];
                    path.push(src);
                    poly.setPath(path);
                    service.route({
                        origin: src,
                        destination: des,
                        travelMode: google.maps.DirectionsTravelMode.DRIVING
                    }, function (result, status) {
                        if (status == google.maps.DirectionsStatus.OK) {
                            for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                                path.push(result.routes[0].overview_path[i]);
                            }
                        }
                    });
                }
            }
        });
      </script>
    