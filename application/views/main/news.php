<br>
<br>
<section class="banner_area">
            <div class="container">
                <div class="banner_inner_text">
                    <h4><?=$this->lang->line('News');?></h4>
                    <ul>
                        <li><a href="#"><?=$this->lang->line('Home');?></a></li>
                        <li class="active"><a href="#"><?=$this->lang->line('News');?></a></li>
                    </ul>
                </div>
            </div>
        </section>

<section class="latest_news_area">
            <div class="container">
               
                <div class="row latest_news_inner">
                    <?php foreach ($news as $news_item): ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="latest_news_item">
                            <div class="news_image">
                                <img class="news_image" src="<?=base_url();?>assets/images/news/<?php echo $news_item['file_name']; ?>" alt="">
                                
                            </div>
                            <div class="news_content">
                                <a href="<?=base_url('main/news_details');?>/<?php echo $news_item['code']; ?>"><h4><?php echo $news_item[$this->lang->line('project_title_lang')]; ?></h4></a>
                                <p><?php echo $news_item[$this->lang->line('project_short_text_lang')]; ?></p>
                               
                                <div class="pull-right">
                                    <a href="<?=base_url('main/news_details');?>/<?php echo $news_item['code']; ?>"><?php echo $this->lang->line('View more') ; ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>