
<!DOCTYPE html>
<html  lang="en" >
  <!-- BEGIN: Head-->
  <head>
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title><?=$this->lang->line('Control panel');?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="BESTBUILDING.GE">
    <meta name="keywords" content="">
    <meta name="author" content="Nika Tavartkiladze">
   

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
     <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/katex.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/select2.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Inconsolata&amp;family=Roboto+Slab&amp;family=Slabo+27px&amp;family=Sofia&amp;family=Ubuntu+Mono&amp;display=swap">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/bordered-layout.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/semi-dark-layout.min.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/form-quill-editor.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/ext-component-toastr.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/app-email.min.css">
    

    <!-- BEGIN: Theme CSS-->
    <!-- BEGIN: Page CSS-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
   
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#compose_button").click(function(){
      $(".modal-backdrop").toggle();
    $("#compose-mail").toggle();
  });
  $(".modal-backdrop").click(function(){
      $("#compose-mail").toggle();
      $(".modal-backdrop").toggle();
    
  });
  $("#compose_close").click(function(){
      $("#compose-mail").toggle();
      $(".modal-backdrop").toggle();
    
  });
});
</script>
 
  </head>
  <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="" style="color:black;" >

    <!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow" style="background-color:#10163A; margin-top:0;">
      <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
          <ul class="nav navbar-nav d-xl-none">
            <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
          </ul>
         
         
        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">
          <!--<li class="nav-item dropdown dropdown-language"><a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language"><?=$this->lang->line('lang');?></span></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="<?=base_url('admin/setLanguage/ge/');?><?php echo $this->uri->segment(2); ?>/<?php if($this->uri->segment(3) !== FALSE) echo $this->uri->segment(3); ?>/<?php if($this->uri->segment(4) !== FALSE) echo $this->uri->segment(4); ?>/<?php if($this->uri->segment(5) !== FALSE) echo $this->uri->segment(5); ?>/<?php if($this->uri->segment(6) !== FALSE) echo $this->uri->segment(6); ?>/<?php if($this->uri->segment(7) !== FALSE) echo $this->uri->segment(7); ?>" data-language="en"><i class="flag-icon flag-icon-us"></i> <?=$this->lang->line('Georgian');?></a>
              <a class="dropdown-item" href="<?=base_url('admin/setLanguage/ru/');?><?php echo $this->uri->segment(2); ?>/<?php if($this->uri->segment(3) !== FALSE) echo $this->uri->segment(3); ?>/<?php if($this->uri->segment(4) !== FALSE) echo $this->uri->segment(4); ?>/<?php if($this->uri->segment(5) !== FALSE) echo $this->uri->segment(5); ?>/<?php if($this->uri->segment(6) !== FALSE) echo $this->uri->segment(6); ?>/<?php if($this->uri->segment(7) !== FALSE) echo $this->uri->segment(7); ?>" data-language="fr"><i class="flag-icon flag-icon-fr"></i><?=$this->lang->line('Russian');?></a>
              <a class="dropdown-item" href="<?=base_url('admin/setLanguage/en/');?><?php echo $this->uri->segment(2); ?>/<?php if($this->uri->segment(3) !== FALSE) echo $this->uri->segment(3); ?>/<?php if($this->uri->segment(4) !== FALSE) echo $this->uri->segment(4); ?>/<?php if($this->uri->segment(5) !== FALSE) echo $this->uri->segment(5); ?>/<?php if($this->uri->segment(6) !== FALSE) echo $this->uri->segment(6); ?>/<?php if($this->uri->segment(7) !== FALSE) echo $this->uri->segment(7); ?>" data-language="de"><i class="flag-icon flag-icon-de"></i> <?=$this->lang->line('English');?></a></div>
          </li>-->
          <li class="nav-item dropdown dropdown-notification mr-25"><a class="nav-link" href="javascript:void(0);" data-toggle="dropdown"><i class="fa fa-bell" style="color:white; font-size:17px;"></i><span class="badge badge-pill badge-danger badge-up">5</span></a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <div class="dropdown-header d-flex">
                  <h4 class="notification-title mb-0 mr-auto">Notifications</h4>
                  <div class="badge badge-pill badge-light-primary">6 New</div>
                </div>
              </li>
              <li class="scrollable-container media-list"><a class="d-flex" href="javascript:void(0)">
                  <div class="media d-flex align-items-start">
                    <div class="media-left">
                      <div class="avatar"><img src="../../../app-assets/images/portrait/small/avatar-s-15.jpg" alt="avatar" width="32" height="32"></div>
                    </div>
                    <div class="media-body">
                      <p class="media-heading"><span class="font-weight-bolder">Congratulation Sam 🎉</span>winner!</p><small class="notification-text"> Won the monthly best seller badge.</small>
                    </div>
                  </div></a><a class="d-flex" href="javascript:void(0)">
                  <div class="media d-flex align-items-start">
                    <div class="media-left">
                      <div class="avatar"><img src="../../../app-assets/images/portrait/small/avatar-s-3.jpg" alt="avatar" width="32" height="32"></div>
                    </div>
                    <div class="media-body">
                      <p class="media-heading"><span class="font-weight-bolder">New message</span>&nbsp;received</p><small class="notification-text"> You have 10 unread messages</small>
                    </div>
                  </div></a><a class="d-flex" href="javascript:void(0)">
                  <div class="media d-flex align-items-start">
                    <div class="media-left">
                      <div class="avatar bg-light-danger">
                        <div class="avatar-content">MD</div>
                      </div>
                    </div>
                    <div class="media-body">
                      <p class="media-heading"><span class="font-weight-bolder">Revised Order 👋</span>&nbsp;checkout</p><small class="notification-text"> MD Inc. order updated</small>
                    </div>
                  </div></a>
                <div class="media d-flex align-items-center">
                  <h6 class="font-weight-bolder mr-auto mb-0">System Notifications</h6>
                  <div class="custom-control custom-control-primary custom-switch">
                    <input class="custom-control-input" id="systemNotification" type="checkbox" checked="">
                    <label class="custom-control-label" for="systemNotification"></label>
                  </div>
                </div><a class="d-flex" href="javascript:void(0)">
                  <div class="media d-flex align-items-start">
                    <div class="media-left">
                      <div class="avatar bg-light-danger">
                        <div class="avatar-content"><i class="avatar-icon" data-feather="x"></i></div>
                      </div>
                    </div>
                    <div class="media-body">
                      <p class="media-heading"><span class="font-weight-bolder">Server down</span>&nbsp;registered</p><small class="notification-text"> USA Server is down due to hight CPU usage</small>
                    </div>
                  </div></a><a class="d-flex" href="javascript:void(0)">
                  <div class="media d-flex align-items-start">
                    <div class="media-left">
                      <div class="avatar bg-light-success">
                        <div class="avatar-content"><i class="avatar-icon" data-feather="check"></i></div>
                      </div>
                    </div>
                    <div class="media-body">
                      <p class="media-heading"><span class="font-weight-bolder">Sales report</span>&nbsp;generated</p><small class="notification-text"> Last month sales report generated</small>
                    </div>
                  </div></a><a class="d-flex" href="javascript:void(0)">
                  <div class="media d-flex align-items-start">
                    <div class="media-left">
                      <div class="avatar bg-light-warning">
                        <div class="avatar-content"><i class="avatar-icon" data-feather="alert-triangle"></i></div>
                      </div>
                    </div>
                    <div class="media-body">
                      <p class="media-heading"><span class="font-weight-bolder">High memory</span>&nbsp;usage</p><small class="notification-text"> BLR Server using high memory</small>
                    </div>
                  </div></a>
              </li>
              <li class="dropdown-menu-footer"><a class="btn btn-primary btn-block" href="javascript:void(0)">ყველა შეტყობინების ნახვა</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown dropdown-notification mr-25"><a class="nav-link" href="javascript:void(0);" data-toggle="dropdown"><i class="fa fa-envelope" style="color:white; font-size:17px;"></i><span class="badge badge-pill badge-danger badge-up" id="msg">9</span></a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <div class="dropdown-header d-flex">
                  <h4 class="notification-title mb-0 mr-auto" style="color:white;"><?=$this->lang->line('Messages');?></h4>
                </div>
              </li>
              <li class="scrollable-container media-list"><a class="d-flex" href="javascript:void(0)">
                  <div class="media d-flex align-items-start">
                    <div class="media-left">
                      <div class="avatar"><img src="../../../app-assets/images/portrait/small/avatar-s-3.jpg" width="32" height="32"></div>
                    </div>
                    <div class="media-body">
                      <p class="media-heading"><span class="font-weight-bolder">ახალი შეტყობინება</span></p><small class="notification-text"> თქვენ გაქვთ 1 შეტყობინება</small>
                    </div>
                  </div></a><a class="d-flex" href="javascript:void(0)">
                 
              </li>
              <li class="dropdown-menu-footer"><a class="btn btn-primary btn-block" href="javascript:void(0)">ყველა შეტყობინების ნახვა</a></li>
            </ul>
          </li>
          
          <li class="nav-item dropdown dropdown-user" ><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder"><?php echo $this->session->userdata('name'); ?></span><span class="user-status"><?php echo $this->session->userdata('category'); ?></span></div><span class="avatar">
                  <img class="round" src="<?=base_url();?>assets/admin/images/users/user.jpg"  height="40" width="40"><span class="avatar-status-online"></span></span></a>
          </li>
        </ul>
      </div>
    </nav>
  
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true" >
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><a class="navbar-brand" href="<?=base_url('main/index');?>">
              <h2 class="brand-text" style="color:white;">ISHOVE.GE</h2></a></li>
          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
      </div>
      <div class="main-menu-content" >
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

          <li class=" nav-item"><a class="d-flex align-items-center" href="<?=base_url('admin/index');?>"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">მთავარზე გადასვლა</span></a>
           
          </li>
          <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">სამუშაო გარემო</span><i data-feather="more-horizontal"></i>
          </li>
          
         <li><a class="d-flex align-items-center" href="<?=base_url('admin/finansebi');?>"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span class="menu-item text-truncate" data-i18n="Profile">ფინანსური საკითხები</span></a>
              </li>
        <li><a class="d-flex align-items-center" href="<?=base_url('admin/iuristebi');?>"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span class="menu-item text-truncate" data-i18n="Profile">იურიდიული საკითხები</span></a>
              </li>
        <li><a class="d-flex align-items-center" href="page-profile.html"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span class="menu-item text-truncate" data-i18n="Profile">ობიექტები</span></a>
              </li>
       <li><a class="d-flex align-items-center" href="<?=base_url('admin/problems_all');?>"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span class="menu-item text-truncate" data-i18n="Profile">უსაფრთხოება</span></a>
              </li>
        </ul>
      </div>
    </div>
    
    
  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->

    <div class="app-content content email-application">
        <section id="advanced-search-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header border-bottom">
          <h4 class="card-title"><?=$this->lang->line('Filter');?></h4>
        </div>
        <!--Search Form -->
        <div class="card-body mt-2">
          <form class="text-center" action="<?=base_url('admin/iuristebi_all_search')?>" method="POST">
            <div class="row">

            <div class="col-xl-4 col-md-6 col-12 mb-1">
              <div class="form-group">
                <label for="type">ორგანიზაცია :</label>
                 <select class="form-control" id="object" name="object" >
                     <option  value="0" id="charity"><?=$this->lang->line('Any');?></option>
                     <?php if (!empty($iuristebi_users_all_select)) foreach ($iuristebi_users_all_select as $problems_item_select): ?>
                                               
                             <option  value="<?php echo $problems_item_select['company']; ?>" ><?php echo $problems_item_select['company'];?></option>
                                              
                    <?php endforeach; ?>
                                              
            </select>
              </div>
            </div>
             <div class="col-xl-4 col-md-6 col-12 mb-1">
              <div class="form-group">
                
                 <label for="type"><?=$this->lang->line('Status');?> :</label>
                 <select class="form-control" id="read" name="read" >
                                               <option  value="" id="charity"><?=$this->lang->line('Any');?></option>
                                               <option  value="1" >წაკითხული</option>
                                               <option  value="0" >წაუკითხავი</option>
                                              
            </select>
              </div>
            </div>
            
          
              
          </div>  
             <button class="dt-button create-new btn btn-primary waves-effect waves-float waves-light" style="height:40px; margin-top:25px; margin-left:20px;width:120px;" type="submit"><?=$this->lang->line('Search');?></span></button>
         
          </form>
        </div>
        <hr class="my-0">
        
      </div>
    </div>
  </div>
