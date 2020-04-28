<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );


//Ajax filtering posts
//Ajax filtering posts
//Ajax filtering posts

add_action( 'wp_ajax_get_input_data', 'ajax_show_filtered_posts' );
add_action( 'wp_ajax_nopriv_get_input_data', 'ajax_show_filtered_posts' );
function ajax_show_filtered_posts() {
    
    
    $inp_obj = ! empty( $_POST['input_obj'] ) ? ( $_POST['input_obj'] ) : false;
    
    $arr_of_arrs = [];

foreach ($inp_obj as $key => $value) {    
    $a =  array(
              'key'   => $key, 
              'value' => $value
            );
    array_push($arr_of_arrs, $a);
};


function myarray($arr_of_arrs){

    $my_ar = array(
        'relation' => 'AND',
            $arr_of_arrs
        );
    return $my_ar;
};


        $args = array(
        'post_type'     => 'cpt_house',    
        'meta_query' => myarray($arr_of_arrs)
        );


        $string = '';
        
        $query = new WP_Query( $args );
        if( $query->have_posts() ){

            
            while( $query->have_posts() ){
                $query->the_post();
                
                $string .="<div class='container row'>";
                $string .="<div class='col-sm-7'>";
                $string .="<ul><li><h2><a href='".get_permalink();
                $string .="'>".get_field("название_дома");
                $string .="</a></h2>";
                $string .="<li>".wp_get_attachment_image(get_field("изображение") , 'medium' );
                $string .="</li>";
                $string .="</li><li>местонахождение:".get_field("координаты_местонахождения");
                $string .="</li><li>количество этажей:".get_field("количество_этажей");
                $string .="</li><li>тип строения:".get_field("тип_строения");
                $string .="</li><li>экологичность:".get_field("экологичность");
                $string .="</li></ul></div><div class='col-sm-5'>";
                $string .="<ul><li>помещение:";
            
            if (have_rows("помещение")):
            while ( have_rows('помещение')):the_row();   

                $string .="</li><li>площадь:".get_sub_field("площадь");
                $string .="</li><li>кол.комнат:".get_sub_field("кол_комнат");
                $string .="</li><li>балкон:".get_sub_field("балкон");
                $string .="</li><li>санузел:".get_sub_field("санузел");
                $string .="</li><li>".wp_get_attachment_image(get_sub_field("изображение"),'thumbnail');
                $string .="</li></ul></div></div><hr><hr>";
            endwhile;      
            endif;    
                  
        }
        wp_reset_query();
        wp_reset_postdata();
        echo $string;
        wp_die();
    }else{
       wp_die(); 
    }
}


add_action( 'wp_enqueue_scripts', 'my_assets' );
function my_assets() {
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/../wp-bootstrap-starter-child/custom.js', array( 'jquery' ) );
    //wp_enqueue_script( 'custom', plugins_url( 'custom.js', __FILE__ ), array( 'jquery' ) );
    
    wp_localize_script( 'custom', 'myPlugin', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ) );
}
//Ajax filtering posts
//Ajax filtering posts
//Ajax filtering posts



//Display custom posts
//Display custom posts
//Display custom posts
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
add_theme_support( 'post-thumbnails' );



    add_shortcode( 'myobjectwithfields', 'display_custom_post_type' );

    function display_custom_post_type(){
    	global $post;

        $args = array(
        
        'post_type'  => 'cpt_house',
        
        );

        $string = '';
        
        $query = new WP_Query( $args );
        if( $query->have_posts() ){

            
            while( $query->have_posts() ){
                $query->the_post();
                
                
                $string .="<div class='container row'>";
                $string .="<div class='col-sm-7'>";
                $string .="<ul><li><h2><a href='".get_permalink();
                $string .="'>".get_field("название_дома");
                $string .="</a></h2>";
                $string .="<li>".wp_get_attachment_image(get_field("изображение") , 'medium' );
                $string .="</li>";
                $string .="</li><li>местонахождение:".get_field("координаты_местонахождения");
                $string .="</li><li>количество этажей:".get_field("количество_этажей");
                $string .="</li><li>тип строения:".get_field("тип_строения");
                $string .="</li><li>экологичность:".get_field("экологичность");
                $string .="</li></ul></div><div class='col-sm-5'>";
                $string .="<ul><li>помещение:";
            
            if (have_rows("помещение")):
            while ( have_rows('помещение')):the_row();   

                $string .="</li><li>площадь:".get_sub_field("площадь");
                $string .="</li><li>кол.комнат:".get_sub_field("кол_комнат");
                $string .="</li><li>балкон:".get_sub_field("балкон");
                $string .="</li><li>санузел:".get_sub_field("санузел");
                $string .="</li><li>".wp_get_attachment_image(get_sub_field("изображение"),'thumbnail');
                $string .="</li></ul></div></div><hr><hr>";
            endwhile;      
            endif;    
                  
        }
        wp_reset_query();
        wp_reset_postdata();
        return $string;
    }
}
//Display custom posts
//Display custom posts
//Display custom posts















?>