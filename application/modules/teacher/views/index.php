<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-users"></i><small> <?php echo $this->lang->line('manage_teacher'); ?></small></h3>
                <ul class="nav navbar-left panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content quick-link">
                <strong> <?php echo $this->lang->line('quick_link'); ?>: </strong>
                <?php if(has_permission(VIEW, 'teacher', 'teacher')){ ?>
                   <a href="<?php echo site_url('teacher/index'); ?>"><?php echo $this->lang->line('manage_teacher'); ?> </a>                    
                <?php } ?>
                <?php if(has_permission(VIEW, 'frontend', 'frontend')){ ?>
                   | <a href="<?php echo site_url('frontend/index'); ?>"><?php echo $this->lang->line('manage_frontend'); ?> </a>
                <?php } ?>
            </div>
            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">
                    
                    <ul  class="nav nav-tabs bordered">
                        <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="#tab_teacher_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('teacher'); ?> <?php echo $this->lang->line('list'); ?></a> </li>
                        
                        <?php if(has_permission(ADD, 'teacher', 'teacher')){ ?>
                        <li  class=""><a href="#tab_add_teacher"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('teacher'); ?></a> </li>                          
                        <?php } ?>  
                        
                        <?php if(isset($edit)){ ?>
                            <li  class="active"><a href="#tab_edit_teacher"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> <?php echo $this->lang->line('teacher'); ?></a> </li>                          
                        <?php } ?>   
                            
                         <?php if(isset($detail)){ ?>
                            <li  class="active"><a href="#tab_view_teacher"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> <?php echo $this->lang->line('teacher'); ?></a> </li>                          
                        <?php } ?> 

                        <li class="<?php if(isset($import_teacher)){ echo 'active'; }?>"><a href="#tab_teacher_import"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-plus-square-o"></i>Import Incharge List</a> </li>

                        <li class="<?php if(isset($import_teacher)){ echo 'active'; }?>"><a href="#tab_teacher_view"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-eye"></i>View Incharge List</a> </li>  
                            
                    </ul>
                    <br/>

                    <?php if(isset($errors)){ ?>

                        <!-- <div class="alert alert-danger" style="color: white!important;"><?php // $errors; ?></div> -->
                    <?php } ?>

    
                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_teacher_list" >
                            <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('sl_no'); ?></th>
                                        <th><?php echo 'Role'; ?></th>
                                        <th><?php echo 'Code'; ?></th>
                                        <th><?php echo $this->lang->line('name'); ?></th>
                                        <th><?php echo 'Qualification'; ?></th>
                                        <th><?php echo 'Designation'; ?></th>
                                        <th><?php echo 'Total Experience'; ?></th>
                                        <th><?php echo $this->lang->line('join_date'); ?></th>
                                        <th><?php echo $this->lang->line('is_view_on_web'); ?></th>
                                        <th><?php echo $this->lang->line('action'); ?></th>                                            
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php  $count = 1; if(isset($teachers) && !empty($teachers)){ ?>
                                        <?php foreach($teachers as $obj){ ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $obj->type;?></td>
                                            <td><?php echo $obj->teacher_code; ?></td>
                                            <td><?php echo ucfirst($obj->teacher_name); ?></td>
                                            <td><?php echo $obj->qualification; ?></td>
                                            <td><?php echo $obj->designation; ?></td>
                                            <td><?php echo $obj->total_experience; ?></td>
                                            <td><?php echo $obj->date_of_joining; ?></td>
                                            <td><?php echo $obj->status==1 ? $this->lang->line('yes') : $this->lang->line('no'); ?></td>
                                            <td>
                                                <?php if(has_permission(EDIT, 'teacher', 'teacher')){ ?>
                                                    <a href="<?php echo site_url('teacher/edit/'.$obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a><br/>
                                                <?php } ?> 
                                                <?php if(has_permission(VIEW, 'teachers', 'teacher')){ ?>
                                                    <a  onclick="get_teacher_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-teacher-modal-lg"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a><br/>
                                                <?php } ?>
                                                <?php if(has_permission(DELETE, 'teacher', 'teacher')){ ?>
                                                    <a href="<?php echo site_url('teacher/delete/'.$obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                <?php } ?> 
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>

                        <div  class="tab-pane fade in <?php if(isset($add)){ echo 'active'; }?>" id="tab_add_teacher">
                            <div class="x_content"> 
                               <?php echo form_open_multipart(site_url('teacher/add'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('basic'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                    </div>
                                </div>
                                <div class="row">

                                <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="type"><?php echo "Role"; ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="type"  id="type" value="<?php echo isset($post['type']) ?  $post['type'] : ''; ?>" placeholder="<?php echo "Type"; ?>" required="required" type="text">
                                            <div class="help-block"><?php echo form_error('type'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="teacher_code"><?php echo "Code"; ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="teacher_code"  id="teacher_code" value="<?php echo isset($post['teacher_code']) ?  $post['teacher_code'] : ''; ?>" placeholder="<?php echo "Code"; ?>" required="required" type="text">
                                            <div class="help-block"><?php echo form_error('teacher_code'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="name"><?php echo $this->lang->line('name'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="name"  id="name" value="<?php echo isset($post['name']) ?  $post['name'] : ''; ?>" placeholder="<?php echo $this->lang->line('name'); ?>" required="required" type="text">
                                            <div class="help-block"><?php echo form_error('name'); ?></div> 
                                        </div>
                                    </div>
                                   
                                   
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="phone"><?php echo $this->lang->line('phone'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="phone"  id="phone" value="<?php echo isset($post['phone']) ?  $post['phone'] : ''; ?>" placeholder="<?php echo $this->lang->line('phone'); ?>" required="required" type="number">
                                            <div class="help-block"><?php echo form_error('phone'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="email"><?php echo $this->lang->line('email'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="email"  id="email" value="<?php echo isset($post['email']) ?  $post['email'] : ''; ?>" placeholder="<?php echo $this->lang->line('email'); ?>" required="email" type="email" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('email'); ?></div>
                                        </div>
                                    </div>     
                                    
                                
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="gender"><?php echo $this->lang->line('gender'); ?> <span class="required">*</span></label>
                                             <select  class="form-control col-md-7 col-xs-12"  name="gender"  id="gender" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php $genders = get_genders(); ?>
                                                <?php foreach($genders as $key=>$value){ ?>
                                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                        <div class="help-block"><?php echo form_error('gender'); ?></div> 
                                        </div>
                                    </div>

                                 
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="dob"><?php echo $this->lang->line('birth_date'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="dob"  id="add_dob" value="<?php echo isset($post['dob']) ?  $post['dob'] : ''; ?>" placeholder="<?php echo $this->lang->line('birth_date'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('dob'); ?></div>
                                        </div>
                                    </div>
                                    
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="item form-group">
                                            <label for="present_address"><?php echo $this->lang->line('present'); ?> <?php echo $this->lang->line('address'); ?> </label>
                                            <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="present_address"  id="present_address" placeholder="<?php echo $this->lang->line('present'); ?> <?php echo $this->lang->line('address'); ?>"><?php echo isset($post['present_address']) ?  $post['present_address'] : ''; ?></textarea>
                                            <div class="help-block"><?php echo form_error('present_address'); ?></div>
                                        </div>
                                    </div>
                                
                                    
                                </div>                                                                                
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('academic'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                    </div>
                                </div>
                                <div class="row"> 
                                                                  
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="email"><?php echo 'Qualification'; ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="qualification"  id="qualification" value="<?php echo isset($post['qualification']) ?  $post['qualification'] : ''; ?>" placeholder="<?php echo 'Qualification'; ?>" required="email" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('email'); ?></div>
                                        </div>
                                    </div>  

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="email"><?php echo 'Designation'; ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="designation"  id="designation" value="<?php echo isset($post['designation']) ?  $post['designation'] : ''; ?>" placeholder="<?php echo 'Designation'; ?>" required="email" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('designation'); ?></div>
                                        </div>
                                    </div>  

                                  
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="date_of_joining"><?php echo "Date Of Joining"; ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="date_of_joining"  id="date_of_joining" value="<?php echo isset($post['date_of_joining']) ?  $post['date_of_joining'] : ''; ?>" placeholder="<?php echo "Date Of Joining"; ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('date_of_joining'); ?></div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="total_experience"><?php echo "Total Experience"; ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="total_experience"  id="total_experience" value="<?php echo isset($post['total_experience']) ?  $post['total_experience'] : ''; ?>" placeholder="<?php echo "Total Experience"; ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('total_experience'); ?></div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="status"><?php echo $this->lang->line('is_view_on_web'); ?> </label>
                                            <select  class="form-control col-md-7 col-xs-12" name="status" id="status">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                                <option value="1"><?php echo $this->lang->line('yes'); ?></option>                                           
                                                <option value="0"><?php echo $this->lang->line('no'); ?></option>                                           
                                            </select>
                                            <div class="help-block"><?php echo form_error('status'); ?></div>
                                        </div>
                                    </div>
                                    
                                   
                                 
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" name="role_id" id="role_id" value="<?php echo TEACHER; ?>" />
                                        <a href="<?php echo site_url('teacher'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  

                        <?php if(isset($edit)){ ?>
                        
                        <div class="tab-pane fade in active" id="tab_edit_teacher">
                            <div class="x_content"> 
                            <?php echo form_open_multipart(site_url('teacher/edit/'. $teacher->id), array('name' => 'editteacher', 'id' => 'editteacher', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('basic'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                    </div>
                                </div>
                                <div class="row">
                                <input  class="form-control col-md-7 col-xs-12"  name="id"  id="id" value="<?php echo isset($teacher->id) ?  $teacher->id : ''; ?>" placeholder="<?php echo "Teacher ID"; ?>" required="required" type="hidden">

                                <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="item form-group">
                                            <label for="type"><?php echo "Role"; ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="type"  id="type" value="<?php echo isset($teacher->type) ?  $teacher->type : ''; ?>" placeholder="<?php echo "Type"; ?>" required="required" type="text">
                                            <div class="help-block"><?php echo form_error('type'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="teacher_code"><?php echo "Code"; ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="teacher_code"  id="teacher_code" value="<?php echo isset($teacher->teacher_code) ?  $teacher->teacher_code : ''; ?>" placeholder="<?php echo "Code"; ?>" required="required" type="text">
                                            <div class="help-block"><?php echo form_error('teacher_code'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="name"><?php echo $this->lang->line('name'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="name"  id="name" value="<?php echo isset($teacher->teacher_name) ?  $teacher->teacher_name : ''; ?>" placeholder="<?php echo $this->lang->line('name'); ?>" required="required" type="text">
                                            <div class="help-block"><?php echo form_error('name'); ?></div> 
                                        </div>
                                    </div>
                                 
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="phone"><?php echo $this->lang->line('phone'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="phone"  id="phone" value="<?php echo isset($teacher->phone_no) ?  $teacher->phone_no : ''; ?>" placeholder="<?php echo $this->lang->line('phone'); ?>" required="required" type="text">
                                            <div class="help-block"><?php echo form_error('phone'); ?></div> 
                                        </div>
                                    </div>     
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="email"><?php echo $this->lang->line('email'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="email"  id="email" value="<?php echo isset($teacher->email_id) ?  $teacher->email_id : ''; ?>" placeholder="<?php echo $this->lang->line('email'); ?>" required="email" type="email" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('email'); ?></div>
                                        </div>
                                    </div>     
                                
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="gender"><?php echo $this->lang->line('gender'); ?> <span class="required">*</span></label>
                                             <select  class="form-control col-md-7 col-xs-12"  name="gender"  id="gender" required="required">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php $genders = get_genders(); ?>
                                                <?php foreach($genders as $key=>$value){ ?>
                                                    <option value="<?php echo $key; ?>" <?php if($teacher->gender_id == $key){ echo 'selected="selected"';} ?>><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                        <div class="help-block"><?php echo form_error('gender'); ?></div> 
                                        </div>
                                    </div>
                                  
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="dob"><?php echo $this->lang->line('birth_date'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="dob"  id="edit_dob" value="<?php echo isset($teacher->birth_date) ?  date('m-d-Y',strtotime($teacher->birth_date)) : ''; ?>" placeholder="<?php echo $this->lang->line('birth_date'); ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('dob'); ?></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="item form-group">
                                            <label for="present_address"><?php echo $this->lang->line('present'); ?> <?php echo $this->lang->line('address'); ?> </label>
                                            <textarea  class="form-control col-md-7 col-xs-12 textarea-4column"  name="present_address"  id="present_address" placeholder="<?php echo $this->lang->line('present'); ?> <?php echo $this->lang->line('address'); ?>"><?php echo isset($teacher->present_address) ?  $teacher->present_address : ''; ?></textarea>
                                            <div class="help-block"><?php echo form_error('present_address'); ?></div>
                                        </div>
                                    </div>
                                    
                                   
                                </div>                                                      
                                                             
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('academic'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                    </div>
                                </div>
                                <div class="row"> 
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="email"><?php echo 'Qualification'; ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="qualification"  id="qualification" value="<?php echo isset($teacher->qualification) ?  $teacher->qualification : ''; ?>" placeholder="<?php echo 'Qualification'; ?>" required="email" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('email'); ?></div>
                                        </div>
                                    </div>                                 
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="email"><?php echo 'Designation'; ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="designation"  id="designation" value="<?php echo isset($teacher->designation) ?  $teacher->designation : ''; ?>" placeholder="<?php echo 'Designation'; ?>" required="email" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('designation'); ?></div>
                                        </div>
                                    </div>  


                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="date_of_joining"><?php echo "Date Of Joining"; ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="date_of_joining"  id="edit_joining_date" value="<?php echo isset($teacher->date_of_joining) ?  date('d-m-Y', strtotime($teacher->date_of_joining)) : ''; ?>" placeholder="<?php echo "Date Of Joining"; ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('date_of_joining'); ?></div>
                                        </div>
                                    </div>
               
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="total_experience"><?php echo "Total Experience"; ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="total_experience"  id="total_experience" value="<?php echo isset($teacher->total_experience) ?  $teacher->total_experience : ''; ?>" placeholder="<?php echo "Total Experience"; ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('total_experience'); ?></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="is_view_on_web"><?php echo $this->lang->line('is_view_on_web'); ?> </label>
                                            <select  class="form-control col-md-7 col-xs-12" name="status" id="status">
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                    
                                                <option value="1" <?php if($teacher->status == 1){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('yes'); ?></option>                                           
                                                <option value="0" <?php if($teacher->status == 0){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('no'); ?></option>                                           
                                            </select>
                                            <div class="help-block"><?php echo form_error('is_view_on_web'); ?></div>
                                        </div>
                                    </div>
                                  
                                </div>
                                
                            
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" name="id" id="id" value="<?php echo $teacher->id; ?>" />
                                        <a href="<?php echo site_url('teacher'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('update'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  
                        
                        <?php } ?>

                        <div  class="tab-pane fade in <?php if(isset($import_teacher)){ echo 'active'; }?>" id="tab_teacher_import">
                            <div class="x_content"> 
                            <a href="<?= base_url('assets/csv/Class incharges details.xlsx')?>" class="btn btn-warning">Download Excel for Import Teachers</a>

                              <form method="post" action="<?= base_url('teacher/importquestions') ?>"  enctype="multipart/form-data">
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong>Import Class Incharge:</strong></h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="item form-group">
	                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Excel File
	                                    </label>
	                                    <div class="col-md-6 col-sm-6 col-xs-12">
	                                        <div class="btn btn-default btn-file">
	                                            <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
	                                            <input class="form-control col-md-7 col-xs-12" type="file"  name="fileURL" accept=".csv,.xlsx"  required id='image'>
	                                        </div>
	                                   
	                                    </div>
	                                </div>
                            
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                       <button type="submit" class="btn btn-danger">Import File </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div> 

                        <div  class="tab-pane fade in <?php if(isset($inchargelist)){ echo 'active'; }?>" id="tab_teacher_view" >
                            <div class="x_content">
                            <table id="inchargelist_datable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('sl_no'); ?></th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Class</th>
                                        <th>Section</th>                                            
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php  $count = 1; if(isset($incharge_list) && !empty($incharge_list)){ ?>
                                        <?php foreach($incharge_list as $obj){ ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $obj->name;?></td>
                                            <td><?php echo $obj->email; ?></td>
                                            <td><?php echo $obj->class_name; ?></td>
                                            <td><?php echo $obj->class_section; ?></td>
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div> 
                 
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <form method="post" action="<?= base_url('teacher/importquestions') ?>"  enctype="multipart/form-data">
        <input type="file"  name="fileURL" accept=".csv,.xlsx"  required>
        <br>
        <br>
        <button type="submit" class="btn btn-primary">Import Questions </button>
       
    </form> -->
<div class="modal fade bs-teacher-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title"><?php echo $this->lang->line('teacher'); ?> <?php echo $this->lang->line('information'); ?></h4>
        </div>
        <div class="modal-body fn_teacher_data">
            
        </div>       
      </div>
    </div>
</div>
<script type="text/javascript">
         
    function get_teacher_modal(teacher_id){
         
        $('.fn_teacher_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo IMG_URL; ?>loading.gif" /></p>');
        $.ajax({       
          type   : "POST",
          url    : "<?php echo site_url('teacher/get_single_teacher'); ?>",
          data   : {teacher_id : teacher_id},  
          success: function(response){                                                   
             if(response)
             {
                $('.fn_teacher_data').html(response);
             }
          }
       });
    }
</script>
  

<!-- datatable with buttons -->
<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
 <script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
<!-- datatable with buttons -->
 <script type="text/javascript">
     
    $('#add_dob').datepicker({ startView: 2 });
    $('#date_of_joining').datepicker();
    $('#edit_dob').datepicker({ startView: 2 });
    $('#edit_joining_date').datepicker();
    
        $(document).ready(function() {
          $('#datatable-responsive').DataTable( {
              dom: 'Bfrtip',
              iDisplayLength: 15,
              buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5',
                  'pageLength'
              ],
              search: true
          });
          $('#inchargelist_datable').DataTable( {
              dom: 'Bfrtip',
              iDisplayLength: 15,
              buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5',
                  'pageLength'
              ],
              search: true
          });
        });
        
    $("#add").validate();     
    $("#edit").validate();    
</script>