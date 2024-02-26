<style type="text/css">
.alert-danger {
    background-color: rgba(244, 67, 54, 0.1);
    color: #F44336;
}
.alert{
    border: 0;
    font-weight: bold;
    font-family: Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif;
    padding: 15px;
    border-radius: 4px;
}
.container_acceder{
    width: 100vw;
    height: calc(100vh - 160px);
    display: grid;
    grid-template-columns: 1fr;
    grid-gap :7rem;
    padding: 0 2rem;
}

.login-content{
	display: flex;
	justify-content:center;
	align-items: center;
	text-align: center;
}
form{
	width: 360px;
}

.login-content .perfil_imagesvg{
    height: 100px;
    color:var(--boton-fondo);
    max-width:100%;
}
.terms{display:flex;padding:17px 0;}
.terms input{width:25px;height:25px;padding-right:7px;}
.terms label{padding:3px 10px;}
.errors, .success{padding: 12px;border-radius: 12px;border: 0;font-size: 15px;user-select:none;}
.errors:empty, .success:empty {padding: 0;}
.errors svg {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.login-content h2{
	margin: 15px 0;
	color: #333;
	text-transform: uppercase;
	font-size: 2.9rem;
	font-family:fantasy;
}

.login-content .input-div{
	position: relative;
    display: grid;
    grid-template-columns: 7% 93%;
    margin: 25px 0;
    padding: 5px 0;
    border-bottom: 2px solid #d9d9d9;
}

.login-content .input-div.one{
	margin-top: 0;
}

.i{
	color: #d9d9d9;
	display: flex;
	justify-content: center;
	align-items: center;
}

.i i{
	transition: .3s;
}

.input-div > div{
    position: relative;
	height: 45px;
}

.input-div > div > h5{
	position: absolute;
	left: 10px;
	top: 50%;
	transform: translateY(-50%);
	color: #999;
	font-size: 18px;
	transition: .3s;
}

.input-div:before, .input-div:after{
	content: '';
	position: absolute;
	bottom: -2px;
	width: 0%;
	height: 2px;
	background-color: #38d39f;
	transition: .4s;
}

.input-div:before{
	right: 50%;
}

.input-div:after{
	left: 50%;
}

.input-div.focus:before, .input-div.focus:after{
	width: 50%;
}

.input-div.focus > div > h5{
	top: -5px;
	font-size: 15px;
}

.input-div.focus > .i > i{
	color: #38d39f;
}

.input-div > div > input{
	position: absolute;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	border: none;
	outline: none;
	background: none;
	padding: 0.5rem 0.7rem;
	font-size: 1.2rem;
	color: #555;
	font-family: 'poppins', sans-serif;
}

.input-div.pass{
	margin-bottom: 4px;
}
.input-div.two{
	margin-bottom: 4px;
}
a{
	text-decoration: none;
	color: #999;
	font-size: 0.9rem;
	transition: .3s;
}

a:hover{
	color: #38d39f;
}
.random_users{margin-top:80px}
.users-profiles{padding:0;width:100%;margin:30px auto 0;text-align:center;display:block}
.user-image, .user-image img {width:44px;height:44px;border-radius:50%}
.user-image {display: inline-block;margin: -7px -4px;box-shadow: 0 0 0 2px #ffffff;}
.terms{padding-left:22px}
.terms input[type=checkbox]{opacity:0;margin:0 0 6px 4px;display:none}
.terms label::after,.terms label::before{display:inline-block;left:0;margin-left:-20px}
.terms label{padding-left: 20px;cursor: pointer;user-select: none;font-size: 16px;opacity: 0.9;}
.terms label::before{content:"";position:absolute;width: 24px;height: 24px;top: -1px;border: 2px solid #b4b4b4;border-radius: 5px;transition:all 90ms cubic-bezier(0,0,.2,.1)}
.terms input[type=checkbox]:checked+label::before{background-color:#1e2322;border-color:#1e2322}
.terms label::after{position:absolute;width:16px;height:16px;top:0;padding-left:3px;padding-top:1px;font-size:11px;color:#555}
.terms input[type=checkbox]:checked+label::after{border:2px solid #fff;border-top:none;border-right:none;content:"";height:5px;left:7px;position:absolute;top:7px;transform:rotate(-45deg);width:10px;transition:.2s;color:#fff}
.typed-cursor{opacity:1;-webkit-animation:blink .7s infinite;-moz-animation:blink .7s infinite;animation:blink .7s infinite;color:#e9e9e9;font-size:28px}@keyframes blink{0%,100%{opacity:1}50%{opacity:0}}@-webkit-keyframes blink{0%,100%{opacity:1}50%{opacity:0}}

.btn{
	display: block;
	width: 100%;
	height: 50px;
	border-radius: 25px;
	outline: none;
	border: none;
	background-image: linear-gradient(to right, #32be8f, #38d39f, #32be8f);
	background-size: 200%;
	font-size: 1.2rem;
	color: #fff;
	font-family: 'Poppins', sans-serif;
	text-transform: uppercase;
	margin: 1rem 0;
	cursor: pointer;
	transition: 777ms;
}
.btn:hover{
	background-position: right;
	display: block;
	background-image: linear-gradient(to left, aqua, #38d39f, lightcyan);
	transform: scale(104%);
}


@media screen and (max-width: 1050px){
	.container_acceder{
		grid-gap: 5rem;
	}
}

@media screen and (max-width: 1000px){
	form{
		width: 290px;
	}

	.login-content h2{
        font-size: 2.4rem;
        margin: 8px 0;
	}

	.img img{
		width: 400px;
	}
}

@media screen and (max-width: 900px){
	.container_acceder{
		grid-template-columns: 1fr;
	}

	.img{
		display: none;
	}

	.wave{
		display: none;
	}

	.login-content{
		justify-content: center;
	}
}
</style>
<div class="container_acceder">
   <div class="login-content">
      <div class="login_left_combo_parent">
         <div class="login_left_combo">
            <form id="login" method="post">
            	<svg class="perfil_imagesvg" data-name='Layer 1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='698' height='698' viewBox='0 0 698 698'><defs><linearGradient id='b247946c-c62f-4d08-994a-4c3d64e1e98f' x1='349' y1='698' x2='349' gradientUnits='userSpaceOnUse'><stop offset='0' stop-color='gray' stop-opacity='0.25'/><stop offset='0.54' stop-color='gray' stop-opacity='0.12'/><stop offset='1' stop-color='gray' stop-opacity='0.1'/></linearGradient></defs><title>profile pic</title><g opacity='0.5'><circle cx='349' cy='349' r='349' fill='url(#b247946c-c62f-4d08-994a-4c3d64e1e98f)'/></g><circle cx='349.68' cy='346.77' r='341.64' fill='#f5f5f5'/><path d='M601,790.76a340,340,0,0,0,187.79-56.2c-12.59-68.8-60.5-72.72-60.5-72.72H464.09s-45.21,3.71-59.33,67A340.07,340.07,0,0,0,601,790.76Z' transform='translate(-251 -101)' fill='currentColor'/><circle cx='346.37' cy='339.57' r='164.9' fill='#333'/><path d='M293.15,476.92H398.81a0,0,0,0,1,0,0v84.53A52.83,52.83,0,0,1,346,614.28h0a52.83,52.83,0,0,1-52.83-52.83V476.92a0,0,0,0,1,0,0Z' opacity='0.1'/><path d='M296.5,473h99a3.35,3.35,0,0,1,3.35,3.35v81.18A52.83,52.83,0,0,1,346,610.37h0a52.83,52.83,0,0,1-52.83-52.83V476.35A3.35,3.35,0,0,1,296.5,473Z' fill='#fdb797'/><path d='M544.34,617.82a152.07,152.07,0,0,0,105.66.29v-13H544.34Z' transform='translate(-251 -101)' opacity='0.1'/><circle cx='346.37' cy='372.44' r='151.45' fill='#fdb797'/><path d='M489.49,335.68S553.32,465.24,733.37,390l-41.92-65.73-74.31-26.67Z' transform='translate(-251 -101)' opacity='0.1'/><path d='M489.49,333.78s63.83,129.56,243.88,54.3l-41.92-65.73-74.31-26.67Z' transform='translate(-251 -101)' fill='#333'/><path d='M488.93,325a87.49,87.49,0,0,1,21.69-35.27c29.79-29.45,78.63-35.66,103.68-69.24,6,9.32,1.36,23.65-9,27.65,24-.16,51.81-2.26,65.38-22a44.89,44.89,0,0,1-7.57,47.4c21.27,1,44,15.4,45.34,36.65.92,14.16-8,27.56-19.59,35.68s-25.71,11.85-39.56,14.9C608.86,369.7,462.54,407.07,488.93,325Z' transform='translate(-251 -101)' fill='#333'/><ellipse cx='194.86' cy='372.3' rx='14.09' ry='26.42' fill='#fdb797'/><ellipse cx='497.8' cy='372.3' rx='14.09' ry='26.42' fill='#fdb797'/></svg>

               <h2 class="title"><?=str_replace(array('{site_name}', '{Site_Name}', '{sito_name}'), array($wo['config']['siteName'], $wo['config']['siteName'], $wo['config']['siteName']), $wo['lang']['login'])?></h2>
            <div class="alert alert-danger errors"></div>
            <div class="input-div one">
            	<div class="i">
           		   	<i><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="14" viewBox="0 0 448 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg></i>
           		</div>
            	<div class="div">
               		<h5 for="username"><?php echo $wo['lang']['username']?></h5>
               		<input class="input" id="username" name="username" type="text" autocomplete="off" autofocus>
               </div>
            </div>
            <div class="input-div pass">
            	<div class="i">
           		   	<i><svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" height="16" width="14" viewBox="0 0 448 512"><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg></i>
           		</div>
           		<div class="div">
               		<h5><?php echo $wo['lang']['password']?></h5>
               		<input id="password" name="password" type="password" autocomplete="off" class="input">
               	</div>
            </div>
            <div class="forgot_password">
               <?php if ($wo['config']['remember_device'] == 1) { ?>
               	<br>
               <div class="terms">
                  <input type="checkbox" name="remember_device" id="remember_device" <?php echo ($wo['config']['remember_device'] == 1 ? 'checked' : ''); ?>>
                  <label for="remember_device">
                     <?php echo $wo['lang']['remember_device'] ?>
                  </label>
                  <div class="clear"></div>
               </div>
               <?php } ?>
               <a href="<?php echo lui_SeoLink('index.php?link1=forgot-password');?>" class="main"><?php echo $wo['lang']['forget_password']?></a>
            </div>

            <div class="login_signup_combo">
               <div class="login__">
                  <button type="submit" class="btn btn-main btn-mat add_wow_loader"><?php echo $wo['lang']['login']?></button>
               </div>

               <?php if ($wo['config']['facebookLogin'] != 0 ||
                        $wo['config']['googleLogin'] != 0 ||
                        $wo['config']['twitterLogin'] != 0 ||
                        $wo['config']['linkedinLogin'] != 0 ||
                        $wo['config']['VkontakteLogin'] != 0 ||
                        $wo['config']['instagramLogin'] != 0 ||
                        $wo['config']['qqLogin'] != 0 ||
                        $wo['config']['WeChatLogin'] != 0 ||
                        $wo['config']['DiscordLogin'] != 0 ||
                        $wo['config']['MailruLogin'] != 0 ||
                        $wo['config']['OkLogin'] != 0
                     ) { ?>
               <div class="social_btns">
                  <p><?php echo $wo['lang']['or_login_with']?></p>
                  <?php if($wo['config']['facebookLogin'] != 0): ?>
                     <a href="<?php echo $wo['facebookLoginUrl']?>" class="btn no_padd">
                        <svg height="512" viewBox="0 0 152 152" width="512" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><g id="_01.facebook" data-name="01.facebook"><circle id="background" cx="76" cy="76" fill="#334c8c" r="76"/><path id="icon" d="m95.26 68.81-1.26 10.58a2 2 0 0 1 -2 1.78h-11v31.4a1.42 1.42 0 0 1 -1.4 1.43h-11.21a1.42 1.42 0 0 1 -1.4-1.44l.06-31.39h-8.33a2 2 0 0 1 -2-2v-10.58a2 2 0 0 1 2-2h8.28v-10.26c0-11.87 7.06-18.33 17.4-18.33h8.47a2 2 0 0 1 2 2v8.91a2 2 0 0 1 -2 2h-5.19c-5.62.09-6.68 2.78-6.68 6.8v8.85h12.31a2 2 0 0 1 1.95 2.25z" fill="#fff"/></g></g></svg>
                     </a>
                  <?php endif; ?>
                  <?php if($wo['config']['googleLogin'] != 0): ?>
                     <!-- <a href="<?php echo $wo['googleLoginUrl']?>" class="btn btn-google"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M23,11H21V9H19V11H17V13H19V15H21V13H23M8,11V13.4H12C11.8,14.4 10.8,16.4 8,16.4C5.6,16.4 3.7,14.4 3.7,12C3.7,9.6 5.6,7.6 8,7.6C9.4,7.6 10.3,8.2 10.8,8.7L12.7,6.9C11.5,5.7 9.9,5 8,5C4.1,5 1,8.1 1,12C1,15.9 4.1,19 8,19C12,19 14.7,16.2 14.7,12.2C14.7,11.7 14.7,11.4 14.6,11H8Z"></path></svg></a> -->
                  <?php endif; ?>
                  <?php if($wo['config']['twitterLogin'] != 0): ?>
                     <a href="<?php echo $wo['twitterLoginUrl']?>" class="btn no_padd">
                        <svg height="512" viewBox="0 0 152 152" width="512" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><g id="_02.twitter" data-name="02.twitter"><circle id="background" cx="76" cy="76" fill="#00a6de" r="76"/><path id="icon" d="m113.85 53a32.09 32.09 0 0 1 -6.51 7.15 2.78 2.78 0 0 0 -1 2.17v.25a45.58 45.58 0 0 1 -2.94 15.86 46.45 46.45 0 0 1 -8.65 14.5 42.73 42.73 0 0 1 -18.75 12.39 46.9 46.9 0 0 1 -14.74 2.29 45 45 0 0 1 -22.6-6.09 1.3 1.3 0 0 1 -.62-1.44 1.25 1.25 0 0 1 1.22-.94h1.9a30.24 30.24 0 0 0 16.94-5.14 16.42 16.42 0 0 1 -13-11.16.86.86 0 0 1 1-1.11 15.08 15.08 0 0 0 2.76.26h.35a16.43 16.43 0 0 1 -9.57-15.11.86.86 0 0 1 1.27-.75 14.44 14.44 0 0 0 3.74 1.45 16.42 16.42 0 0 1 -2.65-19.92.86.86 0 0 1 1.41-.12 42.93 42.93 0 0 0 29.51 15.78h.08a.62.62 0 0 0 .6-.67 17.36 17.36 0 0 1 .38-6 15.91 15.91 0 0 1 10.7-11.44 17.59 17.59 0 0 1 5.19-.8 16.36 16.36 0 0 1 10.84 4.09 2.12 2.12 0 0 0 1.41.54 2.15 2.15 0 0 0 .5-.07 30 30 0 0 0 8-3.31.85.85 0 0 1 1.25 1 16.23 16.23 0 0 1 -4.31 6.87 30.2 30.2 0 0 0 5.24-1.77.86.86 0 0 1 1.05 1.24z" fill="#fff"/></g></g></svg>
                     </a>
                  <?php endif; ?>
                  <?php if($wo['config']['linkedinLogin'] != 0): ?>
                     <a href="<?php echo $wo['linkedInLoginUrl']?>" class="btn no_padd">
                        <svg height="512" viewBox="0 0 152 152" width="512" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><g id="_10.linkedin" data-name="10.linkedin"><circle id="background" cx="76" cy="76" fill="#0b69c7" r="76"/><g id="icon" fill="#fff"><path d="m59 48.37a10.38 10.38 0 1 1 -10.37-10.37 10.38 10.38 0 0 1 10.37 10.37z"/><rect height="50.93" rx="2.57" width="16.06" x="40.6" y="63.07"/><path d="m113.75 89.47v22.17a2.36 2.36 0 0 1 -2.36 2.36h-11.72a2.36 2.36 0 0 1 -2.36-2.36v-21.48c0-3.21.93-14-8.38-14-7.22 0-8.69 7.42-9 10.75v24.78a2.36 2.36 0 0 1 -2.34 2.31h-11.34a2.35 2.35 0 0 1 -2.36-2.36v-46.2a2.36 2.36 0 0 1 2.36-2.37h11.34a2.37 2.37 0 0 1 2.41 2.37v4c2.68-4 6.66-7.12 15.13-7.12 18.73-.01 18.62 17.52 18.62 27.15z"/></g></g></g></svg>
                     </a>
                  <?php endif; ?>
                  <?php if($wo['config']['VkontakteLogin'] != 0): ?>
                     <a href="<?php echo $wo['VkontakteLoginUrl']?>" class="btn no_padd">
                        <svg height="512" viewBox="0 0 152 152" width="512" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><g id="_19.vk" data-name="19.vk"><circle id="background" cx="76" cy="76" fill="#4065d6" r="76"/><path id="icon" d="m111.05 97.72c-1.78.25-10.43 0-10.88 0a8.51 8.51 0 0 1 -6-2.39c-1.83-1.76-3.48-3.7-5.23-5.53a15.73 15.73 0 0 0 -1.71-1.55c-1.43-1.09-2.84-.84-3.51.84a31.9 31.9 0 0 0 -1.08 5.57 3 3 0 0 1 -3.11 2.88c-1.18.06-2.36.09-3.53.06a27 27 0 0 1 -12.23-3 33.45 33.45 0 0 1 -10.45-9.14 110.55 110.55 0 0 1 -11.58-19c-.17-.34-3.54-7.51-3.62-7.84a2 2 0 0 1 .93-2.6c.6-.23 11.71 0 11.89 0a3.88 3.88 0 0 1 3.73 2.69 58 58 0 0 0 8.33 14.58 7.8 7.8 0 0 0 1.69 1.55 1.28 1.28 0 0 0 2.14-.65 18.29 18.29 0 0 0 .77-4.45c.06-3 0-5-.17-8a3.89 3.89 0 0 0 -3.61-4.11c-.88-.15-1-.87-.39-1.59 1.17-1.49 2.79-1.73 4.55-1.82 2.66-.15 5.33 0 8 0h.58a17.15 17.15 0 0 1 3.49.35 3.18 3.18 0 0 1 2.53 2.84 11.73 11.73 0 0 1 .18 2.29c-.07 3.27-.23 6.54-.27 9.82a17.84 17.84 0 0 0 .35 3.86c.39 1.74 1.58 2.18 2.8.91a44 44 0 0 0 4.17-5.22 52.08 52.08 0 0 0 5.54-10.75c.77-1.94 1.36-2.37 3.45-2.37h11.79a7 7 0 0 1 2.08.28 1.8 1.8 0 0 1 1.24 2.32 19.55 19.55 0 0 1 -3.48 6.9c-2.4 3.39-4.92 6.7-7.38 10a12.72 12.72 0 0 0 -.85 1.35c-.92 1.66-.85 2.6.48 4 2.14 2.2 4.43 4.27 6.49 6.53a38.34 38.34 0 0 1 4.1 5.31c1.52 2.44.59 4.68-2.22 5.08z" fill="#fff"/></g></g></svg>
                     </a>
                  <?php endif; ?>
                  <?php if($wo['config']['instagramLogin'] != 0): ?>
                     <a href="<?php echo $wo['instagramLoginUrl']?>" class="btn no_padd">
                        <svg height="512" viewBox="0 0 152 152" width="512" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><linearGradient id="linear-gradientt" gradientUnits="userSpaceOnUse" x1="76" x2="76" y1="151.3" y2="10.3"><stop offset="0" stop-color="#e09b3d"/><stop offset=".24" stop-color="#c74c4d"/><stop offset=".65" stop-color="#c21975"/><stop offset="1" stop-color="#7024c4"/></linearGradient><g data-name="Layer 2"><g id="_05.instagram" data-name="05.instagram"><circle id="background" cx="76" cy="76" fill="url(#linear-gradientt)" r="76"/><g id="icon" fill="#fff"><path d="m91.36 38h-30.72a22.67 22.67 0 0 0 -22.64 22.64v30.72a22.67 22.67 0 0 0 22.64 22.64h30.72a22.66 22.66 0 0 0 22.64-22.64v-30.72a22.67 22.67 0 0 0 -22.64-22.64zm15 53.36a15 15 0 0 1 -15 15h-30.72a15 15 0 0 1 -15-15v-30.72a15 15 0 0 1 15-15h30.72a15 15 0 0 1 15 15z"/><path d="m76 56.35a19.66 19.66 0 1 0 19.65 19.65 19.67 19.67 0 0 0 -19.65-19.65zm0 31.65a12 12 0 1 1 12-12 12 12 0 0 1 -12 12z"/><circle cx="95.77" cy="56.35" r="4.86"/></g></g></g></svg>
                     </a>
                  <?php endif; ?>
                  <?php if($wo['config']['qqLogin'] != 0): ?>
                     <a href="<?php echo $wo['QQLoginUrl']?>" class="btn btn-instagram btn-qq"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 98.802 98.803" fill="currentColor"> <g> <g> <path d="M95.568,57.454c-1.74-4.367-3.976-8.49-6.733-12.316c-0.295-0.408-0.602-0.729-0.329-1.404 c1.326-3.281,0.896-6.463-0.798-9.515c-0.763-1.376-1.668-2.684-1.755-4.342c-0.127-2.393-0.734-4.692-1.356-6.994 c-2.17-8.031-6.494-14.449-13.937-18.479c-4.224-2.287-8.764-3.589-13.545-4.115C52.19-0.253,47.321-0.04,42.472,0.987 c-8.02,1.701-13.92,6.429-18.489,12.984c-3.001,4.308-5.137,8.993-5.776,14.3c-0.123,1.021,0.25,2.146-0.41,3.085 c-0.573,0.812-0.9,1.724-1.063,2.675c-0.245,1.425-0.573,2.778-1.304,4.073c-0.888,1.57-1.127,3.374-0.764,5.138 c0.157,0.758-0.005,1.153-0.531,1.548c-3.109,2.327-5.68,5.131-7.84,8.373c-3.077,4.616-4.894,9.619-5.189,15.16 c-0.119,2.225,0.15,4.398,0.933,6.505c0.379,1.02,0.88,1.498,2.084,1.148c1.013-0.293,1.878-0.748,2.645-1.423 c1.6-1.404,2.905-3.04,3.769-5.004c0.1-0.228,0.074-0.579,0.439-0.561c0.332,0.016,0.363,0.306,0.42,0.573 c0.518,2.398,1.633,4.556,2.829,6.659c1.276,2.247,3.105,4.056,5.017,5.75c0.667,0.592,1.614,0.868,1.987,1.871 c-1.38-0.002-2.656,0.194-3.863,0.609c-2.062,0.711-3.895,1.764-4.372,4.145c-0.456,2.275-0.613,4.522,1.467,6.206 c0.823,0.666,1.734,1.195,2.716,1.614c3.463,1.477,7.142,1.956,10.837,2.194c4.568,0.294,9.156,0.404,13.635-0.838 c2.596-0.722,4.999-1.891,7.251-3.366c0.213-0.14,0.354-0.46,0.658-0.372c1.79,0.518,3.677-0.02,5.49,0.687 c2.91,1.136,5.917,2.001,9.02,2.501c4.605,0.744,9.227,1.093,13.874,0.502c3.149-0.401,6.235-1.094,8.993-2.768 c3.546-2.153,3.654-5.891,0.326-8.31c-1.64-1.192-3.38-2.186-5.205-3.05c-0.472-0.223-0.991-0.376-1.364-0.893 c3.672-3.374,5.523-7.843,7.374-12.409c1.054,1.952,2.08,3.805,3.441,5.433c1.449,1.731,2.711,1.69,4.132-0.04 c0.566-0.69,0.981-1.451,1.239-2.315C98.51,67.896,97.619,62.604,95.568,57.454z M55.018,22.695 c-0.062-2.094,0.374-4.126,1.512-5.984c2.2-3.594,5.927-3.671,8.122-0.082c1.899,3.109,1.954,7.003,0.982,10.438 c-0.47,1.66-1.153,3.151-2.801,3.994c-2.239,1.145-4.307,0.692-5.812-1.331C55.482,27.662,54.927,25.299,55.018,22.695z M40.416,15.943c2.095-2.708,5.158-2.722,7.237-0.017c1.574,2.05,2.052,4.435,2.091,7.159c-0.076,2.407-0.588,4.892-2.398,6.899 c-2.086,2.315-4.877,2.194-6.817-0.231C37.729,26.254,37.674,19.486,40.416,15.943z M31.089,39.146 c3.005-2.065,6.387-3.264,9.902-4.027c7.729-1.682,15.478-1.892,23.2,0.086c3.134,0.803,6.169,1.89,8.897,3.668 c1.692,1.104,1.673,1.513-0.021,2.552c-1.81,1.109-3.694,2.027-6.063,2.02c0.854-0.947,1.935-1.479,2.597-2.923 c-11.517,7.921-22.792,8.559-34.122,0.353c0.501,0.808,1.002,1.614,1.618,2.606c-2.195-0.55-4.16-1.071-5.952-2.04 C29.729,40.672,29.748,40.068,31.089,39.146z M45.498,94.378c-1.388,1.356-3.231,1.805-4.997,2.193 c-6.68,1.475-13.408,1.794-20.09,0.042c-2.074-0.543-4.159-1.262-5.741-2.864c-1.172-1.185-1.151-2.205,0.02-3.421 c0.726-0.755,1.572-1.359,2.358-2.14c-0.603,0.107-1.211,0.196-1.808,0.337c-0.297,0.069-0.646,0.303-0.824-0.039 c-0.122-0.235-0.103-0.648,0.025-0.892c0.29-0.544,0.689-1.041,1.236-1.357c0.763-0.443,1.53-0.892,2.332-1.255 c1.908-0.865,3.584-0.936,5.472,0.514c3.637,2.791,7.861,4.532,12.245,5.885c3.109,0.96,6.28,1.586,9.487,2.072 c0.244,0.038,0.583-0.093,0.711,0.2C46.091,94.035,45.705,94.175,45.498,94.378z M81.455,84.153 c1.248,0.611,2.564,1.141,4.022,2.31c-1.181,0.092-2.198,0.127-3.067,0.681c-0.171,0.106-0.416,0.311-0.405,0.454 c0.028,0.373,0.373,0.263,0.621,0.262c1.151-0.001,2.304-0.059,3.452,0.001c2.125,0.109,3.197,1.731,2.403,3.692 c-1.039,2.568-3.396,3.5-5.763,4.248c-7.481,2.366-14.902,1.625-22.27-0.625c-0.812-0.249-1.776-0.215-2.169-1.324 c7.716-1.221,14.533-4.239,20.361-9.354C79.717,83.552,80.247,83.559,81.455,84.153z M84.223,68.128 c-0.26,4.43-1.97,8.329-4.652,11.788c-5.173,6.673-11.993,10.796-20.188,12.656c-3.104,0.706-6.256,0.349-9.376,0.045 c-4.791-0.465-9.515-1.327-13.972-3.219c-2.77-1.177-5.435-2.546-7.813-4.473c-4.629-3.753-8.246-8.165-9.446-14.146 c-1.086-5.412-0.645-10.715,1.674-15.791c0.164-0.358,0.373-0.696,0.543-1.052c0.414-0.856,0.823-1.223,1.793-0.484 c1.042,0.791,2.265,1.348,3.431,1.966c0.447,0.237,0.563,0.432,0.49,1.003c-0.504,4.039-0.938,8.08-0.483,12.171 c0.272,2.438,1.731,3.976,3.747,4.851c2.783,1.207,5.785,1.057,8.735,0.577c1.204-0.195,2.569-1.76,2.516-3.548l-0.192-8.102 l-0.069-1.684c3.209,0.899,6.507,1.185,9.782,1.263c7.792,0.186,15.094-1.702,22.083-5.021c2.072-0.983,4.073-2.088,5.977-3.359 c0.473-0.315,0.655-0.347,1.007,0.171C82.755,58.09,84.538,62.793,84.223,68.128z M36.888,64.798l-0.091-3.047 c0.059-0.565-0.266-1.596,0.643-1.748c1.124-0.188,2.169,0.613,2.277,1.747c0.269,2.827,0.451,5.684,0.349,8.552 c-0.049,1.381-0.726,2.211-2.281,2.291c-2.221,0.117-4.431,0.192-6.611-0.293c-3.059-0.683-4.14-2.181-4.231-5.647 c-0.087-3.265,0.691-6.405,1.279-9.576c0.094-0.508,0.288-0.49,0.706-0.312c1.94,0.832,3.841,1.771,5.895,2.308 c0.619,0.161,0.524,0.587,0.541,1.025c0.076,2.042,0.341,4.055,1.032,5.99c0.113,0.316,0.279,0.617,0.525,1.172L36.888,64.798z M87.863,41.959c-0.713,3.928-2.98,6.794-6.25,8.828c-6.996,4.354-14.417,7.735-22.591,9.235 c-4.74,0.869-9.478,0.834-14.262,0.222c-5.7-0.728-11.113-2.364-16.314-4.708c-4.34-1.956-8.464-4.3-11.461-8.165 c-2.191-2.824-2.488-5.776-0.475-8.403c0.613,3.759,2.714,6.468,5.648,8.647c-1.113-1.906-2.246-3.8-3.333-5.72 c-1.16-2.046-1.057-4.28-0.949-6.513c0.127-0.013,0.255-0.054,0.276-0.023c3.985,5.908,9.673,9.502,16.248,11.818 c8.313,2.933,16.929,3.846,25.633,2.862c8.854-1,16.799-4.403,23.481-10.46c0.426-0.385,0.882-0.734,1.218-1.014 c-1.527,6.333-6.051,10.371-11.515,13.634c7.514-2.716,11.403-8.663,14.022-15.749C88.027,37.638,88.234,39.91,87.863,41.959z"/> <path d="M57.824,24.385c0.522,0.103,0.59-0.406,0.691-0.783c0.194-0.719,0.302-1.658,1.196-1.672 c0.82-0.011,0.854,0.921,0.957,1.529c0.082,0.484,0.37,0.993,0.901,0.919c0.674-0.094,0.597-3.508-1.134-4.097 c-1.595-0.601-3.162,0.939-3.122,3.106C57.321,23.776,57.325,24.288,57.824,24.385z"/> <path d="M46.776,26.242c0.833,0.062,1.306-0.495,1.617-1.142c0.776-1.614,0.754-3.243-0.183-4.788 c-0.681-1.121-1.811-1.173-2.591-0.158c-0.619,0.805-0.779,1.753-0.757,2.742c0.015,0.705,0.073,1.401,0.379,2.056 C45.552,25.621,45.975,26.179,46.776,26.242z"/> </g> </g></svg></a>
                  <?php endif; ?>
                  <?php if($wo['config']['WeChatLogin'] != 0): ?>
                     <a href="<?php echo $wo['WeChatLoginUrl']?>" class="btn no_padd">
                        <svg height="512" viewBox="0 0 152 152" width="512" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><g id="_35.we_chat" data-name="35.we chat"><circle id="background" cx="76" cy="76" fill="#31d100" r="76"/><g id="icon" fill="#fff"><path d="m102.74 68.41c-20.21-10.28-43.18 8.59-32.67 25.9 4.87 8.13 16.13 13.26 29.44 9.41 2.67 1 5 2.71 7.62 4-.66-2.24-1.38-4.46-2.14-6.67 13.77-9.81 10.75-26-2.25-32.59zm-16.13 11.67a3.12 3.12 0 1 1 -4-4 3.14 3.14 0 0 1 4 4zm15.12.29a3.17 3.17 0 0 1 -5 .86 4.84 4.84 0 0 1 -1.09-2.32c.33-1.46 1.33-3 3-3a3.18 3.18 0 0 1 3.08 4.49z"/><path d="m93.14 64.17a24.06 24.06 0 0 0 -12.14-15.82h.09c-21.2-12-47.59 4.73-42.49 24.43 1.4 5.85 5.45 10.75 10.4 14.02q-1.43 4-2.71 8.11c3.09-1.62 6.17-3.31 9.26-5a34.26 34.26 0 0 0 11.54 1.69c-4.87-14 7.61-28.74 26.05-27.43zm-19.23-8.1a3.9 3.9 0 0 1 5.23 3.76c0 3.05-4 5-6.31 2.89a3.92 3.92 0 0 1 1.08-6.65zm-13.91 4.58a3.91 3.91 0 0 1 -6.16 2.15 3.9 3.9 0 1 1 6.16-2.15z"/></g></g></g></svg>
                     </a>
                  <?php endif; ?>
                  <?php if($wo['config']['DiscordLogin'] != 0): ?>
                     <a href="<?php echo $wo['DiscordLoginUrl']?>" class="btn no_padd">
                        <svg height="512" viewBox="0 0 152 152" width="512" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><g id="_75.discord" data-name="75.discord"><circle id="background" cx="76" cy="76" fill="#5046af" r="76"/><g id="icon" fill="#fff"><path d="m49.34 105.12h45.15l-2.16-7 5.16 4.43 4.73 4.23 8.61 7.2v-68.14a8.4 8.4 0 0 0 -8.38-7.84h-53.1a8.08 8.08 0 0 0 -8.18 7.84v51.44a7.92 7.92 0 0 0 8.17 7.84zm33.4-49.12h-.11zm-24.17 4a19.59 19.59 0 0 1 11.19-4l.43.43c-7.1 1.69-10.32 4.87-10.32 4.87s.86-.42 2.36-1.07a36.15 36.15 0 0 1 29.69 1.27s-3.23-3-9.89-4.87l.59-.58a19.48 19.48 0 0 1 11 4 48.9 48.9 0 0 1 5.84 22.23c-.18-.28-3.61 5.27-12.46 5.46 0 0-1.49-1.7-2.56-3.17 5.17-1.48 7.1-4.45 7.1-4.45a47.71 47.71 0 0 1 -4.5 2.34 30.06 30.06 0 0 1 -5.78 1.69c-9.14 1.48-14.26-1-19.11-3l-1.65-.85s1.92 3 6.88 4.45c-1.28 1.53-2.57 3.25-2.57 3.25-8.82-.21-12-5.72-12-5.72a49 49 0 0 1 5.76-22.28z"/><path d="m83.31 78.44a4.24 4.24 0 0 0 0-8.47 4.23 4.23 0 0 0 0 8.46z"/><path d="m68.69 78.44a4.24 4.24 0 0 0 0-8.47 4.23 4.23 0 0 0 0 8.46z"/></g></g></g></svg>
                     </a>
                  <?php endif; ?>
                  <?php if($wo['config']['MailruLogin'] != 0): ?>
                     <a href="<?php echo $wo['MailruLoginUrl']?>" class="btn btn-instagram btn-mailru"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M12,15C12.81,15 13.5,14.7 14.11,14.11C14.7,13.5 15,12.81 15,12C15,11.19 14.7,10.5 14.11,9.89C13.5,9.3 12.81,9 12,9C11.19,9 10.5,9.3 9.89,9.89C9.3,10.5 9,11.19 9,12C9,12.81 9.3,13.5 9.89,14.11C10.5,14.7 11.19,15 12,15M12,2C14.75,2 17.1,3 19.05,4.95C21,6.9 22,9.25 22,12V13.45C22,14.45 21.65,15.3 21,16C20.3,16.67 19.5,17 18.5,17C17.3,17 16.31,16.5 15.56,15.5C14.56,16.5 13.38,17 12,17C10.63,17 9.45,16.5 8.46,15.54C7.5,14.55 7,13.38 7,12C7,10.63 7.5,9.45 8.46,8.46C9.45,7.5 10.63,7 12,7C13.38,7 14.55,7.5 15.54,8.46C16.5,9.45 17,10.63 17,12V13.45C17,13.86 17.16,14.22 17.46,14.53C17.76,14.84 18.11,15 18.5,15C18.92,15 19.27,14.84 19.57,14.53C19.87,14.22 20,13.86 20,13.45V12C20,9.81 19.23,7.93 17.65,6.35C16.07,4.77 14.19,4 12,4C9.81,4 7.93,4.77 6.35,6.35C4.77,7.93 4,9.81 4,12C4,14.19 4.77,16.07 6.35,17.65C7.93,19.23 9.81,20 12,20H17V22H12C9.25,22 6.9,21 4.95,19.05C3,17.1 2,14.75 2,12C2,9.25 3,6.9 4.95,4.95C6.9,3 9.25,2 12,2Z"></path></svg></a>
                  <?php endif; ?>
                  <?php if($wo['config']['OkLogin'] != 0): ?>
                     <a href="<?php echo $wo['OkLoginUrl']?>" class="btn btn-instagram btn-ok">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g id="surface1">
                        <path style=" stroke:none;fill-rule:nonzero;fill:rgb(88.627451%,49.411765%,20.784314%);fill-opacity:1;" d="M 24 12 C 24 24 24 24 12 24 C 0 24 0 24 0 12 C 0 0 0 0 12 0 C 24 0 24 0 24 12 Z M 24 12 "/>
                        <path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;" d="M 13.878906 16.082031 C 14.828125 15.863281 15.738281 15.488281 16.578125 14.960938 C 17.210938 14.5625 17.40625 13.722656 17.003906 13.085938 C 16.601562 12.449219 15.765625 12.253906 15.125 12.65625 C 13.222656 13.855469 10.773438 13.851562 8.871094 12.65625 C 8.234375 12.253906 7.394531 12.449219 6.992188 13.085938 C 6.59375 13.71875 6.785156 14.5625 7.421875 14.960938 C 8.257812 15.488281 9.171875 15.863281 10.117188 16.082031 L 7.523438 18.675781 C 6.992188 19.210938 6.992188 20.070312 7.523438 20.601562 C 7.789062 20.867188 8.136719 21 8.484375 21 C 8.832031 21 9.179688 20.867188 9.449219 20.601562 L 12 18.050781 L 14.550781 20.601562 C 15.085938 21.132812 15.945312 21.132812 16.476562 20.601562 C 17.007812 20.070312 17.007812 19.207031 16.476562 18.675781 L 13.878906 16.082031 M 12 5.722656 C 13.0625 5.722656 13.925781 6.585938 13.925781 7.648438 C 13.925781 8.707031 13.0625 9.570312 12 9.570312 C 10.941406 9.570312 10.074219 8.707031 10.074219 7.648438 C 10.074219 6.585938 10.941406 5.722656 12 5.722656 Z M 12 12.289062 C 14.5625 12.289062 16.644531 10.207031 16.644531 7.648438 C 16.644531 5.082031 14.5625 3 12 3 C 9.4375 3 7.355469 5.082031 7.355469 7.644531 C 7.355469 10.207031 9.4375 12.289062 12 12.289062 Z M 12 12.289062 "/>
                        </g>
                        </svg>
                     </a>
                  <?php endif; ?>
               </div>
                <?php } ?>
                <?php if($wo['config']['googleLogin'] != 0): ?>
                <div id="buttonDiv"></div> 
                <?php endif; ?>

               <div class="signup__">
                  <?php if ($wo['config']['user_registration'] == 1): ?>
                  <p><?php echo $wo['lang']['dont_have_account']?> <a class="dec main" href="<?php echo lui_SeoLink('index.php?link1=register');?>"><?php echo $wo['lang']['register']?></a></p>
                  <?php endif ?>
               </div>
            </div>


            <?php if(!empty( $_GET['last_url'])){?>
               <div class="form-group"><input type="hidden" name="last_url" value="<?php echo urldecode(lui_Secure($_GET['last_url']));?>"></div>
            <?php } ?>
            <div class="random_users">
               <?php if ($wo['config']['profile_privacy'] == 1) { ?>
                  <?php echo lui_LoadPage('welcome/welcome-users-profiles');?>
               <?php } ?>
            </div>

            <?php if (!empty($wo['config']['native_android_messenger_url']) || !empty($wo['config']['native_android_timeline_url']) || !empty($wo['config']['native_ios_messenger_url']) || !empty($wo['config']['native_ios_timeline_url']) || !empty($wo['config']['native_windows_messenger_url'])) { ?>
               <div class="wo_side_apps">
                  <?php if (!empty($wo['config']['native_android_timeline_url']) || !empty($wo['config']['native_ios_timeline_url'])) { ?>
                     <p><?php echo $wo['lang']['get_mobile_apps'];?></p>
                     <?php if (!empty($wo['config']['native_android_timeline_url'])) { ?>
                        <a href="<?php echo($wo['config']['native_android_timeline_url']) ?>" target="_blank">
                           <img width="130" src="<?php echo $wo['config']['theme_url'];?>/img/google.png"/>
                        </a>
                     <?php } ?>
                     <?php if (!empty($wo['config']['native_ios_timeline_url'])) { ?>
                        <a href="<?php echo($wo['config']['native_ios_timeline_url']) ?>" target="_blank">
                           <img width="130" src="<?php echo $wo['config']['theme_url'];?>/img/apple.png"/>
                        </a>
                     <?php } ?>
                  <?php } ?>
                  <?php if (!empty($wo['config']['native_android_messenger_url']) || !empty($wo['config']['native_ios_messenger_url']) || !empty($wo['config']['native_windows_messenger_url'])) { ?>
                     <p><?php echo $wo['lang']['get_messenger_apps'];?></p>
                     <?php if (!empty($wo['config']['native_android_messenger_url'])) { ?>
                        <a href="<?php echo($wo['config']['native_android_messenger_url']) ?>" target="_blank">
                           <img width="130" src="<?php echo $wo['config']['theme_url'];?>/img/google.png"/>
                        </a>
                     <?php } ?>
                     <?php if (!empty($wo['config']['native_ios_messenger_url'])) { ?>
                        <a  href="<?php echo($wo['config']['native_ios_messenger_url']) ?>" target="_blank">
                           <img width="130" src="<?php echo $wo['config']['theme_url'];?>/img/apple.png"/>
                        </a>
                     <?php } ?>
                     <?php if (!empty($wo['config']['native_windows_messenger_url'])) { ?>
                        <a href="<?php echo($wo['config']['native_windows_messenger_url']) ?>" target="_blank">
                           <img width="130" src="<?php echo $wo['config']['theme_url'];?>/img/microsoft.png"/>
                        </a>
                     <?php } ?>
                  <?php } ?>
               </div>
            <?php } ?>
         </form>
         </div>
      </div>

         


   </div>
</div>

<script>
var working = false;
var $this = $('#login');
var $state = $this.find('.errors');

<?php if($wo['config']['googleLogin'] != 0): ?>
function handleCredentialResponse(response) {
   var id_token = response.credential;
   $.post(Wo_Ajax_Requests_File() + '?f=google_login', {id_token: id_token}, function(data, textStatus, xhr) {
      if (data.status == 200) {
         $state.addClass('success');
           $state.html('<?php echo $wo['lang']['welcome_back'] ?>');
         $this.find('.loading').addClass('hidden');
           setTimeout(function () {
            window.location.href = data.location;
           }, 1000);
      }
      else{
         $this.find('button').attr("disabled", false);
         $this.find('.loading').addClass('hidden');
           $state.html(data.message);
      }
   });
}
window.onload = function () {
  google.accounts.id.initialize({
    client_id: "<?php echo $wo['config']['googleAppId']?>",
    callback: handleCredentialResponse
  });
  google.accounts.id.renderButton(
    document.getElementById("buttonDiv"),
    { theme: "outline", size: "large" }  // customization attributes
  );
  google.accounts.id.prompt(); // also display the One Tap dialog
}
<?php endif; ?>

$(function() {
  $('#login').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=login',
    beforeSend: function() {
      working = true;
      $this.find('button').attr("disabled", true);
      $this.find('.add_wow_loader').addClass('btn-loading');
    },
    success: function(data) {
      if (data.status == 200 || data.status == 600) {
            $state.removeClass('alert-danger');
         $state.addClass('alert-success');

        $state.html('<?php echo $wo['lang']['welcome_back'] ?>');
      $this.find('.add_wow_loader').removeClass('btn-loading');
        setTimeout(function () {
         window.location.href = data.location;
        }, 1000);
      } else {
        var errors = data.errors.join("<br>");
      $this.find('button').attr("disabled", false);
      $this.find('.add_wow_loader').removeClass('btn-loading');
        $state.html(errors);
      }
      working = false;
    }
  });
});

const inputs = document.querySelectorAll(".input");


function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});

</script>
