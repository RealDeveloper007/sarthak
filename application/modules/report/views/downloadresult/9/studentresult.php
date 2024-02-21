<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Student Marksheet</title>
	<style>
		body {
			position: relative;
			font-family: 'Helvetica';
			font-size: 11px;
		}

		table {
			border-collapse: collapse;
			width: 100%;
		}

		.logo {
			display: block;
			height: 80px;
			width: 63px;
		}

		.watermark {
			position: absolute;
			top: 10.6%;
			width: 100%;
			height: 880px;
			opacity: .13;
			object-fit: cover;
			z-index: -1;
		}

		.student-img {
			display: block;
			height: 152px;
			width: 152px;
			border: 1px solid black;
			object-fit: cover;
			z-index: 2;
			position: absolute;
			right:5px;
		}

		table th span {
			display: block;
			color: #71879b;
		}

		table td span {
			color: #71879b;
			line-height: 0;
		}

		table th span:first-child {
			font-size: 24px;
			width:80%;
			margin: 0 0 0 1.7em;
		}

		table th span:nth-child(2) {
			font-size: 16px;
			margin: 0 0 0 -3.5em;
		}

		table th span:last-child {
			margin: 0 0 0 -5.7em;
		}

		table th,
		table td {
			border-top: 1px solid black;
			border-left: 1px solid black;
		}

		.bottom {
			border-bottom: 1px solid black;
		}

		.right {
			border-right: 1px solid black;
		}

		.nowrap {
			white-space: nowrap;
		}

		.no-border {
			border: 0;
		}

		.no-left-border {
			border-left: 0;
		}

		.no-top-border {
			border-top: 0;
		}

		.pd-1 {
			padding: 15px 4px;
		}

		.signature {
			height: 63px;
		}
		.vertical span{
			position:absolute;
			top:0;
			right:0;
			width:1px;
			height:24px;
			background-color:black;
		}
	</style>
</head>

