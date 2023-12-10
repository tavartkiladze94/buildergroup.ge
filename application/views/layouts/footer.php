<footer class="footer_area">
            <div class="footer_widgets_area">
                <div class="container">
                    <div class="row footer_widgets_inner">
                        <div class="col-md-3 col-sm-6">
                            <aside class="f_widget about_widget">
                                <img src="img/footer-logo.png" alt="">
                                 <p style=" font-size:20px;"> <?=$this->lang->line('Working hours');?> </p>

       <p style=" font-size:17px; "> <?=$this->lang->line('Monday-Friday');?> -10:00 - 18:00 </p>
       <p style=" font-size:17px; "> <?=$this->lang->line('Saturday');?>  -10:00 - 14:00 </p>
        
                            </aside>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <aside class="f_widget address_widget">
                                <div class="f_w_title">
                                    <h3><?=$this->lang->line('Address');?></h3>
                                </div>
                                <div class="address_w_inner">
                                   <div class="media">
                                        <div class="media-left">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="media-body">
                                            <p>info@bestbuildergroup.com</p>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <aside class="f_widget give_us_widget">
                                <h5><?=$this->lang->line('Contact');?></h5>
                                <h4><i class="fa fa-phone" aria-hidden="true"></i>(995) 557 15 65 65</h4>
                                <h5>ან</h5>
                                <a href="https://www.facebook.com/Bestbuildergroup-109347001794521/" target="blank" ><img src="<?=base_url();?>assets/images/ff.png" style="width:35px; margin-left:3px;"></a> 
           <a href="https://msng.link/o/?995557156565=vi" ><img src="<?=base_url();?>assets/images/viber.png" style="width:35px; margin-left:3px; "></a>
          <a href="https://msng.link/o/?995557156565=wa" ><img src="<?=base_url();?>assets/images/watsapp.png" style="width:35px;margin-left:3px; "></a>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            
        </footer>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?=base_url();?>assets/js/jquery-2.2.4.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
        <!-- Rev slider js -->
        <script src="<?=base_url();?>assets/vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="<?=base_url();?>assets/vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="<?=base_url();?>assets/vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="<?=base_url();?>assets/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="<?=base_url();?>assets/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="<?=base_url();?>assets/vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        
        <script src="<?=base_url();?>assets/vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="<?=base_url();?>assets/vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="<?=base_url();?>assets/vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="<?=base_url();?>assets/vendors/magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="<?=base_url();?>assets/vendors/counterup/waypoints.min.js"></script>
        <script src="<?=base_url();?>assets/vendors/counterup/jquery.counterup.min.js"></script>
        <script src="<?=base_url();?>assets/vendors/flex-slider/jquery.flexslider-min.js"></script>
        
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="<?=base_url();?>assets/js/gmaps.min.js"></script>
        
        <script src="<?=base_url();?>assets/js/theme.js"></script>
           
    
    <!-- Messenger Chat Plugin Code -->
    
    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "109347001794521");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v14.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/<?=$this->lang->line('en_US');?>/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    </body>
</html>