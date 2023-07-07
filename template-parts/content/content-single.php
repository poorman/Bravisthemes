<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Bravisthemes
 */
$post_title = builderrin()->get_theme_opt( 'post_title', true );
$post_tag = builderrin()->get_theme_opt( 'post_tag', true );
$post_social_share = builderrin()->get_theme_opt( 'post_social_share', false );
$post_navigation = builderrin()->get_theme_opt( 'post_navigation', false );
$post_author_box_info = builderrin()->get_theme_opt( 'post_author_box_info', true );
$post_author_position = builderrin()->get_theme_opt( 'post_author_position' );
$align_content_post = builderrin()->get_page_opt( 'align_content_post', 'content-left' );
$post_title_on = builderrin()->get_page_opt( 'post_title_on', true );
?>
<article id="pxl-post-<?php the_ID(); ?>" <?php post_class( 'pxl-item-single-post'.' '.$align_content_post ); ?>>
    <div class="pxl-item--post">
        <?php builderrin()->blog->get_post_metas(); ?>
        <?php if($post_title && $post_title_on) { ?>
            <h2 class="pxl-item--title"><?php the_title(); ?></h2>
        <?php } ?>
        <div class="pxl-item--holder">
            <div class="pxl-item--content clearfix">
                <?php
                the_content();
                wp_link_pages( array(
                    'before'      => '<div class="page-links">',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
                ?>
            </div>
        </div>
        <?php if($post_tag || $post_social_share ) :  ?>
            <div class="pxl--post-footer">
                <?php if($post_tag) { builderrin()->blog->get_tagged_in(); } ?>
                <?php if($post_social_share) { builderrin()->blog->get_socials_share(); } ?>
            </div>
        <?php endif; ?>
        <?php if($post_navigation) { builderrin()->blog->get_post_nav(); } ?>
        <?php if($post_author_box_info) : ?>
            <div class="pxl--author-info">
                <div class="entry-author-avatar">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 160 ); ?>
                </div>
                <div class="entry-author-meta">
                    <h5 class="author-name">
                        <?php the_author_posts_link(); ?>
                    </h5>
                    <?php if(!empty($post_author_position)) : ?>
                        <div class="author-position"><?php echo esc_attr( $post_author_position ); ?></div>
                    <?php endif; ?>
                    <div class="author-description">
                        <?php the_author_meta( 'description' ); ?>
                    </div>
                    <?php builderrin_get_user_social(); ?>                    
                </div>
            </div>
        <?php endif; ?>
    </div>
</article><!-- #post -->