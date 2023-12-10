
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
    <meta name="description" content="BESTBUILDERGROUP.COM">
    <meta name="keywords" content="">
    <meta name="author" content="Nika Tavartkiladze">
   
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/swiper.min.css">
     <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/katex.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/sweetalert2.min.css">
     <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/pickadate.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/flatpickr.min.css">
    

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
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/form-flat-pickr.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/form-pickadate.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/ext-component-swiper.min.css">


    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/form-file-uploader.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/ext-component-toastr.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/admin/css/app-email.min.css">
<style>
    label, input, textarea, th
    {
        color:#f1d766;
    }
    .list-group span, .list-group svg
    {
        color:#f1d766;
    }
    .dropzone
    {
        background: #726d6f;
    }
    .dz-success-mark, .dz-success-mark svg
    {
        color:#f1d766!important;
    }
    .text-muted
    {
        color:#f1d766!important;
    }
    .btn-primary
    {
        background-color:#7367F0!important;
    }
    .mail-date-time .app-fixed-search, .email-detail-header, .app-fixed-search
    {
        background:#373334!important;
    }
     .card-datatable .table-responsive .pt-0
     {
        background-color:#373334!important;
    }
    .email-app-details, .feather-men .ficon
    {
        background:#373334!important;
    }
    .app-action, .email-media-list li, th
    {
        background:#373334!important;
        border: 1px solid #f1d766;
        
    }
    .form-control .flatpickr-disabled-range .flatpickr-input 
    {
        color:#f1d766!important;
    }
    span, label, svg, p, i, a, h1, h2, h3, h4, h5, h6, li, .ms-1
    {
        color:#f1d766!important;
    }
    .ms-1
    {
        font-size:18pximportant;
    }
    select option, .form-control, input, textarea
    {
        color:black!important;
    }
    table th, table td
    { 
        border: 0;
        border-top:1px solid #f1d766!important;
        border-bottom: 1px solid #f1d766!important;
    }
    table tr
    {
        border:1px solid #f1d766!important;
    }
    table{
        background-color:#373334!important;
    }
    .dayContainer span, .flatpickr-weekday
    {
     color:black!important;   
    }
