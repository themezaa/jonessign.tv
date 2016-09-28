=== Plugin Name ===
Contributors: kmfj1
Tags: widgets
Requires at least: 3.4.1
Tested up to: 4.1
Stable tag: 1.0.18
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Plugin to show the widget area names on non-admin pages and posts. This adds the title to widget $params['before_widget'].

== Description ==

If you get confused by which widget area a widget is attached to when browsing your site then this plugin can help.
The plugin shows the widget area names on non-admin pages and posts. This adds the widget area title to widget $params['before_widget']. This will only display for the edit_posts capabilities. You must use print $params['before_widget'] in your widget definitions to view the area name.
If the widget area is empty then no widget area name is displayed.

Recently added a jQuery toggle to the admin menu bar to quickly hide/show the widget area names. See +/- swan link in admin bar.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `show-widget-area-names` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Change the included css file to your liking.
4. You will find a link added to the Admin Bar to toggle Show Widget Area Names (+/- swan).

== Frequently Asked Questions ==

= How does it work? =

The plugin uses the formatting of properly setup widgets and appends the widget area name using before_widget. You will find a link added to the Admin Bar to toggle "swan."

== Screenshots ==

1. How the widget name is outputted on the page.

== Changelog ==

= 1.0.18 =

* Update method hooks to visibility public and static for php warnings.

= 1.0.17 =

* Update to call onclick inline admin bar. Working on stability of javascript call.

= 1.0.16 = Update to call onclick inline admin bar. Working on stability of javascript call.

* Updates to load javascript using version number.

= 1.0.15 =

* Updates to load javascript using version number.

= 1.0.14 =

* Updates to javascript to toggle the admin bar menu item. Stopped working on 4.1.

= 1.0.12 =

* Back to 1.0.10.

= 1.0.9 =

* Update to __CLASS__ to actual class name. Tested on 4.0.0. Update change log.

= 1.0.6 =

* Update to default to hidden until clicked in admin bar.

= 1.0.5 =

* Update latest working version.

= 1.0.4 =

* Added the JQuery toggle to admin bar. Update latest working version.

= 1.0.3 =

* Added the JQuery toggle to admin bar.

= 1.0.2 =

* Trying to get screenshots working

= 1.0.1 =

* This is the major version.