</section>
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-area-wrapper container-xxl p-0" data-select2-id="11">
        <div class="sidebar-left">
          <div class="sidebar"><div class="sidebar-content email-app-sidebar">
  <div class="email-app-menu">
    <div class="form-group-compose text-center compose-btn">
      <button type="button" class="compose-email btn btn-primary w-100 waves-effect waves-float waves-light" data-bs-backdrop="false" data-bs-toggle="modal" data-bs-target="#compose-mail" id="compose_button">
        ახალი წერილი
      </button>
    </div>
    <div class="sidebar-menu-list ps ps--active-y">
      <div class="list-group list-group-messages">
        <a href="#" class="list-group-item list-group-item-action">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail font-medium-3 me-50"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
          <span class="align-middle">შემოსული</span>
          <span class="badge badge-light-primary rounded-pill float-end">3</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send font-medium-3 me-50"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
          <span class="align-middle">გაგზავნილი</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 font-medium-3 me-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
          <span class="align-middle">ყველა ფაილი</span>
          <span class="badge badge-light-warning rounded-pill float-end">2</span>
        </a>
       
        <a href="#" class="list-group-item list-group-item-action active">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash font-medium-3 me-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
          <span class="align-middle">წაშლილები</span>
        </a>
      </div>
      <!-- <hr /> -->
      
     
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px; height: 382px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 326px;"></div></div></div>
  </div>
