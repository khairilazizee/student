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

					var cgpa = total_credit_point / total_credit_hour;
				} else {

					var totalCreditHour1 = $("#totalCreditHour1").val();
					// alert(totalCreditHour1);
					var totalCreditPoint1 = $("#totalCreditPoint1").html();

					var cgpa = totalCreditPoint1 / totalCreditHour1;
				}
				
				$("#cgpa1").html(cgpa);

			}
		});

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
