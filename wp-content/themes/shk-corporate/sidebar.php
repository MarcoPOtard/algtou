<?php if( is_active_sidebar('sidebar-primary') ) : ?>
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-primary') ) : ?>
        <?php endif;?>
<?php endif; ?>