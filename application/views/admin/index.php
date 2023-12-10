 


<style>

.objects
{width:20%;float:left; 
background-color:#0c2e3e;  
margin:10px 30px;
    height:267px;
}
.objects_item
{width:100%; height:180px;float:left; }
.objects:hover
{
    border:2px solid black;
    cursor:pointer;
}

@media (max-width: 992px)
  {
        .objects
        {
            width:35%;
              
             margin:20px 15px;
        }
        .objects_item
        { 
            height:140px;

        }
        .objects_item img
        {
            height:140px;
        }
 }
</style>

		

<div class="app-content content ">
      <div class="content-overlay"></div>

				<div class="in-content-wrapper">
					<div class="row no-gutters">
                        <div class="col">
							<div class="heading-messages">
								<h3>ობიექტები</h3>
							</div><!-- End heading-messages -->
						</div><!-- End column -->
					</div><!-- end row -->

				

	</div><!-- end wrapper -->
             <div style="text-align:center;">
                 <div>
                     <p style="font-size:17px;">გაუხსნელი შეტყობინება - <i class="fa fa-envelope" style="color:red!important;"></i></p> 
                     </div>
			    <br>
			    <div><p style="font-size:17px;"> დამუშავების პროცესში - <i class="fa fa-envelope" style="color:red;"></i></p> </div>
			    </div>

				<div class="in-content-wrapper" style="margin:auto;">
			<?php if (!empty($object_list)) foreach ($object_list as $object_item): ?>
			<?php $yes = "viewed_".$object_item['object']."_yes"; $no = "viewed_".$object_item['object']."_no";?>
				<div class="objects" >
				<div class="objects_item">
				     <div style="position: absolute; width:90px; height:60px; background-color:#153f53; float:left;">
				         <div style="width:50%; height:100%; float:left;text-align:center;padding-top:14px;"><a href="<?=base_url('admin/object_problems/');?><?php echo $object_item['object']; ?>"><i class="fa fa-envelope" style="color:red;"></i><sup style="font-size:23px;color:red;"><?php echo $$no; ?></sup></a></div>
				         <div style="width:50%; height:100%;float:left;text-align:center;padding-top:14px;"><a href="<?=base_url('admin/object_problems/');?><?php echo $object_item['object']; ?>"><i class="fa fa-envelope" style="color:#ff6d03;"></i><sup style="font-size:23px;color:#ff6d03;"><?php echo $$yes; ?></sup></a></div>
				     </div>
				     
				  <a href="<?=base_url('admin/object/');?><?php echo $object_item['object']; ?>"> <img  src="<?=base_url('assets/images/projects/');?><?php echo $object_item['file_name']; ?>" style="width:100%!important;height:100%;"></a>
				  
				</div>
				<div class="objects_details">
				    <a href="<?=base_url('admin/object/');?><?php echo $object_item['object']; ?>" style="text-align:center; color:white; margin-left:5px; font-size:16px;margin-top:10px;"><?php echo $this->lang->line($object_item['object']); ?> </a><br>
				    <br>
				    <a href="<?=base_url('admin/object/');?><?php echo $object_item['object']; ?>" style="color:white; font-size:15px; margin-left:5px;"><?php echo $object_item[$this->lang->line('project_address_lang')] ; ?></a>
				</div>
				</div>
        	<?php endforeach; ?>
				</div>
      </div>












