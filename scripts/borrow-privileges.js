jQuery(function($){
	$(".patronTypeTable").hide();
	$("#undergradstaff").show();
	$("#patronselection").change(function(){
		$(".patronTypeTable").hide();
		$("#"+$(this).val()).show();
	});
});
