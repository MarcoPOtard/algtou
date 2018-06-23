<?php
$id_accueil = get_option('page_on_front');
$post_accueil = get_post($id_accueil);
$post_accueil_title = $post_accueil -> post_title;

$usefull_info_title = get_post_meta( $id_accueil, 'home_informations_utiles_titre', true );
$usefull_info_picture = get_post_meta( $id_accueil, 'home_informations_utiles_image', true );
?>

<div class="blog-section" id="informations-utiles">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading-title">
                    <h2><?php echo $usefull_info_title; ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="home-section-usefull-infos">
                    <div class="hsui-picture">
                        <?php
                            echo wp_get_attachment_image($usefull_info_picture, '', array('100%','auto'), array( "class" => "img-responsive" ));
                        ?>
                    </div>
                    <div class="hsui-menu">
                        <?php
                        wp_nav_menu ( array (
                            'theme_location' => 'home-info-usefull' ,
                            'container' => 'ul',
                        ) );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





