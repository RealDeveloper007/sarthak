<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-file-word-o"></i><small> <?php echo $this->lang->line('manage'); ?> <?php echo $this->lang->line('complain'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
           <div class="x_content quick-link">
               <strong><?php echo $this->lang->line('quick_link'); ?>:</strong>
                <?php if(has_permission(VIEW, 'complain', 'type')){ ?>
                    <a href="<?php echo site_url('complain/type'); ?>"> <?php echo $this->lang->line('complain'); ?> <?php echo $this->lang->line('type'); ?></a>
                <?php } ?>
                <?php if(has_permission(VIEW, 'complain', 'complain')){ ?>
                   | <a href="<?php echo site_url('complain'); ?>">  <?php echo $this->lang->line('complain'); ?></a>
                <?php } ?>               
            </div>
            
            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">
                    
                    <ul  class="nav nav-tabs bordered"> 
                        <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="#tab_complain_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('complain'); ?> <?php echo $this->lang->line('list'); ?></a> </li>
                          <?php if(has_permission(ADD, 'complain', 'complain')){ ?>
                            <?php if(isset($edit)){ ?>
                                <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="<?php echo site_url('complain/add'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('complain'); ?></a> </li>                          
                             <?php }else{ ?>
                                 <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="#tab_add_complain"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('complain'); ?></a> </li>                          
                             <?php } ?>
                           
                        <?php } ?>        
                        <?php if(isset($edit)){ ?>
                            <li  class="active"><a href="#tab_edit_complain"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> <?php echo $this->lang->line('complain'); ?></a> </li>                          
                        <?php } ?>               
                        
                    </ul>
                    <br/>
                    
                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_complain_list" >
                            <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('sl_no'); ?></th>                                        
                                        <th><?php echo $this->lang->line('academic_year'); ?></th>
                                        <th><?php echo $this->lang->line('complain'); ?> <?php echo $this->lang->line('by'); ?></th>
                                        <th><?php echo $this->lang->line('complain'); ?> <?php echo $this->lang->line('type'); ?></th>
                                        <th><?php echo $this->lang->line('complain'); ?> <?php echo $this->lang->line('date'); ?></th>
                                        <th><?php echo $this->lang->line('action'); ?> <?php echo $this->lang->line('date'); ?></th>
                                        <th><?php echo $this->lang->line('action'); ?></th>                                             
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php $count = 1; if(isset($complains) && !empty($complains)){ ?>
                                        <?php foreach($complains as $obj){ ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>                                           
                                            <td><?php echo $obj->session_year; ?></td>
                                            <td>
                                                <?php
                                                   $user = get_user_by_role($obj->role_id, $obj->user_id);
                                                   echo $user->name;
                                                ?>
                                                <br/>[<?php echo $this->lang->line('role').': '. $obj->role_name ?> <?php if($obj->role_id == STUDENT){ echo $this->lang->line('class').': '.$user->class_name.', '.$this->lang->line('section').': '.$user->section.', '.$this->lang->line('roll_no').': '.$user->roll_no; } ?>]
                                            </td>
                                            <td><?php echo $obj->type; ?></td>
                                            <td><?php echo date($this->gsms_setting->sms_date_format, strtotime($obj->complain_date)); ?></td>
                                            <td>
                                                <?php if($obj->action_date != ''){ ?>
                                                <?php echo date($this->gsms_setting->sms_date_format, strtotime($obj->action_date)); ?>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if(has_permission(EDIT, 'complain', 'complain')){ ?>
                                                    <a href="<?php echo site_url('complain/edit/'.$obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('update'); ?> <?php echo $this->lang->line('status'); ?> </a>
                                                <?php  } ?>
                                                <?php if(has_permission(VIEW, 'complain', 'complain')){ ?>
                                                    <a  onclick="get_complain_modal(<?php echo $obj->id; ?>);"  data-toggle="modal" data-target=".bs-complain-modal-lg"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a>
                                                <?php  } ?>
                                                <?php if(has_permission(DELETE, 'complain', 'complain')){ ?>
                                                    <a href="<?php echo site_url('complain/delete/'.$obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                <?php  } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
               
                        
                        <div  class="tab-pane fade in <?php if(isset($add)){ echo 'active'; }?>" id="tab_add_complain">
                            <div class="x_content"> 
                               <?php echo form_open_multipart(site_url('complain/add'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role_id"><?php echo $this->lang->line('complain'); ?> <?php echo $this->lang->line('user'); ?> <?php echo $this->lang->line('type'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="role_id"  id="add_role_id" required="required" onchange="get_user_by_role(this.value, '');">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                            <?php if(isset($roles) &&  !empty($roles)){ ?>
                                                <?php foreach($roles as $obj ){ ?>
                                                    <option value="<?php echo $obj->id; ?>" ><?php echo $obj->name; ?></option>
                                                <?php } ?>                                            
                                            <?php } ?>                                            
                                        </select>
                                        <div class="help-block"><?php echo form_error('role_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group display"> 
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_id"><?php echo $this->lang->line('class'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-12 col-xs-12"  name="class_id"  id="add_class_id"  onchange="get_user('', this.value,'');">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>  
                                            <?php if(isset($classes) &&  !empty($classes)){ ?>
                                                <?php foreach($classes as $obj ){ ?>
                                                <option value="<?php echo $obj->id; ?>" ><?php echo $obj->name; ?></option>
                                                <?php } ?> 
                                            <?php } ?> 
                                        </select>
                                        <div class="help-block"><?php echo form_error('class_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_id"><?php echo $this->lang->line('complain'); ?> <?php echo $this->lang->line('user'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="user_id"  id="add_user_id" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                         
                                        </select>
                                        <div class="help-block"><?php echo form_error('user_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type_id"><?php echo $this->lang->line('complain'); ?> <?php echo $this->lang->line('type'); ?><span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="type_id"  id="add_type_id" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                            <?php if(isset($complain_types) && !empty($complain_types)){ ?>
                                                <?php foreach($complain_types as $obj){ ?>
                                                    <option value="<?php echo $obj->id; ?>"><?php echo $obj->type; ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('type_id'); ?></div>
                                    </div>
                                </div>
                                 
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="complain_date"><?php echo $this->lang->line('complain'); ?> <?php echo $this->lang->line('date'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="complain_date"  id="add_complain_date" value="<?php echo isset($complain_date) ?  date('d-m-Y',strtotime($complain_date)) : ''; ?>" placeholder="<?php echo $this->lang->line('complain'); ?> <?php echo $this->lang->line('date'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('complain_date'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description"><?php echo $this->lang->line('complain'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="description"  id="description" placeholder="<?php echo $this->lang->line('complain'); ?>"><?php echo isset($description) ?  $description : ''; ?></textarea>
                                        <div class="help-block"><?php echo form_error('description'); ?></div>
                                    </div>
                                </div> 
                                
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('complain/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  
                        
                        <?php if(isset($edit)){ ?>
                        <div class="tab-pane fade in active" id="tab_edit_complain">
                            <div class="x_content"> 
                               <?php echo form_open_multipart(site_url('complain/edit/'.$complain->id), array('name' => 'edit', 'id' => 'edit', 'class'=>'form-horizontal form-label-left'), ''); ?>
                          
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role_id"><?php echo $this->lang->line('complain'); ?> <?php echo $this->lang->line('user'); ?> <?php echo $this->lang->line('type'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="role_id"  id="edit_role_id" required="required" onchange="get_user_by_role(this.value, '');">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                            <?php if(isset($roles) &&  !empty($roles)){ ?>
                                                <?php foreach($roles as $obj ){ ?>
                                                    <option value="<?php echo $obj->id; ?>" <?php if($complain->role_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $obj->name; ?></option>
                                                <?php } ?>                                            
                                            <?php } ?>                                            
                                        </select>
                                        <div class="help-block"><?php echo form_error('role_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group display"> 
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_id"><?php echo $this->lang->line('class'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-12 col-xs-12"  name="class_id"  id="edit_class_id"  onchange="get_user('', this.value,'');">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>  
                                            <?php if(isset($classes) &&  !empty($classes)){ ?>
                                                <?php foreach($classes as $obj ){ ?>
                                                <option value="<?php echo $obj->id; ?>" <?php if($complain->class_id == $obj->id){ echo 'selected="selected"';} ?> ><?php echo $obj->name; ?></option>
                                                <?php } ?> 
                                            <?php } ?> 
                                        </select>
                                        <div class="help-block"><?php echo form_error('class_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_id"><?php echo $this->lang->line('complain'); ?> <?php echo $this->lang->line('user'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="user_id"  id="edit_user_id" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                                         
                                        </select>
                                        <div class="help-block"><?php echo form_error('user_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type_id"><?php echo $this->lang->line('complain'); ?> <?php echo $this->lang->line('type'); ?><span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="type_id"  id="edit_type_id" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                            <?php if(isset($complain_types) && !empty($complain_types)){ ?>
                                                <?php foreach($complain_types as $obj){ ?>
                                                    <option value="<?php echo $obj->id; ?>" <?php if($complain->type_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $obj->type; ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"><?php echo form_error('type_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="complain_date"><?php echo $this->lang->line('complain'); ?> <?php echo $this->lang->line('date'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="complain_date"  id="edit_complain_date" value="<?php echo isset($complain->complain_date) ?  date($this->gsms_setting->sms_date_format,strtotime($complain->complain_date)) : ''; ?>" placeholder="<?php echo $this->lang->line('complain'); ?> <?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('complain_date'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description"><?php echo $this->lang->line('complain'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="description"  id="description" placeholder="<?php echo $this->lang->line('complain'); ?>"><?php echo isset($complain->description) ?  $complain->description : ''; ?></textarea>
                                        <div class="help-block"><?php echo form_error('description'); ?></div>
                                    </div>
                                </div> 
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="action_note"><?php echo $this->lang->line('action'); ?> <?php echo $this->lang->line('note'); ?><span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="action_note"  id="action_note" required="required" placeholder="<?php echo $this->lang->line('action'); ?> <?php echo $this->lang->line('note'); ?>"> <?php echo isset($complain->action_note) ?  $complain->action_note : ''; ?></textarea>
                                        <div class="help-block"><?php echo form_error('action_note'); ?></div>
                                    </div>
                                </div> 
                                                        
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" value="<?php echo isset($complain) ? $complain->id : $id; ?>" name="id" />
                                        <a  href="<?php echo site_url('complain'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('update'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  
                        <?php } ?>
                                          
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bs-complain-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title"><?php echo $this->lang->line('complain'); ?> <?php echo $this->lang->line('information'); ?></h4>
        </div>
        <div class="modal-body fn_complain_data">
            
        </div>       
      </div>
    </div>
</div>
<script type="text/javascript">
         
    function get_complain_modal(complain_id){
         
        $('.fn_complain_data').html('<p style="padding: 20px;"><p style="padding: 20px;text-align:center;"><img src="<?php echo IMG_URL; ?>loading.gif" /></p>');
        $.ajax({       
          type   : "POST",
          url    : "<?php echo site_url('complain/get_single_complain'); ?>",
          data   : {complain_id : complain_id},  
          success: function(response){                                                   
             if(response)
             {
                $('.fn_complain_data').html(response);
             }
          }
       });
    }
</script>


<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>


 <script type="text/javascript">
     
  $('#add_complain_date').datepicker();
  $('#edit_complain_date').datepicker();
  $('#edit_action_date').datepicker();
  
  
    var form = 'add';
   <?php if(isset($post['type_id'])){ ?> 
      form = 'add';
   <?php } ?>
   <?php if(isset($complain)){ ?> 
      form = 'edit';
   <?php } ?> 

    <?php if(isset($post['role_id'])){ ?>  
         get_user_by_role('<?php echo $post['role_id']; ?>', '<?php echo $post['user_id']; ?>');
    <?php } ?>
        
    <?php if(isset($complain)){ ?>  
         get_user_by_role('<?php echo $complain->role_id; ?>', '<?php echo $complain->user_id; ?>');
    <?php } ?>
        
    
    function get_user_by_role(role_id, user_id){       
    
      
       if(role_id == <?php echo STUDENT; ?>){
        
           $('.display').show();
           $('#'+form+'_class_id').prop('required', true);     
           $('#'+form+'_user_id').html('<option value="">--<?php echo $this->lang->line('select'); ?>--</option>'); 
                      
           
       }else{
           get_user(role_id, '', user_id);
           $('select#'+form+'_class_id').prop('selectedIndex', 0);
           $('#'+form+'_class_id').prop('required', false);
           $('.display').hide();
       }       
          
   }
   
   <?php if(isset($complain)){ ?> 
          get_user('', '<?php echo $complain->class_id; ?>', '<?php echo $complain->user_id; ?>');
    <?php } ?>
   
   function get_user(role_id, class_id, user_id){
       
        if(role_id == ''){
            role_id = $('#'+form+'_role_id').val();
        }             
       
       $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_user_by_role'); ?>",
            data   : {role_id : role_id , class_id: class_id, user_id : user_id, message:false},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                   $('#'+form+'_user_id').html(response); 
               }
            }
        }); 
   }


 </script>
  <script type="text/javascript">
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
              search: true,              
              responsive: true
          });
        });
        
    $("#add").validate(); 
    $("#edit").validate(); 
    
</script>