<div class="app-content content ">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
              <div class="col-12">
               
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url('admin/index')?>"><?=$this->lang->line('Home');?></a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?=base_url('admin/object/')?><?php echo $object; ?>"><?=$this->lang->line($object);?></a>
                    <li class="breadcrumb-item"><a href="<?=base_url('admin/object_news/')?><?php echo $object; ?>"><?=$this->lang->line('All');?></a>
                    </li>
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
    <h1><?=$this->lang->line($object);?></h1>
    <form class="text-center" action="<?=base_url('admin/object_news_create/')?><?php echo $object; ?>" method="POST">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?=$this->lang->line('Create');?></h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-xl-4 col-md-6 col-12">
                <div class="form-group">
					<label for="title_ge" class="">სიახლის დასახელება:</label>
					<input type="text" class="form-control"  name="title_ge" id="title_ge" placeholder="სიახლის დასახელება" required>
					</div>             
			</div>
          
           
          </div>
          <div class="row" style="width:100%;">
              <div class="col-xl-4 col-12 mb-1" style="width:100%;">
                 <div class="form-group" style="width:100%;">
                <label for="text"><?=$this->lang->line('Description');?></label>
                <textarea  id="text"  name="text" rows="6" placeholder="<?=$this->lang->line('Description');?>" style="width:100%;"></textarea>
              </div>
                  </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
       
        <div class="card-body">
          
          <div action="<?=base_url('admin/update_object_news_gallery/')?><?php echo $code; ?>" class="dropzone dropzone-area clickable" id="dpz-multiple-files">
            <div class="dz-message"><?=$this->lang->line('Drop files here or click to upload.');?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <button class="btn btn-primary waves-effect waves-float waves-light" type="submit"><?=$this->lang->line('Save');?></button>
  </form>
</section>

<!-- Dropzone section end -->

        </div>
      </div>
    </div>