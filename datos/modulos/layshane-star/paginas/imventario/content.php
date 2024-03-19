<?php if(lui_IsAdmin() || lui_IsModerator()){
}else{
	header('Location: ' . $wo['config']['site_url']);
   exit();
}?>
<style type="text/css">
	body{background-color:#F0F2FD;}
	.content_imventario_layshane{display:grid;flex-wrap:wrap;gap:2rem;width:100%;}
.card{
  overflow:hidden;
  position:relative;
  text-align:left;
  border-radius:0.5rem;
  user-select:none;
  box-shadow:0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);background-color:#fff;
}
.div_image_v{
  background:#47c9a2;
  border-bottom:none;
  position:relative;
  text-align:center;
  margin:-20px -20px 0;
  border-radius:5px 5px 0 0;
  padding:35px;
}
.header{
  padding:1.25rem 1rem 1rem 1rem;
}
.image{
  display:flex;
  margin-left:auto;
  margin-right:auto;
  background-color:#e2feee;
  flex-shrink:0;
  justify-content:center;
  align-items:center;
  width:4rem;
  height:4rem;
  border-radius:9999px;
  animation:animate .6s linear alternate-reverse infinite;
  transition:.6s ease;
}
.image svg{
  color:#0afa2a;
  width:2rem;
  height:2rem;
}
.content{
  margin-top:0.75rem;
  text-align:center;
}
.title{
  color:#066e29;
  font-size:1rem;
  font-weight:600;
  line-height:1.5rem;
}
.message{
  margin-top:0.5rem;
  color:#595b5f;
  font-size:0.875rem;
  line-height:1.25rem;
}
@keyframes animate{
  from {
    transform: scale(1);
  }

  to {
    transform: scale(1.09);
  }
}
</style>
<?php echo lui_LoadPage("sidebar/left-sidebar"); ?>
<?php if($wo['layshane']['sucursal']): ?>
	<?php $category_id = (!empty($_GET['c_id'])) ? (int) $_GET['c_id'] : 0;
	$category_sub_id = (!empty($_GET['sub_id'])) ? (int) $_GET['sub_id'] : 0;
	$nombre_de_categoria_seleccionado = false;
	$subcategorias_nombre_name=false; ?>
