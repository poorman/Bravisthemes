<?php
/**
 * Helper functions for the theme
 *
 * @package Bravisthemes
 */


function builderrin_html($html){
    return $html;
}

/**
 * Google Fonts
*/
function builderrin_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    if ( 'off' !== _x( 'on', 'Nunito Web font: on or off', 'builderrin' ) ) {
        $fonts[] = 'Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900';
    }
    if ( 'off' !== _x( 'on', 'Mulish Web font: on or off', 'builderrin' ) ) {
        $fonts[] = 'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
    }

    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => implode( '&family=', $fonts ),
            'subset' => urlencode( $subsets ),
        ), '//fonts.googleapis.com/css2' );
    }
    return $fonts_url;
}

/*
 * Get page ID by Slug
*/
function builderrin_get_id_by_slug($slug, $post_type){
    $content = get_page_by_path($slug, OBJECT, $post_type);
    $id = $content->ID;
    return $id;
}

/**
 * Show content by slug
 **/
function builderrin_content_by_slug($slug, $post_type){
    $content = builderrin_get_content_by_slug($slug, $post_type);

    $id = builderrin_get_id_by_slug($slug, $post_type);
    echo apply_filters('the_content',  $content);
}

/**
 * Get content by slug
 **/
function builderrin_get_content_by_slug($slug, $post_type){
    $content = get_posts(
        array(
            'name'      => $slug,
            'post_type' => $post_type
        )
    );
    if(!empty($content))
        return $content[0]->post_content;
    else
        return;
}

/**
 * Save user custom fields.
 */
add_action( 'personal_options_update', 'builderrin_save_user_custom_fields' );
add_action( 'edit_user_profile_update', 'builderrin_save_user_custom_fields' );
function builderrin_save_user_custom_fields( $user_id )
{
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;

    if(isset($_POST['user_facebook']))
        update_user_meta( $user_id, 'user_facebook', $_POST['user_facebook'] );
    if(isset($_POST['user_whatsapp']))
        update_user_meta( $user_id, 'user_whatsapp', $_POST['user_whatsapp'] );
    if(isset($_POST['user_twitter']))
        update_user_meta( $user_id, 'user_twitter', $_POST['user_twitter'] );
    if(isset($_POST['user_linkedin']))
        update_user_meta( $user_id, 'user_linkedin', $_POST['user_linkedin'] );
    if(isset($_POST['user_skype']))
        update_user_meta( $user_id, 'user_skype', $_POST['user_skype'] );
    if(isset($_POST['user_youtube']))
        update_user_meta( $user_id, 'user_youtube', $_POST['user_youtube'] );
    if(isset($_POST['user_vimeo']))
        update_user_meta( $user_id, 'user_vimeo', $_POST['user_vimeo'] );
    if(isset($_POST['user_tumblr']))
        update_user_meta( $user_id, 'user_tumblr', $_POST['user_tumblr'] );
    if(isset($_POST['user_pinterest']))
        update_user_meta( $user_id, 'user_pinterest', $_POST['user_pinterest'] );
    if(isset($_POST['user_instagram']))
        update_user_meta( $user_id, 'user_instagram', $_POST['user_instagram'] );
    if(isset($_POST['user_yelp']))
        update_user_meta( $user_id, 'user_yelp', $_POST['user_yelp'] );
}

