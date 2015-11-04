jQuery(function($){
	// $(".patronTypeTable").hide();
	// $("#undergradstaff").show();
	$("#patronselection").change(function(){
		$(".patronTypeTable").hide();
		$("#"+$(this).val()).show();
        window.location.hash = $(this).val();
    });

    hash = window.location.hash;
    if(hash){
        $(".patronTypeTable").hide();
        $(hash).show();

        // change select
        h = hash.split('#');
        $('#patronselection').val(h[1]);
    } else{
        console.log('no hash');
    }

});
