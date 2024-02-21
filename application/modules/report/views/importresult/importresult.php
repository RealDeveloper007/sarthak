<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                 <?php if(isset($academic_year)){ ?>
                                   <div><?php echo $this->lang->line('academic_year'); ?>: <?php echo $academic_year; ?></div>
                                   <?php } ?>
                <h3 class="head-title"><i class="fa fa-bar-chart"></i><small> Import <?php echo $this->lang->line('result'); ?> of <b><?php echo 'Class : '.$userdetail->class_name.'-'.$userdetail->class_section; ?></b></small> </h3>                
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            
             <div class="col-md-8 col-md-offset-4"> 
                <?php echo form_open_multipart(site_url('report/importresult'), array('name' => 'actbalance', 'id' => 'importresult', 'class' => 'form-horizontal form-label-left'), ''); ?>
                <div class="row">                    
                <?php 
                if($userdetail->signature != '') { ?> 
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="item form-group"> 
                            <b>Upload Excel Result File</b><br>
                            <input class="form-control col-md-7 col-xs-12" type="file"  name="fileURL" accept=".csv,.xlsx"  required id='image'>
                        </div>
                    </div>
    
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group"><br/>
                            <button id="send" type="submit" class="btn btn-success">Import Result</button>
                        </div>
                    </div>

                     <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group"><br/>
                            <?php if($userdetail->class_name > 0 && $userdetail->class_name < 3) { ?>
                                <a href="<?= base_url('assets/csv/1-2-resultsheet.xlsx')?>" class="btn btn-warning">Download Excel for Import Result</a>
                            <?php } elseif($userdetail->class_name > 8 && $userdetail->class_name < 11) { ?>
                                <a href="<?= base_url('assets/csv/9-resultsheet.xlsx')?>" class="btn btn-warning">Download Excel for Import Result</a>
                             <?php } elseif($userdetail->class_name > 2 && $userdetail->class_name < 9) { ?>
                                <!--<a href="<?= base_url('assets/csv/3-8-resultsheet.xlsx')?>" class="btn btn-warning">Download Excel for Import Result</a>-->
                            <?php }  else { ?>
                                <?php $explode_section = explode('-',$userdetail->class_section); ?>
                                <?php if($explode_section[0] == 'Arts') { ?>
                                     <a href="<?= base_url('assets/csv/11-Art-Resultsheet.xlsx')?>" class="btn btn-warning">Download Excel for Import Result</a>
                                <?php } elseif($explode_section[0] == 'Commerce') { ?>
                                    <a href="<?= base_url('assets/csv/11-commerce-resultsheet.xlsx')?>" class="btn btn-warning">Download Excel for Import Result</a>
                                <?php } elseif($explode_section[0] == 'Medical') { ?>
                                    <a href="<?= base_url('assets/csv/11-Medical-Resultsheet.xlsx')?>" class="btn btn-warning">Download Excel for Import Result</a>
                                <?php }elseif($explode_section[0] == 'NonMedical'){ ?>
                                     <a href="<?= base_url('assets/csv/11-Medical-Resultsheet.xlsx')?>" class="btn btn-warning">Download Excel for Import Result</a>
                                <?php } ?>    
                            <?php } ?>    
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-danger" role="alert">
                      Please upload signature before import result 
                    </div>
                <?php } ?>    
                </div>
                <?php echo form_close(); ?>
            </div>

        
        </div>
    </div>
</div>
<style>
input[type=file] {
    display: block;
    position: absolute;
    position: absolute;
    top: 21px;
    right: 0px;
    min-width: 100%;
    min-height: 100%;
    font-size: 10px;
   text-align: left;
    opacity: 1;
    filter: alpha(opacity=0);
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
.x_panel {
        min-height: 400px;
}
</style>
