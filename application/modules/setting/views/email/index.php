<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-gears "></i><small> <?php echo $this->lang->line('email'); ?> <?php echo $this->lang->line('setting'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
                
            </div>
            <div class="x_content quick-link">
                <strong> <?php echo $this->lang->line('quick_link'); ?>: </strong>
                <?php if(has_permission(VIEW, 'setting', 'setting')){ ?>
                    <a href="<?php echo site_url('setting'); ?>"><?php echo $this->lang->line('general'); ?> <?php echo $this->lang->line('setting'); ?></a>
                <?php } ?>
                <?php if(has_permission(VIEW, 'setting', 'payment')){ ?>
                   | <a href="<?php echo site_url('setting/payment'); ?>"><?php echo $this->lang->line('payment'); ?> <?php echo $this->lang->line('setting'); ?></a>
                <?php } ?>
                <?php if(has_permission(VIEW, 'setting', 'sms')){ ?>
                   | <a href="<?php echo site_url('setting/sms'); ?>"><?php echo $this->lang->line('sms'); ?> <?php echo $this->lang->line('setting'); ?></a>                    
                <?php } ?>
                <?php if(has_permission(VIEW, 'setting', 'email')){ ?>
                   | <a href="<?php echo site_url('setting/email'); ?>"><?php echo $this->lang->line('email'); ?> <?php echo $this->lang->line('setting'); ?></a>                    
                <?php } ?>
                <?php if(has_permission(VIEW, 'frontend', 'frontend')){ ?>
                   | <a href="<?php echo site_url('frontend/index'); ?>"><?php echo $this->lang->line('manage_frontend'); ?> </a>                    
                <?php } ?>
            </div>
            
            
             <div class="x_content">
                <div class="" data-example-id="togglable-tabs">
                     <ul  class="nav nav-tabs bordered">                     
                        <li  class="active"><a href="#tab_setting"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-gear"></i> <?php echo $this->lang->line('email'); ?> <?php echo $this->lang->line('setting'); ?></a> </li> 
                     </ul>
                     <br/>
                     <div class="tab-content">
                         <div class="tab-pane fade in active"id="tab_setting">
                            <div class="x_content"> 
                                <?php $action = isset($setting) ? 'edit' : 'add'; ?>
                                <?php echo form_open_multipart(site_url('setting/email/'. $action), array('name' => 'setting', 'id' => 'setting', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                <input type="hidden" value="<?php echo isset($setting) ? $setting->id : ''; ?>" name="id" />
                               
                                <div class="item form-group"> 
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mail_protocol"><?php echo $this->lang->line('email'); ?> <?php echo $this->lang->line('protocol'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php $protocols = get_mail_protocol(); ?>
                                        <select  class="form-control col-md-12 col-xs-12"  name="mail_protocol"  id="edit_mail_protocol" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?> --</option> 
                                            <?php foreach($protocols as $key=>$value ){ ?>
                                                <option value="<?php echo $key; ?>" <?php if(isset($setting) && $setting->mail_protocol == $key ){ echo 'selected="selected"';} ?>><?php echo $value; ?></option>
                                            <?php } ?>                                            
                                        </select>
                                        <div class="help-block"><?php echo form_error('mail_protocol'); ?></div>
                                    </div>
                                </div>                                
                                
                                <div class="fn_edit_smtp <?php if(isset($setting) && $setting->mail_protocol != 'smtp'){ echo 'display'; } ?>"> 
                                   
                                <div class="form-group"> 
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="smtp_host"><?php echo $this->lang->line('smtp'); ?> <?php echo $this->lang->line('host'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="smtp_host"  id="edit_smtp_host" value="<?php if(isset($setting)){ echo $setting->smtp_host;} ?>" placeholder="<?php echo $this->lang->line('smtp'); ?> <?php echo $this->lang->line('host'); ?>" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('smtp_host'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="form-group"> 
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="smtp_port"><?php echo $this->lang->line('smtp'); ?> <?php echo $this->lang->line('port'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="smtp_port"  id="edit_smtp_port" value="<?php if(isset($setting)){ echo $setting->smtp_port;} ?>" placeholder="<?php echo $this->lang->line('smtp'); ?> <?php echo $this->lang->line('port'); ?>" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('smtp_port'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="form-group"> 
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="smtp_user"><?php echo $this->lang->line('smtp'); ?> <?php echo $this->lang->line('username'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="smtp_user"  id="edit_smtp_user" value="<?php if(isset($setting)){ echo $setting->smtp_user;} ?>" placeholder="<?php echo $this->lang->line('smtp'); ?> <?php echo $this->lang->line('username'); ?>" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('smtp_user'); ?></div>
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="smtp_pass"><?php echo $this->lang->line('smtp'); ?> <?php echo $this->lang->line('password'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="smtp_pass"  id="edit_smtp_pass" value="<?php if(isset($setting)){ echo $setting->smtp_pass;} ?>" placeholder="<?php echo $this->lang->line('smtp'); ?> <?php echo $this->lang->line('password'); ?>" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('smtp_pass'); ?></div>
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="smtp_crypto"><?php echo $this->lang->line('smtp'); ?> <?php echo $this->lang->line('security'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php $cryptos = get_smtp_crypto(); ?>
                                        <select  class="form-control col-md-12 col-xs-12"  name="smtp_crypto"  id="smtp_crypto" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?> --</option> 
                                            <?php foreach($cryptos as $key=>$value ){ ?>
                                                <option value="<?php echo $key; ?>" <?php if(isset($setting) && $setting->smtp_crypto == $key ){ echo 'selected="selected"';} ?>><?php echo $value; ?></option>
                                            <?php } ?>                                            
                                        </select>
                                        <div class="help-block"><?php echo form_error('smtp_crypto'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="form-group"> 
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="smtp_timeout"><?php echo $this->lang->line('smtp'); ?> <?php echo $this->lang->line('time_out'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="smtp_timeout"  id="smtp_timeout" value="<?php if(isset($setting)){ echo $setting->smtp_timeout;}else{ echo '5'; } ?>" placeholder="<?php echo $this->lang->line('smtp'); ?> <?php echo $this->lang->line('time_out'); ?>" type="number" maxlength="2" max="10"  autocomplete="off">
                                        <div class="text-info">SMTP Timeout (in seconds 5 -10).</div>
                                        <div class="help-block"><?php echo form_error('smtp_timeout'); ?></div>
                                    </div>
                                </div>
                                    
                                </div>
                             
                                <div class="form-group"> 
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="char_set"><?php echo $this->lang->line('char_set'); ?>  </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php $char_sets = get_char_set(); ?>
                                        <select  class="form-control col-md-12 col-xs-12"  name="char_set"  id="char_set" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?> --</option> 
                                            <?php foreach($char_sets as $key=>$value ){ ?>
                                                <option value="<?php echo $key; ?>" <?php if(isset($setting) && $setting->char_set == $key ){ echo 'selected="selected"';} ?>><?php echo $value; ?></option>
                                            <?php } ?>                                            
                                        </select>
                                        <div class="help-block"><?php echo form_error('char_set'); ?></div>
                                    </div>
                                </div>
                                  
                                <div class="form-group"> 
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="priority"><?php echo $this->lang->line('priority'); ?>  </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php $email_priority = get_email_priority(); ?>
                                        <select  class="form-control col-md-12 col-xs-12"  name="priority"  id="priority" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?> --</option> 
                                            <?php foreach($email_priority as $key=>$value ){ ?>
                                                <option value="<?php echo $key; ?>" <?php if(isset($setting) && $setting->priority == $key ){ echo 'selected="selected"';} ?>><?php echo $value; ?></option>
                                            <?php } ?>                                            
                                        </select>
                                        <div class="help-block"><?php echo form_error('priority'); ?></div>
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="from_name"><?php echo $this->lang->line('email'); ?> <?php echo $this->lang->line('from'); ?> <?php echo $this->lang->line('name'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="from_name"  id="from_name" value="<?php if(isset($setting)){ echo $setting->from_name;} ?>" placeholder="<?php echo $this->lang->line('email'); ?> <?php echo $this->lang->line('from'); ?> <?php echo $this->lang->line('name'); ?>" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('from_name'); ?></div>
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="from_address"><?php echo $this->lang->line('email'); ?>  <?php echo $this->lang->line('from'); ?> <?php echo $this->lang->line('address'); ?> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="from_address"  id="from_address" value="<?php if(isset($setting)){ echo $setting->from_address;} ?>" placeholder="<?php echo $this->lang->line('email'); ?>  <?php echo $this->lang->line('from'); ?> <?php echo $this->lang->line('address'); ?>" type="email" required="email" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('from_address'); ?></div>
                                    </div>
                                </div>                              

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button id="send" type="submit" class="btn btn-success"><?php  echo $this->lang->line('update'); ?></button>
                                    </div>
                                </div>

                                <?php echo form_close(); ?>
                            </div>  
                        </div>  
                     </div>
                </div>
             </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#setting").validate();  
    
    $('#mail_protocol').on('change', function(){
        if($(this).val() == 'smtp'){
            $('.fn_add_smtp').show();
            $('#smtp_host').prop('required', true); 
            $('#smtp_port').prop('required', true); 
            $('#smtp_user').prop('required', true); 
            $('#smtp_pass').prop('required', true); 
        }else{
           $('.fn_add_smtp').hide(); 
           $('#smtp_host').prop('required', false); 
            $('#smtp_port').prop('required', false); 
            $('#smtp_user').prop('required', false); 
            $('#smtp_pass').prop('required', false); 
        }
    });
    $('#edit_mail_protocol').on('change', function(){
        if($(this).val() == 'smtp'){
            $('.fn_edit_smtp').show();
            $('#edit_smtp_host').prop('required', true); 
            $('#edit_smtp_port').prop('required', true); 
            $('#edit_smtp_user').prop('required', true); 
            $('#edit_smtp_pass').prop('required', true); 
        }else{
           $('.fn_edit_smtp').hide(); 
           $('#edit_smtp_host').prop('required', false); 
            $('#edit_smtp_port').prop('required', false); 
            $('#edit_smtp_user').prop('required', false); 
            $('#edit_smtp_pass').prop('required', false); 
        }
    });
</script>