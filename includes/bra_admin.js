jQuery(document).ready(function($) {					
								
	
	var BRANKIC_VAR_PREFIX = $("meta[name=BRANKIC_VAR_PREFIX]").attr("content");
	
	$("#" + BRANKIC_VAR_PREFIX + "bg_image_show img").css("width", "400px");
	
	
	$("#page-featured-image-2").before("<p><a id='show_more_featured_images' href='#'>Show extra featured images</a></p>");
	
	$("#show_more_featured_images").click(function(){
		if ($("#show_more_featured_images").html() == "Show extra featured images") {
			$("[id^='page-featured-image-']").fadeIn("slow");
			$("#show_more_featured_images").html("Hide extra featured images");
		}
		else {
			$("[id^='page-featured-image-']").fadeOut("slow");
			$("#show_more_featured_images").html("Show extra featured images");
		}
		return false
	})
	
	
	if ($("[id^='page-featured-image-'] img").length > 0) {
	    $("[id^='page-featured-image-']").show();
		$("#show_more_featured_images").html("Hide extra featured images")
	} else {
		$("[id^='page-featured-image-'].postbox").hide();
		$("#show_more_featured_images").html("Show extra featured images")
	}


	$("#portfolio_item-featured-image-2").before("<p><a id='show_more_featured_images' href='#'>Show extra featured images</a></p>");
	
	$("#show_more_featured_images").click(function(){
		if ($("#show_more_featured_images").html() == "Show extra featured images") {
			$("[id^='portfolio_item-featured-image-']").fadeIn("slow");
			$("#show_more_featured_images").html("Hide extra featured images");
		}
		else {
			$("[id^='portfolio_item-featured-image-']").fadeOut("slow");
			$("#show_more_featured_images").html("Show extra featured images");
		}
		return false
	})
	
	
	if ($("[id^='portfolio_item-featured-image-'] img").length > 0) {
	    $("[id^='portfolio_item-featured-image-']").show();
		$("#show_more_featured_images").html("Hide extra featured images")
	} else {
		$("[id^='portfolio_item-featured-image-'].postbox").hide();
		$("#show_more_featured_images").html("Show extra featured images")
	}
	
	$("#post-featured-image-2").before("<p><a id='show_more_featured_images' href='#'>Show extra featured images</a></p>");
	
	$("#show_more_featured_images").click(function(){
		if ($("#show_more_featured_images").html() == "Show extra featured images") {
			$("[id^='post-featured-image-']").fadeIn("slow");
			$("#show_more_featured_images").html("Hide extra featured images");
		}
		else {
			$("[id^='post-featured-image-']").fadeOut("slow");
			$("#show_more_featured_images").html("Show extra featured images");
		}
		return false
	})
	
	
	if ($("[id^='post-featured-image-'] img").length > 0) {
	    $("[id^='post-featured-image-']").show();
		$("#show_more_featured_images").html("Hide extra featured images")
	} else {
		$("[id^='post-featured-image-'].postbox").hide();
		$("#show_more_featured_images").html("Show extra featured images")
	}
/*******************	
*   social widget
*******************/
	for (i = 2 ; i < 11 ; i++) {
		if ($(".header_social_icon_" + i + " input").attr("value") == "") {
			$(".header_social_icon_wrapper_" + i).hide();
		} else {
			$("#add_social_" + i).hide();
		}	
	}
	$('[id^="add_social_"]').click(function() {
		social_id = $(this).attr("id");
		social_id = social_id.substr(11);
		$(".header_social_icon_wrapper_" + social_id).show();
		$(this).hide();
	})
	
/*******************	
*   contact page options
*******************/
	for (i = 1 ; i <= 5 ; i++){
		field_id = "#" + BRANKIC_VAR_PREFIX + "field_" + i;
		//alert(field_id);
		
		$(".field_" + i + "_caption").hide();
		$(".field_" + i + "_required").hide();
		$(".field_" + i + "_select").hide();
		
		value = $(field_id).attr('value');
		
		if (value != "Nothing") {
			$(".field_" + i + "_caption").show();
			$(".field_" + i + "_required").show();
		}
		if (value == "select") $(".field_" + i + "_select").show();

	}

		
	field_id = "#" + BRANKIC_VAR_PREFIX + "field_1";
	//alert("select [id^='" + BRANKIC_VAR_PREFIX + "field_']")
	$("[id^='" + BRANKIC_VAR_PREFIX + "field_']").change(function()
	{
		value = $(this).attr('value');
		
		var input_id = $(this).attr("id")
		input_id = input_id.substr(input_id.length - 1);
		//alert(input_id)
	   
	   if (value == "select") {
		   $(".field_" + input_id + "_select").show();
		   $(".field_" + input_id + "_caption").show();
		   $(".field_" + input_id + "_required").show();
	   }
	   if (value == "text") {
		   $(".field_" + input_id + "_select").hide();
		   $(".field_" + input_id + "_caption").show();
		   $(".field_" + input_id + "_required").show();
	   }
	   if (value == "textarea") {
		   $(".field_" + input_id + "_select").hide();
		   $(".field_" + input_id + "_caption").show();
		   $(".field_" + input_id + "_required").show();
	   }
	   if (value == "Nothing") {
		   $(".field_" + input_id + "_select").hide();
		   $(".field_" + input_id + "_caption").hide();
		   $(".field_" + input_id + "_required").hide();
	   }	
	});

// 	NOTIFICATION SHOW/HID
	field_id = "#" + BRANKIC_VAR_PREFIX + "notification_what_to_show";
	value = $(field_id).attr('value');
	   if (value == "") {
		   $(".notification_html").hide();
		   $(".notification_twitter").hide();
	   }
	   if (value == "twitter") {
		   $(".notification_html").hide();
		   $(".notification_twitter").show();
	   }
	   if (value == "html") {
		   $(".notification_html").show();
		   $(".notification_twitter").hide();
	   }
	   if (value == "latest_post") {
		   $(".notification_html").hide();
		   $(".notification_twitter").hide();
	   }
	

	$(field_id).change(function()
	{
		value = $(this).attr('value');

	   
	   if (value == "") {
		   $(".notification_html").hide();
		   $(".notification_twitter").hide();
	   }
	   if (value == "twitter") {
		   $(".notification_html").hide();
		   $(".notification_twitter").show();
	   }
	   if (value == "html") {
		   $(".notification_html").show();
		   $(".notification_twitter").hide();
	   }
	   if (value == "latest_post") {
		   $(".notification_html").hide();
		   $(".notification_twitter").slideUp();
	   }	
	});
});