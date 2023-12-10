<br>
<br>
<section class="banner_area">
            <div class="container">
                <div class="banner_inner_text">
                    <h4><?=$this->lang->line('Services');?></h4>
                    <ul>
                        <li><a href="#"><?=$this->lang->line('Home');?></a></li>
                        <li class="active"><a href="#"><?=$this->lang->line('Services');?></a></li>
                    </ul>
                </div>
            </div>
        </section>
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
                        <h2><?=$this->lang->line('Our offer');?>   </h2>
                        <h6><?=$this->lang->line('We are a team');?> </h6>
                    </div>
                    <p><?=$this->lang->line('Service text');?></p>
                    <div class="border_bar"></div>
                </div>
            </div>
        </section>
        <!--================End Our Service Area =================-->
        