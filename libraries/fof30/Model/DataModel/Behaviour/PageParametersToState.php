<?php
/**
 * @package     FOF
 * @copyright   Copyright (c)2010-2019 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license     GNU GPL version 2 or later
 */

namespace FOF30\Model\DataModel\Behaviour;

use FOF30\Event\Observer;
use FOF30\Model\DataModel;
use Joomla\Registry\Registry;

defined('_JEXEC') or die;

/**
 * FOF model behavior class to populate the state with the front-end page parameters
 *
 * @since    2.1
 */
class PageParametersToState extends Observer
{
	public function onAfterConstruct(DataModel &$model)
	{
		// This only applies to the front-end
		if (!$model->getContainer()->platform->isFrontend())
		{
			return;
		}

		// Get the page parameters
		/** @var \JApplicationSite $app */
		$app    = \JFactory::getApplication();
		/** @var \JRegistry|Registry $params */
		$params = $app->getParams();

		// Extract the page parameter keys
		$asArray = $params->toArray();

		if (empty($asArray))
		{
			// There are no keys; no point in going on.
			return;
		}

		$keys = array_keys($asArray);
		unset($asArray);

		// Loop all page parameter keys
		foreach ($keys as $key)
		{
			// This is the current model state
			$currentState = $model->getState($key);
			// This is the explicitly requested state in the input
			$explicitInput = $model->input->get($key, null, 'raw');

			// If the current state is empty and there's no explicit input we'll use the page parameters instead
			if (is_null($currentState) && is_null($explicitInput))
			{
				$model->setState($key, $params->get($key));
			}
		}
	}
}
