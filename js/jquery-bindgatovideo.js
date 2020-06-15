/*
This jQuery plugin binds three google analytics metric collecting events to the object. 

1- A metric is sent the first time the video starts.
2- Metrics are sent at 5% intervals as the user watches the video.
3- A metric is sent the first time the video ends.
4- A metric is sent when the video loops.

//example usage
<script>
jQuery("#vid").bindGAToVideo({
    eventCategory: 'Create Forever Videos', 
    debug: true //console messages will be logged when a metric is sent
});
</script>
*/

$.fn.bindGAToVideo = function( options ) {

    var settings = $.extend({
        eventCategory: 'Videos',
        debug: false
    }, options );

    return this.each(function() {
		var video = $(this);

		
    	
    	//handle video looping - remove loop attribute if it exists
    	var loop = video.attr("loop");
		if (typeof loop === 'undefined'){ loop = false; } else { loop = true; }
    	if( loop ){
    		video.removeAttr('loop');
    	}
    	

    	var currentSrc = video.get(0).currentSrc;
		var eventCategory = settings.eventCategory; //METRIC STRING
		var eventLabel = currentSrc.substring(currentSrc.indexOf('/')+1); //METRIC STRING
		var ended = false;
		var incrementedprogress = 0;
		var videostarted = false;
		

		//video ended START	
		video.on("ended", function (e) {

			//if metric has not already been sent
			if( !ended ){

				//prevent metric from being sent again
				ended = e.target.ended;

				//send metric
				var eventAction = 'Complete'; //METRIC STRING
				sendGA(eventCategory, eventAction, eventLabel)
			}
			
	    	//handle video looping
	    	if( loop ){

	    		//loop video
	    		video.get(0).play();

	    		//send metric
	    		var eventAction = 'Looped'; //METRIC STRING
				sendGA(eventCategory, eventAction, eventLabel)

	    	}
			

		});	
		//video ended END

		//video progress START
		video.on("timeupdate", function (e) {	
			
			var i;
			var timeplayed = 0;

			if(incrementedprogress != 100){

				for(i=0;i<e.target.played.length;i++){				
					timeplayed += (e.target.played.end(i) - e.target.played.start(i));
				}

				var actualprogress = (timeplayed/e.target.duration)*100;

				var isprogress = incrementedprogress/5 < Math.floor(actualprogress/5);

				//if video has progressed 5%
				if( (isprogress && !ended && loop) || (isprogress && !loop) ) {

					//increment progress
					incrementedprogress = Math.floor(actualprogress/5)*5;

					//send metric
					var eventAction = incrementedprogress+'%'; //METRIC STRING
					sendGA(eventCategory, eventAction, eventLabel)

				}

			}
			

		});	
		//video progress END

		//first play START
		video.on("play", function (e) {

			//if metric has not been sent
			if( !videostarted ){
				
				//prevent metric from being sent again
				videostarted = !e.target.paused;

				//send metric
				var eventAction = 'Start'; //METRIC STRING
				sendGA(eventCategory, eventAction, eventLabel)
			}
		});
		//first play END 

		//send metric
		function sendGA(eventCategory, eventAction, eventLabel){
			dataLayer.push({
				'event': "videoPlay",
			    'CFCategory': eventCategory,
			    'CFAction': eventAction,
			    'CFLabel': eventLabel
			});
			//ga('send', 'event', eventCategory, eventAction, eventLabel );
			if( settings.debug ){
				console.log("Datalayer Pushed: "+eventCategory+", "+eventAction+", "+eventLabel);
			}
		}

    }); 
};