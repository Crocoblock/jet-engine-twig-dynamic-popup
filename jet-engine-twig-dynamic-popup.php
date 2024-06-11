<?php
/**
 * Plugin Name: JetEngine Twig Dynamic Popup
 * Plugin URI:  https://crocoblock.com/plugins/jetengine/
 * Description: The plugin for creating dynamic popups using Twig, offering advanced JetEngine settings.
 * Version:     1.0.0
 * Author:      Crocoblock
 * Author URI:  https://crocoblock.com/
 * Text Domain: jet-engine-twig-dynamic-popup
 * License:
 * License URI:
 * Domain Path:
 *
 * @package jet-engine-twig-dynamic-popup
 * @author  Crocoblock
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

// Define Constants
define('JET_ETDP_PLUGIN_KEY', 'jet-engine-twig-dynamic-popup');
define('JET_ETDP_PLUGIN_PUBLIC_PREFIX', 'jet_etdp_');
define('JET_ETDP_PLUGIN_PRIVATE_PREFIX', 'jet_etdp_');
define('JET_ETDP_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('JET_ETDP_PLUGIN_URL', plugins_url(basename(plugin_dir_path(__FILE__)), basename(__FILE__)));
define('JET_ETDP_SUPPORT_PHP', '8.0');
define('JET_ETDP_VERSION', '1.0.0');

// Load main class
require_once 'class-jet-etdp.php';