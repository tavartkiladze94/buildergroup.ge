
<style>
    .project
    {
        width:80%;
        margin:auto;
    }
    .projects
    {
        width:37%;
        float:left;
    }
    .project_item
    {
        width:100%!important;
    }
</style>
        
        <!--================Main Slider Area =================-->
        <section class="main_slider_area">
            <div id="main_slider" class="rev_slider" data-version="5.3.1.6">
               <ul> 
                    <li data-index="rs-2972" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb="img/home-slider/slider-1.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Web Show" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="<?=base_url();?>assets/img/batumi1.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                       
                    </li>
                    <li data-index="rs-2973" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb="img/home-slider/slider-1.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Web Show" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="<?=base_url();?>assets/img/batumi2.jpeg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                      
                    </li>
                </ul>
            </div>
        </section>
        <!--================End Main Slider Area =================-->
        <!--================Get Quote Area =================-->
        <section class="get_quote_area">
            <div class="container">
                <div class="pull-left">
                    <h4>გჭირდება სანდო და ხარისხზე ორიენტირებული გუნდი?</h4>
                </div>
                <div class="pull-right">
                    <a class="get_btn" href="#">მიიღე უკეთესი</a>
                </div>
            </div>
        </section>
        <!--================End Get Quote Area =================-->
        
        <!--================Who We Are Area =================-->
        <section class="who_we_are_area">
            <div class="container">
                <div class="row who_we_inner">
                    <div class="col-md-5">
                        <div class="who_we_left_content">
                            <div class="main_w_title">
                                <h2><?=$this->lang->line('About us');?></h2>
                            </div>
                            <p><?=$this->lang->line('about_us_text');?></p>
                            <a href="<?=base_url('main/about');?>" style="font-size:18px;"><?php echo $this->lang->line('View more') ; ?>>></a>
                            <div class="border_bar"></div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="who_we_image">
                            <img src="<?=base_url();?>assetss/images/about/about.jpg" alt="" style="max-height:450px; width:100%;">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Who We Are Area =================-->
        <br>
        <br>
        <!--================Our Service Area =================-->
        <section class="our_service_area">
            <div class="left_service">
                <div class="left_service_inner" style="max-width:90%!important;">
                    <div class="service_item">
                        <div class="service_item_inner">
                            <img src="<?=base_url();?>assetsbest/images/services/construction.jpg" style="width:100%; height:242px;">
                            <a href="<?=base_url('main/service_details/Construction');?>"><h4><?=$this->lang->line('Construction');?></h4></a>
                            <a class="view_btn" href="<?=base_url('main/service_details/Construction');?>"><?=$this->lang->line('View more');?></a>
                        </div>
                    </div>
                    <div class="service_item" >
                        <div class="service_item_inner" >
                           <img src="<?=base_url();?>assetsbest/images/services/renovation1.jpeg" style="width:100%; height:242px;">
                            <a href="<?=base_url('main/service_details/Repair');?>"><h4><?=$this->lang->line('Renovation');?></h4></a>
                            <a class="view_btn" href="<?=base_url('main/service_details/Repair');?>"><?=$this->lang->line('View more');?></a>
                        </div>
                    </div>
                    <div class="service_item">
                        <div class="service_item_inner">
                            <img src="<?=base_url();?>assetsbest/images/services/santexnika.jpeg" style="width:100%; height:242px;">
                            <a href="#"><h4><?=$this->lang->line('Plumbing');?></h4></a>
                            <a class="view_btn" href="#"><?=$this->lang->line('View more');?></a>
                        </div>
                    </div>
                    <div class="service_item">
                        <div class="service_item_inner">
                            <img src="<?=base_url();?>assetsbest/images/services/eleqtrooba.jpeg" style="width:100%; height:242px;">
                            <a href="#"><h4><?=$this->lang->line('Electricity');?></h4></a>
                            <a class="view_btn" href="#"><?=$this->lang->line('View more');?>ა</a>
                        </div>
                    </div>
                 
                </div>
            </div>
            <div class="right_service">
                <div class="right_service_text">
                    <div class="main_b_title">
                        <h2>ჩვენი <br class="title_br" /> შემოთავაზება </h2>
                        <h6>ჩვენ ვართ <br class="sub_br" /> გუნდი</h6>
                    </div>
                    <p>მომსახურების ტექსტი</p>
                    <div class="border_bar"></div>
                </div>
            </div>
        </section>
        <!--================End Our Service Area =================-->
        
        <!--================Our Project Area =================-->
         <section class="our_project_area" style="margin-top:150px;">
            <div class="container project">
                <div class="row">
                    <div class="col-md-3">
                        <div class="project_left_side">
                            <div class="main_w_title">
                                <h2><?=$this->lang->line('Current projects');?></h2>
                              
                            </div>
                          
                        </div>
                    </div>
                    <div class="col-md-9 projects">
                        <div class="our_project_details">
                            <div class="project_item building isolation tiling project_item">
                                <img src="<?=base_url();?>assets/images/projects/<?php echo $project_Aliansi['file_name']; ?>" alt="" style="max-height:300px;">
                                <div class="project_hover">
                                    <div class="project_hover_inner">
                                        <div class="project_hover_content">
                                            <a href="<?=base_url('main/project_details');?>/<?php echo $project_Aliansi['code']; ?>"><h3 style="color:white;"><?=$this->lang->line($project_Aliansi['object']);?></h3></a>
                                          
                                            <a class="view_btn" href="<?=base_url('main/project_details');?>/<?php echo $project_Aliansi['code']; ?>"><?=$this->lang->line('View more');?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                          
                            
                        </div>
                        
                    </div>

                </div>
            </div>
        </section>
        <!--================End Our Project Area =================-->
        <section class="our_team_area">