</div>

          </div>
        </div>
        <div class="content-right" data-select2-id="10">
          <div class="content-wrapper container-xxl p-0" data-select2-id="9">
            <div class="content-header row">
            </div>
            <div class="content-body" data-select2-id="8">
               <!-- <div class="row">
    <div class="col-12">
      <div class="card">
        
        <div class="card-body">
         
          
          <form action="<?=base_url('admin/update_iuristebi_gallery');?>" class="dropzone dropzone-area" id="dpz-btn-select-files">
            <div class="dz-message">Drop files here or click button to upload.</div>
          </form>
          <button id="select-files" class="btn btn-outline-primary mb-1 waves-effect dz-clickable">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
            <polyline points="13 2 13 9 20 9"></polyline></svg> Click me to select files
          </button>
        </div>
      </div>
    </div>
  </div> -->
                <div class="body-content-overlay"></div>
<!-- Email list Area -->
<div class="email-app-list">
  <!-- Email search starts -->
 

  <!-- Email list starts -->
  <div class="email-user-list ps ps--active-y">
    <ul class="email-media-list">
      <li class="d-flex user-mail">
        <div class="mail-left pe-50">
          <div class="avatar">
            <img src="<?=base_url();?>assets/admin/images/users/user.jpg" alt="">
          </div>
          <div class="user-action">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="customCheck2">
              <label class="form-check-label" for="customCheck2"></label>
            </div>
            <span class="email-favorite"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span>
          </div>
        </div>
        <div class="mail-body">
          <div class="mail-details">
            <div class="mail-items">
              <h5 class="mb-25">ირაკლი გოგიტიძე</h5>
              <span class="text-truncate" style="color:black;">ika-ika8@mail.ru</span>
            </div>
            <div class="mail-meta-item">
              <span class="me-50 bullet bullet-danger bullet-sm"></span>
              <span class="mail-date" style="color:black;">2:15 AM</span>
            </div>
          </div>
          <div class="mail-message">
            <p class="mb-0 text-truncate">
              გამარჯობა. მჭირდება დამარება
            </p>
          </div>
        </div>
      </li>
    </ul>
    <div class="no-results">
      <h5>ვერ მოიძებნა</h5>
    </div>
  <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 717px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 247px;"></div></div></div>
  <!-- Email list ends -->
