<?php
/**
 * @package YOOtheme MegaMenu
 * @version 1.0.5
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
use Joomla\CMS\Factory;

$app    = Factory::getApplication();
// Get current Itemid to add uk-active class to active toplevel item
$itemId = $app->input->getCmd('Itemid', '');

?>

<style>
.mega{
	width: 100%;
	left: 0px !important;
}
</style>

<ul class="uk-navbar-nav <?php echo $moduleclass; ?>">
	<?php foreach ($toplevelitems as $item) : ?>
	<?php
	// Determine if active class uk-active has to be set
	$liClass = '';
	if ($item->linktype === 'internal' && $itemId === $item->internallink)
	{
		$liClass = ' class="uk-active"';
	}
	?>
	<li<?php echo $liClass; ?>>
		<a href="<?php echo $item->link; ?>" <?php echo $item->target; ?>><?php echo $item->title; ?><?php echo $item->showdd; ?></a>
		<?php if ($item->ddkind === 'mega' || $item->ddkind === 'single') : ?>
		<div class="<?php echo ($item->ddkind === 'mega' ? 'uk-width-large' : '');?> <?php echo $item->ddkind; ?>" uk-dropdown="<?php echo $item->offset . $item->position . $item->animation; ?>">
			<div class="uk-child-width-1-<?php echo $item->columns; ?>@m" uk-grid>
				<?php for ($col = 1; $col <= $item->columns; $col++) : ?>
				<div>
					<?php if ($showpositions == '1') : ?>
					<strong><?php echo $item->modulename . $col; ?></strong><br>
					<?php endif; ?>
					<?php
					// Load the modules
					$modules  = ModuleHelper::getModules($item->modulename . $col);
					$attribs  = array();
					foreach ($modules as $mod)
					{
						// Get extra module paramaters
						$modParams = json_decode($mod->params);
						$extraClass = $modParams->moduleclass_sfx;
						// Get extra YOOtheme Template tab parameters
						$yooParams = json_decode($modParams->yoo_config);
						$class = [];
						$title = [];
						$titleClass = [];
						$title_element = ($modParams->header_tag ? $modParams->header_tag : 'h3');
						$titleClass[] = ($yooParams->title_style ? "uk-$yooParams->title_style" : '');
						$titleClass[] = ($yooParams->title_decoration ? "uk-heading-$yooParams->title_decoration" : '');
						$class[] = ($yooParams->visibility ? "uk-visible@$yooParams->visibility" : '');
						$class[] = ($yooParams->style ? "uk-card uk-card-body uk-$yooParams->style" : 'uk-panel');
						$attribs['style'] = '';
						echo '<div class="' . $extraClass . ' ' . implode(" ", $class) . '">';
						if ($mod->showtitle === '1')
						{
							echo '<' . $title_element  . ' class="' . implode(" ", $titleClass) . '">';
							if ($yooParams->title_decoration === 'line')
							{
								echo '<span>' . $mod->title . '</span>';
							}
							else
							{
								echo $mod->title;
							}
							echo '</' . $title_element . '>';
						}
						echo ModuleHelper::renderModule($mod, $attribs);
						echo '</div>';
					}
					?>
				</div>
				<?php endfor; ?>
			</div>
		</div>
		<?php endif; ?>
	</li>
	<?php endforeach; ?>
</ul>


