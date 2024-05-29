<style type="text/css">
header{display:none;}
footer{display:none;}

.content-container{margin:0;}
.contenido_pos {
    display: grid;
    grid-template-areas:
        "header "
        "main"
        "footer";
    grid-template-rows: auto 1fr auto;
    grid-template-columns: 1fr;
    height: 100vh;
}

.header_pos {
    grid-area: header;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #f8f9fa;
    padding: 10px 20px;
}

.body_pos {
    grid-area: main;
    display: grid;
    grid-template-columns: 1fr 400px; /* Ancho del contenido principal y el sidebar */
    gap: 20px; /* Espacio entre el contenido principal y el sidebar */
    background-color: #e9ecef;
    padding: 10px;
    overflow: hidden;
}

.main_wrapper_pos {
    overflow-y: auto; /* Permite el scroll vertical */
    border-radius:8px;
    display:flex;
    gap:1rem;
    flex-direction:column;
}

.sidebar_pos {
    background-color: #e9ecef;
    overflow-y: auto; /* Permite el scroll vertical */
}

.footer_pos {
    grid-area: footer;
    background-color: #f8f9fa;
    padding: 10px;
    text-align: center;
    display:flex;
    justify-content: space-between;
}

.logo_pos_pagina {
    cursor: default;
    font-size: 1.5em;
    color: #333;
    font-weight: bold;
    position: relative;
    display: inline-block;
    overflow: hidden;
    white-space: nowrap;
    user-select: none;
    animation: float 3s ease-in-out infinite; /* Animación de levitación */
}

.menu_pos_layshane span {
    margin-left: 20px;
    text-decoration: none;
    color: #007bff;
    cursor: pointer;
}



@keyframes float {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-2px); /* Ajusta este valor según la altura del efecto flotante */
    }
}

.logo_pos_pagina::before,
.logo_pos_pagina::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.5), transparent);
    transform: translate(-50%, -50%) rotate(45deg);
    animation: shine 2s infinite;
}

@keyframes shine {
    0% {
        left: -100%;
    }
    50% {
        left: 50%;
    }
    100% {
        left: 200%;
    }
}

.logo_pos_pagina span {
    display: inline-block;
    animation: colorChange 2s infinite;
}

@keyframes colorChange {
    0%, 100% {
        color: #333;
    }
    50% {
        color: #1e90ff; /* Celeste */
    }
}

.logo_pos_pagina span:nth-child(1) { animation-delay: 0s; }
.logo_pos_pagina span:nth-child(2) { animation-delay: 0.1s; }
.logo_pos_pagina span:nth-child(3) { animation-delay: 0.2s; }
.logo_pos_pagina span:nth-child(4) { animation-delay: 0.3s; }
.logo_pos_pagina span:nth-child(5) { animation-delay: 0.4s; }
.logo_pos_pagina span:nth-child(6) { animation-delay: 0.5s; }
.logo_pos_pagina span:nth-child(7) { animation-delay: 0.6s; }
.logo_pos_pagina span:nth-child(8) { animation-delay: 0.7s; }
.logo_pos_pagina span:nth-child(9) { animation-delay: 0.8s; }
.logo_pos_pagina span:nth-child(10) { animation-delay: 0.9s; }
.logo_pos_pagina span:nth-child(11) { animation-delay: 1s; }

.logo_pos_pagina:hover span {
    animation: colorChangeHover 2s infinite;
}

@keyframes colorChangeHover {
    0%, 100% {
        color: #888;
    }
    50% {
        color: #1e90ff; /* Celeste */
    }
}
.menu_pos_layshane{display:flex;align-items:center;gap:1rem}
.reloj-digital {
    font-family: 'VT323', monospace; /* Fuente de estilo LCD */
    font-size: 15px;
    color: #00ff00; /* Color típico de LCD verde */
    background-color: #000;
    padding: 5px 10px;
    border-radius: 8px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}
