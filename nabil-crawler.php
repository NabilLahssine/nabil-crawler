<?php
/*
	Plugin Name: Nabil Crawler
	Plugin URI: http://www.bynabil.com/
	Description: Home page SEO URL crawl.
	Author: Nabil Lahssine
	Version: 1.0
	Author URI: http://www.bynabil.com/
	Text Domain: nabil-crawler
*/

defined( 'ABSPATH' ) || die("better be careful than sorry!");

//NabilCrawler Defines
define('NABIL_CRAWLER_VERSION', '1.0' );
define('NABIL_CRAWLER_PATH', plugin_dir_path(__FILE__));
define('NABIL_CRAWLER_URL', plugin_dir_url(__FILE__) );


//NabilCrawler Includes

require_once NABIL_CRAWLER_PATH . 'includes/classes/NabilCrawler.php';
require_once NABIL_CRAWLER_PATH . 'includes/admin-ajax.php';
require_once NABIL_CRAWLER_PATH . 'includes/admin/admin.php';


//NabilCrawler load plugin translations.
function nabilcrawler_load_textdomain() {
	$locale = get_locale();
	$locale = apply_filters( 'plugin_locale', $locale, 'nabil-crawler');
	load_textdomain( 'nabil-crawler', WP_LANG_DIR . '/plugins/nabil-crawler-' . $locale . '.mo' );
	load_plugin_textdomain( 'nabil-crawler', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'nabilcrawler_load_textdomain' );


//NabilCrawler Register Shortcode
$crawlerNabil = new \NabilCrawlerProject\NabilCrawler();
$crawlerNabil->register_nbl_crawl_shortcode();	
