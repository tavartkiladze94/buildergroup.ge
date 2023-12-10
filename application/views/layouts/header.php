<!DOCTYPE html>
<html lang="ge">
    <head>
        <meta charset="utf-8">
        <title>Bestbuildergroup - <?=$this->lang->line('Construction company');?>  </title>
        <meta name="description" content="<?=$this->lang->line('about_us_text');?>">
        <meta name="keywords" content="Bestbuildergroup, Best, builder, group, <?=$this->lang->line('Aliansi_Centro_Polis');?>, სამშენებლო, კომპანიები,რემონტი,ელექტროობა,მშენებლობა,ანტექნიკა, აშენება, მოხელეები, mshenebloba, kompaniebi, samsheneblo kompania, masalebi, samsheneblo masalebi, remonti, asheneba,  santeqnika, sheqmna">
        <meta name="author" content="Nika Tavartkiladze">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="<?=base_url();?>assets/logo11.jpg" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        

        <!-- Icon css link -->
        <link href="<?=base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?=base_url();?>assets/css/materialdesignicons.min.css" rel="stylesheet">
        
        <!-- Bootstrap -->
        <link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="<?=base_url();?>assets/vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="<?=base_url();?>assets/vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="<?=base_url();?>assets/vendors/revolution/css/navigation.css" rel="stylesheet">
        <link href="<?=base_url();?>assets/vendors/animate-css/animate.css" rel="stylesheet">
        <link href="<?=base_url();?>assets/vendors/owl-carousel/assets/owl.carousel.min.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="<?=base_url();?>assets/css/style.css" rel="stylesheet">
        <link href="<?=base_url();?>assets/css/responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .navbar-brand img
            {
                height:100px;
                width:100%!important;
            }
            .main_header_area + section, .main_header_area + div, .main_header_area + .row
            {
                margin-top:0;
            }
            .news_image
            {
                width:100%;
                height:350px;
            }
            @media(max-width: 480px)
            {
                .navbar-brand img
                {
                height:70px;
                width:100%!important;
             }
            }
            .col-sm-6
            {
                margin-top:20px;
            }

        </style>
    </head>
    <body>
       <div id="fb-root"></div>

        <!--================Header Area =================-->
        <header class="main_header_area" style="border-bottom:1px solid black;">
            
            <div class="main_menu_area">
                <div class="container">
                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?=base_url('main/index');?>"><img src="<?=base_url();?>assets/logo11.jpg"  alt=""></a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown submenu ">
                                    <a href="<?=base_url('main/index');?>" ><?=$this->lang->line('Home');?></a>
                                   
                                </li>
                                <li >
                                    <a href="<?=base_url('main/projects');?>" ><?=$this->lang->line('projects');?></a>
                                  
                                </li>
                                <li><a href="<?=base_url('main/about');?>"> <?=$this->lang->line('About us');?></a></li>
                                <li><a href="<?=base_url('main/services');?>"> <?=$this->lang->line('Services');?></a></li>
                                <li><a href="<?=base_url('main/news');?>"><?=$this->lang->line('News');?></a></li>
                                <li><a href="<?=base_url('main/contact');?>"><?=$this->lang->line('Contact');?></a></li>
                                <li><a href="<?=base_url('admin/login');?>"><?=$this->lang->line('Log in');?></a></li>
                                <li class="dropdown submenu">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$this->lang->line('Lang');?></a>
<ul class="dropdown-menu">
<li><a class="dropdown-item"  href="<?=base_url($this->uri->segment(1).'/setLanguage/ge');?><?php echo '/'.$this->uri->segment(2); ?><?php if($this->uri->segment(3) !== FALSE) echo '/'.$this->uri->segment(3); ?><?php if($this->uri->segment(4) !== FALSE) echo '/'.$this->uri->segment(4); ?>"> <?=$this->lang->line('Georgian');?></a>
           </li> 
           <li><a class="dropdown-item"  href="<?=base_url($this->uri->segment(1).'/setLanguage/en/');?><?php echo '/'.$this->uri->segment(2); ?><?php if($this->uri->segment(3) !== FALSE) echo '/'.$this->uri->segment(3); ?><?php if($this->uri->segment(4) !== FALSE) echo '/'.$this->uri->segment(4); ?>"><?=$this->lang->line('English');?></a>
           
</li>
<li><a class="dropdown-item"  href="<?=base_url($this->uri->segment(1).'/setLanguage/ru/');?><?php echo '/'.$this->uri->segment(2); ?><?php if($this->uri->segment(3) !== FALSE) echo '/'.$this->uri->segment(3); ?><?php if($this->uri->segment(4) !== FALSE) echo '/'.$this->uri->segment(4); ?>"> <?=$this->lang->line('Russian');?></a>
           </li>

</ul>
</li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </nav>
                </div>
            </div>
        </header>