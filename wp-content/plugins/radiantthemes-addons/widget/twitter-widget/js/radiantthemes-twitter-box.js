jQuery(document).ready(function(){
	jQuery(".rt-twitter-box").each(function(){
		twitterFetcher.fetch({
			"profile": {
				"screenName": jQuery(this).data("twitter-box-username")
			},
			"domId": jQuery(this).attr("id"),
			"maxTweets": jQuery(this).data("twitter-box-maxtweets"),
			"enableLinks": jQuery(this).data("twitter-box-enablelinks"),
			"showUser": jQuery(this).data("twitter-box-showuser"),
			"showTime": jQuery(this).data("twitter-box-showtime"),
			"showImages": jQuery(this).data("twitter-box-showimages"),
			"lang": 'en',
		});
	});
});