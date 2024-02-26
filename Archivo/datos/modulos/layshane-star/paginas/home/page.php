<style type="text/css">
	.page_home_v{width:min(70rem, 100%);padding:20px;margin:auto;user-select:none;}
	.paage_welcome{width:100%;display:flex;position:relative;margin:20px auto;justify-content:flex-start;align-items:center;flex-wrap:wrap;}
	.paage_loader_s{display:flex;position:relative;margin:20px auto;justify-content:flex-start;align-items:center;border-bottom:1px solid transparent;flex-wrap:wrap;}
	.titulo_layshane_peru_h{font-size:22px;margin:10px 0;}
	@media only screen and (min-width: 920px){
		.productos_contenido,.loading_poruductos_cont{display:grid;width:100%;margin-inline:auto;grid-template-columns: repeat(4, minmax(min(12rem, 100%), 1fr));gap:2rem;}
	}
	@media only screen and (max-width: 919px){
		.productos_contenido,.loading_poruductos_cont{display:grid;width:100%;margin-inline:auto;grid-template-columns: repeat(3, minmax(min(12rem, 100%), 1fr));gap:2rem;}
	}
	@media only screen and (max-width: 685px){
		.productos_contenido,.loading_poruductos_cont{display:grid;width:100%;margin-inline:auto;grid-template-columns: repeat(2, minmax(min(12rem, 100%), 1fr));gap:2rem;}
	}
	@media only screen and (max-width: 470px){
		.productos_contenido,.loading_poruductos_cont{display:grid;width:100%;margin-inline:auto;grid-template-columns: repeat(auto-fill, minmax(min(12rem, 100%), 1fr));gap:2rem;}
	}
	.product_layshane,.loading_poruductos{display:grid;background:#fff;border-radius:50%;aspect-ratio: 1/1; box-shadow:0 1px 2px rgba(0, 0, 0, 0.2);margin:7px;overflow:hidden;position:relative;}
	.product_layshane a{display:flex;position:relative;max-width:100%;max-height:100%;border-radius:50%;}
	.product_layshane img{width:100%;height:100%;object-fit:contain;max-width:100%;max-height:100%;padding:0px;border-radius:50%;}
	.name_product{position:absolute;top:0;bottom:0;left:0;right:0;display:flex;flex-wrap:wrap;align-content:center;justify-content:center;color:#000;background:transparent;font-size:.0em;text-align:center;transition:all linear .5s;}
	.name_product:hover{color:#fff;background:rgba(0, 0, 0, 0.30);font-size:1.5em;}
	.loader_layshane{-webkit-animation-duration: 1s;-webkit-animation-fill-mode: forwards;-webkit-animation-iteration-count: infinite;-webkit-animation-name: placeHolderShimmer;-webkit-animation-timing-function: linear;background: #e6e6e6;background-image: linear-gradient(to right, #e6e6e6 0%, #d1d1d1 20%, #e6e6e6 40%, #e6e6e6 100%);background-repeat: no-repeat;background-size: 800px 100%;height: 100%;position: relative}
	
	.loader_layshane div {background: #ffffff;height: 6px;left: 0;position: absolute;right: 0}
	@-webkit-keyframes placeHolderShimmer {
	0% {background-position: -468px 0}
	100% {background-position: 468px 0}
	}
	@-webkit-keyframes prideShimmer {
	from {background-position: top left}
	to {background-position: top right  }
	}
</style>

<style type="text/css">
	.titulo_loader_w{width:100%;max-width:200px;display:block;height:30.42px;border-radius:20px;margin:10px 0;}
</style>
<?php
        $gd = gd_info();

        echo "<pre>";

        print_r($gd);

        echo "</pre>";
?>
<div class="page_home_v">
	<div id="posts-laoded" class="market_bottom">
		<div class="paage_loader_s">
			<div class="titulo_loader_w loader_layshane"></div>
		</div>
		<div class="loading_poruductos_cont">
			<div class="loading_poruductos">
				<div class="loader_layshane"></div>
			</div>
			<div class="loading_poruductos">
				<div class="loader_layshane"></div>
			</div>
			<div class="loading_poruductos">
				<div class="loader_layshane"></div>
			</div>
			<div class="loading_poruductos">
				<div class="loader_layshane"></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function() {
  loadposts();
});

function loadposts() {
	$("#posts-laoded").load(Wo_Ajax_Requests_File() + '?f=load_posts', function enter() {
		Wo_FinishBar();
		window.fbAsyncInit = function() {
		  FB.init({
			appId      : '',
			xfbml      : true,
			version    : 'v3.2'
		  });
		};
	  	$(".product-description").each(function(index, el) {
	  		ReadMoreText(this);
	  	});

	    $('#load-more-posts').show();

	});
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*60*60*1000));
    var expires = "expires="+ d;
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookieValue(a) {
    var b = document.cookie.match('(^|;)\\s*' + a + '\\s*=\\s*([^;]+)');
    return b ? b.pop() : '';
}
</script>
