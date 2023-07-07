<?php
// make some configs
if(!function_exists('builderrin_configs')){
    function builderrin_configs($value){

        $configs = [
            'theme_colors' => [
                'primary'   => [
                    'title' => esc_html__('Primary', 'builderrin').' ('.builderrin()->get_opt('primary_color', '#FFA903').')',
                    'value' => builderrin()->get_opt('primary_color', '#FFA903')
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'builderrin').' ('.builderrin()->get_opt('secondary_color', '#002A5C').')',
                    'value' => builderrin()->get_opt('secondary_color', '#002A5C')
                ],
                'third'   => [
                    'title' => esc_html__('Third', 'builderrin').' ('.builderrin()->get_opt('third_color', '#656A7C').')',
                    'value' => builderrin()->get_opt('third_color', '#656A7C')
                ],
                'fourth'   => [
                    'title' => esc_html__('Fourth', 'builderrin').' ('.builderrin()->get_opt('fourth_color', '#FFFFFF').')',
                    'value' => builderrin()->get_opt('fourth_color', '#FFFFFF')
                ],
                'fifth'   => [
                    'title' => esc_html__('Fifth', 'builderrin').' ('.builderrin()->get_opt('fifth_color', '#B4E330').')',
                    'value' => builderrin()->get_opt('fifth_color', '#B4E330')
                ],
                'sixth'   => [
                    'title' => esc_html__('Sixth', 'builderrin').' ('.builderrin()->get_opt('sixth_color', '#aeb6c2').')',
                    'value' => builderrin()->get_opt('sixth_color', '#aeb6c2')
                ],
                'seventh'   => [
                    'title' => esc_html__('Seventh', 'builderrin').' ('.builderrin()->get_opt('seventh_color', 'rgba(255, 255, 255, 0.15);').')',
                    'value' => builderrin()->get_opt('seventh_color', 'rgba(255, 255, 255, 0.15);')
                ],
                'eighth'   => [
                    'title' => esc_html__('Eighth', 'builderrin').' ('.builderrin()->get_opt('eighth_color', '#272727').')',
                    'value' => builderrin()->get_opt('eighth_color', '#272727')
                ],
                'nine'   => [
                    'title' => esc_html__('Nine', 'builderrin').' ('.builderrin()->get_opt('nine_color', '#0a2148').')',
                    'value' => builderrin()->get_opt('nine_color', '#0a2148')
                ]
            ],
            'link' => [
                'color' => builderrin()->get_opt('link_color', ['regular' => '#00234B'])['regular'],
                'color-hover'   => builderrin()->get_opt('link_color', ['hover' => '#002A5C'])['hover'],
                'color-active'  => builderrin()->get_opt('link_color', ['active' => '#002A5C'])['active'],
            ],
            'gradient' => [
                'color-from' => builderrin()->get_opt('gradient_color', ['from' => '#00234B'])['from'],
                'color-to' => builderrin()->get_opt('gradient_color', ['to' => '#002A5C'])['to'],
            ],

        ];
        return $configs[$value];
    }
}
if(!function_exists('builderrin_inline_styles')) {
    function builderrin_inline_styles() {

        $theme_colors      = builderrin_configs('theme_colors');
        $link_color        = builderrin_configs('link');
        $gradient_color        = builderrin_configs('gradient');

        ob_start();
        echo ':root{';

        foreach ($theme_colors as $color => $value) {
            printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
        }
        foreach ($theme_colors as $color => $value) {
            printf('--%1$s-color-rgb: %2$s;', str_replace('#', '',$color),  builderrin_hex_rgb($value['value']));
        }
        foreach ($link_color as $color => $value) {
            printf('--link-%1$s: %2$s;', $color, $value);
        }
        foreach ($gradient_color as $color => $value) {
            printf('--gradient-%1$s: %2$s;', $color, $value);
        }
        echo '}';

        return ob_get_clean();

    }
}
