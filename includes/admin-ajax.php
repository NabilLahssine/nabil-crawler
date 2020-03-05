<?php
defined( 'ABSPATH' ) || die("better be careful than sorry!");

//Start The Crawel
add_action('wp_ajax_launchNabilCrawler', 'nbl_launch_crawler' );
add_action('wp_ajax_nopriv_launchNabilCrawler', 'nbl_launch_crawler');
function nbl_launch_crawler(){	
	if(isset($_POST['action']) && trim($_POST['action']) == 'launchNabilCrawler'){ 			
		$startURL = get_home_url();
		$crawlerNabil = new NabilCrawlerProject\NabilCrawler();
		$crawlerNabil->set_start_url($startURL);
		$crawlerNabil->get_start_info();
		die();	
	}
}


//Single URL Process Crawl
add_action('wp_ajax_singleUrlCrawler', 'nbl_single_url_crawler' );
add_action('wp_ajax_nopriv_singleUrlCrawler', 'nbl_single_url_crawler');
function nbl_single_url_crawler(){	
	if(isset($_POST['action'], $_POST['singleURL']) && trim($_POST['action']) == 'singleUrlCrawler' && trim($_POST['singleURL']) != ''){ 	
		$crawlerNabil = new NabilCrawlerProject\NabilCrawler();
		$crawlerNabil->get_url_info($_POST['singleURL']);	
		die();	
	}
}


//Finish Process
add_action('wp_ajax_finishStoreCrawlResult', 'nbl_finish_store_crawl' );
add_action('wp_ajax_nopriv_finishStoreCrawlResult', 'nbl_finish_store_crawl');
function nbl_finish_store_crawl(){	
	if(isset($_POST['action'], $_POST['crawlResultList']) && trim($_POST['action']) == 'finishStoreCrawlResult'){ 	
		$crawlerNabil = new NabilCrawlerProject\NabilCrawler();
		$crawlerNabil->update_store_crawl_history($_POST['crawlResultList']);	
		wp_schedule_single_event( time() + 86400, 'remove_crawl_history' ); #Remove Crawl History after One Day
		die();	
	}
}


function remove_crawl_history_option() {
	$crawlerNabil = new NabilCrawlerProject\NabilCrawler();
	$crawlerNabil->remove_crawl_history();	
}
add_action( 'remove_crawl_history', 'remove_crawl_history_option' );
