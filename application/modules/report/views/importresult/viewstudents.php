<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <h3 class="head-title"><i class="fa fa-users"></i><small> View Students <span>Current Session - <?= $academic_year ?></small></span></h3>
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
                                                    <td><?php echo $obj->srn; ?></td>
                                                    <td><?php echo $obj->name; ?></td>
                                                    <td><?php echo $obj->father_name; ?></td>
                                                    <td><?php echo $obj->mother_name; ?></td>
                                                     <td><?php echo $obj->status == 1 ? 'Approved By Principal' : 'Pending'; ?></td>
                                                    <td>
                                                        <a href="<?= site_url('report/DownloadReport/' . $obj->id) ?>" target="_blank" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a>
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
</script>