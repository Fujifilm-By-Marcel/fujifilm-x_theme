function filterCat(obj){  
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
	toggleActive(obj);	  
	registerTags(); 
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
function registerTags(){
	(function($) {
		var tags = $(".creator-tags .filter-option.active a .term");
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
function toggleActive(obj){
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
	$("input.search-input").val("");
	$("form#search-form").submit();
}

function searchInputChange(e){
	if(e.value == ""){
		text = "SEARCH";
	} else {
		text = e.value;
	}
	e.parentNode.dataset.value = text;	
}

(function ($, document) {
	$(document).ready(function () {
		$(".input-sizer").each(function(){
			let dataValue = $(this).find("input").attr("placeholder");
			if($(this).find("input").attr("value")){
				dataValue = $(this).find("input").val();;
			}
			$(this).attr("data-value", dataValue);
		});
	});
}(jQuery, document));