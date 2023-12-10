 

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
								<h3><?=$this->lang->line('News');?></h3>
							</div><!-- End heading-messages -->
						</div><!-- End column -->
						<div class="col-md-4">
							<div class="breadcrumb">
							    <div class="breadcrumb-item active"><i class="fas fa-angle-right"></i><?=$this->lang->line('News');?>
								</div>
								<div class="breadcrumb-item"><i class="fas fa-angle-right"></i><a href="<?=base_url('admin/news');?>"><?=$this->lang->line('All');?></a>
								</div>
								
							</div><!-- end breadcrumb -->
						</div><!-- End column -->
					</div><!-- end row -->

					<div class="box" id="objects_block">
						<div class="row no-gutters">
							<div class="col text-left">
								<div class="add-new">
									<a href="<?=base_url('admin/news_create');?>"><?=$this->lang->line('Add new');?><i class="fas fa-plus"></i></a>
								</div><!-- End add-new-->
							</div><!-- End column-->
							<div class="col text-right">
								<div class="tools-btns">
									<a href="#"><i class="fas fa-print" data-toggle="tooltip" data-html="true" title="" data-original-title="Print" onclick="window.print();"></i></a>
								
								</div><!-- End tool-btns-->
							</div><!-- End text-right-->

						</div>
						<div class="row no-gutters">
							<div class="col">
								<div id="example_wrapper" class="dataTables_wrapper no-footer" style=" margin-left:10px; margin-right:10px;">
							<div class="dataTables_length" id="example_length" style="width:100%;">
								      
								<table id="example" class="display table-hover table-responsive-xl listing dataTable no-footer" role="grid" aria-describedby="example_info" >
									<thead >
										<tr role="row">
											<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Img: activate to sort column descending" style="width: 39px;"><?=$this->lang->line('Photo');?></th>
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending" ><?=$this->lang->line('Title');?></th>
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending" ><?=$this->lang->line('Date');?></th>
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending" ><?=$this->lang->line('Registrator');?></th>
											<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending" ><?=$this->lang->line('Action');?></th>
											

									</tr>
									</thead>
									<tbody>
										<?php if (!empty($news_list)) foreach ($news_list as $news_item): ?>
										
									<tr role="row" class="odd" style="width:100%; height:70px;">
											<td class="sorting_1" ><img src="<?=base_url('assetss/images/news/');?><?php echo $news_item['file_name']; ?>" alt="<?=$this->lang->line('Photo');?>" class="img-fluid rounded-circle" width="40px" style="max-height:70px;"></td>
											<td ><a href="<?=base_url('admin/news_edit/');?><?php echo $news_item['code']; ?>" style="color:#007bff;"><?php echo $news_item['title_ge']; ?></a></td>
											<td ><a href="<?=base_url('admin/news_edit/');?><?php echo $news_item['code']; ?>" style="color:#007bff;"><?php echo $news_item['date']; ?></a></td>
											<td ><a href="<?=base_url('admin/news_edit/');?><?php echo $news_item['code']; ?>" style="color:#007bff;"><?php echo $news_item['reg_name'] ; ?> <?php echo $news_item['reg_surname'] ; ?></a></td>
											<td ><a href="<?=base_url('admin/news_delete/');?><?php echo $news_item['code']; ?>" style="color:red;"><?php echo $this->lang->line('Delete') ; ?></a></td>
										
											
											
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



