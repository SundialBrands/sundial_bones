jQuery( document ).ready(function( $ ) {

	if( $('.set-sundial-cAc_wfs-media-field').length > 0 ) {
	
		window.send_to_editor_default = window.send_to_editor;
		var fieldID;
	
		$('.set-sundial-cAc_wfs-media-field').click( function(e) {
		
			e.preventDefault();
			fieldID = $(this).attr('id');
			// replace the default send_to_editor handler function with our own
			window.send_to_editor = window.attach_scacwfs_image;
			var query = 'media-upload.php?post_id=' + sundialCacwfsSampleId + '&amp;type=image&amp;TB_iframe=true';
			tb_show('', query);
			return false;
		
		});
		
		window.attach_scacwfs_image = function(html) {
 
			jQuery('body').append('<div id="temp_image">' + html + '</div>');

			var img = jQuery('#temp_image').find('img');

			imgSrc   = img.attr('src');
			imgClass = img.attr('class');
			imgIdClass = imgClass.split(" ").pop();
			imgId = parseInt(imgIdClass.replace('wp-image-', ''), 10);
			
			fieldID = fieldID.replace('set-', '');
			$('#' + fieldID).val(imgId);
			$('#remove-' + fieldID).show();

			$('img.' + fieldID).attr('src', imgSrc);

			try{tb_remove();}catch(e){};

			$('#temp_image').remove();

			window.send_to_editor = window.send_to_editor_default;
		}
	
		$('.remove-sundial-cAc_wfs-media-field').click( function(e) {
		
			e.preventDefault();
			fieldID = jQuery(this).attr('id');
			fieldID = fieldID.replace('remove-', '');
			jQuery('#' + fieldID).val('');
			jQuery('img.' + fieldID).attr('src', '');
			jQuery(this).hide();
			return false;
		
		});
	
	}
	

});	//end jQuery( document ).ready(function( $ )
