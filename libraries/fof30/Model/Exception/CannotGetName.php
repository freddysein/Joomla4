<?php
/**
 * @package     FOF
 * @copyright   Copyright (c)2010-2019 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license     GNU GPL version 2 or later
 */

namespace FOF30\Model\Exception;

use Exception;

defined('_JEXEC') or die;

/**
 * Exception thrown when we can't get a Controller's name
 */
class CannotGetName extends \RuntimeException
{
	public function __construct( $message = "", $code = 500, Exception $previous = null )
	{
		if (empty($message))
		{
			$message = \JText::_('LIB_FOF_MODEL_ERR_GET_NAME');
		}

		parent::__construct( $message, $code, $previous );
	}

}
