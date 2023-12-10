<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<style>
    .messege_form
    {
        width:90%;
    }
    .chat_users
    {
        width:30%;
        height:450px; 
        max-height:450px; 
        background-color:silver; 
        float:left;
        overflow-y:scroll;
    }
    .chat_messages
    {
        width:70%; 
        height:450px; 
        max-height:450px;
        background-color:blue; 
        float:left;
        overflow-y: scroll;
    }
    .chat_users_list
    {
        width:100%; 
        height:40px; 
        background-color:yellow;
    }
    .chat_messages_info
    {
        width:100%; 
        height:380px; 
        max-height:380px;
        background-color:pink;
        overflow-y:scroll;
    }
    .text_box
    {
        width:85%;
        height:70px;
        max-height:70px;
        background-color:yellow;
        float:left;
    }
    .send_button
    {
        width:15%;
        height:100%;
        float:left:;
    }
    .chat_users_list:hover
    {
        cursor: pointer;
        border:0.5px solid black;
    }
</style>

	<!-- ===========Innerpage-wrapper============= -->
		<section>
			<div class="content add-details">
				<div class="in-content-wrapper">
					<div class="row no-gutters">

						<div class="col">
							<div class="heading-messages">
								<h3><?=$this->lang->line('Messages');?> </h3>
							</div><!-- End heading-messages -->
						</div><!-- End column -->
						<div class="col-md-4">
							<div class="breadcrumb">
								<div class="breadcrumb-item"><i class="fas fa-angle-right"></i><a href=""><?=$this->lang->line('All');?></a>
								</div>
								<div class="breadcrumb-item active"><i class="fas fa-angle-right"></i>
								</div>
							</div><!-- end breadcrumb-->
						</div><!-- end column -->

					</div><!-- end row -->
                    <div class="box" id="gallery_block">
                        <div class="hotel-listing-form">
                            <div class="message_form" >
                              <div class="chat_users" id="users_list">
                              </div>
                              <div class="chat_messages" id="chat_messages_block">
                                  <div class="chat_messages_info" id="user_chat_full"> </div>
                                  <div class="text_box">
                                      <textarea style="width:100%;height:100%;" id="admin_text"></textarea>
                                  </div>
                                  <div><button style="width:15%; height:70px;" id="chat_send">send</button></div>
                              </div>
                            </div>

                        </div><!-- end hotel-listing-form -->
                        

                    </div>


				</div><!-- end in-content-wrapper -->
			</div><!-- end add-details -->
		</section>
		<!-- ===========End Innerpage-wrapper============= -->
		
	</div><!-- end wrapper -->
<script>
    var input = document.getElementById("admin_text");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("chat_send").click();
  }
});
</script>
