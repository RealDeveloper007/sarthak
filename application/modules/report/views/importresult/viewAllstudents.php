<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title" style="width:100%"><i class="fa fa-users"></i><small> View Students <span style="float:right;font-weight: bold;color: red;"> Current Session : <?= $academic_year ?></small></span></h3>
                <ul class="nav navbar-left panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <div class="" data-example-id="togglable-tabs">


                    <ul class="nav nav-tabs bordered">

                        <li class='active'><a href="#tab_student_view" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-eye"></i> Class: <?= $userdetail->class_name ?>-<?= $userdetail->class_section ?></a> </li>

                    </ul>
                    <br />
                    <?php if($this->session->flashdata('message')) { ?>

                        <div class="alert alert-danger"><?= $this->session->flashdata('message'); 
                                                                        ?></div>

                    <?php } ?>

                    <div class="tab-content">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <select class="form-control" name="select_class" id="select_class" required="required">
                                    <option value="">--<?php echo $this->lang->line('select'); ?> Class --</option>
                                    <?php foreach ($class_dropdown as $AllClasses) { ?>

                                        <?php if (isset($_GET['class'])) {
                                            if ($_GET['class'] == $AllClasses->class_name . '#' . $AllClasses->class_section) {
                                        ?>
                                                <option value="<?php echo $AllClasses->class_name . '#' . $AllClasses->class_section; ?>" selected> <?php echo $AllClasses->class_name . ' ' . $AllClasses->class_section ?></option>
                                            <?php } else { ?>

                                                <option value="<?php echo $AllClasses->class_name . '#' . $AllClasses->class_section; ?>"> <?php echo $AllClasses->class_name . ' ' . $AllClasses->class_section ?></option>

                                            <?php }
                                        } else { ?>
                                            <option value="<?php echo $AllClasses->class_name . '#' . $AllClasses->class_section; ?>"> <?php echo $AllClasses->class_name . ' ' . $AllClasses->class_section ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-danger" id="reset_filter">Reset Filter</button>
                            </div>

                        </div>
                    </div>

                    <form action="<?= site_url('report/save_result_status') ?>" method="post" class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="item form-group">
                                <select name="status_code" class="form-control">
                                    <option value="1">Approved</option>
                                    <option value="0">DisApproved</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>

                        <div class="tab-pane fade in " id="tab_student_view">

                            <div class="x_content">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" name="select_all" class="select_all" id="checkedAll"></th>
                                            <th>#SL</th>
                                            <th>Image</th>
                                            <th>SRN No.</th>
                                            <th>DOB (use as password)</th>
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
                                                <tr class="<?php echo $obj->status == 1 ? 'Approved' : 'Dis-Approved'; ?>">
                                                    <td><input type="hidden" name="student_ids[]" value="<?= $obj->id ?>">
                                                        <input type="checkbox" name="student_status[<?= $obj->id ?>]" class="checkSingle" value="<?= $obj->id ?>">
                                                    </td>
                                                    <td><?php echo $count; ?></td>
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
                                                    <td><?php echo $obj->dob; ?></td>
                                                    <td><?php echo $obj->name; ?></td>
                                                    <td><?php echo $obj->father_name; ?></td>
                                                    <td><?php echo $obj->mother_name; ?></td>
                                                    <td><?php echo $obj->status == 1 ? 'Approved' : 'Dis-Approved'; ?></td>
                                                    <td>
                                                        <a href="<?= site_url('report/editStudentDetails/' . $obj->id) ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit </a>

                                                        <a href="<?= site_url('report/viewStudentResultDetails/' . $obj->id) ?>" target="_blank" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a>

                                                        <a href="<?= site_url('report/DownloadReport/' . $obj->id) ?>" target="_blank" class="btn btn-success btn-xs"><i class="fa fa-download"></i> <?php echo $this->lang->line('download'); ?> </a>

                                                        <a href="<?= site_url('report/deleteStudent/' . $obj->id) ?>" class="btn btn-success btn-xs" onclick="return confirm('Are you sure to delete the record of this Student SR No. - <?php echo $obj->srn; ?>?')"><i class="fa fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                    </td>
                                                </tr>
                                            <?php $count++; } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                    </form>
                </div>


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
<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
<script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
<script>
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

    $("#dob_main").datepicker( {
            format: "dd-M-yyyy"
        });

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
    .Dis-Approved {
        background: #f27575 !important;
        color: white !important;
    }
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