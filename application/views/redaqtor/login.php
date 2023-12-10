<script>
            $(function() {
 
                if (localStorage.chkbx && localStorage.chkbx != '') {
                    $('#remember').attr('checked', 'checked');
                    $('#username').val(localStorage.username);
                    $('#password').val(localStorage.pass);
                } else {
                    $('#remember').removeAttr('checked');
                    $('#username').val('');
                    $('#password').val('');
                }
 
                $('#remember').click(function() {
 
                    if ($('#remember').is(':checked')) {
                        // save username and password
                        localStorage.username = $('#username').val();
                        localStorage.pass = $('#password').val();
                        localStorage.chkbx = $('#remember').val();
                    } else {
                        localStorage.username = '';
                        localStorage.pass = '';
                        localStorage.chkbx = '';
                    }
                });
            });
 
        </script> 
        <br>
        <br>
        <br>
        <br>
        <br>
 <!--===== INNERPAGE-WRAPPER ====-->
        <section class="innerpage-wrapper">
        	<div id="login" class="innerpage-section-padding">
                <div class="container" style="width:450px!important">
                    <div class="row">
                        <div class="col-sm-12">
                        
                        	<div class="flex-content">
                                <div class="custom-form custom-form-fields">
                                    <h3 ><?=$this->lang->line('Log in');?></h3>
                                    <p ><?=$this->lang->line('Go through the authentication and use the consumer functions');?></p>
                                    
             <form action="<?=base_url("redaqtor/loginn")?>" method="POST">
              <?php if (isset($alert) && $alert): ?>
                <div class="alert alert-danger" role="alert" style="color:#f1d766;">
                  <?=$this->lang->line('incorrect credentials');?>
                </div>
              <?php endif ?>
              <div class="form-group">
                <!-- <label for="">მომხმარებლის სახელი</label> -->
                <input type="text" class="form-control" name="email" id="username" placeholder="<?=$this->lang->line('Email');?>" required/>     
                     <span><i class="fa fa-user"></i></span>           
              </div>
              <div class="form-group">
                <!-- <label for="">პაროლი</label> -->
                <input type="password" class="form-control" name="password" id="password" placeholder="<?=$this->lang->line('Password');?>" required/>
                <span><i class="fa fa-lock"></i></span>
              </div>              
               <div class="checkbox">
                                             <label><input type="checkbox" name="remember" id="remember"><?=$this->lang->line('remember');?></label>
                                        </div>
              <button type="submit" class="btn btn-orange btn-block" style="font-size:25px;color:#f1d766; border:2px solid #f1d766;background-color:#484537;"><?=$this->lang->line('Log in');?></button>
            </form> 
                                    
                                    
                                    <br>
                                    <br>
                                  
                                </div><!-- end custom-form -->
                                
                               
                                
                            </div><!-- end form-content -->
                            
                            
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->         
            </div><!-- end login -->
        </section><!-- end innerpage-wrapper -->
