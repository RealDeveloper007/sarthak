<section class="page-breadcumb-area bg-with-black">
    <div class="container text-center">
        <h2 class="title">Our Courses </h2>
        <ul class="links">
            <li><a href="<?php echo site_url(); ?>"><?php echo $this->lang->line('home'); ?></a></li>
            <li><a href="javascript:void(0);">Our Courses</a></li>
        </ul>
    </div>
</section>

<section class="top-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="top-banner-content">
                    <h3 class="intro"><?php //echo $this->lang->line('welcome_to'); ?></h3>
                    <h2 class="title">
                        <?php if(isset($this->setting->school_name) && !empty($this->setting->school_name)){ ?>
                            <?php echo 'Our Courses'; ?>
                        <?php }else{ ?>
                              <?php echo SMS; ?>
                        <?php } ?>
                    </h2>
                    <div class="text">                        
                         <?php echo $this->setting->courses_text; ?>                       
                    </div>                    
                </div>
            </div>            
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center">
                <div class="top-banner-img">
                    <?php if(isset($this->setting->course_image) && !empty($this->setting->course_image)){ ?>
                            <img src="<?php echo UPLOAD_PATH; ?>about/<?php echo $this->setting->course_image; ?>" alt="">
                    <?php }else{ ?>
                            <img src="<?php echo IMG_URL; ?>about-image.jpg" alt="">
                    <?php } ?>                    
                </div>
            </div>
        </div>
    </div>
</section>