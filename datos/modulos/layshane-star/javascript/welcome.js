function Wo_ResendCode(){
	var e=$("#confirm-user-id").val(),
	n=$("#phone-num").val();
	$("#re-send").hide(),
	Wo_SetTimer(),
	$.post(Wo_Ajax_Requests_File()+"?f=resned_code",{user_id:e,phone_number:n},
		function(e){200==e.status||alert(e.errors)}
	)}

	function Wo_SetTimer(){
		$("#hideMsg h2 span").text("60"),
		$("#hideMsg").fadeIn("fast");
		var e=$("#hideMsg h2 span").text(),
		n=setInterval(function(){
			$("#hideMsg h2 span").text(--e),
			0==e&&$("#hideMsg").fadeOut("fast",function(){
				clearInterval(n),
				$("#re-send").fadeIn("fast")})
		},1e3)
	}

function addcl(){
   let parent = this.parentNode.parentNode;
   parent.classList.add("focus");
}

function remcl(){
   let parent = this.parentNode.parentNode;
   if(this.value == ""){
      parent.classList.remove("focus");
   }
}

function animateUsers(selector) {
  var elements = document.querySelectorAll(selector);
  elements.forEach(function(element) {
    element.classList.add("bounce");
    element.style.opacity = 1;
  });
}


$(document).trigger("#contnet");
$(document).on("#contnet", function() {
   cargaranimatiosn();
});

function cargaranimatiosn(){
	let inputs = document.querySelectorAll(".input");
   	inputs.forEach(input => {
      	input.addEventListener("focus", addcl);
      	input.addEventListener("blur", remcl);
   	});
   	var current_width = window.innerWidth;
	if (current_width > 920) {
	    setTimeout(function() {
	    	var input = document.getElementById("username");
	    	var inputb = document.getElementById("first_name");
	    	if (input) {
	    		input.focus();
	    	}else if(inputb){
	    		inputb.focus();
	    	}
		    animateUsers(".image-1");
		    animateUsers(".image-2");
		    animateUsers(".image-3");
		    animateUsers(".image-4");
		    animateUsers(".image-5");
		    animateUsers(".image-6");
		    animateUsers(".image-7");
		    animateUsers(".image-8");
		}, 500);
	}
}

const observer = new MutationObserver(function(mutationsList, observer) {
    cargaranimatiosn();
});

const targetNode = document.getElementById("contnet");
const config = { childList: true, subtree: true };
observer.observe(targetNode, config);
