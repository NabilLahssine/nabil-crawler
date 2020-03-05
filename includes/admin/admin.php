<?php
namespace NabilCrawlerProject;
defined( 'ABSPATH' ) || die("better be careful than sorry!");
/**
 * Crawler Admin setting page
 *
 */
class NabilCrawler_Admin{	

    public function __construct(){
		add_action('admin_menu', [$this, 'dashboard_menu']);
    }

    /**
     * Registering the admin script & styles
     *
     * @access public
     */
    public function enqueue_admin_scripts(){
        $crawlerNabil = new NabilCrawler();
        wp_enqueue_style('admin-style', NABIL_CRAWLER_URL . 'assets/css/admin.css', false, NABIL_CRAWLER_VERSION);
        wp_enqueue_script('admin-vue-script', NABIL_CRAWLER_URL.'assets/js/vue.js',null, true, true);        
        $admin_crawler_data = array( 
        	'ajax_handler'		=> 		admin_url( 'admin-ajax.php'),
            'crawl_history'     =>      $crawlerNabil->get_crawl_history()
        );
        wp_enqueue_script('admin-crawler-manager', NABIL_CRAWLER_URL.'assets/js/admin.js',null, true, true);
		wp_localize_script('admin-crawler-manager', 'nblc_data', $admin_crawler_data ); 
    }


    /**
     * Add the Nabil Crawler admin page & WP dashboard Menu
     *
     * @access public
     */
    public function dashboard_menu(){
	  $dashboard =  add_menu_page(
	        esc_html__('Nabil Crawler','nabil-crawler'),     
	        esc_html__('Nabil Crawler','nabil-crawler'),     
	        'manage_options',  
	        'nabil-crawler',    
	        [$this, 'dashboard_welcome_render'],
	        NABIL_CRAWLER_URL.'assets/img/logo-small.svg'
	        
	    ); 
	    add_action( 'load-' . $dashboard, [$this,'enqueue_admin_scripts']);
    }

    /**
     * Setting page dashboard HTML render
     *
     * @access public
     */
    public function dashboard_welcome_render(){     
        require_once(NABIL_CRAWLER_PATH.'includes/views/dashboard.php');
    }

}

new NabilCrawler_Admin();