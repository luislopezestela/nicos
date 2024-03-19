<?php echo lui_LoadPage("sidebar/left-sidebar"); ?>
<style type="text/css">
	body{background-color:#F0F2FD;}
	.wow_main_blogs{background-color:#fff;box-shadow:0 1px 2px rgba(0, 0, 0, 0.2);border-radius:6px;margin-bottom:30px;}
.view-blog{color:#666;font-size:14.5px;line-height:17px;}
.wow_main_blogs .avatar{display:block;position:relative;padding-bottom:80%;}
.wow_main_blogs .avatar > img{width:100%;border-radius:6px;position:absolute;top:0;right:0;bottom:0;left:0;height:100%;object-fit:cover;vertical-align:middle;}
.wow_main_blogs_info{width:100%;border-radius:6px;position:absolute;top:0;right:0;bottom:0;left:0;height:100%;background:linear-gradient(180deg, rgb(0 0 0 / 0%) 0%, rgba(0, 0, 0, 0.3) 35%, rgba(0, 0, 0, 0.3) 75%, rgb(0 0 0 / 50%) 100%);padding:20px;display:flex;flex-direction:column;font-family:Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif;justify-content:flex-end;align-items:flex-start;}
.wow_main_blogs_info > .postCategory{display:inline-block;text-decoration:none;color:#ffffff;margin-bottom:auto;background-color:rgb(0 0 0 / 70%);padding:4px 10px;border-radius:6px;}
.wow_main_blogs_info > h2{margin:10px 0;font-size:24px;text-overflow:ellipsis;white-space:nowrap;overflow:hidden;max-width:100%;color:#fff;height:24px;}
.wow_main_blogs_info > h2 a{text-decoration:none;color:white;}
.wow_main_blogs_info > .postMeta--author-text, .wow_main_blogs_info > .postMeta--author-text a{color:rgba(255, 255, 255, 0.8);text-decoration:none;}
.postMeta--author-text{vertical-align:middle;display:table-cell;overflow:hidden;}
.middot{margin:0 6px;font-size:14.5px;line-height:1.1;font-weight:700;}
.wow_main_blogs_info > .wow_main_blogs_btns{margin:15px -5px 0;}
.wow_main_blogs_info > .wow_main_blogs_btns .btn{margin:0 5px;}
.wow_main_blogs_info > .btn, .wow_main_blogs_info > .wow_main_blogs_btns .btn{max-width:160px;background-color:white;color:black;margin-top:15px;}
.btn{display:inline-block;touch-action:manipulation;cursor:pointer;}
.btn-mat{white-space:nowrap;vertical-align:middle;background-image:none;position:relative;user-select:none;outline:0;border:none;-webkit-tap-highlight-color:transparent;text-decoration:none;text-align:center;min-width:64px;line-height:36px;padding:0 16px;border-radius:max(0px, min(8px, calc((100vw - 4px - 100%) * 9999))) / 8px;transform:translate3d(0,0,0);transition:background .4s cubic-bezier(.25,.8,.25,1),box-shadow 280ms cubic-bezier(.4,0,.2,1);font-size:15px;overflow:hidden;font-family:Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif;}
.btn-mat::before{content:"";position:absolute;left:0;right:0;top:0;bottom:0;background-color:currentColor;opacity:0;transition:opacity 0.2s;}
.btn-mat::after{content:"";position:absolute;left:50%;top:50%;border-radius:50%;padding:50%;width:32px;height:32px;background-color:currentColor;opacity:0;transform:translate(-50%, -50%) scale(1);transition:opacity 1s, transform 0.5s;}
.btn-mat:active::after{opacity:0.16;transform:translate(-50%, -50%) scale(0);transition:transform 0s;}
.btn.active, .btn:active{background-image:none;outline:0;-webkit-box-shadow:inset 0 1px 3px rgba(0,0,0,.125);box-shadow:inset 0 1px 3px rgba(0,0,0,.125);}
.modal{position:fixed;z-index:1050;display:none;-webkit-overflow-scrolling:touch;outline:0}
.modal.fade .modal-dialog{-webkit-transition: -webkit-transform .3s ease-out;-o-transition:-o-transform .3s ease-out;transition:transform .3s ease-out;-webkit-transform:translate(0,-25%);-ms-transform:translate(0,-25%);-o-transform:translate(0,-25%);transform:translate(0,-25%);}
.modal.in .modal-dialog{-webkit-transform: translate(0,0);-ms-transform: translate(0,0);-o-transform: translate(0,0);transform: translate(0,0)}
.modal-open .modal{overflow-x:hidden;overflow-y:auto}
.modal-dialog{position:relative;width:auto;margin:10px}
.modal-content{position:relative;background-color:#fff;background-clip:padding-box;border-radius:3px;outline:0;}
.modal-backdrop{position:fixed;z-index:1040;background-color:#000}
.modal-backdrop.fade{filter:alpha(opacity=0);opacity:0}
.modal-backdrop.in{filter:alpha(opacity=50);opacity:.5}
.modal-header{min-height:16.43px;background:#fcfcfc;padding:10px;border-top-right-radius:3px;border-bottom:1px solid #f1f1f1;border-top-left-radius:5px;}
.modal-header .close{margin-top: -2px}
.modal-title{margin:0;color:#666;font-size:15px;line-height:1.42857143;}
.modal-body{position:relative;padding:15px;}
.modal-footer{padding:5px;text-align:right;border-top:1px solid #f1f1f1;}
.modal-footer .btn+.btn{margin-bottom:0;margin-left:5px}
.modal-footer .btn-group .btn+.btn{margin-left:-1px}
.modal-footer .btn-block+.btn-block{margin-left:0}
.modal-scrollbar-measure{position:absolute;top:-9999px;width:50px;height:50px;overflow:scroll}
@media (min-width: 768px){
	.modal-dialog.big{width:800px!important}
  .modal-dialog{width:600px;margin:150px auto}
  .modal-content{-webkit-box-shadow:0 1px 5px rgba(0,0,0,.5);box-shadow:0 1px 5px rgba(0,0,0,.5);}
  .modal-sm{width:300px}
}
@media (min-width: 992px){
    .modal-lg{width:900px}
}
.modal,.modal-backdrop{top:0;right:0;bottom:0;left:0}
.wow_pops_head .close{position:absolute;top:18px;right:27px;padding:0;opacity:0.4;text-shadow:none;color:var(--header-color);}
button.close{-webkit-appearance:none;padding:0;cursor:pointer;background:0 0;border:0;}
.wow_pops_head h4 svg{width:127px;height:127px;margin:auto;background-color:rgba(255, 255, 255, 0.2);border-radius:50%;padding:5px;display:flex;justify-content:center;align-items:center;color:#d63031;}
</style>
<div class="columna-8 sett_page wo_new_sett_pagee main_layshane_configuration_user main_layshane_configuration_menu">
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
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M20,11H4V8H20M20,15H13V13H20M20,19H13V17H20M11,19H4V13H11M20.33,4.67L18.67,3L17,4.67L15.33,3L13.67,4.67L12,3L10.33,4.67L8.67,3L7,4.67L5.33,3L3.67,4.67L2,3V19A2,2 0 0,0 4,21H20A2,2 0 0,0 22,19V3L20.33,4.67Z"></path></svg></span> <?php echo $wo['lang']['blog']; ?>
					</div>
				</div>
				<a class="boton_add_nluis first" href="<?php echo lui_SeoLink('index.php?link1=create-blog');?>">
					<?php echo $wo['lang']['create'] ?>
				</a>
			</div>
			<br><br>
			<div class="wo_my_pages">
				<div class="row" id="blog-list">
					<?php  
						$pages          = lui_GetMyBlogs($wo["user"]['id']); 
						$no_blogs_found = $wo['lang']['no_blogs_created'];
					?>

					<?php if ($pages && count($pages) > 0): ?>
						<?php foreach ($pages as $wo['blog']): ?>
							<?php echo lui_LoadPage('blog/includes/card-lg-list'); ?>
						<?php endforeach ?>
					<?php else: ?> 
						<?php echo '<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20,11H4V8H20M20,15H13V13H20M20,19H13V17H20M11,19H4V13H11M20.33,4.67L18.67,3L17,4.67L15.33,3L13.67,4.67L12,3L10.33,4.67L8.67,3L7,4.67L5.33,3L3.67,4.67L2,3V19A2,2 0 0,0 4,21H20A2,2 0 0,0 22,19V3L20.33,4.67Z" /></svg>' . $no_blogs_found . '</div>'; ?>
					<?php endif; ?> 
				</div>
				
				<div class="loading-alert"></div>
            
				<div class="posts_load">
					<?php if (count($pages) >= 10): ?>
					<div class="load-more">
                        <button class="btn btn-default text-center pointer load-more-my-blogs">
                          <i class="fa fa-arrow-down progress-icon" data-icon="arrow-down"></i> 
                          <?php echo $wo['lang']['load_more'] ?>
                        </button>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo lui_LoadPage('blog/delete-blog');?>

<script>
$(document).ready(function() {
  $(".delete-blog").on("click", function() {
    $("#delete-blog").attr('data-blog-id', $(this).attr("id")).modal();      
  });

  $(".load-more-my-blogs").click(function () {
      let offset = (($(".view-blog").length > 0) ? $(".view-blog:last").attr('id') : 0);

      $.ajax({
         url: Wo_Ajax_Requests_File(),
         type: 'GET',
         dataType: 'json',
         data: {f:"load-my-blogs",offset:offset},
         success:function(data){
            if (data['status'] == 200) {
              $("#blog-list").append(data['html']);
            }

            else{
              $(".posts_load").remove();
            }
         }
      });
   });
});
recpoll()
</script>