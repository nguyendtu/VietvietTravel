$(document).ready(function(){
	$("#nav_search").click(function(e){
		$("#nav_search .active").removeClass("active");
		e.target.parentElement.setAttribute("class", "active");
		if(e.target.parentElement.dataset.target == "hotel"){
			$("#hotel").css("display", "block");
			$("#tour").css("display", "none");
		}else{
			$("#hotel").css("display", "none");
			$("#tour").css("display", "block");
		}
	});

	$("#menu").click(function(e){
		$("#menu .active").removeClass("active");
		e.target.parentElement.setAttribute("class", "active");

	})


	var info = null;
	var doc = null;
	$(".thumbnail .hover-tour").mouseover(function(){
		doc = $(this).find("img").parent().next();
		info = doc.next();
		var styles = {
			opacity: "1",
			top: "90px",
		};
		$(this).css("opacity", "0.4");
		doc.css("opacity", "1");
		info.css(styles);
	}).mouseout(function(){
		var styles = {
			opacity: "0",
			top: "150px",
		};
		$(this).css("opacity", "1");
		doc.css("opacity", "0");
		info.css(styles);
	});



	$('.file-upload').each(function () {
		$(this).fileupload({
			dropZone: $(this)
		});
	});

	if(document.getElementById("length_desc")){
		document.getElementById("length_desc").className += "";
	}
	if(document.getElementById("sort")){
		document.getElementById("sort").onchange = function(e){
			var sort = document.getElementById("length_desc");
			if(e.target.value == "Descending"){
				sort.setAttribute("class", "sr-only desc");
				sort.click();
			}else if(e.target.value = "Ascending"){
				sort.setAttribute("class", "sr-only asc");
				sort.click();
			}
		};
	}

	$("#pr-c").on("click", function(event){
		var target = event.target;

		if(target.value === "price-contact"){
			$('.form-group.field-tour-price').addClass("sr-only");
			$("#tour-price").val('-1');
			$('.form-group.field-hotel-price').addClass("sr-only");
			$("#hotel-price").val('-1');
		} else if(target.value === "price"){
			$('.form-group.field-tour-price').removeClass("sr-only");
			$("#tour-price").val('');
			$('.form-group.field-hotel-price').removeClass("sr-only");
			$("#hotel-price").val('');
		} else{
			$('.form-group.field-tour-price').addClass("sr-only");
			$("#tour-price").val('-2');
		}
	});

	$(window).scroll(function(){
		if(document.body.scrollTop > 50 || document.documentElement.scrollTop > 50){
			$('.go-top').addClass("show");
			$('.go-top').removeClass("hide");
		}else{
			$('.go-top').addClass("hide");
			$('.go-top').removeClass("show");
		}
	});
});

$(document).ready(function(){
	$("body").on("click", "button#tour-submit", function(){
		if($("#tour-keyword").val().length == 0){
			$("#tour-keyword").val($('#tour-id_tourtype option[value=' + $("#tour-id_tourtype").val() + ']').text());
		}
	});
	$("body").on("click", "button#hotel-submit", function(){
		if($("#hotel-keyword").val().length == 0){
			$("#hotel-keyword").val( 'Hotels in ' + $('#hotel-id_location option[value=' + $("#hotel-id_location").val() + ']').text());
		}
	});
});

window.onload=function () {
	var dropDown = $('.dropdown').find('.active').parents('.dropdown');
	dropDown.addClass('active');
};