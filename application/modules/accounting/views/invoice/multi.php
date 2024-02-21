<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-calculator"></i><small> <?php echo $this->lang->line('print_multi_invoice'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content quick-link no-print">
               <strong> <?php echo $this->lang->line('quick_link'); ?>: </strong>
               <?php if(has_permission(VIEW, 'accounting', 'discount')){ ?>
                    <a href="<?php echo site_url('accounting/discount/index'); ?>"><?php echo $this->lang->line('discount'); ?></a>                  
                <?php } ?> 
              
               <?php if(has_permission(VIEW, 'accounting', 'feetype')){ ?>
                  | <a href="<?php echo site_url('accounting/feetype/index'); ?>"><?php echo $this->lang->line('fee_type'); ?></a>                  
                <?php } ?> 
                
                <?php if(has_permission(VIEW, 'accounting', 'invoice')){ ?>
                   
                   <?php if($this->session->userdata('role_id') == STUDENT || $this->session->userdata('role_id') == GUARDIAN){ ?>
                        | <a href="<?php echo site_url('accounting/invoice/due'); ?>"><?php echo $this->lang->line('due_invoice'); ?></a>                    
                   <?php }else{ ?>
                        | <a href="<?php echo site_url('accounting/invoice/add'); ?>"><?php echo $this->lang->line('fee'); ?> <?php echo $this->lang->line('collection'); ?></a>
                        | <a href="<?php echo site_url('accounting/invoice/index'); ?>"><?php echo $this->lang->line('manage_invoice'); ?></a>
                        | <a href="<?php echo site_url('accounting/invoice/due'); ?>"><?php echo $this->lang->line('due_invoice'); ?></a>                    
                        | <a href="<?php echo site_url('accounting/invoice/multi'); ?>"><?php echo $this->lang->line('print_multi_invoice'); ?></a>
                    <?php } ?> 
                <?php } ?> 
                  
                <?php if(has_permission(VIEW, 'accounting', 'duefeeemail')){ ?>
                   | <a href="<?php echo site_url('accounting/duefeeemail/index'); ?>"><?php echo $this->lang->line('due_fee'); ?> <?php echo $this->lang->line('email'); ?></a>                  
                <?php } ?>
                 <?php if(has_permission(VIEW, 'accounting', 'duefeesms')){ ?>
                   | <a href="<?php echo site_url('accounting/duefeesms/index'); ?>"><?php echo $this->lang->line('due_fee'); ?> <?php echo $this->lang->line('sms'); ?></a>                  
                <?php } ?>         
                        
                 <?php if(has_permission(VIEW, 'accounting', 'incomehead')){ ?>
                  | <a href="<?php echo site_url('accounting/incomehead/index'); ?>"><?php echo $this->lang->line('income_head'); ?></a>                  
                <?php } ?> 
                 <?php if(has_permission(VIEW, 'accounting', 'income')){ ?>
                   | <a href="<?php echo site_url('accounting/income/index'); ?>"><?php echo $this->lang->line('income'); ?></a>                     
                <?php } ?>  
                <?php if(has_permission(VIEW, 'accounting', 'exphead')){ ?>
                   | <a href="<?php echo site_url('accounting/exphead/index'); ?>"><?php echo $this->lang->line('expenditure_head'); ?></a>                  
                <?php } ?> 
                <?php if(has_permission(VIEW, 'accounting', 'expenditure')){ ?>
                   | <a href="<?php echo site_url('accounting/expenditure/index'); ?>"><?php echo $this->lang->line('expenditure'); ?></a>                  
                <?php } ?> 
            </div>
            
            <div class="x_content">
                
                <div class="x_content filter-box no-print"> 
                <?php echo form_open_multipart(site_url('accounting/invoice/multi'), array('name' => 'multi', 'id' => 'multi', 'class' => 'form-horizontal form-label-left'), ''); ?>
                <div class="row">  
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="item form-group"> 
                                <?php echo $this->lang->line('invoice'); ?> <?php echo $this->lang->line('type'); ?> <span class="required">*</span>
                                <select  class="form-control col-md-7 col-xs-12" name="type_id" id="type_id" required="required">
                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                    <?php foreach ($feetypes as $obj) { ?>
                                    <option value="<?php echo $obj->id; ?>" <?php if(isset($type_id) && $type_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $obj->title; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="item form-group"> 
                                <div><?php echo $this->lang->line('class'); ?> <span class="required">*</span></div>
                                <select  class="form-control col-md-7 col-xs-12" name="class_id" id="class_id"  required="required" onchange="get_section_by_class(this.value,'');">
                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                    <?php foreach ($classes as $obj) { ?>
                                    <option value="<?php echo $obj->id; ?>" <?php if(isset($class_id) && $class_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $obj->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="item form-group"> 
                                <div><?php echo $this->lang->line('month'); ?> <span class="required">*</span></div>
                                <input  class="form-control col-md-7 col-xs-12"  name="month"  id="month" value="<?php echo isset($month) ?  $month : ''; ?>" placeholder="<?php echo $this->lang->line('month'); ?>" required="required" type="text" autocomplete="off">
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group"><br/>
                            <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('find'); ?></button>
                        </div>
                    </div>
                                        
                </div>
                <?php echo form_close(); ?>
            </div>

                
                <?php if(isset($invoices) && !empty($invoices)){ ?>
                <?php foreach($invoices AS $obj){ ?> 
                
                    <section class="content invoice profile_img text-left">                    
                         <!-- title row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-header  invoice-col">
                                <h1><?php echo $this->lang->line('invoice'); ?></h1>
                            </div>
                            <div class="col-sm-4 invoice-header  invoice-col">&nbsp;</div>
                            <div class="col-sm-4 invoice-header  invoice-col">
                                <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $this->gsms_setting->logo; ?>" alt="" width="70" />
                            </div>
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 col-md-4 invoice-col">
                                <strong><?php echo $this->lang->line('school'); ?>:</strong>
                                <address>
                                    <?php echo $this->gsms_setting->school_name; ?>
                                    <br><?php echo $this->gsms_setting->address; ?>
                                    <br><?php echo $this->lang->line('phone'); ?>: <?php echo $this->gsms_setting->phone; ?>
                                    <br><?php echo $this->lang->line('email'); ?>: <?php echo $this->gsms_setting->email; ?>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 col-md-4 invoice-col">
                                <strong><?php echo $this->lang->line('student'); ?>:</strong>
                                <address>
                                    <?php echo $obj->student_name; ?>
                                    <br><?php echo $obj->present_address; ?>
                                    <br><?php echo $this->lang->line('class'); ?>: <?php echo $obj->class_name; ?>
                                    <br><?php echo $this->lang->line('phone'); ?>: <?php echo $obj->phone; ?>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 col-md-4 invoice-col">
                                <b><?php echo $this->lang->line('invoice'); ?> #<?php echo $obj->custom_invoice_id; ?></b>                                                     
                                <br>
                                <b><?php echo $this->lang->line('payment'); ?> <?php echo $this->lang->line('status'); ?>:</b> <span class="btn-success"><?php echo get_paid_status($obj->paid_status); ?></span>
                                <br>
                                <b><?php echo $this->lang->line('date'); ?>:</b> <?php echo date($this->gsms_setting->sms_date_format, strtotime($obj->date)); ?>
                            </div>
                            <!-- /.col -->
                        </div>                       
                </section>
                <section class="content invoice">
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('sl_no'); ?></th>
                                        <th><?php echo $this->lang->line('fee_type'); ?></th>
                                        <th><?php echo $this->lang->line('amount'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>                                  
                                    <tr>
                                        <td  style="width:15%"><?php echo 1; ?></td>
                                        <td  style="width:60%"> <?php echo $obj->head; ?></td>
                                        <td><?php echo $this->gsms_setting->currency_symbol; ?><?php echo $obj->gross_amount; ?></td>
                                    </tr>                                         
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-6">
                            <!--<p class="lead"><?php echo $this->lang->line('payment'); ?> <?php echo $this->lang->line('method'); ?>:</p>-->
                            <img src="<?php echo IMG_URL; ?>visa.png" alt="Visa">
                            <img src="<?php echo IMG_URL; ?>mastercard.png" alt="Mastercard">
                            <img src="<?php echo IMG_URL; ?>american-express.png" alt="American Express">
                            <img src="<?php echo IMG_URL; ?>paypal.png" alt="Paypal">                         
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-6">
                            <?php $paid_amount = get_invoice_paid_amount($obj->id); ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th style="width:50%"><?php echo $this->lang->line('subtotal'); ?>:</th>
                                            <td><?php echo $this->gsms_setting->currency_symbol; ?><?php echo $obj->gross_amount; ?></td>
                                        </tr>
                                        <tr>
                                            <th><?php echo $this->lang->line('discount'); ?></th>
                                            <td><?php echo $this->gsms_setting->currency_symbol; ?><?php  echo $obj->inv_discount; ?></td>
                                        </tr>
                                        <tr>
                                            <th><?php echo $this->lang->line('total'); ?>:</th>
                                            <td><?php echo $this->gsms_setting->currency_symbol; ?><?php echo $obj->net_amount; ?></td>
                                        </tr>
                                        <tr>
                                            <th><?php echo $this->lang->line('paid'); ?> <?php echo $this->lang->line('amount'); ?>:</th>
                                            <td><?php echo $this->gsms_setting->currency_symbol; ?><?php echo $paid_amount ? $paid_amount : 0.00; ?></td>
                                        </tr>
                                        <tr>
                                            <th><?php echo $this->lang->line('due_amount'); ?>:</th>
                                            <td><span class="btn-danger" style="padding: 5px;"><?php echo $this->gsms_setting->currency_symbol; ?><?php echo $obj->net_amount-$paid_amount; ?></span></td>
                                        </tr>
                                        <?php if($obj->paid_status == 'paid'){ ?>
                                            <tr>
                                                <th><?php echo $this->lang->line('invoice'); ?> <?php echo $this->lang->line('date'); ?>:</th>
                                                <td><?php echo date($this->gsms_setting->sms_date_format, strtotime($obj->date)); ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <section>
                    <hr>
                    <div class="pagebreak">&nbsp;</div>
                </section>
                <?php } ?>
                <section>                    
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> <?php echo $this->lang->line('print'); ?></button>
                        </div>
                    </div>
                </section>
                
                <?php } ?>
                
            </div>
        </div>
    </div>
</div>

  <!-- bootstrap-datetimepicker -->
 <link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
 <script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
 
 <script type="text/javascript">
      $("#month").datepicker( {
            format: "mm-yyyy",
            startView: "months", 
            minViewMode: "months"
        });
    $("#multi").validate();  
</script>
