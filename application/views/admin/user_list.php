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

<script>
$(document).ready(function(){
 
    $("#example").DataTable();
});
</script>

<
		
		<section>
			<div class="content listing-content users-list">
				<div class="in-content-wrapper">
					<div class="row no-gutters">
<div class="col">
							<div class="heading-messages">
								<h3><?=$this->lang->line('Users');?></h3>
							</div><!-- End heading-messages -->
						</div><!-- End column -->
						<div class="col-md-4">
							<div class="breadcrumb">
							    <div class="breadcrumb-item active"><i class="fas fa-angle-right"></i><?=$this->lang->line('All');?>
								</div>
								<div class="breadcrumb-item"><i class="fas fa-angle-right"></i><a href="<?=base_url('admin/user_list');?>"><?=$this->lang->line('Users');?></a>
								</div>
								
							</div><!-- end breadcrumb -->
						</div><!-- End column -->
					</div><!-- end row -->

					<div class="box">
						<div class="row no-gutters">
							
							<div class="col text-right">
								<div class="tools-btns">
									<a href="#"><i class="fas fa-print" data-toggle="tooltip" data-html="true" title="" data-original-title="Print" onclick="window.print();"></i></a>
									
								</div><!-- End tool-btns-->
							</div><!-- End text-right-->

						</div><!-- end row -->
						<div class="hotel-listing-form" id="details_form">
							<form class="text-center" action="<?=base_url('admin/user_search')?>" method="POST">
							      <div class="form-row">
							       
									<div class="col-md">
										<div class="form-group">
											<input type="text" class="form-control" name="name" id="name" placeholder="<?=$this->lang->line('Name');?>">
										</div><!-- end form-group -->
									</div><!-- end column -->
									<div class="col-md">
										<div class="form-group">
											<input type="text" class="form-control" name="surname" id="surname" placeholder="<?=$this->lang->line('Surname');?>">
										</div><!-- end form-group -->
									</div><!-- end column -->
										<div class="col-md">
										<div class="form-group">
											<input type="text" class="form-control" name="city" id="city" placeholder="<?=$this->lang->line('City');?>" >
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
								<div id="example_wrapper" class="dataTables_wrapper no-footer"><div class="dataTables_length" id="example_length">
                                        <label style="font-size:16px;"><?=$this->lang->line('Result');?> - <?php if(isset($count_user)) echo $count_user; else { echo "0";} ?> 
								        </label>								    </div>
								<table id="example" class="display table-hover table-responsive-xl listing dataTable no-footer" role="grid" aria-describedby="example_info">
									<thead>
										<tr role="row">
											<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Img: activate to sort column descending" style="width: 31px;"><?=$this->lang->line('Photo');?></th>
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="First Name: activate to sort column ascending" style="width: 89px;"><?=$this->lang->line('Name');?></th>

											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending" style="width: 87px;"><?=$this->lang->line('Surname');?></th>
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending" style="width: 87px;"><?=$this->lang->line('Category');?></th>
										
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Phone #: activate to sort column ascending" style="width: 69px;"><?=$this->lang->line('Telephone');?></th>
										
											
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Phone #: activate to sort column ascending" style="width: 69px;"><?=$this->lang->line('City');?></th>
											
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 68px;"><?=$this->lang->line('Address');?></th>
											
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 181px;"><?=$this->lang->line('Status');?></th>
										
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 53px;"><?=$this->lang->line('Action');?></th></tr>
									</thead>
									<tbody>
										<?php $raod = 1; ?>
                                     <?php if (!empty($users_list_search)) foreach ($users_list_search as $users_item): ?>
										<tr>
											
											<td><img src="<?=base_url();?>uploads/users/<?php echo $users_item['file_name']; ?>" alt="table-img"
													class="img-fluid rounded-circle" width="40px" style="max-height:30px;"></td>
											
											<td><a href="<?=base_url('admin/user_view');?>/<?php echo $users_item['id']; ?>/<?php echo $users_item['name']; ?>/<?php echo $users_item['surname']; ?>"><?php echo $users_item['name']; ?></a></td>
											<td><a href="<?=base_url('admin/user_view');?>/<?php echo $users_item['id']; ?>/<?php echo $users_item['name']; ?>/<?php echo $users_item['surname']; ?>"><?php echo $users_item['surname']; ?></a></td>
											<td><?php echo $users_item['category']; ?></td>
											<td><?php echo $users_item['telephone']; ?></td>
											<td><?php echo $users_item['city']; ?></td>
											<td><?php echo $users_item['address']; ?></td>
											<td><a href="#" <?php if($users_item['status']=="Canceled") echo "style='background-color:#FFE633;'"; if($users_item['status']=="Expired") echo "style='background-color:#ff0000;'"; if($users_item['status']=="Active") echo "style='background-color:green;'";?>><?php echo $this->lang->line($users_item['status']); ?></a></td>
											<td>
												<a href="<?=base_url('admin/user_view');?>/<?php echo $users_item['id']; ?>/<?php echo $users_item['name']; ?>/<?php echo $users_item['surname']; ?>"><i class="fas fa-edit"></i></a>
												<a href="<?=base_url('admin/user_delete');?>/<?php echo $users_item['id']; ?>"><i class="fas fa-trash"></i></a>
											</td>
											
										</tr>
										<?php endforeach; ?>


									</tbody>
								</table>
							
								</div>
							</div><!-- end column -->
							<br>
							
						</div>
						<div class="center">
                             <div class="pagination">
							<?php echo $links; ?>
							</div>
							</div>
					</div><!-- end box -->
				</div><!-- end in-content-wrapper -->
			</div><!-- end users-list -->
		</section>
		
	</div><!-- end wrapper -->



