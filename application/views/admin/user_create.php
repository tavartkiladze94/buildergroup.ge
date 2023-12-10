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
								<h3><?=$this->lang->line('Users');?></h3>
							</div><!-- End heading-messages -->
						</div><!-- End column -->
						<div class="col-md-4">
							<div class="breadcrumb">
								<div class="breadcrumb-item"><i class="fas fa-angle-right"></i><a href="#"><?=$this->lang->line('Users');?></a>
								</div>
								<div class="breadcrumb-item active"><i class="fas fa-angle-right"></i><?=$this->lang->line('Create');?>
								</div>
							</div><!-- end breadcrumb -->
						</div><!-- End column -->

					</div><!-- end row -->

					<div class="box">

						<div class="row">
							<div class="col">
								<div class="details-text">
									<h4><?=$this->lang->line('Create user');?></h4>
								</div><!-- end details-text -->
							</div><!-- end column -->
						</div><!-- end row -->
						<div class="hotel-listing-form">
							<form class="text-center"  action="<?=base_url("admin/user_create")?>" method="POST">
								<div class="row">
									<div class="col-sm-8">
										<div class="form-row">
											<div class="col-md">
												<div class="form-group">
													<label for="name" class=""><?=$this->lang->line('Name');?>:</label>
													<input type="text" class="form-control" required name="name" >
												</div><!-- end form-group -->
											</div><!-- end column -->
											<div class="col-md">
												<div class="form-group">
													<label for="surname" class=""><?=$this->lang->line('Surname');?></label>
													<input type="text" class="form-control" required name="surname" >
												</div><!-- end form-group -->
											</div><!-- end column -->
										</div><!-- end form-row -->

										<div class="form-row">
											<div class="col-md">
												<div class="form-group">
													<label for="personal_no" class=""><?=$this->lang->line('Personal No');?> :</label>
													<input type="text" class="form-control" required name="personal_no" >
												</div><!-- end form-group -->
											</div><!-- end column -->
											<div class="col-md">
												<div class="form-group">
													<label for="telephone" class=""><?=$this->lang->line('Telephone');?>:</label>
													<input type="text" class="form-control" required name="telephone" >
												</div><!-- end form-group -->
											</div><!-- end column -->
										</div><!-- end form-row -->
										<div class="form-row">
											<div class="col-md">
												<div class="form-group">
													<label for="city" class=""><?=$this->lang->line('City');?> :</label>
													<input type="text" class="form-control" required name="city" >
												</div><!-- end form-group -->
											</div><!-- end column -->
											<div class="col-md">
												<div class="form-group">
													<label for="email" class=""><?=$this->lang->line('Email');?>:</label>
													<input type="email" class="form-control" required name="email" >
												</div><!-- end form-group -->
											</div><!-- end column -->
										</div><!-- end form-row -->

										<div class="form-row">
											<div class="col-md">
												<div class="form-group">
													<label for="address" class=""><?=$this->lang->line('Address');?>:</label>
													<input type="text" class="form-control" required name="address" >
												</div><!-- end form-group -->
											</div><!-- end column -->
											<div class="col-md">
											<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
													<label class="input-group-text" for="category"><?=$this->lang->line('Category');?>:</label>
												</div>
												<select class="custom-select" id="category" name="category">
													<option value="user"><?=$this->lang->line('User');?></option>
													<option value="controller"><?=$this->lang->line('Controller');?></option>
													<option value="admin"><?=$this->lang->line('Admin');?></option>
												</select>
												<i class="fas fa-angle-down"></i>
											</div>
										</div>
											
										</div><!-- end form-row -->
										<div class="form-row">
											<div class="col-md">
												<div class="form-group">
													<label for="password" class=""><?=$this->lang->line('Password');?> :</label>
													<input type="text" class="form-control" required name="password" >
												</div><!-- end form-group -->
											</div><!-- end column -->
											<div class="col-md" style="visibility: hidden;">
												<div class="form-group">
													<label for="" class=""></label>
													<input type="text" class="form-control">
												</div><!-- end form-group -->
											</div><!-- end column -->
										</div><!-- end form-row -->


										
										<ul class="list-inline">
											<li class="list-inline-item">
												<button type="submit" class="btn"><?=$this->lang->line('Save');?></button>
											</li>
											
										</ul>
									</div><!-- end column -->
								</div>
									
								</div><!-- end row -->

							</form>
						</div><!-- end hotel-listing-form -->
					</div><!-- end box -->
				</div><!-- end in-content-wrapper -->
			</div><!-- end profile -->
		</section>
		<!-- ===========End Innerpage-wrapper============= -->

	</div><!-- end wrapper -->


