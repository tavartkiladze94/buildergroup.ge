<!DOCTYPE html>

<html lang="en">

<head>
  <title><?=$this->lang->line('Control panel');?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="images/favicon.png" type="image/x-icon">



  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


  <!-- Bootstrap Stylesheet -->
   <link rel="stylesheet" type="text/css" href="<?=base_url();?>assetsbest/admin/css/checkbox.css">
 
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>assetsbest/admin/css/bootstrap.min4.2.1.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>assetsbest/css/bootstrap.min4.2.1.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>assetsbest/admin/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="<?=base_url();?>assetsbest/admin/vendors/datatables/datatables.min.css">
  
    <link href="<?=base_url();?>assetsbest/css/style.css" rel="stylesheet">
        <link href="<?=base_url();?>assetsbest/css/slick.css" rel="stylesheet">
        <link href="<?=base_url();?>assetsbest/css/slick-theme.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>assetsbest/admin/css/custom.datatables.css">

  <link rel="stylesheet" type="text/css" href="<?=base_url();?>assetsbest/admin/css/style.css">

  <link rel="stylesheet" type="text/css" href="<?=base_url();?>assetsbest/admin/css/responsive.css">
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assetsbest/admin/vendors/fontawesome-free-5.11.2-web/css/all.min.css">
  <!-- Custom Stylesheet End-->

<style>
   
   .fa-user-alt,.fa-cog,.fa-unlock,.fa-power-off
   {
       color: #44cc5b;
   }
  
   .top-bar nav.navbar ul.nav-list li.profile .dropdown-menu a:hover
   {
      
       background-color: #44cc5b;
        color:white;
   }
   
   
   .wrapper .sidebar-left > .side-menu ul.navbar-nav li.nav-item .sub-menu a.items-list3, .wrapper .sidebar-left > .side-menu ul.navbar-nav li.nav-item .sub-menu a.items-list1
   {
        background-color: #153f53;
    }
    .wrapper .sidebar-left > .side-menu ul.navbar-nav li.nav-item a.items-list2 span:first-child i, .wrapper .sidebar-left > .side-menu ul.navbar-nav li.nav-item a.items-list span:first-child i
    {
            padding: 0 5px 0 15px;
             color: #44cc5b;
    }
    .top-bar nav.navbar ul.nav-list li.notifications a, .top-bar nav.navbar ul.nav-list li.messages a
    {
        color: #44cc5b;
    }
    .top-bar nav.navbar ul.nav-list li.notifications > .dropdown-menu a i, .top-bar nav.navbar ul.nav-list li.messages > .dropdown-menu a i
    {
        color: #44cc5b;
    }
    .wrapper .sidebar-left > .side-menu ul.navbar-nav li.nav-item a.items-list2:hover, .wrapper .sidebar-left > .side-menu ul.navbar-nav li.nav-item a.items-list:hover
     {
        background-color: #44cc5b;
    }
    .wrapper .sidebar-left > .side-menu ul.navbar-nav li.nav-item a.items-list2:hover
    {
        background-color: #44cc5b;
    }
    .wrapper .sidebar-left > .side-menu ul.navbar-nav li.nav-item .sub-menu a.items-list3:hover, .wrapper .sidebar-left > .side-menu ul.navbar-nav li.nav-item .sub-menu a.items-list1:hover
    {
        background-color: #44cc5b;
    }
    .wrapper .sidebar-left .side-bar-bottom a i
    {
        color: #44cc5b;
    }
    .wrapper .sidebar-left .side-bar-bottom ul li:hover i
    {
        color: white;
    }
    .wrapper.active .sidebar-left .side-menu ul.navbar-nav li.nav-item a.items-list2 span:first-child i, .wrapper.active .sidebar-left .side-menu ul.navbar-nav li.nav-item a.items-list span:first-child i
    {
        color: #44cc5b;
    }
    .wrapper.active .sidebar-left .side-bar-bottom a i
    {
         color: #44cc5b;
    }
    .wrapper.active .sidebar-left .side-bar-bottom ul li:hover i
    {
        color: white;
    }
    .flight-listing-form form ul li:nth-child(2) button, .flight-listing-form form ul li:nth-child(1) button, .car-listing-form form ul li:nth-child(2) button, .car-listing-form form ul li:nth-child(1) button, .cruise-listing-form form ul li:nth-child(2) button, .cruise-listing-form form ul li:nth-child(1) button, .tour-listing-form form ul li:nth-child(2) button, .tour-listing-form form ul li:nth-child(1) button, .hotel-listing-form form ul li:nth-child(2) button, .hotel-listing-form form ul li:nth-child(1) button
    {
        background-color: #44cc5b;
    }
    .flight-listing-form form .form-group, .car-listing-form form .form-group, .cruise-listing-form form .form-group, .tour-listing-form form .form-group, .hotel-listing-form form .form-group
    {
        margin-bottom: 20px;
    }
    .box .tools-btns a i
    {
        background-color: #44cc5b;
    }
    .box .add-new a
    {
        background-color: #44cc5b;
    }
    .content.flight-listing-content table tr td:nth-child(10) a i.fa-trash-alt, .content.car-listing-content table tr td:nth-child(10) a i.fa-trash-alt, .content.cruise-listing-content table tr td:nth-child(10) a i.fa-trash-alt, .content.tour-listing-content table tr td:nth-child(10) a i.fa-trash-alt, .content.listing-content table tr td:nth-child(10) a i.fa-trash-alt
    {
        background-color: #44cc5b;
    }
    .drosha_block
    {
        width:20%; 
        height:70%; 
        margin-left: 50px;
    }
    .drosha
    {
        width:30%; 
        height:100%;
        float:left;
        margin-left:3%;
    }
   
    @media only screen and (max-width: 991px) {
    .drosha_block
    {
        width:25%; 
        height:70%; 
        margin-left: 45px;
    }
    .drosha
    {
        width:29%; 
        height:100%;
        float:left;
        margin-left:4%;
    }
  }
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</head>

