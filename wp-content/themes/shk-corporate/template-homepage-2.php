<?php
/**
Template Name: Home Page Algérie Tours 2
 */
get_header();
//****** get index static banner  ********
get_template_part('index', 'slider');

			if( $post->post_content != "" )
			{ ?>
			<?php if( have_posts()) :  the_post(); ?>
			<?php the_content(); ?>
				<?php endif; ?>
			<?php }


		get_footer();
?>