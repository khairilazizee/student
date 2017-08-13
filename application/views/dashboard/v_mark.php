<div class="row">
	<div class="small-12 columns">
		<?php

		foreach($student_information as $info):

		?>
		<div class="row text-left">
			<div class="small-2 columns">
				<label for="lbl_name" class="text-right">
					Name&nbsp;:
				</label>
			</div>
			<div class="small-10 columns">
				<?php echo $info->student_name;?>
				<input type="hidden" id="studentid" value="<?php echo $info->student_stuid;?>">
			</div>
		</div>
		<div class="row">
			<div class="small-2 columns">
				<label for="lbl_batch" class="text-right">
					Batch&nbsp;:
				</label>
			</div>
			<div class="small-10 columns">
				<?php echo $info->student_batch;?>
			</div>
		</div>
		<div class="row">
			<div class="small-2 columns">
				<label for="lbl_regno" class="text-right">
					Reg No&nbsp;:
				</label>
			</div>
			<div class="small-10 columns">
				<?php echo $info->student_reg_no;?>
			</div>
		</div>
	
	<?php

	endforeach;

	?>
	</div>
	<p>&nbsp;</p>
	<div class="small-12 columns">
		<div class="title-bar">
			<div class="title-bar-left">
				<div class="title-bar-title">
					<span>Year <?php echo $student_year;?></span>
				</div>
			</div>
		</div>
		<table width="100%" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th>#</th>
					<th>Subject</th>
					<th style="text-align:center;">Marks</th>
					<th style="text-align:center;">Marks (%)</th>
					<th style="text-align:center;">Grade</th>
					<th style="text-align:center;">Grade Point</th>
					<th style="text-align:center;">Credit Hour</th>
					<th style="text-align:center;">Credit Points</th>
				</tr>
			</thead>
			<tbody>
				<?php $totalcredithour = $totalcreditpoint = $bil=0; foreach($student_marks as $marks): $bil++;?>
					<tr>
						<td><?php echo $bil;?></td>
						<td><?php echo $marks->subject_desc;?></td>
						<td style="text-align:center;"><?php echo $marks->marks;?></td>
						<td style="text-align:center;"><?php echo $marks->percent;?></td>
						<td style="text-align:center;"><?php echo $marks->grade;?></td>
						<td style="text-align:center;"><?php echo $marks->grade_point;?></td>
						<td style="text-align:center;"><?php echo $marks->credit_hour;?></td>
						<td style="text-align:center;"><?php echo $marks->credit_point;?></td>
					</tr>
				<?php 
					$totalcredithour += $marks->credit_hour;
					$totalcreditpoint += $marks->credit_point;
				endforeach;

				?>
				<tr>
					<td colspan="6" style="text-align:right;font-weight:bold;text-transform: uppercase;">Total</td>
					<td style="text-align:center;font-weight:bold;"><?php echo $totalcredithour;?></td>
					<td style="text-align:center;font-weight:bold;"><?php echo $totalcreditpoint;?></td>
				</tr>
				<?php 

					foreach($student_gpa as $gpascore):

						$gpa = $gpascore->gpa;
						$cgpa = $gpascore->cgpa;

					endforeach;
				?>
				<tr>
					<td colspan="6"></td>
					<td style="text-align:center;font-weight:bold;text-transform: uppercase;">GPA</td>
					<td style="text-align:center;font-weight:bold;"><?php echo $gpa;?></td>
				</tr>
				<tr>
					<td colspan="6"></td>
					<td style="text-align:center;font-weight:bold;text-transform: uppercase;">CGPA</td>
					<td style="text-align:center;font-weight:bold;"><?php echo $cgpa;?></td>
				</tr>
				<tr>
					<td colspan="8">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="8" style="text-align:center;">
						<input type="hidden" id="hdnUrl" value="<?php echo base_url();?>">
						<button class="button small secondary" id="btnBackMarkah">Back</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>