
<section class="section bg-light">
<div class="container">
<div class="row">
        <?php foreach ($projects as $projects_item): ?>

<div class="col-lg-4 col-md-6 element-animate fadeInUp element-animated">
<div class="media d-block media-custom text-left">
 <img src="<?=base_url();?>webuilder/building/<?php echo $projects_item['file_name']; ?>" alt="<?php echo $projects_item[$this->lang->line('project_title_lang')]; ?>" class="img-fluid" style="width:380px;height:222px;max-height:222px;">
<div class="media-body">
<span class="meta-post"><?php echo $projects_item['date']; ?></span>
<h3 class="mt-0 text-black"><a href="#" class="text-black"><?php echo $projects_item[$this->lang->line('project_title_lang')]; ?></a></h3>
<p>მოკლე აღწერა.</p>
<p class="clearfix">
<a href="<?=base_url('main/project_details');?>/<?php echo $projects_item['code']; ?>" class="float-left"> <?php echo $this->lang->line('View_more'); ?></a>
</p>
</div>
</div>
</div>
	<?php endforeach; ?>

</div>
</div>
</section>