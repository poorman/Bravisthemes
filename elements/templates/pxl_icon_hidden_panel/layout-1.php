<?php
$template = (int)$widget->get_setting('content_template','0');
$target = '.pxl-hidden-template-'.$template;
if($template > 0 ){
	if ( !has_action( 'pxl_anchor_target_hidden_panel_'.$template) ){
		add_action( 'pxl_anchor_target_hidden_panel_'.$template, 'builderrin_hook_anchor_hidden_panel' );
	}
}
?>
<div class="pxl-hidden-panel-button pxl-anchor side-panel pxl-cursor--cta" data-target="<?php echo esc_attr($target)?>">
	<svg class="svg-hover" width="31" height="31" viewBox="0 0 31 31">
		<path class="cls-2" d="M3.1,0A3.1,3.1,0,1,1,0,3.1,3.1,3.1,0,0,1,3.1,0ZM15.5,0a3.1,3.1,0,1,1-3.1,3.1A3.1,3.1,0,0,1,15.5,0ZM27.9,0a3.1,3.1,0,1,1-3.1,3.1A3.1,3.1,0,0,1,27.9,0ZM3.1,12.4A3.1,3.1,0,1,1,0,15.5,3.1,3.1,0,0,1,3.1,12.4Zm12.4,0a3.1,3.1,0,1,1-3.1,3.1A3.1,3.1,0,0,1,15.5,12.4Zm12.4,0a3.1,3.1,0,1,1-3.1,3.1A3.1,3.1,0,0,1,27.9,12.4ZM3.1,24.8A3.1,3.1,0,1,1,0,27.9,3.1,3.1,0,0,1,3.1,24.8Zm12.4,0a3.1,3.1,0,1,1-3.1,3.1A3.1,3.1,0,0,1,15.5,24.8Zm12.4,0a3.1,3.1,0,1,1-3.1,3.1A3.1,3.1,0,0,1,27.9,24.8Z"/>
	</svg>
	<svg class="svg-main" width="25" height="25" viewBox="0 0 25 25">
		<path class="cls-1" d="M2.5,0A2.5,2.5,0,1,1,0,2.5,2.5,2.5,0,0,1,2.5,0Zm10,0A2.5,2.5,0,1,1,10,2.5,2.5,2.5,0,0,1,12.5,0Zm10,0A2.5,2.5,0,1,1,20,2.5,2.5,2.5,0,0,1,22.5,0ZM2.5,10A2.5,2.5,0,1,1,0,12.5,2.5,2.5,0,0,1,2.5,10Zm10,0A2.5,2.5,0,1,1,10,12.5,2.5,2.5,0,0,1,12.5,10Zm10,0A2.5,2.5,0,1,1,20,12.5,2.5,2.5,0,0,1,22.5,10ZM2.5,20A2.5,2.5,0,1,1,0,22.5,2.5,2.5,0,0,1,2.5,20Zm10,0A2.5,2.5,0,1,1,10,22.5,2.5,2.5,0,0,1,12.5,20Zm10,0A2.5,2.5,0,1,1,20,22.5,2.5,2.5,0,0,1,22.5,20Z"/>
	</svg>
</div>