<?php
/*
Template Name: 1 programme détaillé
Template Post Type: post
*/
get_header();
?>
<div class="page-title-section">
    <div class="container">
        <ul class="page-breadcrumb">
            <?php if (function_exists('qtt_custom_breadcrumbs')) qtt_custom_breadcrumbs();?>
        </ul>
    </div>
</div>
<!-- Blog Section Right Sidebar -->
<div class="page-builder page-destination">
	<div class="container">
        <div class="page-title"><h1><?php the_title(); ?></h1></div>

			<!-- Blog Area -->
            <?php
            if(have_posts()) {
                while(have_posts()) {
                    the_post();
                    ?>
                        <div id="post-<?php the_ID(); ?>" <?php post_class('blog-lg-area-left'); ?>>
                            <div class="media">
                                <div class="media-body">
                                    <?php
                                    // call editor content of post/page
                                    the_content( __('Read More', 'appointment' ) );
                                    wp_link_pages( );
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            } ?>
			<!-- /Blog Area -->
			
	</div>
</div>
<!-- /Blog Section Right Sidebar -->
<?php get_footer(); ?>