</div>
<!--/ Email list Area -->
<!-- Detailed Email View -->
<div class="email-app-details">
  <!-- Detailed Email Header starts -->
  <div class="email-detail-header">
    <div class="email-header-left d-flex align-items-center">
      <span class="go-back me-1"><svg style="color:black;" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left font-medium-4"><polyline points="15 18 9 12 15 6"></polyline></svg></span>
      <h4 class="email-subject mb-0">ირაკლი გოგოტიძე </h4>
    </div>
    <div class="email-header-right ms-2 ps-1">
      <ul class="list-inline m-0">
        <li class="list-inline-item">
          <span class="action-icon favorite"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star font-medium-2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span>
        </li>
        <li class="list-inline-item">
          <div class="dropdown no-arrow">
            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder font-medium-2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
            </a>
            <div class="dropdown-menu" aria-labelledby="folder">
              <a class="dropdown-item d-flex align-items-center" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 font-medium-3 me-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                <span>Draft</span>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info font-medium-3 me-50"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                <span>Spam</span>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash font-medium-3 me-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                <span>Trash</span>
              </a>
            </div>
          </div>
        </li>
       
        <li class="list-inline-item">
          <span class="action-icon"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail font-medium-2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></span>
        </li>
        <li class="list-inline-item">
          <span class="action-icon"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash font-medium-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></span>
        </li>
        <li class="list-inline-item email-prev">
          <span class="action-icon"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left font-medium-2"><polyline points="15 18 9 12 15 6"></polyline></svg></span>
        </li>
        <li class="list-inline-item email-next">
          <span class="action-icon"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right font-medium-2"><polyline points="9 18 15 12 9 6"></polyline></svg></span>
        </li>
      </ul>
    </div>
  </div>
  <!-- Detailed Email Header ends -->

  <!-- Detailed Email Content starts -->
  <div class="email-scroll-area ps ps--active-y">
    <div class="row">
      <div class="col-12">
        <div class="email-label">
          <span class="mail-label badge rounded-pill badge-light-primary">ბესთბილდინგ</span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header email-detail-head">
            <div class="user-details d-flex justify-content-between align-items-center flex-wrap">
              <div class="avatar me-75">
                <img src="../../../app-assets/images/portrait/small/avatar-s-9.jpg" alt="avatar img holder" width="48" height="48">
              </div>
              <div class="mail-items">
                <h5 class="mb-0">Carlos Williamson</h5>
                <div class="email-info-dropup dropdown">
                  <span role="button" class="dropdown-toggle font-small-3 text-muted" id="card_top01" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    carlos@gmail.com
                  </span>
                  <div class="dropdown-menu" aria-labelledby="card_top01">
                    <table class="table table-sm table-borderless">
                      <tbody>
                        <tr>
                          <td class="text-end">From:</td>
                          <td>carlos@gmail.com</td>
                        </tr>
                        <tr>
                          <td class="text-end">To:</td>
                          <td>johndoe@ow.ly</td>
                        </tr>
                        <tr>
                          <td class="text-end">Date:</td>
                          <td>14:58, 29 Aug 2020</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="mail-meta-item d-flex align-items-center">
              <small class="mail-date-time text-muted">29 Aug, 2020, 14:58</small>
              <div class="dropdown ms-50">
                <div role="button" class="dropdown-toggle hide-arrow" id="email_more" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-medium-2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                </div>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="email_more">
                  <div class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left me-50"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>Reply</div>
                  <div class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right me-50"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>Forward</div>
                  <div class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 me-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>Delete</div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body mail-message-wrapper pt-2">
            <div class="mail-message">
             
              <p class="card-text">
                შეტყობინების ტექსტი
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header email-detail-head">
            <div class="user-details d-flex justify-content-between align-items-center flex-wrap">
              <div class="avatar me-75">
                <img src="../../../app-assets/images/portrait/small/avatar-s-18.jpg" alt="avatar img holder" width="48" height="48">
              </div>
              <div class="mail-items">
                <h5 class="mb-0">Ardis Balderson</h5>
                <div class="email-info-dropup dropdown">
                  <span role="button" class="dropdown-toggle font-small-3 text-muted" id="dropdownMenuButton200" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    abaldersong@utexas.edu
                  </span>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton200">
                    <table class="table table-sm table-borderless">
                      <tbody>
                        <tr>
                          <td class="text-end">From:</td>
                          <td>abaldersong@utexas.edu</td>
                        </tr>
                        <tr>
                          <td class="text-end">To:</td>
                          <td>johndoe@ow.ly</td>
                        </tr>
                        <tr>
                          <td class="text-end">Date:</td>
                          <td>4:25 AM 13 Jan 2018</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="mail-meta-item d-flex align-items-center">
              <small class="mail-date-time text-muted">17 May, 2020, 4:14</small>
              <div class="dropdown ms-50">
                <div role="button" class="dropdown-toggle hide-arrow" id="email_more_2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-medium-2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                </div>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="email_more_2">
                  <div class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left me-50"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>Reply</div>
                  <div class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right me-50"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>Forward</div>
                  <div class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 me-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>Delete</div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body mail-message-wrapper pt-2">
            <div class="mail-message">
             
              <p class="card-text">
               პასუხის ტექსტი
              </p>
             
            </div>
          </div>
          <div class="card-footer">
            <div class="mail-attachments">
              <div class="d-flex align-items-center mb-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip font-medium-1 me-50"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg>
                <h5 class="fw-bolder text-body mb-0">2 მიბმული ფაილი</h5>
              </div>
              <div class="d-flex flex-column">
                <a href="#" class="mb-50">
                  <img src="../../../app-assets/images/icons/doc.png" class="me-25" alt="png" height="18">
                  <small class="text-muted fw-bolder">interdum.docx</small>
                </a>
                <a href="#">
                  <img src="../../../app-assets/images/icons/jpg.png" class="me-25" alt="png" height="18">
                  <small class="text-muted fw-bolder">image.png</small>
                </a>
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
            <div class="d-flex justify-content-between">
              <h5 class="mb-0">
                დააჭირეთ აქ
                <a href="#"> პასუხი</a>
                or
                <a href="#">გადაგზავნა</a>
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  <div class="ps__rail-x" style="left: 0px; bottom: -78px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 78px; height: 742px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 71px; height: 671px;"></div></div></div>
  <!-- Detailed Email Content ends -->
