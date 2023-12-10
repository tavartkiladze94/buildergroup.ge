

<div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
              <div class="col-12">
                <h2 class="content-header-title float-left mb-0">განსახილველი საკითხი</h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                   
                    <li class="breadcrumb-item active"><?=$this->lang->line('Create');?>
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          
        </div>
<div class="content-body"><!-- Basic Inputs start -->
<section id="basic-input" >
    <form class="text-center" action="<?=base_url('admin/problem_create')?>" method="POST">
       
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?=$this->lang->line('Create');?></h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-xl-4 col-md-6 col-12 mb-1" style="width:100%; max-width:100%;">
              <div class="form-group">
                <label for="type">ობიექტი</label>
                <select class="form-control" id="object" name="object">
												<?php if (!empty($problems_all_select)) foreach ($problems_all_select as $problems_item_select): ?>
                                               
                             <option  value="<?php echo $problems_item_select['object']; ?>" ><?=$this->lang->line($problems_item_select['object']);?></option>
                                              
                    <?php endforeach; ?>
												</select>
              </div>
            </div>
          
            <div class="col-xl-4 col-md-6 col-12">
                <div class="form-group">
											<label for="model" class="">პრობლემის დასახელება:</label>
												<input stype="text" name="title_ge" placeholder="პრობლემის  დასახელება" style="width:100%; height:40px;"required>

										</div>          
			</div>
			<br>
            <div class="col-xl-4 col-md-6 col-12">
              <div class="form-group">
											<label for="city" class="">პრობლემის აღწერა</label>
											<textarea name="text" placeholder="პრობლემის აღწერა" style="width:100%; height:200px;"></textarea>
										</div>
            </div>
    
          	
          	
        </div>
        
      </div>
    </div>
  </div>
  <button class="btn btn-primary waves-effect waves-float waves-light" type="submit"><?=$this->lang->line('Save');?></button>
  <br>
  <br>
  </form>
</section>

<!-- Dropzone section end -->

        </div>
      </div>
    </div>