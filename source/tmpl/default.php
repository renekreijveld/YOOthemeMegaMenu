<?php
/**
 * @package YOOtheme MegaMenu
 * @version 1.0.0
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
?>

<style>
.mega{
	width: 100%;
	left: 0px !important;
}
</style>

<ul class="uk-navbar-nav <?php echo $moduleclass; ?>">
	<?php foreach ($toplevelitems as $item) : ?>
	<li>
		<a href="<?php echo $item->link; ?>" <?php echo $item->target; ?>><?php echo $item->title; ?><?php echo $item->showdd; ?></a>
		<div class="<?php echo ($item->ddkind == 'mega' ? 'uk-width-large' : '');?> <?php echo $item->ddkind; ?>" uk-dropdown="<?php echo $item->offset . $item->position . $item->animation; ?>">
			<div class="uk-child-width-1-<?php echo $item->columns; ?>@m" uk-grid>
				<?php for ($col = 1; $col <= $item->columns; $col++) : ?>
				<div>
					<?php if ($showpositions == '1') : ?>
					<strong><?php echo $item->modulename . $col; ?></strong><br>
					<?php endif; ?>
					{modulepos <?php echo $item->modulename . $col; ?>}
				</div>
				<?php endfor; ?>
			</div>
		</div>
	</li>
	<?php endforeach; ?>
</ul>
