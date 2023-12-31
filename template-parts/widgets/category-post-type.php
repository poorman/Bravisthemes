<?php defined( 'ABSPATH' ) or exit( -1 );
/**
 * Recent Posts widgets
 * @package Bravisthemes
 */

class Builderrin_My_Category extends WP_Widget {

    function __construct()
    {
        parent::__construct(
            'pxl_my_category',
            esc_html__( '* Pxl My Categories', 'builderrin' ),
            array(
                'description' => esc_html__( 'My list or dropdown of categories.', 'builderrin' ),
                'customize_selective_refresh' => true,
            )
        );
    }

    /**
     * Outputs the content for the widget instance.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current widget instance.
     */
    public function widget( $args, $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Categories', 'builderrin' );

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $taxonomy = ! empty( $instance['taxonomy'] ) ? $instance['taxonomy'] : 'category';
        $c        = ! empty( $instance['count'] ) ? (bool) $instance['count'] : false;
        $h        = ! empty( $instance['hierarchical'] ) ? (bool) $instance['hierarchical'] : false;
        $d        = ! empty( $instance['dropdown'] ) ? (bool) $instance['dropdown'] : false;

        echo wp_kses_post($args['before_widget']); // WPCS: XSS ok.
        if ( $title ) {
            echo wp_kses_post($args['before_title'] . $title . $args['after_title']); // WPCS: XSS ok.
        }

        $cat_args = array(
            'orderby'      => 'name',
            'taxonomy'     => $taxonomy,
            'show_count'   => $c,
            'hierarchical' => $h,
        );

        if ( $d ) {
            $dropdown_id = "{$this->id_base}-dropdown-{$this->number}";

            echo '<label class="screen-reader-text" for="' . esc_attr( $dropdown_id ) . '">' . $title . '</label>'; // WPCS: XSS ok.

            $cat_args['show_option_none'] = __( 'Select Category', 'builderrin' );
            $cat_args['name']             = 'category' === $taxonomy ? 'category_name' : $taxonomy;
            $cat_args['id']               = $dropdown_id;
            $cat_args['value_field']      = 'slug';
            ?>

            <form action="<?php echo esc_url( home_url() ); ?>" method="get">
                <?php
            /**
             * Filters the arguments for the Categories widget drop-down.
             *
             * Filter hook: custom_post_type_widgets/categories/widget_categories_dropdown_args
             *
             * @since 2.8.0
             * @since 4.9.0 Added the `$instance` parameter.
             *
             * @see wp_dropdown_categories()
             *
             * @param array  $cat_args An array of Categories widget drop-down arguments.
             * @param array  $instance Array of settings for the current widget.
             * @param string $this->id Widget id.
             * @param string $taxonomy Taxonomy.
             */
            wp_dropdown_categories(
                apply_filters(
                    'custom_post_type_widgets/categories/widget_categories_dropdown_args',
                    $cat_args,
                    $instance,
                    $this->id,
                    $taxonomy
                )
            );
            ?>
        </form>
        <script>
/* <![CDATA[ */
            (function() {
                var dropdown = document.getElementById( "<?php echo esc_js( $dropdown_id ); ?>" );
                function onCatChange() {
                    if ( dropdown.options[dropdown.selectedIndex].value ) {
                        return dropdown.form.submit();
                    }
                }
                dropdown.onchange = onCatChange;
            })();
/* ]]> */
        </script>
        <?php
    }
    else {
        ?>
        <ul>
            <?php
            $cat_args['title_li'] = '';
            /**
             * Filters the arguments for the Categories widget.
             *
             * Filter hook: custom_post_type_widgets/categories/widget_categories_args
             *
             * @see wp_list_categories()
             *
             * @param array  $cat_args An array of Categories widget arguments.
             * @param array  $instance Array of settings for the current widget.
             * @param string $this->id Widget id.
             * @param string $taxonomy Taxonomy.
             */
            wp_list_categories(
                apply_filters(
                    'custom_post_type_widgets/categories/widget_categories_args',
                    $cat_args,
                    $instance,
                    $this->id,
                    $taxonomy
                )
            );
            ?>
        </ul>
        <?php
    }

        echo wp_kses_post($args['after_widget']); // WPCS: XSS ok.
    }

