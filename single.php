<?php
/**
 * @package Bravisthemes
 */
get_header();
$builderrin_sidebar = builderrin()->get_sidebar_args(['type' => 'post', 'content_col'=> '8']);
$post_related = builderrin()->get_theme_opt( 'post_related', false );
$post_feature_image_on = builderrin()->get_page_opt( 'post_feature_image_on', true );
?>
<div class="container">
    <div class="row <?php echo esc_attr($builderrin_sidebar['wrap_class']) ?>">
        <?php if($post_feature_image_on) { ?>
            <?php if (has_post_thumbnail()) {
                echo '<div class="pxl-item--image col-12">'; ?>
                <?php the_post_thumbnail('builderrin-lager'); ?>
                <?php builderrin()->blog->get_post_metas_date(); ?>                
                <?php echo '</div>';
            } 
        } ?>            
        <div id="pxl-content-area" class="<?php echo esc_attr($builderrin_sidebar['content_class']) ?>">
            <main id="pxl-content-main">
                <?php while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content/content-single', get_post_format() );
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                } ?>
                <?php if($post_related) { builderrin()->blog->get_related_post(); } ?>
            </main>
        </div>
        <?php if ($builderrin_sidebar['sidebar_class']) : ?>
            <div id="pxl-sidebar-area" class="<?php echo esc_attr($builderrin_sidebar['sidebar_class']) ?>">
                <div class="pxl-sidebar-sticky">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer();
