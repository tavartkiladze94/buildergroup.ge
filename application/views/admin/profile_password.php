<script rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/datatables/datatables.min.js"></script>
<!-- ===========Innerpage-wrapper============= -->
		<section>
			<div class="content add-details change-password">
				<div class="in-content-wrapper">
					<div class="row no-gutters">

						<div class="col">
							<div class="heading-messages">
								<h3><?=$this->lang->line('Profile');?></h3>
							</div> <!-- End heading-messages -->
						</div> <!-- End column -->
						<div class="col-md-4">
							<div class="breadcrumb">
								<div class="breadcrumb-item"><i class="fas fa-angle-right"></i><a href="#"><?=$this->lang->line('Profile');?></a>
								</div>
								<div class="breadcrumb-item active"><i class="fas fa-angle-right"></i><?=$this->lang->line('Change password');?>
								</div>
							</div><!-- End breadcrumb-->
						</div><!-- End column -->

					</div><!-- End row -->

					<div class="box">

						<div class="row">
							<div class="col">
								<div class="details-text">
									<h4><?=$this->lang->line('Change password');?></h4>
								</div><!-- End details-text -->
							</div><!-- End column -->
						</div><!-- End row -->
						<div class="hotel-listing-form">
							<form class="text-center" action="<?=base_url("admin/password_change")?>" method="POST">
								<div class="row">
									<div class="col">
										
                                       <div class="form-row">
											<div class="col-md">
												<div class="form-group">
													<?php if (isset($alert) && $alert): ?>
                                                        <div class="alert alert-danger" role="alert">
                                                        <?=$this->lang->line('Current password is incorrect');?>
                                                        </div>
                                                    <?php endif ?>
												</div><!-- end form-group -->
											</div><!-- End column -->
										</div><!-- End form-row -->
										<div class="form-row">
											<div class="col-md">
												<div class="form-group">
													<label for="to" class=""><?=$this->lang->line('Old password');?>:</label>
													<input type="old_password" class="form-control" required name="old_password">
												</div><!-- end form-group -->
											</div><!-- End column -->
										</div><!-- End form-row -->
										<div class="form-row">
											<div class="col-md">
												<div class="form-group">
													<label for="to1" class=""><?=$this->lang->line('New password');?>:</label>
													<input type="new_password" class="form-control" required name="new_password">
												</div><!-- end form-group -->
											</div><!-- end column -->
										</div><!-- end form-row -->
										<div class="form-row">
											<div class="col-md">
												<div class="form-group">
													<label for="to2" class=""><?=$this->lang->line('Repeat');?>:</label>
													<input type="repeat_password" class="form-control" required name="repeat_new_password">
												</div><!-- end form-group -->
											</div><!-- End column -->
										</div><!-- End form-row -->

										<ul class="list-inline">
											<li class="list-inline-item">
												<button type="submit" class="btn"><?=$this->lang->line('Update');?></button>
											</li>
										
										</ul>
									</div><!-- End column -->
								</div><!-- End row -->

							</form>
						</div><!-- End hotel-listing-form -->
					</div><!-- End Box -->
				</div><!-- End in-content-wrapper -->
			</div><!-- End change-password -->
		</section>
		<!-- ===========End Innerpage-wrapper============= -->
		
	</div><!-- end wrapper -->





