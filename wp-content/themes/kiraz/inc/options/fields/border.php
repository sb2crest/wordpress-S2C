<?php
defined( 'ABSPATH' ) or die();


/**
 * This class will be present an colorpicker control
 */
class Kiraz_Options_Border extends Kiraz_Options_Control
{
	/**
	 * The control type
	 * 
	 * @var  string
	 */
	public $type = 'border';
	public $default = array();
	
	/**
	 * Render the control markup
	 * 
	 * @return  void
	 */
	public function render_content() {
		?>
			<div class="options-control-inputs">
				<border v-bind:value="data" v-bind:options="choices" v-on:change="triggerChange"></border>
			</div>
		<?php
	}
}
