<section class="page-breadcumb-area bg-with-black">
    <div class="container text-center">
        <h2 class="title">Our Students </h2>
        <ul class="links">
            <li><a href="<?php echo site_url(); ?>"><?php echo $this->lang->line('home'); ?></a></li>
            <li><a href="javascript:void(0);">Our Students</a></li>
        </ul>
    </div>
</section>

<section class="top-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="top-banner-content">
                    <h2 class="title">
                        Our Students
                    </h2>
                    <div class="text">                        
                                      
                    </div>                    
                </div>
            </div>            
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center our_students">
            <div class="top-banner-img">
                             <a href="<?= site_url() ?>"><<</a>      
                </div>
            </div>
        </div>

        <div class="row">
          <?php foreach($students as $AllStudents) { ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <figure class="studentsbox">
                  <img src="<?= base_url('assets/uploads/student-photo/'.$AllStudents->photo) ?>" alt=""/>
                  <div class="price"><?= $AllStudents->class ?></div>
                  <figcaption>
                    <h3><?= $AllStudents->name ?></h3>
                    <h4><strong>Marks</strong> : <?= $AllStudents->obtained_marks.'/'.$AllStudents->total_marks ?></h4>
                  </figcaption>
                </figure>
            </div>
          <?php } ?>

        </div>
    </div>
</section>