/* Author Social */
function builderrin_get_user_social() {

    $user_facebook = get_user_meta(get_the_author_meta( 'ID' ), 'user_facebook', true);
    $user_whatsapp = get_user_meta(get_the_author_meta( 'ID' ), 'user_whatsapp', true);
    $user_twitter = get_user_meta(get_the_author_meta( 'ID' ), 'user_twitter', true);
    $user_linkedin = get_user_meta(get_the_author_meta( 'ID' ), 'user_linkedin', true);
    $user_skype = get_user_meta(get_the_author_meta( 'ID' ), 'user_skype', true);
    $user_youtube = get_user_meta(get_the_author_meta( 'ID' ), 'user_youtube', true);
    $user_vimeo = get_user_meta(get_the_author_meta( 'ID' ), 'user_vimeo', true);
    $user_tumblr = get_user_meta(get_the_author_meta( 'ID' ), 'user_tumblr', true);
    $user_pinterest = get_user_meta(get_the_author_meta( 'ID' ), 'user_pinterest', true);
    $user_instagram = get_user_meta(get_the_author_meta( 'ID' ), 'user_instagram', true);
    $user_yelp = get_user_meta(get_the_author_meta( 'ID' ), 'user_yelp', true);

    ?>
    <ul class="user-social">
        <?php if(!empty($user_facebook)) { ?>
            <li><a href="<?php echo esc_url($user_facebook); ?>"><i class="caseicon-facebook"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_whatsapp)) { ?>
            <li><a href="<?php echo esc_url($user_whatsapp); ?>"><i class="caseicon-whatsapp"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_twitter)) { ?>
            <li><a href="<?php echo esc_url($user_twitter); ?>"><i class="caseicon-twitter"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_linkedin)) { ?>
            <li><a href="<?php echo esc_url($user_linkedin); ?>"><i class="caseicon-linkedin"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_instagram)) { ?>
            <li><a href="<?php echo esc_url($user_instagram); ?>"><i class="caseicon-instagram"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_skype)) { ?>
            <li><a href="<?php echo esc_url($user_skype); ?>"><i class="caseicon-skype"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_pinterest)) { ?>
            <li><a href="<?php echo esc_url($user_pinterest); ?>"><i class="caseicon-pinterest"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_vimeo)) { ?>
            <li><a href="<?php echo esc_url($user_vimeo); ?>"><i class="caseicon-vimeo"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_youtube)) { ?>
            <li><a href="<?php echo esc_url($user_youtube); ?>"><i class="caseicon-youtube"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_yelp)) { ?>
            <li><a href="<?php echo esc_url($user_yelp); ?>"><i class="caseicon-yelp"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_tumblr)) { ?>
            <li><a href="<?php echo esc_url($user_tumblr); ?>"><i class="caseicon-tumblr"></i></a></li>
        <?php } ?>

        </ul> <?php
    }


/**
 * Custom Comment List
 */
function builderrin_comment_list( $comment, $args, $depth ) {
    $myclass = 'icon-share-alt';
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo ''.$tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
        <?php endif; ?>
        <div class="comment-inner">
            <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, 90); ?>
            <div class="comment-content">
                <h4 class="comment-title">
                    <?php printf( '%s', get_comment_author_link() ); ?>
                </h4>
                <div class="comment-text"><?php comment_text(); ?></div>
                <div class="comment-meta">
                    <span class="comment-date">
                        <?php echo get_comment_date(); ?>
                    </span>
                </div>
                <div class="comment-reply">
                    <?php comment_reply_link( array_merge( $args, array(
                        'reply_text' => __('<span>Reply</span>', 'builderrin'),
                        'add_below' => $add_below,
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth']
                    ) ) ); ?>
                </div>
            </div>
        </div>
        <?php if ( 'div' != $args['style'] ) : ?>
        </div>
    <?php endif;
}

/**
 * Paginate Links
 */
function builderrin_ajax_paginate_links($link){
    $parts = parse_url($link);
    if( !isset($parts['query']) ) return $link;
    parse_str($parts['query'], $query);
    if(isset($query['page']) && !empty($query['page'])){
        return '#' . $query['page'];
    }
    else{
        return '#1';
    }
}


/**
 * RGB Color
 */
function builderrin_hex_rgb($color) {

    $default = '0,0,0';

    //Return default if no color provided
    if(empty($color))
        return $default;

    //Sanitize $color if "#" is provided
    if ($color[0] == '#' ) {
        $color = substr( $color, 1 );
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);

    $output = implode(",",$rgb);

    //Return rgb(a) color string
    return $output;
}


/**
 * Image Size Crop
 */
