<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/datatables/datatables.min.css">
 <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/dropzone-5.5.0/dist/min/dropzone.min.css">


<script rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/datatables/datatables.min.js"></script>

	<script src="<?=base_url();?>assets/admin/vendors/dropzone-5.5.0/dist/min/dropzone.min.js"></script>

		<!-- ===========Innerpage-wrapper============= -->
		<section>
			<div class="content add-details profile">
				<div class="in-content-wrapper">
					<div class="row no-gutters">

						<div class="col">
							<div class="heading-messages">
								<h3><?=$this->lang->line('Profile');?></h3>
							</div><!-- End heading-messages -->
						</div><!-- End column -->
						<div class="col-md-4">
							<div class="breadcrumb">
								<div class="breadcrumb-item"><i class="fas fa-angle-right"></i><a href="#"><?=$this->lang->line('Profile');?></a>
								</div>
								<div class="breadcrumb-item active"><i class="fas fa-angle-right"></i><?=$this->lang->line('Edit profile');?>
								</div>
							</div><!-- end breadcrumb -->
						</div><!-- End column -->

					</div><!-- end row -->

					<div class="box">

						<div class="row">
							<div class="col">
								<div class="details-text">
									<h4><?=$this->lang->line('Edit profile');?></h4>
								</div><!-- end details-text -->
							</div><!-- end column -->
						</div><!-- end row -->
						<div class="hotel-listing-form">
							<form class="text-center"  action="<?=base_url("admin/profile_edit_save")?>/<?=$this->session->userdata('id');?>" method="POST">
								<div class="row">
									<div class="col-sm-8">
										<div class="form-row">
											<div class="col-md">
												<div class="form-group">
													<label for="name" class=""><?=$this->lang->line('Name');?>:</label>
													<input type="text" class="form-control" required name="name" value="<?php echo $profile_edit['name']; ?>">
												</div><!-- end form-group -->
											</div><!-- end column -->
											<div class="col-md">
												<div class="form-group">
													<label for="surname" class=""><?=$this->lang->line('Surname');?></label>
													<input type="text" class="form-control" required name="surname" value="<?php echo $profile_edit['surname']; ?>">
												</div><!-- end form-group -->
											</div><!-- end column -->
										</div><!-- end form-row -->

										<div class="form-row">
											<div class="col-md">
												<div class="form-group">
													<label for="personal_no" class=""><?=$this->lang->line('Personal No');?> :</label>
													<input type="text" class="form-control" required name="personal_no" value="<?php echo $profile_edit['personal_no']; ?>">
												</div><!-- end form-group -->
											</div><!-- end column -->
											<div class="col-md">
												<div class="form-group">
													<label for="telephone" class=""><?=$this->lang->line('Telephone');?>:</label>
													<input type="text" class="form-control" required name="telephone" value="<?php echo $profile_edit['telephone']; ?>">
												</div><!-- end form-group -->
											</div><!-- end column -->
										</div><!-- end form-row -->
										<div class="form-row">
											<div class="col-md">
												<div class="form-group">
													<label for="city" class=""><?=$this->lang->line('City');?> :</label>
													<input type="text" class="form-control" required name="city" value="<?php echo $profile_edit['city']; ?>">
												</div><!-- end form-group -->
											</div><!-- end column -->
											<div class="col-md">
												<div class="form-group">
													<label for="address" class=""><?=$this->lang->line('Address');?>:</label>
													<input type="text" class="form-control" required name="address" value="<?php echo $profile_edit['address']; ?>">
												</div><!-- end form-group -->
											</div><!-- end column -->
										</div><!-- end form-row -->

										
										<ul class="list-inline">
											<li class="list-inline-item">
												<button type="submit" class="btn"><?=$this->lang->line('Save');?></button>
											</li>
											
										</ul>
									</div><!-- end column -->
									<div class="col">
										<div class="upload-photo-wrapper">
											<div class="upload-heading">
												<h5><?=$this->lang->line('Your photo');?></h5>
											</div><!-- end upload-heading -->


											<div action="<?=base_url("admin/do_upload")?>" class="dropzone needsclick dz-clickable"
												id="demo-upload">
												<i class="fas fa-cloud-upload-alt"></i>

												<div class="dz-message">
													<p>
														<?=$this->lang->line('Drop files here or click to upload.');?>
													</p>
												</div>
											</div><!-- end dropzone -->
										</div><!-- end upload-photo-wrapper -->

									</div><!-- end column -->
								</div><!-- end row -->

							</form>
						</div><!-- end hotel-listing-form -->
					</div><!-- end box -->
				</div><!-- end in-content-wrapper -->
			</div><!-- end profile -->
		</section>
		<!-- ===========End Innerpage-wrapper============= -->

	</div><!-- end wrapper -->


