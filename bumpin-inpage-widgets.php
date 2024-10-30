<?php
/**
 * Plugin Name: Bumpin Inpage Widgets
 * Plugin URI: http://www.bumpin.com/widgets
 * Description: Most popular wordpress widgets used by over 200,000 websites. Widgets include Facebook, Twitter,  Youtube, Weather, Flickr, RSS Feed, Recent Posts, Real Time Visitors and many more
 * Version: 3.0
 * Author: Bumpin Team
 * Author URI: http://www.bumpin.com
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'bumpin_vfour_load_widgets' );

/**
 * Register our widgets
 * 
 *
 * @since 0.1
 */
function bumpin_vfour_load_widgets() {
	register_widget('Weather_Widget' );
	register_widget('LiveFeed_Widget' );
	register_widget('RecentPost_Widget');
	register_widget('FacebookActivity_Widget');
	register_widget('FacebookFanpage_Widget');
	register_widget('Flickr_Widget');
	register_widget('Picasa_Widget');
	register_widget('Youtube_Widget');
	register_widget('FacebookRecommend_Widget');
	register_widget('RSSFeed_Widget');
  	register_widget('GrooveShark_Widget');
  	register_widget('IMChat_Widget');
  	register_widget('OnlineGames_Widget');
   	
}

class BumpinWidget extends WP_Widget {
	
	public $widget_name = 'widget';
	public $widget_title = "Bumpin Widget";

	/**
	 * Widget setup.
	 */
	function BumpinWidget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'bumpin_widget', 'description' => __('Bumpin Widgets', 'bumpin_widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'bumpin-wp-'.strtolower($this->widget_name));

		/* Create the widget. */
		$this->WP_Widget( 'bumpin-wp-'.$this->widget_name, __($this->widget_title, $this->widget_name), $widget_ops, $control_ops );
	}

	/**
	 *display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		if (empty($instance['bumpin_id'])){
			$bumpin_user_id=11684;
		}
		else{
			$bumpin_user_id=$instance['bumpin_id'];
		}

		$bumpin_code = '<script src="http://www.bumpin.com/ipw?code=' .$bumpin_user_id. '" type="text/javascript" ></script>
		<div id="ipw-'.$this->widget_name.'">
		  <div id="bsb-app-'.$this->widget_name.'" class="b-sb-ipw"></div>
		  <div class="bsb-link-div" style="width: 100%; font-size: 9px; text-align: right; left: -5px; top: 0px; position: relative; background: transparent; direction: ltr; background-color: transparent; font-family:verdana; opacity: 1; ">Get this
		  <a  class="bsb-link-text" href="http://www.bumpin.com/widgets/' .$this->widget_name.'.php" style="color:#000; direction: ltr; font-size:9px; background-color: transparent; background: transparent;" target="_blank">'.$this->widget_title.'</a>
		</div>
		</div>';

		echo $bumpin_code;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['bumpin_id'] = strip_tags( $new_instance['bumpin_id'] );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'bumpin_id' => __('', $this->widget_name));
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Your Name: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'bumpin_id' ); ?>"><?php _e('Your Bumpin ID:', $this->widget_name); ?></label>
			<input id="<?php echo $this->get_field_id( 'bumpin_id' ); ?>" name="<?php echo $this->get_field_name( 'bumpin_id' ); ?>" value="<?php echo $instance['bumpin_id']; ?>" style="width:100%;" />
		</p>
		<p>Customize and resize your Widget by creating your FREE account at www.bumpin.com.</p>
		<p>Click here to get your BumpIn id: <a href="http://www.bumpin.com" target="_blank">Sign up and get BumpIn Id</a></p>
		<p ><span style="font-weight:bold">Note:</span>You can use this widget without BumpIn Id because for our default settings you do not require a BumpIn Id</p>

	<?php
	}
}

class Weather_Widget extends BumpinWidget {	
	public $widget_name = 'weather';
	public $widget_title = "Weather Widget";
}
class IMChat_Widget extends BumpinWidget{
        public $widget_name = 'im_chat';
        public $widget_title = "Multi IM Widget";
}
class LiveFeed_Widget extends BumpinWidget {	
	public $widget_name = 'live_feed';
	public $widget_title = "Visitors Map Widget";
}
class RecentPost_Widget extends BumpinWidget {	
	public $widget_name = 'recent_posts';
	public $widget_title = "Recent Posts Widget";
}
class FacebookActivity_Widget extends BumpinWidget {	
	public $widget_name = 'fb_activity';
	public $widget_title = "Facebook Activity Widget";
}
class FacebookFanpage_Widget extends BumpinWidget {	
	public $widget_name = 'fb_fan_page';
	public $widget_title = "Facebook Fanpage Widget";
}
class Flickr_Widget extends BumpinWidget {	
	public $widget_name = 'flickr';
	public $widget_title = "Flickr Widget";
}
class Picasa_Widget extends BumpinWidget {	
	public $widget_name = 'picasa';
	public $widget_title = "Picasa Widget";
}
class Youtube_Widget extends BumpinWidget {	
	public $widget_name = 'youtube';
	public $widget_title = "Youtube Widget";
}
class OnlineGames_Widget extends BumpinWidget {	
	public $widget_name = 'onlineGame';
	public $widget_title = "Online Games Widget";
}
class FacebookRecommend_Widget extends BumpinWidget {	
	public $widget_name = 'fb_recommend';
	public $widget_title = "Facebook Recommend Widget";
}
class RSSFeed_Widget extends BumpinWidget {	
	public $widget_name = 'rss_feed';
	public $widget_title = "RSS Feed Widget";
}
class GrooveShark_Widget extends BumpinWidget {	
	public $widget_name = 'grooveShark';
	public $widget_title = "Groove Shark Widget";
}

?>
