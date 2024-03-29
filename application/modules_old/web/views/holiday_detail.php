<section class="page-breadcumb-area bg-with-black">
    <div class="container text-center">
        <h2 class="title"><?php echo $this->lang->line('holiday'); ?></h2>
        <ul class="links">
            <li><a href="<?php echo site_url(); ?>"><?php echo $this->lang->line('home'); ?></a></li>
            <li><a href="<?php echo site_url('holiday'); ?>"><?php echo $this->lang->line('holidays'); ?></a></li>
            <li><a href="javascript:void(0);"><?php echo $this->lang->line('holiday'); ?> <?php echo $this->lang->line('detail'); ?></a></li>
        </ul>
    </div>
</section>

<section class="page-notice-details-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="page-notice">
                    <?php if(isset($holiday) && !empty($holiday)){ ?>  
                        <h2 class="title"><?php echo $holiday->title; ?></h2>
                        <h5 class="date">
                            <span class="icon"><i class="far fa-calendar-alt"></i></span><span class="info"> <?php echo date($this->setting->sms_date_format, strtotime($holiday->date_from)); ?></span>
                            <span class="seprator"> ⇔ </span>
                            <span class="icon"><i class="far fa-calendar-alt"></i></span><span class="info"> <?php echo date($this->setting->sms_date_format, strtotime($holiday->date_to)); ?></span>
                        </h5>
                        <div class="text"><?php echo $holiday->note; ?></div>
                    <?php }else{ ?>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <p class="text-center"><strong><?php echo $this->lang->line('no_data_found'); ?></strong></p>
                        </div>
                <?php } ?>
                </div>
            </div>
            
            <div class="col-lg-4 offset-lg-0 col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-12">
                <div class="sidebar">
                    <div class="sidebar-widget">
                        <h2 class="sidebar-title"><?php echo $this->lang->line('latest'); ?> <?php echo $this->lang->line('holiday'); ?></h2>
                        <ul class="widget-notice">
                          <?php if(isset($holidays) && !empty($holidays)){ ?>  
                            <?php foreach($holidays as $obj){ ?>  
                              <li>
                                  <a href="<?php echo site_url('holiday-detail/'.$obj->id); ?>">
                                      <span class="title"><?php echo $obj->title; ?></span>
                                      <h5 class="date">
                                        <span class="icon"><i class="far fa-calendar-alt"></i></span><span class="info"> <?php echo date($this->setting->sms_date_format, strtotime($obj->date_from)); ?></span>
                                        <span class="seprator"> ⇔ </span>
                                        <span class="icon"><i class="far fa-calendar-alt"></i></span><span class="info"> <?php echo date($this->setting->sms_date_format, strtotime($obj->date_to)); ?></span>
                                    </h5>
                                  </a>
                              </li>
                            <?php } ?>
                          <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>