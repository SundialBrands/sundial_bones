jQuery( document ).ready(function( $ ) {

	if ($('.cAc_wfs-sample-cta').length > 0) {
	
		$('.cAc_wfs-sample-cta').click( function(e) {
		
			$(this).closest('footer').addClass('active');
		
		});	//end $('.cAc_wfs-sample-cta').click( function(e)
		
		$('.cAc_wfs-sample-form-close').click( function(e) {
		
			$(this).closest('footer').removeClass('active');
		
		});	//end $('.cAc_wfs-sample-cta').click( function(e)
	
	}	//end if ($('.cAc_wfs-sample-cta').length > 0)

});	//end jQuery( document ).ready(function( $ )
