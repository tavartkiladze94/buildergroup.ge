 

<script>
$(document).ready(function(){
 
    $("#example").DataTable();
});
</script>
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
<
		
		<section>
			<div class="content listing-content users-list">
				<div class="in-content-wrapper">
					<div class="row no-gutters">
                        <div class="col">
							<div class="heading-messages">
								<h3><?=$this->lang->line('construction');?></h3>
							</div><!-- End heading-messages -->
						</div><!-- End column -->
						<div class="col-md-4">
							<div class="breadcrumb">
							    <div class="breadcrumb-item active"><i class="fas fa-angle-right"></i><?=$this->lang->line('Apartment');?>
								</div>
								<div class="breadcrumb-item"><i class="fas fa-angle-right"></i><a href="<?=base_url('admin/construction');?>"><?=$this->lang->line('All');?></a>
								</div>
								
							</div><!-- end breadcrumb -->
						</div><!-- End column -->
					</div><!-- end row -->

					<div class="box" id="construction_block">
						<div class="row no-gutters">
							<div class="col text-left">
								<div class="add-new">
									<a href="<?=base_url('admin/construction_create');?>"><?=$this->lang->line('Add new');?><i class="fas fa-plus"></i></a>
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
								<div id="example_wrapper" class="dataTables_wrapper no-footer" style="overflow-x:scroll; margin-left:10px; margin-right:10px;">
							<div class="dataTables_length" id="example_length" >
								      
								<table id="example" class="display table-hover table-responsive-xl listing dataTable no-footer" role="grid" aria-describedby="example_info" >
									<thead>
										<tr role="row">
											<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Img: activate to sort column descending" style="width: 39px;"><?=$this->lang->line('Photo');?></th>
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending" style="width: 21px;"><?=$this->lang->line('Category');?></th>
										
										    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Rent: activate to sort column ascending" style="width: 48px;"><?=$this->lang->line('Price');?></th>
									        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 64px;"><?=$this->lang->line('Action');?></th>
									        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Rent: activate to sort column ascending" style="width: 48px;"><?=$this->lang->line('Duration');?></th>
									        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 64px;"><?=$this->lang->line('View');?></th>
									</tr>
									</thead>
									<tbody>
										<?php if (!empty($construction_list)) foreach ($construction_list as $apartment_item): ?>
										
									<tr role="row" class="odd">
											<td class="sorting_1"><img src="<?=base_url('uploads/construction/');?><?php echo $apartment_item['file_name']; ?>" alt="<?=$this->lang->line('Photo');?>" class="img-fluid rounded-circle" width="40px" style="max-height:30px;"></td>
											<td><a href="<?=base_url('admin/apartment_view/');?><?php echo $apartment_item['code']; ?>"><?php echo $this->lang->line($apartment_item['category']); ?></a></td>
											<td><a href="<?=base_url('admin/apartment_view/');?><?php echo $apartment_item['code']; ?>" style="color:#007bff;"><?php echo $this->lang->line($apartment_item['type']); ?></a></td>
											<td><a href="<?=base_url('admin/user_view');?>/<?php echo $apartment_item['reg_id']; ?>/<?php echo $apartment_item['reg_name']; ?>/<?php echo $apartment_item['reg_surname']; ?>" style="color:#007bff;"><?php echo $apartment_item['reg_name']; ?></a></td>
											<td><?php echo $apartment_item['city']."-".$apartment_item['address']; ?></td>
											<td><?php echo $apartment_item['telephone']; ?></td>
											<td><?php echo $apartment_item['code']; ?></td>
											<td><a href="#" <?php if($apartment_item['status']=="Canceled") echo "style='background-color:#FFE633;'"; if($apartment_item['status']=="Expired") echo "style='background-color:#ff0000;'"; if($apartment_item['status']=="Active") echo "style='background-color:green;'";?>><?php echo $this->lang->line($apartment_item['status']); ?></a></td>
											<td><?php echo $apartment_item['date']; ?></td>
											<td><?php echo $apartment_item['price']." ".$apartment_item['currency']; ?></td>
											<td>
												<a href="<?=base_url('admin/apartment_view/');?><?php echo $apartment_item['code']; ?>"><i class="fas fa-edit" style="color:#44cc5b;"></i></a>
												<!--<a href="<?=base_url('admin/apartment_delete/');?><?php echo $apartment_item['code']; ?>"><i class="fas fa-trash-alt" ></i></a>-->
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
				</div>
			</div><!-- end users-list -->
		</section>
		
	</div><!-- end wrapper -->



