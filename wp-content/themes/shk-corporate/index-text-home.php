<!-- section texte page accueil -->
<?php 

$id_accueil = 41;
$post_accueil = get_post($id_accueil);
$post_accueil_title = $post_accueil -> post_title;
if( strtolower($post_accueil_title) == 'accueil') {
    $post_accueil_content = $post_accueil -> post_content;
    ?>

    <div class="text-home-section">
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