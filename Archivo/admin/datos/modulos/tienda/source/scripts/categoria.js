document.getElementById('btn-modal').addEventListener('click', function() {
  document.getElementById('overlay_luis').classList.add('view_modal');
  document.getElementById('modal_luis_one').classList.add('view_modal');
});

document.getElementById('cerrar_modal').addEventListener('click', function() {
  document.getElementById('overlay_luis').classList.remove('view_modal');
  document.getElementById('modal_luis_one').classList.remove('view_modal');
});

document.getElementById('overlay_luis').addEventListener('click', function() {
  document.getElementById('overlay_luis').classList.remove('view_modal');
  document.getElementById('modal_luis_one').classList.remove('view_modal');
});


 var coll = document.getElementsByClassName("botoneditar");
  var i;
for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("activo");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}

$(document).ready(function () {
        $('.clend_cats').click(function(){
        let cont = $(this).attr("data-config");
        var cop = cont;
        $.ajax({
            type: "POST",
            url: list_urls()+list_action()+"eliminar_categoria",
            data: {id:cop},
            success: function(data) {
              console.log(data)
              $('#btd'+cont).addClass("eliminando");
                 $('#btd'+cont).slideUp(700);
            }
          });
        });
});
$(document).ready(function () {
        $('.clend_catsub').click(function(){ 
        let cont = $(this).attr("data-config");
        var cop = cont;
        $.ajax({
            type: "POST",
            url: list_urls()+list_action()+"eliminar_sub_categoria",
            data: {id:cop},
            success: function(data) {
              $('#btd'+cont).addClass("eliminando");
                 $('#btd'+cont).slideUp(700);
            }
          });
        });
}); 
  function readURL(input, imgControlName) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      $(imgControlName).attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("#imagen").change(function(e) {
  var nombreimagen = e.target.files[0].name;
  var imgControlName = "#vista_previa_imagen";
  readURL(this, imgControlName);
  $('.vista_previa_uno').addClass('luis');
  $('.vista_previa_uno').addClass('vista_previa_une');
  $('#imagen').attr('title', nombreimagen);
  $('.botoneliminar1').addClass('elimina_activo');
});
$("#eliminaimagen_uno").click(function(e) {
  e.preventDefault();
  $("#imagen").val("");
  $('.vista_previa_uno').removeClass('vista_previa_une');
  $("#vista_previa_imagen").removeAttr("src");
  $('#imagen').attr('title','Selecciona imagen');
  $('.vista_previa_uno').removeClass('luis');
  $('.botoneliminar1').removeClass('elimina_activo');
});