<?php
/**
 * Get Post List
*/
if(!function_exists('builderrin_list_post')){
    function builderrin_list_post($post_type = 'post', $default = false){
        $post_list = array();
        $posts = get_posts(array('post_type' => $post_type, 'orderby' => 'date', 'order' => 'ASC', 'posts_per_page' => '-1'));
        if($default){
        	$post_list[-1] = esc_html__( 'Inherit', 'builderrin' );
        }
        foreach($posts as $post){
            $post_list[$post->ID] = $post->post_title;
        }
        return $post_list;
    }
}

if(!function_exists('builderrin_get_templates_option')){
	function builderrin_get_templates_option($meta_value = 'df', $default = false){
        $post_list = array();
        if($default && !is_array($default)){
            $post_list[-1] = esc_html__('Inherit','builderrin');
        }
        if(is_array($default)){
        	$key = isset($default['key']) ? $default['key'] : '0';
        	$post_list[$key] = !empty($default['value']) ? $default['value'] : esc_html__('None','builderrin');
        }
        $args = array(
            'post_type' => 'pxl-template',
            'posts_per_page' => '-1',
            'orderby' => 'date',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key'       => 'template_type',
                    'value'     => $meta_value,
                    'compare'   => '='
                )
            )
        );

        $posts = get_posts($args);

        foreach($posts as $post){
        	$template_type = get_post_meta( $post->ID, 'template_type', true );
        	if($template_type == 'df') continue;
            $post_list[$post->ID] = $post->post_title;
        }

        return $post_list;
    }
}
if(!function_exists('builderrin_get_slider_option')){
    function builderrin_get_slider_option(){
        $post_list = array();

        $args = array(
            'post_type' => 'pxl-slider',
            'posts_per_page' => '-1',
            'orderby' => 'date',
            'order' => 'ASC',
        );

        $posts = get_posts($args);

        foreach($posts as $post){
            $post_list[$post->ID] = $post->post_title;
        }

        return $post_list;
    }
}
if(!function_exists('builderrin_get_templates_slug')){
    function builderrin_get_templates_slug($meta_value = 'df'){
        $post_list = array();
        $posts = get_posts(
        	array(
        		'post_type' => 'pxl-template',
        		'orderby' => 'date',
        		'order' => 'ASC',
        		'posts_per_page' => '-1',
        		'meta_query' => array(
	                array(
	                    'key'       => 'template_type',
	                    'value'     => $meta_value,
	                    'compare'   => '='
	                )
	            )
        	)
        );

        foreach($posts as $post){
        	$template_type = get_post_meta( $post->ID, 'template_type', true );
        	if($template_type == 'df') continue;
        	$value_args = [
        		'post_id' => $post->ID,
        		'title' => $post->post_title
        	];
        	$template_position = get_post_meta( $post->ID, 'template_position', true );

    		$value_args['position'] = !empty($template_position) ? $template_position : '';

            $post_list[$post->post_name] = $value_args;
        }
        return $post_list;
    }
}

