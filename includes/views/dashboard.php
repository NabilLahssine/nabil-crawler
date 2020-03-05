<div id="nbl-crawl-app" class="nbl-dahs-container" :data-loading="loadingSituation">
	<div class="nbl-dash-menu-ctn">
		<div class="nbl-dash-home" @click.prevent.default="back_home">
			<svg viewBox="0 0 32 32"><path d="M31.207 14.793l-14.5-14.5c-0.39-0.391-1.024-0.391-1.414 0l-14.5 14.5c-0.391 0.39-0.391 1.024 0 1.414s1.024 0.39 1.414 0l1.793-1.793v14.586c0 1.65 1.35 3 3 3h18c1.65 0 3-1.35 3-3v-14.586l1.793 1.793c0.39 0.39 1.024 0.39 1.414 0s0.39-1.024 0-1.414zM13 30v-11h6v11h-6zM26 29c0 0.55-0.45 1-1 1h-4v-12c0-0.552-0.448-1-1-1h-8c-0.552 0-1 0.448-1 1v12h-4c-0.55 0-1-0.45-1-1v-16.586l10-10 10 10v16.586z"></path></svg>
		</div>
		<div class="nbl-dash-logo">
			<div class="nbl-dash-icon-ld">
				<div class="nbl-dash-icon">
					<svg viewBox="0 0 512.009 512.009" style="enable-background:new 0 0 512.009 512.009;" xml:space="preserve"><path d="M427.801,64.192c-2.89-3.818-8.313-4.582-12.132-1.684c-3.827,2.881-4.591,8.322-1.71,12.149    c0.538,0.72,53.153,72.296,25.635,171.06l-141.598,74.969c-2.187-2.091-4.521-4.018-6.994-5.771    c29.54-10.596,52.901-34.113,63.254-63.774c0.573-0.191,1.137-0.391,1.675-0.712l43.39-26.034    c2.612-1.571,4.209-4.391,4.209-7.437c0-165.897-52.857-212.957-55.105-214.875c-3.645-3.115-9.112-2.69-12.245,0.963    c-3.107,3.645-2.673,9.121,0.972,12.236c0.477,0.417,48.015,42.808,49.004,196.773l-26.624,15.967    c0.391-3.636,0.607-7.324,0.607-11.064c0-57.422-46.714-104.136-104.136-104.136c-57.422,0-104.136,46.713-104.136,104.136    c0,3.74,0.217,7.428,0.607,11.064l-26.624-15.967C126.84,59.922,174.196,15.881,174.907,15.23    c3.601-3.115,4.009-8.556,0.92-12.184c-3.124-3.653-8.6-4.079-12.236-0.963c-2.256,1.918-55.114,48.978-55.114,214.875    c0,3.046,1.605,5.866,4.209,7.437l43.39,26.034c0.538,0.321,1.111,0.521,1.675,0.712c10.353,29.661,33.714,53.179,63.262,63.774    c-2.482,1.753-4.816,3.679-7.003,5.771L72.412,245.717c-27.518-98.764,25.097-170.34,25.635-171.06    c2.881-3.827,2.117-9.268-1.701-12.149c-3.836-2.898-9.259-2.135-12.141,1.684c-2.456,3.246-59.765,80.679-27.44,189.935    c0.659,2.239,2.195,4.113,4.261,5.207l133.042,70.439H91.122c-3.532,0-6.717,2.143-8.044,5.424    c-28.82,71.194,15.768,159.675,17.677,163.415c1.536,2.994,4.582,4.721,7.732,4.721c1.328,0,2.682-0.312,3.948-0.955    c4.261-2.187,5.953-7.42,3.766-11.689c-0.417-0.816-40.561-80.41-19.057-143.56h100.673c-0.946,3.15-1.614,6.413-2.031,9.754    l-53.821,7.689c-2.872,0.408-5.346,2.221-6.595,4.834c-34.911,72.73,33.697,137.563,36.63,140.288    c1.675,1.545,3.792,2.317,5.901,2.317c2.334,0,4.651-0.937,6.37-2.777c3.254-3.523,3.046-9.008-0.469-12.271    c-0.607-0.564-59.461-56.129-34.642-115.886l46.974-6.717c2.629,15.941,11.455,29.783,23.951,38.99    c-9.676,6.17-16.15,16.931-16.15,29.236c0,19.135,15.568,34.712,34.712,34.712c4.799,0,8.678-3.888,8.678-8.678    c0-4.799-3.879-8.678-8.678-8.678c-9.563,0-17.356-7.784-17.356-17.356c0-9.581,7.793-17.356,17.356-17.356    c1.666,0,3.141-0.599,4.461-1.414c4.157,0.903,8.47,1.414,12.895,1.414c4.426,0,8.739-0.512,12.895-1.414    c1.328,0.816,2.794,1.414,4.46,1.414c9.572,0,17.356,7.775,17.356,17.356c0,9.572-7.784,17.356-17.356,17.356    c-4.799,0-8.678,3.879-8.678,8.678c0,4.79,3.879,8.678,8.678,8.678c19.144,0,34.712-15.577,34.712-34.712    c0-12.305-6.474-23.066-16.15-29.227c12.496-9.216,21.322-23.057,23.951-38.999l46.983,6.717    c24.715,59.583-34.044,115.33-34.66,115.894c-3.506,3.272-3.697,8.756-0.434,12.262c1.701,1.84,4.027,2.777,6.352,2.777    c2.109,0,4.217-0.772,5.892-2.317c2.942-2.725,71.541-67.558,36.63-140.288c-1.25-2.612-3.723-4.426-6.587-4.834l-53.829-7.689    c-0.417-3.341-1.085-6.604-2.031-9.754h100.673c21.443,63.037-18.64,142.744-19.065,143.568c-2.169,4.27-0.486,9.494,3.784,11.681    c1.267,0.642,2.612,0.955,3.94,0.955c3.15,0,6.196-1.727,7.732-4.721c1.909-3.74,46.497-92.221,17.677-163.415    c-1.319-3.28-4.513-5.424-8.044-5.424H317.938l133.042-70.439c2.065-1.093,3.601-2.968,4.261-5.207    C487.574,144.871,430.256,67.437,427.801,64.192z"/></svg>
				</div>
				<div class="nbl-dash-load-r nbl-dash-rpl-bg"><span class="nbl-dash-rpl-bg"></span><span class="nbl-dash-rpl-bg"></span><span class="nbl-dash-rpl-bg"></span></div>				
			</div>
			<div class="nbl-dash-lg-txt" @click.prevent.default="back_home">
				<div class="nbl-dash-lg-name">nabil</div>
				<div class="nbl-dash-lg-slg">crawler</div>				
			</div>
		</div>
		<div class="nbl-crawl-prg-s" v-show="loadingSituation == 'process'">
			Processing &nbsp;<span class="nbl-cl1">{{processedUrls}}</span>&nbsp; from &nbsp;<span class="nbl-cl3">{{validCrawlURL.length}}</span>&nbsp;URLs.
		</div>

		<!--LOADIND RADIAL CONTAINER-->
		<div class="nbl-dash-prog-rad-ctn" v-show="loadingSituation == 'process'">	
			<div class="nbl-prgrs-radial-ctn">
				<svg class="nbl-prgrs-radial-insider" width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="xMinYMin meet" class="svg-content"><path style="stroke:#eee;" d="M50,10 a40,40 0 0,1 0,80 a40,40 0 0,1 0,-80"/></svg>
				<svg class="nbl-prgrs-circle" width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="xMinYMin meet" class="svg-content"><path style="stroke:#00BFA5;" d="M50,10 a40,40 0 0,1 0,80 a40,40 0 0,1 0,-80"/></svg>			
				<div class="nbl-prgrs-radial-txt"><span>{{percentValue}}</span>%</div>
			</div>
		</div>

	</div>
	
	<div class="nbl-dash-wrapper nbl-dash-starter nbl-fs"  v-if="activeLayout == 'starter'">
		<div class="nbl-dash-strbtns nbl-fs">
			<div class="nbl-str-btn-ctn nbl-fs"><div class="nbl-bg-btn nbl-bg1" @click.prevent.default="start_crawl">Launch Crawler</div></div>
			<div class="nbl-str-btn-ctn nbl-fs" v-if="crawlListHistory.length > 0"><div class="nbl-bg-btn nbl-bg2" @click.prevent.default="view_history">View History</div></div>			
		</div>
	
	</div>

	<!--Crawling & Show Result -->
	<div class="nbl-dash-wrapper nbl-dash-crawling nbl-fs"  v-if="activeLayout == 'crawling'">
		<div class="nbl-dash-stats">
			<div class="nbl-stats-item" v-for="status in statsInfo" :data-status="status.code" :data-situation="crawlStatusActive == status.code ? 'active' : 'inactive'">
				<div class="nbl-stats-fs" @click.prevent.default="activate_status(status.code)"></div>
				<div class="nbl-stats-it-inf">
					<div class="nbl-stats-it-inf-txt nbl-fs">{{status.title}}</div>
					<div class="nbl-stats-it-inf-num nbl-fs nbl-st-cl">{{status.number}}</div>
				</div>
				<div class="nbl-stats-it-icon">
					<div class="nbl-stats-it-icon-ins nbl-st-bg">
						{{status.code}}xx
					</div>
				</div>
			</div>
		</div>	
		<div class="nbl-dash-crawl-ctn nbl-fs">
			<div class="nbl-dash-crawl-head nbl-dash-crawl-line">
				<div></div>
				<div class="nbl-dash-crw-p-ti">Page Path</div>
				<div>Title</div>
				<div>Description</div>
				<div>Keywords</div>
				<div>Time</div>
				<div>Size</div>
				<div>Status</div>
			</div>
			<div class="nbl-dash-crawl-body nbl-fs">
				<div class="nbl-dash-crawl-item nbl-dash-crawl-line" v-for="(crawlItem,index) in crawlList" :data-status="crawlItem.code" v-show="(crawlStatusActive == null) || (crawlStatusActive != null && crawlItem.code.toString().startsWith(crawlStatusActive))">
					<div>{{index + 1}}</div>
					<div class="nbl-dash-crw-p-it" :title="crawlItem.path">{{crawlItem.path}}</div>
					<div :title="crawlItem.title" v-html="crawlItem.title"></div>
					<div :title="crawlItem.description" v-html="crawlItem.description"></div>
					<div :title="crawlItem.keywords" v-html="crawlItem.keywords"></div>
					<div>{{(Math.round(crawlItem.time * 100) / 100).toFixed(2)}}s</div>
					<div>{{parseInt(crawlItem.size / 1000)}} Kb</div>
					<div class="nbl-dash-crw-st-it nbl-st-cl">{{crawlItem.code}}</div>
				</div>

			</div>
		</div>

	</div>
</div>