<div class="container">
<div class="main_b_r_title">
<h2><?=$this->lang->line('Our Team');?></h2>

</div>
<div class="team_slider owl-carousel">
<div class="item">
<div class="team_item">
<div class="team_image">
<img src="<?=base_url();?>assets/logo11.jpg" alt="">
<ul>
<li><a href="#"><i class="fa fa-facebook"></i></a></li>
<li><a href="#"><i class="fa fa-twitter"></i></a></li>
<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
</ul>
</div>
<div class="member_name">
<a href="#"><h4>სახელი</h4></a>
<h5>გვარი</h5>
</div>
</div>
</div>
<div class="item">
<div class="team_item">
<div class="team_image">
<img src="<?=base_url();?>assets/logo11.jpg" alt="">
<ul>
<li><a href="#"><i class="fa fa-facebook"></i></a></li>
<li><a href="#"><i class="fa fa-twitter"></i></a></li>
<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
</ul>
</div>
<div class="member_name">
<a href="#"><h4>სახელი</h4></a>
<h5>გვარი</h5>
</div>
</div>
</div>
<div class="item">
<div class="team_item">
<div class="team_image">
<img src="<?=base_url();?>assets/logo11.jpg" alt="">
<ul>
<li><a href="#"><i class="fa fa-facebook"></i></a></li>
<li><a href="#"><i class="fa fa-twitter"></i></a></li>
<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
</ul>
</div>
<div class="member_name">
<a href="#"><h4>სახელი</h4></a>
<h5>გვარი</h5>
</div>
</div>
</div>
<div class="item">
<div class="team_item">
<div class="team_image">
<img src="<?=base_url();?>assets/logo11.jpg" alt="">
<ul>
<li><a href="#"><i class="fa fa-facebook"></i></a></li>
<li><a href="#"><i class="fa fa-twitter"></i></a></li>
<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
</ul>
</div>
<div class="member_name">
<a href="#"><h4>სახელი</h4></a>
<h5>გვარი</h5>
</div>
</div>
</div>
</div>
</div>
</section>