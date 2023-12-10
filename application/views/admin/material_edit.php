



<style>


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
  background-color: #373334;
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


.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}

                .div1{
        width:100%; 

    }
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
.dropzone .dz-message:before {

    top:15px;
}
  
</style>


<div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
              <div class="col-12">
                <h2 class="content-header-title float-left mb-0">სიახლეები</h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?=base_url('admin/index')?>"><?=$this->lang->line('Home');?></a>
                    </li>
                    
                    <li class="breadcrumb-item"><a href="<?=base_url('admin/building_materials')?>"><?=$this->lang->line('Building materials');?></a>
                    </li>
                    <li class="breadcrumb-item active"><?=$this->lang->line($material_edit['category']);?>
                    </li>
                   
                  </ol>
                </div>
              </div>
            </div>
          </div>
          
        </div>
<div class="content-body"><!-- Basic Inputs start -->
<section id="basic-input" >
    <form class="text-center" action="<?=base_url('admin/material_update/')?><?php echo $material_edit['category'];?>" method="POST">
       
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">რედაქტირება -<?=$this->lang->line($material_edit['category']);?></h4>
        </div>
        <div class="card-body">
          <div class="row">
          
          
            <div class="col-xl-4 col-md-6 col-12">
                <div class="form-group">
											<label for="model" class="">მასალის დასახელება:</label>
												<input type="text" name="category" placeholder="პრობლემის  დასახელება"  value="<?=$this->lang->line($material_edit['category']);?> " style="width:100%; height:40px;" disabled> 

										</div>          
			</div>
			<br>
            <div class="col-xl-4 col-12">
              <div class="form-group">
											<label for="city" class="">მასალის აღწერა</label>
											<textarea name="text" placeholder="მასალის აღწერა" style="width:100%; height:200px;" ><?php echo $material_edit['text'];?></textarea>
										</div>
            </div>
            <br>
        
    
          	
        </div>
        
      </div>
    </div>
    <div class="row">
    <div class="col-12">
      <div class="card">
       
        <div class="card-body">
          
          <div action="<?=base_url('admin/update_material_gallery/')?><?php echo $material_edit['category'];?>" class="dropzone dropzone-area" id="dpz-multiple-files" style="min-height:150px;">
            <div class="dz-message"><?=$this->lang->line('Drop files here or click to upload.');?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <br><br><br>
  </div><button class="btn btn-primary waves-effect waves-float waves-light" type="submit" style="margin:auto;"><?=$this->lang->line('Save');?></button>
  </div>
  <br>
  <br>
  </form>

   <div class="container" style="margin-top:50px;border:1px solid #f1d766!important;">
    <?php $raod=1; ?>
        <?php if (!empty($images)) foreach ($images as $images_item): ?>
  <div class="mySlides">
    <div class="numbertext">
      <div class="dropdown">
  <p class="dropbtn"><?=$this->lang->line('Settings');?></p>
  <div class="dropdown-content">
      <a href="<?=base_url('admin/set_as_material_main_image/')?><?php echo $images_item['file_name']; ?>/<?php echo $images_item['category']; ?>"><?=$this->lang->line('Set as main');?></a>
      <a href="<?=base_url('admin/delete_material_image/')?><?php echo $images_item['file_name']; ?>/<?php echo $images_item['category']; ?>"><?=$this->lang->line('Delete');?></a>
    
    
  </div>

     </div>
    </div>
     <div class="numbertext" style="float:left; margin-left:100px;">
      <div class="dropdown">
 
  <p style="background:black;"><a href="<?=base_url()?>assets/images/building_materials/<?php echo $images_item['file_name']; ?>" download>ჩამოტვირთვა</a></p>
    
    

</div>
    </div>

    <img src="<?=base_url();?>assets/images/building_materials/<?php echo $images_item['file_name'];?>"  style=" padding-left:12%;min-height:450px;max-height:450px;" >
  </div>
  <?php $raod++; ?>
<?php endforeach; ?>
   
  <a class="prev" onclick="plusSlides(-1)" style="text-align:left!important;">❮</a>
  <a class="next" onclick="plusSlides(1)" style="text-align:right;">❯</a>

  <div class="caption-container">
    <p id="caption"></p>
  </div>

  <div class="row">
    <?php $raode=1; ?>
        <?php if (!empty($imagess)) foreach ($imagess as $imagess_item): ?>
    <div class="column" style="width:13%!important;">
      <img class="demo cursor" src="<?=base_url();?>assets/images/building_materials/<?php echo $imagess_item['file_name'];?>" style="width:100%;max-height:80px; border:1px solid black" onclick="currentSlide(<?php echo $raode; ?>)">
    </div>
   <?php $raode++; ?>
<?php endforeach; ?>
</div>
</div>
<br>
<br>
<br>
<br>
</section>

<!-- Dropzone section end -->

        </div>
      </div>
    </div>
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