/*iconbuttonupdatemarc*/
var coll = document.getElementsByClassName("botoneditar");
var i;
for(i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("activo");
    var content = this.nextElementSibling;
    if(content.style.maxHeight){
      content.style.maxHeight = null;
    }else{
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}

$(document).ready(function () {
  $('.iconbuttondeletemarc').click(function(){
    var id = $(this).attr('id');
    var dato = 'id='+id;
    $.ajax({
      type:"POST",
      url:list_urls()+list_action()+"eliminar_marca",
      data: dato,
      success: function(data){
      $('#'+id).addClass("eliminando");
      $('#'+id).slideUp(700);
    }
  });
  });
});