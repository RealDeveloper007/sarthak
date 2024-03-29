<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-bell-o"></i><small> <?php echo $this->lang->line('manage'); ?> <?php echo $this->lang->line('leave'); ?> <?php echo $this->lang->line('type'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content quick-link">
                <strong> <?php echo $this->lang->line('quick_link'); ?>: </strong>
                <?php if(has_permission(VIEW, 'leave', 'type')){ ?>
                    <a href="<?php echo site_url('leave/type/index'); ?>"> <?php echo $this->lang->line('leave'); ?> <?php echo $this->lang->line('type'); ?></a>
                <?php } ?>
                <?php if(has_permission(VIEW, 'leave', 'application')){ ?>
                   | <a href="<?php echo site_url('leave/application/index'); ?>">  <?php echo $this->lang->line('leave'); ?> <?php echo $this->lang->line('application'); ?></a>
                <?php } ?>               
                <?php if(has_permission(VIEW, 'leave', 'approve')){ ?>
                   | <a href="<?php echo site_url('leave/approve/index'); ?>"> <?php echo $this->lang->line('approved'); ?> <?php echo $this->lang->line('application'); ?> </a>
                <?php } ?>               
                <?php if(has_permission(VIEW, 'leave', 'waiting')){ ?>
                   | <a href="<?php echo site_url('leave/waiting/index'); ?>"> <?php echo $this->lang->line('waiting'); ?> <?php echo $this->lang->line('application'); ?> </a>
                <?php } ?>               
                <?php if(has_permission(VIEW, 'leave', 'decline')){ ?>
                   | <a href="<?php echo site_url('leave/decline/index'); ?>"> <?php echo $this->lang->line('declined'); ?> <?php echo $this->lang->line('application'); ?> </a>
                <?php } ?>               
            </div>
            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">                    
                    <ul  class="nav nav-tabs bordered">
                        <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="#tab_type_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('leave'); ?> <?php echo $this->lang->line('type'); ?> <?php echo $this->lang->line('list'); ?></a> </li>
                        <?php if(has_permission(ADD, 'leave', 'type')){ ?>
                             <?php if(isset($edit)){ ?>
                                <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="<?php echo site_url('leave/type/add'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('leave'); ?> <?php echo $this->lang->line('type'); ?></a> </li>                          
                             <?php }else{ ?>
                                <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="#tab_add_type"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('leave'); ?> <?php echo $this->lang->line('type'); ?></a> </li>                          
                             <?php } ?>
                        <?php } ?> 
                        <?php if(isset($edit)){ ?>
                            <li  class="active"><a href="#tab_edit_type"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> <?php echo $this->lang->line('leave'); ?> <?php echo $this->lang->line('type'); ?></a> </li>                          
                        <?php } ?>
                             
                    </ul>
                    <br/>
                    
                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_type_list" >
                            <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('sl_no'); ?></th>                                       
                                        <th><?php echo $this->lang->line('leave'); ?> <?php echo $this->lang->line('user'); ?> <?php echo $this->lang->line('type'); ?></th>
                                        <th><?php echo $this->lang->line('leave'); ?> <?php echo $this->lang->line('type'); ?></th>
                                        <th><?php echo $this->lang->line('total'); ?> <?php echo $this->lang->line('leave'); ?></th>
                                        <th><?php echo $this->lang->line('action'); ?></th>                                            
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php  $count = 1; if(isset($types) && !empty($types)){ ?>
                                        <?php foreach($types as $obj){ ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>                                           
                                            <td><?php echo $obj->role_name; ?></td>
                                            <td><?php echo $obj->type; ?></td>
                                            <td><?php echo $obj->total_leave; ?></td>
                                            <td>
                                                <?php if(has_permission(EDIT, 'leave', 'type')){ ?>
                                                    <a href="<?php echo site_url('leave/type/edit/'.$obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                <?php } ?>
                                                <?php if(has_permission(DELETE, 'leave', 'type')){ ?>
                                                    <a href="<?php echo site_url('leave/type/delete/'.$obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>

                        <div  class="tab-pane fade in <?php if(isset($add)){ echo 'active'; }?>" id="tab_add_type">
                            <div class="x_content"> 
                               <?php echo form_open(site_url('leave/type/add'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                                               
                                <div class="item form-group"> 
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role_id"><?php echo $this->lang->line('applicant'); ?> <?php echo $this->lang->line('type'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-12 col-xs-12"  name="role_id"  id="role_id" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?> --</option> 
                                            <?php foreach($roles as $obj ){  ?>
                                                 <?php if(in_array($obj->id, array(GUARDIAN))){ continue;} ?>
                                                <option value="<?php echo $obj->id; ?>" ><?php echo $obj->name; ?></option>
                                            <?php } ?>                                            
                                        </select>
                                        <div class="help-block"><?php echo form_error('role_id'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"><?php echo $this->lang->line('leave'); ?> <?php echo $this->lang->line('type'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="type"  id="type" value="<?php echo isset($post['type']) ?  $post['type'] : ''; ?>" placeholder="<?php echo $this->lang->line('leave'); ?> <?php echo $this->lang->line('type'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('type'); ?></div>
                                    </div>
                                </div> 
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="total_leave"><?php echo $this->lang->line('total'); ?> <?php echo $this->lang->line('leave'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="total_leave"  id="total_leave" value="<?php echo isset($post['total_leave']) ?  $post['total_leave'] : ''; ?>" placeholder="<?php echo $this->lang->line('total'); ?> <?php echo $this->lang->line('leave'); ?>" required="required" type="number" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('total_leave'); ?></div>
                                    </div>
                                </div> 
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a  href="<?php echo site_url('leave/type/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  

                        <?php if(isset($edit)){ ?>
                        <div class="tab-pane fade in active" id="tab_edit_type">
                            <div class="x_content"> 
                               <?php echo form_open(site_url('leave/type/edit/'.$type->id), array('name' => 'edit', 'id' => 'edit', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <div class="item form-group"> 
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role_id"><?php echo $this->lang->line('applicant'); ?> <?php echo $this->lang->line('type'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-12 col-xs-12"  name="role_id"  id="role_id" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?> --</option> 
                                            <?php foreach($roles as $obj ){  ?>
                                                 <?php if(in_array($obj->id, array(GUARDIAN))){ continue;} ?>
                                                <option value="<?php echo $obj->id; ?>" <?php if(isset($type) && $type->role_id == $obj->id){ echo 'selected="selected"'; } ?>><?php echo $obj->name; ?></option>
                                            <?php } ?>                                            
                                        </select>
                                        <div class="help-block"><?php echo form_error('role_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"><?php echo $this->lang->line('leave'); ?> <?php echo $this->lang->line('type'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">                                        
                                        <input  class="form-control col-md-7 col-xs-12"  name="type" value="<?php echo isset($type) ? $type->type : ''; ?>"  placeholder="<?php echo $this->lang->line('leave'); ?> <?php echo $this->lang->line('type'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('type'); ?></div>
                                    </div>
                                </div>    
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="total_leave"><?php echo $this->lang->line('total'); ?> <?php echo $this->lang->line('leave'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">                                        
                                        <input  class="form-control col-md-7 col-xs-12"  name="total_leave" value="<?php echo isset($type) ? $type->total_leave : ''; ?>"  placeholder="<?php echo $this->lang->line('total'); ?> <?php echo $this->lang->line('leave'); ?>" required="required" type="number" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('total_leave'); ?></div>
                                    </div>
                                </div>  
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" value="<?php echo isset($type) ? $type->id : ''; ?>" name="id" />
                                        <a href="<?php echo site_url('leave/type/index'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
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

<!-- datatable with buttons -->
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