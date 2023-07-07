<div class="pxl-project-detail1">
    <?php if(isset($settings['items']) && !empty($settings['items']) && count($settings['items'])): ?>
        <?php foreach ($settings['items'] as $key => $value):
            $label = isset($value['label']) ? $value['label'] : '';
            $content = isset($value['content']) ? $value['content'] : ''; ?>
            <div class="pxl--item <?php echo esc_attr($settings['pxl_animate']);?>" >
                <?php if(!empty($label)) : ?>
                    <label><?php echo esc_attr($label); ?></label>
                <?php endif; ?>

                <?php if(!empty($content)) : ?>
                    <h3><?php echo esc_attr($content); ?></h3>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>