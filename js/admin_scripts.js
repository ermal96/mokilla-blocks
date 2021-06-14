(function( $ ) {
	'use strict';
	
	if ($('body.toplevel_page_mokilla-blocks-manager').length === 0) {
		return;
	}

	$( window ).load( function() {

		$('.check-all').change(function(){ 
			var type = $(this).data('type');
			var status = this.checked;
			$('.checkbox').each(function(){
				if( $(this).data('class') == type )
					this.checked = status;
			});
		});
		
		$('.checkbox').change(function(){
			var type = $(this).data('class');
			if(this.checked == false) {
				$('*[data-type="' + type + '"]')[0].checked = false;
			}

			if( $('*[data-class="' + type + '"]:checked').length == $('*[data-class="' + type + '"]').length ) {
				$('*[data-type="' + type + '"]')[0].checked = true;
			}
		});

	});

})( jQuery );