if(!function_exists('builderrin_get_image_by_size')){
    function builderrin_get_image_by_size( $params = array() ) {
        $params = array_merge( array(
            'post_id' => null,
            'attach_id' => null,
            'thumb_size' => 'thumbnail',
            'class' => '',
        ), $params );

        if ( ! $params['thumb_size'] ) {
            $params['thumb_size'] = 'thumbnail';
        }

        if ( ! $params['attach_id'] && ! $params['post_id'] ) {
            return false;
        }

        $post_id = $params['post_id'];

        $attach_id = $post_id ? get_post_thumbnail_id( $post_id ) : $params['attach_id'];
        $attach_id = apply_filters( 'pxl_object_id', $attach_id );
        $thumb_size = $params['thumb_size'];
        $thumb_class = ( isset( $params['class'] ) && '' !== $params['class'] ) ? $params['class'] . ' ' : '';

        global $_wp_additional_image_sizes;
        $thumbnail = '';

        $sizes = array(
            'thumbnail',
            'thumb',
            'medium',
            'medium_large',
            'large',
            'full',
        );
        if ( is_string( $thumb_size ) && ( ( ! empty( $_wp_additional_image_sizes[ $thumb_size ] ) && is_array( $_wp_additional_image_sizes[ $thumb_size ] ) ) || in_array( $thumb_size, $sizes, true ) ) ) {
            $attributes = array( 'class' => $thumb_class . 'attachment-' . $thumb_size );
            $thumbnail = wp_get_attachment_image( $attach_id, $thumb_size, false, $attributes );
            $thumbnail_url = wp_get_attachment_image_url($attach_id, $thumb_size, false);
        } elseif ( $attach_id ) {
            if ( is_string( $thumb_size ) ) {
                preg_match_all( '/\d+/', $thumb_size, $thumb_matches );
                if ( isset( $thumb_matches[0] ) ) {
                    $thumb_size = array();
                    $count = count( $thumb_matches[0] );
                    if ( $count > 1 ) {
                        $thumb_size[] = $thumb_matches[0][0]; // width
                        $thumb_size[] = $thumb_matches[0][1]; // height
                    } elseif ( 1 === $count ) {
                        $thumb_size[] = $thumb_matches[0][0]; // width
                        $thumb_size[] = $thumb_matches[0][0]; // height
                    } else {
                        $thumb_size = false;
                    }
                }
            }
            if ( is_array( $thumb_size ) ) {
                // Resize image to custom size
                $p_img = pxl_resize( $attach_id, null, $thumb_size[0], $thumb_size[1], true );
                $alt = trim( wp_strip_all_tags( get_post_meta( $attach_id, '_wp_attachment_image_alt', true ) ) );
                $attachment = get_post( $attach_id );
                if ( ! empty( $attachment ) ) {
                    $title = trim( wp_strip_all_tags( $attachment->post_title ) );

                    if ( empty( $alt ) ) {
                        $alt = trim( wp_strip_all_tags( $attachment->post_excerpt ) ); // If not, Use the Caption
                    }
                    if ( empty( $alt ) ) {
                        $alt = $title;
                    }
                    if ( $p_img ) {

                        $attributes = pxl_stringify_attributes( array(
                            'class' => $thumb_class,
                            'src' => $p_img['url'],
                            'width' => $p_img['width'],
                            'height' => $p_img['height'],
                            'alt' => $alt,
                            'title' => $title,
                        ) );

                        $thumbnail = '<img ' . $attributes . ' />';
                    }
                }
            }
            $thumbnail_url = $p_img['url'];
        }

        $p_img_large = wp_get_attachment_image_src( $attach_id, 'large' );

        return apply_filters( 'pxl_el_getimagesize', array(
            'thumbnail' => $thumbnail,
            'url' => $thumbnail_url,
            'p_img_large' => $p_img_large,
        ), $attach_id, $params );

    }
}

/**
 * Search Form
 */
function builderrin_header_mobile_search_form() {
    $search_mobile = builderrin()->get_theme_opt( 'search_mobile', false );
    if($search_mobile) : ?>
        <div class="pxl-header-mobile-search pxl-hide-xl">
            <form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
                <input type="text" placeholder="<?php esc_attr_e('Search...', 'builderrin'); ?>" name="s" class="search-field" />
                <button type="submit" class="search-submit"><i class="caseicon-search"></i></button>
            </form>
        </div>
    <?php endif; }

/**
 * Year Shortcode [pxl_year]
 */
if(function_exists( 'pxl_register_shortcode' )) {
    function builderrin_year_shortcode() {
        ob_start(); ?>
        <span><?php the_date('Y'); ?></span>
        <?php $output = ob_get_clean();
        return $output;
    }
    pxl_register_shortcode('pxl_year', 'builderrin_year_shortcode');
}

