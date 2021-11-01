jQuery(document).ready(function(){
	jQuery(".rt-countdown").each(function(){
		jQuery(this).countdown( jQuery(this).data("countdown") , function(event){
			jQuery(this).html(
			  event.strftime("<div class='time'><strong>%D</strong> Days</div> <div class='time'><strong>%H</strong> Hours</div> <div class='time'><strong>%M</strong> Min</div> <div class='time'><strong>%S</strong> Sec</div>")
			);
		});
	});
});