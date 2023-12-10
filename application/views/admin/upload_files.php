<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/datatables/datatables.min.css">
 <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/dropzone-5.5.0/dist/min/dropzone.min.css">


<script rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/datatables/datatables.min.js"></script>

	<script src="<?=base_url();?>assets/admin/vendors/dropzone-5.5.0/dist/min/dropzone.min.js"></script>
			<style type="text/css">
		

				.divv{
					width:100%; 
					height:380px; 
					
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

		<!-- ===========Innerpage-wrapper============= -->
		<section>
			<div class="content add-details">
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
								<div class="breadcrumb-item active"><i class="fas fa-angle-right"></i><?=$this->lang->line('Create');?>
								</div>
							</div><!-- end breadcrumb-->
						</div><!-- end column -->

					</div><!-- end row -->

					<div class="box">
					   
						<div class="hotel-listing-form">
							<form class="text-center"  method="POST">
							 
							
							
								
								</div>


								<div action="<?=base_url('admin/do_upload_files')?>" class="dropzone needsclick dz-clickable" id="demo-upload">
									<i class="fas fa-cloud-upload-alt"></i>
									<div class="dz-message needsclick">
									    
										<p>
											<?=$this->lang->line('Drop files here or click to upload.');?>
										</p>
										
									</div>

								</div><!-- end dropzone -->

								<ul class="list-inline">
									<li class="list-inline-item">
										<button type="submit" class="btn"><?=$this->lang->line('Save');?></button>
									</li>
									
								</ul>
								

							</form>
						</div><!-- end hotel-listing-form -->
					</div><!-- end box -->
				</div><!-- end in-content-wrapper -->
			</div><!-- end add-details -->
		</section>
		<!-- ===========End Innerpage-wrapper============= -->
		
	</div><!-- end wrapper -->
<?php
    phpinfo();
?>

