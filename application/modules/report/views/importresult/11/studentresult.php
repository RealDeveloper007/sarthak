<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h3 class="head-title"><i class="fa fa-user"></i><small> View Student Result</small></h3>
				<ul class="nav navbar-left panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
				</ul>
				<div class="clearfix"></div>
			</div>

			<div class="x_content">
				<div class="" data-example-id="togglable-tabs">

					<ul class="nav nav-tabs bordered">

						<li class='active'><a href="#tab_student_view" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-eye"></i>View Result</a> </li>

					</ul>
					<br />

					<?php if (isset($errors)) { ?>

						<!-- <div class="alert alert-danger" style="color: white!important;"><?php // $errors; 
																								?></div> -->
					<?php } ?>


					<div class="tab-content">

						<div class="tab-pane fade in active" id="tab_student_view">
							<div class="x_content">


								<div class="box-body" style="overflow-x:auto;" id="print-content">
									<img class="print_content_img" src="<?= base_url('assets/images/background_i.jpeg') ?>">
									<style type="text/css">
										img.print_content_img {
											position: absolute;
											height: 88%;
											width: 100%;
											object-fit: cover;
											bottom: 0;
											opacity: 0.5;
											z-index: 1;
											margin-bottom: 20px;
										}

										div#print-content {
											position: relative;
										}

										div#print-content table,
										div#print-content table tr th,
										div#print-content table tr td {
											z-index: 999;
											position: relative;
											color: #000000;
										}

										.text_center,
										.text__center {
											text-align: center;
										}

										.report_card_details h2 {
											margin: 0 !important;
										}

										table {
											margin-top: 20px !important;
										}

										table.ctm_table5 {
											margin-top: 0 !important;
										}
									</style>

									<!--   <h4 style="text-align:center;">ACADEMIC SESSION: <?= $academic_year ?><BR/><span style='text-align:center;'>REPORT CARD</span></h4>   -->

									<div class="report_card_header" style="display: flex;
																	padding: 10px 0;
																	align-items: center;
																	border-bottom: 1px solid;
																	margin-bottom: 15px">

										<div class="report_card_logo" style="position: absolute; left: 20px;">
											<img style="width:127px" src="<?= base_url('assets/uploads/logo/' . $setting->front_logo) ?>">
										</div>

										<div class="report_card_details" style="width: 100%;text-align: center;">
											<h3> <b style="text-align: center"><?= implode(' ', array_slice(explode(' ', $setting->school_name), 0, 3)); ?></b></h3>
											<h4><b><?= implode(' ', array_slice(explode(' ', $setting->school_name), 3, 5)) ?></b></h4>
											<p>( A CBSE Affilated Senior Secondary Co-Educational English Medium School )</p>
											<p style="text-align: center"> Affiliation No: 520109 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;School Code: 44085</p>


										</div>

									</div>
									<div class="text_center" style="text-align:center;">
										<h4>REPORT CARD(<?= $report_year ?>)</h4>
									</div>


									<table class="ctm_table1" style="width: 100%; text-align:left; border-collapse: collapse;
																	border: 1px solid #000;
																	margin-top:30px;">

										<tr style="border: 1px solid #000;" style="padding: 8px;">
											<th style="padding: 8px; border: 1px solid #000; " colspan="3"> Student Profile </th>


										</tr>
										<tr style="padding: 8px; ">
											<th style="padding: 8px;"> SRN </th>
											<td style="padding: 8px;"> <?= $student_info->srn ?> </td>
										</tr>


										<tr style="padding: 8px; ">
											<th style="padding: 8px; "> NAME </th>
											<td style="padding: 8px; "> <?= $student_info->name ?> </td>
											<td style="padding: 8px" rowspan="5">
												<div class="profil_photo" style="border: 1px solid #000;
																						display: inline-block;
																						height: 190px; width: 200px;
																						min-height: 190px;
																						float:right;
																						
																						">
													<img style="max-width:100%; height: 100%; width:100%;  object-fit:contain; " src="https://media.istockphoto.com/id/1337144146/vector/default-avatar-profile-icon-vector.jpg?s=612x612&w=0&k=20&c=BIbFwuv7FxTWvh5S3vB6bkT0Qv8Vn8N5Ffseq84ClGI=">
												</div>
											</td>
										</tr>


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

										<tr style="padding: 8px; ">
											<th style="padding: 8px;"> Date of Birth </th>
											<td style="padding: 8px;"> <?= $student_info->dob_main ?> </td>
										</tr>

										<tr style="padding: 8px; ">
											<th style="padding: 8px;"> CLASS </th>
											<td style="padding: 8px;"> <?= $student_info->class ?> </td>
										</tr>

										<tr style="padding: 8px; ">
											<th style="padding: 8px;"> SECTION </th>
											<td style="padding: 8px;"> <?= $section ?> </td>
										</tr>

										<tr style="padding: 8px; ">
											<th style="padding: 8px; "> FATHER`S NAME </th>
											<td style="padding: 8px;"> <?= $student_info->father_name ?> </td>
										</tr>

										<tr style="padding: 8px; ">
											<th style="padding: 8px;"> MOTHER`S NAME </th>
											<td style="padding: 8px;"> <?= $student_info->mother_name ?> </td>
										</tr>

									</table>

									<?php if ($student_info->class > 0 && $student_info->class < 3) { ?>

										<table class="ctm_table2" style="width: 100%; text-align:left; border-collapse: collapse;
		border: 1px solid #000;
		margin-top:30px; text-align:left;">

											<tr style="padding: 8px; border: 1px solid #000;">
												<th style="padding: 8px; border: 1px solid #000;" colspan="9"> Scholastic Area</th>
											</tr>


											<tr style="padding: 8px; border: 1px solid #000;">
												<th style="padding: 8px; border: 1px solid #000;"> Subject Code </th>
												<th style="padding: 8px; border: 1px solid #000;" colspan="2"> Subject Details </th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" colspan="2" class="text_center"> TERM 1 </th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" colspan="2" class="text_center"> TERM 2 </th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" colspan="2" class="text_center"> FINAL RESULT </th>
											</tr>

											<tr style="padding: 8px; border: 1px solid #000;">
												<th style="padding: 8px; border: 1px solid #000;"></th>
												<th style="padding: 8px; border: 1px solid #000;" colspan="2"></th>
												<th style="padding: 8px; border: 1px solid #000; width: 100px; text-align:center;" class="text_center"> M.M</th>
												<th style="padding: 8px; border: 1px solid #000; width: 100px; text-align:center;" class="text_center"> MARKS OBTAINED </th>
												<th style="padding: 8px; border: 1px solid #000; width: 100px; text-align:center;" class="text_center"> M.M</th>
												<th style="padding: 8px; border: 1px solid #000; width: 100px; text-align:center;" class="text_center"> MARKS OBTAINED </th>
												<th style="padding: 8px; border: 1px solid #000; width: 100px; text-align:center;" class="text_center"> M.M</th>
												<th style="padding: 8px; border: 1px solid #000; width: 100px; text-align:center;" class="text_center"> MARKS OBTAINED </th>
											</tr>
											<?php $ob = 0;
											$tt = 0;
											foreach ($student_result as $obj) { ?>
												<tr style="padding: 8px; border: 1px solid #000;">
													<th style="padding: 8px; border: 1px solid #000;"> <?= $obj->subject_code ?></th>
													<th style="padding: 8px; border: 1px solid #000;" colspan="2"><?= $obj->subject_name ?></th>
													<th style="padding: 8px; border: 1px solid #000;" class="text__center"> </th>
													<th style="padding: 8px; border: 1px solid #000;" class="text__center"><?= floor($obj->term_one) ?></th>
													<th style="padding: 8px; border: 1px solid #000;" class="text__center"> </th>
													<th style="padding: 8px; border: 1px solid #000;" class="text__center"><?= floor($obj->term_two) ?></th>
													<th style="padding: 8px; border: 1px solid #000;" class="text__center"> </th>
													<th style="padding: 8px; border: 1px solid #000;" class="text__center"><?= floor($obj->total) ?></th>
												</tr>
											<?php $ob = $ob + $obj->total;
												$tt = $tt + 100;
											} ?>

											<tr style="padding: 8px; border: 1px solid #000;">
												<th style="padding: 8px; border: 1px solid #000;" colspan="7" rowspan="2"> </th>
												<th style="padding: 8px; border: 1px solid #000;">G.Total </th>
												<th class="text__center" style="padding: 8px; border: 1px solid #000;"><?= floor($ob) ?></th>
											</tr>
											<tr style="padding: 8px; border: 1px solid #000;">
												<th style="padding: 8px; border: 1px solid #000;">Percentage </th>
												<th class="text__center" style="padding: 8px; border: 1px solid #000;"><?= round(($ob * 100) / $tt, 2) ?>%</th>
											</tr>


										</table>
									<?php } elseif ($student_info->class > 2 && $student_info->class < 9) { ?>
										<table class="ctm_table2" style="width: 100%; text-align:left; border-collapse: collapse;
		border: 1px solid #000; border-collapse: collapse;
		margin-top:30px;">

											<tr style="padding: 8px; border: 1px solid #000;">
												<th style="padding: 8px; border: 1px solid #000;" colspan="9"> Scholastic Area</th>
											</tr>


											<tr style="padding: 8px; border: 1px solid #000;">
												<th style="padding: 8px; border: 1px solid #000;"> Subject Code </th>
												<th style="padding: 8px; border: 1px solid #000;" colspan="2"> Subject Details </th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" colspan="4" class="text_center"> TERM 1 </th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" colspan="4" class="text_center"> TERM 2 </th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center"> FINAL RESULT </th>
											</tr>

											<tr style="padding: 8px; border: 1px solid #000;">
												<th style="padding: 8px; border: 1px solid #000;"></th>
												<th style="padding: 8px; border: 1px solid #000;" colspan="2"></th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">Periodic Test (5)</th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">Notebook (2.5)</th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">Subject Activity (2.5)</th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center"> MARKS OBTAINED (40)</th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">Periodic Test (5)</th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">Notebook (2.5)</th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">Subject Activity (2.5)</th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center"> MARKS OBTAINED (40)</th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center"> Total OBTAINED </th>
											</tr>
											<?php $ob = 0;
											$tt = 0;
											foreach ($student_result as $obj) { ?>
												<tr style="padding: 8px; border: 1px solid #000;">
													<th style="padding: 8px; border: 1px solid #000;"><?= $obj->subject_code ?> </th>
													<th style="padding: 8px; border: 1px solid #000;" colspan="2"><?= $obj->subject_name ?></th>
													<th style="padding: 8px; border: 1px solid #000;" class="text__center"><?= $obj->p_term_one ?></th>
													<th style="padding: 8px; border: 1px solid #000;" class="text__center"><?= $obj->n_term_one ?></th>
													<th style="padding: 8px; border: 1px solid #000;" class="text__center"><?= $obj->sa_term_one ?></th>
													<th style="padding: 8px; border: 1px solid #000;" class="text__center"><?= $obj->term_one ?></th>
													<th style="padding: 8px; border: 1px solid #000;" class="text__center"><?= $obj->p_term_two ?></th>
													<th style="padding: 8px; border: 1px solid #000;" class="text__center"><?= $obj->n_term_two ?></th>
													<th style="padding: 8px; border: 1px solid #000;" class="text__center"><?= $obj->sa_term_two ?></th>
													<th style="padding: 8px; border: 1px solid #000;" class="text__center"><?= $obj->term_two ?></th>
													<th style="padding: 8px; border: 1px solid #000;" class="text__center"><?= $obj->total ?></th>
												</tr>
											<?php $ob = $ob + $obj->total;
												$tt = $tt + 100;
											} ?>

											<tr style="padding: 8px; border: 1px solid #000;">
												<th style="padding: 8px; border: 1px solid #000;" colspan="10" rowspan="2"> </th>
												<th style="padding: 8px; border: 1px solid #000;">G.Total </th>
												<th class="text__center" style="padding: 8px; border: 1px solid #000;"><?= $ob ?></th>
											</tr>
											<tr style="padding: 8px; border: 1px solid #000;">
												<th style="padding: 8px; border: 1px solid #000;">Percentage </th>
												<th class="text__center" style="padding: 8px; border: 1px solid #000;"><?= round(($ob * 100) / $tt, 2) ?>%</th>
											</tr>


										</table>
									<?php } elseif ($student_info->class > 8 && $student_info->class < 11) { ?>
										<table class="ctm_table2" style="width: 100%; text-align:left; border-collapse: collapse;
																	border: 1px solid #000; 
																	margin-top:30px;">

											<tr style="padding: 8px; border: 1px solid #000;">
												<th colspan="9"><b> SCHOLASTIC AREA </b></th>
											</tr>


											<tr style="padding: 8px; border: 1px solid #000;">
												<th style="padding: 8px; border: 1px solid #000;"> Subject Code </th>
												<th style="padding: 8px; border: 1px solid #000;" colspan="2"> Subject Details </th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center" colspan="2"> Theory </th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center" colspan="2"> (ASL/Practical)</th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center" colspan="2"> FINAL RESULT </th>
											</tr>

											<tr style="padding: 8px; border: 1px solid #000;">
												<th style="padding: 8px; border: 1px solid #000;"></th>
												<th style="padding: 8px; border: 1px solid #000;" colspan="2"></th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">MAX MARKS</th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">MARKS OBTD.</th>
												<!-- <th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">MM</th>
										<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">MARKS OBTAINED</th> -->
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">MAX MARKS</th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">MARKS OBTD.</th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">MAX MARKS</th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">MARKS OBTD.</th>
												<!-- <th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">MM</th>
										<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center"> Total OBTAINED </th> -->
											</tr>

											<?php $ob = 0;
											$tt = 0;
											foreach ($student_result as $obj) {
												$status = $obj->optional_status == 0 ? ' (OPTIONAL)' : '';
											?>
												<tr style="padding: 8px; border: 1px solid #000;">
													<th style="padding: 8px; border: 1px solid #000;"><?php
																										if ($obj->subject_name == "IT(402)" || $obj->subject_name == "B&W(407)") {
																											$subject = $obj->subject_name;
																											$get_code = substr($subject, strpos($subject, "(") + 1);
																											$code = substr($get_code, 0, -1);
																											echo $code;
																										} else {
																											$code = $obj->subject_code;
																											echo $code;
																										}
																										?> </th>
													<th style="padding: 8px; border: 1px solid #000;" colspan="2"><?php
																													if ($obj->subject_name == "IT(402)" || $obj->subject_name == "B&W(407)") {
																														echo strstr($obj->subject_name, "(", true) . $status;
																													} else {
																														echo $obj->subject_name . $status;
																													} ?></th>
													<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">80</th>
													<th style="padding: 8px; border: 1px solid #000;" class="text__center"><?= floor($obj->th_term_total) ?></th>
													<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">20</th>
													<th style="padding: 8px; border: 1px solid #000;" class="text__center"><?= floor($obj->in_term_total) ?></th>
													<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">100</th>
													<th style="padding: 8px; border: 1px solid #000;" class="text__center"><?= floor($obj->total) ?></th>
												</tr>
											<?php if ($obj->optional_status == 1) {
													$ob = $ob + $obj->total;
													$tt = $tt + 100;
												}
											} ?>

											<tr style="padding: 8px; border: 1px solid #000;">
												<th style="padding: 8px; border: 1px solid #000;" colspan="7" rowspan="2"> </th>
												<th style="padding: 8px; border: 1px solid #000;">G.Total (500)</th>
												<th class="text__center" style="padding: 8px; border: 1px solid #000;"><?= floor($ob) ?></th>
											</tr>
											<tr style="padding: 8px; border: 1px solid #000;">
												<th style="padding: 8px; border: 1px solid #000;">Percentage </th>
												<th class="text__center" style="padding: 8px; border: 1px solid #000;"><?= round(($ob * 100) / $tt, 2) ?>%</th>
											</tr>


										</table>
									<?php } elseif ($student_info->class == 11) { ?>
										<table class="ctm_table2" style="width: 100%; text-align:left; border-collapse: collapse;
		border: 1px solid #000;
		margin-top:30px;">

											<tr style="padding: 8px; border: 1px solid #000;">
												<th style="padding: 8px; border: 1px solid #000;" colspan="9"> Scholastic Area</th>
											</tr>


											<tr style="padding: 8px; border: 1px solid #000;">
												<th style="padding: 8px; border: 1px solid #000;"> Subject Code </th>
												<th style="padding: 8px; border: 1px solid #000;" colspan="2"> Subject Details </th>
												<!-- <th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center" colspan="2"> TERM 1 (Th.)</th>
										<th style="padding: 8px; border: 1px solid #000;text-align:center;" class="text_center" colspan="2"> TERM 2 (Th.)</th> -->
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center" colspan="2">Theory</th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center; " class="text_center" colspan="2"> (ASL/Practical)</th>
												<th style="padding: 8px; border: 1px solid #000;text-align:center; " class="text_center" colspan="2"> FINAL RESULT </th>
											</tr>

											<tr style="padding: 8px; border: 1px solid #000;">
												<th style="padding: 8px; border: 1px solid #000;"></th>
												<th style="padding: 8px; border: 1px solid #000;" colspan="2"></th>
												<!-- <th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">MM</th>
										<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">MARKS OBTAINED</th>
										<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">MM</th>
										<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">MARKS OBTAINED</th> -->
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">MAX MARKS</th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">MARKS OBTD.</th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">MAX MARKS</th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">MARKS OBTD.</th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">MAX MARKS</th>
												<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">MARKS OBTD. </th>
											</tr>
											<?php $ob = 0;
											$tt = 0;
											foreach ($student_result as $obj) {
												$status = $obj->optional_status == 0 ? ' (OPTIONAL)' : '';
											?>
												<tr style="padding: 8px; border: 1px solid #000;">
													<th style="padding: 8px; border: 1px solid #000;"><?= $obj->subject_code ?> </th>
													<th style="padding: 8px; border: 1px solid #000;" colspan="2"><?= $obj->subject_name . $status ?></th>
													<!-- <th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center"></th>
    										<th style="padding: 8px; border: 1px solid #000;" class="text__center"><?= floor($obj->term_one) ?></th>
    										<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center"></th>
    										<th style="padding: 8px; border: 1px solid #000;" class="text__center"><?= floor($obj->term_two) ?></th> -->
													<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">80</th>
													<th style="padding: 8px; border: 1px solid #000;" class="text__center"><?= floor($obj->th_term_total) ?></th>
													<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">20</th>
													<th style="padding: 8px; border: 1px solid #000;" class="text__center"><?= floor($obj->in_term_total) ?></th>
													<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">100</th>
													<th style="padding: 8px; border: 1px solid #000;" class="text__center"><?= floor($obj->total) ?></th>
												</tr>
											<?php
												$ob = $ob + $obj->total;
												$tt = $tt + 100;
											} ?>

											<tr style="padding: 8px; border: 1px solid #000;">
												<th style="padding: 8px; border: 1px solid #000;" colspan="7" rowspan="2"> </th>
												<th style="padding: 8px; border: 1px solid #000;">G.Total (500) </th>
												<th class="text__center" style="padding: 8px; border: 1px solid #000;"><?= floor($ob) ?></th>
											</tr>
											<tr style="padding: 8px; border: 1px solid #000;">
												<th style="padding: 8px; border: 1px solid #000;">Percentage </th>
												<th class="text__center" style="padding: 8px; border: 1px solid #000;"><?= round(($ob * 100) / $tt, 2) ?>%</th>
											</tr>


										</table>
									<?php } ?>
									<table class="ctm_table3" style="width: 100%; text-align:left; border-collapse: collapse;
																	border: 1px solid #000;
																	margin-top:30px;">

										<tr style="padding: 8px; border: 1px solid #000;">
											<th style="padding: 8px; border: 1px solid #000;" colspan="3"><b>CO-SCHOLASTIC ACTIVITIES</b></th>
										</tr>

										<tr style="padding: 8px; border: 1px solid #000;">
											<th style="padding: 8px; border: 1px solid #000;" rowspan="2">Activities</th>
											<th style="padding: 8px; border: 1px solid #000; text-align:center;" colspan="2" class="text_center">Grades</th>
										</tr>

										<tr style="padding: 8px; border: 1px solid #000;">

										</tr>

										<tr style="padding: 8px; border: 1px solid #000;">
											<th style="padding: 8px; border: 1px solid #000;">Health & Physical Education</th>
											<td class="text__center" style="padding: 8px; border: 1px solid #000;"><?= $student_info->health_activity ?></td>
										</tr>

										<tr style="padding: 8px; border: 1px solid #000;">
											<th style="padding: 8px; border: 1px solid #000;">Work Experience</th>
											<td class="text__center" style="padding: 8px; border: 1px solid #000;"><?= $student_info->work_exp ?></td>
										</tr>

										<tr style="padding: 8px; border: 1px solid #000;">
											<th style="padding: 8px; border: 1px solid #000;">General Studies</th>
											<td class="text__center" style="padding: 8px; border: 1px solid #000;"><?= $student_info->general_study ?></td>
										</tr>

										<tr style="padding: 8px; border: 1px solid #000;">
											<th style="padding: 8px; border: 1px solid #000;">Discipline</th>
											<td class="text__center" style="padding: 8px; border: 1px solid #000;"><?= $student_info->discipline ?></td>
										</tr>




									</table>


									<table class="ctm_table4" style="width: 100%; text-align:left; border-collapse: collapse; width: auto;
																	border: 1px solid #000;
																	margin-top:30px;">

										<tr style="padding: 8px; border: 1px solid #000;">
											<th style="padding: 8px; width: 206px; border: 1px solid #000;">Result</th>
											<td style="padding: 8px; width: 206px; border: 1px solid #000;"><?= $student_info->remarks ?></td>

										</tr>

									</table>


									<table class="ctm_table5" style="width: 100%; text-align:left; border-collapse: collapse;
																	border: 1px solid #000;
																	margin-top:0; margin-bottom:20px;">
										<tr>
											<div style="display:flex; justify-content: flex-end;">
												<div style="width: 30%;height: 80px; float:right; display:inline-block;border: 1px solid; margin: 10px 30px 10px 0; padding:8px;"> <img style="max-width:100%; height: 65px; object-fit:contain; width:360px;" src="<?= base_url('assets/uploads/teacher-sign/' . $teacher_details->signature) ?>"> </div>
												<div style="width: 30%; padding:8px; height: 80px; float:right; display:inline-block;border: 1px solid;margin-bottom: 10px; margin-top: 10px;"> <img style="max-width:100%; width:360px;  height: 65px; object-fit: contain;" src="<?= base_url('assets/uploads/teacher-sign/' . $principal_detail->signature) ?>"> </div>
											</div>
											<th style="padding: 8px; ">Date:<?= date('d-m-Y') ?></th>
											<th style="padding: 8px;"> Class Teacher </th>
											<th style="padding: 8px; " class="text_right"> Principal</th>
										</tr>
									</table>





									<!-- 
  							   
							   <table style="width: 100%;">
                                    <tr>
                                       <th style="text-align: left;height:22px;">NAME</th>
                                       <td style="text-align: left;height:22px;"><?= $student_info->name ?></td>
                                       <th style="text-align: left;height:22px;">CLASS</th>
                                       <td style="text-align: left;height:22px;"><?= $student_info->class ?>-<?= $student_info->section ?></td>
                                    </tr> 
                                    <tr>
                                       <th style="text-align: left;height:22px;">MOTHER`S NAME</th>
                                       <td style="text-align: left;height:22px;"><?= $student_info->mother_name ?></td>
                                       <th style="text-align: left;height:22px;">DATE OF BIRTH</th>
                                       <td style="text-align: left;height:22px;"><?= substr($student_info->dob, 0, 2) ?>-<?= substr($student_info->dob, 2, 2) ?>-<?= substr($student_info->dob, 4, 4) ?></td>
                                    </tr> 

                                    <tr>
                                       <th style="text-align: left;height:22px;">FATHER`S NAME</th>
                                       <td style="text-align: left;height:22px;"><?= $student_info->father_name ?></td>
                                       <th style="text-align: left;height:22px;">SRN NO.</th>
                                       <td style="text-align: left;height:22px;"><?= $student_info->srn ?></td>
                                    </tr>

                                 </table>  

                                <table class="table table-bordered" style="border-collapse: collapse;width: 100%; margin-top:30px; ">
    
                                    <tr>
                                       <th style="border: 1px solid black;text-align:center;vertical-align : middle;font-size:13px;">SUBJECTS</th> 
                                       <th style="border: 1px solid black; text-align: center;text-align:center;vertical-align : middle; height:40px;  font-size:13px;width:15%;">Term-I(50)</th>
                                       <th style="border: 1px solid black; text-align: center;text-align:center;vertical-align : middle;height:40px; font-size:13px; width:15%;">Term-II(50)</th>
                                       <th style="border: 1px solid black; text-align: center;text-align:center;vertical-align : middle;height:40px; font-size:13px;width:15%;">TOTAL(100)</th>
                                       <th style="border: 1px solid black; text-align: center;text-align:center;vertical-align : middle;height:40px; font-size:13px;width:15%;">Grade</th>
                                    </tr>
                                    <?php $ob = 0;
									$tt = 0;
									foreach ($student_result as $obj) { ?>
                                        <tr>
                                            <td style="border: 1px solid black; text-align:left;vertical-align : middle; height:40px;"><?= $obj->subject_name ?></td>
                                            <td style="border: 1px solid black; text-align:center;vertical-align : middle; height:40px;"><?= $obj->term_one ?></td>
                                            <td style="border: 1px solid black; text-align:center;vertical-align : middle; height:40px;"><?= $obj->term_two ?></td>
                                            <td style="border: 1px solid black; text-align:center;vertical-align : middle; height:40px;"><?= $obj->total ?></td>
                                            <td style="border: 1px solid black; text-align:center;vertical-align : middle; height:40px;"><?= $obj->grade ?></td>
                                        </tr>
                                    <?php $ob = $ob + $obj->total;
										$tt = $tt + 100;
									} ?> 
                                    <tr>

                                        <th colspan="7" style="text-align: right;font-size:13px;">TOTAL MARKS: <?= round($ob, 2) ?>/<?= $tt ?> PERCENTAGE: <?= round(($ob * 100) / $tt, 2) ?>%</th>

                                    </tr>  
                                </table>
  
                                <table style="margin-top:150px; width: 100%;">
                                    <th style="text-align:left;">Class Teacher</th>
                                    <th style="text-align:left;">Principal</th>
                                    <th style="text-align:right">Parents</th>
                                </table> -->

								</div>

							</div>
							<a href="<?= base_url('report/DownloadReport/' . $student_info->id) ?>" target="_blank"> <input type="button" value="Print" class="btn btn-success pull-left" /></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>