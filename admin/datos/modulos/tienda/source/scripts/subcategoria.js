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
  let ibas = $(this).attr("data-ird");
  let imdf = $(this).attr("data-fl");
  $("#imagen").val("");
  $("#vista_previa_imagen").attr("src",ibas+"datos/imagenes/categoria/"+imdf);
  $('#imagen').attr('title','Selecciona imagen');
  $('.vista_previa_uno').removeClass('luis');
  $('.botoneliminar1').removeClass('elimina_activo');
});