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

                        <li class='active'><a href="#tab_student_view" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-eye"></i> Class: <?= $userdetail->class_name ?>-<?= $userdetail->class_section ?></a> </li>

                    </ul>
                    <br />

                    <?php if (isset($errors)) { ?>

                        <!-- <div class="alert alert-danger" style="color: white!important;"><?php // $errors; 
                                                                                                ?></div> -->
                    <?php } ?>


                    <div class="tab-content">

                        <div class="tab-pane fade in <?php if (isset($students)) {
                                                            echo 'active';
                                                        } ?>" id="tab_student_view">
                            <div class="x_content">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
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
                                                        <a href="<?= site_url('report/DownloadReport/' . $obj->id) ?>" target="_blank" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a>

                                                        <a href="<?= site_url('report/deleteStudent/' . $obj->id) ?>" class="btn btn-success btn-xs" onclick="return confirm('Are you sure to delete the record of this Student SR No. - <?php echo $obj->srn; ?>?')"><i class="fa fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                    </td>
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