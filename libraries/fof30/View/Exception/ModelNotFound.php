<?php
/**
 * @package     FOF
 * @copyright   Copyright (c)2010-2019 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license     GNU GPL version 2 or later
 */

namespace FOF30\View\Exception;

use Exception;

defined('_JEXEC') or die;

/**
 * Exception thrown when we can't get a Controller's name
 */
class ModelNotFound extends \RuntimeException
{
	public function __construct($path, $viewName, $code = 500, Exception $previous = null)
	{
		$message = \JText::sprintf('LIB_FOF_VIEW_MODELNOTINVIEW', $path, $viewName);

		parent::__construct($message, $code, $previous);
	}
}
