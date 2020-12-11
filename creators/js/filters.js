function filterCat(obj){
	toggleTag(obj);	  
	registerCat(obj); 
}
function registerCat(obj){
	(function($, obj) {
		var inputVal = $(obj).data("slug");
		$("input#cat").val(inputVal);
		$("input#tags").val("");
		$("form#search-form").submit();
	})( jQuery, obj );
}
function clearCat(obj){
	(function($) {
		$("input#cat").val("");
		$("input#tags").val("");
		$("form#search-form").submit();
	})( jQuery );	
}



function filterTag(obj){
	toggleTag(obj);	  
	var zone = "";
	if( obj.closest(".modal") !== null ){
		zone = "modal";
	}
	registerTags(zone); 
}
function clearTags(obj){
	(function($) {
		$(".creator-tags .filter-option.active a .term").each(function(i,e){
			$(e.closest(".filter-option")).removeClass("active");
		});
		registerTags();
		$("form#search-form").submit();
	})( jQuery );
	
}
function registerTags(zone){
	(function($) {
		if(zone == "modal"){
			var tags = $(".creator-tags.is-modal .filter-option.active a .term");
		} else{
			console.log("zone is not modal");
			var tags = $(".creator-tags.is-not-modal .filter-option.active a .term");
		}
		var inputVal = "";
		var length = tags.length;
		tags.each(function(i,e){
			inputVal += $(e).data("slug");
			if (i !== (length - 1)) {
				inputVal += ",";
			}
		});
		$("input#tags").val(inputVal);
		$("form#search-form").submit();
	})( jQuery );
}
function toggleTag(obj){
	(function($, obj) {
		jQueryObj = $(obj.closest(".filter-option"));
		if(!jQueryObj.hasClass("active")){
			jQueryObj.addClass("active");
		} else {
			jQueryObj.removeClass("active");
		}
	})( jQuery, obj );
}
function clearSearch(){
	$("input#search").val("");
	$("form#search-form").submit();
}