$(document).ready(function($) {
	$('.popup-open').click(function() {
		$('.popup-fade').fadeIn();
		return false;
	});	
	
	$('.popup-close').click(function() {
		$(this).parents('.popup-fade').fadeOut();
		return false;
	});		
 
	$(document).keydown(function(e) {
		if (e.keyCode === 27) {
			e.stopPropagation();
			$('.popup-fade').fadeOut();
		}
	});
	
	$('.popup-fade').click(function(e) {
		if ($(e.target).closest('.popup').length == 0) {
			$(this).fadeOut();					
		}
	});
});
	function ReadMore(e){
		let under_content = document.querySelectorAll('.under_table');
		if (under_content[e].classList.contains('hidden')) {
			under_content[e].classList.remove('hidden');
		}
		else{
			under_content[e].classList.add('hidden');
		}
	}