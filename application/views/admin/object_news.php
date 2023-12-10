
 <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
              <div class="col-12">
                <h2 class="content-header-title float-left mb-0"><?=$this->lang->line('object_news');?></h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url('admin/index');?>"><?=$this->lang->line('Home');?></a>
                    </li>
                    </li>
                    <li class="breadcrumb-item"><a href="<?=base_url('admin/object/');?><?php echo $object; ?>"><?php  echo $this->lang->line($object); ?></a></li>
                     <li class="breadcrumb-item">უსაფრთხოება</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
         
        </div>
        <div class="content-body">


<section id="basic-datatable">
    <h1><?php  echo $this->lang->line($object); ?> </h1>
    <div class="card-datatable table-responsive pt-0">
        <div class="dt-buttons btn-group flex-wrap"><button class="btn add-new btn-primary mt-50" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-toggle="modal" data-target="#modals-slide-in"><span> <a href="<?=base_url('admin/object_news_create/');?><?php echo $object;?>" style="color:white;"><?=$this->lang->line('Add new');?></a></span></button> 
        </div>
        <br>
        <br>
    </div>
 
        
      <div class="card" style="overflow-x:scroll;">
          <h3>რაოდენობა - <?php  echo $count_object_news; ?></h3>
        <table class="datatables-basic table" style="background-color:#373335;">
          <thead >
            <tr >
              <th ><?=$this->lang->line('Title');?></th>
											<th ><?=$this->lang->line('Object');?></th>
											<th><?=$this->lang->line('Date');?></th>

											<th><?=$this->lang->line('Registrator');?></th>

            </tr>
          </thead>
          <tbody>
              <?php $r=1;?>
										<?php if (!empty($object_news)) foreach ($object_news as $object_news_item): ?>
										
									<tr role="row" class="odd" style="width:100%; height:30px;">
									    <td ><a href="<?=base_url('admin/object_news_edit/');?><?php echo $object_news_item['code']; ?>" style="color:#007bff;"><?php echo $object_news_item['title_ge']; ?></a></td>
											<td ><a href="<?=base_url('admin/object_news_edit/');?><?php echo $object_news_item['code']; ?>" style="color:#007bff;"><?php echo $this->lang->line($object_news_item['object']); ?></a></td>
											<td ><a href="<?=base_url('admin/object_news_edit/');?><?php echo $object_news_item['code']; ?>" style="color:#007bff;"><?php echo $object_news_item['date']; ?></a></td>
											<td ><a href="<?=base_url('admin/object_news_edit/');?><?php echo $object_news_item['code']; ?>" style="color:#007bff;"><?php echo $object_news_item['reg_name'] ; ?> <?php echo $object_news_item['reg_surname'] ; ?></a></td>

										</tr>
										<?php $r++;?>
									<?php endforeach; ?>
								</tbody>
        </table>
        <div class="d-flex justify-content-between mx-0 row" style="margin-top:20px;">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
            <ul class="pagination">
             <?php echo $links; ?>
                </ul></div></div></div>
      </div>
        
      
   

</section>



