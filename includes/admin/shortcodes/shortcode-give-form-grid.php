<?php
/**
 * The [donation_form_grid] ShortCode Generator class
 *
 * @package    Give
 * @subpackage Admin
 * @copyright  Copyright (c) 2016, WordImpress
 * @license    https://opensource.org/licenses/gpl-license GNU Public License
 * @since      2.1
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Give_Shortcode_Donation_Form_Grid extends Give_Shortcode_Generator {

	/**
	 * Class constructor
	 */
	public function __construct() {

		$this->shortcode['label'] = __( 'Donation Form Grid', 'give' );

		parent::__construct( 'donation_form_grid' );
	}
}

new Give_Shortcode_Donation_Form_Grid();