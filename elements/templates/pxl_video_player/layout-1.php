<?php
$img_size = '';
if(!empty($settings['img_size'])) {
    $img_size = $settings['img_size'];
} else {
    $img_size = 'full';
}
?>
<div class="pxl-video-player pxl-video-player1 <?php echo esc_attr($settings['btn_video_style']); ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-wow-duration="<?php echo esc_attr($settings['pxl_animate_duration']); ?>s">
    <div class="pxl-video--inner">
        <?php if( $settings['image_type'] != 'none' && !empty( $settings['image']['url'] ) ) :
            $img  = pxl_get_image_by_size( array(
                'attach_id'  => $settings['image']['id'],
                'thumb_size' => $img_size,
            ) );
            $thumbnail = $img['thumbnail'];
            ?>
            <div class="pxl-video--holder">
                <?php if ($settings['image_type'] == 'img') { ?>
                    <?php if ( ! empty( $settings['image']['url'] ) ) { echo wp_kses_post($thumbnail); } ?>
                <?php } else { ?>
                    <div class="pxl-video--image bg-image" style="background-image: url(<?php echo esc_url($settings['image']['url']); ?>);"></div>
                <?php } ?>
            </div>
        <?php endif; ?>
        <?php if(!empty($settings['video_link'])) : ?>
            <div class="btn-video-wrap <?php echo esc_attr($settings['btn_video_position']); ?>">
                <?php if(!empty($settings['title'])) : ?>
                    <h2 class="pxl-item--title el-empty"><?php echo pxl_print_html($settings['title']); ?></h2>
                <?php endif; ?>
                <a class="btn-video <?php echo esc_attr($settings['btn_video_style']); ?>" href="<?php echo esc_url($settings['video_link']); ?>">
                    <?php if ($settings['btn_video_style'] == 'style3') { ?>
                        <div class="btn-button"></div>
                    <?php } else { ?>
                        <i class="fas fa-play"></i>
                    <?php } ?>
                </a>
            </div>
        <?php endif; ?>
        <?php if($settings['show_particle'] == 'true') : ?>
            <div class="pxl-circle--shapes"></div>
        <?php endif; ?>
    </div>
</div>