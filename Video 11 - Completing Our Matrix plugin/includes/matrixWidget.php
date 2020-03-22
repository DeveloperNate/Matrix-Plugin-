<?php
 

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
 
    public function widget( $args, $instance ) {
        
        $phrase = ! empty( $instance['phrase'] ) ? $instance['phrase'] : esc_html__( 'Welcome to the Matrix', 'mat_domain' ); // if statement that checks to see if the instance['phrase'] value is empty 
		$phraseTwo = ! empty( $instance['phraseTwo'] ) ? $instance['phraseTwo'] : esc_html__( 'Do you want to take the Red or Blue pill ?', 'mat_domain' );// if statement that checks to see if the instance['phraseTwo'] value is empty 
		$phraseThree = ! empty( $instance['phraseThree'] ) ? $instance['phraseThree'] : esc_html__( 'This is the third phrase?', 'mat_domain' );// if statement that checks to see if the instance['phraseTwo'] value is empty 
		
 
        echo $before_widget;
        
        echo '<div class="container">
				<div class="text "></div>
              </div>'; // create the html containers for us 
              
        echo '<script> 
            var titles = new Array();
			titles.push("'.$phrase.'");
			titles.push("'.$phraseTwo.'");
			titles.push("'.$phraseThree.'");

            const matrixTitle = document.querySelector(".text");
            const theMatrix = new Matrix(matrixTitle);
			
			let counter = 0;
			const loop = function() {
			theMatrix.getTextData(titles[counter]).then( function() {
    		setTimeout(loop, 800);
  				});
  			counter = (counter + 1) % titles.length;
		};

		loop();	
            
            </script>';


        echo $after_widget;
    }
 
 
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
 
   
    public function update( $new_instance, $old_instance ) {
        $instance = array(); // creates new array 
		$instance['phrase'] = strip_tags( $new_instance['phrase'] ); // add values to the new array - position has to be the same 
		$instance['phraseTwo'] = strip_tags( $new_instance['phraseTwo']) ;
		$instance['phraseThree'] = strip_tags( $new_instance['phraseThree']) ;
		return $instance; // return new array so it updates the old array in WordpPress
    }
 
} 
 
?>