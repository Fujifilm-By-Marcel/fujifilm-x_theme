function filterCat(obj){  
	registerCat(obj); 
}
function registerCat(obj){
	var inputVal = $(obj).data("slug");
	$("input#cat").val(inputVal);
	$("input#tags").val("");
	$("form#search-form").submit();
}
function clearCat(obj){
	$("input#cat").val("");
	$("input#tags").val("");
	$("form#search-form").submit();
}



function filterTag(obj){
	toggleActive(obj);	  
	registerTags(); 
}
function clearTags(obj){
	$(".creator-tags .filter-option.active a .term").each(function(i,e){
		$(e.closest(".filter-option")).removeClass("active");
	});
	registerTags();
	$("form#search-form").submit();	
}
function registerTags(){
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
}
function toggleActive(obj){
	jQueryObj = $(obj.closest(".filter-option"));
	if(!jQueryObj.hasClass("active")){
		jQueryObj.addClass("active");
	} else {
		jQueryObj.removeClass("active");
	}
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

function toggleModal(e, event){
	let parent = $(e).closest('.filters');
	if (!parent.hasClass('active')){
		$('.filters').removeClass('active');
		parent.addClass("active");			
	} else {
		parent.removeClass('active');
	}
	if( !$(event.target).closest('.toggle-button').length && !$(event.target).is('.toggle-button') ){
		$('.filters').removeClass('active');
	}
}

function submitMobile(){
	(function ($, document) {
		
		var category = $('input:radio[name=category]:checked').val();
		if(category == "All"){ category = "" }
		
		$("#mobile-cat").val(category.toLowerCase());

		form = $("#mobile-search-form");
		var checkboxes = document.getElementsByName('tags[]');
		var tags = "";
		for (var i=0, n=checkboxes.length;i<n;i++) 
		{
		    if (checkboxes[i].checked) 
		    {
		        tags += ","+checkboxes[i].value;
		    }
		}
		if (tags) tags = tags.substring(1);
		$("#mobile-tags").val(tags.toLowerCase());	
		
		$('#mobile-search-form').submit();
		
	}(jQuery, document));
}


$(document).ready(function () {
	$(".input-sizer").each(function(){
		let dataValue = $(this).find("input").attr("placeholder");
		if($(this).find("input").attr("value")){
			dataValue = $(this).find("input").val();;
		}
		$(this).attr("data-value", dataValue);
	});

	//close filter modals on body click
	$('body').click(function (event){
		if(!$(event.target).closest('.toggle-button').length && 
		   !$(event.target).is('.toggle-button') && 
		   !$(event.target).closest('.filter-modal').length && 
		   !$(event.target).is('.filter-modal') ) {
			$('.filters').removeClass('active');
		}     
	});

	
});