<body>
	<table cellspacing="0" cellpadding="5">
		<tr>
			<th align="left" class="no-border"><img src="<?= FCPATH . 'assets/uploads/logo/' . $setting->front_logo ?>" alt="Logo" class="logo"></th>
			<th colspan="7" class="no-border" align="center" >
				<span> <?= implode(' ', array_slice(explode(' ', $setting->school_name), 0, 3)); ?></span>
				<span> <?= implode(' ', array_slice(explode(' ', $setting->school_name), 3, 5)) ?></span>
				<span>(A CBSE Affiliated Senior Secondary Co-Educational English Medium School)</span>
			</th>
		</tr>
		<tr>
			<td colspan="4" align="right" class="no-border"><span>Affiliation No: 520109</span></td>
			<td colspan="4" class="no-border"><span>School Code: 44085</span></td>
		</tr>
		<!-- Blank Row -->
		<tr>
			<td colspan="8" class="no-border"></td>
		</tr>
		<!-- Background Image -->
		<img src="<?= FCPATH . 'assets/images/watermark.jpeg' ?>" alt="Watermark Image" class="watermark">
		<tr>
			<th colspan="8" class="right pd-1" align="center" >REPORT CARD (2022-2023)</th>
		</tr>
		<tr>
			<th colspan="8" align="left" class="right">Student Profile</th>
		</tr>
		<tr>
			<th colspan="2" align="left">SRN</th>
			<td colspan="2" class="no-right-border"><strong><?= $student_info->srn ?></strong></td>
			<td class="bottom right no-left-border" colspan="4" rowspan="7" align="right" >
				<img src="<?= FCPATH . "assets/images/profile.jpg" ?>" alt="Student Image" class="student-img" >
			</td>
		</tr>
		<tr>
			<th colspan="2" align="left" class="no-top-border">STUDENT'S NAME</th>
			<td colspan="2" class="no-top-border"><strong><?= $student_info->name ?></strong></td>
		</tr>
		<tr>
			<th colspan="2" align="left" class="no-top-border">DATE OF BIRTH</th>
			<td colspan="2" class="no-top-border"><strong><?= date('d-m-Y', strtotime($student_info->dob_main)) ?></strong></td>
		</tr>
		<tr>
			<th colspan="2" align="left" class="no-top-border">CLASS</th>
			<td colspan="2" class="no-top-border"><strong><?= $student_info->class ?></strong></td>
		</tr>
		<tr>
			<th colspan="2" align="left" class="no-top-border">SECTION</th>
			<td colspan="2" class="no-top-border"><strong><?= $student_info->section ?></strong></td>
		</tr>
		<tr>
			<th colspan="2" align="left" class="no-top-border">FATHER'S NAME</th>
			<td colspan="2" class="no-top-border"><strong><?= $student_info->father_name ?></strong></td>
		</tr>
		<tr>
			<th colspan="2" align="left" class="bottom no-top-border">MOTHER'S NAME</th>
			<td class="bottom no-top-border" colspan="2"><strong><?= $student_info->mother_name ?></strong></td>
		</tr>
		<!-- Blank Row -->
		<tr>
			<td colspan="8" class="no-border">&nbsp;</td>
		</tr>
		<tr>
			<th colspan="8" align="left" class="right">Scholastic Area</th>
		</tr>
		<tr>
			<th class="nowrap" align="center" rowspan="2">SUBJECT<br>CODE</th>
			<th class="nowrap" align="center" rowspan="2">SUBJECT<br>DETAILS</th>
			<th colspan="2" align="center">Theory</th>
			<th colspan="2" align="center">Internal Assessment</th>
			<th colspan="2" class="right" align="center" >FINAL RESULT</th>
		</tr>
		<tr>
			<th class="nowrap" align="center" >MAX. MARKS</th>
			<th class="nowrap" align="center" >MARKS OBTD.</th>
			<th class="nowrap" align="center" >MAX. MARKS</th>
			<th class="nowrap" align="center" >MARKS OBTD.</th>
			<th class="nowrap" align="center" >MAX. MARKS</th>
			<th class="nowrap right" align="center" >MARKS OBTD.</th>
		</tr>
		<?php $ob = 0;
		$tt = 0;
		$CalculateArray = [];
		foreach ($student_result as $obj) {
			$status = $obj->optional_status == 0 ? '' : '';
		?>
			<tr>
				<th align="center"><?php
									if ($obj->subject_name == "IT" || $obj->subject_name == "B&W") {
										$subject = $obj->subject_name;
										$get_code = substr($subject, strpos($subject, "(") + 1);
										$code = substr($get_code, 0, -1);
										echo $obj->subject_code;
									} else {
										$code = $obj->subject_code;
										echo $code;
									}
									?></th>
				<th class="nowrap"><?php
									if ($obj->subject_name == "IT" || $obj->subject_name == "B&W") {
										echo str_replace('-',' ',$obj->subject_name) . $status;
									} else {
										echo str_replace('-',' ',$obj->subject_name) . $status;
									} ?></th>
				<th align="center" ><?php if ($obj->subject_name == "IT" || $obj->subject_name == "B&W" || $obj->subject_name == "Comp.Application") { ?>
						50
					<?php } else if (strtolower($obj->subject_name) == "home.sc.") { ?>
						70
					<?php } else if ($obj->subject_name == "Painting") { ?>
						30
					<?php } else { ?>
						80
					<?php } ?></th>
				<th align="center" ><?= floor($obj->th_term_total) ?></th>
				<th align="center" ><?php if ($obj->subject_name == "IT" || $obj->subject_name == "B&W" || $obj->subject_name == "Comp.Application") { ?>
						50
					<?php } else if (strtolower($obj->subject_name) == "home.sc.") { ?>
						30
					<?php } else if ($obj->subject_name == "Painting") { ?>
						70
					<?php } else { ?>
						20
					<?php } ?></th>
				<th align="center" ><?= floor($obj->in_term_total) ?></th>
				<th align="center" >100</th>
				<th align="center" class="right"><?=  $obj->total != 0 ? floor($obj->total) : '-' ?></th>
			</tr>
		<?php 		$CalculateArray[] = $obj->total;
		            
        			    
        			     if ($obj->optional_status == 1) 
    		            {
    		            	$ob = $ob + $obj->total;
    				        $tt = $tt + 100;
    		            } 
        			
			
		            
		            
			
		} 
		
		 if($student_info->class <9)
        			{
        			    $Cal = sort($CalculateArray,SORT_NUMERIC);
        			    $Cal = array_shift($CalculateArray);
        			    $ObMarks = array_sum($CalculateArray);
        			} else {
        			     $ObMarks = $ob;
        			}
		
		?>

			<tr>
			<th colspan="6" rowspan="2" class="bottom"></th>
			<th align="left" class="nowrap"><?= $student_info->result_status == 'P' ? 'G.Total (500)' : 'G.Total (500)' ?></th>
			<th class="right" align="center"><?= $student_info->result_status == 'P' ?  floor($ObMarks) : '-' ?></th>
		</tr>
		<tr>
			<th align="left" class="bottom nowrap">Percentage 
		
			
			</th>
			<th class="bottom right" align="center"><?= $student_info->result_status == 'P' ? round(($ObMarks * 100) / $tt, 2).'%' : '-' ?></th>
		</tr>
		<!-- Blank Row -->
		<tr>
			<td colspan="8" class="no-border">&nbsp;</td>
		</tr>
		<tr>
			<th colspan="8" align="left" class="right">CO-SCHOLASTIC ACTIVITES</th>
		</tr>
		<tr>
			<th colspan="6" align="left">Activities</th>
			<th colspan="2" class="right" align="center">Grades</th>
		</tr>
		<tr>
			<th colspan="6" align="left">Health &amp; Physical Education</th>
			<td colspan="2" align="center" class="right"><?= $student_info->health_activity ?></td>
		</tr>
		<tr>
			<th colspan="6" align="left">Work Education</th>
			<td colspan="2" align="center" class="right"><?= $student_info->work_exp ?></td>
		</tr>
		<tr>
			<th colspan="6" align="left">Art Education</th>
			<td colspan="2" align="center" class="right"><?= $student_info->general_study ?></td>
		</tr>
		<tr>
			<th colspan="6" align="left" class="bottom">Discipline</th>
			<td colspan="2" align="center" class="bottom right"><?= $student_info->discipline ?></td>
		</tr>
		<!-- Blank Row -->
		<tr>
			<td colspan="8" class="no-border">&nbsp;</td>
		</tr>
		<tr>
			<th align="left" class="bottom">Result</th>
			<th colspan="7" class="bottom vertical" style="position:relative; text-transform:uppercase;"><?= $student_info->remarks ?><span></span></th>
		</tr>
		<!-- Blank Row -->
		<tr>
			<td colspan="8" class="no-border">&nbsp;</td>
		</tr>
		<tr>
			<th colspan="2" class="no-border">&nbsp;</th>
			<th colspan="3" class="bottom" style="height:63px;" align="center" ><img src="<?= base_url('assets/uploads/teacher-sign/'.$teacher_details->signature) ?>" alt="Teacher Sign" class="signature" ></th>
			<th colspan="3" class="right bottom" style="height:63px;" align="center" ><img src="<?= base_url('assets/uploads/teacher-sign/'.$principal_detail->signature) ?>" alt="Principal Signature" class="signature" ></th>
		</tr>
		<!-- Blank Row -->
		<tr>
			<td colspan="8" class="no-border">&nbsp;</td>
		</tr>
		<tr>
			<th colspan="2" align="left" class="bottom">Date:&nbsp;27-03-2023</th>
			<th colspan="3" align="left" class="bottom">Class Teacher:&nbsp;<?= $teacher_details->name ?></th>
			<th colspan="3" align="left" class="bottom right">Principal:&nbsp;<?= $principal_detail->name ?></th>
		</tr>
	</table>

</body>

</html>