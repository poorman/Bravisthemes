<?php
global $post;
$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
$next     = get_adjacent_post( false, '', false );
if ( ! $next && ! $previous ) {
    return;
}
$next_post = get_next_post();
$previous_post = get_previous_post();

if( !empty($next_post) || !empty($previous_post) ) { ?>
    <div class="pxl-pagination1">
        <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
            <div class="pxl--item item--prev">
                <a class="btn-nav" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><span><?php echo esc_html__('Previous', 'builderrin'); ?></span></a>
                <h3 class="pxl-title-pagination">
                    <a href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>">
                        <?php echo get_the_title( $previous_post->ID ); ?>
                    </a>
                </h3>
            </div>
        <?php } ?>
        <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
            <div class="pxl--item item--next">
                <a class="btn-nav" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><span><?php echo esc_html__('Next', 'builderrin'); ?></span></a>
                <h3 class="pxl-title-pagination">
                    <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
                        <?php echo get_the_title( $next_post->ID ); ?>
                    </a>
                </h3>
            </div>
        <?php } ?>
    </div>
<?php } ?>