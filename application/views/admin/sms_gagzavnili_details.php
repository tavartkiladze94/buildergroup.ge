
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

});


</script>
 
  
    
  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
      
                    
    <div class="app-content content email-application">
        <div class="content-header row">
          <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
              <div class="col-12">
                   <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url('admin/index')?>"><?=$this->lang->line('Home');?></a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?=base_url('admin/sms_gagzavnili')?>">გაგზავნილი შეყობინებები</a>
                    <li class="breadcrumb-item"><?php echo $sms_gagzavnili_details['mimgebi'];?>
                    </li>
                   
                    </li>
                  </ol>
                </div>
                <br>
                <h2 class="content-header-title float-left mb-0"> <?php echo $satauri;?></h2>
               
              </div>
            </div>
          </div>
         
        </div>
        <div id="axali_shetyobineba_forma" class="forma" style="z-index:99999; margin:auto; border:2px solid #f1d766;">
  <span id="axali_shetyobineba_close" class="close" title="Close Modal" style="color:red;">&times;</span>
  <form class="forma-content" action="<?=base_url('admin/sms_gagzavna/');?><?php echo $code;?>" method="POST" style="background:#444041!important;">
    <div class="container" >
      <h3>ახალი შეტყობინება</h3>
      <label for="email_from"><b>გამგზავნი ელ-ფოსტა</b></label>
      <input type="email" class="form-control" placeholder="email" name="email_from" id="email_from" value="<?php echo $this->session->userdata('email');?>" >
      <label for="object"><b>მიმღები ელ-ფოსტა</b></label>
    
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
          
          
          <form action="<?=base_url('admin/update_sms_gallery/');?><?php echo $code;?>" class="dropzone dropzone-area" id="dpz-btn-select-files" style="min-height:100px;max-height:140px; margin:0;">
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
          <form class="text-center" action="<?=base_url('admin/sms_all_search')?>" method="POST">
            <div class="row">
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
    <div class="email-app-menu">
        <br>
        <br>
             <div class="form-group-compose text-center compose-btn">
                <button type="button" class="compose-email btn btn-primary w-100 waves-effect waves-float waves-light" id="axali_shetyobineba">
                  ახალი წერილი
                </button>
            </div>
            <br>
  </div>
  </div>
</section>

   
<!-- Email list Area -->
<div class="email-app-list" style="border:1px solid #f1d766!important;">
   <div class="app-action">
    <div class="action-left">
      <div class="form-check selectAll">
        
        <label class="form-check-label fw-bolder ps-25" style="font-size:16px;"><b><?php echo $sms_gagzavnili_details['mimgebi'];?>  </b></label>
        <p style="font-size;14px;"><?php echo $sms_gagzavnili_details['date'];?></p>
        <p style="font-size;16px;"><?php echo $sms_gagzavnili_details['subject'];?></p>
      </div>
    </div>
    </div>
  <!-- Email list starts -->
  <div class="email-user-list ps ps--active-y">
   <div class="card-body mail-message-wrapper pt-2">
            <div class="mail-message">
             
              <p class="card-text">
               <?php echo $sms_gagzavnili_details['text'];?>
              </p>
            </div>
          </div>
         
          &#160 <p style="margin-left:3px; font-size:16px;">მიბმული ფაილები: </p>
          <?php if (!empty($gagzavnili_files)) foreach ($gagzavnili_files as $files_item): ?>
           <div style="width:100%; min-height: 70px;">
             <div style="width:75px; "> <img style="border-radius: 0; width:90px; height:60px; float:left; " src="<?=base_url();?>assets/images/<?php if($files_item['file_ext'] == '.jpg' || $files_item['file_ext']== '.jpeg' || $files_item['file_ext']=='.png') echo 'sms_gagzavnili/'.$files_item['file_name']; else{ echo strtolower($files_item['file_ext']).'.png';} ?>" alt="">
             </div>
                       <div> <h5 class="mb-25" style="color:black; margin-left:10px;"><a target="_blank" href="<?=base_url();?>assets/images/sms_gagzavnili/<?php echo $files_item['file_name']; ?>"><b style="margin-left:3px;"><?php echo $files_item['file_name']; ?></a> - <a href="<?=base_url();?>assets/images/sms_gagzavnili/<?php echo $files_item['file_name']; ?>" download style="background-color:#7367F0!important; ">ჩამოტვირთვა</a> </b></h5>  
            </div>
            </div>
          <?php endforeach; ?>
       
 
      
          </div>
  <!-- Email list ends -->
</div>


            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Content-->


