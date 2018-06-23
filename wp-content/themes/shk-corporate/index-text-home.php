<!-- section texte page accueil -->
<?php 

$id_accueil = get_option('page_on_front');
$post_accueil = get_post($id_accueil);
$post_accueil_title = $post_accueil -> post_title;
if( is_front_page() ) {
    $post_accueil_content = $post_accueil -> post_content;

//var_dump(is_front_page());
//var_dump(pll_current_language());
//var_dump(get_option('page_on_front'));
    ?>

    <div id="dmc-algerie-tours" class="text-home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-home-section-content">
                        <div class="thsc-picture">
                            <?php
                            echo get_the_post_thumbnail( $id_accueil, '', array( 'class' => 'img-responsive' ) );
                            ?>
                        </div>
                        <div class="thsc-text">
                            <?php
                            echo apply_filters( 'the_content', $post_accueil->post_content )
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>