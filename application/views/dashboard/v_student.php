<div class="row">
	<div class="small-12 columns">
		<div class="title-bar">
			<div class="title-bar-left">
				<div class="title-bar-title">
					<span>Student List</span>
				</div>
			</div>
		</div>
		<table width="100%" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th width="3">#</th>
					<th>Student ID</th>
					<th>Student Name</th>
					<th style="text-align:center;">Year</th>
					<th width="80" style="text-align:center;" colspan="3">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $bil=0; foreach($student_list as $list): $bil++;?>
					<tr>
						<td><?php echo $bil;?></td>
						<td><?php echo $list->student_stuid;?></td>
						<td><?php echo $list->student_name;?></td>
						<td style="text-align:center;"><?php echo $list->student_year;?></td>
						<td width="10"><a href="<?php echo base_url();?>home/mark/<?php echo $list->student_stuid;?>/<?php echo $list->student_year;?>">Mark</a></td>
						<td width="10">Edit</td>
						<td width="10">Delete</td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>