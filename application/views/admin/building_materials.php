
 <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
              <div class="col-12">
                <h2 class="content-header-title float-left mb-0"><?=$this->lang->line('Building materials');?></h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url('admin/index');?>"><?=$this->lang->line('Home');?></a>
                    </li>
                    </li>
                    <li class="breadcrumb-item"><a href="<?=base_url('admin/building_materials');?>"><?=$this->lang->line('Building materials');?></a></li>
                     <li class="breadcrumb-item">უსაფრთხოება</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
         
        </div>
        <div class="content-body">


<section id="basic-datatable">
    <h1><?php  echo $this->lang->line('Building materials'); ?> </h1>

        
      <div class="card" style="overflow-x:scroll;">
          <h3>რაოდენობა - <?php  echo $count_materials; ?></h3>
        <table class="datatables-basic table" style="background-color:#373335;">
          <thead >
            <tr>
                <th>N</th>
              
				<th ><?=$this->lang->line('Material');?></th>
										

										

            </tr>
          </thead>
          <tbody>
              <?php $r=1;?>
						<?php if (!empty($materials)) foreach ($materials as $materials_item): ?>
										
									<tr role="row" class="odd" style="width:100%; height:30px;">
									    <td style="color:#f1d766!important;font-size:16px;"><?php echo $r;?></td>
									    <td ><a href="<?=base_url('admin/material_edit/');?><?php echo $materials_item['category']; ?>" style="color:#007bff;font-size:16px;"><?php echo $this->lang->line($materials_item['category']); ?></a></td>
										
										
										</tr>
										<?php $r++;?>
									<?php endforeach; ?>
								</tbody>
        </table>
        <div class="d-flex justify-content-between mx-0 row" style="margin-top:20px;">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
          </div></div></div>
      </div>
        
      
   

</section>



