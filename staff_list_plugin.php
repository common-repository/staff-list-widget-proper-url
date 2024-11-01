<?php

/*

 * Plugin name: A Staff List Plugin

 * Plugin URI: http://www.bythegram.ca

 * Description: Creates a Widget Area and Widget that helps you list your staff memembers and their roles

 * Version: 1.1.2

 * Author: Adam Graham 

 * 

 */



if (!class_exists("staff_list_widget")) {



/**

 * The CSS

 */

function StaffList_Styles() {

        wp_enqueue_style( 'StaffList-Plugin-Style', plugin_dir_url( __FILE__ ) . 'stafflist-plugin-style.css', array(), '0.1', 'screen' );

}

add_action( 'wp_enqueue_scripts', 'StaffList_Styles' );

	

 /**

 * Register our Staff List Widget Area

 *

 */

	register_sidebar( array(

		'name' => 'Staff Lists',

		'id' => 'staff_list',

		'before_widget' => '<div id="%1$s" class="widget-container staff-widget %2$s>',

		'after_widget' => '</div>',

		'before_title' => '<h2 class="rounded">',

		'after_title' => '</h2>',

	) );

/**

 * Shortcode

 */

 //[staff_list]

function staff_list_func( $atts ){

	extract( shortcode_atts( array(

		'title' => '',

		'class' => 'ag_staff',

	), $atts ) );

	$html = '<div class="'.$class.'"><h3>'.$title.'</h3>';

	ob_start();

	dynamic_sidebar('staff_list');

	$html .= ob_get_contents();

	ob_end_clean();

	$html .= '</div>';

	return $html;

}

add_shortcode( 'staff_list', 'staff_list_func' );





	class staff_list_widget extends WP_Widget {

 

		function staff_list_widget() {

			$widget_ops = array('classname' => 'staff_list_widget', 'description' => 'List staff members on separate lines and separate their name and role with "|"' );

			$this->WP_Widget('staff_list_widget', 'Staff List Widget', $widget_ops);

		}

 		/* This is the code that gets displayed on the UI side,

		 * what readers see.

		 */

		function widget($args, $instance) {

			$listname = $instance['listname'];

        	$listclass = $str = strtolower($listname);

			$allusers = $instance['user'];

                $users = explode("\n", $allusers);

				echo '<ul class="ag_staff '.$listclass.'" >';

				echo '<li><h4>'.$listname.'</h4></li>';

				foreach ($users as $user) :

					$theinfo = explode("|", $user);

					$name = $theinfo[0];

					$role = $theinfo[1];

					if($role != '' ) {

						echo '<li><b>'.$name.'</b><span>'.$role.'</span></li>';	

					} else {

						echo '<li>'.$name.'</li>';	

					}

				endforeach; 

				echo '</ul>';	

		}

 

		function update($new_instance, $old_instance) {

			return $new_instance;

		}

 		/* Back end, the interface shown in Appearance -> Widgets

		 * administration interface.

		 */

		function form($instance) {

			

           	$listname = esc_attr($instance['listname']);

            $allusers = esc_attr($instance['user']);

?>



<p>

  <label for="<?php echo $this->get_field_id('listname'); ?>">

    <?php _e('List Name:','your-theme'); ?>

  </label>

  <input type="text" name="<?php echo $this->get_field_name('listname'); ?>" value="<?php echo $listname; ?>" class="widefat" id="<?php echo $this->get_field_id('listname'); ?>" />

</p>

<p>

  <label for="<?php echo $this->get_field_id('user'); ?>">

    <?php _e('User name|User title','your-theme'); ?>

  </label>

  <textarea name="<?php echo $this->get_field_name('user'); ?>" class="widefat" id="<?php echo $this->get_field_id('user'); ?>"><?php echo $allusers; ?></textarea>

</p>



<?php

		}			

	}

 

	function staff_list_widget_init() {

		register_widget('staff_list_widget');

	}

	

	add_action('widgets_init', 'staff_list_widget_init');

 

}

 

$wpdpd = new staff_list_widget();

 

?>
