

<style>
    label, input, textarea, th
    {
        color:black;
    }
    .list-group span, .list-group svg, .mb-25
    {
        color:black;
    }
    #compose_close:hover
    {
        cursor:pointer;
    }
    .text-muted
    {
        color:black!important;
    }
.dropzone .dz-preview
{
    margin:0;
}
/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* The Modal (background) */
.forma {
  display: none; /* Hidden by default */
  z-index: 1; /* Sit on top */
 position: fixed;
  width: 60%; /* Full width */
  height: auto; /* Full height */
  background-color: silver;
  margin:auto;
  bottom:0;
  right:0;
}

/* Modal Content/Box */
.forma-content {
  background-color: #fefefe;
  border: 1px solid #888;
  width: 100%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color:red;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
.dropzone .dz-preview .dz-image {
    width:85px;
    height: 65px;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 992px) {
  .forma {
     width: 98%;
     margin:auto;
  }
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>


$(document).ready(function(){
    $("li.page-item a").addClass("page-link");
  $("#axali_shetyobineba").click(function(){
      $("#axali_shetyobineba_forma").toggle();
  });
 $("#axali_shetyobineba_close").click(function(){
      $("#axali_shetyobineba_forma").toggle();
  });
  $("#mimgebi").change(function() {
  var id = $(this).children(":selected").attr("id");
  document.getElementById("email").value = id;
});

});


</script>
 
  
    
  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
      
                    
    <div class="app-content content email-application">
        <div class="content-header row">
          <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
              <div class="col-12">
                <h2 class="content-header-title float-left mb-0"><?php echo $satauri;?></h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                   
                  </ol>
                </div>
              </div>
            </div>
          </div>
         
        </div>
        <div id="axali_shetyobineba_forma" class="forma" style="z-index:99999; margin:auto; border:2px solid #f1d766;">
  <span id="axali_shetyobineba_close" class="close" title="Close Modal" style="color:red;">&times;</span>
  <form class="forma-content" action="<?=base_url('admin/finansebis_sms_gagzavna/');?><?php echo $code;?>" method="POST" style="background:#444041!important;">
    <div class="container" >
      <h3>ახალი შეტყობინება</h3>
      <label for="object"><b>მიმღები</b></label>
       <select class="form-control" id="mimgebi" name="mimgebi" id="mimgebi" style="max-height:300px;"  requred >
                      <option value=""></option>
                <?php if (!empty($finansebi_users_all_select)) foreach ($finansebi_users_all_select as $users_item_select): ?>
                                               
                             <option  value="<?php echo $users_item_select['name'].'-'.$users_item_select['surname']; ?>" id="<?php echo $users_item_select['email'];?>"><?php echo $users_item_select['name'].' '.$users_item_select['surname'];?></option>                                              
                    <?php endforeach; ?>
              </select>
      <label for="email"><b>ელ-ფოსტა</b></label>
      <input type="email" class="form-control" placeholder="email" name="email" id="email" >
      <label for="subject"><b>თემა</b></label>
      <input type="text" class="form-control" placeholder="თემა" name="subject" >
      <br>
      <textarea name="text" style="width:100%; height:100px;" placeholder="შეტყობინება"></textarea>
      

     
      
      <div class="clearfix">
          <button  class="compose-email btn btn-primary w-100 waves-effect waves-float waves-light" style="max-width:150px;" type="submit">
        გაგზავნა
      </button>
        <div class="btn-group dropup me-1">
                <p id="select-files" class="btn btn-outline-primary mb-1 waves-effect dz-clickable"  style="max-height:30px;padding:0;">ფაილები
          </p>
               
               
              </div>
      </div>
    </div>
  </form>
  <div class="card" style="height:140px; padding:0;margin:0;">
        
        <div class="card-body" style="padding:2px; margin:0;">
          
          
          <form action="<?=base_url('admin/update_finansebi_gallery/');?><?php echo $code;?>" class="dropzone dropzone-area" id="dpz-btn-select-files" style="min-height:100px;max-height:140px; margin:0;">
            <div class="dz-message" style="min-height:100px;max-height:140px;"></div>
          </form>
        </div>
      </div>
</div>

<section id="advanced-search-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card" style="margin-bottom:0;">
        <div class="card-header border-bottom">
          <h4 class="card-title"><?=$this->lang->line('Filter');?></h4>
        </div>
        <!--Search Form -->
        <div class="card-body mt-2">
          <form class="text-center" action="<?=base_url('admin/finansebi_all_search')?>" method="POST">
            <div class="row">

         <div class="col-xl-4 col-md-6 col-12 mb-1">
              <div class="form-group">
                
                 <label for="type">კატეგორია :</label>
                 <select class="form-control" id="category" name="category" >
                                              
                                               <option  value="mimgebi">შემოსული შეტყობინებები</option>
                                               <option  value="gamgzavni">გასული შეტყობინებები</option>
                                              
            </select>
              </div>
            </div>
             <div class="col-xl-4 col-md-6 col-12 mb-1">
              <div class="form-group">
                
                 <label for="status"><?=$this->lang->line('Status');?> :</label>
                 <select class="form-control" id="status" name="status" >
                                               <option  value="">ნებისმიერი</option>
                                               <option  value="1">წაკითხული</option>
                                               <option  value="0">წაუკითხავი</option>
                                              
            </select>
              </div>
            </div>
            <div class="col-md-6 mb-1" style="width:100%;">
          <input type="text" class="form-control flatpickr-disabled-range flatpickr-input" style="width:150px;  float:left; background:white;" placeholder="საიდან" id="from" name="from" value="საიდან" readonly="readonly">
          
          <input type="text" class="form-control flatpickr-disabled-range flatpickr-input" style="width:150px; background:white; float:left; " placeholder="სადამდე" id="to" name="to" value="სადამდე" readonly="readonly">
        </div>
          
              
          </div>  
             <button class="dt-button create-new btn btn-primary waves-effect waves-float waves-light" style=" margin-left:20px;width:120px;" type="submit"><?=$this->lang->line('Search');?></span></button>
         
          </form>
        </div>

      </div>
    </div>
  </div>
</section>
<div class="content-overlay"></div>
      
      <div class="content-area-wrapper container-xxl p-0" data-select2-id="11" style="border:1px solid #f1d766!important">
        <div class="sidebar-left">
          <div class="sidebar">
              <div class="sidebar-content email-app-sidebar"  style="background:#373334!important;">
        <div class="email-app-menu">
              <div class="form-group-compose text-center compose-btn">
                <button type="button" class="compose-email btn btn-primary w-100 waves-effect waves-float waves-light" id="axali_shetyobineba">
                  ახალი წერილი
                </button>
                
    </div>
    <div class="sidebar-menu-list ps ps--active-y">
      <div class="list-group list-group-messages">
        <a href="<?=base_url('admin/finansebi_migebuli');?>" class="list-group-item list-group-item-action" style="background:#373334!important;">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail font-medium-3 me-50"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
          <span class="align-middle">შემოსული</span>
          <span class="badge badge-light-primary rounded-pill float-end" style="color:#f1d766!important;"><?php echo $migebuli_sms_count;?></span>
        </a>
        <a href="<?=base_url('admin/finansebi_gagzavnili');?>" class="list-group-item list-group-item-action" style="background:#373334!important;">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send font-medium-3 me-50"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
          <span class="align-middle">გაგზავნილი</span>
          <span class="badge badge-light-primary rounded-pill float-end" style="color:#f1d766!important;"><?php echo $gagzavnili_sms_count;?></span>
        </a>
        <a href="<?=base_url('admin/finansebi_files');?>" class="list-group-item list-group-item-action" style="background:#373334!important;">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 font-medium-3 me-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
          <span class="align-middle">ყველა ფაილი</span>
          <span class="badge badge-light-warning rounded-pill float-end"><span class="badge badge-light-primary rounded-pill float-end" style="color:#f1d766!important;"><?php echo $files_count;?></span></span>
        </a>
       
       
      </div>
      <!-- <hr /> -->
      
   
        <div class="ps__rail-y" style="top: 0px; right: 0px; height: 382px;">
        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 326px;">
            
        </div>
        </div>
        </div>
  </div>
</div>

          </div>
        </div>
        <div class="content-right" data-select2-id="10">
          <div class="content-wrapper container-xxl p-0" data-select2-id="9">
            <div class="content-header row">
            </div>
            <div class="content-body" data-select2-id="8">
          
  
                <div class="body-content-overlay"></div>
                