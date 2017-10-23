<?php
/**
 * This template is used to display the login form with [donation_form_grid]
 *
 * @since 1.8.16
 */
$form = new Give_Donate_Form( get_the_ID() );

// Fetch ShortCode parameters from session variable.
$donation_from_grid = Give()->session->get( 'give_donation_form_grid' );

$color = give_get_meta( $form_id, '_give_goal_color', true );

// Set number of grid columns.
$grid_class = 'give-grid-col-4';
if( 4 === $donation_from_grid['number'] ) {
	$grid_class = 'give-grid-col-3';
}
?>
<div class="give-grid__item <?php echo $grid_class; ?>">
	<?php
	// Display Featured Image, if enabled via shortcode and contains the featured image.
	if( $donation_from_grid['featured_image'] && has_post_thumbnail() ) {
		the_post_thumbnail();
	}
	?>
	<h2><?php the_title(); ?></h2>
	<?php
	if( $donation_from_grid['goal'] && give_is_setting_enabled( give_get_meta( $form->ID, '_give_goal_option', true ) ) ) {

		/**
		 * Filter the form income
		 *
		 * @since 1.8.8
		 */
		$income = apply_filters( 'give_goal_amount_raised_output', $form->get_earnings(), $form->ID, $form );

		/**
		 * Filter the form
		 *
		 * @since 1.8.8
		 */
		$goal = apply_filters( 'give_goal_amount_target_output', $form->goal, $form->ID, $form );


		/**
		 * Filter the goal progress output
		 *
		 * @since 1.8.8
		 */
		$progress = apply_filters( 'give_goal_amount_funded_percentage_output', round( ( $income / $goal ) * 100, 2 ), $form->ID, $form );
		?>
		<div class="give-progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="<?php echo esc_attr( $progress ); ?>">
			<span style="width: <?php echo esc_attr( $progress ); ?>%;<?php if ( ! empty( $color ) ) {
				echo 'background-color:' . $color;
			} ?>"></span>
		</div><!-- /.give-progress-bar -->
	<?php
	}

	// Display Excerpt, if enabled via shortcode and enabled form content from backend.
	if( $donation_from_grid['excerpt'] && give_is_setting_enabled( give_get_meta( $form->ID, '_give_display_content', true ) ) ) {
		echo give_get_meta( get_the_ID(), '_give_form_content', true );
	}
	?>
</div>
