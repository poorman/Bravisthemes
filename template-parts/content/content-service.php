<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Bravisthemes
 */
$service_navigation = builderrin()->get_theme_opt( 'service_navigation', false );
$post_feature_service_image_on = builderrin()->get_page_opt( 'post_feature_service_image_on', true );
$post_title_service = builderrin()->get_theme_opt( 'post_title_service', true );
$post_title_service_on = builderrin()->get_page_opt( 'post_title_service_on', true );
?>
<article id="pxl-post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if($post_feature_service_image_on) { ?>
        <?php if (has_post_thumbnail()) {
            echo '<div class="pxl-item--image">'; ?>
            <?php the_post_thumbnail('builderrin-thumb-service'); ?>
            <?php echo '</div>';
        }
    } ?>
    <?php if($post_title_service && $post_title_service_on) { ?>
        <h3 class="pxl-service--title"><?php the_title(); ?></h3>
    <?php } ?>
    <div class="pxl-entry-content clearfix">
        <?php
        the_content();
        wp_link_pages( array(
            'before'      => '<div class="pxl-page-links">',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
        ) );
        ?>
    </div>
    <?php if($service_navigation) { builderrin()->blog->get_post_service_nav(); } ?>
</article>
