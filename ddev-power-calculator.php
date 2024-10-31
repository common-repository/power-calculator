<?php

/**
 * 
 * @package           PowerCalculator
 * @author            Deep Khicher
 * @copyright         2020 Deep Khicher
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Power Calculator
 * Description: Insert Power Calculator into your website and calculate power load, inverter size and solar panel size
 * Author: Deep Khicher
 * Requires PHP: 7.2
 * Requires at least: 5.2
 * Version: 1.0
 * Text Domain: ddev-power-calculator
 * Domain Path: /lang
 *
 * Power Calculator is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Power Calculator is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with plugin. If not, see <http://www.gnu.org/licenses/>.
 * 
 */

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

if (!function_exists('add_action')) {
    echo "Hi There! I'm just a plugin, not much i can do when called directly";
    exit;
}

//Setup
define('DPC_PLUGIN_URL', __FILE__);

//includes
include('inc/shortcodes/power-calculator.php');
include('process/power-calculation.php');
include('inc/enqueue.php');
include('admin/OptionPage.php');


//Action Hooks
add_action('wp_enqueue_scripts', 'ddev_pc_enqueue_scripts', 100);
add_action('plugin_loaded', 'ddev_pc_load_textdomain');

//Filters

//shortcodes
add_shortcode('power-calculator', 'ddev_pc_power_calculator');

function ddev_pc_load_textdomain()
{
    $plg_dir = 'ddev-power-calculator/lang';
    load_plugin_textdomain('ddev-power-calculator', false, $plg_dir);
}