    /**
     * Handles updating settings for the current Archives widget instance.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @param array $new_instance New settings for this instance as input by the user via form() method.
     * @param array $old_instance Old settings for this instance.
     *
     * @return array Updated settings to save.
     */
    public function update( $new_instance, $old_instance ) {
        $instance                 = $old_instance;
        $instance['title']        = sanitize_text_field( $new_instance['title'] );
        $instance['taxonomy']     = stripslashes( $new_instance['taxonomy'] );
        $instance['count']        = ! empty( $new_instance['count'] ) ? (bool) $new_instance['count'] : false;
        $instance['hierarchical'] = ! empty( $new_instance['hierarchical'] ) ? (bool) $new_instance['hierarchical'] : false;
        $instance['dropdown']     = ! empty( $new_instance['dropdown'] ) ? (bool) $new_instance['dropdown'] : false;

        return $instance;
    }

    /**
     * Outputs the settings form for the widget.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @param array $instance Current settings.
     */
    public function form( $instance ) {
        $title        = isset( $instance['title'] ) ? $instance['title'] : '';
        $taxonomy     = isset( $instance['taxonomy'] ) ? $instance['taxonomy'] : '';
        $count        = isset( $instance['count'] ) ? (bool) $instance['count'] : false;
        $hierarchical = isset( $instance['hierarchical'] ) ? (bool) $instance['hierarchical'] : false;
        $dropdown     = isset( $instance['dropdown'] ) ? (bool) $instance['dropdown'] : false;
        ?>
        <p><label for="<?php echo esc_attr( $this->get_field_id( 'title' )); // WPCS: XSS ok. ?>"><?php esc_html_e( 'Title:', 'builderrin' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' )); // WPCS: XSS ok. ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' )); // WPCS: XSS ok. ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

            <?php
            $taxonomies = get_taxonomies( array(), 'objects' );

            if ( $taxonomies ) {
                printf(
                    '<p><label for="%1$s">%2$s</label>' .
                    '<select class="widefat" id="%1$s" name="%3$s">',
                    $this->get_field_id( 'taxonomy' ),
                    __( 'Taxonomy:', 'builderrin' ),
                    $this->get_field_name( 'taxonomy' )
            ); // WPCS: XSS ok.

                foreach ( $taxonomies as $taxobjects => $value ) {
                    if ( ! $value->hierarchical ) {
                        continue;
                    }
                    if ( 'nav_menu' === $taxobjects || 'link_category' === $taxobjects || 'post_format' === $taxobjects ) {
                        continue;
                    }

                    printf(
                        '<option value="%s"%s>%s</option>',
                        esc_attr( $taxobjects ),
                        selected( $taxobjects, $taxonomy, false ),
                        esc_attr( $value->label, 'builderrin' ) . ' ' . esc_html( $taxobjects )
                    );
                }
                echo '</select></p>';
            }
            ?>

            <p><input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'dropdown' )); // WPCS: XSS ok. ?>" name="<?php echo esc_attr( $this->get_field_name( 'dropdown' )); // WPCS: XSS ok. ?>"<?php checked( $dropdown ); ?> />
                <label for="<?php echo esc_attr( $this->get_field_id( 'dropdown' )); // WPCS: XSS ok. ?>"><?php esc_html_e( 'Display as dropdown', 'builderrin' ); ?></label><br />

                <input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'count' )); // WPCS: XSS ok. ?>" name="<?php echo esc_attr( $this->get_field_name( 'count' )); // WPCS: XSS ok. ?>"<?php checked( $count ); ?> />
                <label for="<?php echo esc_attr( $this->get_field_id( 'count' )); // WPCS: XSS ok. ?>"><?php esc_html_e( 'Show post counts', 'builderrin' ); ?></label><br />

                <input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'hierarchical' )); // WPCS: XSS ok. ?>" name="<?php echo esc_attr( $this->get_field_name( 'hierarchical' )); // WPCS: XSS ok. ?>"<?php checked( $hierarchical ); ?> />
                <label for="<?php echo esc_attr( $this->get_field_id( 'hierarchical' )); // WPCS: XSS ok. ?>"><?php esc_html_e( 'Show hierarchy', 'builderrin' ); ?></label></p>
                <?php
            }
        }

        add_action( 'widgets_init', 'builderrin_my_category_widget' );
        function builderrin_my_category_widget(){
            if(function_exists('pxl_register_wp_widget')){
                pxl_register_wp_widget( 'Builderrin_My_Category' );
            }
        }