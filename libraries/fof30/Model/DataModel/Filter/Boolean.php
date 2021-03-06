<?php
/**
 * @package     FOF
 * @copyright   Copyright (c)2010-2019 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license     GNU GPL version 2 or later
 */

namespace FOF30\Model\DataModel\Filter;

defined('_JEXEC') or die;

class Boolean extends Number
{
	/**
	 * Is it a null or otherwise empty value?
	 *
	 * @param   mixed  $value  The value to test for emptiness
	 *
	 * @return  boolean
	 */
	public function isEmpty($value)
	{
		return is_null($value) || ($value === '');
	}
} 
