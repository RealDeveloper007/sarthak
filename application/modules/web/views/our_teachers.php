<section class="page-breadcumb-area bg-with-black">
    <div class="container text-center">
        <h2 class="title">Our Teachers </h2>
        <ul class="links">
            <li><a href="<?php echo site_url(); ?>"><?php echo $this->lang->line('home'); ?></a></li>
            <li><a href="javascript:void(0);">Our Teachers</a></li>
        </ul>
    </div>
</section>

<section class="top-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="top-banner-content">
                    <h2 class="title">
                        Our Teachers
                    </h2>
                    <div class="text">                        
                                      
                    </div>                    
                </div>
            </div>            
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center our_teachers">
                <div class="top-banner-img">
                             <a href="<?= site_url() ?>"><<</a>      
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-striped table-hover teachert">
                  <thead class="bgColor">
                    <tr>
                      <th scope="col">Sr.No</th>
                      <th scope="col">Role</th>
                      <th scope="col">Name</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Qualification</th>
                      <th scope="col">Designation</th>
                      <th scope="col">Date of Joining</th>
                      <th scope="col">Total Experience</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach($teachers as $AllTeachers) { ?>
                    <tr>
                      <td><?= $i++;?></td>
                      <td><?= $AllTeachers->type ?></td>
                      <td><?= $AllTeachers->teacher_name ?></td>
                      <td><?= $AllTeachers->gender_id=='male' ? 'Male' : 'Female' ?></td>
                      <td><?= $AllTeachers->qualification ?></td>
                      <td><?= $AllTeachers->designation ?></td>
                      <td><?= $AllTeachers->date_of_joining ?></td>
                      <td><?= $AllTeachers->total_experience	 ?></td>

                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
            </div>
        </div> 
    </div>
</section>
