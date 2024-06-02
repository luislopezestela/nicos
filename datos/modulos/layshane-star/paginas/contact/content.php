<style type="text/css">
.content-container{max-width:100%!important;}
.contenido_contacto {
    display: flex;
    justify-content: center;
    align-items: center;
}

.columna_uno {
    margin: 20px;
}

svg {
    width: 188px;
}


</style>

<style type="text/css">
.contactus {
  background-image: linear-gradient(to right, #007bff, #0056b3);
  padding: 20px 0;
  text-align: center;
  color: #fff;
  border-bottom: 2px solid #0056b3;
}

.container {
  max-width: 960px;
  margin: 0 auto;
}


h1{
  font-size:3rem;
  color:white;
  font-family: 'Merienda', cursive;
  animation-name:glow;
  animation-duration:1s;
  animation-iteration-count:infinite;
  animation-direction:alternate;
}

@keyframes glow{
  from{text-shadow:0px 0px 5px #fff,0px 0px 5px #614ad3;}
  to{text-shadow:0px 0px 20px #fff,0px 0px 20px #614ad3;}
}
/* Estilos para el contenedor principal */
.contenido_contacto {
    padding: 40px;
    max-width: 1150px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 20px;
}

/* Estilos para las columnas */
.columna_uno, .columna_dos {
    padding: 20px;
}

/* Estilos responsivos */

/* Para tablets en orientación vertical (menor o igual a 768px) */
@media (max-width: 768px) {
    .contenido_contacto {
        grid-template-columns: 1fr;
    }
}

/* Para dispositivos móviles en orientación horizontal (menor o igual a 576px) */
@media (max-width: 576px) {
    .contenido_contacto {
        padding: 20px; /* Reducimos el padding para pantallas muy pequeñas */
    }
    .columna_uno, .columna_dos {
        padding: 10px; /* Reducimos el padding de las columnas */
    }
}

/* Para dispositivos móviles en orientación vertical (menor o igual a 400px) */
@media (max-width: 400px) {
    .contenido_contacto {
        padding: 10px;
    }
    .columna_uno, .columna_dos {
        padding: 5px;
    }
}


.grupos_lb {
    margin-bottom: 20px;
}

.grupos_lb label {
    display: block;
    font-weight: bold;
    color: #333;
}

.grupos_lb input[type="text"],
.grupos_lb input[type="email"],
.grupos_lb textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: border-color 0.3s ease;
    outline:none;
}

.grupos_lb input[type="text"]:focus,
.grupos_lb input[type="email"]:focus,
.grupos_lb textarea:focus {
    border-color: #007bff;
}

.grupos_lb textarea {
    resize: vertical;
}

.terminos {
    margin-top: 20px;
}
.alert{margin-bottom:20px;}
/* Estilos para el grupo de checkboxes */
.terminos {
    margin-top: 20px;
    margin-bottom:20px;
}

.seleccionarCheck {
    display: flex;
    align-items: center;
}

.seleccionarCheck input[type="checkbox"] {
    display: none; /* Ocultamos el checkbox original */
}

.seleccionarCheck label {
    position: relative;
    padding-left: 30px;
    cursor: pointer;
    font-size: 16px;
    color: #333;
}
.seleccionarCheck label a{color:#007bff}
/* Estilo del icono */
.seleccionarCheck label::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 24px;
    height: 24px;
    border: 1px solid #ccc;
    background-color: #fff;
    border-radius: 3px;
    transition: background-color 0.3s, border-color 0.3s;
}

/* Estilo del icono cuando el checkbox está marcado */
.seleccionarCheck input[type="checkbox"]:checked + label::before {
    background-color: #007bff;
    border-color: #007bff;
}

/* Estilo del icono SVG */
.seleccionarCheck label svg {
    position: absolute;
    left: 3px;
    top: 3px;
    fill: #fff;
    width: 18px;
    height: 18px;
    opacity: 0;
    transition: opacity 0.3s;
}

/* Mostrar el icono SVG cuando el checkbox está marcado */
.seleccionarCheck input[type="checkbox"]:checked + label svg {
    opacity: 1;
}

/* Animación al hacer hover sobre el checkbox */
.seleccionarCheck input[type="checkbox"] + label::before {
    transition: background-color 0.3s, border-color 0.3s, transform 0.3s;
}

.seleccionarCheck input[type="checkbox"] + label:hover::before {
    transform: scale(1.1);
}


.contenido_boton{display:flex;justify-content:flex-end;align-items:center;flex-wrap:wrap;}
.boton_contacto {
    padding: 12px 24px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.boton_contacto{
    background-color: #007bff;
    color: #fff;
    border: none;
}

.boton_contacto:hover {
    background-color: #0056b3;
}
.boton_contacto:disabled{opacity:0.7}
.boton_contacto:disabled:hover{background-color: #007bff;}
.illustrations_image{width:100%;}
@keyframes moveRight {
            0% { transform: translateY(0); }
            100% { transform: translateY(10px); }
        }

        #_0532_sending_emails {
            animation: moveRight 1s linear infinite alternate;
        }
</style>
<style>.cls-1_sending-emails-93{fill:#020202;opacity:.1;}.cls-1_sending-emails-93,.cls-2_sending-emails-93,.cls-3_sending-emails-93,.cls-4_sending-emails-93,.cls-5_sending-emails-93,.cls-6_sending-emails-93,.cls-7_sending-emails-93,.cls-8_sending-emails-93,.cls-9_sending-emails-93,.cls-10_sending-emails-93,.cls-11_sending-emails-93,.cls-12_sending-emails-93,.cls-13_sending-emails-93,.cls-14_sending-emails-93,.cls-15_sending-emails-93,.cls-16_sending-emails-93,.cls-17_sending-emails-93,.cls-18_sending-emails-93,.cls-19_sending-emails-93,.cls-20_sending-emails-93{stroke-width:0px;}.cls-1_sending-emails-93,.cls-3_sending-emails-93{isolation:isolate;}.cls-2_sending-emails-93{fill:url(#linear-gradient);}.cls-3_sending-emails-93{opacity:.18;}.cls-3_sending-emails-93,.cls-20_sending-emails-93{fill:#68e1fd;}.cls-4_sending-emails-93{fill:url(#linear-gradient-11-sending-emails-93);}.cls-5_sending-emails-93{fill:url(#linear-gradient-12-sending-emails-93);}.cls-6_sending-emails-93{fill:url(#linear-gradient-13-sending-emails-93);}.cls-7_sending-emails-93{fill:url(#linear-gradient-10-sending-emails-93);}.cls-8_sending-emails-93{fill:url(#linear-gradient-4-sending-emails-93);}.cls-9_sending-emails-93{fill:url(#linear-gradient-2-sending-emails-93);}.cls-10_sending-emails-93{fill:url(#linear-gradient-3-sending-emails-93);}.cls-11_sending-emails-93{fill:url(#linear-gradient-8-sending-emails-93);}.cls-12_sending-emails-93{fill:url(#linear-gradient-9-sending-emails-93);}.cls-13_sending-emails-93{fill:url(#linear-gradient-7-sending-emails-93);}.cls-14_sending-emails-93{fill:url(#linear-gradient-5-sending-emails-93);}.cls-15_sending-emails-93{fill:url(#linear-gradient-6-sending-emails-93);}.cls-16_sending-emails-93{fill:#96625e;}.cls-17_sending-emails-93{fill:#231f20;}.cls-18_sending-emails-93{fill:#ffb192;}.cls-19_sending-emails-93{fill:#fff;}</style>
<div class="page-margin">
	<div class="wow_main_float_head contactus">
	  <div class="container">
	    <h1><?php echo $wo['lang']['contact_us']; ?>
	    </h1>
	  </div>
	</div>

	<div class="contenido_contacto">
		<div class="columna_uno">
			<svg id="_0532_sending_emails" viewBox="0 0 500 500" data-imageid="sending-emails-93" imageName="Sending Emails" class="illustrations_image"><defs><linearGradient id="linear-gradient-sending-emails-93" x1="396.2" y1="3017.51" x2="32.99" y2="3265.78" gradientTransform="translate(-51.59 3346.5) scale(1 -1)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#231f20"/><stop offset=".08" stop-color="#231f20" stop-opacity=".69"/><stop offset=".21" stop-color="#231f20" stop-opacity=".32"/><stop offset="1" stop-color="#231f20" stop-opacity="0"/></linearGradient><linearGradient id="linear-gradient-2-sending-emails-93" x1="316.17" y1="3119.8" x2="285.37" y2="2960.71" gradientTransform="translate(-31 3367.76) scale(1 -1)" xlink:href="#linear-gradient-sending-emails-93"/><linearGradient id="linear-gradient-3-sending-emails-93" x1="296.1" y1="3114.88" x2="405.67" y2="3026.56" gradientTransform="translate(-31 3367.76) scale(1 -1)" xlink:href="#linear-gradient-sending-emails-93"/><linearGradient id="linear-gradient-4-sending-emails-93" x1="291.8" y1="3054.2" x2="496.85" y2="3177.73" gradientTransform="translate(-31 3367.76) scale(1 -1)" xlink:href="#linear-gradient-sending-emails-93"/><linearGradient id="linear-gradient-5-sending-emails-93" x1="360.91" y1="3106.51" x2="432.33" y2="3010.25" gradientTransform="translate(-31 3367.76) scale(1 -1)" xlink:href="#linear-gradient-sending-emails-93"/><linearGradient id="linear-gradient-6-sending-emails-93" x1="299.58" y1="3114.93" x2="325.32" y2="3077.83" gradientTransform="translate(-31 3367.76) scale(1 -1)" xlink:href="#linear-gradient-sending-emails-93"/><linearGradient id="linear-gradient-7-sending-emails-93" x1="1490.57" y1="2815.31" x2="1495.72" y2="2729.39" gradientTransform="translate(-158.13 3422.9) rotate(-19.29) scale(1 -1)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fff"/><stop offset="1" stop-color="#fff" stop-opacity="0"/></linearGradient><linearGradient id="linear-gradient-8-sending-emails-93" x1="1459.93" y1="2800.91" x2="1575.58" y2="2655.51" gradientTransform="translate(-158.13 3422.89) rotate(-19.29) scale(1 -1)" xlink:href="#linear-gradient-sending-emails-93"/><linearGradient id="linear-gradient-9-sending-emails-93" x1="243.93" y1="3024.99" x2="94.05" y2="2925.06" xlink:href="#linear-gradient-sending-emails-93"/><linearGradient id="linear-gradient-10-sending-emails-93" x1="644.01" y1="3066.62" x2="652.6" y2="2923.18" gradientTransform="translate(-85.87 3362.96) rotate(-7.33) scale(1 -1)" xlink:href="#linear-gradient-7-sending-emails-93"/><linearGradient id="linear-gradient-11-sending-emails-93" x1="592.9" y1="3042.61" x2="785.99" y2="2799.86" gradientTransform="translate(-85.87 3362.95) rotate(-7.33) scale(1 -1)" xlink:href="#linear-gradient-sending-emails-93"/><linearGradient id="linear-gradient-12-sending-emails-93" x1="-1191.34" y1="2825.36" x2="-1186.2" y2="2739.46" gradientTransform="translate(95.01 3236.65) rotate(28.37) scale(1 -1)" xlink:href="#linear-gradient-7-sending-emails-93"/><linearGradient id="linear-gradient-13-sending-emails-93" x1="-1221.95" y1="2810.99" x2="-1106.31" y2="2665.61" gradientTransform="translate(95.01 3236.65) rotate(28.37) scale(1 -1)" xlink:href="#linear-gradient-sending-emails-93"/></defs><g id="background_sending-emails-93"><path class="cls-3_sending-emails-93 targetColor" d="M106.43,137.62c33.99-4.93,68.98-1.54,102.67-8.31,35.24-7.09,67.34-24.92,101.31-36.77,33.97-11.84,73.21-17.17,104.72.19,19.3,10.64,33.49,28.65,44.63,47.7,21.96,37.58,33.86,80.19,34.55,123.71.31,21.57-2.19,43.3-8.81,63.84-22.13,68.65-89.1,116.17-159.73,130.82-77.56,16.1-161.89-3.52-224.53-52C47.93,365.46-4.81,291.74,13.27,224.58c12-44.66,42.2-79.56,93.16-86.96Z" style="fill: rgb(104, 225, 253);"/></g><g id="arrow_sending-emails-93"><path class="cls-20_sending-emails-93 targetColor" d="M380.22,138.4l-43.22,61.59-8.31-23.05c-28.69,7.62-56.93,16.83-84.6,27.58-31.9,12.7-62.61,28.48-71.43,44.8-20.23,37.47,27.29,54.04,27.29,54.04-9.04.72-18.13.5-27.13-.65-23.7-3.11-53.13-14.59-44.61-53.38,6.73-30.65,50.57-56.43,93.65-74.79h.06c6.29-2.67,12.59-5.17,18.7-7.55l.18-.08c23.04-8.81,46.54-16.37,70.4-22.66l-4.14-20.16,73.16,14.32Z" style="fill: rgb(104, 225, 253);"/><path class="cls-2_sending-emails-93" d="M172.66,249.32c-20.23,37.47,27.29,54.04,27.29,54.04-9.04.72-18.13.5-27.13-.65-3.56-4.15-6.89-8.49-9.97-13-27.28-39.67,31.23-70.94,31.23-70.94,4.87-17.79,27.78-32.5,27.78-32.5v-11.73h.06l18.7-7.55.18-.08,4.12,34.39-.83,3.21c-31.9,12.73-62.61,28.51-71.43,44.82Z"/></g><g id="character_sending-emails-93"><path class="cls-18_sending-emails-93" d="M305.31,378.71c-1.15,1.96-1.87,4.15-2.09,6.41.04,2.26.77,4.46,2.1,6.29,2.73,4.05,6.92,6.9,11.69,7.94.62.19,1.3.16,1.9-.09.41-.25.74-.63.92-1.08,1.15-2.33.68-5.1-.08-7.55s-1.79-4.95-1.67-7.55c.19-4.87,7.15-14.27-.96-16.56-6.76-1.96-9.67,7.85-11.82,12.2Z"/><path class="cls-20_sending-emails-93 targetColor" d="M300.55,385.07s-2.39,1.96-1.94,4.13,9.05,17.26,21.3,15.53-7.87-13.85-7.87-13.85l-11.49-5.82Z" style="fill: rgb(104, 225, 253);"/><path class="cls-19_sending-emails-93" d="M304.25,379.49c1.04.04,1.89.83,2,1.86.65,2.92,2.76,5.3,5.59,6.29,3.2.87,6.12-1.8,7.55-1.04s5.46,11.27,4.41,14.26-6.02,2.92-10.42.87c-4.41-2.05-12.44-10.25-13.05-13.48s2.18-7.89,3.93-8.76Z"/><path class="cls-18_sending-emails-93" d="M253.37,396.12c-1.19,2.23-1.87,4.7-2.01,7.22.17,2.49,1.09,4.87,2.64,6.83,3.23,4.38,8.03,7.35,13.39,8.28.7.19,1.45.12,2.1-.19.44-.31.78-.75.98-1.26,1.16-2.64.49-5.7-.45-8.42s-2.2-5.4-2.25-8.27c0-5.41,7.26-16.22-1.85-18.38-7.62-1.8-10.38,9.25-12.55,14.17Z"/><path class="cls-20_sending-emails-93 targetColor" d="M248.38,403.51s-2.52,2.3-1.95,4.68,10.86,18.75,24.41,16.24c13.54-2.52-9.39-14.92-9.39-14.92l-13.07-6Z" style="fill: rgb(104, 225, 253);"/><path class="cls-19_sending-emails-93" d="M252.21,397.06c1.16-.01,2.16.84,2.33,1.99.86,3.21,3.32,5.74,6.51,6.68,3.6.81,6.73-2.28,8.32-1.52s6.62,12.27,5.56,15.63-6.56,3.54-11.55,1.47-14.32-10.8-15.1-14.36,2.04-8.84,3.94-9.89Z"/><path class="cls-17_sending-emails-93" d="M280.52,264.85c.34.06.68.15,1.01.26,7.96,3.02,17.53,16.49,22.95,22.88,7.04,8.1,12.89,17.15,17.4,26.89,9.14,20.4,9.98,45.75-2.86,64.06l-9.87-2.06c-.86-.1-1.67-.45-2.33-1.02-.68-1-.92-2.23-.67-3.41.52-7.05.2-14.14-.97-21.11-.65-4.78-2.12-9.41-4.33-13.69-3.1-5.58-7.98-9.89-12.74-14.12-15.1-13.38-28.65-27.21-36.14-46.13,6.76-3.32,21.26-13.82,28.55-12.54Z"/><path class="cls-17_sending-emails-93" d="M257.66,275.12c.33.13.63.3.92.5,7.04,4.78,13.22,20.14,16.99,27.59,4.95,9.52,8.53,19.69,10.65,30.21,4.12,21.96-.96,46.81-17.71,61.68l-9.13-4.32c-.81-.29-1.52-.82-2.03-1.52-.43-1.13-.37-2.39.15-3.49,2.15-6.73,3.49-13.7,3.98-20.76.48-4.8.14-9.64-1.02-14.32-1.7-6.13-5.45-11.47-9.09-16.7-11.52-16.51-21.51-33.14-24.38-53.28,7.34-1.66,23.89-8.48,30.66-5.59Z"/><path class="cls-19_sending-emails-93" d="M298.66,227.18c0,.05,0,.11,0,.16.11,2.1.81,3.95.26,6.09-.58,2.38-2.79,4.53-5.21,4.18-2.01-.29-3.39-2.1-4.93-3.42-1.62-1.3-3.42-2.36-5.34-3.15-2.52-1.17-5.11-2.27-7.7-3.27-1.66-.65-4.83-1.06-5.54-2.76s-.48-4.38-.68-6.18l-3.13-28.56,29.16,23.92c1.2,2.62,2.13,5.34,2.78,8.14.28,1.6.39,3.22.33,4.85Z"/><path class="cls-19_sending-emails-93" d="M277.01,230.32c.18,1.69.57,3.36.77,5.03,1.06,9.3-.09,19.16,3.69,27.98.86,1.96,1.96,4.05,1.46,6.14-.62,1.77-1.85,3.26-3.49,4.18-7.7,5.39-17.06,7.79-26.17,10.07-6.86,1.74-16.51,4.9-23.36,1.85-2.92-1.26-4.18-4.18-5.37-7.05-3.78-9.14-5.76-19.21-7.55-28.95-.23-1.26-.47-2.52-.68-3.84-1.49-8.79-2.65-17.65-3.49-26.58-.58-6.49-.84-13.54,2.86-18.88,4.91-7.12,15.31-12.59,23.4-15.1,2.62-.84,5.34-1.3,8.09-1.35,3.92.18,7.77,1.03,11.4,2.52,4.32,1.57,8.16,2.88,10.61,6.71,2.72,4.45,4.81,9.25,6.19,14.27,1.31,4.7,1.95,9.57,1.93,14.45,0,2.39-.33,4.81-.31,7.19-.04.45-.03.91.03,1.36Z"/><path class="cls-1_sending-emails-93" d="M244.79,287.22c-2.62,1.1-9.11-.7-11.22-.84-1.26-.08-2.52-.58-3.78-.73-6.29-.87-8.97-18.11-10.07-22.66-2.95-12.15-6.8-24.63-8.33-36.97-.58-4.77-.99-9.64.08-14.31s3.78-9.18,8.12-11.33c7.55-3.7,12.65,20.96,14.3,25.99,2.06,6.29,4.14,12.59,6.19,18.88.91,2.82,1.2,5.95,2.74,8.53,2.35,3.91,4.34,3.17,8.28,2.52,8.27-1.43,16-4.95,24.14-6.91.68-.25,1.43-.22,2.08.1.44.36.74.86.84,1.42.48,1.59.74,3.24.78,4.9.05.48-.02.95-.2,1.4-.28.45-.68.82-1.15,1.08-5.5,3.64-11.55,6.39-17.91,8.14-5.03,1.41-9.81,3.78-13.2,7.98-3.06,3.78.92,7.75-.74,11.84-.18.44-.52.78-.96.96Z"/><polygon class="cls-20_sending-emails-93 targetColor" points="239.05 268.2 287.31 251.92 322.7 272.11 273.45 292.3 239.05 268.2" style="fill: rgb(104, 225, 253);"/><polygon class="cls-9_sending-emails-93" points="239.05 268.2 287.31 251.92 322.7 272.11 273.45 292.3 239.05 268.2"/><polygon class="cls-20_sending-emails-93 targetColor" points="241.04 265.59 289.3 249.32 324.69 269.51 275.44 289.7 241.04 265.59" style="fill: rgb(104, 225, 253);"/><polygon class="cls-10_sending-emails-93" points="277.8 286.91 317.73 269.28 298.25 258.58 258.55 273.61 277.8 286.91"/><polygon class="cls-20_sending-emails-93 targetColor" points="275.44 289.7 323.03 289.7 364 264.18 324.69 269.51 275.44 289.7" style="fill: rgb(104, 225, 253);"/><path class="cls-18_sending-emails-93" d="M259.2,172.75c-.49,1.77-1.02,3.55-1.59,5.31-1.26,4.03-3.78,7.7-8.16,8.67-.97.19-1.95.3-2.93.35h-.65s-.06.01-.09,0h-.11c-.49-.02-.98.03-1.46.15-.13,0-.26.05-.38.11-1.26.58-1.16,2.62-1.07,3.78.31,1.3.16,2.67-.43,3.88,0,0,0,.08-.08.13-.7.77-1.69,1.22-2.73,1.26-2.17.18-4.33-.48-6.03-1.84-.97-.91-1.76-2-2.3-3.21-.17-.34-.31-.7-.43-1.07-.14-.62-.2-1.26-.16-1.9.02-.98.12-1.95.28-2.92.46-1.91.83-3.83,1.1-5.78.02-.98.08-1.97.2-2.95.16-.62.28-1.26.35-1.9,0-1.85-.94-3.64-.96-5.51-.02-1.85.16-3.71.52-5.53.67-3.61,2.24-6.99,4.57-9.83,4.32-5.03,11.97-7.55,17.99-4.68,3.01,1.43,5.34,3.98,6.51,7.1,2.01,5.3-.5,11.2-1.95,16.38Z"/><path class="cls-18_sending-emails-93" d="M252.93,263.62c1.06-.13,2.13-.24,3.18-.33.63-.09,1.27-.05,1.89.11.62.16,1.1.64,1.26,1.26,0,.23.04.46.14.67.16.19.39.31.63.34,3.78.98,7.68,2.52,9.93,5.63.55.6.74,1.44.5,2.22-.52,1.06-2.03.91-3.16.59.33.48.33,1.11,0,1.59-.34.46-.9.73-1.47.7-.37-.07-.76-.07-1.13,0-.26.12-.49.28-.7.47-1.07.71-2.39.94-3.64.65-1.26-.19-2.52-.62-3.78-.72-1.95-.15-3.7.49-5.51-.3-2-.99-4.11-1.73-6.29-2.19-.69-.11-1.33-.44-1.83-.94-.43-.86-.43-1.88,0-2.74.33-1.54.91-3.02,1.74-4.37,1.07-1.51,2.86-1.77,4.61-2.08,1.28-.21,2.43-.38,3.64-.55Z"/><path class="cls-19_sending-emails-93" d="M215.65,200.27c-9.25,15.32-18.39,33.07-21.02,50.91-.69,4.69-1.07,10.23,1.13,14.64,3.6,7.17,15.85,8.57,22.9,9.29,8.44.86,16.94.97,25.4.34.62.12,1.22-.29,1.34-.91.03-.15.03-.3,0-.45l.35-8.14c.06-.38,0-.77-.15-1.12-.45-.52-1.12-.8-1.8-.74-4.93-.39-9.77-1.52-14.37-3.34-4.37-1.74-12.9-6.29-12.28-12.03.34-3.22,3.88-7.15,5.63-9.69,4.2-6.1,8.74-12.02,13.37-17.81,0,0,.45-32.94-20.48-20.94Z"/><path class="cls-17_sending-emails-93" d="M257.75,165.35c1.27-.29,2.35-1.11,2.97-2.25.52,1.45,2.96,1.01,3.57-.42s0-3.03-.55-4.46c1.92-.45,3.11-2.38,2.66-4.3-.11-.48-.32-.93-.62-1.33-.42-.47-.99-.87-1.11-1.5-.03-.48.05-.96.21-1.41.16-1.5-.5-2.98-1.72-3.86-1.24-.85-2.62-1.48-4.08-1.84.81-1.32.51-3.03-.69-4-1.19-.91-2.64-1.43-4.14-1.49-2.18-.24-4.58-.14-6.29,1.26-2.4-1.49-5.52-1.16-7.55.81-.35.49-.84.86-1.41,1.06-.4.03-.81-.04-1.18-.2-1.59-.68-3.34-.86-5.03-.52-1.75.42-2.9,2.11-2.63,3.89-1.28.15-2.33,1.09-2.63,2.34-.03.38-.15.76-.35,1.08-.37.43-1.01.4-1.55.45-2.26.2-3.94,2.19-3.74,4.46.18,2.02,1.8,3.61,3.82,3.75-.24,1.02-.04,2.1.54,2.97.67,1.07,1.56,1.15,2.44,1.81.52.4.31.44.29,1.26-.03.75.01,1.51.11,2.25.17,1.44.53,2.85,1.07,4.19.38.97.86,1.9,1.2,2.88.47,1.5.78,3.05.93,4.62l2.13-6.02c.02-.08.02-.17,0-.25-.04-.11-.12-.21-.23-.26-1.91-1.49-2.53-4.11-1.49-6.29.29-.68.91-1.15,1.64-1.26.86,0,1.51.74,1.93,1.49.44.79.78,1.64.99,2.52.58-1.38,1.37-2.65,2.35-3.78.42-.47.92-1.26,1.59-1.02s.98,1.45,1.26,1.89c.99-.39,1.9-.97,2.66-1.71-.18,1.78.7,3.51,2.24,4.42,1.59.74,3.89-.31,3.89-2.08,0,.79,3.44-.54,3.69-.69.54,1.04,1.66,1.65,2.83,1.54Z"/><path class="cls-16_sending-emails-93" d="M241.15,187.15c1.01.13,2.04.18,3.06.13-.13,0-.26.05-.38.11-1.26.58-1.16,2.62-1.07,3.78.31,1.3.16,2.67-.43,3.88-.39,0-.78-.05-1.16-.16-.38-.14-.74-.35-1.04-.62-2.34-1.92-3.27-5.07-2.37-7.96,1.09.42,2.23.7,3.39.84Z"/><path class="cls-19_sending-emails-93" d="M291.03,210.5s23.05,17.01,19.86,33.99c-2.96,15.8-5.61,28.36-5.61,28.36l-10.79-6.29s7.21-23.8-7.84-34.15c-15.05-10.35,4.38-21.9,4.38-21.9Z"/><path class="cls-18_sending-emails-93" d="M292.58,266.31l-1.03,5.35c-.18.68-.21,1.39-.08,2.08.14.71.75,1.23,1.47,1.26.76,0,1.4-.83,2.15-.68.27.08.52.2.76.37,1.61.88,3.56,0,5.26-.79.27-.15.59-.21.89-.16.37.1.59.47.91.69.64.39,1.46.34,2.05-.13.57-.47,1-1.09,1.26-1.79,1.38-3.02,1.13-6.54-.67-9.34-1.97-2.43-5.1-3.6-8.18-3.05-3.27.52-4.2,3.08-4.8,6.19Z"/><polygon class="cls-20_sending-emails-93 targetColor" points="273.45 292.3 321.04 292.3 362.01 266.79 322.7 272.11 273.45 292.3" style="fill: rgb(104, 225, 253);"/><polygon class="cls-8_sending-emails-93" points="275.44 289.7 273.45 292.3 321.04 292.3 323.03 289.7 275.44 289.7"/><polygon class="cls-20_sending-emails-93 targetColor" points="364 264.18 362.01 266.79 321.04 292.3 323.03 289.7 364 264.18" style="fill: rgb(104, 225, 253);"/><polygon class="cls-14_sending-emails-93" points="364 264.18 362.01 266.79 321.04 292.3 323.03 289.7 364 264.18"/><polygon class="cls-19_sending-emails-93" points="325.17 270.64 357.72 266.1 323.77 286.91 286.73 287.56 325.17 270.64"/><polygon class="cls-15_sending-emails-93" points="269.71 267.82 288.14 260.99 279.25 254.49 260.35 260.99 269.71 267.82"/></g><g id="messages_sending-emails-93"><path class="cls-20_sending-emails-93 targetColor" d="M373.02,321.47l-38.69,28.64c-1.71,1.27-4.13.91-5.4-.81l-16.05-21.69c-.3-.4-.52-.87-.63-1.36-.38-1.51.18-3.11,1.43-4.04l38.71-28.64c.93-.68,2.11-.92,3.22-.64.87.22,1.64.73,2.18,1.45l16.05,21.7c1.26,1.71.9,4.12-.82,5.39,0,0,0,0,0,0Z" style="fill: rgb(104, 225, 253);"/><path class="cls-13_sending-emails-93" d="M355.62,292.93l-7.16,32.17-36.2,1.15c-.38-1.51.18-3.11,1.43-4.04l38.71-28.64c.93-.68,2.11-.92,3.22-.64Z"/><polygon class="cls-11_sending-emails-93" points="335.47 325.52 336.65 348.38 373.02 321.47 351.01 313.6 348.45 325.1 335.47 325.52"/><path class="cls-20_sending-emails-93 targetColor" d="M230.28,338.27l-73.12,33.38c-3.24,1.48-7.06.05-8.55-3.18l-18.7-40.98c-.36-.76-.55-1.59-.57-2.43-.1-2.61,1.39-5.03,3.78-6.1l73.12-33.38c1.75-.79,3.77-.76,5.5.08,1.35.65,2.42,1.75,3.05,3.11l18.68,41c1.47,3.23.05,7.05-3.18,8.52,0,0,0,0,0,0Z" style="fill: rgb(104, 225, 253);"/><path class="cls-12_sending-emails-93" d="M230.28,338.27l-73.12,33.38c-3.24,1.48-7.06.05-8.55-3.18l-18.7-40.98c-.36-.76-.55-1.59-.57-2.43-.1-2.61,1.39-5.03,3.78-6.1l73.12-33.38c1.75-.79,3.77-.76,5.5.08,1.35.65,2.42,1.75,3.05,3.11l18.68,41c1.47,3.23.05,7.05-3.18,8.52,0,0,0,0,0,0Z"/><path class="cls-20_sending-emails-93 targetColor" d="M233.66,336.8l-73.12,33.38c-3.24,1.48-7.06.05-8.55-3.18l-18.7-40.97c-.35-.76-.55-1.59-.58-2.43-.09-2.62,1.4-5.03,3.78-6.12l73.12-33.37c3.24-1.47,7.05-.05,8.55,3.17l18.7,41c1.47,3.23.04,7.05-3.19,8.52,0,0,0,0,0,0Z" style="fill: rgb(104, 225, 253);"/><path class="cls-7_sending-emails-93" d="M215.08,284.11l-22.83,50.07-59.54-10.65c-.09-2.62,1.4-5.03,3.78-6.12l73.12-33.37c1.74-.8,3.75-.77,5.48.06Z"/><polygon class="cls-4_sending-emails-93" points="170.9 330.35 164.92 368.1 233.66 336.73 200.42 316.27 192.25 334.18 170.9 330.35"/><path class="cls-20_sending-emails-93 targetColor" d="M390.21,257.07l-47.23-9.33c-2.09-.41-3.45-2.44-3.04-4.52,0,0,0,0,0,0l5.22-26.43c.09-.5.28-.97.57-1.38.86-1.31,2.43-1.97,3.96-1.66l47.23,9.33c1.13.21,2.11.93,2.64,1.95.43.79.57,1.7.4,2.58l-5.24,26.43c-.4,2.09-2.42,3.45-4.51,3.05,0,0-.01,0-.02,0Z" style="fill: rgb(104, 225, 253);"/><path class="cls-5_sending-emails-93" d="M399.57,224.99l-28.6,16.36-25.17-25.98c.86-1.31,2.43-1.97,3.96-1.66l47.23,9.33c1.11.23,2.06.95,2.58,1.95Z"/><polygon class="cls-6_sending-emails-93" points="361.92 232.02 345.82 248.3 390.21 257.07 381.19 235.5 370.97 241.35 361.92 232.02"/></g></svg>
		</div>
		<div class="columna_dos">
			<form class="contact-us-form form-horizontal" method="post">
				<div class="grupos_lb">
					<label for="first_name"><?php echo $wo['lang']['first_name']; ?></label>
					<input id="first_name" name="first_name" type="text" autocomplete="off">
				</div>
				<div class="grupos_lb">
					<label for="last_name"><?php echo $wo['lang']['last_name']; ?></label>
					<input id="last_name" name="last_name" type="text" autocomplete="off">
				</div>
				<div class="grupos_lb">
					<label for="email"><?php echo $wo['lang']['email']; ?></label>
					<input id="email" name="email" type="email" autocomplete="off">
				</div>
				<div class="grupos_lb">
					<label for="message"><?php echo $wo['lang']['message']; ?></label>
					<textarea name="message" id="message" rows="5" autocomplete="off"></textarea>
				</div>
				<?php if ($wo['config']['reCaptcha'] == 1 && !empty($wo['config']['reCaptchaKey'])) { ?>
					<div class="grupos_lb">
						<div class="g-recaptcha" data-sitekey="<?php echo $wo['config']['reCaptchaKey']?>"></div>
					</div>
				<?php } ?>

				<div class="terminos">
			    <div class="seleccionarCheck">
		        <input type="checkbox" id="accept_terms" name="accept_terms" onchange="activateButton(this)">
		        <label for="accept_terms">
	            <?php echo str_replace('{Privacidad}', '<a href="'.lui_SeoLink('index.php?link1=terms&type=privacy-policy').'">'.$wo['lang']['privacy_policy'].'</a>', $wo['lang']['terms_contact']);?>
	            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
	                <path fill="none" d="M0 0h24v24H0V0z"/>
	                <path d="M9 16.2l-2.5-2.5l-1.4 1.4L9 19l10-10l-1.4-1.4L9 16.2z"/>
	            </svg>
		        </label>
			    </div>
				</div>

				<div class="contact-us-alert setting-update-alert"></div>
				<div class="contenido_boton">
					<button class="boton_contacto  add_wow_loader" type="submit" name="send" id="send" disabled><?php echo $wo['lang']['send']; ?></button>
				</div>
			</form>
		</div>
	</div>


</div>
<!-- .page-margin -->
<script>
function activateButton(element) {
	if(element.checked) {
		document.getElementById("send").disabled = false;
	}
	else  {
		document.getElementById("send").disabled = true;
	}
};
$('.wow_main_blogs_bg').css('height', ($('.wow_main_float_head').height()) + 'px');
   $(function() {
     $('form.contact-us-form').ajaxForm({
       url: Wo_Ajax_Requests_File() + '?f=contact_us',
       beforeSend: function() {
		 $('form.contact-us-form').find('.add_wow_loader').addClass('btn-loading');
       },
       success: function(data) {
         if (data.status == 200) {
            $('.contact-us-alert').html('<div class="alert alert-success">' + data.message + '</div>');
            $('.alert-success').fadeIn(300);
         } else {
             var errors = data.errors.join("<br>");
             $('.contact-us-alert').html('<div class="alert alert-danger">' + errors + '</div>');
             $('.alert-danger').fadeIn(300);
         }
         $('form.contact-us-form').find('.add_wow_loader').removeClass('btn-loading');
       }
     });
   });
</script>