<body style="background-color: white;">


  <div class="wrapper" >

    <!-- ===========Top-Bar============= -->
    <div class="top-bar" >
      <nav class="navbar" style="background-color: #153f53;">
        <button class="navbar-toggler d-block sideMenuToggler" type="button">
          <span class="fa fa-bars"></span>
          
        </button>
        <div class="drosha_block">
            <div class="drosha"><a href="<?=base_url('redaqtor/setLanguage/ge/');?><?php echo $this->uri->segment(2); ?>/<?php if($this->uri->segment(3) !== FALSE) echo $this->uri->segment(3); ?>/<?php if($this->uri->segment(4) !== FALSE) echo $this->uri->segment(4); ?>/<?php if($this->uri->segment(5) !== FALSE) echo $this->uri->segment(5); ?>/<?php if($this->uri->segment(6) !== FALSE) echo $this->uri->segment(6); ?>/<?php if($this->uri->segment(7) !== FALSE) echo $this->uri->segment(7); ?>"><img src="<?=base_url();?>assetsbest/img/geo.png" style="width:100%; height:100%;"></a></div>
            <div class="drosha"><a href="<?=base_url('redaqtor/setLanguage/ru/');?><?php echo $this->uri->segment(2); ?>/<?php if($this->uri->segment(3) !== FALSE) echo $this->uri->segment(3); ?>/<?php if($this->uri->segment(4) !== FALSE) echo $this->uri->segment(4); ?>/<?php if($this->uri->segment(5) !== FALSE) echo $this->uri->segment(5); ?>/<?php if($this->uri->segment(6) !== FALSE) echo $this->uri->segment(6); ?>/<?php if($this->uri->segment(7) !== FALSE) echo $this->uri->segment(7); ?>"><img src="<?=base_url();?>assetsbest/img/ru.png" style="width:100%; height:100%;"></a></div>
            <div class="drosha"><a href="<?=base_url('redaqtor/setLanguage/en/');?><?php echo $this->uri->segment(2); ?>/<?php if($this->uri->segment(3) !== FALSE) echo $this->uri->segment(3); ?>/<?php if($this->uri->segment(4) !== FALSE) echo $this->uri->segment(4); ?>/<?php if($this->uri->segment(5) !== FALSE) echo $this->uri->segment(5); ?>/<?php if($this->uri->segment(6) !== FALSE) echo $this->uri->segment(6); ?>/<?php if($this->uri->segment(7) !== FALSE) echo $this->uri->segment(7); ?>"><img src="<?=base_url();?>assetsbest/img/eng.jpg" style="width:100%; height:100%;"></a></div>
        </div>

        <ul class="ml-auto list-unstyled nav-list list-inline d-flex my-auto">
          
          <!--<li class="nav-item list-inline-item dropdown messages">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="far fa-envelope"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="background-color: #153f53;">
              <span><?=$this->lang->line('Messages');?></span>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#"><i class="far fa-envelope"></i>სათაური<span>ტექსტი</span>
              </a>
              <a class="dropdown-item" href="#"><i class="far fa-envelope-open"></i>სათაური<span>ტექსტი</span></a>
              <a class="dropdown-item bottom-margin" href="#"><i class="far fa-envelope-open"></i>სათაური<span>ტექსტი</span></a>
              <div class="dropdown-divider"></div>
              <a href="#" class="btn mx-auto d-block"><?=$this->lang->line('View all');?></a>
            </div>
          </li> -->
         <!-- <li class="nav-item list-inline-item dropdown notifications">
						<a class="nav-link" href="<?=base_url('redaqtor/messages');?>" >
							<i class="far fa-bell"></i><sup style="color:yellow;font-size:16px;" id="msg"></sup>
						</a>
				</li>
          <li class="nav-item list-inline-item dropdown profile">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <img src="<?=base_url('uploads/users/');?><?=$this->session->userdata('photo');?>" alt="" class="img-fluid rounded-circle" width="30px" />
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="background-color: #153f53;">
              <a class="dropdown-item" href="<?=base_url('redaqtor/profile_view');?>/<?=$this->session->userdata('id');?>/<?=$this->session->userdata('name');?>/<?=$this->session->userdata('surname');?>"><i class="fas fa-user-alt"></i>
                <span><?=$this->lang->line('View profile');?></span></a>
              <a class="dropdown-item" href="<?=base_url('redaqtor/profile_edit');?>/<?=$this->session->userdata('id');?>/<?=$this->session->userdata('name');?>/<?=$this->session->userdata('surname');?>"><i class="fas fa-cog"></i>
                <span><?=$this->lang->line('Edit profile');?></span></a>
              <a class="dropdown-item" href="<?=base_url('redaqtor/profile_password');?>"><i class="fas fa-unlock"></i>
                <span><?=$this->lang->line('Change password');?></span></a>
              
              <a href="<?=base_url('redaqtor/logout');?>" class="btn d-block text-left" style="color:white;"><i class="fas fa-power-off" ></i><?=$this->lang->line('Sign out');?></a>
              
            </div>
          </li>-->
        </ul>
      </nav>
    </div><!-- End top-bar -->

    <!-- =========== sidebar-left ============= -->
    <div class="sidebar-left" style="background-color: #0c2e3e;" >
      <div id="mtavari">
      <div class="sidebar-topbar text-center"  style="background-color: #0c2e3e;"  >
       <span class="text" style="color: #44cc5b;">BESTBUILDERGROUP</span>
      </div> <!-- End sidebar-topbar -->
      </div>
      <!-- End sidebar-topbar -->

      <div class="side-menu">
        <ul class="navbar-nav">
             <li class="nav-item" id="dashboard-link">
            <a href="<?=base_url('main/index');?>" class="items-list first">
              <span><i class="fas fa-external-link-alt" data-toggle="tooltip" data-html="true"
                  title="Dashboard"></i></span>
              <span class="items-list-text"><?=$this->lang->line('Main page');?></span>
            </a>
          </li>
          <li class="nav-item" id="dashboard-link">
            <a href="<?=base_url('redaqtor/index');?>" class="items-list first">
              <span><i class="fa fa-home link-icon" data-toggle="tooltip" data-html="true"
                  title="Dashboard"></i></span>
              <span class="items-list-text"><?=$this->lang->line('Control panel');?></span>
            </a>
          </li>
          <li class="nav-item" id="dashboard-link">
            <a href="<?=base_url('redaqtor/news');?>" class="items-list first">
              <span><i class="fa fa-newspaper link-icon" data-toggle="tooltip" data-html="true"
                  title="Dashboard"></i></span>
              <span class="items-list-text"><?=$this->lang->line('News');?></span>
            </a>
          </li>
          <li class="nav-item" id="dashboard-link">
            <a href="<?=base_url('redaqtor/about');?>" class="items-list first">
              <span><i class="fa fa-info link-icon" data-toggle="tooltip" data-html="true"
                  title="Dashboard"></i></span>
              <span class="items-list-text"><?=$this->lang->line('About us');?></span>
            </a>
          </li>
          <li class="nav-item" id="dashboard-link">
            <a href="<?=base_url('redaqtor/services');?>" class="items-list first">
              <span><i class="fa fa-info link-icon" data-toggle="tooltip" data-html="true"
                  title="Dashboard"></i></span>
              <span class="items-list-text"><?=$this->lang->line('Services');?></span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#users" class="items-list" data-toggle="collapse" aria-expanded="false">
              <span><i class="fas fa-user" data-toggle="tooltip" data-html="true"
                  title="<?=$this->lang->line('All');?>"></i></span>
              <span class="items-list-text"><?=$this->lang->line('All');?></span>
              <span><i class="fa fa-chevron-down arrow"></i></span>
            </a>
            <div class="collapse sub-menu" id="users"  style="background-color: #153f53;">
               <a class="items-list1" href="<?=base_url('redaqtor/object_list_type/Construction');?>"><?=$this->lang->line('Construction');?></a>
              <a class="items-list1" href="<?=base_url('redaqtor/object_list_type/Repair');?>"><?=$this->lang->line('Repair');?></a>
         
            </div><!-- End sub-menu -->
          </li>

        </ul>
      </div><!-- End side-menu --> 
      <div class="side-bar-bottom" style="background-color: #153f53;">
        <ul class="list-unstyled">
         
          <li class="list-inline-item" data-toggle="tooltip" data-html="true"  title="<?=$this->lang->line('Sign out');?>">
            <a href="<?=base_url('redaqtor/logout');?>" ><i class="fas fa-power-off"></i></a></li>
        </ul>
      </div><!-- End side-bar-bottom -->
    </div><!-- End sidebar-left -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script>
         var user_id;
       var text = "ggggg";
