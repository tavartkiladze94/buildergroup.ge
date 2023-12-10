 
<!-- Email list Area -->
<div class="email-app-list">
  <div class="app-fixed-search d-flex align-items-center">
    <div class="sidebar-toggle d-block d-lg-none ms-1">
      <font style="font-size:18px;">მენიუ</font> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu font-medium-5" style="color:black;"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
    </div>
    
  </div>
  <div class="app-action">
    <div class="action-left">
      <div class="form-check selectAll">
        
        <label class="form-check-label fw-bolder ps-25" style="font-size:18px;"><b>ნაპოვნი შეტყობინებები - <?php echo $search_sms_count;?></b></label>
      </div>
    </div>
  </div>
  <!-- Email list starts -->
  <div class="email-user-list ps ps--active-y">
    <ul class="email-media-list" >
        <?php if (!empty($gagzavnili_sms)) foreach ($gagzavnili_sms as $sms_item): ?>
      <li class="d-flex user-mail" style="border-bottom:1px solid black;border-top:1px solid #f1d766;<?php if($sms_item['status'] == 0) echo'background:#605656!important;';?>">
        <div class="mail-left pe-50">
          <div class="avatar">
            <a href="<?=base_url('admin/finansebi_gagzavnili_sms_details/');?><?php echo $sms_item['code']; ?>"><img src="<?=base_url();?>assets/admin/images/users/user.jpg" alt=""></a>
          </div>
        </div>
        <div class="mail-body">
          <div class="mail-details">
            <div class="mail-items">
             <h5 class="mb-25"><a href="<?=base_url('admin/finansebi_migebuli_sms_details/');?><?php echo $sms_item['code']; ?>" style="color:black;"><?php echo $sms_item['reg_name'].' '.$sms_item['reg_surname']; ?></a></h5>
            </div>
            <div class="mail-meta-item">
                <?php if($sms_item['status'] == 0) echo'<span class="me-50 bullet bullet-danger bullet-sm"></span>';?>
              
              <span class="mail-date" style="color:#f1d766;"><?php echo $sms_item['date']; ?></span>
            </div>
          </div>
          <div class="mail-message">
            <p class="mb-0 text-truncate" style="color:black;">
              <?php echo $sms_item['subject']; ?>
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

