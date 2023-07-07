<div class="pxl-project-information">
    <div class="pxl-item--title"><?php echo esc_attr($settings['title']); ?></div>
    <div class="pxl--item <?php echo esc_attr($settings['pxl_animate']);?>" >
        <label>Client Name</label>
        <span><?php   $field = 'display_name';
        the_author_meta($field); ?></span>
    </div>
    <?php if(isset($settings['items']) && !empty($settings['items']) && count($settings['items'])): ?>
    <?php foreach ($settings['items'] as $key => $value):
        $label = isset($value['label']) ? $value['label'] : '';
        $content = isset($value['content']) ? $value['content'] : ''; ?>
        <div class="pxl--item <?php echo esc_attr($settings['pxl_animate']);?>" >
            <?php if(!empty($label)) : ?>
                <label><?php echo esc_attr($label); ?></label>
            <?php endif; ?>

            <?php if(!empty($content)) : ?>
                <span><?php echo esc_attr($content); ?></span>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    <?php if( $settings['show_star'] ) : ?>
        <div class="pxl--item">
            <label class="pxl-item--star--title">Client Rating :</label>
            <span class="pxl-item--star <?php echo esc_attr($settings['star']); ?>">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </span>
        </div>
    <?php endif; ?>        
<?php endif; ?>
</div>