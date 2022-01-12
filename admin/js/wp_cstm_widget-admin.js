(function( $ ) {
	// 'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	/**
     * Logo upload popup show
     */
	
	jQuery(document).on('click', '#upload_image_button', function () {
        var formfield = jQuery('#upload_image').attr('name');
        tb_show('Upload a logo', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;
    });

	window.send_to_editor = function (html) {

        var imgExists = html.indexOf('<img src="');

        if (imgExists > -1) {
            var i = imgExists + 10;

            html = html.substr(i);
            html = html.substr(0, html.indexOf('"'));
        }
        jQuery('#upload_image').val(html);
        tb_remove();
        jQuery('#wpss_upload_image_thumb').html("<img height='65' src='" + html + "'/>");
    }

	$( window ).load(function() {
		$('.wp_cstm_widget_color').wpColorPicker();
	});

})( jQuery );
