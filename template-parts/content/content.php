<?php
/**
 * @package Bravisthemes
 */
$archive_readmore_text = builderrin()->get_theme_opt('archive_readmore_text', esc_html__('Read More', 'builderrin'));
$archive_excerpt_on = builderrin()->get_theme_opt('archive_excerpts', true);
$archive_excerpt = get_the_excerpt($post->ID);
$thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('pxl-item--archive'); ?>>
    <?php if (has_post_thumbnail()) { 
        echo '<div class="pxl-item--image">'; ?>
        <a href="<?php echo esc_url( get_permalink()); ?>"><?php the_post_thumbnail('builderrin-lager'); ?></a>
        <?php builderrin()->blog->get_archive_meta(); ?>
        <?php echo '</div>';
    } ?>
    <div class="item--holder">
        <?php builderrin()->blog->get_archive_metas_category(); ?>
        <h3 class="item--title">
            <a href="<?php echo esc_url( get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
                <?php if(is_sticky()) { ?>
                    <i class="caseicon-check-mark"></i>
                <?php } ?>
                <?php the_title(); ?>
            </a>
        </h3>
        <?php if($archive_excerpt_on && !empty($archive_excerpt)): ?>
            <div class="item--excerpt">
                <?php
                builderrin()->blog->get_excerpt();
                wp_link_pages( array(
                    'before'      => '<div class="page-links">',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
                ?>
            </div>
        <?php endif; ?>
        <a class="pxl-button" href="<?php echo esc_url( get_permalink()); ?>">
            <span class="pxl--btn-text">
                <i class="far fa-arrow-right"></i>
                <?php if(!empty($archive_readmore_text)) {
                    echo builderrin_html($archive_readmore_text);
                } else {
                    echo builderrin_html('read article', 'builderrin');
                } ?>
            </span>
        </a>
    </div>
</article>