<?php
  get_header(); ?>
<!-- Page Title Section -->
<div class="page-title-section">		
		<div class="container">
            <ul class="page-breadcrumb">
                <?php if (function_exists('qtt_custom_breadcrumbs')) qtt_custom_breadcrumbs();?>
            </ul>
		</div>
</div>
<div class="page-builder">
    <div class="container">
        <div class="page-title"><h1><?php echo single_cat_title("", false); ?></h1></div>
    </div>
	<div class="container">
		<div class="row">
			<!-- Blog Area -->
			<div class="<?php appointment_post_layout_class(); ?>" >
                <div class="category-page">

                    <?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();

                            get_template_part( 'category-content','');
                        endwhile;
                    endif;
                    ?>
                </div>
                <?php
				// Previous/next page navigation.
				the_posts_pagination( array(
				'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
				'next_text'          => '<i class="fa fa-angle-double-right"></i>',
				) );
				?>
			<!-- /Blog Pagination -->
			</div>
			<!--Sidebar Area-->
			<div class="col-md-4">
                <div class="sidebar-section-right">
                    <div class="sidebar-widget-title"><h3><?php _e('Sort by categories','shk-corporate'); ?></h3></div>
                    <?php
                    $args = array(
                            'include'           => 'destinations',
                            'show_option_all'   => get_the_category_by_ID(  5 ),
                            'child_of'          => 5,
                    );
                    wp_dropdown_categories( $args );
                    ?>
                </div>

				<?php get_sidebar(); ?>
			</div>
			<!--Sidebar Area-->
		</div>
	</div>
</div>
<?php get_footer(); ?>