</style>

 
  </head>
  <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="" style="color:black; background-color:#373334;"  >

    <!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow" style="background-color:#373334; margin-top:0; border-bottom:1px solid #f1d766;">
      <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
          <ul class="nav navbar-nav d-xl-none">
            <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu" style="color:#f1d766!important;"></i></a></li>
          </ul>
         
         
        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">
          <!--<li class="nav-item dropdown dropdown-language"><a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language"><?=$this->lang->line('lang');?></span></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="<?=base_url('admin/setLanguage/ge/');?><?php echo $this->uri->segment(2); ?>/<?php if($this->uri->segment(3) !== FALSE) echo $this->uri->segment(3); ?>/<?php if($this->uri->segment(4) !== FALSE) echo $this->uri->segment(4); ?>/<?php if($this->uri->segment(5) !== FALSE) echo $this->uri->segment(5); ?>/<?php if($this->uri->segment(6) !== FALSE) echo $this->uri->segment(6); ?>/<?php if($this->uri->segment(7) !== FALSE) echo $this->uri->segment(7); ?>" data-language="en"><i class="flag-icon flag-icon-us"></i> <?=$this->lang->line('Georgian');?></a>
              <a class="dropdown-item" href="<?=base_url('admin/setLanguage/ru/');?><?php echo $this->uri->segment(2); ?>/<?php if($this->uri->segment(3) !== FALSE) echo $this->uri->segment(3); ?>/<?php if($this->uri->segment(4) !== FALSE) echo $this->uri->segment(4); ?>/<?php if($this->uri->segment(5) !== FALSE) echo $this->uri->segment(5); ?>/<?php if($this->uri->segment(6) !== FALSE) echo $this->uri->segment(6); ?>/<?php if($this->uri->segment(7) !== FALSE) echo $this->uri->segment(7); ?>" data-language="fr"><i class="flag-icon flag-icon-fr"></i><?=$this->lang->line('Russian');?></a>
              <a class="dropdown-item" href="<?=base_url('admin/setLanguage/en/');?><?php echo $this->uri->segment(2); ?>/<?php if($this->uri->segment(3) !== FALSE) echo $this->uri->segment(3); ?>/<?php if($this->uri->segment(4) !== FALSE) echo $this->uri->segment(4); ?>/<?php if($this->uri->segment(5) !== FALSE) echo $this->uri->segment(5); ?>/<?php if($this->uri->segment(6) !== FALSE) echo $this->uri->segment(6); ?>/<?php if($this->uri->segment(7) !== FALSE) echo $this->uri->segment(7); ?>" data-language="de"><i class="flag-icon flag-icon-de"></i> <?=$this->lang->line('English');?></a></div>
          </li>-->
          <!--
          <li class="nav-item dropdown dropdown-notification mr-25"><a class="nav-link" href="javascript:void(0);" data-toggle="dropdown"><i class="fa fa-bell" style=" font-size:17px;"></i><span class="badge badge-pill badge-danger badge-up">5</span></a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <div class="dropdown-header d-flex">
                  <h4 class="notification-title mb-0 mr-auto" >Notifications</h4>
                  <div class="badge badge-pill badge-light-primary" >6 New</div>
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
          <li class="nav-item dropdown dropdown-notification mr-25"><a class="nav-link" href="javascript:void(0);" data-toggle="dropdown"><i class="fa fa-envelope" style=" font-size:17px;"></i><span class="badge badge-pill badge-danger badge-up" id="msg">9</span></a>
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
          -->
          <li class="nav-item dropdown dropdown-user" ><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder"><?php echo $this->session->userdata('name'); ?></span><span class="user-status"><?php echo $this->session->userdata('category'); ?></span></div><span class="avatar">
                  <img class="round" src="<?=base_url();?>assets/admin/images/users/user.jpg"  height="40" width="40"><span class="avatar-status-online"></span></span></a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user" style="background-color:#10163A; ">
                      
             <a class="dropdown-item" href="<?=base_url('admin/logout');?>" style="color:#f1d766;"><i class="mr-50" data-feather="power" ></i> <?=$this->lang->line('Sign out');?></a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true" style="background-color:#373334;border-right:1px solid #f1d766;">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><a class="navbar-brand" href="<?=base_url('admin/index');?>">
              <h2 class="brand-text" style="color:#f1d766;">BESTBUILDERGROUP.COM</h2></a></li>
          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
      </div>
      <div class="main-menu-content" >
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" style="background-color:#373334;">

          <li class=" nav-item"><a class="d-flex align-items-center" href="<?=base_url('admin/index');?>" style="color:#f1d766;"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards" style="color:#f1d766;">მთავარზე გადასვლა</span></a>
           
          </li>
          <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">სამუშაო გარემო</span><i data-feather="more-horizontal"></i></li>
         <?php if($this->session->userdata('sagareo')=='1') echo'<li><a class="d-flex align-items-center" href="'.base_url("admin/sms_gagzavnili").'"><i class="fa fa-envelope" style=" font-size:17px;"></i><span class="menu-item text-truncate" data-i18n="Profile">საგარეო შეტყობინებები</span></a></li>';?>
         <?php if($this->session->userdata('finansebi')=='1') echo'<li><a class="d-flex align-items-center" href="'.base_url("admin/finansebi_migebuli").'"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span class="menu-item text-truncate" data-i18n="Profile">ფინანსური საკითხები</span></a></li>';?>
         <?php if($this->session->userdata('iuridiuli')=='1') echo'<li><a class="d-flex align-items-center" href="'.base_url("admin/iuridiuli_migebuli").'"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span class="menu-item text-truncate" data-i18n="Profile">იურიდიული საკითხები</span></a></li>';?>
         <?php if($this->session->userdata('brigadiri')=='1') echo'<li><a class="d-flex align-items-center" href="'.base_url("admin/brigadiri_migebuli").'"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span class="menu-item text-truncate" data-i18n="Profile">ბრიგადირების საკითხები</span></a></li>';?>
         <?php if($this->session->userdata('usafrtxoeba')=='1') echo'<li><a class="d-flex align-items-center" href="'.base_url("admin/problems_all").'"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span class="menu-item text-truncate" data-i18n="Profile">უსაფრთხოების საკითხები</span></a></li>';?>
         <?php if($this->session->userdata('material')=='1') echo'<li><a class="d-flex align-items-center" href="'.base_url("admin/building_materials").'"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span class="menu-item text-truncate" data-i18n="Profile">'.$this->lang->line("Building materials").'/span></a></li>';?>
<?php if($this->session->userdata('name')=='nika') echo'<li><a class="d-flex align-items-center" href="'.base_url("admin/sendNotification").'"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span class="menu-item text-truncate" data-i18n="Profile">სმს გაგზავნა</span></a></li>';?>
</ul>
      </div>
    </div>
    
    
  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
