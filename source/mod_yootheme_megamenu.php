<?php
/**
 * @package YOOtheme MegaMenu
 * @version 1.0.2
 * @copyright Copyright (C) 2021 Destiny B.V., All rights reserved.
 * @license GNU General Public License version 3 or later; see LICENSE.txt
 * @author url: https://www.destiny.nl
 * @author email email@renekreijveld.nl
 *
 * YOOtheme MegaMenu is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;

// Include the yootheme megamenu functions only once
JLoader::register('ModYoothemeMegamenuHelper', __DIR__ . '/helper.php');

// Get general module parameters
$moduleclass   = $params->get('moduleclass');
$showpositions = $params->get('showpositions');
// Get toplevel items and the dropdown definitions
$toplevelitems = ModYoothemeMegamenuHelper::getItems($params);

require ModuleHelper::getLayoutPath('mod_yootheme_megamenu', 'default');