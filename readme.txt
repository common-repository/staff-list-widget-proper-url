===A Staff List Plugin ===

Contributors: bythegram

Tags: widget area, widget, staff list, website staff roles, user roles

Requires at least: 3.0.1

Tested up to: 3.4

Stable tag: 1.1.2

License: GPLv2 or later

License URI: http://www.gnu.org/licenses/gpl-2.0.html



A simple plugin that creates a widget area and a widget that helps you display your staff names and roles



== Description ==



The plugin creates a Widget Area named Staff Lists and a Staff List widget. There are a few ways that you can use the plugin in your theme,

you can place the Staff List widget in your existing Sidebar, or you can use the widget area provided and place it into your theme using the [stafflist] shortcode.


The shortcode will also allow you to display the Staff List widget area in a post or page if you don't want to edit your template files. Options for the short code are class and title. Defaults are class="ag_staff" and title="". 

Example:
[stafflist class="yourclass" title="The Title"] 



Note:



This plugin comes with some very basic css so you may need to edit to suit your site needs.





== Installation ==



1. Upload `staff_list_plugin folder` to the `/wp-content/plugins/` directory

2. Activate the plugin through the 'Plugins' menu in WordPress

3a. Place `<?php echo do_shortcode('[staff_list]'); ?>` in the template file you wish to display the Staff List Widget Area

3b. Use the short code `[staff_list class="" title=""]` in a Post or Page to display the Widget Area (class = your custom class for the container, default = ag_staff, title = the h3 title, default = blank)

3c. Use the Staff List widget in your regular sidebar

4. List your staff in the widget like so:



	Name|role

	Name|role

	Name|role







== Changelog ==
= 1.1.2 =
fixes possible widget bug
= 1.1 =

fixed the style enqueue and gave more options to the short code

= 1.0 =

The first release. Tested and works. 
