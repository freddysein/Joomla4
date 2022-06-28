<?php
/**
 * @package     Dardk More Plugin
 * @subpackage  Enables Dark More on your Website.
 * @Help		www.joomdev.com/forum
 * @copyright   Copyright (C) 2009 - 2020 JoomDev. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Joomla! System Remember Me Plugin
 *
 * @since  1.5
 */

class PlgSystemDarkMode extends JPlugin
{
	/**
	 * Application object.
	 *
	 * @var    JApplicationCms
	 * @since  3.2
	 */
	protected $app;

	/**
	 * Remember me method to run onAfterInitialise
	 * Only purpose is to initialise the login authentication process if a cookie is present
	 *
	 * @return  void
	 *
	 * @since   1.5
	 * @throws  InvalidArgumentException
	 */
	 
	 
	public function onAfterDispatch() {
		
		$doc = JFactory::getDocument();
		if (JFactory::getApplication()->isClient('site')) {
			$source      	= $this->params->get('source');
			if($source == 'local') {
				$url = JURI::root().'plugins/system/darkmode/assets/darkmode-js.min.js';
			}
			if($source == 'cdn') {
				$url = 'https://cdn.jsdelivr.net/npm/darkmode-js@1.5.5/lib/darkmode-js.min.js';
			}
			$doc->addScript($url);
			$forcezindex      	= $this->params->get('forcezindex');
			if($forcezindex) {
				$styles = '.darkmode-layer, .darkmode-toggle {z-index: 500;}';
				$doc->addStyleDeclaration ($styles);
			}
		}
	}
	
	public function onAfterRender(){
		if (JFactory::getApplication()->isClient('site')) {
			$buffer = JFactory::getApplication()->getBody();
			$offsetfrombottom      	= $this->params->get('offsetfrombottom');
			$transitiontime      	= $this->params->get('transitiontime');
			$mixColor     		 	= $this->params->get('mixColor');
			$backgroundColor      	= $this->params->get('backgroundColor');
			$buttonColorDark     	= $this->params->get('buttonColorDark');
			$buttonColorLight      	= $this->params->get('buttonColorLight');
			$saveInCookies      	= $this->params->get('saveInCookies');
			$label      			= $this->params->get('label');
			$autoMatchOsTheme      	= $this->params->get('autoMatchOsTheme');
			
			$options = " 
				bottom: '".$offsetfrombottom."px', // default: '32px'
				  time: '".$transitiontime."s', // default: '0.3s'
				  mixColor: '".$mixColor."', // default: '#fff'
				  backgroundColor: '".$backgroundColor."',  // default: '#fff'
				  buttonColorDark: '".$buttonColorDark."',  // default: '#100f2c'
				  buttonColorLight: '".$buttonColorLight."', // default: '#fff'
				  saveInCookies: ".$saveInCookies.", // default: true,
				  label: '".$label."', // default: ''
				  autoMatchOsTheme: ".$autoMatchOsTheme.", // default: true";
			$position      = $this->params->get('position');
			$offsetright      = $this->params->get('offsetright');
			$offsetleft      = $this->params->get('offsetleft');
			if($position == 'left') {
				$options .= "
					left: '".$offsetleft."px',
					right: 'unset',
				";
			}
			if($position == 'right') {
				$options .= "
					right: '".$offsetright."px',
					left: 'unset',
				";
			}
			$script = "var options = {".$options."}
				const darkmode = new Darkmode(options);
				darkmode.showWidget();";
				
			$autoenable      = $this->params->get('autoenable');
			if($autoenable) {
				$script .= 'darkmode.toggle();';
			}
			$finalscript = '<script>'.$script.'</script>';
			$buffer = str_ireplace('</body>', $finalscript . '</body>', $buffer);
			JFactory::getApplication()->setBody($buffer);
		}
	}
	
	
}
