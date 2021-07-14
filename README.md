# YOOtheme Mega Menu module
Joomla Module to generate a mega dropdown menu for YOOtheme Pro.

## Installation instructions
- Download the latest release <a href="https://github.com/renekreijveld/YOOthemeMegaMenu/releases/tag/1.0.0" target="_blank">here</a>.
- Install the module inside your YOOtheme Pro based Joomla website.
- In YOOtheme Pro go to MENUS and remove the menu at the NAVBAR POSITION.
- Create a new YOOtheme MegaMenu module and publish it on the **navbar** module postion.

## Usage

- In the YOOtheme MegaMenu module, add Top Level Items and define what kind of dropdown you want to display when hovering over the toplevel items:
  - Choose **Mega Menu** to display 1 to up to 6 columns in a mega dropdown.
  - Choose **Single Column** to display a single column in a dropdown.
- Don't forget to set the other options for each toplevel item:
  - Show dropdown indicator
  - Indicator icon
  - Offset
  - Animation
- Each column in the dropdowns holds a moduleposition. For the **1st** toplevel item, the **1st** column has moduleposition name **megamenu11**.
- The **2nd** column of the **1st** toplevel item has moduleposition name **megamenu12**
- For the **2nd** toplevel item, the **1st** column has moduleposition name **megamenu21**. You get the idea ;-)
- You can add more toplevel items by clicking the green + icon at the bottom right of one of the other toplevel items.

![Toplevelitem](https://github.com/renekreijveld/YOOthemeMegaMenu/blob/077a95e91effbbd29cbd406d486818acf91744c0/screenshots/toplevelitem.jpg)

- You can now create modules that you can display on the megamenu modulepositions to fill up your megamenu.

### Version history
2021-07-14 Initial version
