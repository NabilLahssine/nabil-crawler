var nabilCrawlerAPP,loadInterval; 

nabilCrawlerAPP = new Vue({
	el: '#nbl-crawl-app',
	http: {
        emulateJSON: true,
        emulateHTTP: true
    },
    //Setting Data 
	data: {
		ajaxHandler : nblc_data.ajax_handler,
		crawlListHistory : nblc_data.crawl_history,
		activeLayout : "starter",
		loadingSituation : "initial",
		statsInfo : [
			{title : "Successful Links", 	code : "2", 	number : 0},
			{title : "Redirections", 		code : "3", 	number : 0},
			{title : "Client Error", 		code : "4", 	number : 0},
			{title : "Server Error", 		code : "5", 	number : 0},
		],
		crawlList : [],
		validCrawlURL : [],
		processedUrls : 0,
		percentValue : 0,
		crawlStatusActive : null
	},
	mounted: function(){
		var self = this;		
		self.progress_init();
	},
	methods: {
		//Go Back Home
		back_home : function() {
			var self = this;
			self.activeLayout = "starter";
			self.loadingSituation = "initial";
			console.log('Shady')
		},
	    //Starting the crawling Action
		start_crawl : function(){
			var self = this;
			self.loadingSituation = 'process';
			self.activeLayout = 'crawling';
			self.crawlList = [];
			self.$http.post(self.ajaxHandler,{action: 'launchNabilCrawler'}).then(function(_ref) {                  
			    var data = _ref.data; 
			    self.validCrawlURL = data;
			    self.crawl_single_url();
			});
		},

	    //Crawl single URL		
		crawl_single_url : function(){
			var self = this;			
			if(self.validCrawlURL.length > 0 && self.validCrawlURL.length > self.processedUrls){
				var urlToProcess = self.validCrawlURL[self.processedUrls];
				self.$http.post(self.ajaxHandler,{action: 'singleUrlCrawler',singleURL : urlToProcess}).then(function(_ref) {                  
				    var data = _ref.data; 
				    self.crawlList.push(data);
				    var statObject = self.statsInfo.find(o => data.code.toString().startsWith(o.code));				    
				    statObject.number += 1;
					self.processedUrls +=1;					
					self.progress_update();
					self.crawl_single_url();
					if(self.validCrawlURL.length == self.processedUrls){
						self.crawl_store_history();
					}

				});
			}
		},

	    //Crawl Store History		
		crawl_store_history : function() {
			var self = this;
			self.crawlListHistory = self.crawlList;
			if(self.validCrawlURL.length > 0){
				self.$http.post(self.ajaxHandler,{action: 'finishStoreCrawlResult',crawlResultList : self.crawlList}).then(function(_ref) {                  
					var data = _ref.data; 
					self.loadingSituation = 'initial';
				});
			}

		},

		//Loading Progress Radial Process
		progress_init : function(){
			var progressPath = document.querySelector('.nbl-prgrs-circle path');
			var pathLength = progressPath.getTotalLength();
			progressPath.style.transition = progressPath.style.WebkitTransition ='none';
			progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
			progressPath.style.strokeDashoffset = pathLength;
			progressPath.getBoundingClientRect();
			progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 300ms linear';
		},
		progress_update : function(){
			var self = this;						
			self.percentValue = parseInt((self.processedUrls / self.validCrawlURL.length) * 100);
			var progressPath = document.querySelector('.nbl-prgrs-circle path');
			var pathLength = progressPath.getTotalLength();
			progressPath.style.strokeDashoffset =  pathLength - (pathLength * self.percentValue / 100);
		},

	    //View Crawl History		
		view_history : function(){
			var self = this;
			self.activeLayout = 'crawling';
			self.crawlList = self.crawlListHistory;
			self.history_stats();
			self.crawlStatusActive  = null
		},
	    //Setting the history crawl stats		
		history_stats : function(){
			var self = this;
			self.statsInfo.forEach( function(element, index) {
				element.number = 0;
			});
			self.crawlListHistory.forEach( function(element, index) {
				var statObject = self.statsInfo.find(o => element.code.toString().startsWith(o.code));				    
				statObject.number += 1;
			});
		},

		//Active Single Status
		activate_status : function(statusCode){
			var self = this;
			if(self.loadingSituation == 'initial')
				self.crawlStatusActive = (self.crawlStatusActive == statusCode) ? null : statusCode;
		}

	}
});