$(document).ready(function(){
    
    var raod=0;
    var resp;
    var userr;
 var myVar = setInterval(msg, 500);
 function msg(){
    $.ajax({
     url:'<?=base_url()?>admin/messages_count',
     method: 'post',
     data: {text: "text"},
     dataType: 'json',
     success: function(response){
      
      resp = response;
      var len = response.length;
      if(len > raod){
       $('#msg').empty();
       $('#msg').append(len);
       $('#users_list').empty();
       chat_user();
       
      raod = len;
      }
       
     }
  });
 }
 var raodd=0;
 function chat_user(){
         
    $.ajax({
     url:'<?=base_url()?>admin/messages_chat_users',
     method: 'post',
     data: {user: "user"},
     dataType: 'json',
     success: function(response){
      var lenn = response.length;
 var raodenoba =0;
       $('#users_list').empty();
       for(var i = 0; i<lenn; i++)
       {
           var j =0;
          
           while(j < resp.length)
           {
               if(response[i].user == resp[j].user)
               {
               raodenoba ++;
               }
               j++;
           }
       $('#users_list').append('<div class="chat_users_list" id="'+response[i].user+'" onclick="chat_user_full(this)"><p style=" padding-top:2px;">'+response[i].user+'-'+raodenoba+'</p></div>');
       raodenoba = 0;
       if(response[i].user == user_id) chat_user_full(user_id);
       }
        raodd= lenn;
      
     
     }
  });
 }
 $('#chat_send').click(function()
 {
     chat_admin_send(user_id);
 });
 });
 function chat_user_full(user){
         var raoddd = 0;
         user_id = user.id;
    $.ajax({
     url:'<?=base_url()?>admin/messages_chat_full/'+user.id,
     method: 'post',
     data: {text: text},
     dataType: 'json',
     success: function(response){
      var lennn = response.length;
 
      if(lennn > raoddd){
       $('#user_chat_full').empty();
       for(var i = 0; i<lennn; i++)
       {
          if(response[i].admin != '')
                {
                     $('#user_chat_full').append("<p style='width:70px; margin-left:5px; color:red;'> "+response[i].admin+"-&#160&#160"+response[i].text+"</p>");
                }
               else
               {
                     $('#user_chat_full').append("<p style='width:96%; color:blue; margin-left:5px;'> user-&#160&#160"+response[i].text+"</p>");
               }

       }
      }
      raoddd= lennn;
      text ="ggggg";
     }
  });
 }
 function chat_admin_send(userr){
         var tmp=document.getElementById("admin_text").value;
    $.ajax({
     url:'<?=base_url()?>admin/admin_send',
     method: 'post',
     data: {user:userr, text: tmp},
     dataType: 'json',
     success: function(response){
         var lengt = response.length;
       $('#admin_text').val('');     
       $('#user_chat_full').empty();
       for(var i = 0; i<lengt; i++)
       {
          if(response[i].admin != '')
                {
                     $('#user_chat_full').append("<p style='width:96%; color:red;'> "+response[i].admin+"-&#160&#160"+response[i].text+"</p>");
                }
               else
               {
                     $('#user_chat_full').append("<p style='width:96%; color:blue;'> user-&#160&#160"+response[i].text+"</p>");
               }

       }
      }
     
  });
 }
</script>
    
     
