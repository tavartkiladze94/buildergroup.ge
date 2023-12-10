<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assetsbest/admin/vendors/datatables/datatables.min.css">
 <link rel="stylesheet" type="text/css" href="<?=base_url();?>assetsbest/admin/vendors/dropzone-5.5.0/dist/min/dropzone.min.css">


<script rel="stylesheet" type="text/css" href="<?=base_url();?>assetsbest/admin/vendors/datatables/datatables.min.js"></script>

	<script src="<?=base_url();?>assetsbest/admin/vendors/dropzone-5.5.0/dist/min/dropzone.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>
<script type="text/javascript" src="<?=base_url();?>assetsbest/editor3/jquery-te-1.3.2.min.js" charset="utf-8"></script>
<link type="text/css" rel="stylesheet" href="<?=base_url();?>assetsbest/editor3/jquery-te-1.3.2.css" charset="utf-8" />
<style>
body {
  font-family: Arial;
  margin: 0;
}


* {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
  margin-bottom:150px;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
.dropbtn {
  background-color: black;
 
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}

                .div1{
        width:100%; 

    }
   .div2{
        width:20%; 
        
        float:left;
    }
		
				.divv{
					width:100%; 
					height:350px; 
					
				}
				.div_table{
                    width:50%;
                    float:left;
				}
				label{
					width:160px;
				}
				table{
					width:100%;
					color:blue;
					border:none;
					background-color:white;
				}
				table tr td{
					height:40px;
                    padding-left: 10px;
                    color:green;
                    border: none;

				}
				td{
					color:red;
					
				}
				.apart_menu
				{
				    width:100%; 
				    
				}
				.apart_menu_block
				{
				    width:50%; 
				    float:left; 
				    text-align: center;
				    border: 1px solid silver;
				    border-radius: 5px;
				}
				.apart_menu_block:hover
				{
				    background-color:silver;
				    border: 2px solid black;
				    cursor: pointer;
				}
			
	  #map {
          width:100%;
        height: 70%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 13px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  margin-left:30px;
}
@media (max-width: 1200px)
                {
                    .divv
                    {
					width:100%; 
					height:650px; 
					
				    }
                    .div_table
                    {
                        width:100%;
                        
                    }
                }
			
			</style>

		<!-- ===========Innerpage-wrapper============= -->
		<section>
			<div class="content add-details">
				<div class="in-content-wrapper">
					<div class="row no-gutters">

						<div class="col">
							<div class="heading-messages">
								<h3><?=$this->lang->line('Services');?> </h3>
							</div><!-- End heading-messages -->
						</div><!-- End column -->
						<div class="col-md-4">
							<div class="breadcrumb">
								<div class="breadcrumb-item"><i class="fas fa-angle-right"></i><a href="<?=base_url('redaqtor/services')?>"><?=$this->lang->line('All');?></a>
								</div>
								<div class="breadcrumb-item active"><i class="fas fa-angle-right"></i><?php echo $this->lang->line($service_edit['type']) ;?> 
								</div>
							</div><!-- end breadcrumb-->
						</div><!-- end column -->

					</div><!-- end row -->

					<div class="box"  style="display:block;">
					    	<div class="row no-gutters">
							<div class="col text-left">
								<div class="add-new">
									<a href="<?=base_url('redaqtor/news_create');?>"><?=$this->lang->line('Add new');?><i class="fas fa-plus"></i></a>
								</div><!-- End add-new-->
							</div><!-- End column-->
							<div class="col text-right">
								<div class="tools-btns">
									<a href="#"><i class="fas fa-print" data-toggle="tooltip" data-html="true" title="" data-original-title="Print" onclick="window.print();"></i></a>
								
								</div><!-- End tool-btns-->
							</div><!-- End text-right-->

						</div>
					 
					</div>
					<div class="box" id="info_block" >
					 
                      
						<div class="hotel-listing-form" id="details_form">
							       
					

	<!-- textarea to editor -->
	<h1 style="color:black;"> &#160 <?=$this->lang->line($service_edit['type']);?></h1>
	
<br>
  <div class="hotel-listing-form">
                            <form class="text-center" method="POST">
                                

                                <div action="<?=base_url('redaqtor/update_service_gallery/')?><?php echo $service_edit['type'];?>" class="dropzone needsclick dz-clickable" id="demo-upload">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <div class="dz-message needsclick">
                                        <p>
                                            <?=$this->lang->line('Drop files here or click to upload.');?>
                                        </p>
                                        
                                    </div>

                                </div><!-- end dropzone -->

                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <button type="submit" class="btn"><?=$this->lang->line('Save');?></button>
                                    </li>
                                    
                                </ul>

                            </form>
                        </div><!-- end hotel-listing-form -->
                        <div style=" margin:auto; margin-top:100px;">

                         <div class="container" >
    <?php $raod=1; ?>
        <?php if (!empty($images)) foreach ($images as $images_item): ?>
  <div class="mySlides">
    <div class="numbertext" >
      <div class="dropdown">
  <p class="dropbtn"><?=$this->lang->line('Settings');?></p>
  <div class="dropdown-content">
      <a href="<?=base_url('redaqtor/set_as_service_main_image/')?><?php echo $images_item['file_name']; ?>/<?php echo $service_edit['type']; ?>"><?=$this->lang->line('Set as main');?></a>
      <a href="<?=base_url('redaqtor/delete_service_image/')?><?php echo $images_item['file_name'].'/'.$service_edit['type']; ?>"><?=$this->lang->line('Delete');?></a>
    
    
  </div>
</div>
    </div>

    <img src="<?=base_url();?>assets/images/services/<?php echo $images_item['file_name']; ?>" style="max-width:100%;max-height:400px;" >
  </div>
  <?php $raod++; ?>
<?php endforeach; ?>
   
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  <div class="caption-container">
    <p id="caption"></p>
  </div>

  <div class="row">
    <?php $raode=1; ?>
        <?php if (!empty($imagess)) foreach ($imagess as $imagess_item): ?>
    <div class="column">
      <img class="demo cursor" src="<?=base_url();?>assets/images/services/<?php echo $imagess_item['file_name']; ?>" style="width:100%;max-height:80px;" onclick="currentSlide(<?php echo $raode; ?>)">
    </div>
   <?php $raode++; ?>
<?php endforeach; ?>
</div>
</div>
                      </div>
<script>
$('.jqte-test').jqte();
</script>

<hr>

<h3>

							</form>
						</div><!-- end hotel-listing-form -->
					</div><!-- end box -->
                   
                    


				</div><!-- end in-content-wrapper -->
			</div><!-- end add-details -->
		</section>
		<!-- ===========End Innerpage-wrapper============= -->
		
	</div><!-- end wrapper -->
	<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>

