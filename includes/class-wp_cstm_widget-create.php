<?php

class Wp_Cstm_Widget_Create extends WP_Widget {

    /**
     * Construct Function to initialize widget.
     */
    function __construct()
    {
        parent::__construct(
        'wp_cstm_widget',
        __("Wpd Ws Example Widget", 'wp_cstm_widget'),
        array('description' => __( 'Sample widget','wp_cstm_widget'))
        );
    }

    /**
     * Function to display html in front of site
     */
    public function widget($args, $instance)
    {
        $title = apply_filters( 'widget_title', $instance['title'] );
        echo "<h2>".$title."</h2>";
        if (!empty($instance['fname']) || $instance['lname']) {
            echo "<p>".__("Hello, My Name is ") . $instance['fname']." ".$instance['lname']."</p>";
        }
    }

    /**
     * Function to display form in the widget admin.
     */
    public function form($instance)
    {
        if ( isset( $instance[ 'title' ] ) ) {
        $title = $instance[ 'title' ];
        }
        else {
        $title = __( 'New title', 'wp_cstm_widget' );
        }
        // Widget admin form
        ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
        <label for="<?php echo $this->get_field_id( 'fname' ); ?>"><?php _e( 'First Name:', 'wp_cstm_widget' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'fname' ); ?>" name="<?php echo $this->get_field_name( 'fname' ); ?>" type="text" value="<?php echo isset($instance['fname']) ? esc_attr( $instance['fname'] ) : ""; ?>" />
        </p>
        <p>
        <label for="<?php echo $this->get_field_id( 'lname' ); ?>"><?php _e( 'Last Name:', 'wp_cstm_widget' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'lname' ); ?>" name="<?php echo $this->get_field_name( 'lname' ); ?>" type="text" value="<?php echo isset($instance['lname']) ? esc_attr( $instance['lname'] ) : ""; ?>" />
        </p>
        <p>
        <label for="<?php echo $this->get_field_id( 'sex' ); ?>"><?php _e( 'Sex:', 'wp_cstm_widget' ); ?></label> 
        <select class="widefat" id="<?php echo $this->get_field_id( 'sex' ); ?>" name="<?php echo $this->get_field_name( 'sex' ); ?>" >
            <option value="1" <?php echo ( isset($instance['sex']) && $instance['sex'] == "1" ) ? "selected='selected'" : "" ?> ><?php _e("Male", 'wp_cstm_widget') ?></option>
            <option value="2" <?php echo ( isset($instance['sex']) && $instance['sex'] == "2" ) ? "selected='selected'" : "" ?>><?php _e("Female", 'wp_cstm_widget') ?></option>
        </select>
        </p>
        <?php 
    }

    /**
     * Function to update widget information
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['fname'] = ( ! empty( $new_instance['fname'] ) ) ? strip_tags( $new_instance['fname'] ) : '';
        $instance['lname'] = ( ! empty( $new_instance['lname'] ) ) ? strip_tags( $new_instance['lname'] ) : '';
        $instance['sex'] = ( ! empty( $new_instance['sex'] ) ) ? strip_tags( $new_instance['sex'] ) : '';
        return $instance;
    }
}