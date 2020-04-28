<?php
/*
Plugin Name: Samson_cpt_filter
Plugin URI: 
Description: Плагин который фильтрует custom posts.
Version: 1.0
Author: Samsonov Denys
Author URI: http://websamsonov.it
*/

//Add shortcode

add_shortcode( 'widget', 'my_widget_shortcode' );
function my_widget_shortcode( $atts ) {

// Configure defaults and extract the attributes into variables
extract( shortcode_atts( 
    array( 
        'type'  => '',
        'title' => '',
    ), 
    $atts 
));

$args = array(
    'before_widget' => '<div class="box widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="widget-title">',
    'after_title'   => '</div>',
);

ob_start();
the_widget( $type, $atts, $args ); 
$output = ob_get_clean();

return $output;
}
// Register and load the widget

function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
 
// Creating the widget 
class wpb_widget extends WP_Widget {
 
function __construct() {
parent::__construct(
 
// Base ID of your widget
'wpb_widget', 
 
// Widget name will appear in UI
__('WPBeginner Widget', 'wpb_widget_domain'), 
 
// Widget description
array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), ) 
);
}
 
// Creating widget front-end

public function widget( $args, $instance ) {
 $title = apply_filters( 'widget_title', $instance['title'] );
 
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
 
// This is where you run the code and display the output
// My personal filter
$filter_args='
<form action="/" class="form ">
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div><b>МЕСТОПОЛОЖЕНИЕ:</b></div>
        <input class="filter_input" type="text" name="координаты_местонахождения">
      </div>
      <div class="col-sm-4">
        <div><b>КОЛИЧЕСТВО ЭТАЖЕЙ:</b></div>
        <input class="filter_input" type="number" name="количество_этажей">
      </div>
      <div class="col-sm-4">
        <div><b>ТИП СТРОЕНИЯ:</b></div>
        <label for="панель">панель</label>
        <input class="filter_input" type="radio" id="панель" name="тип_строения" value="панель">
        <label for="кирпич">кирпич</label>
        <input class="filter_input" type="radio" id="кирпич" name="тип_строения" value="кирпич">
        <label for="пеноблок">пеноблок</label>
        <input class="filter_input" type="radio" id="пеноблок" name="тип_строения" value="пеноблок">
      </div>
     </div>
    <div class="row">
      <div class="col-sm-4">
        <div><b>ЭКОЛОГИЧНОСТЬ:</b></div>
        <input class="filter_input" type="number" name="экологичность">
      </div>
      <div class="col-sm-4">
        <div><b>ПЛОЩАДЬ:</b></div>
        <input class="filter_input" type="number" name="помещение_площадь">
      </div>
      <div class="col-sm-4">
        <div><b>КОЛ.КОМНАТ:</b></div>
        <input class="filter_input" type="number" name="помещение_кол_комнат">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div><b>БАЛКОН:</b></div>
        <label for="балкон">Да</label>
        <input class="filter_input" type="radio" name="помещение_балкон" value="да">
        <label for="балкон">Нет</label>
        <input class="filter_input" type="radio" name="помещение_балкон" value="нет">
      </div>
      <div class="col-sm-4">
        <div><b>САНУЗЕЛ:</b></div>
        <label for="санузел">Да</label>
        <input class="filter_input" type="radio" name="помещение_санузел" value="да">
        <label for="санузел">Нет</label>
        <input class="filter_input" type="radio" name="помещение_санузел" value="нет">
      </div>
    </div>
  </div>
</form>
';

echo __( $filter_args, 'wpb_widget_domain' );
echo $args['after_widget'];
}
         
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}
// Widget admin form
?>
 
 
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
 
 
<?php 
}
     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here