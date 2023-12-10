<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/datatables/datatables.min.css">


<script rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/datatables/datatables.min.js"></script>
<style>
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
table{border;1px solid black;}
                .apart_menu
				{
				    width:100%; 
				    
				}
				.apart_menu_block
				{
				    width:50%; 
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
				 table tr td:nth-child(8) a {
    color: #e6e6e6;
    font-size: 13px;
    padding: 5px 10px;
    border-radius: 10px;
}

.center {
  text-align: center;
  margin-top: 10px;
}
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
  margin: 0 4px;
}

.pagination a.active {
  background-color: #44cc5b;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
<script>
$(document).ready(function(){
    $("#<?=$this->session->userdata('user_view_block')?>").css("display", "block");
  $("#info").click(function(){
    
    $("#apartments_block").css("display", "none");
    $("#info_block").css("display", "block");
  });
  $("#apartments").click(function(){
    
    $("#info_block").css("display", "none");
    $("#apartments_block").css("display", "block");
      
  });
     $("#example").DataTable();

});
</script>
<

	
		<!-- ===========Innerpage-wrapper============= -->
		<section>
			<div class="content profile view-profile">

				<div class="row no-gutters">

						<div class="col">
						<div class="heading-messages">
							<h3><?=$this->lang->line('Profile');?></h3>
						</div>
					</div>
					<div class="col-md-4">
						<div class="breadcrumb">
						    <div class="breadcrumb-item active"><i class="fas fa-angle-right"></i><a href="<?=base_url('admin/user_list');?>"><?=$this->lang->line('Users');?></a>
							</div>
						<div class="breadcrumb-item"><i class="fas fa-angle-right"></i>
						<?php echo $user['name']." ".$user['surname']; ?>
								</div>
							
						</div><!-- end breadcrumb -->
					</div><!-- End column -->
				</div><!-- end row -->
				<div class="box" id="user_menu" style="display:block; height:35px; padding:0;">
					     <div class="apart_menu">
					        <div class="apart_menu_block" id="info">
					            <h4 style=" margin:auto;"><?=$this->lang->line('Details');?></h4>
					            
					       </div>
					        <div class="apart_menu_block" id="apartments">
					            <h4 style=" margin:auto;"><?=$this->lang->line('Apartments');?></h4>
					       </div>
					    </div>
				</div>

				<div class="box" id="info_block">
					<div class="row">
						<div class="col">
							<div class="details-text">
								<h4><?=$this->lang->line('Status');?> -&#160<?php if($user['status'] == 'Active') echo "<font color='#4CAF50'>".$this->lang->line('Active')."</font>"; if($user['status'] == 'Expired') echo  "<font color='#f44336'>".$this->lang->line('Expired')."</font>"; if($user['status'] == 'Canceled') echo  "<font color='#FFE633'>".$this->lang->line('Canceled')."</font>";?></h4>
							</div><!-- end details-text -->
						</div><!-- end -->
					</div><!-- end row -->
					<div style="width: 100%; height:50px;">
					    <a href="<?=base_url('admin/user_activate1');?>/<?php echo $user['id']; ?>/<?php echo $user['name']; ?>/<?php echo $user['surname']; ?>"><button class="button"><?=$this->lang->line('Activate');?></button></a>
					    <a href="<?=base_url('admin/user_expired');?>/<?php echo $user['id']; ?>/<?php echo $user['name']; ?>/<?php echo $user['surname']; ?>"><button class="button" style="background-color:#f44336;"><?=$this->lang->line('Expire');?></button></a>
				    	</div>

					<div class="row">
						<div class="col-sm-8">

							<div class="profile-padding">
								<div class="row">
									<div class="col-sm-6 col-5">

										<div class="heading-part">
											<p for="name"><?=$this->lang->line('Name');?>:</p>
											<p for="surname"><?=$this->lang->line('Surname');?>:</p>
											<p for="category"><?=$this->lang->line('Category');?>:</p>
											<p for="personal_no"><?=$this->lang->line('Personal No');?>:</p>
											<p for="telephone"><?=$this->lang->line('Telephone');?>:</p>
											<p for="email"><?=$this->lang->line('Email');?>:</p>
											<p for="city"><?=$this->lang->line('City');?>:</p>
											<p for="address"><?=$this->lang->line('Address');?>:</p>
											<p for="status"><?=$this->lang->line('Status');?>:</p>
											<p for="date"><?=$this->lang->line('Date');?>:</p>

										</div><!-- end heading-part -->
									</div><!-- end column -->

									<div class="col-sm-6 col-7">

										<div class="details-part">
											<p><?php if($user['name']!="")echo $user['name']; else { echo "<br>";} ?></p>
											<p><?php if($user['surname']!="")echo $user['surname']; else { echo "<br>";} ?></p>
											<p><?php if($user['category']!="")echo $user['category']; else { echo "<br>";} ?></p>
											<p><?php if($user['personal_no']!="")echo $user['personal_no']; else { echo "<br>";} ?></p>
											<p><?php if($user['telephone']!="")echo $user['telephone']; else { echo "<br>";} ?></p>
											<p><?php if($user['email']!="")echo $user['email']; else { echo "<br>";} ?></p>
											<p><?php if($user['city']!="")echo $user['city']; else { echo "<br>";} ?></p>
											<p><?php if($user['address']!="")echo $user['address']; else { echo "<br>";} ?></p>
											
											<p><?php if($user['status']!="")echo $user['status']; else { echo "<br>";} ?></p>
											<p><?php if($user['date']!="")echo $user['date']; else { echo "<br>";} ?></p>
										</div><!-- end details-part -->

									</div><!-- end column -->
								</div><!-- end row -->

							
							</div><!-- end profile-padding -->

						</div><!-- End column -->
						<div class="col">
							<div class="upload-photo-wrapper">
								<div class="upload-heading">
									<h5><?=$this->lang->line('Photo');?></h5>
								</div><!-- end upload-heading -->

								<div  class="dropzone needsclick dz-clickable" id="demo-upload">
								<img src="<?=base_url('uploads/users/');?><?php echo $user['file_name']; ?>" style="width:240px; ">
								</div><!-- end dropzone -->
							</div><!-- end upload-photo-wrapper -->

						</div><!-- End column -->
					</div><!-- end row -->
				</div><!-- end box -->
									<div class="box" id="apartments_block">
						<div class="row no-gutters">
							<div class="col text-left">
								<div class="add-new">
									<a href="<?=base_url('admin/apartment_create');?>"><?=$this->lang->line('Add new');?><i class="fas fa-plus"></i></a>
								</div><!-- End add-new-->
							</div><!-- End column-->
							<div class="col text-right">
								<div class="tools-btns">
									<a href="#"><i class="fas fa-print" data-toggle="tooltip" data-html="true" title="" data-original-title="Print" onclick="window.print();"></i></a>
								
								</div><!-- End tool-btns-->
							</div><!-- End text-right-->

						</div><!-- end row -->
						<div class="row no-gutters">
							<div class="col">
								<div id="example_wrapper" class="dataTables_wrapper no-footer" style="overflow-x:scroll;">
								    <div class="dataTables_length" id="example_length" >
								      
								<table id="example" class="display table-hover table-responsive-xl listing dataTable no-footer" role="grid" aria-describedby="example_info" >
									<thead>
										<tr role="row">
											<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Img: activate to sort column descending" style="width: 39px;"><?=$this->lang->line('Photo');?></th>
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending" style="width: 21px;"><?=$this->lang->line('Category');?></th>
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending" style="width: 50px;"><?=$this->lang->line('Type');?></th>
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending" style="width: 50px;"><?=$this->lang->line('City');?></th>
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="AC/Non AC: activate to sort column ascending" style="width: 103px;"><?=$this->lang->line('Address');?></th>
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Meal: activate to sort column ascending" style="width: 90px;"><?=$this->lang->line('Telephone');?></th>
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Capacity: activate to sort column ascending" style="width: 83px;"><?=$this->lang->line('Code');?></th>
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 80px;"><?=$this->lang->line('Status');?></th>
										    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 66px;"><?=$this->lang->line('Date');?></th>
										    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Rent: activate to sort column ascending" style="width: 48px;"><?=$this->lang->line('Price');?></th>
									        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 64px;"><?=$this->lang->line('Action');?></th>
									        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Rent: activate to sort column ascending" style="width: 48px;"><?=$this->lang->line('Duration');?></th>
									        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 64px;"><?=$this->lang->line('View');?></th>
									</tr>
									</thead>
									<tbody>
										<?php if (!empty($user_apartments)) foreach ($user_apartments as $apartment_item): ?>
										
									<tr role="row" class="odd">
											<td class="sorting_1"><img src="<?=base_url('uploads/apartments/');?><?php echo $apartment_item['file_name']; ?>" alt="<?=$this->lang->line('Photo');?>" class="img-fluid rounded-circle" width="40px"></td>
											<td><a href="<?=base_url('admin/apartment_view/');?><?php echo $apartment_item['code']; ?>"><?php echo $this->lang->line($apartment_item['category']); ?></a></td>
											<td><a href="<?=base_url('admin/apartment_view/');?><?php echo $apartment_item['code']; ?>" style="color:#007bff;"><?php echo $this->lang->line($apartment_item['type']); ?></a></td>
											<td><?php echo $apartment_item['city']; ?></td>
											<td><?php echo $apartment_item['address']; ?></td>
											<td><?php echo $apartment_item['telephone']; ?></td>
											<td><?php echo $apartment_item['code']; ?></td>
											<td ><a href="#"  <?php if($apartment_item['status']=="Canceled") echo "style='background-color:#FFE633;'"; if($apartment_item['status']=="Expired") echo "style='background-color:#ff0000;'"; if($apartment_item['status']=="Active") echo "style='background-color:green;'";?> ><?php echo $this->lang->line($apartment_item['status']); ?></a></td>
											<td><?php echo $apartment_item['date']; ?></td>
											<td><?php echo $apartment_item['price']." ".$apartment_item['currency']; ?></td>
											<td>
												<a href="<?=base_url('admin/apartment_view/');?><?php echo $apartment_item['code']; ?>"><i class="fas fa-edit" style="color:#44cc5b;"></i></a>
											
											</td>
											<td><?php echo $apartment_item['duration']." ".$this->lang->line('Day'); ?></td>
											<td><?php echo $apartment_item['view']; ?></td>
											
										</tr>
									<?php endforeach; ?>
								</tbody>
								</table>
							
						
								</div>
							</div><!-- end column -->
							<div class="center">
                             <div class="pagination">
							<?php echo $links; ?>
							</div>
							</div>
						</div><!-- end row -->
					</div><!-- end box -->
				</div><!-- end in-content-wrapper -->

			</div><!-- end view-profile -->
		</section>
		<!-- ===========End Innerpage-wrapper============= -->
		
	</div><!-- end wrapper -->
