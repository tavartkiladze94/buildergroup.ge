

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
                <h2 class="content-header-title float-left mb-0"> <?php echo $satauri;?></h2>
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
  <form class="forma-content" action="<?=base_url('admin/sms_gagzavna/');?><?php echo $code;?>" method="POST" style="background:#444041!important;">
    <div class="container" >
      <h3>ახალი შეტყობინება</h3>
      <label for="enail_from"><b>გამგზავნი ელ-ფოსტა</b></label>
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

   
      <div class="content-area-wrapper container-xxl p-0" data-select2-id="11" style="border:1px solid #f1d766!important">
        
        <div class="content-right" data-select2-id="10" style="width:100%!important;">
            
   <br>
          <div class="content-wrapper container-xxl p-0" data-select2-id="9">
    
            <div class="content-body" data-select2-id="8">
          
  
               
                
<!-- Email list Area -->
<div class="email-app-list">
  <div class="app-fixed-search d-flex align-items-center">
    <div class="sidebar-toggle d-block d-lg-none ms-1">
      <font style="font-size:18px;">მენიუ</font> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu font-medium-5" style="color:black;"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
    </div>
  </div>
  
  <!-- Email list starts -->
  <div class="app-action">
    <div class="action-left">
      <div class="form-check selectAll">
        
        <label class="form-check-label fw-bolder ps-25" style="font-size:16px;">გაგზავნილი შეტყობინებები - <?php echo $gagzavnili_sms_count;?></label>
      </div>
    </div>
    
  </div>
  <div class="email-user-list ps ps--active-y">
    <ul class="email-media-list" >
        <?php if (!empty($gagzavnili_sms)) foreach ($gagzavnili_sms as $sms_item): ?>
      <li class="d-flex user-mail" >
        <div class="mail-left pe-50">
          <div class="avatar">
           <a href="<?=base_url('admin/sms_gagzavnili_sms_details/');?><?php echo $sms_item['code']; ?>"> <img src="<?=base_url();?>assets/admin/images/users/user.jpg" alt=""></a>
          </div>
        </div>
        <div class="mail-body">
          <div class="mail-details">
            <div class="mail-items">
              <h5 class="mb-25"><a href="<?=base_url('admin/sms_gagzavnili_details/');?><?php echo $sms_item['code']; ?>" style="color:black;">&#160&#160 <?php echo $sms_item['mimgebi']; ?></a></h5>
            </div>
            <div class="mail-meta-item">
              <span class="me-50 bullet bullet-danger bullet-sm"></span>
              <span class="mail-date" style="color:black;"><?php echo $sms_item['date']; ?></span>
            </div>
          </div>
          <div class="mail-message">
            <p class="mb-0 text-truncate" style="color:black;">
              &#160&#160 <?php echo $sms_item['subject']; ?>
            </p>
          </div>
        </div>
      </li>
      <?php endforeach; ?>
    </ul>
<?php if(empty($gagzavnili_sms)) echo "<div style='width:90%; margin:auto; margin-top:20px;'><h2 style='text-align:center;color:black;font-size:18px;'>შეტყობინება ვერ მოიძებნა</h2></div>";?>
    <div class="no-results">
      <h5>ვერ მოიძებნა</h5>
    </div> 
    <nav aria-label="Page navigation">
            <ul class="pagination mt-3">
             <?php echo $links;?>
            </ul>
          </nav>
 
      
          </div>
  <!-- Email list ends -->
</div>


            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Content-->

