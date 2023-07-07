<?php

if (!class_exists('Builderrin_Shop')) {

    class Builderrin_Shop
    {
        public function getShop()
        {
            if(is_singular('elementor_library')) return;
            $shop_layout = (int)builderrin()->get_opt('shop_layout');

            if ($shop_layout <= 0 || !class_exists('Pxltheme_Core') || !is_callable( 'Elementor\Plugin::instance' )) {
                return;
            } else {
                $args = [
                    'shop_layout' => $shop_layout
                ];
                if(isset($args['shop_layout']) && $args['shop_layout'] > 0) : ?>
                    <div class="pxl-woocommerce-elementor">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <?php $post = get_post($args['shop_layout']);
                                    if (!is_wp_error($post) && function_exists('pxl_print_html')){
                                        $content = \Elementor\Plugin::$instance->frontend->get_builder_content( $args['shop_layout'] );
                                        pxl_print_html($content);
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;
            }

        }

        public function getProduct()
        {
            if(is_singular('elementor_library')) return;
            $shop_single_layout = (int)builderrin()->get_opt('shop_single_layout');

            if ($shop_single_layout <= 0 || !class_exists('Pxltheme_Core') || !is_callable( 'Elementor\Plugin::instance' )) {
                return;
            } else {
                $args = [
                    'shop_single_layout' => $shop_single_layout
                ];
                if(isset($args['shop_single_layout']) && $args['shop_single_layout'] > 0) : ?>
                    <div class="pxl-woocommerce-elementor">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <?php $post = get_post($args['shop_single_layout']);
                                    if (!is_wp_error($post) && function_exists('pxl_print_html')){
                                        $content = \Elementor\Plugin::$instance->frontend->get_builder_content( $args['shop_single_layout'] );
                                        pxl_print_html($content);
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;
            }

        }

    }
}
