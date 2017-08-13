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
		<table width="100%" cellspacing="0" cellpadding="0" id="table_markah">
			<thead>
				<tr>
					<th>#</th>
					<th>Subject</th>
					<th>Marks</th>
					<th>Marks (%)</th>
					<th>Grade</th>
					<th>Grade Point</th>
					<th>Credit Hour</th>
					<th>Credit Points</th>
				</tr>
			</thead>
			<tbody>
				<?php $totalcreditHour = $bil1 = 0; foreach($year1 as $year1s): $bil1++;?>
					<tr class="main_petak">
						<td><?php echo $bil1;?></td>
						<td>
							<?php echo $year1s->subject_desc;?>
							<input type="hidden" id="subject_code" class="subject_code" rowid="<?php echo $bil1;?>" value="<?php echo $year1s->subject_code;?>">	
							<input type="hidden" id="id_subject" class="id_subject" rowid="<?php echo $bil1;?>" value="<?php echo $year1s->id_subject;?>">	
						</td>
						<td>
							<input type="text" name="simpanMarkah[]" class="markah1" id="markah1" rowid="<?php echo $bil1;?>">
							<input type="hidden" id="year" class="year" rowid="<?php echo $bil1;?>" value="2">
						</td>
						<td style="text-align:center;"><span id="percentMarkah1" class="percentMarkah1" rowid="<?php echo $bil1;?>"></span></td>
						<td style="text-align:center;"><span id="gradeMarkah1" class="gradeMarkah1" rowid="<?php echo $bil1;?>"></span></td>
						<td style="text-align:center;"><span id="gradePoint1" class="gradePoint1" rowid="<?php echo $bil1;?>"></span></td>
						<td style="text-align:center;"><?php echo $year1s->credit_hour;?><input type="hidden" id="hdnCreditHour1" class="hdnCreditHour1" rowid="<?php echo $bil1;?>" value="<?php echo $year1s->credit_hour;?>"/></td>
						<td style="text-align:center;"><span id="creditPoint1" class="creditPoint1" rowid="<?php echo $bil1;?>"/></td>
					</tr>
				<?php 

					$totalcreditHour += $year1s->credit_hour;

				endforeach;

				?>
				<tr>
					<td colspan="6" style="text-align:right;font-weight:bold;text-transform: uppercase;">Total</td>
					<td style="text-align:center;"><?php echo $totalcreditHour;?><input type="hidden" id="totalCreditHour1" value="<?php echo $totalcreditHour;?>"></td>
					<td style="text-align:center;"><span id="totalCreditPoint1"></span></td>
				</tr>
				<tr>
					<td colspan="6">&nbsp;</td>
					<td style="text-align:right;font-weight:bold;">GPA</td>
					<td style="text-align:center;"><span id="gpa1"></span></td>
				</tr>
				<tr>
					<td colspan="6">&nbsp;</td>
					<td style="text-align:right;font-weight:bold;">CGPA</td>
					<td style="text-align:center;"><span id="cgpa1"></span></td>
				</tr>
				<tr>
					<td colspan="8">
						<input type="hidden" id="total1" value="<?php echo $bil1;?>">
						<input type="hidden" id="hdnUrl" value="<?php echo base_url();?>">
						<input type="hidden" id="studentYear" value="<?php echo $student_year;?>">
					</td>
				</tr>
				<tr>
					<td colspan="8" style="text-align:center;">
						<button class="button small" id="btnSubmitMarkah">Save</button>
						<button class="button small secondary" id="btnBackMarkah">Back</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>