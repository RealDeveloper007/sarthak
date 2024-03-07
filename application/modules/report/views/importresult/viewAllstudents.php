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

                    <?php if (isset($errors)) { ?>

                        <!-- <div class="alert alert-danger" style="color: white!important;"><?php // $errors; 
                                                                                                ?></div> -->
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
                                                    <td><?php echo $obj->srn; ?></td>
                                                    <td><?php echo $obj->dob; ?></td>
                                                    <td><?php echo $obj->name; ?></td>
                                                    <td><?php echo $obj->father_name; ?></td>
                                                    <td><?php echo $obj->mother_name; ?></td>
                                                    <td><?php echo $obj->status == 1 ? 'Approved' : 'Dis-Approved'; ?></td>
                                                    <td> <a href="<?= site_url('report/DownloadReport/' . $obj->id) ?>" target="_blank" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a></td>
                                                </tr>
                                            <?php } ?>
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
<script>
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
</style>