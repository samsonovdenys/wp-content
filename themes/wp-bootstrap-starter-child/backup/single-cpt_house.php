<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-lg-8">
		<main id="main" class="site-main" role="main">

		<?php
		$string = '';
		while ( have_posts() ) : the_post();
			$string .="<ul><li><h2><a href='".get_permalink();
                $string .="'>".get_field("название_дома");
                
                $string .="</a></h2></li><li>местонахождение:".get_field("координаты_местонахождения");
                $string .="</li><li>количество этажей:".get_field("количество_этажей");
                $string .="</li><li>тип строения:".get_field("тип_строения");
                $string .="</li><li>экологичность:".get_field("экологичность");
                $string .="</li><li>";
                $string .=wp_get_attachment_image(get_field("изображение") , 'medium' );
                $string .="</li><li>помещение:";
            
            if (have_rows("помещение")):
            while ( have_rows('помещение')):the_row();   

                $string .="</li><ul><li>площадь:".get_sub_field("площадь");
                $string .="</li><li>кол.комнат:".get_sub_field("кол_комнат");
                $string .="</li><li>балкон:".get_sub_field("балкон");
                $string .="</li><li>санузел:".get_sub_field("санузел");
                $string .="</li><li>фото:".wp_get_attachment_image(get_sub_field("изображение"),'thumbnail');
                $string .="</li></ul></ul>";
            endwhile;      
            endif;

		endwhile; // End of the loop.
		echo $string;
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
