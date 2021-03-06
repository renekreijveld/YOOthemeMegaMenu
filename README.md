# YOOtheme Mega Menu module
Joomla module to generate a mega dropdown menu for YOOtheme Pro on Joomla 3.

## Installation instructions
- Download the latest release <a href="https://github.com/renekreijveld/YOOthemeMegaMenu/releases" target="_blank">here</a>.
- Install the module inside your YOOtheme Pro based Joomla website.
- In YOOtheme Pro go to MENUS and remove the menu at the NAVBAR POSITION.
- Create a new YOOtheme MegaMenu module and publish it on the **navbar** module postion.
- The use of Reglar Labs Modules Anywhere is no longer needed.

## Usage

- In the YOOtheme MegaMenu module, add Top Level Items and define what kind of dropdown you want to display when hovering over the toplevel items:
  - Choose **Mega Menu** to display 1 to up to 6 columns in a mega dropdown.
  - Choose **Single Column** to display a single column in a dropdown.
  - Choose **No dropdown** if you don't want to display a dropdown with a toplevel item.
- Don't forget to set the other options for each toplevel item:
  - Show dropdown indicator
  - Indicator icon
  - Offset
  - Animation
- You can hover over the labels of the options to read the description at each option.
- Each column in the dropdowns holds a moduleposition. For the **1st** toplevel item, the **1st** column has moduleposition name **megamenu11**.
- The **2nd** column of the **1st** toplevel item has moduleposition name **megamenu12**
- For the **2nd** toplevel item, the **1st** column has moduleposition name **megamenu21**. You get the idea ;-)
- You can add more toplevel items by clicking the green + icon at the bottom right of one of the other toplevel items.

![Toplevelitem](https://github.com/renekreijveld/YOOthemeMegaMenu/blob/077a95e91effbbd29cbd406d486818acf91744c0/screenshots/toplevelitem.jpg)

- You can now create modules that you can display on the megamenu modulepositions to fill up your megamenu.

## Tip

If you want to see what modulepositions are defined in the dropdown columns, set the **Show module positions** option to Yes.
This will show the modulepositions at the top of each column in the dropdown.

Don't forget to turn the option off again!

![Modulepositions](https://github.com/renekreijveld/YOOthemeMegaMenu/blob/59383c8a810df62d9752a535eff72eb2bddc4ca9/screenshots/modulepositions.jpg)

### Version history

2021-07-30 1.0.5 YOOtheme Template parameters are now supported.
With the YOOtheme Pro template, modules have an extra parameters tab called Templates.
Modules that are published in the dropdown columns now support the following YOOtheme Template parameters:

- Visibility
- Style
- Title Style
- Title Decoration

For this to work you need to set in the Advanced tab the Header Tag to H3 and the Module Style to Inherited.

2021-07-30 1.0.4 Added uk-active class on active toplevel item.

2021-07-17 1.0.3 Added update server.

2021-07-15 1.0.2 Warning fix.
Add an array typecast in the helper to prevent a warning.

2021-07-15 1.0.1 Code improvements.
Added coded improvements by Dmitrii Cymbal and added the option to set a dropdown to 'No dropdown'.
Also the Modules Anywhere plugin is no longer needed.

2021-07-14 1.0.1 Initial version
