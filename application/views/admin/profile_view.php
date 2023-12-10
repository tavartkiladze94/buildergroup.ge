<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/datatables/datatables.min.css">


<script rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/datatables/datatables.min.js"></script>


	
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
							<div class="breadcrumb-item"><i class="fas fa-angle-right"></i><a href="#"><?=$this->lang->line('Profile');?></a>
							</div>
							<div class="breadcrumb-item active"><i class="fas fa-angle-right"></i><?=$this->lang->line('View profile');?>
							</div>
						</div><!-- end breadcrumb -->
					</div><!-- End column -->

				</div><!-- end row -->
				<div class="box">
					<div class="row">
						<div class="col">
							<div class="details-text">
								<h4><?=$this->lang->line('View profile');?></h4>
							</div><!-- end details-text -->
						</div><!-- end -->
					</div><!-- end row -->

					<div class="row">
						<div class="col-sm-8">

							<div class="profile-padding">
								<div class="row">
									<div class="col-sm-6 col-5">

										<div class="heading-part">
											<p for="name"><?=$this->lang->line('Name');?>:</p>

											<p for="surname"><?=$this->lang->line('Surname');?>:</p>

											<p for="personal_no"><?=$this->lang->line('Personal No');?>:</p>
											<p for="telephone"><?=$this->lang->line('Telephone');?>:</p>
											<p for="city"><?=$this->lang->line('City');?>:</p>
											<p for="address"><?=$this->lang->line('Address');?>:</p>
											<p for="address"><?=$this->lang->line('Email');?>:</p>
											<p for="address"><?=$this->lang->line('Status');?>:</p>

										</div><!-- end heading-part -->
									</div><!-- end column -->

									<div class="col-sm-6 col-7">

										<div class="details-part">
											<p><?php if($profile['name']!="")echo $profile['name']; else { echo "<br>";} ?></p>
											<p><?php if($profile['surname']!="")echo $profile['surname']; else { echo "<br>";} ?></p>
											<p><?php if($profile['personal_no']!="")echo $profile['personal_no']; else { echo "<br>";} ?></p>
											<p><?php if($profile['telephone']!="")echo $profile['telephone']; else { echo "<br>";} ?></p>
											<p><?php if($profile['city']!="")echo $profile['city']; else { echo "<br>";} ?></p>
											<p><?php if($profile['address']!="")echo $profile['address']; else { echo "<br>";} ?></p>
											<p><?php if($profile['email']!="")echo $profile['email']; else { echo "<br>";} ?></p>
											<p><?php if($profile['status']!="")echo $profile['status']; else { echo "<br>";} ?></p>
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
								<img src="<?=base_url('uploads/users/');?><?php echo $profile['file_name']; ?>" style="width:240px; ">
								</div><!-- end dropzone -->
							</div><!-- end upload-photo-wrapper -->

						</div><!-- End column -->
					</div><!-- end row -->
				</div><!-- end box -->
			</div><!-- end view-profile -->
		</section>
		<!-- ===========End Innerpage-wrapper============= -->
		
	</div><!-- end wrapper -->
