<div class=" student_result_main_sec">

	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h3 class="head-title"><i class="fa fa-user"></i><small> <?= $student_info->name ?></small></h3>
						<ul class="nav navbar-left panel_toolbox">
							<li><a class="collapse-link" href="<?= base_url('result_logout') ?>"><i class="fa fa-chevron-up"></i>Logout</a></li>
						</ul>

					</div>

					<div class="x_content">
						<div class="" data-example-id="togglable-tabs">
							<div class="tab-content">
								<div class="tab-pane in active" id="tab_student_view">
									<div class="x_content">
										<div class="box-body" id='print-content' style="margin-top: -14px;">
											<div class="row">
												<div class="col-md-12">
													<div class="item form-group">
														<label for="name">SRN <span class="required">*</span></label>
														<input class="form-control col-md-7 col-xs-12" value="<?= $student_info->srn ?>" disabled>
													</div>

													<div class="item form-group">
														<label for="name">Student Name <span class="required">*</span></label>
														<input class="form-control col-md-7 col-xs-12" value="<?= $student_info->name ?>" disabled>
													</div>

													<?php if ($student_info->class == 11) {
														$explode = explode('-', $student_info->section);
														if ($explode[0] == 'NonMedical') {
															$section = $explode[1] . " (Non Medical)";
														} else {
															$section = $explode[1] . " (" . $explode[0] . ")";
														}
													} else {
														$section = $student_info->section;
													}
													?>
													<div class="item form-group">
														<label for="name">Date of Birth <span class="required">*</span></label>
														<input class="form-control col-md-7 col-xs-12" value="<?= $student_info->dob_main ?>" disabled>
													</div>

													<div class="item form-group">
														<label for="name">Class <span class="required">*</span></label>
														<input class="form-control col-md-7 col-xs-12" value="<?= $student_info->class ?> <?= $section ?>" disabled>
													</div>

													<div class="item form-group">
														<label for="name"> FATHER`S NAME <span class="required">*</span></label>
														<input class="form-control col-md-7 col-xs-12" value="<?= $student_info->father_name ?>" disabled>
													</div>

													<div class="item form-group">
														<label for="name">MOTHER`S NAME <span class="required">*</span></label>
														<input class="form-control col-md-7 col-xs-12" value="<?= $student_info->mother_name ?>" disabled>
													</div>



												</div>
											</div>
										</div>

									</div>
									<a href="<?= site_url('print_report') ?>" target="_blank"><input type="button" onclick="printDiv('print-content')" value="Print Result Report" class="btn btn-success pull-left" /></a>
									<br>
									<br>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



	</div>
</div>
<style>
	div#tab_student_view input.btn.btn-success {
		border: none;
		padding: 12px 20px !important;
		min-height: auto !important;
		margin-top: 0;
		font-size: 18px;
		background-color: #e80000;
		text-transform: capitalize;
	}

	.tab-content {
		padding: 0px 0;
	}

	.x_title {
		display: flex;
		align-items: center;
		justify-content: space-between;
		padding: 20px 0;
	}

	.form-control:disabled,
	.form-control[readonly] {
		background-color: transparent !important;
		opacity: 1;
		border: 0 px;
	}
</style>