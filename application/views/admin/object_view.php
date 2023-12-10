<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/datatables/datatables.min.css">
 <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/dropzone-5.5.0/dist/min/dropzone.min.css">


<script rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/datatables/datatables.min.js"></script>

	<script src="<?=base_url();?>assets/admin/vendors/dropzone-5.5.0/dist/min/dropzone.min.js"></script>
<style>
body {
  font-family: Arial;
  margin: 0;
}


* {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
  margin-bottom:150px;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */



.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  position: absolute;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 111;
}


    .div1{
        width:100%; 

    }
   .div2{
        width:20%; 
        
        float:left;
    }
		
				.divv{
					width:100%; 
					height:350px; 
					
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
				.apart_menu
				{
				    width:100%; 
				    
				}
				.apart_menu_block
				{
				    width:33%; 
				    float:left; 
				    text-align: center;
				    border: 1px solid silver;
				    border-radius: 5px;
				}
				.apart_menu_block:hover
				{
				    background-color:silver;
				    border: 2px solid black;
				    cursor: pointer;
				}
				.box
				{
				    display:none;
				}
				
			    #user_info:hover
			    {
			        cursor: pointer;
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
      .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 13px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  margin-left:30px;
}
			@media (max-width: 1200px)
                {
                    .divv
                    {
					width:100%; 
					height:700px; 
					
				    }
                    .div_table
                    {
                        width:100%;
                        
                    }
                }
			</style>
<script>
$(document).ready(function(){
    $("#user_info1").hide();
    $("#user_info2").hide();
    $("#user_info3").hide();
    $("#minus").hide();
    $("#user_info").click(function(){
    $("#plus").toggle();
    $("#minus").toggle();
   $("#user_info1").toggle();
   $("#user_info2").toggle();
   $("#user_info3").toggle();
      
  });
    $("#<?=$this->session->userdata('apart_edit_block');?>").css("display", "block");
  $("#info").click(function(){
    
    $("#gallery_block").css("display", "none");
    $("#map_block").css("display", "none");
    $("#info_block").css("display", "block");
      
  });
  $("#gallery").click(function(){
    
    $("#map_block").css("display", "none");
    $("#info_block").css("display", "none");
    $("#gallery_block").css("display", "block");
      
  });
  $("#mappp").click(function(){
    
    $("#gallery_block").css("display", "none");
    $("#info_block").css("display", "none");
    $("#map_block").css("display", "block");
    
      
  });
});
</script>
		<!-- ===========Innerpage-wrapper============= -->
		<section>
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
								<div class="breadcrumb-item"><i class="fas fa-angle-right"></i><a href="<?=base_url('admin/apartment_list')?>/<?=$this->session->userdata('id')?>"><?=$this->lang->line('All');?></a>
								</div>
								<div class="breadcrumb-item active"><i class="fas fa-angle-right"></i><?php echo $this->lang->line($apartment_view['category']);?> <?php echo $this->lang->line($apartment_view['type']);?>
								</div>
							</div><!-- end breadcrumb-->
						</div><!-- end column -->

					</div><!-- end row -->

					<div class="box" id="apart_menu" style="display:block;">
					     <div class="apart_menu">
					        <div class="apart_menu_block" id="info">
					            <h4 style=" margin:auto;"><?=$this->lang->line('Details');?></h4>
					            
					       </div>
					        <div class="apart_menu_block" id="gallery">
					            <h4 style=" margin:auto;"><?=$this->lang->line('Gallery');?></h4>
					       </div>
					        <div class="apart_menu_block" id="mappp">
					            <h4 style=" margin:auto;"><?=$this->lang->line('Map');?></h4>
					       </div>
					    </div>
					</div>
					<div class="box" id="info_block" >
					     <div class="row">
                            <div class="col">
                                <div class="details-text">
                                    <h4><?=$this->lang->line('Status');?> -&#160<?php if($apartment_view['status'] == 'Active') echo "<font color='#4CAF50'>".$this->lang->line('Active')."</font>"; if($apartment_view['status'] == 'Expired') echo  "<font color='#f44336'>".$this->lang->line('Expired')."</font>"; if($apartment_view['status'] == 'Canceled') echo  "<font color='#FFE633'>".$this->lang->line('Canceled')."</font>";?></h4>
                                </div><!-- end details-text -->
                            </div><!-- End column -->
                        </div><!-- end row -->
                        <div style="width: 100%; height:50px;">
					    <a href="<?=base_url('admin/apartment_activate1/');?><?php echo $apartment_view['code']; ?>/<?php echo $apartment_view['id']; ?>"><button class="button"><?=$this->lang->line('Activate');?></button></a>
					    <a href="<?=base_url('admin/apartment_expired/');?><?php echo $apartment_view['code']; ?>/<?php echo $apartment_view['id']; ?>"><button class="button" style="background-color:#f44336;"><?=$this->lang->line('Expire');?></button></a>
				    	</div>
						<div class="hotel-listing-form" id="details_form">
							<form class="text-center" action="<?=base_url('admin/apartment_view_update/');?><?php echo $apartment_view['code']; ?>" method="POST">
							       <div class="form-row">
									<div class="col-md">
										<div class="form-group">
											<div class="input-group">
											    	
												<div class="input-group-prepend">
													<label class="input-group-text" for="category"><?=$this->lang->line('Duration');?></label>
												</div>
														
                                           
											<select disabled class="custom-select" id="duration" name="duration">
											    <option value="<?php echo $apartment_view['duration'];?>"><?php echo $apartment_view['duration'];?>-<?=$this->lang->line('Day');?></option>
												
													<option value="60" >60-<?=$this->lang->line('Day');?></option>
								
												</select>
												<i class="fas fa-angle-down"></i>
										
											</div>
										</div><!-- end form-group -->
									</div>
									<div class="col-md">
										<div class="form-group">
											<div class="input-group">
											    	
												<div class="input-group-prepend">
													<label class="input-group-text" for="type"><?=$this->lang->line('Type');?>:</label>
												</div>
														
                                           
											<select disabled class="custom-select" id="type" name="type">
											    <option value="<?php echo $apartment_view['type'];?>"><?php echo $this->lang->line($apartment_view['type']); ?></option>
												<option value="Apartment" id="apart"><?=$this->lang->line('Apartment');?> &#160 </option>	
											    <option  value="Black_frame"><?=$this->lang->line('Black_frame');?></option>
											    <option  value="New_building_apartment" id="apartment"><?=$this->lang->line('New_building_apartment');?></option>
												<option value="Old_building_apartment" id="apartment"><?=$this->lang->line('Old_building_apartment');?></option>	
										        <option value="House" id="house"><?=$this->lang->line('House');?></option>
										        <option value="Villa" id="house"><?=$this->lang->line('Villa');?></option>
												<option value="Cottage" id="house"><?=$this->lang->line('Cottage');?></option>
												<option value="Hotel"><?=$this->lang->line('Hotel');?></option>
												<option value="Guest_hotel"><?=$this->lang->line('Guest_hotel');?></option>
												<option value="Office" id="comercial"><?=$this->lang->line('Office');?></option>
												<option value="Restaurant_cafe" id='comercial'><?=$this->lang->line('Restaurant_cafe');?>
												<option value="Magazine" id="comercial"><?=$this->lang->line('Magazine');?></option>
													</option>
												<option value="Warehouse" id="comercial"><?=$this->lang->line('Warehouse');?></option>
												<option value="Agricultural_land" id="comercial"><?=$this->lang->line('Agricultural_land');?></option>	
												<option value="Non_agricultural_land" id="comercial"><?=$this->lang->line('Non_agricultural_land');?></option>
													
												</select>
												<i class="fas fa-angle-down"></i>
										
											</div>
										</div><!-- end form-group -->
									</div><!-- end column -->
									</div>
									<div class="form-row">
                                <div class="col-md">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
													<label class="input-group-text" for="category"><?=$this->lang->line('Category');?>:</label>
												</div>
												<select disabled class="custom-select" id="category" name="category">
													  <option value="<?php echo $apartment_view['category'];?>"><?php echo $this->lang->line($apartment_view['category']); ?></option>
													<option value="for_sale"><?=$this->lang->line('for_sale');?></option>
													<option value="for_rent"><?=$this->lang->line('for_rent');?></option>
												    <!--<option value="Pledge"><?=$this->lang->line('Pledge');?></option> -->
												</select>
												<i class="fas fa-angle-down"></i>
											</div>
										</div><!-- end form-group -->
									</div><!-- end column -->
								<div class="col-md">
										<div class="form-group">
											
											<label for="price" class=""><?=$this->lang->line('Price');?> :&#160 <select disabled name="currency">
											    <option value="<?php echo $apartment_view['currency'];?>" selected="selected"><?php echo $apartment_view['currency'];?></option>
											    <option value="GEL">GEL</option>
											    <option value="USD">USD</option>
											    <option value="EUR">EUR</option>
											</select></label>
											<input disabled type="text" class="form-control" required name="price" id="price" value="<?php echo $apartment_view['price'];?>">
										</div><!-- end form-group -->
									</div><!-- end column -->
								
								</div>
								<div class="form-row" >
							        <div class="col-md" style="text-align: left;">
										<div class="form-group">
										<h5  id="user_info"><i class="fas fa-plus" id="plus" style="color:#44cc5b;"></i><i class="fas fa-minus" id="minus" style="color:red;"></i> <?=$this->lang->line('Contact');?> </h5>
										</div><!-- end form-group -->
									</div>
									
								</div>
							    <div class="form-row" id="user_info1">
							        <div class="col-md">
										<div class="form-group">
											<label for="personal_no" class=""><?=$this->lang->line('Cadastral code');?>:</label>
											<input disabled type="text" class="form-control" required name="cadastral_code" id="cadastral_code" value="<?php echo $apartment_view['cadastral_code'];?>">
										</div><!-- end form-group -->
									</div>
									<div class="col-md">
										<div class="form-group">
											<label for="owner" class=""><?=$this->lang->line('Owner');?>:</label>
											<input disabled type="text" class="form-control" required name="owner" id="owner" value="<?php echo $apartment_view['owner'];?>" placeholder="<?=$this->lang->line('Name');?> <?=$this->lang->line('Surname');?>">
										</div><!-- end form-group -->
									</div><!-- end column -->
								</div><!-- end form-row -->
								<div class="form-row" id="user_info2">
									<div class="col-md">
										<div class="form-group">
											<label for="personal_no" class=""><?=$this->lang->line('Personal No');?>:</label>
											<input disabled type="text" class="form-control" required name="personal_no" id="personal_no" value="<?php echo $apartment_view['personal_no'];?>">
										</div><!-- end form-group -->
									</div><!-- end column -->
									<div class="col-md">
										<div class="form-group">
											<label for="telephone" class=""><?=$this->lang->line('Telephone');?>:</label>
											<input disabled type="text" class="form-control" required name="telephone" id="telephone" value="<?php echo $apartment_view['telephone']; ?>">
										</div><!-- end form-group -->
									</div><!-- end column -->
								</div>
								<div class="form-row" id="user_info3">
									<div class="col-md">
										<div class="form-group" >
										  <textarea class="form-control" rows="4" cols="80" style="margin-top:0;padding-left:1px;" name="admin_comment" id="admin_comment" ><?php echo $apartment_view['admin_comment'];?></textarea>
										</div><!-- end form-group -->
									</div><!-- end column -->
									<div class="col-md" style="text-align: left; ">
										<div class="form-group" style="padding:0;">
										<button type="submit" style="width:120px; height:40px; background-color:#44cc5b; color:white;"><?=$this->lang->line('Save');?></button>
											<input disabled type="text" class="form-control" style="visibility: hidden;">
										</div><!-- end form-group -->
									</div><!-- end column -->
								</div>
								<div class="form-row">	
									<div class="col-md">
										<div class="form-group">
											<label for="city" class=""><?=$this->lang->line('City');?>:</label>
											<input disabled type="text" class="form-control" required name="city" id="city" value="<?php echo $apartment_view['city'];?>">
										</div><!-- end form-group -->
									</div><!-- end column -->
									<div class="col-md">
										<div class="form-group">
											<label for="address" class=""><?=$this->lang->line('Address');?>:</label>
											<input disabled type="text" class="form-control" required name="address" id="address" value="<?php echo $apartment_view['address'];?>">
										</div><!-- end form-group -->
									</div><!-- end column -->
								</div>
								<div class="form-row">
									<div class="col-md">
										<div class="form-group">
											<label for="floor" class=""><?=$this->lang->line('Floor');?>:</label>
											<div style="margin-left:180px; width:70px;float:left;" id="floor">
											<input disabled type="number"  style="width:55px; height:40px; padding-left:6px;" min="1" value="1">
											&#160/
											</div>
											
											<div style=" width:70px;float:left;" id="floor">
											<input disabled type="number"  style="width:55px;height:40px;padding-left:6px;" min="1" value="1">
											</div>
										</div><!-- end form-group -->
									</div><!-- end column -->
									<div class="col-md">
										<div class="form-group">
											<label for="area" class=""><?=$this->lang->line('Area');?>:</label>
											<input disabled type="text" class="form-control" name="area" min="0" required id="area" value="<?php echo $apartment_view['area'];?>">
										</div><!-- end form-group -->
									</div><!-- end column -->
								</div><!-- end form-row -->
								<div class="form-row">
									<div class="col-md">
										<div class="form-group">
											<label for="room" class=""><?=$this->lang->line('Room');?>:</label>
											<input disabled type="number" min="0" class="form-control" value="<?php echo $apartment_view['room'];?>" required name="room" id="room">
										</div><!-- end form-group -->
									</div><!-- end column -->
									<div class="col-md">
										<div class="form-group">
											<label for="bed" class=""><?=$this->lang->line('Bedroom');?>:</label>
											<input disabled type="number" class="form-control" name="bedroom" value="<?php echo $apartment_view['bedroom'];?>" required id="bedroom">
										</div><!-- end form-group -->
									</div><!-- end column -->
								</div><!-- end form-row -->
								<div class="form-row">
									<div class="col-md">
										<div class="form-group">
											<label for="bathroom" class=""><?=$this->lang->line('Bathroom');?>:</label>
											<input disabled type="number" min="0" class="form-control" value="<?php echo $apartment_view['bathroom'];?>" required name="bathroom" id="bathroom">
										</div><!-- end form-group -->
									</div><!-- end column -->
									<div class="col-md">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
													<label class="input-group-text" for="heating"><?=$this->lang->line('Heating');?>:</label>
												</div>
												<select disabled class="custom-select" id="heating" name="heating">
												    <option value="<?php echo $apartment_view['heating'];?>"><?php echo $this->lang->line($apartment_view['heating']); ?></option>
												    <option value="No"><?=$this->lang->line('No');?></option>
												 <option value="Central_heating"><?=$this->lang->line('Central_heating');?></option>
												<option value="Gas"><?=$this->lang->line('Gas');?></option>
												</select>
												<i class="fas fa-angle-down"></i>
											</div>
										</div><!-- end form-group -->
									</div>
								</div><!-- end form-row -->
								<div class="form-row">
                                
								<div class="col-md">
										<div class="form-group">
											<label for="to_sea" class="" style="padding-left:0; width:180px;"><?=$this->lang->line('Near to sea');?>:</label>
											<input disabled type="text" class="form-control" required name="to_sea" id="to_sea">
										</div><!-- end form-group -->
									</div><!-- end column -->
								<div class="col-md">
										<div class="form-group">
										
										</div><!-- end form-group -->
									</div>
								</div>

									<div class="divv">
                                     <div class="div_table" > 
	                                    <table cellspacing="0" cellpadding="0">
	                                    	    <tr>
                                	                <td ><?=$this->lang->line('Secure');?></td>
                                	                <td><label class="containeri">
                                                        <input disabled type="checkbox" id="secure" name="secure" value="1" <?php if($apartment_view['secure'] == '1') { echo 'checked';}?>>
                                                        <span class="checkmark"></span>
                                                        </label>
                                                    </td>
                                	            </tr>
                                	            <tr>
                                	                <td ><?=$this->lang->line('Wheelchair access');?></td>
                                	                <td><label class="containeri">
                                                        <input disabled type="checkbox" id="wheelchair" name="wheelchair" value="1" <?php if($apartment_view['wheelchair'] == '1') { echo 'checked';}?>>
                                                        <span class="checkmark"></span>
                                                        </label>
                                                    </td>
                                	             </tr>
                                	            <tr>
                                	                <td ><?=$this->lang->line('TV');?></td>
                                	                <td><label class="containeri">
                                                        <input disabled type="checkbox" id="tv" name="tv" value="1" <?php if($apartment_view['tv'] == '1') { echo 'checked';}?> >
                                                        <span class="checkmark"></span>
                                                        </label>
                                                    </td>
                                	            </tr>
                                	            <tr>
                                	                <td ><?=$this->lang->line('Wifi');?></td>
                                	                <td><label class="containeri">
                                                        <input disabled type="checkbox" id="wifi" name="wifi" value="1"  <?php if($apartment_view['wifi'] == '1') { echo 'checked';}?>>
                                                        <span class="checkmark"></span>
                                                        </label>
                                                    </td>
                                	            </tr>
                                	            <tr>
                                	                <td ><?=$this->lang->line('Air conditioner');?></td>
                                	                <td><label class="containeri">
                                                        <input disabled type="checkbox" id="air_conditioner" name="air_conditioner" value="1"  <?php if($apartment_view['air_conditioner'] == '1') { echo 'checked';}?>>
                                                        <span class="checkmark"></span>
                                                        </label>
                                                    </td>
                                	            </tr>
                                	            <tr>
                                	                <td ><?=$this->lang->line('Refrigerator');?></td>
                                	                <td><label class="containeri">
                                                        <input disabled type="checkbox" id="refrigerator" name="refrigerator" value="1"  <?php if($apartment_view['refrigerator'] == '1') { echo 'checked';}?>>
                                                        <span class="checkmark"></span>
                                                        </label>
                                                    </td>
                                	            </tr>
                                	            <tr>
                                	                <td ><?=$this->lang->line('Washing machine');?></td>
                                	                <td><label class="containeri">
                                                        <input disabled type="checkbox" id="washing_machine" name="washing_machine" value="1"  <?php if($apartment_view['washing_machine'] == '1') { echo 'checked';}?>>
                                                        <span class="checkmark"></span>
                                                        </label>
                                                    </td>
                                	            </tr>
                                	            
                                        </table>
                                    </div>
                                    <div class="div_table" > 
	                                    <table cellspacing="0" cellpadding="0">
	                                           <tr>
                                	                <td ><?=$this->lang->line('Kitchen');?></td>
                                	                <td><label class="containeri">
                                                        <input disabled type="checkbox" id="kitchen" name="kitchen" value="1" value="1"  <?php if($apartment_view['kitchen'] == '1') { echo 'checked';}?>>
                                                        <span class="checkmark"></span>
                                                        </label>
                                                    </td>
                                	            </tr>
                                	            <tr>
                                	                <td ><?=$this->lang->line('Balcony');?></td>
                                	                <td><label class="containeri">
                                                        <input disabled type="checkbox" id="balcony" name="balcony" value="1" value="1"  <?php if($apartment_view['balcony'] == '1') { echo 'checked';}?>>
                                                        <span class="checkmark"></span>
                                                        </label>
                                                    </td>
                                	            </tr>
                                	            <tr>
                                	                <td ><?=$this->lang->line('Parking');?></td>
                                	                <td><label class="containeri">
                                                        <input disabled type="checkbox" id="parking" name="parking" value="1"  <?php if($apartment_view['parking'] == '1') { echo 'checked';}?>>
                                                        <span class="checkmark"></span>
                                                        </label>
                                                    </td>
                                	            </tr>
                                	            <tr>
                                	                <td ><?=$this->lang->line('Elevator');?></td>
                                	                <td><label class="containeri">
                                                        <input disabled type="checkbox" id="elevator" name="elevator" value="1" <?php if($apartment_view['elevator'] == '1') { echo 'checked';}?>>
                                                        <span class="checkmark"></span>
                                                        </label>
                                                    </td>
                                	            </tr>
	                                    	    
                                	           <tr>
	                                    	   <tr>
                                	                <td ><?=$this->lang->line('Yard');?></td>
                                	                <td><label class="containeri">
                                                        <input disabled type="checkbox" id="yard" name="yard" value="1"  <?php if($apartment_view['yard'] == '1') { echo 'checked';}?>>
                                                        <span class="checkmark"></span>
                                                        </label>
                                                    </td>
                                	            </tr>
                                	             <tr>
                                	                <td ><?=$this->lang->line('Garden');?></td>
                                	                <td><label class="containeri">
                                                        <input disabled type="checkbox" id="garden" name="garden" value="1"  <?php if($apartment_view['garden'] == '1') { echo 'checked';}?>>
                                                        <span class="checkmark"></span>
                                                        </label>
                                                    </td>
                                	            </tr>
                                	             
                                	             <tr>
                                	                <td ><?=$this->lang->line('Playground');?></td>
                                	                <td><label class="containeri">
                                                        <input disabled type="checkbox" id="playground" name="playground" value="1" <?php if($apartment_view['playground'] == '1') { echo 'checked';}?>>
                                                        <span class="checkmark"></span>
                                                        </label>
                                                    </td>
                                	            </tr>
                                	           

                                        </table>
                                    </div>
                                  
                                    
                                     
								</div>

							</form>
						</div><!-- end hotel-listing-form -->
					</div><!-- end box -->
                    <div class="box" id="gallery_block">
                <div style=" margin:auto; margin-top:100px;">

     <div class="container" >
    <?php $raod=1; ?>
        <?php if (!empty($images)) foreach ($images as $images_item): ?>
  <div class="mySlides" style="background-color:black;">
    
  <div class="dropdown-content">
         <?php if($apartment_view['file_name'] == $images_item['file_name']) echo "<i class='fas fa-check' style='color:#99E42D; font-size:50px;'></i>"; ?>
</div>

    <img src="<?=base_url();?>uploads/apartments/<?php echo $images_item['file_name']; ?>" style="padding-left:15%;   max-height:450px;" >
  </div>
  <?php $raod++; ?>
<?php endforeach; ?>
   
  <a class="prev" onclick="plusSlides(-1)" style="color:white;">❮</a>
  <a class="next" onclick="plusSlides(1)" style="color:white;">❯</a>

  <div class="caption-container">
    <p id="caption"></p>
  </div>

  <div class="row">
    <?php $raode=1; ?>
        <?php if (!empty($imagess)) foreach ($imagess as $imagess_item): ?>
    <div class="column">
  <div class="dropdown-content">
         <?php if($apartment_view['file_name'] == $imagess_item['file_name']) echo "<i class='fas fa-check' style='color:#99E42D; font-size:25px;'></i>"; ?>
</div>

      <img class="demo cursor" src="<?=base_url();?>uploads/apartments/<?php echo $imagess_item['file_name']; ?>" style="width:100%;max-height:80px;" onclick="currentSlide(<?php echo $raode; ?>)">
    </div>
   <?php $raode++; ?>
<?php endforeach; ?>
</div>
</div>
</div>

                    </div>
                    <div class="box" id="map_block">
                        <div id="map"></div>
                          
                           
                    </div>


				</div><!-- end in-content-wrapper -->
			</div><!-- end add-details -->
		</section>
		<!-- ===========End Innerpage-wrapper============= -->
		
	</div><!-- end wrapper -->
	<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
	  <script>

      // In the following example, markers appear when the user clicks on the map.
      // The markers are stored in an array.
      // The user can then click an option to hide, show or delete the markers.
      var map;
      var markers = [];
      var latt;
      var lngg;
      function initMap() {
        var coord = {lat: <?php echo $apartment_view['lat'];?>, lng: <?php echo $apartment_view['lng']; ?>};

        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: coord,
        });
        addMarker(coord);

        // This event listener will call addMarker() when the map is clicked.
      /*  map.addListener('click', function(event) {
          addMarker(event.latLng);
          latt = event.latLng.lat();
          lngg = event.latLng.lng();
        }); */

      }
      function ganaxleba()
      {
          location.href = "<?=base_url('admin/update_coords/');?><?php echo $apartment_view['code'];?>"+"/"+latt+"/"+lngg;

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