/* Highlight Shortcode  */
if(function_exists( 'pxl_register_shortcode' )) {
    function builderrin_text_highlight_shortcode( $atts = array() ) {
        extract(shortcode_atts(array(
           'text' => '',
       ), $atts));

        ob_start();
        if(!empty($text)) : ?>
            <span class="pxl-title--highlight">
                <?php echo esc_attr($text); ?>
            </span>
        <?php  endif;
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('highlight', 'builderrin_text_highlight_shortcode');
}

/* Highlight Shortcode  */
if(function_exists( 'pxl_register_shortcode' )) {
    function builderrin_btn_shortcode( $atts = array() ) {
        extract(shortcode_atts(array(
           'text' => '',
           'style' => 'btn-slider1',
           'icon_class' => '',
           'link' => '',
           'text_color' => '',
       ), $atts));

        ob_start();
        if(!empty($text)) : ?>
            <?php if(!empty($link)) : ?><a class="sc-button-wrap" href="<?php echo esc_url($link); ?>"><?php endif; ?>
            <span class="btn <?php echo esc_attr($style); ?> <?php if($style == 'btn-slider1') { echo 'btn-nina'; } ?>" <?php if(!empty($text_color)) { ?>style="color: <?php echo esc_attr($text_color); ?>"<?php } ?>>
                <?php if($style == 'btn-slider1') { ?>
                    <span class="pxl--btn-text" data-text="<?php echo esc_attr($text); ?>">
                        <?php $chars = str_split($text);
                        foreach ($chars as $value) {
                            echo '<span>'.$value.'</span>';
                        } ?>
                    </span>
                <?php } else {
                    echo esc_attr($text);
                } ?>
                <?php if(!empty($icon_class)) : ?>
                    <i class="<?php echo esc_attr($icon_class); ?>"></i>
                <?php endif; ?>
            </span>
            <?php if(!empty($link)) : ?></a><?php endif; ?>
        <?php  endif;
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('pxl_button', 'builderrin_btn_shortcode');
}

/* Gallery Shortcode  */
if(function_exists( 'pxl_register_shortcode' )) {
    function builderrin_gallery_shortcode( $atts = array() ) {
        extract(shortcode_atts(array(
           'link' => '#',
           'images_id' => '',
           'cols' => '2',
           'img_size' => 'full'
       ), $atts));

        ob_start();
        ?>
        <div class="pxl-gallery gallery-<?php echo esc_attr($cols); ?>-columns">
            <?php
            $pxl_images = explode( ',', $images_id );
            foreach ($pxl_images as $key => $img_id) :
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $img_size,
                    'class'      => '',
                ));
                $thumbnail = $img['thumbnail'];
                ?>
                <div class="pxl--item">
                    <div class="pxl--item-inner <?php if($key == 1 && !empty($link)) { echo 'video-active'; } ?>">
                        <?php echo pxl_print_html($thumbnail); ?>
                        <?php if($key == 1) : ?>
                            <a href="<?php echo esc_url($link); ?>" class="btn-video"><i class="fa fa-play"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
            endforeach;
            ?>
        </div>
        <?php
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('pxl_gallery', 'builderrin_gallery_shortcode');
}

/* Addd shortcode Video button */
if(function_exists( 'pxl_register_shortcode' )) {
    function builderrin_video_button_shortcode( $atts = array() ) {
        extract(shortcode_atts(array(
           'link' => '',
           'text' => '',
           'class' => 'style1',
       ), $atts));

        ob_start();
        ?>
        <a href="<?php echo esc_url($link); ?>" class="pxl-button-video1 btn-video pxl-video-popup <?php echo esc_attr($class); ?>">
            <span>
                <i class="caseicon-play1"></i>
            </span>
            <?php if(!empty($text)) : ?>
                <span class="slider-video-title"><?php echo esc_attr($text); ?></span>
            <?php endif; ?>
        </a>
        <?php
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('pxl_video_button', 'builderrin_video_button_shortcode');
}

/**
 * Custom Widget Categories
 */
add_filter('wp_list_categories', 'builderrin_wg_category_count');
function builderrin_wg_category_count($output) {
    $dir = is_rtl() ? 'pxl-left' : 'pxl-right';
    $output = str_replace("\t", '', $output);
    $output = str_replace(")\n</li>", ')</li>', $output);
    $output = str_replace('</a> (', ' <span class="pxl-count '.$dir.'">(', $output);
    $output = str_replace(")</li>", ")&nbsp;</span></a></li>", $output);
    $output = str_replace(")\n<ul", ")&nbsp;</span></a>\n<ul", $output);
    return $output;
}


/**
 * Custom Widget Archive
 */
add_filter('get_archives_link', 'builderrin_archive_count_span');
function builderrin_archive_count_span($links) {
    $dir = is_rtl() ? 'pxl-left' : 'pxl-right';
    $links = str_replace('</a>&nbsp;(', ' <span class="pxl-count '.$dir.'">(', $links);
    $links = str_replace(')', ')</span></a>', $links);
    return $links;
}


/**
 * Custom Widget Product Categories
 */
add_filter('wp_list_categories', 'builderrin_wc_cat_count_span');
function builderrin_wc_cat_count_span($links) {
    $dir = is_rtl() ? 'pxl-left' : 'pxl-right';
    $links = str_replace('</a> <span class="pxl-count">(', ' <span class="pxl-count '.$dir.'">(', $links);
    $links = str_replace(')</span>', ')</span></a>', $links);
    return $links;
}