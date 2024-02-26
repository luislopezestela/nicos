<style>
.content-container {
	margin: 0;width: 100%;height: 100%;padding: 0;
}
article {
	display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-box;
    display: flex;
    -webkit-flex-direction: column;
    flex-direction: column;
    min-height: calc(100vh - 20px);
    position: relative;
    width: 100%;font-family: "Roboto", sans-serif;
}
article:before, article:after {
    -webkit-box-flex: 1;
    box-flex: 1;
    -webkit-flex-grow: 1;
    flex-grow: 1;
    content: '';
    display: block;
    height: 24px;
}
article > div {
	margin: auto;
	width: 100%;
	max-width: 600px;
}
article > div img {
	width: 300px;
}
article > div h1 {
	margin: 60px 0 20px;
    font-weight: 400;
}
article > div p {
	margin: 10px 0 0;
    font-size: 16px;
    color: rgba(0, 0, 0, 0.65);
}

@media(max-width:990px){
footer .footer-wrapper{display:none !important;}
}
</style>
<article>
	<div>
		<img src="<?=$wo['config']['theme_url'];?>/img/firmware.svg" />
		<h1>¡Estaremos de vuelta pronto!</h1>
		<p>Disculpe las molestias, pero estamos realizando un mantenimiento en este momento. Si necesitas ayuda siempre puedes <a class="main" href="mailto:<?=$wo['config']['siteEmail']; ?>">Contactarte con nosotros</a>, de lo contrario, ¡volveremos a estar en línea en breve!</p>
		<p>&mdash; <?=$wo['config']['siteName'];?></p>
	</div>
</article>