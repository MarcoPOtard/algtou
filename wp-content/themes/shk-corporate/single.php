<?php
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
        <div class="row">
		
			<!-- Blog Area -->
            <?php
            if(have_posts()) {
                while(have_posts()) {
                    the_post();
                    ?>
                    <div class="col-md-8" >
                        <div id="post-<?php the_ID(); ?>" <?php post_class('blog-lg-area-left'); ?>>
                            <div class="media">
                                <div class="media-body">
                                    <?php // Check Image size for fullwidth template
                                    $args = array('class' => 'img-responsive');
                                    the_post_thumbnail('', $args);
                                    ?>
                                    <?php
                                    // call editor content of post/page
                                    the_content( __('Read More', 'appointment' ) );
                                    wp_link_pages( );
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h3><?php the_title(); ?></h3>
                        <p class="destiation-duration">Durée</p>
                        <p class="destiation-price">Prix</p>
                        <p><a href="mailto:?subject=test aussi">on test</a></p>
                    </div>
                    <?php
                }
            } ?>
			<!-- /Blog Area -->
			
			<!--Sidebar Area-->
			<div class="col-md-4">
                <?php if( is_active_sidebar('sidebar-travel') ) :
                    if ( function_exists('dynamic_sidebar')) :
                        dynamic_sidebar( 'sidebar-travel' );
                    endif;
                endif; ?>
			</div>
			<!--Sidebar Area-->
		</div>
	</div>
</div>
<!-- /Blog Section Right Sidebar -->
<?php get_footer(); ?>