<?php $html_id = pxl_get_element_id($settings); 
if(isset($settings['tabs']) && !empty($settings['tabs']) && count($settings['tabs'])): 
    $tab_bd_ids = [];
    ?>
    <div class="pxl-tabs pxl-tabs1 <?php echo esc_attr($settings['tab_effect'].' '.$settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <div class="pxl-tabs--inner">

            <div class="pxl-tabs--title">
                <?php foreach ($settings['tabs'] as $key => $title) : ?>
                    <span class="pxl-item--tab-title <?php if($settings['tab_active'] == $key + 1) { echo 'active'; } ?>" data-target="#<?php echo esc_attr($html_id.'-'.$title['_id']); ?>">
                        <span><?php echo pxl_print_html($title['title']); ?></span>
                        <?php if ($title['notification']): ?>
                            <span class="pxl-notification"><?php echo pxl_print_html($title['notification']); ?></span>    
                        <?php endif ?>
                    </span>
                    <?php if($settings['style'] == 'style-text-gradient') { echo '<br/>'; } ?>
                <?php endforeach; ?>
            </div>

            <div class="pxl-tabs--content">
                <?php foreach ($settings['tabs'] as $key => $content) : ?>
                    <div id="<?php echo esc_attr($html_id.'-'.$content['_id']); ?>" class="pxl-item--content <?php if($content['content_type'] == 'template') { echo 'pxl-tabs--elementor'; } ?>" <?php if($settings['tab_active'] == $key + 1) { ?>style="display: block;"<?php } ?>>
                        <?php if($content['content_type'] && !empty($content['desc'])) {
                            echo pxl_print_html($content['desc']); 
                        } elseif(!empty($content['content_template'])) {
                            $tab_content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$content['content_template']);
                            $tab_bd_ids[] = (int)$content['content_template'];
                            pxl_print_html($tab_content);
                        } ?>        
                    </div>
                <?php endforeach; ?>
            </div>
            
        </div>
    </div>
<?php endif; ?>