<?php
    get_header();
    $categories = get_the_category();
    if($categories[0]->parent != 0) {
        $category_id = $categories[0]->parent;
    } else {
        $category_id = $categories[0]->cat_ID;
    }
  ?>
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
                    <?php
                    if( is_active_sidebar( 'sidebar-category-top' ) ):
                        dynamic_sidebar( 'sidebar-category-top' );
                    endif;
                    ?>
                    <div class="sidebar-widget">
                        <div class="sidebar-widget-title"><h3><?php _e('Sort by categories','shk-corporate'); ?></h3></div>
                        <?php
                        $args = array(
//                                'include'           => $test,
                                'show_option_all'   => get_the_category_by_ID( $category_id ),
                                'child_of'          => $category_id,
                                'id'                => 'dropdown-cat',
                                'class'             => 'js-' . $category_id
                        );
                        wp_dropdown_categories( $args );
                        ?>
                    </div>
				    <?php get_sidebar(); ?>
                </div>

			</div>
			<!--Sidebar Area-->
		</div>
        <div class="part-testimonials" id="temoignages">
            <div class="page-title"><h1><?php _e('They testify', 'shk-corporate'); ?></h1></div>
            <?php
            echo do_shortcode('[WPCR_SHOW POSTID="ALL" NUM="5" PAGINATE="1" PERPAGE="3" SHOWFORM="1" HIDEREVIEWS="0" HIDERESPONSE="0" SNIPPET="" MORE="" HIDECUSTOM="0" ] ');
            ?>
        </div>
	</div>
</div>
<?php get_footer(); ?>