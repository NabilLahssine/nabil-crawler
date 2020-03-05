# Whats is Nabil Crawler?
Nabil Crawler is a plugin that helps WordPress administrator monitor their website home page, by getting all the usefull information about all the internal pages that are linked to the home page. This plugin will allow administrators to have a full view about the SEO of their website so they can take actions to improve their rankings. You can find a small [Demo video here](https://youtu.be/8zk6Mbl_psg)  

## How does it work?
Nabil Crawler is a simple plugin with one setting page that can be accessed only by WordPress website administrators. Once accessed they will have the choice to run a new crawling action, or if their is a crawling history, they will have the choice to view the history.

Everytime the crawler is launched, the result history will be stored for one day and can be viewed by WordPress administrators, or by the website visitors from the front end using the shortcode ([nabilcrawler][/nabilcrawler])


## Technical Explanation?

The script is so easy to use and to understand, I have tried to make it simple and effecient as possible, by making it extensible and reusable not only for the home page but for any webpage (we may want to have a version 2 of the plugin that crawl other URLs so "always thinking ahead").

A - How does it work ?
Here is how I thought about the solution, the script is split to 2 parts. Once the administrator click on the crawl button an Ajax call is made, the first part is parsing the home page HTML and getting a list of valid links, all this links are returned via Ajax to the administrator setting page (By doing this I give the administrator the possibility to know the progression and to have a visual feedback of the crawling process, so he will not wait until the finish of all the process to get a result). After getting a list of all the URLS, I made Ajax calls for each URL to get the crawl information to be displayed on the setting page.

B - Technical process?
1- The script starts by getting the "Home Page URL" and setting the "Host Name", we will be using the host name to verify if the links are valid and are internal URLs. 


2- I use "file_get_contents" function to get the Home page HTML content, after that I use the "loadHTML" function of the "DOMDocument" class so I can load & parse the HTML, after parsing the HTML I use the function "getElementsByTagName" so I can get the list of all the HTML anchors <a> tag.

3- 	I loop over all the links in the home page and I check if the link is valid. All the valid links are then sent to the crawl setting page so we can give the administrator a visual feedback on the progression of the process.

4- Then I treat link by link to get all the necessary information, I start by parsing the URL to get the title and meta tags, Then I do a curl call to get information linke the status code, size and the total response time. Once the process is done I return the result to the administrator settings page.

5- After all the links are processed and done, I store all the result history in a WordPress option variable, and I launch a schedule event to remove the history from the option.

6- If the administrator access the settings page I start by checking if there is the crawl history avalaible so I give him the possibility to view the history without the need to relaunch the crawl from the start.


## Why I have chosen to do it this way?

- I beleive that a good plugin or any program tool needs always to display visual feedback to it's user. I could have chosen to launch the crawl once the administrator open the setting page, but this way is so bad because the administrator will have no feedback on the process of the crawl, and he must wait until the finish of crawling which can take minutes to be done.

My way will give the administrator feedback and he can get live information about the links without the need to wait until the end of the crawling action.

