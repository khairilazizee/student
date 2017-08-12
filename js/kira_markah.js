$(document).ready(function(){

	$(document).on("change",".markah1",function(){

		var total1 = $("#total1").val();
		var rowid = $(this).attr("rowid");
		var studentid = $("#studentid").val();

		var markah1 = $(".markah1[rowid='"+rowid+"']").val();
		var hdnUrl = $("#hdnUrl").val();
		// alert(markah1);

		var total = parseFloat((markah1 / 200) * 100);
		// alert(total);
		$(".percentMarkah1[rowid='"+rowid+"']").html(total);

		$.ajax({
			url : hdnUrl+"setting/kira_grade",
			type : "POST",
			data : "markah="+total,
			success : function(data){
				
				var kotak = data.split("|");

				$(".gradeMarkah1[rowid='"+rowid+"']").html(kotak[0]);
				$(".gradePoint1[rowid='"+rowid+"']").html(kotak[1]);

				var gradeHour = $(".hdnCreditHour1[rowid='"+rowid+"']").val();

				var creditPoint = kotak[1] * gradeHour;

				// alert();

				$(".creditPoint1[rowid='"+rowid+"']").html(creditPoint);
				creditPoint1();

			}
		});

		gpa1();
		

		$.ajax({
			url : hdnUrl+"setting/kira_cgpa",
			type : "POST",
			data : "studentid="+studentid,
			success : function(data){
				// alert(data);
				if(data != 0){
					var kotak = data.split("|");
					// alert(kotak);
					var total_credit_hour = kotak[0];
					var total_credit_point = kotak[1];

					var totalcgpa = total_credit_point / total_credit_hour;
				} else {

					var totalCreditHour1 = $("#totalCreditHour1").val();
					// alert(totalCreditHour1);
					var totalCreditPoint1 = $("#totalCreditPoint1").html();

					var totalcgpa = totalCreditPoint1 / totalCreditHour1;
				}
				
				$("#cgpa1").html(totalcgpa);

			}
		});

	});

	$("#btnSubmitMarkah").click(function(){

		var studentYear = $("#studentYear").val();
		var studentid = $("#studentid").val();
		var rowid = $(this).attr("rowid");
		var hdnUrl = $("#hdnUrl").val();
		var bil = 1;
		$("#table_markah tr.main_petak").each(function(){

			var subject_code = $(".subject_code[rowid='"+bil+"']").val();
			var markah = $(".markah1[rowid='"+bil+"']").val();
			var percentMarkah = $(".percentMarkah1[rowid='"+bil+"']").html();
			var gradeMarkah = $(".gradeMarkah1[rowid='"+bil+"']").html();
			var gradePoint = $(".gradePoint1[rowid='"+bil+"']").html();
			var creditHour = $(".hdnCreditHour1[rowid='"+bil+"']").val();
			var creditPoint = $(".creditPoint1[rowid='"+bil+"']").html();
			// console.log(markah);
			
			bil++;

			$.post(hdnUrl+"setting/simpan_markah",{id_subject:subject_code,marks:markah,percent:percentMarkah,grade:gradeMarkah,grade_point:gradePoint,credit_hour:creditHour,credit_point:creditPoint,id_student:studentid,student_year:studentYear}).done(function(x){
				// alert(x);
				// if(x){

				// }
			});

		});


		var totalCreditHour = $("#totalCreditHour1").val();
		var totalCreditPoint = $("#totalCreditPoint1").html();
		var gpa = $("#gpa1").html();
		var cgpa = $("#cgpa1").html();

		$.post(hdnUrl+"setting/simpan_gpa",{id_student:studentid,student_year:studentYear,credit_hour:totalCreditHour,credit_point:totalCreditPoint,gpa:gpa,cgpa:cgpa}).done(function(x){

		});
		

	});


	$("#btnBackMarkah").click(function(){

		var hdnUrl = $("#hdnUrl").val();

		location.href=hdnUrl+'home'

	});

});

function creditPoint1(){

	var totalCreditPoint1 = 0;
	$(".creditPoint1").each(function(){
		var creditPoint1 = $(this).html();
		// alert(creditPoint1);
		totalCreditPoint1 += parseFloat(creditPoint1);
		// alert(totalCreditPoint1);
		$("#totalCreditPoint1").html(totalCreditPoint1);

		// alert(totalCreditPoint1);
		gpa1();

	});

}

function gpa1(){

	var totalCreditHour1 = $("#totalCreditHour1").val();
	var totalCreditPoint1 = $("#totalCreditPoint1").html();

	var gpa = totalCreditPoint1 / totalCreditHour1;

	$('#gpa1').html(gpa);

}
