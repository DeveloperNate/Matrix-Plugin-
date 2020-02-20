<?php
 
/**
 * Adds Foo_Widget widget.
 */
class TheMatrixWidget extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'Matrix', // Base ID
			esc_html__( 'Matrix Widget', 'mat_domain' ), // Name
			array( 'description' => esc_html__( 'A Matrix Widget that displays a title', 'mat_domain' ), ) // Args
        );
    }
 
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
 
        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }
        echo __( 'Hello, World!', 'text_domain' );
        echo $after_widget;
    }
 
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {

        $phrase = ! empty( $instance['phrase'] ) ? $instance['phrase'] : esc_html__( 'Welcome to the Matrix', 'mat_domain' ); // if statement that checks to see if the instance['phrase'] value is empty 
		$phraseTwo = ! empty( $instance['phraseTwo'] ) ? $instance['phraseTwo'] : esc_html__( 'Do you want to take the Red or Blue pill ?', 'mat_domain' );// if statement that checks to see if the instance['phraseTwo'] value is empty 
		$phraseThree = ! empty( $instance['phraseThree'] ) ? $instance['phraseThree'] : esc_html__( 'phraseThree ?', 'mat_domain' )

		?>
		<!-- Use HTML to create fields for our form  -->
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'phrase' ) ); ?>"><?php esc_attr_e( 'Title:', 'mat_domain' ); ?></label>  <!-- WordPress get_field_id creates name attributes for fields to be saved by update() -->
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phrase' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phrase' ) ); ?>" type="text" value="<?php echo esc_attr( $phrase  ); ?>"> 
		</p>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'phraseTwo' ) ); ?>"><?php esc_attr_e( 'Title 2:', 'mat_domain' ); ?></label> <!-- WordPress get_field_id creates name attributes for fields to be saved by update() -->
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phraseTwo' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phraseTwo' ) ); ?>" type="text" value="<?php echo esc_attr( $phraseTwo  ); ?>">
		</p>

        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'phraseThree' ) ); ?>"><?php esc_attr_e( 'Title 3:', 'mat_domain' ); ?></label> <!-- WordPress get_field_id creates name attributes for fields to be saved by update() -->
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phraseThree' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phraseThree' ) ); ?>" type="text" value="<?php echo esc_attr( $phraseThree  ); ?>">
		</p>

		<?php	
	}
 
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
 
        return $instance;
    }
 
} // class Foo_Widget
 
?>