</div>
<!--/ Detailed Email View -->

<!-- compose email -->
<div class="modal modal-sticky" id="compose-mail" data-bs-keyboard="false" style="display: none; z-index:999999;" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content p-0" style="border: 1px solid black;">
      <div class="modal-header">
        <h5 class="modal-title">ახალი შეტყობინება</h5>
        <div class="modal-actions">
         <p id="compose_close">X</p>
        </div>
      </div>
      <div class="modal-body flex-grow-1 p-0">
        <form class="compose-form">
          <div class="compose-mail-form-field select2-primary" data-select2-id="7">
            <label for="email-to" class="form-label">ვის:  &#160 </label>
            <div class="flex-grow-1" data-select2-id="6">
              <div class="position-relative" data-select2-id="5">
                  <select class="form-control" id="object" name="object" style="max-height:300px; over">
                      <option></option>
                <?php if (!empty($iuristebi_users_all_select)) foreach ($iuristebi_users_all_select as $users_item_select): ?>
                                               
                             <option  value="<?php echo $users_item_select['code']; ?>" style="height:20px;"><?php echo $users_item_select['name'].'  '.$users_item_select['surname'].'  -  '.$users_item_select['company'];?></option>
                                              
                    <?php endforeach; ?>
              </select>
            </div>
            </div>
           
          </div>
          
          <div class="compose-mail-form-field">
            <label for="emailSubject" class="form-label">თემა: </label>
            <input type="text" id="emailSubject" class="form-control" placeholder="თემა" name="emailSubject">
          </div>
          <div id="message-editor">
            <div class="editor ql-container ql-snow" data-placeholder="შეტყობინება..."><div class="ql-editor ql-blank" data-gramm="false" contenteditable="true" data-placeholder="შეტყობინება"><p><br></p>შეტყობინება..</div><div class="ql-clipboard" contenteditable="true" tabindex="-1"></div><div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a>
            <input type="text" data-formula="e=mc^2" placeholder="შეტყობინება" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div></div>
          </div>
          <div class="compose-footer-wrapper">
            <div class="btn-wrapper d-flex align-items-center">
              <div class="btn-group dropup me-1">
                <button type="button" class="btn btn-primary waves-effect waves-float waves-light">გაგზავნა</button><input type="file" id="myFile" name="filename" placeholder="ss">
               
               
              </div>
              <!-- add attachment -->
              <div class="email-attachement" style="display:block;color:black;">
                <label for="file-input" class="form-label">
                  <svg stryle="color:black;" xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip ms-50"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg>
                </label>

                <input id="file-input" type="file" class="d-none" stylke="color:black;">
              </div>
            </div>
           
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ compose email -->

     

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Customizer-->
    <div class="customizer d-none d-md-block"><a class="customizer-toggle d-flex align-items-center justify-content-center" href="#"><i class="spinner" data-feather="settings"></i></a><div class="customizer-content">
  <!-- Customizer header -->



    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

  <div class="sidenav-overlay" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>
    <div class="drag-target" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>
        <!-- BEGIN: Vendor JS-->
    <script src="<?=base_url();?>assets/admin/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->
    <script src="<?=base_url();?>assets/admin/js/dropzone.min.js"></script>
    <!-- BEGIN: Page Vendor JS-->
    <script src="<?=base_url();?>assets/admin/js/katex.min.js"></script>
    <script src="<?=base_url();?>assets/admin/js/highlight.min.js"></script>
    <script src="<?=base_url();?>assets/admin/js/quill.min.js"></script>
    <script src="<?=base_url();?>assets/admin/js/toastr.min.js"></script>
    <script src="<?=base_url();?>assets/admin/js/select2.full.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?=base_url();?>assets/admin/js/app-menu.min.js"></script>
    <script src="<?=base_url();?>assets/admin/js/app.min.js"></script>
    <script src="<?=base_url();?>assets/admin/js/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?=base_url();?>assets/admin/js/app-email.min.js"></script>
     <script src="<?=base_url();?>assets/admin/js/form-file-uploader.min.js"></script>
    <!-- END: Page JS-->

    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
    </script>
    <div class="modal-backdrop show" style="display:none;z-index:9999;"></div>
  </body>
  <!-- END: Body-->
</html>
