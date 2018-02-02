<?php
/**
 * This template is used to display the login form with [donation_form_grid]
 *
 * @since 2.1
 */

$form         = new Give_Donate_Form( $id );
$goal_color   = give_get_meta( $id, '_give_goal_color', true );
$goal_enabled = give_is_setting_enabled( give_get_meta( $id, '_give_goal_option', true, 'disabled' ) );

// Set number of grid columns.
$grid_class = 'give-grid-col-4';
if( 4 === (int) $column ) {
	$grid_class = 'give-grid-col-3';
} else if( 2 === (int) $column ) {
	$grid_class = 'give-grid-col-6';
}

?>
<div class="give-grid__item <?php echo $grid_class; ?>">
	<?php
	/**
	 * Action Hook for donation grid item at top.
	 *
	 * @param Give_Donate_Form $form Donation Form Object.
	 *
	 * @since 2.1
	 */
	do_action( 'give_donation_grid_item_top', $form );

	if ( true === $featured_image ) {
		if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		} else {
			$placeholder_args = apply_filters( 'give_donation_grid_featured_image_args', array(
				'height' => 400,
				'text'   => __( 'Featured Image', 'give' ),
			) );
			?>
			<img src="<?php echo give_get_placeholder_img_src( $placeholder_args ); ?>"/>
			<?php
		}
	}
	?>
	<h2 class="give-grid-item-heading"><?php echo $form->post_title; ?></h2>
	<?php
	// Display Goal Progress, if it is enabled with shortcode as well as from form settings.
	if ( true === $goal && $goal_enabled ) {
		$goal_stats = give_goal_progress_stats( $form );
		?>
		<div class="give-progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="<?php echo esc_attr( $goal_stats['progress'] ); ?>">
			<span style="width: <?php echo esc_attr( $goal_stats['progress'] ); ?>; background-color: <?php echo $goal_color; ?>;"></span>
		</div>
		<?php
	}

	// Display Excerpt, if it is enabled with shortcode.
	if ( true === $excerpt ) {
		?>
		<div class="give-grid-item-excerpt">
			<?php the_excerpt(); ?>
		</div>
		<?php
	}
	echo give_display_checkout_button( $form->ID, array( 'display_style' => 'modal'));
	?>
	<div class="give-submit-button-wrap give-clearfix">
		<a href="<?php echo get_the_permalink( $id ); ?>" class="give-form-grid-submit"><?php _e( 'Donate Now', 'give' ); ?></a>
	</div>
	<?php
	/**
	 * Action Hook for donation grid item at bottom.
	 *
	 * @param Give_Donate_Form $form Donation Form Object.
	 *
	 * @since 2.1
	 */
	do_action( 'give_donation_grid_item_bottom', $form );
	?>
</div>