function luissiderval(){
	document.getElementById("sidebar").classList.toggle("oppmens");
	document.getElementById("bod").classList.toggle("hoverfixt");
}

function sidebarfuncs(){
	document.getElementById("sidebar").classList.toggle("oppmens");
	document.getElementById("bod").classList.toggle("hoverfixt");
}

document.getElementById("optluisfunt").addEventListener("click", luissiderval);
document.getElementById("hoverlistv").addEventListener("click", luissiderval);
document.getElementById("optluisfunt").addEventListener("click", luissiderval);

$("#sidebar .sub-menu > a").click(function(e) {
  $("#sidebar ul ul").slideUp(), $(this).next().is(":visible") || $(this).next().slideDown(),
  e.stopPropagation()
})