if(!function_exists('builderrin_header_opts')){
	function builderrin_header_opts($args=[]){
		$args = wp_parse_args($args,[
			'default'         => false,
			'default_value'   => ''
		]);

		$opts = array(
	        array(
				'id'      => 'header_layout',
				'type'    => 'select',
				'title'   => esc_html__('Main Header Layout', 'builderrin'),
				'desc'    => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','builderrin'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
				'options' => builderrin_get_templates_option('header',$args['default']),
				'default' => $args['default_value']
	        ),
            array(
				'id'      => 'header_layout_sticky',
				'type'    => 'select',
				'title'   => esc_html__('Sticky Header Layout', 'builderrin'),
				'desc'    => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','builderrin'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
				'options' => builderrin_get_templates_option('header',$args['default']),
				'default' => $args['default_value'],
	        )
	    );

		return $opts;
	}
}
if(!function_exists('builderrin_header_mobile_opts')){
	function builderrin_header_mobile_opts($args=[]){
		$args = wp_parse_args($args,[
			'default'         => false,
			'default_value'   => ''
		]);

		$opts = array(
			array(
	            'id'       => 'header_mobile_layout',
	            'type'     => 'select',
	            'title'    => esc_html__('Header Mobile Layout', 'builderrin'),
	            'subtitle' => esc_html__('Select a layout for header mobile.', 'builderrin'),
	            'options'  => builderrin_get_templates_option('header',$args['default']),
	            'default'  => $args['default_value'],
	            'required' => array( 'header_layout' , '!=', '' )
	        ),
	    );

		return $opts;
	}
}
if(!function_exists('builderrin_post_title_opts')){
	function builderrin_post_title_opts($args=[]){
		$args = wp_parse_args($args,[
			'default'         => false,
			'default_value'   => '1'
		]);
		if($args['default']){
			$pt_mode_options = [
				'-1'  => esc_html__('Inherit', 'builderrin'),
	            'bd'   => esc_html__('Builder', 'builderrin'),
	            'none'  => esc_html__('Disable', 'builderrin')
			];
			$pt_mode_default = '-1';
		}else{
			$pt_mode_options = [
				'df'  => esc_html__('Default', 'builderrin'),
	            'bd'   => esc_html__('Builder', 'builderrin'),
	            'none'  => esc_html__('Disable', 'builderrin')
			];
			$pt_mode_default = 'df';
		}
		$opts = array(
	        array(
	            'id'           => 'pt_mode',
	            'type'         => 'button_set',
	            'title'        => esc_html__( 'Page Title', 'builderrin' ),
	            'options' => $pt_mode_options,
                'default' => $pt_mode_default
	        ),
	        array(
	            'id'       => 'ptitle_layout',
	            'type'     => 'select',
	            'title'    => esc_html__('Post Title Layout', 'builderrin'),
	            'desc'        => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','builderrin'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
	            'options'  => builderrin_get_templates_option('page-title',false),
	            'default'  => $args['default_value'],
	            'required' => array( 'pt_mode', '=', 'bd' )
	        ),
	    );

		return $opts;
	}
}
if(!function_exists('builderrin_page_title_opts')){
	function builderrin_page_title_opts($args=[]){
		$args = wp_parse_args($args,[
			'default'         => false,
			'default_value'   => '1'
		]);
		if($args['default']){
			$pt_mode_options = [
				'-1'  => esc_html__('Inherit', 'builderrin'),
	            'bd'   => esc_html__('Builder', 'builderrin'),
	            'df'  => esc_html__('Default', 'builderrin'),
	            'none'  => esc_html__('Disable', 'builderrin')
			];
			$pt_mode_default = '-1';
		}else{
			$pt_mode_options = [
				'df'  => esc_html__('Default', 'builderrin'),
	            'bd'   => esc_html__('Builder', 'builderrin'),
	            'none'  => esc_html__('Disable', 'builderrin')
			];
			$pt_mode_default = 'df';
		}
		$opts = array(
	        array(
	            'id'           => 'pt_mode',
	            'type'         => 'button_set',
	            'title'        => esc_html__( 'Page Title', 'builderrin' ),
	            'options' => $pt_mode_options,
                'default' => $pt_mode_default
	        ),
	        array(
	            'id'       => 'ptitle_layout',
	            'type'     => 'select',
	            'title'    => esc_html__('Page Title Layout', 'builderrin'),
	            'desc'        => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','builderrin'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
	            'options'  => builderrin_get_templates_option('page-title',false),
	            'default'  => $args['default_value'],
	            'required' => array( 'pt_mode', '=', 'bd' )
	        ),
	    );

		return $opts;
	}
}
if(!function_exists('builderrin_page_title_shop_opts')){
	function builderrin_page_title_shop_opts($args=[]){
		$args = wp_parse_args($args,[
			'default'         => false,
			'default_value'   => '3'
		]);
		if($args['default']){
			$pt_mode_options = [
				'-1'  => esc_html__('Inherit', 'builderrin'),
	            'bd'   => esc_html__('Builder', 'builderrin'),
	            'df'  => esc_html__('Default', 'builderrin'),
	            'none'  => esc_html__('Disable', 'builderrin')
			];
			$pt_mode_default = 'df';
		}else{
			$pt_mode_options = [
				'df'  => esc_html__('Default', 'builderrin'),
	            'bd'   => esc_html__('Builder', 'builderrin'),
	            'none'  => esc_html__('Disable', 'builderrin')
			];
			$pt_mode_default = 'df';
		}
		$opts = array(
	        array(
	            'id'           => 'pt_mode',
	            'type'         => 'button_set',
	            'title'        => esc_html__( 'Page Title', 'builderrin' ),
	            'options' => $pt_mode_options,
                'default' => $pt_mode_default
	        ),
	        array(
	            'id'       => 'ptitle_layout',
	            'type'     => 'select',
	            'title'    => esc_html__('Page Title Layout', 'builderrin'),
	            'desc'        => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','builderrin'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
	            'options'  => builderrin_get_templates_option('page-title',false),
	            'default'  => $args['default_value'],
	            'required' => array( 'pt_mode', '=', 'bd' )
	        ),
	    );

		return $opts;
	}
}

