<?php
/**
* Plugin Name: Easy Facebook Feed
* Plugin URI: https://wordpress.org/plugins/easy-facebook-feed/
* Description: Easy Facebook Feed shows your Facebook feed in a easy way
* Version: 2.6
* Author: timwass
* License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

define( 'EFF_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'EFF_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once(EFF_PLUGIN_DIR . "class.eff-error.php");
require_once(EFF_PLUGIN_DIR . "class.eff-template.php");
require_once(EFF_PLUGIN_DIR . "class.eff.php");
add_action( 'init', array( 'Eff', 'init' ) );

require_once(EFF_PLUGIN_DIR . "class.eff-widget.php");

if ( is_admin() ) {
    require_once( EFF_PLUGIN_DIR . 'class.eff-admin.php' );

    // Add settings link on plugin page
    function your_plugin_settings_link($links) {
        $settings_link = '<a href="options-general.php?page=easy-facebook-feed">Settings</a>';
        array_unshift($links, $settings_link);
        return $links;
    }

    $plugin = plugin_basename(__FILE__);
    add_filter("plugin_action_links_$plugin", 'your_plugin_settings_link' );
}



