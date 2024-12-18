<?php
defined( 'ABSPATH' ) or die();


/**
 * This class will be present an colorpicker control
 */
class Kiraz_Options_Markup extends Kiraz_Options_Control
{
	/**
	 * The control type
	 * 
	 * @var  string
	 */
	public $type = 'markup';

	/**
	 * The custom markup
	 * 
	 * @var  string
	 */
	public $content;

	/**
	 * Assets files that will be enqueued
	 * 
	 * @var  array
	 */
	public $enqueue;

	/**
	 * Enqueue assets for this control
	 * 
	 * @return  void
	 */
	public function enqueue() {
	}
	
	/**
	 * Render the control markup
	 * 
	 * @return  void
	 */
	public function render_content() {
		echo kiraz_cleanup( $this->content );
	}
}
