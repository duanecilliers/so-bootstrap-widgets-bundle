<?php
$classes = array();
$classes[] = 'btn';
$classes[] = 'btn-primary';

$wrapper = false;
$wrapper_classes = array();

if ( !empty( $instance['design']['align'] ) ) {
	switch ( $instance['design']['align'] ) {
		case 'left':
			$classes[] = 'pull-left';
			break;
		case 'center':
			$wrapper = true;
			$wrapper_classes[] = 'text-center';
			break;
		case 'right':
			$classes[] = 'pull-right';
			break;
		case 'justify':
			$classes[] = 'center-block';
			break;
	}
}

if ( !empty( $instance['design']['size'] ) ) {
	switch ($instance['design']['size'] ) {
		case 'extra_small':
			$classes[] = 'btn-xs';
			break;
		case 'small':
			$classes[] = 'btn-sm';
			break;
		case 'large':
			$classes[] = 'btn-lg';
			break;
	}
}

$wrapper_classes = implode( ' ', $wrapper_classes );

$button_attributes = array(
	'class' => esc_attr( implode(' ', $classes) )
);
if( !empty( $instance['new_window'] ) ) $button_attributes['target'] = '_blank';
if( !empty( $instance['url'] ) ) $button_attributes['href'] = sow_esc_url( $instance['url'] );
if( !empty( $instance['attributes']['id'] ) ) $button_attributes['id'] = esc_attr( $instance['attributes']['id'] );
if( !empty( $instance['attributes']['title'] ) ) $button_attributes['title'] = esc_attr( $instance['attributes']['title'] );
if( !empty( $instance['attributes']['onclick'] ) ) $button_attributes['onclick'] = esc_attr( $instance['attributes']['onclick'] );
?>

<?php if ( $wrapper ) : ?>
<div class="<?php echo $wrapper_classes; ?>">
<?php endif; ?>

	<a <?php foreach( $button_attributes as $name => $val) echo $name . '="' . $val . '" ' ?>>
		<?php
			if( !empty( $instance['button_icon']['icon'] ) ) {
				$attachment = wp_get_attachment_image_src( $instance['button_icon']['icon'] );
				if(!empty( $attachment) ) {
					$icon_styles[] = 'background-image: url(' . sow_esc_url( $attachment[0] ) . ')';
					?><div class="sow-icon-image" style="<?php echo implode('; ', $icon_styles) ?>"></div><?php
				}
			}
			else {
				$icon_styles = array();
				if(!empty( $instance['button_icon']['icon_color'] ) ) $icon_styles[] = 'color: '.$instance['button_icon']['icon_color'];
				echo siteorigin_widget_get_icon( $instance['button_icon']['icon_selected'], $icon_styles);
			}
		?>

		<?php echo wp_kses_post( $instance['text'] ) ?>
	</a>

<?php if ( $wrapper ) : ?>
</div>
<?php endif; ?>
