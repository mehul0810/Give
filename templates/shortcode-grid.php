<?php
/**
 * This template is used to display the login form with [donation_form_grid]
 */

$donation_from_grid = Give()->session->get( 'give_donation_form_grid' );
//echo "<pre>"; print_r($donation_from_grid); echo "</pre>";

$class = 'give-grid-col-3';
?>

	<div class="give-grid__item <?php echo $class; ?>">
		<img src="http://via.placeholder.com/600x400" alt="">
		<h2>Title</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio neque facere laudantium harum tempora quos, quisquam!</p>
	</div>