.vendedor_pos{border-radius:7px;border:1px solid #ccc;padding:10px;text-decoration:none!important;color:#555!important;display:inline-flex;user-select:none;justify-content:center;align-items:center;}

.sidebar_pos_content {
    background: #fff;
    width: 100%;
    height: 100%;
    border-radius: 8px;
    padding: 20px;
    display: flex;
    flex-direction: column; /* Cambia el flujo a columnas */
}
.header_body_pos {
    background: #fff;
    border-radius: 8px;
    padding: 15px;
    display: flex; /* Cambiamos de grid a flex */
    justify-content: flex-start; /* Alineamos los elementos a la izquierda */
    align-items: center;
    position: sticky;
    top:0;
    gap: 1rem;
    width:100%;
    z-index:1;
    border-bottom: 1px solid #0aa3e93b;
}

.contain_input_head_post {
    display: flex;
    flex-direction: column; /* Colocamos los inputs uno encima del otro */
    flex-grow: 1; /* Para que ocupen todo el espacio disponible */
}

.contain_input_head_post .input_search,
.contain_input_head_post .input_barcode {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
}
.input_container {
    position: relative;
    display:flex;
    align-items:center;
}

.input_search,
.input_barcode {
    padding-right: 40px!important; /* Ajusta el espacio a la derecha del input para el botón */
    box-sizing: border-box; /* Incluye el padding en el ancho total del input */
}

.search_button,
.barcode_button {
    position: absolute;
    right: 0;
    top: 0;
    width: 40px; /* Ancho del botón */
    height: 100%; /* Altura del botón */
    background: transparent;
    border: none;
    cursor: pointer;
}

.main_pos{border-radius:8px;}
.sidebar_pos_header{display:flex;justify-content:space-between;border-bottom:2px #999 solid;margin-bottom:20px;padding-bottom:15px;}
.comprobantes_contain{display:grid;width:100%;gap:1rem;grid-template-columns: repeat(3, auto);margin:10px auto;position:relative;}
.comprobant_list{display:inline-block;position:relative;}
.comprobant_list .comprobant_list_label{padding:16px;text-align:center;border-radius:6px;background-color:#e9ecef;cursor:pointer;transition:all .2s;user-select:none;display:block;}
.comprobant_list .comprobant_list_label:hover{background:#0080ff;color:#FAFAFA;}
.comprobant_list input{display:none;}
.comprobant_list .comprobant_list_label:active,.comprobant_list input:checked ~ .comprobant_list_label{background:#0853bc;color:#FAFAFA;}
.documents_number_contain{display:flex;width:100%;gap:0.5em;}
.documents_number_contain .input_docss{padding:10px;border:2px solid #2470da;border-radius:6px;box-shadow:0px 0px 0px 2px transparent;outline:none;transition:all .2s;}
.documents_number_contain .input_docss:disabled{border:2px solid #2e60a6;border-radius:6px;box-shadow:0px 0px 0px 2px #87b9ffd9;opacity:1;}
.documents_number_contain .input_docs{padding:10px;display:block;width:100%;border:2px solid #2470da;border-radius:6px;box-shadow:0px 0px 0px 2px transparent;outline:none;transition:all .2s;}
.documents_number_contain .input_docs:focus{border:2px solid #2e60a6;border-radius:6px;box-shadow:0px 0px 0px 2px #87b9ffd9;}
.productos_agregados_en_venta {
    flex-grow: 1; /* El div ocupará el espacio restante */
    overflow-y: auto; /* Agrega el scroll si es necesario */
    padding-top: 15px;
    border-radius:5px;
    display: flex;
    flex-direction: column;
}
/* Media query para pantallas pequeñas */
@media (max-width: 768px) {
	
    .body_pos {
        display: block;
        overflow: auto;
        height: 100%;
    }
    .main_wrapper_pos {
        overflow: auto;
    }

    .sidebar_pos {
        overflow: auto;
        margin-top: 20px; /* Espacio entre el contenido principal y el sidebar */
    }

    .header, .footer {
        flex: 0 0 auto;
    }

    .content, .sidebar {
        flex: 1 0 auto;
        overflow-y: auto;
    }

    .sidebar {
        order: 3;
    }

    .content {
        order: 2;
    }
}

/* Media query para pantallas muy pequeñas (como teléfonos móviles) */
@media (max-width: 480px) {
    .menu_pos_layshane span {
        margin-left: 0;
    }
}
.contain_selec_barcode {
  --UnChacked-color: hsl(0, 0%, 10%);
  --chacked-color: hsl(216, 100%, 60%);
  --font-color: white;
  --chacked-font-color: var(--font-color);
  --icon-size: 1.4em;
  --anim-time: 0.2s;
  --base-radius: 0.2em;
}
.contain_selec_barcode {
  display: inline-block;
  align-items: center;
  position: relative;
  cursor: pointer;
  font-size: 20px;
  user-select: none;
  fill: var(--font-color);
  color: var(--font-color);
}
.contain_selec_barcode input {
  display: none;
}
.checkmark {
  background: var(--UnChacked-color);
  border-radius: var(--base-radius);
  display: flex;
  padding: 2px 5px;
}
.icon {display:block;
  height: auto;
  width:var(--icon-size);
  filter: drop-shadow(0px 2px var(--base-radius) rgba(0, 0, 0, 0.25));
}
.Yes {
  display:none;
}
.checkmark::before {
  content: "";
  opacity: 0.5;
  border-radius: var(--base-radius);
  position: absolute;
  box-sizing: border-box;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
}
.contain_selec_barcode input:checked + .checkmark {
  --UnChacked-color: var(--chacked-color);
  fill: var(--chacked-font-color);
  color: var(--chacked-font-color);
}
.contain_selec_barcode input:checked ~ .checkmark .No {
  display:none;
}

.contain_selec_barcode input:checked ~ .checkmark .Yes {
  display:block;
}
.contain_selec_barcode,
.checkmark,
.checkmark:after,
.icon{
  transition: all var(--anim-time);
}
</style>

<style type="text/css">
	.carousel {
	padding:10px;
    position: relative;
    background:#fff;
    border-radius:8px;
    margin-bottom:20px;
}

.carousel h2 {
    margin: 0;
}

.carousel span {
    text-decoration: none;
    color: #fff;
    cursor: pointer;
}

.carousel .carousel__wrapper .carousel__content .carousel__item span figure {
    aspect-ratio: 1/1;
    width: 100%;
    height: 100%;
    position: relative;
    object-fit: contain;
    background-size: contain;
    background-position: center center;
    background-repeat: no-repeat;
    -webkit-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
    margin: auto;
    max-width: 100%;
    max-height: 100%;
    border-radius: clamp(0px, ((100vw - 4px) - 100%) * 9999, 4px);
}

.carousel h3 {
    font-size: 16px;
    width: 100%;
    display: flex;
    justify-content: center;
    background: linear-gradient(180deg, rgb(0 0 0 / 0%) 0%, rgb(0 0 0 / 39%) 35%, rgb(0 0 0 / 57%) 75%, rgb(0 0 0 / 63%) 100%);
    align-items: flex-end;
    padding: 10px 3px;
    padding-bottom: 20px;
    height: 100%;
    margin: 0;
    text-align: center;
}

.carousel .dragging span {
    user-select: none;
}

.carousel .carousel__wrapper {
    position: relative;
}

@media only screen and (min-width: 1180px) {
    .carousel .carousel__wrapper.has-arrows .carousel__arrows {
        display:flex;
    }
}

.carousel .carousel__header {
    display: grid;
    grid-auto-flow: column;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
}

.carousel .carousel__content {
    overflow-y: hidden;
    overflow-x: scroll;
    scrollbar-width: none;
    -ms-overflow-style: none;
    display: flex;
    -webkit-overflow-scrolling: touch;
    cursor: grab;
    grid-gap: 24px;
    list-style: none;
    padding: 20px 10px;
    padding-left: 15px;
    margin: auto;
    background: #b8c4d6;
}

.carousel .carousel__content::-webkit-scrollbar {
    display: none;
}

.carousel .carousel__item {
    aspect-ratio: 1/1;
    flex: 0 0 auto;
    display: inline-flex;
    width: calc(100% / 7 - 1.31rem);
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.123);
    border-radius: 10px;
    background: rgb(245, 245, 245);
    overflow: hidden;
    position: relative;
    margin: 0px;
}
.carousel .carousel__item.active:before{
	display:flex;
	justify-content:center;
	align-items:center;
	content: ' Seleccionado';
	font-size:12px;
	width:100%;
	height:20px;
	width:calc(100% - 20px);
	margin:0 auto;
	border-radius:0 0 5px 5px;
	color:#fff;
	text-align:center;
	background:#0853bc;

}
@media only screen and (max-width: 1500px) {
    .carousel .carousel__item {
        width:calc(100% / 5 - 1.31rem);
    }
}

@media only screen and (max-width: 1200px) {
    .carousel .carousel__item {
        width:calc(100% / 4 - 1.03rem)
    }
}
@media only screen and (max-width: 1080px) {
    .carousel .carousel__item {
        width:calc(100% / 3 - 1.03rem)
    }
}
@media only screen and (max-width: 910px) {
	.carousel .carousel__content {
        grid-gap:11px;
    }
    .carousel .carousel__item {
        width:calc(100% / 2 - 3.5rem);
    }
}
@media only screen and (max-width: 850px) {
	.carousel .carousel__content {
        grid-gap:11px;
    }
    .carousel .carousel__item {
        width:calc(100% / 1 - 10rem);
    }
}
@media only screen and (max-width: 800px) {
	.carousel .carousel__content {
        grid-gap:11px;
    }
    .carousel .carousel__item {
        width:calc(100% / 1 - 8rem);
    }
}
@media only screen and (max-width: 768px) {
    .carousel .carousel__item {
        width:calc(100% / 4 - 1.03rem);
    }
}
@media only screen and (max-width: 620px) {
    .carousel .carousel__item {
        width:calc(100% / 3 - 1.03rem)
    }
}

@media only screen and (max-width: 470px) {
    .carousel .carousel__content {
        grid-gap:11px;
    }
    .carousel .carousel__item {
        width: calc(100% / 2 - 3.5rem)
    }
}
@media only screen and (max-width: 425px) {
    .carousel .carousel__content {
        grid-gap:11px;
    }
    .carousel .carousel__item {
        width: calc(100% / 2 - 1.5rem)
    }
}

@media only screen and (max-width: 390px) {
    .carousel .carousel__item {
        width: calc(100% / 1 - 10rem)
    }
}

@media only screen and (max-width: 330px) {
    .carousel .carousel__item {
        width: calc(100% / 1 - 6rem)
    }
}

@media only screen and (max-width: 290px) {
    .carousel .carousel__item {
        width: calc(100% / 1 - 4rem)
    }
}

.carousel .carousel__item .carousel__description {
    width: 100%;
    position: absolute;
    bottom: 0;
    display: flex;
    top: 50%;
    left: 0;
}

.carousel .carousel__item span {
    position: absolute;
    user-select: none;
    width: 100%;
    height: 100%;
    max-width: 100%;
    max-height: 100%;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin: 0;
    flex-wrap: wrap;
    cursor: pointer;
    padding:10px;
    justify-content: center;
    align-items: center;
}

.carousel .carousel__controls {
    display: grid;
    grid-auto-flow: column;
    grid-gap: 24px;
}

.carousel .carousel__arrow {
    padding: 0;
    background: transparent;
    box-shadow: none;
    border: 0;
}

.carousel .carousel__arrow:before {
    content: "";
    background: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNSIgaGVpZ2h0PSI5IiB2aWV3Qm94PSIwIDAgMTUgOSI+Cgk8cGF0aCBmaWxsPSIjMzMzMzMzIiBkPSJNNy44NjcgOC41NzRsLTcuMjItNy4yMi43MDctLjcwOEw3Ljg2NyA3LjE2IDE0LjA1Ljk4bC43MDYuNzA3Ii8+Cjwvc3ZnPgo=");
    background-size: contain;
    filter: brightness(0);
    display: block;
    width: 18px;
    height: 12px;
    cursor: pointer;
}

.carousel .carousel__arrow.arrow-prev:before {
    transform: rotate(90deg);
}

.carousel .carousel__arrow.arrow-next:before {
    transform: rotate(-90deg);
}

.carousel .carousel__arrow.disabled::before {
    filter: brightness(3);
}

.load-produts .load-more button {
    width: auto
}

.text_category span {
    font-family: sans-serif;
    padding-top: 10px;
}

.carousel__content {
    overflow: auto!important;
    -webkit-overflow-scrolling: touch!important;
    overscroll-behavior: none!important;
    overscroll-behavior-x: none!important;
}
@media (max-width: 1050px) {
    .carousel .carousel__header {
        padding:10px;
    }

}
.web_order_type{background:#049e68;color:#fff;padding:8px;border-radius:8px;user-select:none;display:flex;justify-content:center;align-items:center;}
</style>
<style type="text/css">
.contenido_prod_pos_list{
	display: grid;
    gap: 15px; /* Reducir el espacio entre las tarjetas */
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
	font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
	position:relative;
}
.producto_pos_list{
	background-color: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    padding: 15px; /* Reducir el padding dentro de cada tarjeta */
    text-align: left;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s, box-shadow 0.2s;
    user-select:none;
    cursor:pointer;
}
.producto_pos_list:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}
.producto_pos_list img {
    max-width: 100%;
    height: auto;
    border-radius: 10px 10px 0 0;
    margin-bottom: 10px;
}
.producto_pos_list h2 {
    margin: 10px 0;
    font-size: 1.4em;
    color: #333;
    font-weight: 600;
}
.producto_pos_list p {
    margin: 5px 0;
    color: #666;
    font-size: 0.9em;
}

.product p.color, .product p.model, .product p.sku {
    font-style: italic;
    color: #555;
}

.product p.price {
    margin-top: 10px;
    font-size: 1.2em;
    color: #000;
    font-weight: 700;
}

.product p.stock {
    margin-top: 5px;
    font-size: 0.9em;
    color: #000;
    font-weight: 500;
}
</style>
<style type="text/css">
.active_atr_pos_item{
	transform:initial!important;
}
.active_atr_pos_item .hover_lik_atr_pos{
	position:fixed;
	background:rgba(0, 0, 0, 0.36);
	top:0;
	bottom:0;
	left:0;
	right:0;
	z-index: 1;
}
.menu_atributos_productos {
    background: #FAFAFA;
    position: fixed;
    top: 0;
    left: -100%;
    width: 0%;
    max-width: 450px;
    height: 100%;
    z-index: 10000;
    transition: left 0.3s ease;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding-bottom:60px;
}

.menu_atributos_productos.active_atr_pos {
    left: 0;
    width: 100%;
    max-width: 450px;
}

.menu_header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
    background: #fff;
    border-bottom: 1px solid #ddd;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.menu_header h2 {
    margin: 0;
    font-size: 1.5em;
}

.close_button {
    background: none;
    border: none;
    font-size: 1.5em;
    cursor: pointer;
    color: #333;
}

.contenido_opciones_atriburts {
    padding: 20px;
    border-bottom: 1px solid #ddd;
}

.menu_atributos_productos span {
    font-size: 1.2em;
    display: block;
    margin-bottom: 10px;
    margin-top: 15px;
    color: #333;
    font-weight: bold;
    padding:0 20px;
}

.lista_de_opciones_de_atributes_pos {
    display: flex;
    align-items: center;
}

.contenido_opciones_atriburts input.seleccted_atributes_s {
    display: none;
}

.contenido_opciones_atriburts label {
    font-size: 1em;
    cursor: pointer;
    position: relative;
    line-height: 24px;
    display: block;
    background: #f7f7f7;
    padding: 10px 15px;
    padding-left: 35px;
    border-radius: 25px;
    transition: background 0.3s ease;
    margin-bottom: 10px;
    width:100%;
}

.contenido_opciones_atriburts label:hover {
    background: #e6e6e6;
}

.contenido_opciones_atriburts label::before {
    content: '';
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    border: 2px solid #ddd;
    border-radius: 50%;
    background: #fff;
    transition: all 0.3s ease;
}

.contenido_opciones_atriburts input.seleccted_atributes_s:checked + label::before {
    border-color: #8cc4ff;
    background: #0b5cb4;
    box-shadow: 0 0 0 4px rgba(0, 123, 255, 0.2);
}

.contenido_opciones_atriburts label::after {
    content: '';
    position: absolute;
    left: 17px;
    top: 50%;
    transform: translateY(-50%) rotate(45deg);
    width: 6px;
    height: 12px;
    border: solid #fff;
    border-width: 0 2px 2px 0;
    opacity: 0;
    transition: all 0.3s ease;
}

.contenido_opciones_atriburts input.seleccted_atributes_s:checked + label::after {
    opacity: 1;
}

.contenido_opciones_atriburts input.seleccted_atributes_s:checked + label {
    background: #007BFF;
    color: #fff;
}

@media screen and (max-width: 768px) {
    .menu_atributos_productos {
        width: 100%;
        max-width: none;
    }
}

.footer_pos_item_atribute {
    position:fixed;
    bottom:0;
    width:100%;
    max-width:450px;
    padding: 10px;
    background-color: #f9f9f9;
    border-top: 1px solid #ccc;
}

.footer_pos_item_atribute .agregar_button {
    display: block;
    width: 100%;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.footer_pos_item_atribute .agregar_button:hover {
    background-color: #0056b3;
}

.footer_pos_item_atribute .agregar_button:active {
    transform: translateY(1px);
    transition: background-color 0.1s ease;
}

</style>
<style type="text/css">
.product {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 15px;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 10px;
    transition: box-shadow 0.3s ease;
}

.product:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.product-info {
    text-align: center;
    margin-bottom: 10px;
}
.product-info span{
    text-align: center;
    margin-bottom: 10px;
    font-size:0.9em;
}
.product-name {
    font-size: 1.2em;
    font-weight: 600;
    margin: 0 0 5px;
}

.product-status {
    color: #888;
    font-size: 0.9em;
}

.product-quantity {
    display: flex;
    align-items: center;
    background: #f0f8ff;
    padding: 5px;
    border-radius: 8px;
    margin-bottom: 10px;
}

.quantity-input {
    width: 50px;
    text-align: center;
    border: none;
    border-radius: 5px;
    margin: 0 5px;
    font-size: 1em;
    padding: 5px;
    outline: none;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    appearance: textfield;
    background:#fff;
    user-select:none;
}

.quantity-input::-webkit-outer-spin-button,
.quantity-input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.button_pos_inp {
    background-color:#0853bc;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.button_pos_inp svg {
    fill: white;
}

.button_pos_inp:hover {
    background-color: #0056b3;
}
.button_pos_inp:disabled{background:#999;}
.product-price {
    text-align: center;
    font-size: 1.1em;
    font-weight: 600;
    color: #333;
}
.listos_items_compra_pos{
	padding:5px;
	background:#b96d06;
	color:#f8f8f8;
	position:relative;
	bottom:-15px;
	border-radius:5px 5px 0 0;
}
</style>
<style type="text/css">
.checkout-button {
    display: flex;
    align-items: center;
    padding: 12px;
    width:100%;
    max-width:250px;
    background: #0853bc; /* Cambiado al color solicitado */
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1em;
    font-weight: 600;
    text-transform: uppercase;
    transition: background 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    outline: none;
    overflow: hidden;
    position: relative;
    justify-content:space-between;
}

.checkout-button .icon {
    display: flex;
    align-items:flex-end;
    justify-content: flex-end;
}

.checkout-button .icon svg {
    width: 24px;
    height: 24px;
    transition: transform 0.3s ease, fill 0.3s ease;
}

.checkout-button .text {
    display: block;
}

.checkout-button:hover {
    background: #0840a8; /* Color un poco más oscuro al hacer hover */
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.checkout-button:hover .icon svg {
    transform: scale(1.6) rotate(5deg);
}

.checkout-button:active {
    transform: translateY(0);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}
.cantidad_opt_at_pos_lista{
    display: flex;
    justify-content: space-between;
    background:#c0d8ff;
    color: #007eff;
}
.cantidad_opt_at_pos_lista span{color:#007eff!important;}
</style>
<style type="text/css">
.contenido_de_pagos{
	display:grid;
	grid-template-columns:repeat(auto-fit, minmax(min(200px, 100%), 1fr));
	width:100%;
	gap:0.5rem;
	border-top:2px solid #00509ba3;
	padding-top:15px;
}
.cuentas_a_pagar{
	border-radius:7px;
	padding:8px;
	background:#99999926;
}
</style>
<?php $venta_iniciada = $db->where('estado_venta',3)->where('id_del_vendedor',$wo['user']['user_id'])->getOne(T_VENTAS); ?>
<?php $numeroventa = generarNumeroDocumento($venta_iniciada->documento); ?>
<?php 
$secciones_id = (!empty($wo['user']['pos_secciones'])) ? (int) $wo['user']['pos_secciones'] : 0;
$category_id = (!empty($wo['user']['pos_categorias'])) ? (int) $wo['user']['pos_categorias'] : 0;
$category_sub_id = (!empty($wo['user']['pos_sub_categorias'])) ? (int) $wo['user']['pos_sub_categorias'] : 0;
?>
<div class="contenido_pos" id="contenido_pos">
	<div class="header_pos">
		<div class="logo_pos_pagina"><span>P</span><span>O</span><span>S</span><span>-</span><span>L</span><span>a</span><span>y</span><span>s</span><span>h</span><span>a</span><span>n</span><span>e</span></div>
		<div class="menu_pos_layshane">
			<span onclick="goBack()"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="" fill="none"><path d="M15 6C15 6 9.00001 10.4189 9 12C8.99999 13.5812 15 18 15 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg></span>
			<span id="toggleFullscreenButton" onclick="toggleFullscreen()"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="" fill="none"><path d="M8 3.09779C8 3.09779 4.03374 2.74194 3.38783 3.38785C2.74191 4.03375 3.09783 8 3.09783 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M8 20.9022C8 20.9022 4.03374 21.2581 3.38783 20.6122C2.74191 19.9662 3.09783 16 3.09783 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M16 3.09779C16 3.09779 19.9663 2.74194 20.6122 3.38785C21.2581 4.03375 20.9022 8 20.9022 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M16 20.9022C16 20.9022 19.9663 21.2581 20.6122 20.6122C21.2581 19.9662 20.9022 16 20.9022 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M14.0107 9.99847L20.0625 3.94678" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M9.99695 14.0024L3.63965 20.3807" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M9.99732 10.0024L3.8457 3.85889" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M13.9795 14.0024L20.5279 20.4983" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg></span>
			<span class="reloj-digital" id="relojDigital"></span>
		</div>
	</div>
	<div class="body_pos">
		<?php if ($venta_iniciada->completado==2): ?>
			<div class="main_wrapper_pos">
				<div class="header_body_pos">
				    <div class="contain_input_head_post">
				        <div class="input_container">
				            <input class="input_search" type="text" <?=($wo['user']['pos_barcode'] == 1 ? 'id="barcode"' : 'onkeyup="Wo_SearchProducts(this.value)"') ?> placeholder="<?=($wo['user']['pos_barcode'] == 1 ? 'Codigo de barras' : 'Buscar por codigo, sku o nombre') ?>" name="buscar_itm" autofocus>
				            <button class="search_button">
				                <!-- Aquí va tu SVG para el botón de búsqueda -->
				                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000" fill="none">
								    <path d="M14 14L16.5 16.5" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
								    <path d="M16.4333 18.5252C15.8556 17.9475 15.8556 17.0109 16.4333 16.4333C17.0109 15.8556 17.9475 15.8556 18.5252 16.4333L21.5667 19.4748C22.1444 20.0525 22.1444 20.9891 21.5667 21.5667C20.9891 22.1444 20.0525 22.1444 19.4748 21.5667L16.4333 18.5252Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
								    <path d="M16 9C16 5.13401 12.866 2 9 2C5.13401 2 2 5.13401 2 9C2 12.866 5.13401 16 9 16C12.866 16 16 12.866 16 9Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
								</svg>
				            </button>
				        </div>
				    </div>
				    <div class="contain_input_head_post">
				        <div class="input_container">
				        	<label class="contain_selec_barcode">
							  <input type="checkbox" name="selcct_barcode" <?=($wo['user']['pos_barcode'] == 1 ? 'checked' : '') ?>/>
							  <div class="checkmark">
							    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon No" fill="none">
								    <path d="M2 4V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								    <path d="M5 4V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								    <path d="M12 4V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								    <path d="M8 4V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								    <path d="M16 4V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								    <path d="M20 4V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								    <path d="M22 4V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								</svg>


								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon Yes" fill="currentColor">
								    <rect x="2" y="4" width="1.5" height="16" />
								    <rect x="5" y="4" width="1.5" height="16" />
								    <rect x="8" y="4" width="2" height="16" rx="1" />
								    <rect x="12" y="4" width="3" height="16" />
								    <rect x="16" y="4" width="2" height="16" rx="1" />
								    <rect x="20" y="4" width="1.5" height="16" />
								</svg>
							  </div>
							</label>
				        </div>
				    </div>
				    <?php if ($venta_iniciada->web==1): ?>
					    <div>
					    	<span class="web_order_type"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
							    <path d="M20.9992 10C20.9907 6.41543 20.8861 4.52814 19.6088 3.31802C18.2175 2 15.9783 2 11.5 2C7.02166 2 4.78249 2 3.39124 3.31802C2 4.63604 2 6.75736 2 11C2 15.2426 2 17.364 3.39124 18.682C4.61763 19.8438 6.50289 19.9815 10 19.9978" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
							    <path d="M15 17.5C15 17.5 15.5 17.5 16 18.5C16 18.5 17.5882 16 19 15.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
							    <path d="M22 17C22 19.7614 19.7614 22 17 22C14.2386 22 12 19.7614 12 17C12 14.2386 14.2386 12 17 12C19.7614 12 22 14.2386 22 17Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
							    <path d="M2 8.5H21" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
							    <path d="M6.49981 5.5H6.50879" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							    <path d="M10.4998 5.5H10.5088" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg> Web</span>
					    </div>
				    <?php endif ?>
				</div>

				<div class="main_pos">
					<section>
						<div class="carousel">
							<div class="carousel__wrapper">
								<div class="carousel__header">
							        <h2 class="carousel__headline">Categorias</h2>
							        <div class="carousel__controls">
							          <button class="carousel__arrow disabled arrow-prev" aria-label="Atras"></button>
							          <button class="carousel__arrow arrow-next" aria-label="Adelante"></button>
							        </div>
							    </div>
							    
							    <ul class="carousel__content more_its" id="carousel__content">
						    		<?php foreach ($wo['products_categories'] as $category){
						    			$wo['cat_id_produc'] = $category['id'];
						    			$all_categorie = $category_id == $wo['cat_id_produc'];
						    			$wo['active_cat'] = ($category_id == $wo['cat_id_produc']) ? 'active not_seen_story' : '';
						    			$wo['cat_logo_produc'] = $category['logo'];
						    			$wo['cat_nombre_producs'] = $wo["lang"][$category["lang_key"]];
						    			if(!empty($wo['products_sub_categories'][$wo['user']['pos_categorias']])){
						    				if($all_categorie){
							    				echo lui_LoadPage('pos/lista_cats_all');
							    			}
							    		}else{ 
						    				if(!$wo['cat_id_produc']==0){
						    					echo lui_LoadPage('pos/lista_categorias');
						    				} 
						    		    }
						    		} ?>
						    		<?php if(!empty($wo['user']['pos_categorias']) && !empty($wo['products_sub_categories'][$wo['user']['pos_categorias']])){
						    			$category_id = (!empty($wo['user']['pos_sub_categorias'])) ? (int) $wo['user']['pos_sub_categorias'] : 0;
						    			foreach ($wo['products_sub_categories'][$wo['user']['pos_categorias']] as $key => $wo['category_sub']) {
						    				$wo['cat_logo_producs'] = $wo['category_sub']['logo'];
						    				$wo['active_sub_cat'] = ($category_id == $wo['category_sub']['id']) ? 'active products_seleccionado_cat' : '';
						    				$wo['categoria_selecc'] = $wo['user']['pos_categorias'];
						    				echo lui_LoadPage('pos/lista_sub_categorias');
						    			}
						    		} ?>
							    </ul>
							    <script type="text/javascript">
									function guardarPosicionHorizontal() {
								      var miDiv = document.getElementById('carousel__content');
								      if (miDiv) {
								      	sessionStorage.setItem('scrollLeft', miDiv.scrollLeft);
								      }
								    }
								    function restaurarPosicionHorizontal() {
								      var miDiv = document.getElementById('carousel__content');
								      if (miDiv) {
								      	var scrollLeft = sessionStorage.getItem('scrollLeft') || 0;
								      	miDiv.scrollLeft = scrollLeft;
								      }
								      
								    }
								    window.onbeforeunload = guardarPosicionHorizontal;
								    window.onload = restaurarPosicionHorizontal;
								</script>
							  
							</div>
						</div>
					</section>

					<?php
					$category_id_pos = (!empty($wo['user']['pos_categorias'])) ? (int) $wo['user']['pos_categorias'] : 0;
					$category_sub_id_pos = (!empty($wo['user']['pos_sub_categorias'])) ? (int) $wo['user']['pos_sub_categorias'] : 0;
						$category_name = '';
						$data = array();
						if (!empty($category_id_pos)) {
							if (is_numeric($category_id_pos)) {
								if (array_key_exists($category_id_pos, $wo['products_categories'])) {
									?>
									<input type="hidden" value="<?php echo lui_Secure($category_id_pos); ?>" id="c_id" />
									<?php
									$category_name = $wo['products_categories'][$category_id_pos];
									$data['c_id'] = lui_Secure($category_id_pos);
								}
							}
							if (!empty($wo['products_sub_categories'][$category_id_pos]) && !empty($category_sub_id_pos)) {
								foreach ($wo['products_sub_categories'][$category_id_pos] as $key => $value) {
									if ($category_sub_id_pos == $value['id']) { ?>
										<input type="hidden" value="<?php echo lui_Secure($category_sub_id_pos); ?>" id="sub_id" />
										<?php
										$data['sub_id'] = lui_Secure($value['id']);
										break;
									}
								}
							}
						} else {
							echo '<input type="hidden" value="0" id="c_id" />';
							echo '<input type="hidden" value="" id="sub_id" />';
						}
						$data['limit'] = 10;
						$products = lui_GetProducts($data);
					?>

					<section class="contenido_prod_pos_list" id="products">
						<?php
							if (count($products) > 0) {
								foreach ($products as $key => $wo['product']) {
									echo lui_LoadPage('pos/products_lista');
								}
							} else {
								echo '<div class="empty_state" style="position:absolute;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z"></path></svg>' . $wo['lang']['no_available_products'] . '</div>';
							}
						?>
					</section>
					<br>
					<section class="load-produts">
						<?php if (count($products) > 0): ?>
							<div class="load-more">
					            <button class="btn btn-default text-center pointer" onclick="Wo_LoadProducts_pos();"><?php echo $wo['lang']['load_more_products'] ?></button>
					        </div>
		       	 		<?php endif ?>
					</section>
					<br>
				</div>
			</div>

			<div class="sidebar_pos">
				<div class="sidebar_pos_content">
					<div class="sidebar_pos_header">
						<a hidden href="<?=lui_SeoLink('index.php?link1=pos');?>" data-ajax="<?=('?link1=pos'); ?>" id="order_pos_lp" style="display:none;"></a>
						<span><strong>Nueva venta</strong> </span>
						<span><strong><?=$numeroventa?></strong></span>
					</div>
					
					<div class="comprobantes_contain">
						<span class="comprobant_list">
							<input type="radio" id="boleta_view" name="orden_options_comprobante" onchange="orden_options_comprobante(this)" value="boleta" data="<?=$venta_iniciada->hash_id;?>" <?=($venta_iniciada->documento == 'B') ? 'checked' : '';?>>
							<label class="comprobant_list_label" for="boleta_view"><?php echo $wo['lang']['boleta']; ?></label>
						</span>

						<span class="comprobant_list">
							<input type="radio" id="factura_view" name="orden_options_comprobante" onchange="orden_options_comprobante(this)" value="factura" data="<?=$venta_iniciada->hash_id;?>" <?=($venta_iniciada->documento == 'F') ? 'checked' : '';?>>
							<label class="comprobant_list_label" for="factura_view"><?php echo $wo['lang']['invoice']; ?></label>
						</span>

						<span class="comprobant_list">
							<input type="radio" id="nota_view" name="orden_options_comprobante" onchange="orden_options_comprobante(this)" value="boleta_simple" data="<?=$venta_iniciada->hash_id;?>" <?=($venta_iniciada->documento == 'BS') ? 'checked' : '';?>>
							<label class="comprobant_list_label" for="nota_view">Nota</label>
						</span>
						<span class="comprobant_list <?=($venta_iniciada->documento == 'BS') ? 'activado' : '';?>" id="nota_view">Nota</span>
					</div>
					<div class="documents_number_contain">
						<?php if ($venta_iniciada->documento=='B'): ?>
							<select class="input_docss" disabled name="tipo_de_documento">
								<option><?=$venta_iniciada->user_document ?></option>
							</select>
							<input class="input_docs" type="text" name="document_dni_pos" value="<?= ($venta_iniciada->user_document == 'DNI' && strlen($venta_iniciada->user_document_num) == 8) ? $venta_iniciada->user_document_num : ''; ?>" placeholder="Numero de documento">
						<?php elseif ($venta_iniciada->documento=='F'): ?>
							<select class="input_docss" disabled name="tipo_de_documento">
								<option><?=$venta_iniciada->user_document ?></option>
							</select>
							<input class="input_docs" type="text" name="document_ruc_pos" value="<?= ($venta_iniciada->user_document == 'RUC' && strlen($venta_iniciada->user_document_num) == 11) ? $venta_iniciada->user_document_num : ''; ?>" placeholder="Numero de documento">
						<?php elseif ($venta_iniciada->documento=='BS'): ?>
							<select class="input_docss" onchange="orden_type_docs(this)" name="tipo_de_documento" data="<?=$venta_iniciada->hash_id;?>">
								<option value="ND" <?=($venta_iniciada->user_document == null) ? 'selected' : '';?>>SIN DOCUMENTO</option>
								<option value="DNI" <?=($venta_iniciada->user_document == 'DNI') ? 'selected' : '';?>>DNI</option>
								<option value="RUC" <?=($venta_iniciada->user_document == 'RUC') ? 'selected' : '';?>>RUC</option>
							</select>
							<?php if ($venta_iniciada->user_document_num==null): ?>
							<?php else: ?>
								<?php if ($venta_iniciada->user_document == 'RUC'): ?>
									<input class="input_docs" type="text" name="document_ruc_pos" value="<?= ($venta_iniciada->user_document == 'RUC' && strlen($venta_iniciada->user_document_num) == 11) ? $venta_iniciada->user_document_num : ''; ?>" placeholder="Numero de documento">
								<?php elseif ($venta_iniciada->user_document == 'DNI'): ?>
									<input class="input_docs" type="text" name="document_dni_pos" value="<?= ($venta_iniciada->user_document == 'DNI' && strlen($venta_iniciada->user_document_num) == 8) ? $venta_iniciada->user_document_num : ''; ?>" placeholder="Numero de documento">
								<?php endif ?>
								
							<?php endif ?>
						<?php endif ?>
					</div>


					<div class="productos_agregados_en_venta">
						<?php 
						$total_productos_grupo = 0;
						$total_productos_lista = 0;
						$total_productos_price = 0.00;
						$comprapendiente = $db->where('estado_venta',3)->where('id_del_vendedor',lui_Secure($wo['user']['user_id']))->where('completado','2')->getOne(T_VENTAS);
						if (!empty($comprapendiente)) {
							$total_productos_grupo = $db->where('id_comprobante_v',$comprapendiente->id)->where('estado','2')->getValue('imventario','COUNT(DISTINCT orden)');
							$total_productos_lista = $db->where('id_comprobante_v',$comprapendiente->id)->where('estado','2')->getValue('imventario','COUNT(*)');
							if ($total_productos_lista>0) {
								$total_productos_price = $db->where('id_comprobante_v',$comprapendiente->id)->where('estado','2')->getValue('imventario','SUM(precio)');
							}
						} ?>
						<?php $items_compra = $db->orderBy('orden', 'asc')->objectbuilder()->where('id_comprobante_v',$comprapendiente->id)->where('estado','2')->where('tipo','venta')->get('imventario'); ?>
						<?php $html = "";
						$productos_vistos = [];
						foreach ($items_compra as $value) {
						    $producto = lui_GetProduct($value->producto);
						    $producto_id = $producto['id'];
						    if (in_array($producto_id, $productos_vistos)) {
						        continue;
						    }
						    $variantes_color = [];
						    foreach ($items_compra as $item) {
						        if ($item->producto == $producto_id) {
						            $variantes_color[] = $item;
						        }
						    }

						    $variantes_atributos = [];
						    $atributos = $db->objectbuilder()->where('id_imventario', $value->id)->get('imventario_atributos');
						    foreach ($atributos as $atributo) {
						        $variantes_atributos[$atributo->id_atributo][] = $atributo->id_atributo_opciones;
						    }
						    $identificador_unico = $comprapendiente->id . '_' . $producto_id;
						    foreach ($variantes_atributos as $atributo => $opciones) {
						        $identificador_unico .= '_' . implode('_', $opciones);
						    }
						    if (in_array($identificador_unico, $productos_vistos)) {
						        continue;
						    }

						    $wo['product']['id'] = $producto['id'];
						    $wo['product']['id_productos'] =  $identificador_unico;
						    $wo['product']['id_imventarios'] =  $value->id;
						    $wo['product']['units'] = $producto['units'];
						    $wo['product']['images'] = $producto['images'];
						    $wo['product']['name'] = $producto['name'];
						    $wo['product']['modelo'] = $producto['modelo'];
						    $wo['product']['sku'] = $producto['sku'];
						    $wo['product']['comprap'] = $comprapendiente->id;
						    $wo['product']['inventario'] = $value->id;
						    $wo['product']['color'] = $value->color;
						    $wo['product']['precio'] = $value->precio;
						    $wo['product']['garantia'] = $value->garantia;

							$cantidad_productos = 0;
							$cantidad_productos_pos_listos = 0;
							$completado_productos_pos_listos = 0;
							if (!empty($variantes_atributos)) {
							    $sql = "SELECT COUNT(*) AS cantidad FROM imventario WHERE producto = {$producto['id']} AND id_comprobante_v = {$comprapendiente->id}";
							    foreach ($variantes_atributos as $atributo => $opciones) {
							        foreach ($opciones as $opcion) {
							            $sql .= " AND id IN (SELECT id_imventario FROM imventario_atributos WHERE id_atributo = {$atributo} AND id_atributo_opciones = {$opcion})";
							        }
							    }
							    $cantidad_productos = $db->rawQueryOne($sql)->cantidad;
							} else{
							    $cantidad_productos = $db->where('id_comprobante_v', $comprapendiente->id)->where('producto', $wo['product']['id'])->where('color', $wo['product']['color'])->getValue('imventario', 'COUNT(*)');
							}

							if (!empty($variantes_atributos)) {
							    $sql = "SELECT COUNT(*) AS cantidad FROM imventario WHERE producto = {$producto['id']} AND barcode !=0 AND id_comprobante_v = {$comprapendiente->id}";
							    foreach ($variantes_atributos as $atributo => $opciones) {
							        foreach ($opciones as $opcion) {
							            $sql .= " AND id IN (SELECT id_imventario FROM imventario_atributos WHERE id_atributo = {$atributo} AND id_atributo_opciones = {$opcion})";
							        }
							    }
							    $cantidad_productos_pos_listos = $db->rawQueryOne($sql)->cantidad;
							} else{
							    $cantidad_productos_pos_listos = $db->where('id_comprobante_v', $comprapendiente->id)
	                                       ->where('producto', $producto['id'])
	                                       ->where('barcode',  ['!=', '0'], 'IN')
	                                       ->getValue('imventario', 'COUNT(*)');
	                            $sql = "SELECT COUNT(*) AS cantidad 
						        FROM imventario 
						        WHERE id_comprobante_v = ? 
						        AND producto = ?
						        AND barcode != '0'";
								$params = array($comprapendiente->id, $producto['id']);
								$result = $db->rawQueryOne($sql, $params);

								$cantidad_productos_pos_listos = $result->cantidad;
							}

							if (!empty($variantes_atributos)) {
							    $sql = "SELECT SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = 'ingreso' THEN cantidad WHEN modo = 'salida' THEN -cantidad ELSE 0 END ELSE 0 END) AS cantidad FROM imventario WHERE producto = {$producto['id']} AND (estado = 1 OR estado = 2)";
							    $subqueries = [];
							    foreach ($variantes_atributos as $atributo => $opciones) {
							        foreach ($opciones as $opcion) {
							            $sql .= " AND id IN (SELECT id_imventario FROM imventario_atributos WHERE id_atributo = {$atributo} AND id_atributo_opciones = {$opcion})";
							        }
							    }
							    $cantidad_prod = $db->rawQueryOne($sql)->cantidad;
							    $productos_stock_disponible =	($cantidad_prod !== null) ? $cantidad_prod : 0;
							} else{
								if ($wo['product']['color']) {
									$sql2 = "SELECT SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = 'ingreso' THEN cantidad WHEN modo = 'salida' THEN -cantidad ELSE 0 END ELSE 0 END) AS cantidad FROM imventario WHERE color = '{$wo['product']['color']}' AND producto = {$producto['id']} AND (estado = 1 OR estado = 2)";
									$productos_stock_disponible = $db->rawQueryOne($sql2)->cantidad;
								}else{
									$sql2 = "SELECT SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = 'ingreso' THEN cantidad WHEN modo = 'salida' THEN -cantidad ELSE 0 END ELSE 0 END) AS cantidad FROM imventario WHERE producto = {$producto['id']} AND (estado = 1 OR estado = 2)";
									$productos_stock_disponible = $db->rawQueryOne($sql2)->cantidad;
								}
							}
							if (!empty($wo['currencies']) && !empty($wo['currencies'][$producto['currency']]) && $wo['currencies'][$producto['currency']]['text'] != $wo['config']['currency'] && !empty($wo['config']['exchange']) && !empty($wo['config']['exchange'][$wo['currencies'][$producto['currency']]['text']])) {
							    $wo['product']['symbol'] = (!empty($wo['currencies'][$producto['currency']]['symbol'])) ? $wo['currencies'][$producto['currency']]['symbol'] : $producto['currency'];
			             		// $wo['total'] += (($wo['product']['price'] / $wo['config']['exchange'][$wo['currencies'][$wo['product']['currency']]['text']]) * $wo['item']->units);
				            } else {
				            	$wo['product']['symbol'] = (!empty($wo['currencies'][$producto['currency']]['symbol'])) ? $wo['currencies'][$producto['currency']]['symbol'] : $producto['currency'];
				            	//$wo['total'] += ($wo['product']['price'] * $wo['item']->units);
				            }
			            	$wo['product']['subtotal_p'] = number_format($value->precio*$cantidad_productos, 2, ',', '.');
						    $wo['product']['cantidad'] = $cantidad_productos;
						    $wo['product']['cantidad_listos_pos'] = $cantidad_productos_pos_listos;
						    $wo['product']['stock_disponible'] = $productos_stock_disponible;
						    $productos_vistos[] = $identificador_unico;
						    $html .= lui_LoadPage('pos/items_pos');
						}
						echo $html;
						?>
					</div>

					<?php 
						$productos_vistos_moneda = [];
						foreach ($items_compra as $moneda) {
						    $la_monedas_de_products = $moneda->currency;
						    if (!in_array($la_monedas_de_products, $productos_vistos_moneda)) {
						       $productos_vistos_moneda[] = $la_monedas_de_products; 
						    }
						}
						$wo['subtotal_dos'] = 0;
						$wo['total_dos'] = 0;
						$wo['igv_dos'] = 0;
					?>
					
					<div class="contenido_de_pagos">
						<?php foreach ($productos_vistos_moneda as $moneds):
							$indexdefault_currency = array_search($moneds, array_column($wo['currencies'], 'text')); ?>
							<?php $total_productos_lista_uno = $db->where('id_comprobante_v',$comprapendiente->id)->where('currency',$moneds)->where('estado','2')->getValue('imventario','COUNT(*)');
							if ($total_productos_lista_uno>0) {
								$total_productos_price_dos = $db->where('id_comprobante_v',$comprapendiente->id)->where('currency',$moneds)->where('estado','2')->getValue('imventario','SUM(precio)');
								
								$wo['subtotal_dos'] = number_format($total_productos_price_dos / (1.18), '2','.','');
								$wo['igv_dos']          = number_format($wo['subtotal_dos'] * 0.18, '2','.','');
								$wo['total_dos']    = number_format($total_productos_price_dos, '2','.',''); 
							} ?>
							<div class="cuentas_a_pagar" id="<?='currency_pos_pedido_'.strtolower($moneds);?>">
								<div class="div_subs_contn">
									<span><?php echo $wo['lang']['subtotal'] ?></span>
									<span><?=(!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : $moneds;?> <span class="<?='sub_total_pos_pedido_'.strtolower($moneds);?>"><?php echo $wo['subtotal_dos']; ?></span></span>
								</div>
								<div class="div_subs_contn">
									<span><?php echo $wo['lang']['igv'] ?></span>
									<span><?=(!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : $moneds;?> <span class="<?='impuesto_pos_pedido_'.strtolower($moneds);?>"><?=$wo['igv_dos']; ?></span></span>
								</div>
								<div class="div_subs_contn">
									<span><?php echo $wo['lang']['total'] ?></span>
									<span><?=(!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : $moneds;?> <span class="<?='total_pos_pedido_'.strtolower($moneds);?>"><?=$wo['total_dos'];?></span></span>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		<?php elseif($venta_iniciada->completado == 3): ?>
			hola
		<?php endif ?>
	</div>
	

	<div class="footer_pos">
		<?php if ($wo['user']['first_name']==''): ?>
			<span class="vendedor_pos">Vendedor: <?=$wo['user']['username']; ?></span>
		<?php else: ?>
			<span class="vendedor_pos">Vendedor: <?=$wo['user']['first_name']; ?></span>
		<?php endif ?>
		<button class="checkout-button">
        <?php $total_productos_lista = $db->where('id_comprobante_v',$comprapendiente->id)->where('estado','2')->getValue('imventario','COUNT(*)'); ?>

        <?php if ($venta_iniciada->completado==2): ?>
        	<?php if ($venta_iniciada->donde_paga==1): ?>
        		<span class="text check_pass">Pedido Listo (<span class="total_items_order_perdido_pos"><?=$total_productos_lista ?></span>)</span>
        		<span class="icon">
		            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#ffffff" fill="none">
					  <path d="M9.00005 6C9.00005 6 15 10.4189 15 12C15 13.5812 9 18 9 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
					    <animate attributeName="d" 
				            values="M9.00005 6C9.00005 6 15 10.4189 15 12C15 13.5812 9 18 9 18; 
				                    M12.00005 6C12.00005 6 18 10.4189 18 12C18 13.5812 12 18 12 18; 
				                    M9.00005 6C9.00005 6 15 10.4189 15 12C15 13.5812 9 18 9 18" 
				            dur="2s" repeatCount="indefinite"/>
					  	</path>
					</svg>
		        </span>
        	<?php endif ?>
        <?php elseif ($venta_iniciada->completado==3): ?>
        	<span class="icon">
	            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"  fill="none">
				    <path d="M16.6667 14L7.33333 14C5.14718 14 4.0541 14 3.27927 14.5425C2.99261 14.7433 2.74327 14.9926 2.54254 15.2793C2 16.0541 2 17.1472 2 19.3333C2 20.4264 2 20.9729 2.27127 21.3604C2.37164 21.5037 2.4963 21.6284 2.63963 21.7287C3.02705 22 3.57359 22 4.66667 22L19.3333 22C20.4264 22 20.9729 22 21.3604 21.7287C21.5037 21.6284 21.6284 21.5037 21.7287 21.3604C22 20.9729 22 20.4264 22 19.3333C22 17.1472 22 16.0541 21.4575 15.2793C21.2567 14.9926 21.0074 14.7433 20.7207 14.5425C19.9459 14 18.8528 14 16.6667 14Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
				    <path d="M20 14L19.593 10.3374C19.311 7.79863 19.1699 6.52923 18.3156 5.76462C17.4614 5 16.1842 5 13.6297 5L10.3703 5C7.81585 5 6.53864 5 5.68436 5.76462C4.83009 6.52923 4.68904 7.79862 4.40695 10.3374L4 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
				    <path d="M11.5 2H14M16.5 2H14M14 2V5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
				    <path d="M9 17.5L9.99615 18.1641C10.3247 18.3831 10.7107 18.5 11.1056 18.5H12.8944C13.2893 18.5 13.6753 18.3831 14.0038 18.1641L15 17.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
				    <path d="M8 8H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
				</svg>
	        </span>
        	<span class="text check_pass">Pasar a Caja (<span class="total_items_order_perdido_pos"><?=$total_productos_lista ?></span>)</span>
        <?php elseif ($venta_iniciada->delivery==''): ?>
        <?php endif ?>
        
    </button>
	</div>
</div>
<script type="text/javascript">
// Función para mostrar u ocultar el menú basado en el ID del producto 
function mostrarMenu(idProducto) {
    // Buscar el menú correspondiente al ID del producto
    const menu = document.querySelector(`.menu_atributos_produ_${idProducto}`);
    const menuprinc = document.querySelector(`.producto_pos_list_${idProducto}`);
    if (menuprinc) {
        if (menuprinc.classList.contains('active_atr_pos_item')) {
        } else {
            menuprinc.classList.add('active_atr_pos_item'); // Mostrar el menú si está oculto
        }
    }
    // Si se encontró el menú, alternar su visibilidad 
    if (menu) {
        if (menu.classList.contains('active_atr_pos')) {
        } else {
            menu.classList.add('active_atr_pos'); // Mostrar el menú si está oculto
        }
    }
}

// Función para cerrar el menú si se hace clic fuera de él o en el botón de cerrar
function cerrarMenu(event, idProducto) {
    const menu = document.querySelector('.menu_atributos_produ_' + idProducto);
    const menuprinc = document.querySelector('.producto_pos_list_' + idProducto);
    const closeButton = document.querySelector('.close_button_' + idProducto);
    const closeHoverL = document.querySelector('.close_hover_' + idProducto);
    
    if (!menu.contains(event.target) && !menuprinc.contains(event.target)) {
        if (menuprinc && menuprinc.classList.contains('active_atr_pos_item')) {
            menuprinc.classList.remove('active_atr_pos_item');
        }
        if (menu && menu.classList.contains('active_atr_pos')) {
            menu.classList.remove('active_atr_pos');
        }
    } else if (closeButton.contains(event.target) || closeHoverL.contains(event.target)) {
    	 menuprinc.classList.remove('active_atr_pos_item');
    	 menu.classList.remove('active_atr_pos');
    }
}

// Agregar un controlador de eventos para cerrar el menú cuando se hace clic en el documento
document.addEventListener('click', function(event) {
    const activeMenus = document.querySelectorAll('.menu_atributos_productos.active_atr_pos');
    activeMenus.forEach(menu => {
        const idProducto = menu.id.split('_').pop(); // Obtener el ID del producto del ID del menú
        cerrarMenu(event, idProducto); // Pasar ambos argumentos a cerrarMenu
    });
});
	document.addEventListener('DOMContentLoaded', function() {
	    const barcodeInput = document.getElementById('barcode');
	    if (barcodeInput) {
	        barcodeInput.addEventListener('input', function() {
	            Wo_Search_barcode(this.value);
	        });

	        barcodeInput.addEventListener('keydown', function(event) {
	            if (event.key === 'Enter') {
	                Wo_Search_barcode(this.value);
	            }
	        });
	    }
	});
	function Wo_Search_barcode(value) {
		$.post(Wo_Ajax_Requests_File() + '?f=order_opcion&s=barcode_inc&hash=' + $('.main_session').val(), {barcode: value}, function (data) {
			if (data.status == 200) {
				if (data.atributo) {
					const item_pos_public = document.getElementById('items_prod_pos-'+data.atributo);
					if (item_pos_public) {
						item_pos_public.innerHTML = data.cantidad_listo;
					}
				}
			}
		});
	}


	function Wo_SearchProducts(value) {
		length = $('#cusrange-reader').val();
		var c_id = 0;
		if ($('#c_id').length > 0) {
			c_id = $('#c_id').val();
		}
		var sub_id = $('#sub_id').val();
		$.post(Wo_Ajax_Requests_File() + '?f=search_products_pos', {value: value, c_id:c_id, sub_id:sub_id, length: length}, function (data) {
			if (data.status == 200) {
				if (data.html.length > 0) {
					$('#products').html(data.html);
				} else {
					$('#products').html('<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z"></path></svg> <?=$wo['lang']['no_available_products'];?> </div>');
				}
			}
		});
	}
	function Wo_LoadProducts_pos() {
		$('.load-produts').html('<div class="white-loading list-group"><div class="cs-loader"><div class="cs-loader-inner"><label> ●</label><label> ●</label><label> ●</label><label> ●</label><label> ●</label><label> ●</label></div></div></div>');
		var $c_id = $('#c_id').val();
		var sub_id = $('#sub_id').val();
		var $last_id = $('.producto_pos_list:last').attr('data-id');
		var length = $('#cusrange-reader').val();
		$.post(Wo_Ajax_Requests_File() + '?f=load_more_products_pos', {last_id: $last_id, c_id:$c_id, sub_id:sub_id, length: length}, function (data) {
			if (data.status == 200) {
				if (data.html.length > 0) {
					$('.load-produts').html('<div class="load-more"><button class="btn btn-default text-center pointer" onclick="Wo_LoadProducts_pos();"><i class="fa fa-arrow-down progress-icon" data-icon="arrow-down"></i> <?php echo $wo['lang']['load_more_products'] ?></button></div>');
					$('#products').append(data.html);
				} else {
					$('.load-produts').html('<div class="load-more"><button class="btn btn-default text-center pointer" onclick="Wo_LoadProducts_pos();"><?php echo $wo['lang']['no_available_products'] ?></button></div>');
				}
			}
		});
	}
	function openCategory_pos(category_pos){
		$('.carousel__item').removeClass('active');
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=order_opcion&s=category_pos&hash=' + $('.main_session').val(),
			data: {number:category_pos},
			type: 'POST',
			success: function (data) {
				$('#c_id').val(category_pos);
				$('#carousel__content').html(data.html_cats);
				$('#products').html(data.html);
				$('.scategorias_'+category_pos).addClass('active');
				if (data.html_load==1) {
					$('.load-produts').html('<div class="load-more"><button class="btn btn-default text-center pointer" onclick="Wo_LoadProducts_pos();"><i class="fa fa-arrow-down progress-icon" data-icon="arrow-down"></i> <?php echo $wo['lang']['load_more_products'] ?></button></div>');
				}else{
					$('.load-produts').html('');
				}
				
			}
		})
	}
	function openCategory_sub_pos(category_pos,category_sub_pos){

		$('.carousel__item').removeClass('active');
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=order_opcion&s=category_sub_pos&hash=' + $('.main_session').val(),
			data: {category:category_pos ,number:category_sub_pos},
			type: 'POST',
			success: function (data) {
				$('#c_id').val(category_pos);
				$('#sub_id').val(category_sub_pos);
				$('#products').html(data.html);
				$('.subcategorias_'+category_sub_pos).addClass('active');
				if (data.html_load==1) {
					$('.load-produts').html('<div class="load-more"><button class="btn btn-default text-center pointer" onclick="Wo_LoadProducts_pos();"><i class="fa fa-arrow-down progress-icon" data-icon="arrow-down"></i> <?php echo $wo['lang']['load_more_products'] ?></button></div>');
				}else{
					$('.load-produts').html('');
				}
			}
		})
	}
	$('input[name="document_dni_pos"]').keyup(function(){
		var nums = $(this).val();
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=order_opcion&s=document_dni_pos&hash=' + $('.main_session').val(),
			data: {number:nums},
			type: 'POST',
			success: function (data) {
				console.log(data)
			}
		})
	});
	$('input[name="document_ruc_pos"]').keyup(function(){
		var nums = $(this).val();
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=order_opcion&s=document_ruc_pos&hash=' + $('.main_session').val(),
			data: {number:nums},
			type: 'POST',
			success: function (data) {
			}
		})
	});

	$('input[name="selcct_barcode"]').change(function(){
		var isChecked = $(this).is(':checked');
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=order_opcion&s=document_selectt_barcod&hash=' + $('.main_session').val(),
			data: {number:isChecked},
			type: 'POST',
			success: function (data) {
				$('input[name="buscar_itm"]').prop('placeholder', data.placeholder);
				if (data.funcions=='') {
					$('input[name="buscar_itm"]').attr('id', 'barcode');
					$('input[name="buscar_itm"]').removeAttr('onkeyup');
				}else{
					$('input[name="buscar_itm"]').attr('onkeyup', data.funcions);
					$('input[name="buscar_itm"]').removeAttr('id');
				} console.log(data.funcions)
				
			}
		})
	});

	function actualizarReloj() {
	    const reloj = document.getElementById('relojDigital');
	    const ahora = new Date();

	    const horas = String(ahora.getHours()).padStart(2, '0');
	    const minutos = String(ahora.getMinutes()).padStart(2, '0');
	    const segundos = String(ahora.getSeconds()).padStart(2, '0');

	    reloj.textContent = `${horas}:${minutos}:${segundos}`;
	}

	setInterval(actualizarReloj, 1000);
	actualizarReloj();

	function goBack() {
        history.back();
    }
    function toggleFullscreen() {
	    if (!document.fullscreenElement) {
	        activarPantallaCompleta();
	    } else {
	        salirPantallaCompleta();
	    }
	}
    function activarPantallaCompleta() {
	    var elemento = document.getElementById('contenido_pos');
	    if (elemento.requestFullscreen) {
	        elemento.requestFullscreen();
	    } else if (elemento.webkitRequestFullscreen) { /* Safari */
	        elemento.webkitRequestFullscreen();
	    } else if (elemento.msRequestFullscreen) { /* IE11 */
	        elemento.msRequestFullscreen();
	    }
	}
	function salirPantallaCompleta() {
	    if (document.exitFullscreen) {
	        document.exitFullscreen();
	    } else if (document.webkitExitFullscreen) { /* Safari */
	        document.webkitExitFullscreen();
	    } else if (document.msExitFullscreen) { /* IE11 */
	        document.msExitFullscreen();
	    }
	}
	document.addEventListener('fullscreenchange', actualizarBoton);
	document.addEventListener('webkitfullscreenchange', actualizarBoton);
	document.addEventListener('msfullscreenchange', actualizarBoton);
	function actualizarBoton() {
	    var boton = document.getElementById('toggleFullscreenButton');
	    if (document.fullscreenElement || document.webkitFullscreenElement || document.msFullscreenElement) {
	        boton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="" fill="none"><path d="M14.2299 17.9947C14.2194 17.2447 13.7042 14.7612 14.2307 14.2347C14.7573 13.7083 17.24 14.2247 17.9897 14.2355M20.9997 20.9981L14.6149 14.6146" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M9.7698 17.9947C9.7803 17.2447 10.2955 14.7612 9.769 14.2347C9.24247 13.7083 6.75975 14.2247 6.01005 14.2355M3 20.9981L9.38478 14.6146" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M6.00765 9.76133C6.75739 9.7709 9.24092 10.2832 9.76664 9.75585C10.2922 9.22853 9.77284 6.74581 9.76116 5.99592M9.37715 9.36743L3.00195 3.00244" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M17.9918 9.76133C17.2421 9.7709 14.7585 10.2832 14.2328 9.75585C13.7072 9.22853 14.2266 6.74581 14.2383 5.99592M14.6223 9.36743L20.9975 3.00244" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>';
	        boton.classList.add('fullscreen');
	    } else {
	        boton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="" fill="none"><path d="M8 3.09779C8 3.09779 4.03374 2.74194 3.38783 3.38785C2.74191 4.03375 3.09783 8 3.09783 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M8 20.9022C8 20.9022 4.03374 21.2581 3.38783 20.6122C2.74191 19.9662 3.09783 16 3.09783 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M16 3.09779C16 3.09779 19.9663 2.74194 20.6122 3.38785C21.2581 4.03375 20.9022 8 20.9022 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M16 20.9022C16 20.9022 19.9663 21.2581 20.6122 20.6122C21.2581 19.9662 20.9022 16 20.9022 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M14.0107 9.99847L20.0625 3.94678" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M9.99695 14.0024L3.63965 20.3807" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M9.99732 10.0024L3.8457 3.85889" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M13.9795 14.0024L20.5279 20.4983" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>';
	        boton.classList.remove('fullscreen');
	    }
	}
</script>