<div class="columna-8 sett_page wo_new_sett_pagee main_layshane_configuration_menu">
	<div class="wow_sett_sidebar button_controle_layshane_back_settign">
		<ul class="list-unstyled" style="padding-bottom:0;">
			<li class="">
				<a class="btn btn-default seleccionar_menu_laysh" style="background-color:#fff;">Menu</a>
			</li>
		</ul>
	</div>
	<br>
	<div class="wo_settings_page">
		<div class="profile-lists singlecol">

			<div class="avatar-holder mt-0">
				<div class="wo_page_hdng pag_neg_padd pag_alone">
					<div class="wo_page_hdng_innr big_size">
						<span><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="14" viewBox="0 0 448 512"><path d="M192 64v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V64c0-17.7-14.3-32-32-32H224c-17.7 0-32 14.3-32 32zM82.7 207c-15.3 8.8-20.5 28.4-11.7 43.7l32 55.4c8.8 15.3 28.4 20.5 43.7 11.7l55.4-32c15.3-8.8 20.5-28.4 11.7-43.7l-32-55.4c-8.8-15.3-28.4-20.5-43.7-11.7L82.7 207zM288 192c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H288zm64 160c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V384c0-17.7-14.3-32-32-32H352zM160 384v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V384c0-17.7-14.3-32-32-32H192c-17.7 0-32 14.3-32 32zM32 352c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32H96c17.7 0 32-14.3 32-32V384c0-17.7-14.3-32-32-32H32z"/></svg></span> Mis imventario
					</div>
				</div>
			</div>
			<br><br>
			
			<div class="wo_my_pages">
				<section class="content_imventario_layshane">
					<div class="card">
						<div class="header"> 
							<div class="div_image_v">
								<div class="image">
									<svg xmlns="http://www.w3.org/2000/svg" fill="#f1c40f" height="16" width="18" viewBox="0 0 576 512"><path d="M248 0H208c-26.5 0-48 21.5-48 48V160c0 35.3 28.7 64 64 64H352c35.3 0 64-28.7 64-64V48c0-26.5-21.5-48-48-48H328V80c0 8.8-7.2 16-16 16H264c-8.8 0-16-7.2-16-16V0zM64 256c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H224c35.3 0 64-28.7 64-64V320c0-35.3-28.7-64-64-64H184v80c0 8.8-7.2 16-16 16H120c-8.8 0-16-7.2-16-16V256H64zM352 512H512c35.3 0 64-28.7 64-64V320c0-35.3-28.7-64-64-64H472v80c0 8.8-7.2 16-16 16H408c-8.8 0-16-7.2-16-16V256H352c-15 0-28.8 5.1-39.7 13.8c4.9 10.4 7.7 22 7.7 34.2V464c0 12.2-2.8 23.8-7.7 34.2C323.2 506.9 337 512 352 512z"/></svg>
								</div>
							</div>
							<div class="content">
								<span class="title">EXISTENCIAS</span> 
								<p class="message">100</p>
							</div>
						</div>
					</div>
				</section>
				<style type="text/css">
					.but_ac_ct{
						display:flex;
						justify-content:flex-end;
						width:100%;
						margin-top:2rem;
						gap:1rem;
					}
					.btms_a_ct{padding:10px;min-width:100px;text-align:center;}
				</style>
				<section>
					<div class="but_ac_ct">
						<span class="btms_a_ct button_blanco2">Exel</span>
						<span class="btms_a_ct button_blanco2">PDF</span>
					</div>
				</section>

<style type="text/css">
.con_layshane_tbles{
	margin-top:30px;
  display:block;
  height:100%;
  width:100%;
  color: #252a3b;
  background-color: #f8f8f8;
  padding:10px;
  overflow-x:auto;
}
.con_layshane_tbles .container{
	white-space:nowrap;
}
.table{
  width:100%;
  max-width:100%;
  margin-bottom:20px;
}
table{
  background-color: transparent;
}
table{
  border-spacing:0;
  border-collapse:collapse;
}
.row--top-20{
  margin-top:20px;
}
.table__th{
  color:#9eabb4;
  font-weight:500;
  font-size:12px;
  text-transform:uppercase;
  cursor:pointer;
  border:0 !important;
  padding:15px 8px !important;
  text-align:start;
}
.table-row{
  border-bottom:1px solid #e4e9ea;
  background-color:#fff;
}
.table__th:hover{
  color:#01b9d1;
}
.table--select-all{
  width:18px;
  height:18px;
  padding:0 !important;
  border-radius:50%;
  border:2px solid #becad2;
}
.table-row__td{
  padding:12px 8px !important;
  vertical-align:middle !important;
  color:#53646f;
  font-size:13px;
  font-weight: 400;
  position:relative;
  line-height: 18px !important;
  border:0 !important;
}
.table-row__img{
  width:36px;
  height:36px;
  display:inline-block;
  border-radius:50%;
  background-position:center;
  background-size:cover;
  background-repeat:no-repeat;
  vertical-align:middle;
}
.table-row--chris .table-row__img{
  background-image: url('https://images.pexels.com/photos/428333/pexels-photo-428333.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb');
}
.table-row--angie .table-row__img {
    background-image: url('https://images.pexels.com/photos/785667/pexels-photo-785667.jpeg?w=940&h=650&auto=compress&cs=tinysrgb');
}
.table-row--ronald .table-row__img {
    background-image: url('https://images.pexels.com/photos/211050/pexels-photo-211050.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb');
}
.table-row--june .table-row__img {
    background-image: url('https://images.pexels.com/photos/709802/pexels-photo-709802.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb');
}
.table-row--ben .table-row__img {
  background-image: url('https://images.pexels.com/photos/736716/pexels-photo-736716.jpeg?w=940&h=650&auto=compress&cs=tinysrgb');
}