if(!function_exists('builderrin_footer_opts')){
	function builderrin_footer_opts($args=[]){
		$args = wp_parse_args($args,[
			'default'         => false,
			'default_value'   => ''
		]);

		$opts = array(
	        array(
	            'id'          => 'footer_layout',
	            'type'        => 'select',
	            'title'       => esc_html__('Footer Layout', 'builderrin'),
	            'desc'        => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','builderrin'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
	            'options'     => builderrin_get_templates_option('footer', $args['default']),
	            'default'     => $args['default_value'],
	        )
	    );

		return $opts;
	}
}
if(!function_exists('builderrin_shop_opts')){
	function builderrin_shop_opts($args=[]){
		$args = wp_parse_args($args,[
			'default'         => false,
			'default_value'   => ''
		]);

		$opts = array(
	        array(
	            'id'          => 'shop_layout',
	            'type'        => 'select',
	            'title'       => esc_html__('Shop Layout', 'builderrin'),
	            'desc'        => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','builderrin'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
	            'options'     => builderrin_get_templates_option('shop', $args['default']),
	            'default'     => $args['default_value'],
	        )
	    );

		return $opts;
	}
}
if(!function_exists('builderrin_shop_single_opts')){
	function builderrin_shop_single_opts($args=[]){
		$args = wp_parse_args($args,[
			'default'         => false,
			'default_value'   => ''
		]);

		$opts = array(
	        array(
	            'id'          => 'shop_single_layout',
	            'type'        => 'select',
	            'title'       => esc_html__('Product Single Layout', 'builderrin'),
	            'desc'        => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','builderrin'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
	            'options'     => builderrin_get_templates_option('shop', $args['default']),
	            'default'     => $args['default_value'],
	        )
	    );

		return $opts;
	}
}
if(!function_exists('builderrin_sidebar_pos_opts')){
	function builderrin_sidebar_pos_opts($args=[]){
		$args = wp_parse_args($args,[
			'prefix'        => 'blog_',
			'default'       => false,
			'default_value' => 'right'
		]);

		if($args['default']){
			$options = [
				'-1'    => esc_html__('Inherit','builderrin'),
				'left'  => esc_html__('Left','builderrin'),
				'right' => esc_html__('Right','builderrin'),
				'0'     => esc_html__('Disable','builderrin'),
			];

		} else {
			$options = [
				'left'  => esc_html__('Left','builderrin'),
				'right' => esc_html__('Right','builderrin'),
				'0'     => esc_html__('Disable','builderrin'),
			];
		}
		$opts = array(
	        array(
	            'id'       => $args['prefix'].'sidebar_pos',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Sidebar Position', 'builderrin'),
	            'subtitle' => esc_html__('Select a sidebar position is displayed.', 'builderrin'),
	            'options'  => $options,
	            'default'  => $args['default_value'],
	        ),
	    );

		return $opts;
	}
}


/* Get list menu */
function builderrin_get_nav_menu_slug(){

    $menus = array(
        '-1' => esc_html__('Inherit', 'builderrin')
    );

    $obj_menus = wp_get_nav_menus();

    foreach ($obj_menus as $obj_menu){
        $menus[$obj_menu->slug] = $obj_menu->name;
    }
    return $menus;
}