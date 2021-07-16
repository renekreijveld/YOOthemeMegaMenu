<?php
/**
 * @package YOOtheme MegaMenu
 * @version 1.0.3
 * @copyright Copyright (C) 2021 Destiny B.V., All rights reserved.
 * @license GNU General Public License version 3 or later; see LICENSE.txt
 * @author url: https://www.destiny.nl
 * @author email email@renekreijveld.nl
 *
 * Code improvements by Dmitrii Cymbal
 *
 * YOOtheme MegaMenu is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 */

defined('_JEXEC') or die;

use \Joomla\CMS\Factory;

/**
 * Helper for mod_yootheme_megamenu
 */
class ModYoothemeMegamenuHelper
{
	/**
	 * Get the mega menu items
	 *
	 * @param   \Joomla\Registry\Registry  &$params  object holding the models parameters
	 *
	 * @return  mixed
	 *
	 * @since 1.6
	 */
	public static function getItems(&$params)
	{
		$db = Factory::getDbo();

		$toplevelitems = (array) $params->get('toplevelitems', []);

		// if empty, then do not connect to the database
		if(count($toplevelitems) === 0)
		{
			return $toplevelitems;
		}
		$count = 0;

		$menu_ids = [];
		$menu_titles = [];

		// It's better to go through and collect data for one request to database
		foreach ($toplevelitems as $item)
		{
			$menu_ids[] = (int) $item->internallink;
		}

		$query = $db->getQuery(true)
			->select($db->quoteName(['id', 'title',]))
			->from($db->quoteName('#__menu'))
			->where($db->quoteName('id') . ' IN (' .  implode(',', $menu_ids) . ')');
		$db->setQuery($query);
		$result = $db->loadObjectList();

		foreach ($result as $item)
		{
			$menu_titles[(int) $item->id] = $item->title;
		}

		# Check for each item if internal link title should be used and cleanup unnecessary fields
		foreach ($toplevelitems as $item)
		{
			# Set the module name
			$count++;

			$item->modulename = 'megamenu' . $count;
			$item->animation = '';

			# If the link is internal and we need to use the linked menu item title, get it from the database
			if ($item->linktype === 'internal' && $item->useinternallinktitle === '1')
			{
				$item->externallink = '';
				$item->target = '';
				$item->title = $menu_titles[(int) $item->internallink];
			}

			# If the link is external clear the internal link and the internal link title
			if ($item->linktype === 'external')
			{
				$item->internallink = '';
				$item->useinternallinktitle = '';
			}

			# If the item is a link construct it
			if ($item->islink === '1')
			{
				if ($item->linktype == 'internal')
				{
					$item->link = 'index.php?Itemid=' . $item->internallink;
					$item->target = '';
				}

				if ($item->linktype === 'external')
				{
					$item->link = $item->externallink;
					# Check if the external link needs to be opened in a new browser tab
					if ($item->target === '_blank')
					{
						$item->target = ' target="_blank"';
					}
				}
			}
			else
			{
				$item->link = '#';
				$item->target = '';
			}

			# Check if a dropdown indicator needs to be shown
			$item->showdd = ($item->showdd === '1' ? ' <span uk-icon="icon: ' . $item->ddicon . '"></span>' : '');

			# If no dropdown then clear dropdown indicator
			$item->showdd = ($item->ddkind === 'no' ? '' : $item->showdd);

			# Check if an offset needs to be set
			if ($item->offset)
			{
				$item->offset = 'offset:' . $item->offset . ';';
			}

			# Check for an item position
			if ($item->position)
			{
				$item->position = 'pos:' . $item->position . ';';
			}

			# Check if item is a single column dropdown, if so set columns to 1.
			if ($item->ddkind === 'single')
			{
				$item->columns = 1;
			}

			# Check for animation
			$item->animation = ($item->useanimation === '1' ? 'animation:' . $item->animation  . ';duration:' . $item->animationduration . ';' : '');
		}

		return $toplevelitems;
	}
}