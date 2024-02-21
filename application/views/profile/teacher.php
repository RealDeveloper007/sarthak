<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-lock"></i><small> <?php echo $this->lang->line('my_profile'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content quick-link">
                 <strong><?php echo $this->lang->line('quick_link'); ?>:</strong>                
                 <a href="<?php echo site_url('profile'); ?>"><?php echo $this->lang->line('my_profile'); ?></a>
                | <a href="<?php echo site_url('profile/password'); ?>"><?php echo $this->lang->line('reset_password'); ?></a>
                
                <?php if($this->session->userdata('role_id') == GUARDIAN){ ?>
                    | <a href="<?php echo site_url('guardian/invoice'); ?>"><?php echo $this->lang->line('invoice'); ?></a>
                    | <a href="<?php echo site_url('guardian/feedback'); ?>"><?php echo $this->lang->line('feedback'); ?></a>
                <?php } ?>
                <?php if($this->session->userdata('role_id') == STUDENT){ ?>
                    | <a href="<?php echo site_url('accounting/invoice/due'); ?>"><?php echo $this->lang->line('invoice'); ?></a>
                <?php } ?>
                
                <?php if(has_permission(VIEW, 'usercomplain', 'usercomplain')){ ?>
                    | <a href="<?php echo site_url('usercomplain/index'); ?>"><?php echo $this->lang->line('complain'); ?></a>
                <?php } ?>
                <?php if(has_permission(VIEW, 'userleave', 'userleave')){ ?>
                    | <a href="<?php echo site_url('userleave/index'); ?>"><?php echo $this->lang->line('leave'); ?></a>    
                <?php } ?>
                          
               | <a href="<?php echo site_url('auth/logout'); ?>"><?php echo $this->lang->line('logout'); ?></a>                 
            </div>
            
            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">                    
                    <ul  class="nav nav-tabs bordered">
                        <!-- <li class="<?php if(isset($info)){ echo 'active'; }?>"><a href="#tab_profile"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-eye"></i> <?php echo $this->lang->line('profile'); ?></a> </li> -->
                      <!--   <li class=""><a href="#tab_social_info"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-share"></i> <?php echo $this->lang->line('social'); ?> <?php echo $this->lang->line('information'); ?></a> </li> -->
                        <li  class="active"><a href="#tab_update"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('profile'); ?></a> </li>                          
                    </ul>
                    <br/>                    
                    <div class="tab-content">                  

                        <div  class="tab-pane fade in" id="tab_profile">
                            <div class="x_content">  
                                <div class="col-md-12">
                                    <div class="profile_img">
                                        <?php if($profile->photo){ ?>
                                            <img src="<?php echo UPLOAD_PATH; ?>/teacher-photo/<?php echo $profile->photo; ?>" alt="" width="100" />
                                        <?php }else{ ?>
                                            <img class="" src="<?php echo IMG_URL; ?>default-user.png" width="100" alt="Avatar" title="Change the avatar">
                                        <?php } ?>
                                        <h3><?php echo $profile->name; ?></h3><br/>
                                      </div>
                                  </div>
                                
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <tbody>
                                        <tr>
                                            <th width="18%"><?php echo $this->lang->line('name'); ?></th>
                                            <td width="32%"><?php echo $profile->name; ?></td>
                                            <th width="18%"><?php echo $this->lang->line('responsibility'); ?></th>
                                            <td width="32%"><?php echo $profile->responsibility; ?></td>
                                        </tr> 
                                        <tr>                                            
                                            <th><?php echo $this->lang->line('user'); ?> <?php echo $this->lang->line('role'); ?></th>
                                            <td><?php echo $profile->role; ?></td>
                                            <th><?php echo $this->lang->line('national_id'); ?></th>
                                            <td><?php echo $profile->national_id; ?></td>
                                        </tr>
                                        <tr>
                                            <th><?php echo $this->lang->line('email'); ?></th>
                                            <td><?php echo $profile->email; ?></td>
                                            <th><?php echo $this->lang->line('phone'); ?></th>
                                            <td><?php echo $profile->phone; ?></td>
                                        </tr>                                                                                
                                        <tr>
                                            <th><?php echo $this->lang->line('present'); ?> <?php echo $this->lang->line('address'); ?></th>
                                            <td><?php echo $profile->present_address; ?></td>
                                            <th><?php echo $this->lang->line('permanent'); ?> <?php echo $this->lang->line('address'); ?></th>
                                            <td><?php echo $profile->permanent_address; ?></td>
                                        </tr>                                                                                
                                        <tr>
                                            <th><?php echo $this->lang->line('gender'); ?></th>
                                            <td><?php echo $this->lang->line($profile->gender); ?></td>
                                            <th><?php echo $this->lang->line('blood_group'); ?></th>
                                            <td><?php echo $this->lang->line($profile->blood_group); ?></td>
                                        </tr>                                                                                
                                        <tr>
                                            <th><?php echo $this->lang->line('religion'); ?></th>
                                            <td><?php echo $profile->religion; ?></td>
                                            <th><?php echo $this->lang->line('birth_date'); ?></th>
                                            <td><?php echo date($this->gsms_setting->sms_date_format, strtotime($profile->dob)); ?></td>
                                        </tr>                                                                                
                                        <tr>
                                            <th><?php echo $this->lang->line('salary_grade'); ?></th>
                                            <td><?php echo $profile->grade_name; ?></td>
                                            <th><?php echo $this->lang->line('salary_type'); ?></th>
                                            <td><?php echo $this->lang->line($profile->salary_type); ?></td>
                                        </tr>                                                                                
                                                                                                                      
                                        <tr>                                            
                                            <th><?php echo $this->lang->line('other_info'); ?></th>
                                            <td><?php echo $profile->other_info; ?></td>
                                                 <th><?php echo $this->lang->line('resume'); ?></th>
                                            <td>
                                                 <?php if($profile->resume){ ?>
                                                <a target="_blank" href="<?php echo UPLOAD_PATH; ?>/teacher-resume/<?php echo $profile->resume; ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i><?php echo $this->lang->line('download'); ?></a> 
                                                <?php } ?>
                                            </td>
                                        </tr>                                                                                   
                                        <tr>                                       
                                            <th><?php echo $this->lang->line('join_date'); ?></th>
                                            <td><?php echo date($this->gsms_setting->sms_date_format, strtotime($profile->joining_date)); ?></td>
                                            <th><?php echo $this->lang->line('resign_date'); ?></th>
                                            <td><?php echo $profile->resign_date != ''  ? date($this->gsms_setting->sms_date_format, strtotime($profile->resign_date)) : ''; ?></td>
                                        </tr>                                                                                
                                        
                                    </tbody> 
                                </table> 
                            </div>
                        </div>  

                           <div  class="tab-pane fade in" id="tab_social_info" > 
                            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <tbody>           
                                <tr>
                                    <th width="18%"><?php echo $this->lang->line('facebook_url'); ?></th>
                                    <td width="32%"><?php echo $profile->facebook_url; ?></td>       
                                    <th width="18%"><?php echo $this->lang->line('linkedin_url'); ?></th>
                                    <td width="32%"><?php echo $profile->linkedin_url; ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo $this->lang->line('twitter_url'); ?></th>
                                    <td><?php echo $profile->twitter_url; ?></td>        
                                    <th><?php echo $this->lang->line('google_plus_url'); ?></th>
                                    <td><?php echo $profile->google_plus_url; ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo $this->lang->line('instagram_url'); ?></th>
                                    <td><?php echo $profile->instagram_url; ?></td>        
                                    <th><?php echo $this->lang->line('pinterest_url'); ?></th>
                                    <td><?php echo $profile->pinterest_url; ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo $this->lang->line('youtube_url'); ?></th>
                                    <td><?php echo $profile->youtube_url; ?></td>        
                                    <th><?php echo $this->lang->line('is_view_on_web'); ?></th>
                                    <td><?php echo $profile->is_view_on_web ? $this->lang->line('yes') : $this->lang->line('no'); ?></td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                       

                       
                        <div class="tab-pane fade in active" id="tab_update">
                           <div class="x_content"> 
                            <?php echo form_open_multipart(site_url('profile/update/'. $profile->id), array('name' => 'profile', 'id' => 'profile', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('basic'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                    </div>
                                </div>
                               <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="name"><?php echo $this->lang->line('name'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="name"  id="name" value="<?php echo isset($profile->name) ?  $profile->name : ''; ?>" placeholder="<?php echo $this->lang->line('name'); ?>" required="required" type="text">
                                            <div class="help-block"><?php echo form_error('name'); ?></div> 
                                        </div>
                                    </div>
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="email"><?php echo $this->lang->line('email'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="email"  readonly="readonly"  id="email" value="<?php echo isset($profile->email) ?  $profile->email : ''; ?>" placeholder="<?php echo $this->lang->line('email'); ?>" required="email" type="email" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('email'); ?></div>
                                        </div>
                                    </div> 
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="signature">Signature  <span class="required">*</span></label>                                           
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                <input  class="form-control col-md-7 col-xs-12"  name="signature"  id="signature" type="file">
                                            </div>
                                            <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                            <div class="help-block"><?php echo form_error('signature'); ?></div>
                                        </div>
                                    </div>  
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <input type="hidden" name="prev_signature" id="prev_signature" value="<?php echo $profile->signature; ?>" />
                                            <?php if($profile->signature){ ?>
                                            <img src="<?php echo UPLOAD_PATH; ?>/teacher-sign/<?php echo $profile->signature; ?>" alt="" width="150" /><br/><br/>
                                            <?php } ?>
                                        </div>
                                    </div>
                                
                               </div>

                         
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('profile'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <input type="hidden" name="id" id="id" value="<?php echo $profile->id; ?>" />
                                        <input type="hidden" name="user_type" id="user_type" value="teacher" />
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('update'); ?></button>
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

  <!-- bootstrap-datetimepicker -->
 <link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
 <script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
 <script type="text/javascript">
     
  $('#dob').datepicker();
  $("#profile").validate(); 
  </script> 