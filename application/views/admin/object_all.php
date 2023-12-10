<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/datatables/datatables.min.css">
 <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/dropzone-5.5.0/dist/min/dropzone.min.css">


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
    
	table tr td:nth-child(8) a {
    color: #e6e6e6;
    font-size: 13px;
    padding: 5px 10px;
    border-radius: 10px;
}
.hotel-listing-form form .form-group .form-control
{
    padding: 0 0 0 3px;
}
 .hotel-listing-form .form-row .col-md {
    padding: 0 10px 0 0;
}
.box .tools-btns
{
    margin:15px 30px 15px 0;
}
.hotel-listing-form form {
    position: relative;
    margin: 15px auto 10px auto;
    max-width: 90%;
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

<section>,
			<div class="content booking-content">
				<div class="in-content-wrapper">
					<div class="row no-gutters">

						<div class="col">
							<div class="heading-messages">
								<h3><?=$this->lang->line('Apartment');?></h3>
							</div><!-- End heading-messages -->
						</div><!-- End column -->
						<div class="col-md-4">
							<div class="breadcrumb">
								<div class="breadcrumb-item"><i class="fas fa-angle-right"></i><a href="#"><?=$this->lang->line('Apartment');?></a>
								</div>
								<div class="breadcrumb-item active"><i class="fas fa-angle-right"></i><a href="<?=base_url('admin/apartment_all');?>"><?=$this->lang->line('All');?></a>
								</div>
							</div><!-- End Breadcrumb -->
						</div><!-- End row -->
					</div><!-- End row -->


					<div class="box">
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
						<div class="hotel-listing-form" id="details_form">
							<form class="text-center" action="<?=base_url('admin/apartment_all_search')?>" method="POST">
							      <div class="form-row">
							      <div class="col-md">
										<div class="form-group">
											<input type="text" class="form-control" name="city" id="city" placeholder="<?=$this->lang->line('City');?>" >
										</div><!-- end form-group -->
									</div><!-- end column -->  
									<div class="col-md">
										<div class="form-group">
											<input type="text" class="form-control"  id="code" name="code" placeholder="ID..." >
										</div>
								</div>
							      <div class="col-md">
										<div class="form-group">
							                <select class="form-control" name="category" >
							                    <option value="0"><?=$this->lang->line('Category');?></option>
                                                    <option value="for_sale"><?=$this->lang->line('for_sale');?></option>
													<option value="for_rent"><?=$this->lang->line('for_rent');?></option>

                                            </select>
										</div><!-- end form-group -->
									</div><!-- end column -->
								  <div class="col-md">
								    <div class="form-group">
							         <select class="form-control" name="type" >
							          <option value="0"><?=$this->lang->line('Type');?></option>
                                                   <option value="Apartment"><?=$this->lang->line('Apartment');?></option>	
                                                   <option  value="New_building_apartment"><?=$this->lang->line('New_building_apartment');?></option>
													<option value="Old_building_apartment"><?=$this->lang->line('Old_building_apartment');?></option>	
										<option value="House" ><?=$this->lang->line('House');?></option>
										<option value="Villa"><?=$this->lang->line('Villa');?></option>
													<option value="Cottage"><?=$this->lang->line('Cottage');?></option>
												<option value="Hotel"><?=$this->lang->line('Hotel');?></option>
													
													<option value="Guest_hotel"><?=$this->lang->line('Guest_hotel');?></option>
													<option value="Office"><?=$this->lang->line('Office');?></option>
													<option value="Restaurant_cafe"><?=$this->lang->line('Restaurant_cafe');?>
														<option value="Magazine"><?=$this->lang->line('Magazine');?></option>
													</option>
													<option value="Warehouse"><?=$this->lang->line('Warehouse');?></option>
													
												
													<option value="Agricultural_land"><?=$this->lang->line('Agricultural_land');?></option>	
													<option value="Non_agricultural_land"><?=$this->lang->line('Non_agricultural_land');?></option>
                                                    
                                                    </select>
										</div><!-- end form-group -->
									</div><!-- end column -->
								  

									<div class="col-md">
										<div class="form-group">
											<div class="input-group">
												<select class="custom-select" id="status" name="status">
												    <option value="0"><?=$this->lang->line('Status');?></option>
													<option value="Active"><?=$this->lang->line('Active');?></option>
													<option value="Expired"><?=$this->lang->line('Expired');?></option>
												    <option value="Canceled"><?=$this->lang->line('Canceled');?></option> 
												</select>
												<i class="fas fa-angle-down"></i>
											</div>
										</div><!-- end form-group -->
									</div><!-- end column -->
									</div>
									<div class="form-row">

								</div>
								<div class="col-md" style="padding-left:0;">
										<div class="form-group">
											<div class="input-group"  >
							                	<ul class="list-inline" >
								                	<li class="list-inline-item" >
									         	<button type="submit" class="btn"><?=$this->lang->line('Search');?></button>
								             	</li>
							                	</ul>
								</div>
								</div>
								</div>
							</form>
						</div>
						<div class="row no-gutters">
							<div class="col">
								<div id="example_wrapper" class="dataTables_wrapper no-footer">
								    <div class="dataTables_length" id="example_length" >
                                        <label style="font-size:16px;"><?=$this->lang->line('Result');?> - <?php if(isset($count_user_apartment_all)) echo $count_user_apartment_all; else { echo "0";} ?> 
								        </label>								    
								    </div>
								  <table id="example" class="display table-hover table-responsive-xl dataTable no-footer" role="grid" aria-describedby="example_info">
									<thead>
										<tr role="row">
										<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 19px;"><?=$this->lang->line('Photo');?></th>
										<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 64px;"><?=$this->lang->line('Category');?></th>
										<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Mobile: activate to sort column ascending" style="width: 66px;"><?=$this->lang->line('Type');?></th>
										<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 118px;"><?=$this->lang->line('City');?></th>
										<th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Arrive: activate to sort column ascending" aria-sort="descending" style="width: 64px;"><?=$this->lang->line('Address');?></th>
										<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Depart: activate to sort column ascending" style="width: 64px;"><?=$this->lang->line('Telephone');?></th>
										<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Booking Type: activate to sort column ascending" style="width: 82px;"> <?=$this->lang->line('Code');?></th>
										<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 56px;"><?=$this->lang->line('Status');?></th>
										<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Payment: activate to sort column ascending" style="width: 64px;"><?=$this->lang->line('Price');?></th>
									
										<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 47px;"><?=$this->lang->line('Duration');?></th>
										</tr>
									</thead>
									<tbody>
										<?php if (!empty($user_apartment_all)) foreach ($user_apartment_all as $apartment_item): ?>
										
									<tr role="row" class="odd">
											<td class="sorting_1"><img src="<?=base_url('uploads/apartments/');?><?php echo $apartment_item['file_name']; ?>" alt="<?=$this->lang->line('Photo');?>" class="img-fluid rounded-circle" width="40px" style="max-height:30px;"></td>
											<td><a href="<?=base_url('admin/apartment_edit/');?><?php echo $apartment_item['code']; ?>"><?php echo $this->lang->line($apartment_item['category']); ?></a></td>
											<td><a href="<?=base_url('admin/apartment_edit/');?><?php echo $apartment_item['code']; ?>" style="color:#007bff;"><?php echo $this->lang->line($apartment_item['type']); ?></a></td>
											<td><?php echo $apartment_item['city']; ?></td>
											<td><?php echo $apartment_item['address']; ?></td>
											<td><?php echo $apartment_item['telephone']; ?></td>
											<td><?php echo $apartment_item['code']; ?></td>
											<td><a href="#" <?php if($apartment_item['status']=="Canceled") echo "style='background-color:#FFE633;'"; if($apartment_item['status']=="Expired") echo "style='background-color:#ff0000;'"; if($apartment_item['status']=="Active") echo "style='background-color:green;'";?>><?php echo $this->lang->line($apartment_item['status']); ?></a></td>
											<td><?php echo $apartment_item['price']." ".$apartment_item['currency']; ?></td>
											
											<td><?php echo $apartment_item['duration']." ".$this->lang->line('Day'); ?></td>

										</tr>
									<?php endforeach; ?>
								</tbody>
								</table>
								
								<div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
								    <?php echo $links; ?></div></div>
							</div><!-- End column -->
						</div><!-- End row -->
					</div><!-- End Box -->
				</div><!-- End in-content-wrapper -->
			</div><!-- End booking-content -->
		</section>