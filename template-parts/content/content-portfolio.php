<?php
/**
 * @package Bravisthemes
 */
$portfolio_navigation = builderrin()->get_theme_opt( 'portfolio_navigation', false );
$projects_related = builderrin()->get_theme_opt( 'projects_related', false );
$post_feature_portfolio_image_on = builderrin()->get_page_opt( 'post_feature_portfolio_image_on', true );
$post_title_portfolio = builderrin()->get_theme_opt( 'post_title_portfolio', true );
$post_title_portfolio_on = builderrin()->get_page_opt( 'post_title_portfolio_on', true );
?>
<article id="pxl-post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if($post_feature_portfolio_image_on) { ?>
        <?php if (has_post_thumbnail()) {
            echo '<div class="pxl-item--image">'; ?>
            <?php the_post_thumbnail('builderrin-thumb-portfolio'); ?>
            <?php echo '</div>';
        }
    } ?>
    <?php if($post_title_portfolio && $post_title_portfolio_on) { ?>
        <h3 class="pxl-portfolio--title"><?php the_title(); ?></h3>
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
    <?php builderrin()->blog->get_portfolio_metas(); ?>    
    <?php if($portfolio_navigation) { builderrin()->blog->get_post_portfolio_nav(); } ?>
</article>