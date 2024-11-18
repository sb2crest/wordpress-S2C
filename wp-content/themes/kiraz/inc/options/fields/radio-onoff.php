<?php
defined( 'ABSPATH' ) or die();


/**
 * Radio buttons control
 */
class Kiraz_Options_RadioOnOff extends Kiraz_Options_RadioButtons
{
	public function __construct( $id, $args = array() ) {
		parent::__construct( $id, $args );

		$this->choices = array(
			'on'  => _x( 'On', 'options', 'kiraz' ),
			'off' => _x( 'Off', 'options', 'kiraz' )
		);
	}


	public function render_content() {
		?>

			<div class="options-control-inputs options-control-onoff">
				<radio-buttons v-bind:value="data" v-bind:options="choices" v-on:change="triggerChange"></radio-buttons>
			</div>

		<?php
	}
}
