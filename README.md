####Youshouldknow

**Abstract**

This is an app whose purpose is to consume Congressional Vote data provided by GovTrack.us, and parse it out in a variety of formats, including social media.

**How it works**
Periodically, a cron job kicks off a daemon that pulls in vote data from GovTrack. The data includes all roll-call, procedural, and a list of other types of votes. The daemon then hands the list of votes to a main controller. The main controller cleans any stale data from the list, and then queries GovTrack for the actual vote data.

Once the vote data is retrieved, the data is further broken down by state. Using the Twitter API, a status update is sent to a Twitter account that is unique to that state. Twitter specific Api credentials are stored in the DB.

Each of the status updates include a link to a site where more information about the vote can be found.

**Technology**
* Laravel 4
* PHP
* MySql
* HTML5, CSS3
* jQuery, Bootstrap, KnockoutJs

**Additional Packages**
* twitterouauth
    * https://github.com/abraham/twitteroauth
* lessphp
    * https://packagist.org/packages/leafo/lessphp

