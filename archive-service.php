<?php
/**
 * @package Bravisthemes
 */
get_header();
$pxl_sidebar = builderrin()->get_sidebar_args(['type' => 'service', 'content_col'=> '8']); // type: blog, post, page, shop, product
?>
<div class="container">
    <div class="row <?php echo esc_attr($pxl_sidebar['wrap_class']) ?>" >
        <div id="pxl-content-area" class="<?php echo esc_attr($pxl_sidebar['content_class']) ?>">
            <?php if ( have_posts() ): ?>
                <main id="pxl-content-main">
                    <?php if ( have_posts() ) {
                        while ( have_posts() ) {
                            the_post();
                            get_template_part( 'template-parts/content/content' );
                        }
                        builderrin()->page->get_pagination();
                    } else {
                        get_template_part( 'template-parts/content/content', 'none' );
                    } ?>
                </main>
            <?php endif; ?>
        </div>
        <?php if ($pxl_sidebar['sidebar_class']) : ?>
            <div id="pxl-sidebar-area" class="<?php echo esc_attr($pxl_sidebar['sidebar_class']) ?>">
                <div class="pxl-sidebar-sticky">
                    <?php dynamic_sidebar( 'sidebar-services' ); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer();
