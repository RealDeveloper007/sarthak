<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
  .carousel-indicators li {
	background-color: rgb(42, 63, 84);
	border: 1px solid #2a3f54;
}
  </style>
<section class="page-breadcumb-area bg-with-black">
    <div class="container text-center">
        <h2 class="title"><?php echo $page->page_title; ?></h2>
        <ul class="links">
            <li><a href="<?php echo site_url(); ?>"><?php echo $this->lang->line('home'); ?></a></li>
            <li><a href="javascript:void(0);"><?php echo $page->page_title; ?></a></li>
        </ul>
    </div>
</section>

<?php if (isset($page) && !empty($page)) { ?>
    <section class="top-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                                <li data-target="#myCarousel" data-slide-to="3"></li>
                                <li data-target="#myCarousel" data-slide-to="4"></li>
                                <li data-target="#myCarousel" data-slide-to="5"></li>
                                <li data-target="#myCarousel" data-slide-to="6"></li>
                                <li data-target="#myCarousel" data-slide-to="7"></li>
                                <li data-target="#myCarousel" data-slide-to="8"></li>
                                <li data-target="#myCarousel" data-slide-to="9"></li>
                                <li data-target="#myCarousel" data-slide-to="10"></li>
<li data-target="#myCarousel" data-slide-to="11"></li>
<li data-target="#myCarousel" data-slide-to="12"></li>
<li data-target="#myCarousel" data-slide-to="13"></li>
<li data-target="#myCarousel" data-slide-to="14"></li>
<li data-target="#myCarousel" data-slide-to="15"></li>

                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="<?= base_url('assets/images/mandatory_public_disclosure') ?>/1. cbse General information (1).jpg">
                                </div>

                                <div class="item">
                                    <img src="<?= base_url('assets/images/mandatory_public_disclosure') ?>/2. Affiliation Certificate-0.jpg">
                                </div>

                                <div class="item">
                                <img src="<?= base_url('assets/images/mandatory_public_disclosure') ?>/3. Affiliation Certificate-1.jpg">
                                </div>

                                <div class="item">
                                <img src="<?= base_url('assets/images/mandatory_public_disclosure') ?>/4. Affiliation Certificate-2.jpg">
                                </div>

                                <div class="item">
                                <img src="<?= base_url('assets/images/mandatory_public_disclosure') ?>/5. Affiliation Certificate-3.jpg">
                                </div>

                                <div class="item">
                                <img src="<?= base_url('assets/images/mandatory_public_disclosure') ?>/6. Affiliation Certificate-4.jpg">
                                </div>

                                <div class="item">
                                <img src="<?= base_url('assets/images/mandatory_public_disclosure') ?>/7. Affiliation Certificate-5.jpg">
                                </div>

                                <div class="item">
                                <img src="<?= base_url('assets/images/mandatory_public_disclosure') ?>/9.Building Safety Certificate-page-0.jpg">
                                </div>
                                
                                 <div class="item">
                                <img src="<?= base_url('assets/images/mandatory_public_disclosure') ?>/10. Affiliation Certificate-6.jpg">
                                </div>
                                
                                 <div class="item">
                                <img src="<?= base_url('assets/images/mandatory_public_disclosure') ?>/11.Fire NOC.jpg">
                                </div>
                                
                                 <div class="item">
                                <img src="<?= base_url('assets/images/mandatory_public_disclosure') ?>/12. SMC LIST.jpeg">
                                </div>
<div class="item">
                                <img src="<?= base_url('assets/images/mandatory_public_disclosure') ?>/mandatory pg 1_1.jpg">
                                </div>
<div class="item">
                                <img src="<?= base_url('assets/images/mandatory_public_disclosure') ?>/mandatory pg 2_1.jpg">
                                </div>
<div class="item">
                                <img src="<?= base_url('assets/images/mandatory_public_disclosure') ?>/fees structure pg 1_1.jpg">
                                </div>
<div class="item">
                                <img src="<?= base_url('assets/images/mandatory_public_disclosure') ?>/fees structure pg2_1.jpg">
                                </div>
<div class="item">
                                <img src="<?= base_url('assets/images/mandatory_public_disclosure') ?>/fees structure pg3_1.jpg">
                                </div>
                                </div>

                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                </div>



            </div>
        </div>
    </section>
<?php } ?>