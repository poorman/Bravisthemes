<?php
/**
 * Merlin WP configuration file.
 *
 * @package   Merlin WP
 * @version   @@pkg.version
 * @link      https://merlinwp.com/
 * @author    Rich Tabor, from ThemeBeans.com & the team at ProteusThemes.com
 * @copyright Copyright (c) 2018, Merlin WP of Inventionn LLC
 * @license   Licensed GPLv3 for Open Source Use
 */

if ( ! class_exists( 'Merlin' ) ) {
	return;
}

/**
 * Set directory locations, text strings, and settings.
 */
$pxl_server_info = apply_filters( 'pxl_server_info', ['docs_url' => 'https://doc.bravisthemes.com/', 'email_support' => 'bravisthemes.com@gmail.com'] ) ; 
$wizard = new Merlin(

	$config = array(
		'directory'            => 'merlin', // Location / directory where Merlin WP is placed in your theme.
		'merlin_url'           => 'pxlart-setup', // The wp-admin page slug where Merlin WP loads.
		'parent_slug'          => 'pxlart', // The wp-admin parent page slug for the admin menu item.
		'capability'           => 'manage_options', // The capability required for this menu to be displayed to the user.
		'child_action_btn_url' => 'https://codex.wordpress.org/child_themes', // URL for the 'child-action-link'.
		'dev_mode'             => false, // Enable development mode for testing.
		'license_step'         => true, // EDD license activation step.
		'license_required'     => true, // Require the license activation step.
		'license_help_url'     => 'https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-', // URL for the 'license-tooltip'.
		'edd_remote_api_url'   => '', // EDD_Theme_Updater_Admin remote_api_url.
		'edd_item_name'        => '', // EDD_Theme_Updater_Admin item_name.
		'edd_theme_slug'       => '', // EDD_Theme_Updater_Admin item_slug.
		'ready_big_button_url' => home_url( '/' ), // Link for the big button on the ready step.
	),
	$strings = array(
		'admin-menu'               => esc_html__( 'Setup Wizard', 'builderrin' ),

		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s'            => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'builderrin' ),
		'return-to-dashboard'      => esc_html__( 'Return to the dashboard', 'builderrin' ),
		'ignore'                   => esc_html__( 'Disable this wizard', 'builderrin' ),

		'btn-skip'                 => esc_html__( 'Skip', 'builderrin' ),
		'btn-next'                 => esc_html__( 'Next', 'builderrin' ),
		'btn-start'                => esc_html__( 'Start', 'builderrin' ),
		'btn-no'                   => esc_html__( 'Cancel', 'builderrin' ),
		'btn-plugins-install'      => esc_html__( 'Install', 'builderrin' ),
		'btn-child-install'        => esc_html__( 'Install', 'builderrin' ),
		'btn-content-install'      => esc_html__( 'Install', 'builderrin' ),
		'btn-import'               => esc_html__( 'Import', 'builderrin' ),
		'btn-license-activate'     => esc_html__( 'Activate', 'builderrin' ),
		'btn-license-skip'         => esc_html__( 'Later', 'builderrin' ),

		/* translators: Theme Name */
		'license-header'         => esc_html__( 'Activate Theme', 'builderrin' ),
		'license-header2'         => esc_html__( 'Activate Your Theme', 'builderrin' ),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__( '%s is Activated', 'builderrin' ),
		/* translators: Theme Name */
		'license%s'                => esc_html__( 'Please add your Envato purchase code to confirm the purchase.', 'builderrin' ),
		'license-label'            => esc_html__( 'License key', 'builderrin' ),
		'license-success%s'        => esc_html__( 'The theme is already registered, so you can go to the next step!', 'builderrin' ),
		'license-json-success%s'   => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', 'builderrin' ),
		'license-tooltip'          => esc_html__( 'Need help?', 'builderrin' ),

		/* translators: Theme Name */
		'welcome-header%s'         => esc_html__( 'Let\'s Get You Started', 'builderrin' ),
		'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', 'builderrin' ),
		'welcome%s'                => esc_html__( 'Thanks for purchasing theme! You can now register your product to install plugins, import demos and unlock exlusive features.', 'builderrin' ),
		'welcome-success%s'        => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'builderrin' ),

		'child-header'             => esc_html__( 'Install Child Theme', 'builderrin' ),
		'child-header-success'     => esc_html__( 'You\'re good to go!', 'builderrin' ),
		'child'                    => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'builderrin' ),
		'child-success%s'          => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', 'builderrin' ),
		'child-action-link'        => esc_html__( 'Learn about child themes', 'builderrin' ),
		'child-json-success%s'     => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'builderrin' ),
		'child-json-already%s'     => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'builderrin' ),

		'plugins-header'           => esc_html__( 'Install Plugins', 'builderrin' ),
		'plugins-header-success'   => esc_html__( 'Plugins are all installed', 'builderrin' ),
		'plugins'                  => esc_html__( 'Let\'s install some essential WordPress plugins to get you started.', 'builderrin' ),
		'plugins-success%s'        => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'builderrin' ),
		'plugins-action-link'      => esc_html__( 'View Plugins', 'builderrin' ),

		'import-header'            => esc_html__( 'Import a Demo', 'builderrin' ),
		'import'                   => esc_html__( 'Choose a demo for importing to your website', 'builderrin' ),
		'import-action-link'       => esc_html__( 'Advanced', 'builderrin' ),

		'ready-header'             => esc_html__( 'You\'re Ready!', 'builderrin' ),

		/* translators: Theme Author */
		'ready%s'                  => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', 'builderrin' ),
		'ready-action-link'        => esc_html__( 'Extras', 'builderrin' ),
		'ready-big-button'         => esc_html__( 'View your website', 'builderrin' ),
		'ready-link-1'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', $pxl_server_info['docs_url'], esc_html__( 'Help center', 'builderrin' ) ),
		'ready-link-2'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', $pxl_server_info['email_support'], esc_html__( 'Get Theme Support', 'builderrin' ) ),
		'ready-link-3'             => sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'admin.php?page=pxlart-theme-options' ), esc_html__( 'Theme Options', 'builderrin' ) ),
	)
);