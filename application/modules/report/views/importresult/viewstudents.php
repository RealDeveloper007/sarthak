<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <h3 class="head-title" style="width:100%"><i class="fa fa-users"></i><small> View Students <span style="float:right;font-weight: bold;color: red;">Current Session - <?= $academic_year ?></small></span></h3>
                            <ul class="nav navbar-left panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">

                    <ul class="nav nav-tabs bordered">


                        <?php if(isset($edit)){ ?>
                            <li class=''><a href="#tab_student_view" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-eye"></i> Class: <?= $userdetail->class_name ?>-<?= $userdetail->class_section ?></a> </li>

                            <li class="active"><a href="#tab_edit_student" data-target="#tab_edit_student" role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> <?php echo $this->lang->line('student'); ?></a> </li>                          
                        <?php } else { ?>
                            <li class='active'><a href="#tab_student_view" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-eye"></i> Class: <?= $userdetail->class_name ?>-<?= $userdetail->class_section ?></a> </li>


                            <?php } ?>

                    </ul>
                    <br />

                    <?php if($this->session->flashdata('message')) { ?>

                        <div class="alert alert-danger"><?= $this->session->flashdata('message'); 
                                                                                                ?></div>
                        
                    <?php } ?>


                    <div class="tab-content">

            <div class="tab-pane fade in <?php if (!isset($edit)) { echo 'active'; } ?>" id="tab_student_view">
                <form action="<?= site_url('report/delete_all_students') ?>" method="post" class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="item form-group">
                                <select name="status_code" class="form-control">
                                    <option value="1">Bulk Delete</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" name="submit" class="btn btn-success" onclick="return confirm('Are you sure to delete the students？')">Submit</button>
                        </div>

                            <div class="x_content">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" name="select_all" class="select_all" id="checkedAll"></th>
                                            <th><?php echo $this->lang->line('sl_no'); ?></th>
                                            <th>Image</th>
                                            <th>SRN No.</th>
                                            <th>Name</th>
                                            <th>Father`s Name</th>
                                            <th>Mother</th>
                                             <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 1;
                                        if (isset($students) && !empty($students)) { ?>
                                            <?php foreach ($students as $obj) { ?>
                                                <tr>
                                                <td>
                                                    <!-- <input type="hidden" name="student_ids[]" value="<?= $obj->id ?>"> -->
                                                        <input type="checkbox" name="student_ids[<?= $obj->id ?>]" class="checkSingle" value="<?= $obj->id ?>">
                                                    </td>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php 
                                                     if($obj->photo == null)
                                                      {
                                                         echo '<img src="'.base_url('assets/images/profile.jpg').'" width="50px" data-srn="'.$obj->srn.'" data-id="'.$obj->id.'" data-class-name="'.$obj->class.'" class="imageUpload">';

                                                       } else {

                                                         echo '<img src="'.base_url('assets/uploads/student-photo/class/'.$obj->class.'/'.$obj->photo).'" width="50px" data-srn="'.$obj->srn.'" data-id="'.$obj->id.'" data-class-name="'.$obj->class.'" class="imageUpload">'; 
                                                       }
                                                    ?>
                                                         
                                                    </td>
                                                    <td><?php echo $obj->srn; ?></td>
                                                    <td><?php echo $obj->name; ?></td>
                                                    <td><?php echo $obj->father_name; ?></td>
                                                    <td><?php echo $obj->mother_name; ?></td>
                                                     <td><?php echo $obj->status == 1 ? 'Approved By Principal' : 'Pending'; ?></td>
                                                    <td>
                                                        <a href="<?= site_url('report/editStudentDetails/' . $obj->id) ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit </a>

                                                        <a href="<?= site_url('report/viewStudentResultDetails/' . $obj->id) ?>" target="_blank" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a>

                                                        <a href="<?= site_url('report/DownloadReport/' . $obj->id) ?>" target="_blank" class="btn btn-success btn-xs"><i class="fa fa-download"></i> <?php echo $this->lang->line('download'); ?> </a>

                                                        <a href="<?= site_url('report/deleteStudent/' . $obj->id) ?>" class="btn btn-success btn-xs" onclick="return confirm('Are you sure to delete the record of this Student SR No. - <?php echo $obj->srn; ?>?')"><i class="fa fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                    </td>
                                                </tr>

                                   
                                            <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </form>


                        <?php if(isset($edit)){ ?>
                        
                        <div class="tab-pane fade in active" id="tab_edit_student">
                            <div class="x_content"> 
                            <?php echo form_open_multipart(site_url('report/editStudentDetails/'), array('name' => 'editstudent', 'id' => 'editstudent', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('basic'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                    </div>
                                </div>
                                <div class="row">
                                <input  class="form-control col-md-7 col-xs-12"  name="id"  id="id" value="<?php echo isset($student->id) ?  $student->id : ''; ?>" placeholder="<?php echo "Student ID"; ?>" required="required" type="hidden">
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="item form-group">
                                <?php 
                                                     if($student->photo == null)
                                                      {
                                                         echo '<img src="'.base_url('assets/images/profile.jpg').'" width="150px">';

                                                       } else {

                                                         echo '<img src="'.base_url('assets/uploads/student-photo/class/'.$student->class.'/'.$student->photo).'" width="150px">'; 
                                                       }
                                                    ?>
                                                    </div>
                                                    </div>

                                <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="item form-group">
                                            <label for="type"><?php echo "SRN"; ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="srn"  id="srn" value="<?php echo isset($student->srn) ?  $student->srn : ''; ?>" placeholder="<?php echo "SRN"; ?>" required="required" type="text">
                                            <div class="help-block"><?php echo form_error('srn'); ?></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="name"><?php echo $this->lang->line('name'); ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="name"  id="name" value="<?php echo isset($student->name) ?  $student->name : ''; ?>" placeholder="<?php echo $this->lang->line('name'); ?>" required="required" type="text">
                                            <div class="help-block"><?php echo form_error('name'); ?></div> 
                                        </div>
                                    </div>
                                 
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="dob_main"><?php echo 'DOB'; ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="dob_main"  id="dob_main" value="<?php echo isset($student->dob_main) ?  $student->dob_main : ''; ?>" placeholder="<?php echo 'DOB'; ?>" required="required" type="text">
                                            <div class="help-block"><?php echo form_error('dob_main'); ?></div> 
                                        </div>
                                    </div>     
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="father_name"><?php echo 'Father Name'; ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="father_name"  id="father_name" value="<?php echo isset($student->father_name) ?  $student->father_name : ''; ?>" placeholder="<?php echo 'Father Name'; ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('father_name'); ?></div>
                                        </div>
                                    </div>     

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="mother_name"><?php echo 'Mother Name'; ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="mother_name"  id="mother_name" value="<?php echo isset($student->mother_name) ?  $student->mother_name : ''; ?>" placeholder="<?php echo 'Mother Name'; ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('mother_name'); ?></div>
                                        </div>
                                    </div>  

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="class"><?php echo 'Class'; ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="class_name"  id="class" value="<?php echo isset($student->class) ?  $student->class : ''; ?>" placeholder="<?php echo 'Class'; ?>" required="required" type="text" autocomplete="off" disabled>
                                            <div class="help-block"><?php echo form_error('class'); ?></div>
                                        </div>
                                    </div>  

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="section"><?php echo 'Section'; ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="section_name"  id="section" value="<?php echo isset($student->section) ?  $student->section : ''; ?>" placeholder="<?php echo 'Mother Name'; ?>" required="required" type="text" autocomplete="off" disabled>
                                            <div class="help-block"><?php echo form_error('section'); ?></div>
                                        </div>
                                    </div>  

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="academic_year_id"><?php echo $this->lang->line('academic_year'); ?> <span class="required">*</span></label>
                                            <select  class="form-control col-md-7 col-xs-12"  name="academic_year_id" disabled>
                                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                                <?php foreach($years as $obj){ ?>
                                                    <option value="<?php echo $obj->id; ?>" <?php if(isset($student) && $student->session_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $obj->session_year; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"><?php echo form_error('academic_year_id'); ?></div>
                                        </div>
                                    </div>
                                    </div>
                                <div class="row">                  
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5  class="column-title"><strong><?php echo $this->lang->line('academic'); ?> <?php echo $this->lang->line('information'); ?>:</strong></h5>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="health_activity"><?php echo 'Health Activity'; ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="health_activity"  id="health_activity" value="<?php echo isset($student->health_activity) ?  $student->health_activity : ''; ?>" placeholder="<?php echo 'Health Activity'; ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('health_activity'); ?></div>
                                        </div>
                                    </div> 

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="work_exp"><?php echo 'Work Experience'; ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="work_exp"  id="work_exp" value="<?php echo isset($student->work_exp) ?  $student->work_exp : ''; ?>" placeholder="<?php echo 'Work Experience'; ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('work_exp'); ?></div>
                                        </div>
                                    </div> 

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="general_study"><?php echo 'General Study'; ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="general_study"  id="general_study" value="<?php echo isset($student->general_study) ?  $student->general_study : ''; ?>" placeholder="<?php echo 'General Study'; ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('general_study'); ?></div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="item form-group">
                                            <label for="discipline"><?php echo 'Discipline'; ?> <span class="required">*</span></label>
                                            <input  class="form-control col-md-7 col-xs-12"  name="discipline"  id="discipline" value="<?php echo isset($student->discipline) ?  $student->discipline : ''; ?>" placeholder="<?php echo 'Discipline'; ?>" required="required" type="text" autocomplete="off">
                                            <div class="help-block"><?php echo form_error('discipline'); ?></div>
                                        </div>
                                    </div>
                                </div>

     
                            
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" name="id" id="id" value="<?php echo $student->id; ?>" />
                                        <a href="<?php echo site_url('report/viewstudents'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('update'); ?> Details</button>
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

<div class="modal fade" id="imageuploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="uploadImageForm" action="<?= base_url('report/uploadImage') ?>" method="post" enctype="multipart/form-data">
                                                        <label style="font-size: 20px;">SRN : <span id="srn_no" ></span></label>

                                                        <img id="imagePrev" width="150px" style="border: 1px solid black;">

                                                        <input type="hidden" name="student_id">
                                                        <input type="hidden" name="srn">
                                                        <input type="hidden" name="class">
                                                        <br/>
                                                        <br/>

                                                        <input type="file" class="form-control" name="photo" required>

                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button id="save_btn" type="button" class="btn btn-primary" data-dismiss="modal">Upload</button>
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<!-- datatable with buttons -->
<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
<!-- datatable with buttons -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable-responsive').DataTable({
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

        $("#dob_main").datepicker( {
            format: "dd-M-yyyy"
        });
    });

    

    $('.imageUpload').on('click',function(){

        var srn = $(this).attr('data-srn');
        var id = $(this).attr('data-id');
        var className = $(this).attr('data-class-name');
        var src = $(this).attr('src');

        $('form#uploadImageForm input[name="student_id"]').val(id);
        $('form#uploadImageForm input[name="srn"]').val(srn);
        $('form#uploadImageForm input[name="class"]').val(className);

        $('form#uploadImageForm #srn_no').text(srn);

        $('form#uploadImageForm #imagePrev').attr('src',src);

        $('#imageuploadModal').modal('show');
    })

    $(document).ready(function () {

        $("#save_btn").click(function () {

            $('#uploadImageForm').submit();
          
        });


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imagePrev').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("input[name='photo']").change(function(){

            var file = this.files[0];
            var fileType = file["type"];
            var validImageTypes = ["image/jpg", "image/jpeg", "image/png"];
            if ($.inArray(fileType, validImageTypes) < 0) 
            {
               alert('Please upload jpg/jpeg/png extension image');
               location.reload();
               return false;
            }

            if(this.files[0].size>3048576) {
                    alert('File size is larger than 3MB!');
            }

            readURL(this);
        });
   });
   $('#select_class').on('change', function() {
        window.location.href = "<?= base_url('report/viewstudents?class=') ?>" + encodeURIComponent(this.value);
    })
    $('#reset_filter').on('click', function() {
        window.location.href = "<?= base_url('report/viewstudents') ?>";
    })

    $(document).ready(function() {
        $("#checkedAll").change(function() {
            if (this.checked) {
                $(".checkSingle").each(function() {
                    this.checked = true;
                });
            } else {
                $(".checkSingle").each(function() {
                    this.checked = false;
                });
            }
        });

        $(".checkSingle").click(function() {
            if ($(this).is(":checked")) {
                var isAllChecked = 0;
                $(".checkSingle").each(function() {
                    if (!this.checked)
                        isAllChecked = 1;
                });

                if (isAllChecked == 0) {
                    $("#checkedAll").prop("checked", true);
                }
            } else {
                $("#checkedAll").prop("checked", false);
            }
        });
    });
</script>
<style>
    input[type="file"] {
        display: block;
        position: relative !important;
        top: 0;
        right: 0;
        min-width: 50%;
        min-height: 100%;
        font-size: 15px;
        text-align: inherit;
        opacity: 1;
    }

    
    </style>