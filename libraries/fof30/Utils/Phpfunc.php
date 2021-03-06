<?php
/**
 * @package     FOF
 * @copyright   Copyright (c)2010-2019 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license     GNU GPL version 2 or later
 */

namespace FOF30\Utils;

defined('_JEXEC') or die;

/**
 * Intercept calls to PHP functions.
 *
 * Based on the Session package of Aura for PHP – https://github.com/auraphp/Aura.Session
 *
 * @method  function_exists(string $function)
 * @method  mcrypt_list_algorithms()
 * @method  hash_algos()
 */
class Phpfunc
{
	/**
	 *
	 * Magic call to intercept any function pass to it.
	 *
	 * @param string $func The function to call.
	 *
	 * @param array  $args Arguments passed to the function.
	 *
	 * @return mixed The result of the function call.
	 *
	 */
	public function __call($func, $args)
	{
		return call_user_func_array($func, $args);
	}
}
