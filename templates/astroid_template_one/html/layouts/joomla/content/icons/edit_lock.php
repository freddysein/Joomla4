<?php

/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   (C) 2016 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

if (isset($displayData['article'])) {
	$article = $displayData['article'];
	$aria_described = 'editarticle-' . (int) $article->id;
}

if (isset($displayData['contact'])) {
	$contact = $displayData['contact'];
	$aria_described = 'editcontact-' . (int) $contact->id;
}
?>
<span class="hasTooltip fas fa-lock" aria-hidden="true"></span>
<?php echo Text::_('JLIB_HTML_CHECKED_OUT'); ?>