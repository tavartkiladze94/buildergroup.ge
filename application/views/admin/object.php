<style>

.objects
{width:400px;
    float:left; 
    background-color:#0c2e3e;  
    height:267px;
    text-align:center;
    border:1px solid #f1d766;
    margin-left:3px;
}
.objects:hover
{
    border:3px solid #f1d766;
}

@media (max-width: 992px)
  {
        .objects
        {
            width:150px;
            height:120px;
          
        }
       
 }
</style>

 <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
              <div class="col-12">
                <h2 class="content-header-title float-left mb-0"><?=$this->lang->line('Problems');?></h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url('admin/index');?>"><?=$this->lang->line('Home');?></a>
                    </li>
                   
                    <li class="breadcrumb-item"><?php  echo $this->lang->line($object); ?></li>
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
       
        <br>
        <br>
        <br>
        <div class="objects" >
			
				    <a href="<?=base_url('admin/object_news/');?><?php echo $object;?>"><img src="<?=base_url();?>assets/images/news.png" style="width:100%; "/></a>
				</div>
				 <div class="objects" >
			
				   <a href="<?=base_url('admin/object_problems/');?><?php echo $object;?>"> <img src="<?=base_url();?>assets/images/secure.png" style="width:100%; "/></a>
				</div>
    </div>
 

</section>



