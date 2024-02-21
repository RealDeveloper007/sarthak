<section class="page-breadcumb-area bg-with-black">
    <div class="container text-center">
        <h2 class="title"><?php echo $this->lang->line('result'); ?></h2>
        <ul class="links">
            <li><a href="<?php echo site_url(); ?>"><?php echo $this->lang->line('home'); ?></a></li>
            <li><a href="javascript:void(0);"><?php echo $this->lang->line('result'); ?></a></li>
        </ul>
    </div>
</section>

<section class="page-news-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="form login_form">
                <section><h1 class="text-center">Fill the below details </h1></section> 
                <br>   
                <section class="login_content">
                    <div class="text-center mb-3">
                        <p class="red"><?php echo $this->session->flashdata('error'); ?></p>
                        <p class="green"><?php echo $this->session->flashdata('success'); ?></p>
                    </div>
                    <?php echo form_open(site_url('check_result'), array('name' => 'login', 'id' => 'login'), ''); ?>
                    <div class="text-center">
                        <input type="text" name="srn" class="form-control has-feedback-left" placeholder="SRN">
                    </div>
                    <br>
                    <div class="text-center form-group has-feedback">
                        <input type="password" name="dob" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Password">
                    </div>                    
                   
                    <div class=" text-center">
                        <input type="submit" name="submit" value="submit" class="btn btn-primary login-button"/>
                    </div>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                        <!-- <a class="reset_pass btn btn-primary login-button" href="<?php // echo site_url('forgot') ?>"><?php //echo $this->lang->line('lost_your_password'); ?></a>; -->
                    </div>
                    <div class="clearfix"></div>                        
                    <?php echo form_close(); ?>
                </section>
            </div>
            </div>
        </div>
    </div>
</section>

<style>
/* 
.page-news-area {
    padding: 0px 0 0px !important;
} */

section.login_content {
max-width: 720px;
    margin: 0 auto;
}
section.login_content form input {border-radius: 0;padding: 16px  !important; min-height: 60px !important;border-color: #000 !important;font-size: 16px;box-shadow: none !important;}
section.login_content form input.login-button {
    border: none;
    padding: 14px 20px !important;
    min-height: auto !important;
    margin-top: 10px;
    background-color: #e80000;
    text-transform: capitalize;
}
p.red {
    color: red;
    font-size: 20px;
}

</style>