$('.game__tile').on('click', function(){
	var postition = $(this).data();
	$('.shoot-mark-x').val(postition.x);
	$('.shoot-mark-y').val(postition.y);
});
