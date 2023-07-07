<?php
/**
 * @package Bravisthemes
 */
get_header();
?>
<div class="container">
    <div class="row">
        <div id="pxl-content-area" class="col-12 col-xl-8 col-lg-8">
            <main id="pxl-content-main">
                <?php while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content/content-portfolio', get_post_format() );
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                } ?>
            </main>
        </div>
        <div id="pxl-sidebar-area" class="col-12 col-xl-4 col-lg-4 no-padding">
            <div class="pxl-sidebar-sticky">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer();
