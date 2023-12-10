<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/datatables/datatables.min.css">
 <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/dropzone-5.5.0/dist/min/dropzone.min.css">


<script rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/datatables/datatables.min.js"></script>

	<script src="<?=base_url();?>assets/admin/vendors/dropzone-5.5.0/dist/min/dropzone.min.js"></script>

		<!-- ===========Innerpage-wrapper============= -->
		<section>
			<style type="text/css">
			.ssss{
			    
  position: relative;
  display: inline-block;
			}
.dropdownnn {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 9999999999;
}
.dropdownnn a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.ssss:hover .dropdownnn {
  display: block;
}

				.divv{
					width:100%; 
					height:650px; 
					
				}
				.div_table{
                    width:50%;
                    float:left;
				}
				label{
					width:160px;
				}
				table{
					width:100%;
					color:blue;
					border:none;
					background-color:white;
				}
				table tr td{
					height:40px;
                    padding-left: 10px;
                    color:green;
                    border: none;

				}
				td{
					color:red;
					
				}

      #map {
          width:100%;
        height: 70%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>

			<div class="content add-details">
				<div class="in-content-wrapper">
					<div class="row no-gutters">

						<div class="col">
						    
							<div class="heading-messages">
								<h3><?=$this->lang->line('Apartment');?> </h3>
							</div><!-- End heading-messages -->
						
 
						</div><!-- End column -->
						<div class="col-md-4">
							<div class="breadcrumb">
								<div class="breadcrumb-item"><i class="fas fa-angle-right"></i><a href="#"><?=$this->lang->line('Apartment');?></a>
								</div>
								<div class="breadcrumb-item active"><i class="fas fa-angle-right"></i><?=$this->lang->line('Map');?>
								</div>
							</div><!-- end breadcrumb-->
						</div><!-- end column -->

					</div><!-- end row -->
<div id="map"></div>
    <button style="width:100%; margin:auto; height:50px; background-color:#44cc5b; margin-top:3px; font-size:25px; color:white;" onclick="ganaxleba();"><?=$this->lang->line('Save');?></button>
    <script>

      // In the following example, markers appear when the user clicks on the map.
      // The markers are stored in an array.
      // The user can then click an option to hide, show or delete the markers.
      var map;
      var markers = [];
      var latt;
      var lngg;
      function initMap() {
        var coord = {lat: <?php echo $apartment_map_lat; ?>, lng: <?php echo $apartment_map_lng; ?>};

        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: coord,
        });
        addMarker(coord);

        // This event listener will call addMarker() when the map is clicked.
        map.addListener('click', function(event) {
          addMarker(event.latLng);
          latt = event.latLng.lat();
          lngg = event.latLng.lng();
        });

      }
      function ganaxleba()
      {
          location.href = "<?=base_url('admin/update_coords/');?><?php echo $apartment_map_code;?>"+"/"+latt+"/"+lngg;

      }

      // Adds a marker to the map and push to the array.
      function addMarker(location) {
          deleteMarkers();
        var marker = new google.maps.Marker({
          position: location,
          map: map
        });
        markers.push(marker);
      }

      // Sets the map on all markers in the array.
      function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
      }

      // Removes the markers from the map, but keeps them in the array.
      function clearMarkers() {
        setMapOnAll(null);
      }

      // Shows any markers currently in the array.
      function showMarkers() {
        setMapOnAll(map);
      }

      // Deletes all markers in the array by removing references to them.
      function deleteMarkers() {
        clearMarkers();
        markers = [];
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6qVcdI5YhvbWTBoEzXvW24Aiawa7hN3c&callback=initMap">
    </script>

				</div><!-- end in-content-wrapper -->
			</div><!-- end add-details -->
		</section>
		<!-- ===========End Innerpage-wrapper============= -->
		
	</div><!-- end wrapper -->





