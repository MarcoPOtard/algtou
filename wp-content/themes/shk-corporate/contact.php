<?php
/**
Template Name: page Contact
*/
get_header();
get_template_part('index','banner');
?>
<div class="page-contact">
			<?php if( $post->post_content != "" )
			{ ?>
			<?php if( have_posts()) :  the_post(); ?>
			<?php the_content(); ?>
				<?php endif; ?>
			<?php } ?>
				<?php comments_template( '', true ); // show comments ?>
</div>
<?php get_footer(); ?>