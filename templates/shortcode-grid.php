<?php
/**
 * This template is used to display the login form with [donation_form_grid]
 *
 * @since 1.8.16
 */
$form = new Give_Donate_Form( get_the_ID() );

// Fetch ShortCode parameters from session variable.
$donation_form_grid = Give()->session->get( 'give_donation_form_grid' );
$donation_form_grid['id'] = $form->ID;
$donation_form_grid['show_title'] = true;
$donation_form_grid['show_content'] = 'none';

$color = give_get_meta( $form->ID, '_give_goal_color', true );

// Set number of grid columns.
$grid_class = 'give-grid-col-4';
if( 4 === $donation_form_grid['number'] ) {
	$grid_class = 'give-grid-col-3';
}
?>
<div class="give-grid__item <?php echo $grid_class; ?>">
<?php echo give_get_donation_form( $donation_form_grid ); ?>
</div>
