<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/datatables/datatables.min.css">
 
<script rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/vendors/datatables/datatables.min.js"></script>
<script>
$(document).ready(function(){
 
    $("#example").DataTable();
});
</script>
		<!-- ===========Innerpage-wrapper============= -->
		<
		<section>
			<div class="content listing-content">
				<div class="in-content-wrapper">
					<div class="row no-gutters">

						<div class="col">
							<div class="heading-messages">
								<h3><?=$this->lang->line('Listing');?></h3>
							</div><!-- End heading-messages -->
						</div><!-- End column -->
						<div class="col-md-4">
							<div class="breadcrumb">
								<div class="breadcrumb-item"><i class="fas fa-angle-right"></i><a href="#"><?=$this->lang->line('Apartment');?></a>
								</div>
								<div class="breadcrumb-item active"><i class="fas fa-angle-right"></i><?=$this->lang->line('All');?>
								</div>
							</div><!-- end breadcrumb -->
						</div><!-- End column -->
					</div><!-- end row -->

					<div class="box">
						<div class="row no-gutters">
							<div class="col text-left">
								<div class="add-new">
									<a href="<?=base_url('admin/apartment_create');?>"><?=$this->lang->line('Add new');?><i class="fas fa-plus"></i></a>
								</div><!-- End add-new-->
							</div><!-- End column-->
							<div class="col text-right">
								<div class="tools-btns">
									<a href="#"><i class="fas fa-print" data-toggle="tooltip" data-html="true"
											title="Print"></i></a>
									<a href="#"><i class="fas fa-file-pdf" data-toggle="tooltip" data-html="true"
											title="Pdf"></i></a>
									<a href="#"><i class="fas fa-file-excel" data-toggle="tooltip" data-html="true"
											title="Excel"></i></a>
								</div><!-- End tool-btns-->
							</div><!-- End text-right-->

						</div><!-- end row -->
						<div class="row no-gutters">
							<div class="col">
								<div id="example_wrapper" class="dataTables_wrapper no-footer"><div class="dataTables_length" id="example_length"><label><?=$this->lang->line('Show');?> <select name="example_length" aria-controls="example" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div id="example_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="example"></label></div>
								<table id="example" class="display table-hover table-responsive-xl listing dataTable no-footer" role="grid" aria-describedby="example_info">
									<thead>
										<tr role="row">
											<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Img: activate to sort column descending" style="width: 39px;"><?=$this->lang->line('Photo');?></th>
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending" style="width: 21px;"><?=$this->lang->line('Title');?></th>
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending" style="width: 50px;"><?=$this->lang->line('Category');?></th>
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="AC/Non AC: activate to sort column ascending" style="width: 103px;"><?=$this->lang->line('City');?></th>
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Meal: activate to sort column ascending" style="width: 90px;"><?=$this->lang->line('Telephone');?></th>
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Capacity: activate to sort column ascending" style="width: 83px;"><?=$this->lang->line('Code');?></th>
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 80px;"><?=$this->lang->line('Status');?></th>
										    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 66px;"><?=$this->lang->line('Date');?></th>
										    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Rent: activate to sort column ascending" style="width: 48px;"><?=$this->lang->line('Price');?></th>
									        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 64px;"><?=$this->lang->line('Action');?></th>
									</tr>
									</thead>
									<tbody>
										<?php if (!empty($user_apartments)) foreach ($user_apartments as $apartment_item): ?>
										
									<tr role="row" class="odd">
											<td class="sorting_1"><img src="<?=base_url('uploads/apartments/');?><?php echo $apartment_item['file_name']; ?>" alt="table-img" class="img-fluid rounded-circle" width="40px" style="max-height:30px;"></td>
											<td><?php echo $apartment_item['title']; ?></td>
											<td><a href="#"><?php echo $apartment_item['category']; ?></a></td>
											<td><?php echo $apartment_item['city']; ?></td>
											<td><a href="#"><?php echo $apartment_item['telephone']; ?></a></td>
											<td><?php echo $apartment_item['code']; ?></td>
											<td class="<?php echo $apartment_item['status']; ?>"><a href="#"><?php echo $apartment_item['status']; ?></a></td>
											<td><?php echo $apartment_item['date']; ?></td>
											<td><?php echo $apartment_item['price']; ?></td>
											<td>
												<a href="<?=base_url('admin/apartment_view/');?><?php echo $apartment_item['code']; ?>"><i class="fas fa-edit"></i></a>
												<a href="<?=base_url('admin/apartment_delete/');?><?php echo $apartment_item['code']; ?>"><i class="fas fa-trash-alt"></i></a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
								</table>
								<div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 10 of 36 entries</div>
								<div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
								    <a class="paginate_button previous disabled" aria-controls="example" data-dt-idx="0" tabindex="0" id="example_previous">Previous</a>
								    <span>
								        <a class="paginate_button current" aria-controls="example" data-dt-idx="1" tabindex="0">1</a>
								        <a class="paginate_button " aria-controls="example" data-dt-idx="2" tabindex="0">2</a><a class="paginate_button " aria-controls="example" data-dt-idx="3" tabindex="0">3</a>
								        <a class="paginate_button " aria-controls="example" data-dt-idx="4" tabindex="0">4</a>
								        </span>
								        <a class="paginate_button next" aria-controls="example" data-dt-idx="5" tabindex="0" id="example_next">Next</a>
								</div>
							</div>
							</div><!-- end column -->
						</div>
					</div><!-- end box -->
				</div><!-- end in-content-wrapper -->
			</div><!-- end listing-content -->
		</section>
		<!-- ===========End Innerpage-wrapper============= -->
		
	</div><!-- end wrapper -->


