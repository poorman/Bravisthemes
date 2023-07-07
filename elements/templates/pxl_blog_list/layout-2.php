<?php
$source = $widget->get_setting('source', '');
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 4);
$post_ids = $widget->get_setting('post_ids', '');
extract(pxl_get_posts_of_grid('post', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));
$show_category = $widget->get_setting('show_category', '');
$show_date = $widget->get_setting('show_date', '');
$show_title = $widget->get_setting('show_title', '');
$show_excerpt = $widget->get_setting('show_excerpt');
$num_words = $widget->get_setting('num_words');
$text_line = $widget->get_setting('text_line');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text');
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : '1200x867';
if (is_array($posts)): ?>
    <div class="pxl-blog-list pxl-blog-list2 blog-list-scroll pxl-parent-transition <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
        <div class="pxl-blog-inner" data-lenis-prevent data-cursor="-hidden">
            <?php
                foreach ($posts as $key => $post):
                $author = get_user_by('id', $post->post_author);
                ?>
                <div class="pxl-grid-item">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img_id       = get_post_thumbnail_id( $post->ID );
                        $img          = builderrin_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $image_size,
                        ) );
                        $thumbnail = $img['thumbnail']; ?>
                        <div class="pxl-item--image">
                            <a class="bg-image" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="pxl-item--body">
                        <?php if($show_category == 'true' || $show_date == 'true' ) : ?>
                            <ul class="item--meta">
                                <?php if($show_category == 'true'): ?>
                                    <li class="item--category"><?php the_terms( $post->ID, 'category', '', ' , ' ); ?></li>
                                <?php endif; ?>
                                <?php if($show_date == 'true'): ?>
                                    <li class="item--date"><?php $date_formart = get_option('date_format'); echo get_the_date($date_formart, $post->ID); ?></li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                        <?php if($show_title == 'true'): ?>
                            <h4 class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h4>
                        <?php endif; ?>
                        <?php if($show_excerpt == 'true' && !empty($post->post_excerpt)): ?>
                            <div class="item--excerpt <?php if(!empty($text_line)) { echo esc_attr__( 'pxl-text-line', 'builderrin' ); } ?>" <?php if(!empty($text_line)) { ?>style="-webkit-line-clamp: <?php echo esc_attr($text_line); ?>"<?php } ?>>
                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                            </div>
                        <?php endif; ?>
                        <?php if($show_button == 'true') : ?>
                            <a class="pxl-btn-line pxl-transtion" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <span class="pxl-wobble">
                                    <?php if(!empty($button_text)) {
                                        $btn_text = $button_text;
                                    } else {
                                        $btn_text = esc_html__('Read More', 'builderrin');
                                    }
                                    $chars = str_split($btn_text);
                                    foreach ($chars as $value) {
                                        if ($value == " ") {
                                            $value = "&nbsp;";
                                        }
                                        echo '<span>'.$value.'</span>';
                                    }
                                    ?>
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>