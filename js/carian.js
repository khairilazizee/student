$(document).ready(function(){

	$("#btnCarianSearch").click(function(){

		var search = $("#search_name").val();
		var hdnUrl = $("#hdnUrl").val();

		if(search!=""){
			location.href=hdnUrl+'search/item/'+search
		} else {
			location.href=hdnUrl+'home'
		}

	});

});