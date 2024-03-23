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
		</style>
		<?php if($style) { ?>
		<style>

		.watermark {
			position: absolute;
			width: 100%;
			height: 100%;
			opacity: .13;
			object-fit: cover;
			z-index: -1;
		}

		.student-img {
			display: block;
			height: 152px;
			width: auto;
			border: 1px solid black;
			object-fit: cover;
			z-index: 2;
		}
		</style>
		<?php } else { ?>

			<style>

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
			right: 5px;
		}
		</style>


			<?php } ?>
	<style>
			input {
		width: 50px;
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

		.vertical span {
			position: absolute;
			top: 0;
			right: 0;
			width: 1px;
			height: 24px;
			/* background-color: black; */
		}
		
	</style>
</head>

<body>
	<table cellspacing="0" cellpadding="5" style="<?= $style ?>">
		<tr>
			<th align="left" class="no-border"><img src="<?= base_url('assets/uploads/logo/' . $setting->front_logo) ?>" alt="Logo" class="logo"></th>
			<th colspan="7" class="no-border" align="center">
				<span> <?= implode(' ', array_slice(explode(' ', $setting->school_name), 0, 3)); ?></span>
				<span> <?= implode(' ', array_slice(explode(' ', $setting->school_name), 3, 5)) ?></span>
				<span><?= $setting->heading ?></span>
			</th>
		</tr>
		<tr>
			<td colspan="4" align="right" class="no-border"><span>Affiliation No: <?= $setting->affiliation_no ?></span></td>
			<td colspan="4" class="no-border"><span>School Code: <?= $setting->school_code ?></span></td>
		</tr>
		<!-- Blank Row -->
		<tr>
			<td colspan="8" class="no-border"></td>
		</tr>
		<!-- Background Image -->
		<img src="<?= base_url('assets/images/'.$setting->background_report_photo) ?>" alt="Watermark Image" class="watermark">
		<tr>
			<th colspan="8" class="right pd-1" align="center">REPORT CARD (<?= $report_year ?>)</th>
		</tr>
		<tr>
			<th colspan="8" align="left" class="right">Student Profile</th>
		</tr>

		<tr>
			<th colspan="2" align="left">SRN</th>
			<td colspan="2" class="no-right-border"><strong><?= $student_info->srn ?></strong></td>
			<td class="bottom right no-left-border" colspan="4" rowspan="7" align="right">
			<?php  if($student_info->photo == null) { ?>
				<img src="<?= base_url("assets/images/profile.jpg") ?>" alt="Student Image" class="student-img" >
				<?php } else { ?>
			<img src="<?= base_url('assets/uploads/student-photo/class/'.$student_info->class.'/'.$student_info->photo) ?>" alt="Student Image" class="student-img" >

				<?php } ?>			</td>
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
			<td colspan="2" class="no-top-border"><strong><?= $section ?></strong></td>
		</tr>
		<tr>
			<th colspan="2" align="left" class="no-top-border">FATHER'S NAME</th>
			<td colspan="2" class="no-top-border"><strong><?= $student_info->father_name ?></strong></td>
		</tr>
		<tr>
			<th colspan="2" align="left" class="bottom no-top-border">MOTHER'S NAME</th>
			<td class="bottom no-top-border" colspan="2"><strong><?= $student_info->mother_name ?></strong></td>
		</tr>
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
			<th colspan="2" align="center">PROJECT/PRACTICAL/INTERNAL</th>
			<th colspan="2" class="right" align="center">FINAL RESULT</th>
		</tr>
		<tr>
			<th class="nowrap" align="center">MAX. MARKS</th>
			<th class="nowrap" align="center">MARKS OBTD.</th>
			<th class="nowrap" align="center">MAX. MARKS</th>
			<th class="nowrap" align="center">MARKS OBTD.</th>
			<th class="nowrap" align="center">MAX. MARKS</th>
			<th class="nowrap right" align="center">MARKS OBTD.</th>
		</tr>
		<?php $ob = 0;
		$tt = 0;
		foreach ($student_result as $obj) {
			$status = $obj->optional_status == 0 ? '' : '';
		?>
			<tr>
				<th align="center"><?= $obj->subject_code ?> </th>
				<th><?= $obj->subject_name . $status ?></th>
				<th style="padding: 8px; border: 1px solid #000; text-align:center;" class="text_center">
					<?php if ($obj->subject_name == "IT" || $obj->subject_name == "B&W") { 
						$thTotal = 60;
					 } else if (strtolower($obj->subject_name) == "home.sc." || $obj->subject_name == "Comp.Science" || $obj->subject_name == "Phy.Education" || $obj->subject_name == "CHEMISTRY" || $obj->subject_name == "PHYSICS" || $obj->subject_name == "BIOLOGY" || $obj->subject_name == "PSY") {  
						$thTotal = 70;
					 } else if ($obj->subject_name == "Painting") { 
						$thTotal = 30; 
					 } else {  
						$thTotal = 80;
					 } 
					 
					 echo $thTotal;
					 ?>
				</th>
				<?php if($style){ ?>
					<th align="center" style="display: block ruby;">
						<input type="text" id="th_term_<?= $obj->id ?>" name="th_term_total" value="<?= floor($obj->th_term_total) ?>"> 
						<button data-id="<?= $obj->id ?>" data-type="th_term_total" data-total="<?= $thTotal ?>" data-obt="<?= (int)$obj->th_term_total ?>">Update</button>
					</th>
				<?php } else { ?>

					<th align="center">
						<?= floor($obj->th_term_total) ?>
					</th>

					<?php } ?>
				<th align="center">
					<?php if ($obj->subject_name == "IT" || $obj->subject_name == "B&W") { 
						$inTotal = 40;
					 } else if ($obj->subject_name == "Punjabi" || $obj->subject_name == "Sanskrit") { 
						$inTotal = 20; 
					 } else if (strtolower($obj->subject_name) == "home.sc." || $obj->subject_name == "Comp.Science" || $obj->subject_name == "Phy.Education" || $obj->subject_name == "CHEMISTRY" || $obj->subject_name == "PHYSICS" || $obj->subject_name == "BIOLOGY" || $obj->subject_name == "PSY") {  $inTotal = 30;
					} else if ($obj->subject_name == "Painting") { 
						$inTotal = 70; 
					} else { 
						$inTotal = 20; 
					} 

					echo $inTotal;
					
					?>
				</th>
				<?php if($style){ ?>

				<th align="center" style="display: block ruby;"><input type="text" id="in_term_<?= $obj->id ?>" value="<?= floor($obj->in_term_total) ?>">						
				<button data-id="<?= $obj->id ?>" data-type="in_term_total" data-total="<?= $inTotal ?>" data-obt="<?= (int)$obj->in_term_total ?>">Update</button>
			</th>
				<?php } else { ?>
					<th><?= floor($obj->in_term_total) ?></th>

					<?php } ?>
				<th align="center">100</th>
				<th align="center" class="right"><?=  $obj->total != 0 ? floor($obj->total) : '-' ?></th>
			</tr>
		<?php
			$ob = $ob + $obj->total;
			$tt = $tt + 100;
		} ?>

		<tr>
			<th colspan="6" rowspan="2" class="bottom"></th>
			<th align="left" class="nowrap"><?= $student_info->result_status == 'P' ? 'G.Total (500)' : 'G.Total (500)' ?></th>
			<th align="center" class="right"><?= $student_info->result_status == 'P' ?  floor($ob) : '-' ?></th>
		</tr>
		<tr>
			<th align="left" class="bottom nowrap">Percentage</th>
			<th class="bottom right" align="center"><?= $student_info->result_status == 'P' ? round(($ob * 100) / $tt, 2).'%' : '-' ?></th>
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
			<th colspan="6" align="left">Health & Physical Education</th>
			<td colspan="2" align="center" class="right"><?= $student_info->health_activity ?></td>
		</tr>

		<tr>
			<th colspan="6" align="left">Work Experience</th>
			<td colspan="2" align="center" class="right"><?= $student_info->work_exp ?></td>
		</tr>

		<tr>
			<th colspan="6" align="left">General Studies</th>
			<td colspan="2" align="center" class="right"><?= $student_info->general_study ?></td>
		</tr>

		<tr>
			<th colspan="6" align="left" class="bottom" >Discipline</th>
			<td colspan="2" align="center" class="right bottom"><?= $student_info->discipline ?></td>
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
			<th colspan="3" class="bottom" style="height:63px;" align="center"><img src="<?= base_url('assets/uploads/teacher-sign/' . $teacher_details->signature) ?>" alt="Teacher Sign" class="signature"></th>
			<th colspan="3" class="right bottom" style="height:63px;" align="center"><img src="<?= base_url('assets/uploads/teacher-sign/' . $principal_detail->signature) ?>" alt="Principal Signature" class="signature"></th>
		</tr>
		<!-- Blank Row -->
		<tr>
			<td colspan="8" class="no-border">&nbsp;</td>
		</tr>
		<tr>
			<th colspan="2" align="left" class="bottom">Date:&nbsp;<?= $announce_date ?></th>
			<th colspan="3" align="left" class="bottom">Class Teacher:&nbsp;<?= $teacher_details->name ?></th>
			<th colspan="3" align="left" class="bottom right">Principal:&nbsp;<?= $principal_detail->name ?></th>
		</tr>
	</table>
</body>
<?php if($style){ ?>

<script src="<?= base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>

<script>

$('input').keyup(function(e)
                                {
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});


$('button').on('click',function() {

	var type 	= $(this).attr('data-type');
	var id   	= $(this).attr('data-id');
	var obt     = $(this).attr('data-obt');
	var total   = $(this).attr('data-total');

	if(type == 'th_term_total')
	{
		var value   = $('#th_term_'+id).val();

	} else {

		var value   = $('#in_term_'+id).val();

	}

	if(parseInt(value) > parseInt(total))
	{
		if(type == 'th_term_total')
		{
			$('#th_term_'+id).val(obt);

		} else {

			$('#in_term_'+id).val(obt);

		}
		
		alert('Sorry! marks must be not be greater than total');

	} else {

	$.ajax({       
          type   	: "POST",
          url    	: "<?php echo site_url('report/update_subject_marks'); ?>",
          data   	: {type : type,id:id,value:value},  
		  dataType  : 'json',
          success: function(response)
		  {                                                   
             if(response.status)
             {
				alert(response.message);
				location.reload();
             } else {
				alert(response.message);
			 }
          }
       });
	}
})
</script>
<?php } ?>

</html>