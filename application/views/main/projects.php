   <!--================Our Project2 Area =================-->
        <section class="our_project2_area our_project_two_column">
            <div class="main_c_b_title">
                <h2><?=$this->lang->line('Current projects');?></h2>
            </div>
           
            <div class="our_project_details">
                <?php if (!empty($projects)) foreach ($projects as $projects_item): ?>

                <div class="col-md-6 building isolation interior" style="float:left;">
                    <div class="project_item">
                        <img src="<?=base_url();?>assets/images/projects/<?php echo $projects_item['file_name']; ?>" alt="<?php echo $projects_item[$this->lang->line('project_title_lang')]; ?>">
                        <div class="project_hover">
                            <div class="project_hover_inner">
                                <div class="project_hover_content">
                                    <a href="<?=base_url('main/project_details');?>/<?php echo $projects_item['code']; ?>"><h4><?php echo $this->lang->line($projects_item['object']); ?></h4></a>
                                    <a class="view_btn" href="<?=base_url('main/project_details');?>/<?php echo $projects_item['code']; ?>"><?=$this->lang->line('View more');?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        	    <?php endforeach; ?>

            </div>
        </section>