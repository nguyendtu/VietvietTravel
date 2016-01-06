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

	/*var tour = document.getElementById("tour-style");
	tour.onchange = function(e){
		var url = "index.php?r=tourtype/get-tour&tourtype="+ e.target.value;
		$.post(url, function(data){
			data = $.parseJSON(data);
			var detination = document.getElementById("tour-detination");
			detination.innerHTML = "";
			for(var i = 0; i < data.length; i++){
				var option = document.createElement("option");
				option.value = data[i].name;
				option.innerHTML = data[i].name;

				detination.appendChild(option);
			}
		})
	};*/

	$('.file-upload').each(function () {
		$(this).fileupload({
			dropZone: $(this)
		});
	});
});
