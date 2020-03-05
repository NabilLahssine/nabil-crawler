<?php
namespace NabilCrawlerProject;
defined( 'ABSPATH' ) || die("better be careful than sorry!");

/**
 * Crawler Main class to do the magic
 *
 */
class NabilCrawler{		

    /**
     * The URL to be parsed & crawled!
     *
     * @var string
     * @access protected
     */
    protected $url;


    /**
     * The Host Name, will serve to check if URL is link is balid
     *
     * @var string
     * @access protected
     */
    protected $host;


    /**
     * Array that contains all the processed links, so we won't repeat the crawl for the same link!
     *
     * @var array
     * @access protected
     */
    protected $done_list = [];
    
    public function __construct(){}


    /**
     * Setting the Start URL & The Host Name
     *
     * @access public
     * @param string| $url
     */
    public function set_start_url($url){
    	$this->url = $url;
        $this->host = $_SERVER['HTTP_HOST'];
    }


    /**
     * Parsing the HTML Content & getting URL start List (to be crawled)
     *
     * @access public
     * @return JSON
     */
    public function get_start_info(){
    	$urlListResult = [];
    	$pageContent = file_get_contents($this->url);
        $dom = new \DOMDocument('1.0');
        @$dom->loadHTML($pageContent);
        $anchors = $dom->getElementsByTagName('a');        
        foreach ($anchors as $element){
            $singleUrl = $element->getAttribute('href');
            if(!in_array($singleUrl, $this->done_list)){
                $urlInfo = parse_url($singleUrl);
                if($this->check_valid_url($urlInfo))                  
               	 	array_push($urlListResult, $singleUrl);                
                array_push($this->done_list, $singleUrl);
            }
        }
       echo json_encode($urlListResult);
    }


    /**
     * Get Single URL INFO (page title + meta tags)
     *
     * @access public
     * @param  string $singleUrl
     * @return JSON
     */
    public function get_url_info($singleUrl){
        $urlInfo = parse_url($singleUrl);
    	$tags = get_meta_tags($singleUrl);
    	$singleUrlInfo = [
    		"title" => $this->get_page_title($singleUrl),
    		"path" => isset($urlInfo['path']) ? $urlInfo['path'] : "-",
    		"description" => isset($tags["description"]) ? $tags["description"] : "-",
    		"keywords" => isset($tags["keywords"]) ? $tags["keywords"] : "-"
    	];
    	$this->get_url_result_curl($singleUrl, $singleUrlInfo);
    }


    /**
     * Get URL curl info (time, code, size) + merging with previous info
     *
     * @access public
     * @param  string $singleUrl, array $singleUrlInfo 
     * @return JSON
     */
    public function get_url_result_curl($singleUrl,$singleUrlInfo){
        $curl = curl_init($singleUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($curl);
        $infoArray = [
            "url" => $singleUrl,
            "time" => curl_getinfo($curl, CURLINFO_TOTAL_TIME), 
            "code" => curl_getinfo($curl, CURLINFO_HTTP_CODE), 
            "size" => curl_getinfo($curl, CURLINFO_SIZE_DOWNLOAD)           
        ];
        curl_close($curl);
        $resultArray = array_merge($infoArray,$singleUrlInfo);                
        echo json_encode($resultArray);        
    }


    /**
     * Get URL page title
     *
     * @access public
     * @param  string $singleUrl
     * @return string
     */
    public function get_page_title($singleUrl) {
		$data = file_get_contents($singleUrl);
	    $title = preg_match("/<title>(.+)<\/title>/i", $data, $matches) ? $matches[1] : null;
	    return $title;
	}


    /**
     * Checking if an URL is valid & it's internal to the current hostname
     *
     * @access public
     * @param  array $urlInfo
     * @return bool
     */
    public function check_valid_url($urlInfo){        
        if(isset($urlInfo['host']) && strpos($urlInfo['host'], $this->host) !== false && $urlInfo['host'] === $this->host)
            return true;        
        return false;
    }


    /**
     * Updating & storing the crawling history
     *
     * @access public
     * @param  array $nblcrwl_history 
     */
    public function update_store_crawl_history($nblcrwl_history){ 
        if(get_option('nblcrwl_history'))
            update_option('nblcrwl_history', $nblcrwl_history);       
        else {
            add_option('nblcrwl_history', $nblcrwl_history);
            update_option('nblcrwl_history', $nblcrwl_history);            
        }
    }


    /**
     * Removing the crawling history
     *
     * @access public
     */
    public function remove_crawl_history(){        
        update_option('nblcrwl_history', []);
    }
   

    /**
     * Getting the crawling history
     *
     * @access public
     * @return array
     */
    function get_crawl_history(){
        if(get_option('nblcrwl_history'))
           return get_option('nblcrwl_history'); 
        return [];
    }


    /**
     * Register Nabil Crawler Shortcode
     *
     * @access public   
     */
    public function register_nbl_crawl_shortcode(){
        add_shortcode('nabilcrawler', [$this, 'print_nbl_crawl_shortcode']);
    }


    /**
     * Printing the Nabil Crawler Shortcode
     *
     * @access public
     * @return HTML!
     */
    public function print_nbl_crawl_shortcode(){
        $crawlHistory = $this->get_crawl_history();
        $shortcodeOutput = '';
        if(sizeof($crawlHistory) > 0){
            foreach ($crawlHistory as $singleUrl) {
                $shortcodeOutput .= '<div>';
                    $shortcodeOutput .= '<a href="'.esc_url($singleUrl['url']).'" target="_blank">- '.$singleUrl['title'].'</a>';
                $shortcodeOutput .= '</div>';
            }
        }else{
            $shortcodeOutput = esc_html__('No result for the moment','nabil-crawler');
        }
        return '<div>'.$shortcodeOutput.'</div>';
    }

}