<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Map Routes</title>

        <!-- Optional theme -->
        <link rel="stylesheet" href="/orderTaker/app/assets/css/bootstrap-theme.min.css"></link>
        <link rel="stylesheet" href="/orderTaker/app/assets/css/bootstrap-datetimepicker.min.css" ></link>
        <link rel="stylesheet" href="/orderTaker/app/assets/css/bootstrap.min.css"></link>
        <link rel="stylesheet" href="/orderTaker/app/assets/css/style.css"></link>

        <script src="/orderTaker/app/assets/js/moment.min.js"></script>   
        <script src="/orderTaker/app/assets/js/jquery.min.js"></script>
        <script src="/orderTaker/app/assets/js/demo_ui.js"></script>
        <script src="/orderTaker/app/assets/js/bootstrap.min.js"></script>
        <script src="/orderTaker/app/assets/js/demo.js"></script>
        <script src="/orderTaker/app/assets/js/bootstrap-datetimepicker.min.js"></script>  
        <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #origin-input,
      #destination-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 200px;
      }

      #origin-input:focus,
      #destination-input:focus {
        border-color: #4d90fe;
      }

      #mode-selector {
        color: #fff;
        background-color: #4d90fe;
        margin-left: 12px;
        padding: 5px 11px 0px 11px;
      }

      #mode-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

    </style> 
    </head>
    <body>
        <div class="container">
            <div class="row">

                <section class="content">
                    <h1>Map Routes</h1>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-filter" data-toggle="modal" data-target="#DemoModal" data-action="Search">Search</button>
                                        <button type="button" class="btn btn-success btn-action" data-toggle="modal" data-target="#DemoModal" data-action="Add">Add</button>
                                        <button type="button" class="btn btn-primary btn-action" data-toggle="modal" data-target="#DemoModal" data-action="Edit">Edit</button>
                                        <button type="button" id="delete"class="btn btn-filter btn-action" data-action="Delete">Delete</button>
                                    </div>
                                </div>
                                <div class="table-container">
                                    <table class="table table-filter" id="mapRoutesTable">
                                        <tbody>
                                            <tr data-status="add">
                                                <td>
                                                    <div class="ckbox">
                                                        <input type="radio" name="todo" id="checkbox1">
                                                            <label for="checkbox1"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="javascript:;" class="star">
                                                        <i class="glyphicon glyphicon-star"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="media">
<!--                                                        <a href="#" class="pull-left">
                                                            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
                                                        </a>-->
                                                        <div class="media-body">
                                                            <span class="media-meta pull-right">Febrero 13, 2016</span>
                                                            <h4 class="title">
                                                                Lorem Impsum
                                                                <!--<span class="pull-right add">(Pagado)</span>-->
                                                            </h4>
                                                            <p class="summary">Ut enim ad minim veniam, quis nostrud exercitation...</p>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="content-footer">
                            <p>
                                <a href="https://stackoverflow.com/users/4452553/guradio" target="_blank">Martin Lloyd T. Manlapig</a>
                            </p>
                        </div>
                    </div>
                </section>

            </div>
        </div>
        <!-- Modal -->

        <div class="modal fade" id="DemoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="modal-title" id="exampleModalLabel">New message</h3>
                    </div>
                    <div class="modal-body">
                        <form id="demoform" name="demoform" method="post">
                            <div class="form-group">
                                <label for="message-text" class="form-control-label">Origin:</label>
                                <input id="origin-input" class="controls" type="text" placeholder="Enter an origin location">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="form-control-label">Destination:</label>
                                <input id="destination-input" class="controls" type="text" placeholder="Enter a destination location">
                            </div>
                            <div id="mode-selector" class="controls">
                            <input type="radio" name="type" id="changemode-walking" checked="checked">
                            <label for="changemode-walking">Walking</label>

                            <input type="radio" name="type" id="changemode-transit">
                            <label for="changemode-transit">Transit</label>

                            <input type="radio" name="type" id="changemode-driving">
                            <label for="changemode-driving">Driving</label>
                            </div>
                            <div id="map"></div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          mapTypeControl: false,
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });

        new AutocompleteDirectionsHandler(map);
      }

       /**
        * @constructor
       */
      function AutocompleteDirectionsHandler(map) {
        this.map = map;
        this.originPlaceId = null;
        this.destinationPlaceId = null;
        this.travelMode = 'WALKING';
        var originInput = document.getElementById('origin-input');
        var destinationInput = document.getElementById('destination-input');
        var modeSelector = document.getElementById('mode-selector');
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);

        var originAutocomplete = new google.maps.places.Autocomplete(
            originInput, {placeIdOnly: true});
        var destinationAutocomplete = new google.maps.places.Autocomplete(
            destinationInput, {placeIdOnly: true});

        this.setupClickListener('changemode-walking', 'WALKING');
        this.setupClickListener('changemode-transit', 'TRANSIT');
        this.setupClickListener('changemode-driving', 'DRIVING');

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
      }

      // Sets a listener on a radio button to change the filter type on Places
      // Autocomplete.
      AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
        var radioButton = document.getElementById(id);
        var me = this;
        radioButton.addEventListener('click', function() {
          me.travelMode = mode;
          me.route();
        });
      };

      AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
        var me = this;
        autocomplete.bindTo('bounds', this.map);
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          if (!place.place_id) {
            window.alert("Please select an option from the dropdown list.");
            return;
          }
          if (mode === 'ORIG') {
            me.originPlaceId = place.place_id;
          } else {
            me.destinationPlaceId = place.place_id;
          }
          me.route();
        });

      };

      AutocompleteDirectionsHandler.prototype.route = function() {
        if (!this.originPlaceId || !this.destinationPlaceId) {
          return;
        }
        var me = this;

        this.directionsService.route({
          origin: {'placeId': this.originPlaceId},
          destination: {'placeId': this.destinationPlaceId},
          travelMode: this.travelMode
        }, function(response, status) {
          if (status === 'OK') {
            me.directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      };

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgMHMC4TPKzYN5Bt9X1lCGpO5Um7nDDIY&libraries=places&callback=initMap"
        async defer></script>
    </body>
    
</html>