.table-row--natalie .table-row__img {
    background-image: url('https://images.pexels.com/photos/38554/girl-people-landscape-sun-38554.jpeg?w=940&h=650&auto=compress&cs=tinysrgb');
}

.table-row--thomas .table-row__img {
   background-image: url('https://images.pexels.com/photos/415326/pexels-photo-415326.jpeg?w=940&h=650&auto=compress&cs=tinysrgb');
}
.table-row__info{
  display:inline-block;
  padding-left:12px;
  vertical-align:middle;
}
.table-row__name{
  color:#53646f;
  font-size:14px;
  font-weight:400;
  line-height:18px;
  margin-bottom:0px;
}
.table-row__small{
  color:#9eabb4;
  font-weight:300;
  font-size:12px;
}
.table-row__policy{
  color:#53646f;
  font-size:13px;
  font-weight: 400;
  line-height: 18px;
  margin-bottom: 0px;
}
.table-row__p-status{
  margin-bottom:0;
  font-size:13px;
  vertical-align:middle;
  display:inline-block;
  color:#9eabb4;
}
.table-row__status{
  margin-bottom:0;
  font-size:13px;
  vertical-align:middle;
  display:inline-block;
  color:#9eabb4;
}
.table-row__progress{
  margin-bottom:0;
  font-size:13px;
  vertical-align:middle;
  display:inline-block;
  color:#9eabb4;
}
.status:before{
  content:'';
  margin-bottom:0;
  width:9px;
  height:9px;
  display:inline-block;
  margin-right:7px;
  border-radius:50%; 
}
.status--red:before{background-color:#e36767;}
.status--red{color:#e36767;}
.status--blue:before{background-color:#3fd2ea;}
.status--blue{color:#3fd2ea;}
.status--yellow:before{background-color:#ecce4e;}
.status--yellow{color:#ecce4e;}
.status--green{color:#6cdb56;}
.status--green:before{background-color:#6cdb56;}
.status--grey{color:#9eabb4;}
.status--grey:before{background-color:#9eabb4;}
.table-row--overdue{width:3px;background-color:#e36767;display:inline-block;
  position:absolute;height:calc(100% - 24px);top:50%;
  left:0;
  transform: translateY(-50%);
}
.table-row__edit{
  width:46px;
  padding:3px 10px;
  display:inline-block;
  background-color:#daf3f8;
  border-radius:18px;
  vertical-align:middle;
  margin-right:10px;
  cursor:pointer;
}
.table-row__bin{
  width:16px;
  display:inline-block;
  vertical-align:middle;
  cursor:pointer;
}
.table-row--red{background-color:#fff2f2;}
@media screen and (max-width: 991px){
  .table__thead{display:none;}
  .table-row{
    display:inline-block;
    border:0;
    background-color:#fff;
    width:calc(33.3% - 13px);
    margin-right:10px;
    margin-bottom:10px;
  }
  .table-row__img{
    width:42px;
    height:42px;
    margin-bottom:10px;
  }
  .table-row__td:before{
    content:attr(data-column);
    color:#9eabb4;
    font-weight:500;
    font-size:12px;
    text-transform:uppercase;
    display:block;
  }
  .table-row__info{
    display:block;
    padding-left:0;
  }
  .table-row__td{
    display:block;
    text-align:center;
    padding:8px !important;
  }
  .table-row--red{background-color:#fff2f2;}
  .table-row--overdue{
  	width:100%;
    top:0;
    left:0;
    transform:translateY(0%);
    height:4px;
  }
}
@media screen and (max-width: 680px){
  .table-row{width: calc(50% - 13px);}
}
@media screen and (max-width: 480px){
  .table-row{width: 100%;}
}
</style>
<div class="con_layshane_tbles">
	<div class="container">
		<div class="row row--top-20">
			<div class="col-md-12">
				<div class="table-container">
					<table class="table">
						<thead class="table__thead">
							<tr>
								<th class="table__th">Producto</th>
								<th class="table__th"></th>
								<th class="table__th">Lote</th>
								<th class="table__th">Codido</th>
								<th class="table__th">Codido de barras</th>
								<th class="table__th">Tipo</th>
								<th class="table__th">Estado</th>
								<th class="table__th">Cantidad</th>
								<th class="table__th">Documento</th>
								<th class="table__th"></th>
							</tr>
						</thead>
						<tbody class="table__tbody">
							<tr class="table-row table-row--chris">
								<td class="table-row__td">
									<div class="table-row__img"></div>
									<div class="table-row__info">
										<p class="table-row__name">HP Desktop 8100 core i5 3th</p>
										<span class="table-row__small">Garantia hasta 2 de abril 2024</span>
									</div>
								</td>
								<td data-column="" class="table-row__td">
									<p class="table-row__p-status status--green status">Ingreso</p>
								</td>
								<td data-column="Lote" class="table-row__td">
									<div class="">
										<p class="table-row__policy">224325235F</p>
									</div>                
								</td>
              <td data-column="Codigo" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">009234</p>
                </div>                
              </td>
              <td data-column="Codigo de barras" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">4325235FGD</p>
                </div>                
              </td>
              <td data-column="Tipo" class="table-row__td">
                Compra
              </td>
              <td  data-column="Estado" class="table-row__td">
                <p class="table-row__status status--green status">Para venta</p>
              </td>
              <td data-column="Cantidad" class="table-row__td">
                <p class="table-row__policy">1</p>
              </td>
              <td data-column="Documento" class="table-row__td">
                <p class="table-row__policy">B0145</p>
                  <span class="table-row__small">Boleta</span>
              </td>
              <td class="table-row__td">
              	<svg class="table-row__edit" style="color:rgb(1, 185, 209);" width="34" height="34" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 7l1 0" /><path d="M9 13l6 0" /><path d="M13 17l2 0" /></svg>
              </td>
            </tr>

            <tr class="table-row table-row--chris">
              <td class="table-row__td">
                <div class="table-row__img"></div>
                <div class="table-row__info">
                  <p class="table-row__name">Dell Desktop 8100 core i5 3th</p>
                  <span class="table-row__small">Computadoras</span>
                </div>
              </td>
              <td data-column="" class="table-row__td">
                <p class="table-row__p-status status--yellow status">Reservado</p><hr>
                 <span class="table-row__small">1 Dia 3hr 23m</span>
              </td>
              <td data-column="Lote" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">224325235F</p>
                </div>                
              </td>
              <td data-column="Codigo" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">0092345</p>
                </div>                
              </td>
              <td data-column="Codigo de barras" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">GG55235FGD</p>
                </div>                
              </td>
              <td data-column="Tipo" class="table-row__td">
                Reserva
              </td>
              <td  data-column="Estado" class="table-row__td">
                <p class="table-row__status status--yellow status">Pendiende</p>
              </td>
              <td data-column="Cantidad" class="table-row__td">
                <p class="table-row__policy">1</p>
              </td>
              <td data-column="Documento" class="table-row__td">
                <p class="table-row__policy">R0146</p>
                  <span class="table-row__small">Reserva</span>
              </td>
              <td class="table-row__td">
              	<svg class="table-row__edit" style="color:rgb(1, 185, 209);" width="34" height="34" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 7l1 0" /><path d="M9 13l6 0" /><path d="M13 17l2 0" /></svg>
              </td>
            </tr>

            <tr class="table-row table-row--chris">
              <td class="table-row__td">
                <div class="table-row__img"></div>
                <div class="table-row__info">
                  <p class="table-row__name">Dell Desktop 8100 core i5 3th</p>
                  <span class="table-row__small">Computadoras</span>
                </div>
              </td>
              <td data-column="" class="table-row__td">
                <p class="table-row__p-status status--blue status">Ingreso</p>
              </td>
              <td data-column="Lote" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">224325235F</p>
                </div>                
              </td>
              <td data-column="Codigo" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">0092345</p>
                </div>                
              </td>
              <td data-column="Codigo de barras" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">GG55235FGD</p>
                </div>                
              </td>
              <td data-column="Tipo" class="table-row__td">
                Compra
              </td>
              <td  data-column="Estado" class="table-row__td">
                <p class="table-row__status status--blue status">Devolucion</p>
              </td>
              <td data-column="Cantidad" class="table-row__td">
                <p class="table-row__policy">1</p>
              </td>
              <td data-column="Documento" class="table-row__td">
                <p class="table-row__policy">R0146</p>
                  <span class="table-row__small">Reserva</span>
              </td>
              <td class="table-row__td">
              	<svg class="table-row__edit" style="color:rgb(1, 185, 209);" width="34" height="34" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 7l1 0" /><path d="M9 13l6 0" /><path d="M13 17l2 0" /></svg>
              </td>
            </tr>
            

            <tr class="table-row table-row--june table-row--red">
              <td class="table-row__td">
                <div class="table-row--overdue"></div>
                <div class="table-row__img"></div>
                <div class="table-row__info">
                  <p class="table-row__name">HP Desktop 8100 core i5 3th</p>
                  <span class="table-row__small">Computadoras</span>
                </div>
              </td>
              <td data-column="" class="table-row__td">
                <p class="table-row__p-status status--red status">Ingreso</p>
              </td>
              <td data-column="Lote" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">224325235F</p>
                </div>                
              </td>
              <td data-column="Codigo" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">009234</p>
                </div>                
              </td>
              <td data-column="Codigo de barras" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">4325235FGD</p>
                </div>                
              </td>
              <td data-column="Tipo" class="table-row__td">
                Garantia
              </td>
              <td  data-column="Estado" class="table-row__td">
                <p class="table-row__status status--red status">Con detalle</p>
              </td>
              <td data-column="Cantidad" class="table-row__td">
                <p class="table-row__policy">1</p>
              </td>
              <td data-column="Documento" class="table-row__td">
                <p class="table-row__policy">B0145</p>
                  <span class="table-row__small">Boleta</span>
              </td>
              <td class="table-row__td">
              	<svg class="table-row__edit" style="color:rgb(1, 185, 209);" width="34" height="34" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 7l1 0" /><path d="M9 13l6 0" /><path d="M13 17l2 0" /></svg>
              </td>
            </tr>

            <tr class="table-row table-row--june table-row--red">
              <td class="table-row__td">
                <div class="table-row--overdue"></div>
                <div class="table-row__img"></div>
                <div class="table-row__info">
                  <p class="table-row__name">HP Desktop 8100 core i5 3th</p>
                  <span class="table-row__small">Computadoras</span>
                </div>
              </td>
              <td data-column="" class="table-row__td">
                <p class="table-row__p-status status--red status">Ingreso</p>
              </td>
              <td data-column="Lote" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">224325235F</p>
                </div>                
              </td>
              <td data-column="Codigo" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">009234</p>
                </div>                
              </td>
              <td data-column="Codigo de barras" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">4325235FGD</p>
                </div>                
              </td>
              <td data-column="Tipo" class="table-row__td">
                Devolucion
              </td>
              <td  data-column="Estado" class="table-row__td">
                <p class="table-row__status status--red status">Con detalle</p>
              </td>
              <td data-column="Cantidad" class="table-row__td">
                <p class="table-row__policy">1</p>
              </td>
              <td data-column="Documento" class="table-row__td">
                <p class="table-row__policy">B0145</p>
                  <span class="table-row__small">Boleta</span>
              </td>
              <td class="table-row__td">
              	<svg class="table-row__edit" style="color:rgb(1, 185, 209);" width="34" height="34" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 7l1 0" /><path d="M9 13l6 0" /><path d="M13 17l2 0" /></svg>
              </td>
            </tr>
            
            <tr class="table-row table-row--chris">
              <td class="table-row__td">
                <div class="table-row__img"></div>
                <div class="table-row__info">
                  <p class="table-row__name">HP Desktop 8100 core i5 3th</p>
                  <span class="table-row__small">Computadoras</span>
                </div>
              </td>
              <td data-column="" class="table-row__td">
                <p class="table-row__p-status status--green status">Salida</p>
              </td>
              <td data-column="Lote" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">224325235F</p>
                </div>                
              </td>
              <td data-column="Codigo" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">009234</p>
                </div>                
              </td>
              <td data-column="Codigo de barras" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">4325235FGD</p>
                </div>                
              </td>
              <td data-column="Tipo" class="table-row__td">
                Venta
              </td>
              <td  data-column="Estado" class="table-row__td">
                <p class="table-row__status status--green status">OK</p>
              </td>
              <td data-column="Cantidad" class="table-row__td">
                <p class="table-row__policy">1</p>
              </td>
              <td data-column="Documento" class="table-row__td">
                <p class="table-row__policy">B0145</p>
                  <span class="table-row__small">Boleta</span>
              </td>
              <td class="table-row__td">
              	<svg class="table-row__edit" style="color:rgb(1, 185, 209);" width="34" height="34" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 7l1 0" /><path d="M9 13l6 0" /><path d="M13 17l2 0" /></svg>
              </td>
            </tr>

            <tr class="table-row table-row--june">
              <td class="table-row__td">
                <div class="table-row--overdue"></div>
                <div class="table-row__img"></div>
                <div class="table-row__info">
                  <p class="table-row__name">HP Desktop 8100 core i5 3th</p>
                  <span class="table-row__small">Computadoras</span>
                </div>
              </td>
              <td data-column="" class="table-row__td">
                <p class="table-row__p-status status--green status">Salida</p>
              </td>
              <td data-column="Lote" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">224325235F</p>
                </div>                
              </td>
              <td data-column="Codigo" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">009234</p>
                </div>                
              </td>
              <td data-column="Codigo de barras" class="table-row__td">
                <div class="">
                  <p class="table-row__policy">4325235FGD</p>
                </div>                
              </td>
              <td data-column="Tipo" class="table-row__td">
                Venta
              </td>
              <td  data-column="Estado" class="table-row__td">
                <p class="table-row__policy status--red status">Con detalle</p>
                  <span class="table-row__small">Descartados</span>
              </td>
              <td data-column="Cantidad" class="table-row__td">
                <p class="table-row__policy">1</p>
              </td>
              <td data-column="Documento" class="table-row__td">
                <p class="table-row__policy">B0145</p>
                  <span class="table-row__small">Boleta</span>
              </td>
              <td class="table-row__td">
              	<svg class="table-row__edit" style="color:rgb(1, 185, 209);" width="34" height="34" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 7l1 0" /><path d="M9 13l6 0" /><path d="M13 17l2 0" /></svg>
              </td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

				</div>
			</div>
		</div>
	</div>
	<!-- .row -->
</div>
<?php else: ?>
	<div class="columna-8 sett_page wo_new_sett_pagee main_layshane_configuration_menu">
		<div class="wow_sett_sidebar button_controle_layshane_back_settign">
		<ul class="list-unstyled" style="padding-bottom:0;">
			<li class="">
				<a class="btn btn-default seleccionar_menu_laysh" style="background-color:#fff;">Menu</a>
			</li>
		</ul>
		</div>
		<br>
		<div class="wo_settings_page">
			<div class="profile-lists singlecol">
				<div class="avatar-holder mt-0">
					<div class="wo_page_hdng pag_neg_padd pag_alone">
						<div class="wo_page_hdng_innr big_size">
							<span><svg viewBox="0 0 1024 1024" fill="currentColor" whidth="16" height="16"><path d="M504.1 452.5c-18.3 0-36.5-4.1-50.7-10.1l-280.1-138c-18.3-10.1-30.4-24.4-30.4-40.6 0-16.2 10.2-32.5 30.4-42.6L455.4 77.1c16.2-8.1 34.5-12.2 54.8-12.2 18.3 0 36.5 4.1 50.7 10.1L841 213c18.3 10.1 30.4 24.4 30.4 40.6 0 16.2-10.1 32.5-30.4 42.6L558.9 440.3c-16.3 8.1-34.5 12.2-54.8 12.2zM193.6 261.7l280.1 138c8.1 4.1 18.3 6.1 30.4 6.1 12.2 0 24.4-2 32.5-6.1l284.1-144.1-280.1-138c-8.1-4.1-18.3-6.1-30.4-6.1-12.2 0-24.4 2-32.5 6.1L193.6 261.7z m253.6 696.1c-10.1 0-20.3-2-30.4-8.1L165.1 817.8c-30.4-14.2-52.8-46.7-52.8-73.1V391.6c0-24.4 18.3-42.6 44.6-42.6 10.1 0 20.3 2 30.4 8.1L437.1 489c30.4 14.2 52.8 46.7 52.8 73.1v353.1c0 24.4-18.3 42.6-42.7 42.6z m-10.1-48.7c2 2 4.1 2 6.1 2v-349c0-8.1-10.1-24.4-26.4-32.5L165.1 397.7c-2-2-4.1-2-6.1-2v349.1c0 8.1 10.2 24.4 26.4 32.5l251.7 131.8z m144.1 48.7c-24.4 0-42.6-18.3-42.6-42.6V562.1c0-26.4 22.3-58.9 52.8-73.1L841 357.1c10.1-4.1 20.3-8.1 30.4-8.1 24.4 0 42.6 18.3 42.6 42.6v353.1c0 26.4-22.3 58.9-52.8 73.1L611.6 949.7c-12.2 6.1-20.3 8.1-30.4 8.1z m280-560.1L611.6 529.6c-16.2 8.1-26.4 24.4-26.4 32.5v349.1c2 0 4.1-2 6.1-2l249.6-131.9c16.2-8.1 26.4-24.4 26.4-32.5V395.7c-2 0-4 2-6.1 2z m0 0"></path></svg></span> <?php echo $wo['lang']['my_products']; ?>
						</div>
					</div>
				</div>
				<br><br>
				<div class="wo_my_pages">
					<div class="row my_products">
						<h3 class="search-filter-center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="18" viewBox="0 0 576 512"><path d="M547.6 103.8L490.3 13.1C485.2 5 476.1 0 466.4 0H109.6C99.9 0 90.8 5 85.7 13.1L28.3 103.8c-29.6 46.8-3.4 111.9 51.9 119.4c4 .5 8.1 .8 12.1 .8c26.1 0 49.3-11.4 65.2-29c15.9 17.6 39.1 29 65.2 29c26.1 0 49.3-11.4 65.2-29c15.9 17.6 39.1 29 65.2 29c26.2 0 49.3-11.4 65.2-29c16 17.6 39.1 29 65.2 29c4.1 0 8.1-.3 12.1-.8c55.5-7.4 81.8-72.5 52.1-119.4zM499.7 254.9l-.1 0c-5.3 .7-10.7 1.1-16.2 1.1c-12.4 0-24.3-1.9-35.4-5.3V384H128V250.6c-11.2 3.5-23.2 5.4-35.6 5.4c-5.5 0-11-.4-16.3-1.1l-.1 0c-4.1-.6-8.1-1.3-12-2.3V384v64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V384 252.6c-4 1-8 1.8-12.3 2.3z"/></svg> Selecciona una tienda para continuar <br><hr><br> <a href="<?php echo lui_SeoLink('index.php?link1=tiendas'); ?>" data-ajax="?link1=tiendas" class="btn btn-main">Seleccionar tienda</a></h3>

					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
	
<?php endif ?>
<script type="text/javascript">recpoll()</script>