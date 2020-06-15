<?php
/*
 Template Name: Page-MyFujifilmLegacy
*/


function page_myfujifilmlegacy_styles(){
	wp_enqueue_style('materialize', get_stylesheet_directory_uri().'/en-us/css/materialize-gridonly.css',array(),'1');
	wp_enqueue_style('myfujifilmlegacy', get_stylesheet_directory_uri().'/en-us/css/page-myfujifilmlegacy/myfujifilmlegacy.css',array(),'1.0.0');
	
}
function page_myfujifilmlegacy_scripts(){
	//wp_enqueue_script('uscommon', get_stylesheet_directory_uri().'/en-us/js/common.js', array(), '1.0.0', true); 
	//wp_enqueue_script('myfujifilmlegacy', get_stylesheet_directory_uri().'/en-us/js/page-myfujifilmlegacy/script.js', array(), '1.0.0', true); 
}

add_action( 'wp_enqueue_scripts', 'page_myfujifilmlegacy_styles' );
add_action( 'wp_enqueue_scripts', 'page_myfujifilmlegacy_scripts' );


get_header();

?>
<style>
	.box_related{display:none;}
</style>
<div class="main">
	<section class="xstoriespost__first lower__first">
		<div class="inner">
			<div class="xstoriespost__mainvisual" style="z-index:1;">
				<div class="xstoriespost__mainvisual_bg" style="background-image:url(https://250jtjcw4ft1z4tcc2rpahl1-wpengine.netdna-ssl.com/wp-content/uploads/sites/11/2018/09/Russel-Ord-DSCF0104-screen.jpg);"></div>
				<img src="https://250jtjcw4ft1z4tcc2rpahl1-wpengine.netdna-ssl.com/wp-content/uploads/sites/11/2018/09/Russel-Ord-DSCF0104-screen.jpg">
			</div>
		</div>
	</section>
	<div class="container">			
		<div class="row">
			<div class="col s12">
				<div class="jotform-container">
					<iframe
					  id="JotFormIFrame-91812310844351"
					  title="Fujifilm User-Generate Content Submission Request Form"
					  onload="window.parent.scrollTo(0,0)"
					  allowtransparency="true"
					  allowfullscreen="true"
					  allow="geolocation; microphone; camera"
					  src="https://form.jotformeu.com/91812310844351"
					  frameborder="0"
					  style="min-width:100%;width: 100%;max-width: 100%;height:539px;padding: 0;margin: 0;
					  border:none;"
					  scrolling="no"
					>
					</iframe>
					<script type="text/javascript">
						var ifr = document.getElementById("JotFormIFrame-91812310844351");
						if(window.location.href && window.location.href.indexOf("?") > -1) {
						var get = window.location.href.substr(window.location.href.indexOf("?") + 1);
						if(ifr && get.length > 0) {
						  var src = ifr.src;
						  src = src.indexOf("?") > -1 ? src + "&" + get : src  + "?" + get;
						  ifr.src = src;
						}
						}
						window.handleIFrameMessage = function(e) {
						if (typeof e.data === 'object') { return; }
						var args = e.data.split(":");
						if (args.length > 2) { iframe = document.getElementById("JotFormIFrame-" + args[(args.length - 1)]); } else { iframe = document.getElementById("JotFormIFrame"); }
						if (!iframe) { return; }
						switch (args[0]) {
						  case "scrollIntoView":
							iframe.scrollIntoView();
							break;
						  case "setHeight":
							iframe.style.height = args[1] + "px";
							break;
						  case "collapseErrorPage":
							if (iframe.clientHeight > window.innerHeight) {
							  iframe.style.height = window.innerHeight + "px";
							}
							break;
						  case "reloadPage":
							window.location.reload();
							break;
						  case "loadScript":
							var src = args[1];
							if (args.length > 3) {
								src = args[1] + ':' + args[2];
							}
							var script = document.createElement('script');
							script.src = src;
							script.type = 'text/javascript';
							document.body.appendChild(script);
							break;
						  case "exitFullscreen":
							if      (window.document.exitFullscreen)        window.document.exitFullscreen();
							else if (window.document.mozCancelFullScreen)   window.document.mozCancelFullScreen();
							else if (window.document.mozCancelFullscreen)   window.document.mozCancelFullScreen();
							else if (window.document.webkitExitFullscreen)  window.document.webkitExitFullscreen();
							else if (window.document.msExitFullscreen)      window.document.msExitFullscreen();
							break;
						}
						var isJotForm = (e.origin.indexOf("jotform") > -1) ? true : false;
						if(isJotForm && "contentWindow" in iframe && "postMessage" in iframe.contentWindow) {
						  var urls = {"docurl":encodeURIComponent(document.URL),"referrer":encodeURIComponent(document.referrer)};
						  iframe.contentWindow.postMessage(JSON.stringify({"type":"urls","value":urls}), "*");
						}
						};
						if (window.addEventListener) {
						window.addEventListener("message", handleIFrameMessage, false);
						} else if (window.attachEvent) {
						window.attachEvent("onmessage", handleIFrameMessage);
						}
					</script>
				</div>	
			</div>
		</div>
	</div>	
</div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
