<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://webaone.com
 * @since      1.0.0
 *
 * @package    Wp_cstm_widget
 * @subpackage Wp_cstm_widget/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <div id="icon-themes" class="icon32"></div>
    <h2><?php _e("WP Settings & Widget Page", 'wp_cstm_widget'); ?></h2>
    <!--NEED THE settings_errors below so that the errors/success messages are shown after submission - wasn't working once we started using add_menu_page and stopped using add_options_page so needed this-->
    <?php settings_errors(); ?>
    <form method="POST" action="options.php">
        <?php
        settings_fields($this->plugin_name . '_general_settings');
        do_settings_sections($this->plugin_name . '_general_settings');
        ?>
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><?php _e("Title", "wp_cstm_widget"); ?>:</th>
                    <td>
                        <input type="text" name="wp_cstm_widget_title" class="regular-text" value="<?php echo get_option('wp_cstm_widget_title'); ?>">
                        <p class="description"><?php _e("Enter Title", "wp_cstm_widget"); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php _e("Description", "wp_cstm_widget"); ?>:</th>
                    <td>
                        <textarea name="wp_cstm_widget_description" id="wp_cstm_widget_description" cols="50" rows="5"><?php echo get_option('wp_cstm_widget_description'); ?></textarea>
                        <p class="description"><?php _e("Enter a description", "wp_cstm_widget"); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php _e("Editor Content", "wp_cstm_widget"); ?>:</th>
                    <td>
                        <?php wp_editor(get_option('wp_cstm_widget_editor_content'), 'wp_cstm_widget_editor_content', $settings = array('textarea_rows' => '10')); ?>
                        <p class="description"><?php _e("Enter a editor content", "wp_cstm_widget"); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php _e("Date", "wp_cstm_widget"); ?>:</th>
                    <td>
                        <input type="date" value="<?php echo get_option('wp_cstm_widget_date'); ?>" name="wp_cstm_widget_date" class="regular-text">
                        <p class="description"><?php _e("Enter a date.", "wp_cstm_widget"); ?></p>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><?php _e("Image", "wp_cstm_widget"); ?>:</th>
                    <td>
                        <label for="upload_image">
                            <div id="wpss_upload_image_thumb" class="wpss-file">
                                <?php
                                $wp_cstm_widget_logo_image = get_option('wp_cstm_widget_logo_image');
                                if ($wp_cstm_widget_logo_image != NULL) {
                                ?>
                                    <img src="<?php echo $wp_cstm_widget_logo_image; ?>" width="65" />
                                <?php
                                }
                                ?>
                            </div>
                            <input id="upload_image" type="text" size="36" name="wp_cstm_widget_logo_image" value="<?php echo ($wp_cstm_widget_logo_image != NULL) ? $wp_cstm_widget_logo_image : ''; ?>" />
                            <input id="upload_image_button" type="button" value="<?php _e('Upload Image', 'wp_cstm_widget'); ?>" />
                            <input id="remove_button" type="button" value="Remove" onclick="clear_image()" />
                            <br />
                            <?php _e('Enter an URL or Choose image.', 'wp_cstm_widget'); ?>
                            <script type="text/javascript">
                                function clear_image() {
                                    jQuery("#upload_image").val('');
                                    jQuery('#wpss_upload_image_thumb img').hide();
                                }
                            </script>
                        </label>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php _e("Color", "wp_cstm_widget"); ?>:</th>
                    <td>
                        <input type="text" name="wp_cstm_widget_color" value="<?php echo get_option('wp_cstm_widget_color'); ?>" class="wp_cstm_widget_color" >
                        <p class="description"><?php _e("Choose a color.", "wp_cstm_widget"); ?></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php submit_button(); ?>
    </form>
</div>