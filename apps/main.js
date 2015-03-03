$(document).ready(function(){
	$(".backdrop").hide();
	$(".app_close").click(function(){
		$(".backdrop").fadeOut();
	});
	$(".app_pop").click(function(){
		var id = $(this).attr("id");
		$("#"+id).fadeIn();
	});
});