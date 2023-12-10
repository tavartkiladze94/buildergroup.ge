<style>
    .box-checkbox
    {height:auto;
        
    }
</style>

<br>
<section class="flat-breadcrumb">
			<div class="container" >
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumbs">
							<li class="trail-item">
								<a href="#" title=""><?=$this->lang->line('Home');?></a>
								<span><img src="<?=base_url();?>assets/images/icons/arrow-right.png" alt=""></span>
							</li>
							<li class="trail-item">
								<a href="#" title=""><?=$this->lang->line('News');?></a>
								
							</li>
							
						</ul><!-- /.breacrumbs -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section>
		<main id="shop" class="style2">
			<div class="container" >
				<div class="row">
					<div class="col-md-12">
						<div class="main-shop">
							<div class="wrap-imagebox">
								<div class="sort-product style1">
								     <form action="<?=base_url('main/news_search')?>" method="POST" >
							
									<div class="sort">
<div class="popularity">
									    <select   name="category" width="">
					                    <option value="Politics"><?=$this->lang->line('Politics');?></option>
                                        <option value="Art"><?=$this->lang->line('Art');?></option>
                                        <option value="Science"><?=$this->lang->line('Science');?></option>
                                        <option value="Education"><?=$this->lang->line('Education');?></option>
                                        <option value="Tourism"><?=$this->lang->line('Tourism');?></option>
                                        <option value="Economic"><?=$this->lang->line('Economic');?></option>
                                        <option value="Ecology"><?=$this->lang->line('Ecology');?></option>
                                        <option value="Fashion"><?=$this->lang->line('Fashion');?></option>
                                        <option value="Medicine"><?=$this->lang->line('Medicine');?></option>
                                        <option value="Society"><?=$this->lang->line('Society');?></option>
                                        <option value="Culinary"><?=$this->lang->line('Culinary');?></option>
                                      </select>
									
									</div><!-- /.sort -->
									<div class="clearfix"></div>
										<div>
											<input type="submit" value="<?=$this->lang->line('Search');?>" style="background-color:#55b536; color:white;">
										</div>
									</div><!-- /.sort -->
									<div class="clearfix"></div>
									</form>
									
								</div><!-- /.sort-product style1 -->
								<div class="row">
								    <?php foreach ($news as $news_item): ?>
									<div class="col-lg-3 col-md-4 col-sm-6">
										<div class="product-box">
											<div class="imagebox">
												<span class="item-new"><?=$this->lang->line('New');?></span>
												<div class="box-image owl-carousel-1 ">
														<div class="image">
														<a href="<?=base_url('main/news_details');?>/<?php echo $news_item['code']; ?>" title="">
															<img src="<?=base_url();?>assets/images/news/<?php echo $news_item['file_name']; ?>" alt="<?php echo $news_item['file_name']; ?>" style="width:100%;  height:180px;">
														</a>
													</div>
												</div><!-- /.box-image -->
											<div class="box-content">
												    <div style="left:5px;"><div style="width:50%;float:left;">ID : <?php echo $news_item['code']; ?></div>
												    <div style="left:5px;"><i class="fas fa-eye" style="color: #55b536;"></i><span><?php echo $news_item['view']; ?></span></div></div>
													
													<div class="product-name">
														<a href="<?=base_url('main/news_details');?>/<?php echo $news_item['code']; ?>" title=""><?php echo $news_item[$this->lang->line('project_title_lang')]; ?></a>
													
													</div>
												
												</div><!-- /.box-content -->
												<div class="box-bottom">
													<div class="btn-add-cart">
														<a href="<?=base_url('main/news_details');?>/<?php echo $news_item['code']; ?>" title="">
														    <?=$this->lang->line('View more');?>
														</a>
													</div>
													
												</div><!-- /.box-bottom -->
											</div><!-- /.imagebox -->
										</div><!-- /.product-box -->
									</div><!-- /.col-lg-3 col-md-4 col-sm-6 -->
								
								<?php endforeach; ?>
							</div><!-- /.wrap-imagebox -->
							<div class="blog-pagination style1">
							    <ul class="flat-pagination style1">
									<?php echo $links; ?>
								</ul>
							
								<div class="clearfix"></div>
							</div><!-- /.blog-pagination -->
						</div><!-- /.main-shop -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
			</div>
		</main><!-- /#shop -->

		<section class="flat-row flat-highlights style1">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="flat-row-title">
							<h3>Bestsellers</h3>
						</div><!-- /.flat-row-title -->
						<ul class="product-list style1 v2">
							<li>
								<div class="img-product">
									<a href="#" title="">
										<img src="images/product/highlights/10.jpg" alt="">
									</a>
								</div>
								<div class="info-product">
									<div class="name">
										<a href="#" title="">Razer RZ02-01071500-R3M1</a>
									</div>
									<div class="queue">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</div>
									<div class="price">
										<span class="sale">$50.00</span>
										<span class="regular">$2,999.00</span>
									</div>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<div class="img-product">
									<a href="#" title="">
										<img src="images/product/highlights/9.jpg" alt="">
									</a>
								</div>
								<div class="info-product">
									<div class="name">
										<a href="#" title="">Apple iPad Mini G2356</a>
									</div>
									<div class="queue">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</div>
									<div class="price">
										<span class="sale">$24.00</span>
										<span class="regular">$2,999.00</span>
									</div>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<div class="img-product">
									<a href="#" title="">
										<img src="images/product/highlights/8.jpg" alt="">
									</a>
								</div>
								<div class="info-product">
									<div class="name">
										<a href="#" title="">Beats Pill + Portable Speaker</a>
									</div>
									<div class="queue">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</div>
									<div class="price">
										<span class="sale">$90.00</span>
										<span class="regular">$2,999.00</span>
									</div>
								</div>
								<div class="clearfix"></div>
							</li>
						</ul><!-- /.product-list style1 -->
					</div><!-- /.col-md-4 -->
					<div class="col-md-4">
						<div class="flat-row-title">
							<h3>Featured</h3>
						</div><!-- /.flat-row-title -->
						<ul class="product-list style1">
							<li>
								<div class="img-product">
									<a href="#" title="">
										<img src="images/product/highlights/3.jpg" alt="">
									</a>
								</div>
								<div class="info-product">
									<div class="name">
										<a href="#" title="">Razer RZ02-01071500-R3M1</a>
									</div>
									<div class="queue">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</div>
									<div class="price">
										<span class="sale">$50.00</span>
										<span class="regular">$2,999.00</span>
									</div>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<div class="img-product">
									<a href="#" title="">
										<img src="images/product/highlights/2.jpg" alt="">
									</a>
								</div>
								<div class="info-product">
									<div class="name">
										<a href="#" title="">Apple iPad Mini G2356</a>
									</div>
									<div class="queue">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</div>
									<div class="price">
										<span class="sale">$24.00</span>
										<span class="regular">$2,999.00</span>
									</div>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<div class="img-product">
									<a href="#" title="">
										<img src="images/product/highlights/1.jpg" alt="">
									</a>
								</div>
								<div class="info-product">
									<div class="name">
										<a href="#" title="">Beats Pill + Portable Speaker</a>
									</div>
									<div class="queue">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</div>
									<div class="price">
										<span class="sale">$90.00</span>
										<span class="regular">$2,999.00</span>
									</div>
								</div>
								<div class="clearfix"></div>
							</li>
						</ul><!-- /.product-list style1 -->
					</div><!-- /.col-md-4 -->
					<div class="col-md-4">
						<div class="flat-row-title">
							<h3>Hot Sale</h3>
						</div><!-- /.flat-row-title -->
						<ul class="product-list style1">
							<li>
								<div class="img-product">
									<a href="#" title="">
										<img src="images/product/highlights/19.jpg" alt="">
									</a>
								</div>
								<div class="info-product">
									<div class="name">
										<a href="#" title="">Razer RZ02-01071500-R3M1</a>
									</div>
									<div class="queue">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</div>
									<div class="price">
										<span class="sale">$50.00</span>
										<span class="regular">$2,999.00</span>
									</div>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<div class="img-product">
									<a href="#" title="">
										<img src="images/product/highlights/11.jpg" alt="">
									</a>
								</div>
								<div class="info-product">
									<div class="name">
										<a href="#" title="">Apple iPad Mini G2356</a>
									</div>
									<div class="queue">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</div>
									<div class="price">
										<span class="sale">$24.00</span>
										<span class="regular">$2,999.00</span>
									</div>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<div class="img-product">
									<a href="#" title="">
										<img src="images/product/highlights/20.jpg" alt="">
									</a>
								</div>
								<div class="info-product">
									<div class="name">
										<a href="#" title="">Beats Pill + Portable Speaker</a>
									</div>
									<div class="queue">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</div>
									<div class="price">
										<span class="sale">$90.00</span>
										<span class="regular">$2,999.00</span>
									</div>
								</div>
								<div class="clearfix"></div>
							</li>
						</ul><!-- /.product-list style1 -->
					</div><!-- /.col-md-4 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-highlights -->

	<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}
function onlyUnique(value, index, self) { 
    return self.indexOf(value) === index;
}
var address =[];
<?php foreach ($news_all as $news_item): ?>
/*An array containing all the country names in the world:*/
 address.push("<?php echo $news_item['city'];?>");
 address.push("<?php echo $news_item['address'];?>");
<?php endforeach; ?>
var unique = address.filter( onlyUnique );
/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("city"), unique);
</script>