<?php
$tab_style = 'block';
$tab_style_height = '';
if (isset($_SESSION['open_chat'])) {
  if($_SESSION['open_chat'] == 0) {
    $tab_style = 'none';
    $tab_style_height = 'min-height:auto;';
  }
}
?>
<!-- Botón flotante -->
<button id="contact-button">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
    <path d="M6.57757 15.4816C5.1628 16.324 1.45336 18.0441 3.71266 20.1966C4.81631 21.248 6.04549 22 7.59087 22H16.4091C17.9545 22 19.1837 21.248 20.2873 20.1966C22.5466 18.0441 18.8372 16.324 17.4224 15.4816C14.1048 13.5061 9.89519 13.5061 6.57757 15.4816Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    <path d="M16.5 6.5C16.5 8.98528 14.4853 11 12 11C9.51472 11 7.5 8.98528 7.5 6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5Z" stroke="currentColor" stroke-width="1.5" />
  </svg>
</button>
<div class="chat-all-container">
    <div class="chat-tab"></div>

    <!-- Menú lateral de contacto -->
    <div class="chat-container full" id="contact-menu"  style="<?php echo $tab_style_height; ?>">
        
        <!-- Aquí puedes añadir el contenido del menú, como un formulario -->
        <div class="online-toggle">
            <div class="head_status_tits">
                <h3>Contactar</h3>
                <div class="chat-status">
                    <div class="dropdown">
                        <div class="btn dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.21,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.21,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.67 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z" /></svg>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li>
                                <a href="#" onclick="Wo_UpdateStatus('online',event);">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 24 24"><path fill="#60d465" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg> <?php echo $wo['lang']['online'];?>
                                </a>
                            </li>
                            <li>
                                <a href="#" onclick="Wo_UpdateStatus('offline',event);">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 24 24" ><path fill="#CDCDCD" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg> <?php echo $wo['lang']['offline'];?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="t_closed_hed">
                <button class="close-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
                        <path d="M10.2471 6.7402C11.0734 7.56657 11.4866 7.97975 12.0001 7.97975C12.5136 7.97975 12.9268 7.56658 13.7531 6.74022L13.7532 6.7402L15.5067 4.98669L15.5067 4.98668C15.9143 4.5791 16.1182 4.37524 16.3302 4.25283C17.3966 3.63716 18.2748 4.24821 19.0133 4.98669C19.7518 5.72518 20.3628 6.60345 19.7472 7.66981C19.6248 7.88183 19.421 8.08563 19.0134 8.49321L17.26 10.2466C16.4336 11.073 16.0202 11.4864 16.0202 11.9999C16.0202 12.5134 16.4334 12.9266 17.2598 13.7529L19.0133 15.5065C19.4209 15.9141 19.6248 16.1179 19.7472 16.3299C20.3628 17.3963 19.7518 18.2746 19.0133 19.013C18.2749 19.7516 17.3965 20.3626 16.3302 19.7469C16.1182 19.6246 15.9143 19.4208 15.5067 19.013L13.7534 17.2598L13.7533 17.2597C12.9272 16.4336 12.5136 16.02 12.0001 16.02C11.4867 16.02 11.073 16.4336 10.2469 17.2598L10.2469 17.2598L8.49353 19.013C8.0859 19.4208 7.88208 19.6246 7.67005 19.7469C6.60377 20.3626 5.72534 19.7516 4.98693 19.013C4.2484 18.2746 3.63744 17.3963 4.25307 16.3299C4.37549 16.1179 4.5793 15.9141 4.98693 15.5065L6.74044 13.7529C7.56681 12.9266 7.98 12.5134 7.98 11.9999C7.98 11.4864 7.5666 11.073 6.74022 10.2466L4.98685 8.49321C4.57928 8.08563 4.37548 7.88183 4.25307 7.66981C3.63741 6.60345 4.24845 5.72518 4.98693 4.98669C5.72542 4.24821 6.60369 3.63716 7.67005 4.25283C7.88207 4.37524 8.08593 4.5791 8.49352 4.98668L8.49353 4.98669L10.2471 6.7402Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="online-content-toggler" style="display:<?php echo $tab_style; ?>">
            <div class="chat-opacity <?php echo ($wo['user']['status'] == 1) ? 'active': '';?>">
                <div class="empty_state single">
                    <svg enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><g><path d="m256 305.023c23.256 0 45.503 6.604 64.592 18.921 11.248 7.257 12.86 23.091 3.395 32.557l-53.09 53.09c-8.227 8.227-21.567 8.227-29.794 0l-53.09-53.09c-9.466-9.466-7.854-25.299 3.395-32.557 19.089-12.316 41.336-18.921 64.592-18.921z" fill="#ffd15b"/><path d="m270.64 409.836c-8.238 7.982-21.396 7.897-29.538-.245l-53.089-53.09c-9.465-9.465-7.854-25.302 3.404-32.558 7.107-4.589 14.641-8.377 22.516-11.333-3.692 6.734-3.842 15.143.224 22.196l36.688 63.686c4.173 7.246 11.835 11.397 19.795 11.344z" fill="#ffc344"/><g fill="#ffd15b"><path d="m256 219.653c46.858 0 91.321 15.632 127.422 44.421 9.796 7.812 10.539 22.452 1.68 31.312l-.4.4c-7.541 7.541-19.569 8.308-27.911 1.663-28.565-22.757-63.724-35.111-100.79-35.111s-72.225 12.355-100.79 35.111c-8.341 6.645-20.369 5.878-27.911-1.663l-.4-.4c-8.86-8.86-8.116-23.5 1.68-31.312 36.099-28.789 80.562-44.421 127.42-44.421z"/><path d="m256 134.283c69.931 0 136.083 24.57 188.609 69.619 9.293 7.97 9.783 22.194 1.126 30.851l-.396.396c-7.805 7.805-20.277 8.222-28.662 1.044-44.766-38.326-101.11-59.225-160.677-59.225s-115.911 20.899-160.677 59.225c-8.385 7.178-20.857 6.761-28.662-1.044l-.396-.396c-8.657-8.657-8.167-22.881 1.126-30.851 52.526-45.049 118.678-69.619 188.609-69.619z"/><path d="m505.847 174.641c-7.865 7.865-20.521 8.296-28.829.9-60.972-54.275-138.709-83.943-221.018-83.943s-160.046 29.668-221.018 83.944c-8.308 7.395-20.964 6.965-28.829-.9-8.609-8.609-8.102-22.647.999-30.734 141.714-125.919 355.981-125.919 497.694 0 9.102 8.086 9.609 22.125 1.001 30.733z"/></g><path d="m59.702 155.551c-8.505 6.232-16.754 12.902-24.715 19.987-8.313 7.395-20.969 6.968-28.834-.896-4.119-4.119-6.147-9.487-6.147-14.854 0-5.826 2.401-11.664 7.15-15.879 9.519-8.462 19.368-16.348 29.495-23.658-1.302 3.116-1.963 6.467-1.963 9.828 0 5.389 1.708 10.821 5.261 15.463 4.898 6.38 12.251 9.859 19.753 10.009z" fill="#ffc344"/><path d="m112.909 222.449c-6.04 4.3-11.909 8.878-17.586 13.745-8.377 7.182-20.851 6.755-28.652-1.046l-.406-.395c-8.654-8.654-8.163-22.879 1.131-30.851 6.99-5.997 14.225-11.632 21.684-16.893-1.323 3.159-2.006 6.552-2.006 9.956 0 5.389 1.697 10.821 5.25 15.463 5.069 6.617 12.784 10.117 20.585 10.021z" fill="#ffc344"/><path d="m165.262 290.062c-3.436 2.316-6.787 4.781-10.052 7.384-8.334 6.648-20.361 5.88-27.905-1.665l-.406-.395c-8.857-8.857-8.11-23.498 1.686-31.309 3.756-2.999 7.608-5.859 11.546-8.558-1.088 2.903-1.654 5.976-1.654 9.071 0 5.4 1.707 10.831 5.261 15.473 5.271 6.883 13.414 10.394 21.524 9.999z" fill="#ffc344"/></g><g><path d="m507.574 422.993-28.954-28.953 28.953-28.953c5.902-5.902 5.902-15.47 0-21.372l-13.74-13.74c-5.902-5.902-15.47-5.902-21.372 0l-28.953 28.953-28.953-28.953c-5.902-5.902-15.47-5.902-21.372 0l-13.74 13.74c-5.902 5.902-5.902 15.47 0 21.372l28.953 28.953-28.953 28.953c-5.902 5.902-5.902 15.471 0 21.372l13.74 13.74c5.902 5.902 15.47 5.902 21.372 0l28.953-28.953 28.953 28.953c5.902 5.902 15.47 5.902 21.372 0l13.74-13.74c5.902-5.901 5.902-15.47.001-21.372z" fill="#fd8087"/><g fill="#fe646f"><path d="m453.592 369.012 39.037-39.037c.194-.194.401-.364.603-.545-5.933-5.334-15.062-5.163-20.77.545l-28.953 28.953z"/><path d="m492.629 458.106-39.037-39.037-10.084 10.083 28.953 28.953c5.708 5.708 14.837 5.878 20.77.544-.201-.18-.409-.35-.602-.543z"/><path d="m413.35 458.105-13.74-13.74c-5.902-5.902-5.902-15.471 0-21.372l28.953-28.953-28.953-28.953c-5.902-5.902-5.902-15.471 0-21.372l13.74-13.74c.194-.194.401-.364.602-.545-5.933-5.334-15.061-5.164-20.77.545l-13.74 13.74c-5.902 5.902-5.902 15.47 0 21.372l28.953 28.953-28.953 28.953c-5.902 5.902-5.902 15.47 0 21.372l13.74 13.74c5.708 5.708 14.837 5.878 20.77.545-.201-.181-.408-.351-.602-.545z"/></g></g></g></svg> <?php echo $wo['lang']['you_are_currently_offline'];?>
                    <div class="text-center"><button class="btn btn-mat" onclick="Wo_UpdateStatus('online',event);"><?php echo $wo['lang']['turn_on'];?></button></div>
                </div>
            </div>
            <ul class="nav nav-tabs wo_chat_tabs">
                <li class="active">
                    <p data-placement="bottom" title="Contactar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.5,15C8.63,15 9.82,15.26 11.09,15.77C12.35,16.29 13,16.95 13,17.77V20H2V17.77C2,16.95 2.65,16.29 3.91,15.77C5.18,15.26 6.38,15 7.5,15M13,13H22V15H13V13M13,9H22V11H13V9M13,5H22V7H13V5M7.5,8A2.5,2.5 0 0,1 10,10.5A2.5,2.5 0 0,1 7.5,13A2.5,2.5 0 0,1 5,10.5A2.5,2.5 0 0,1 7.5,8Z"></path></svg>
                        <span class="count-online-users"><?php echo lui_CountOnlineUsers();?></span>
                    </p>
                </li>
            </ul>

            <?php if ($wo['config']['website_mode'] == 'instagram') { ?>
                <div class="wow_chat_search">
                    <input type="text" class="search-users-chat" placeholder="<?php echo $wo['lang']['search_for_users'];?>" onkeyup="Wo_ChatSearchUsers(this.value);">
                </div>
            <?php } ?>

            <div class="tab-content">
                <div id="users-chat" class="tab-pane fade in active">
                    <?php
                    $OnlineUsers = lui_GetChatUsers('online');
                    $Offlineusers = lui_GetChatUsers('offline');
                    if (empty($Offlineusers) && empty($OnlineUsers)) { ?>
                        <div class="empty_state single"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <path style="fill:#E6AF78;" d="M141.722,325.247l-29.994-11.248c-5.701-2.138-9.479-7.588-9.479-13.678v-11.787h-43.82v11.788 c0,6.089-3.777,11.539-9.478,13.677l-29.994,11.248C7.554,329.523,0,340.423,0,352.601v52.79c0,8.067,6.54,14.607,14.607,14.607 h146.071v-67.397C160.678,340.423,153.124,329.523,141.722,325.247z"/> <path style="fill:#D29B6E;" d="M80.339,310.445c8.201,0,16.023-1.577,23.269-4.333c-0.793-1.811-1.359-3.73-1.359-5.791v-11.787 h-43.82v11.788c0,2.06-0.565,3.979-1.359,5.789C64.316,308.868,72.138,310.445,80.339,310.445z"/> <path style="fill:#DBD9DC;" d="M14.607,419.999h146.071v-67.397c0-12.178-7.554-23.078-18.957-27.354l-28.848-10.818l-22.205,22.205 c-5.704,5.704-14.953,5.704-20.658,0L47.805,314.43l-28.849,10.818C7.554,329.523,0,340.423,0,352.601v52.79 C0,413.459,6.54,419.999,14.607,419.999z"/> <path style="fill:#F0C087;" d="M80.621,295.838h-0.564c-28.08,0-50.843-22.763-50.843-50.843V222.52 c0-28.08,22.763-50.843,50.843-50.843h0.564c28.08,0,50.843,22.763,50.843,50.843v22.474 C131.464,273.074,108.701,295.838,80.621,295.838z"/> <path style="fill:#E6AF78;" d="M58.429,244.713v-21.911c0-23.156,15.405-42.692,36.518-48.98c-4.631-1.379-9.528-2.145-14.607-2.145 c-28.235,0-51.125,22.889-51.125,51.125v21.911c0,28.235,22.89,51.125,51.125,51.125c5.08,0,9.976-0.766,14.607-2.145 C73.833,287.404,58.429,267.868,58.429,244.713z"/> <g> <path style="fill:#EDEBED;" d="M22.797,355.152L4.611,336.967C1.699,341.549,0,346.919,0,352.601v52.79 c0,8.067,6.54,14.607,14.607,14.607h14.607v-49.353C29.214,364.834,26.906,359.261,22.797,355.152z"/> <path style="fill:#EDEBED;" d="M73.036,338.892v81.107h14.607v-81.107C83.127,341.513,77.551,341.513,73.036,338.892z"/> </g> <circle style="fill:#6E4B53;" cx="80.34" cy="171.68" r="29.21"/> <path style="fill:#5C414B;" d="M29.214,222.802v16.39c8.09-3.832,17.998-9.874,25.58-18.865c2.215-2.627,6.004-3.169,9-1.486 c9.628,5.409,32.206,15.711,67.67,18.042v-14.081c0-28.236-22.889-51.125-51.125-51.125l0,0 C52.104,171.677,29.214,194.566,29.214,222.802z"/> <path style="fill:#503441;" d="M52.428,179.999c-13.967,9.126-23.214,24.873-23.214,42.802v16.39 c8.089-3.831,17.999-9.874,25.58-18.865c1.162-1.378,2.759-2.146,4.445-2.356C53.829,207.689,49.603,194.28,52.428,179.999z"/> <path style="fill:#FAD7A5;" d="M495.957,307.047l-36.718-16.999c-4.878-2.258-8.021-7.297-8.021-12.858v-26.031H397.19v26.031 c0,5.56-3.143,10.599-8.021,12.857l-36.719,17c-9.756,4.516-16.043,14.594-16.043,25.714v87.238h162.085 c7.46,0,13.507-6.299,13.507-14.07v-73.167C512,321.641,505.713,311.563,495.957,307.047z"/> <path style="fill:#DBD9DC;" d="M495.957,307.046l-36.468-16.883l-25.734,25.734c-5.275,5.275-13.827,5.275-19.102,0l-25.734-25.735 l-36.469,16.884c-9.756,4.517-16.043,14.594-16.043,25.715v87.238l162.086-0.001c7.46,0,13.507-6.299,13.507-14.07v-73.167 C512,321.64,505.713,311.563,495.957,307.046z"/> <path style="fill:#F0C891;" d="M397.19,251.159v26.031c0,2.577-0.735,5.008-1.946,7.136c8.614,4.688,18.482,7.354,28.96,7.354 s20.345-2.665,28.959-7.353c-1.211-2.128-1.946-4.56-1.946-7.137v-26.031H397.19z"/> <path style="fill:#FFE1B4;" d="M424.204,278.173L424.204,278.173c-26.109,0-47.275-21.166-47.275-47.275v-40.522h94.55v40.522 C471.479,257.007,450.314,278.173,424.204,278.173z"/> <path style="fill:#FAD7A5;" d="M403.943,230.898v-40.522h-27.014v40.522c0,26.109,21.166,47.275,47.275,47.275 c4.697,0,9.225-0.708,13.507-1.984C418.188,270.375,403.943,252.31,403.943,230.898z"/> <path style="fill:#D59F63;" d="M430.958,156.609h-13.507c-26.109,0-47.275,21.166-47.275,47.275v10.804 c0,5.005,5.31,8.403,9.737,6.068c6.852-3.614,14.888-10.356,20.288-17.629c2.181-2.937,6.375-3.373,9.307-1.185 c21.43,15.992,51.279,12.316,63.346,9.932c3.145-0.621,5.379-3.409,5.379-6.614v-1.377 C478.233,177.774,457.067,156.609,430.958,156.609z"/> <path style="fill:#CD915A;" d="M379.913,220.756c6.852-3.614,14.888-10.356,20.288-17.629c0.826-1.113,1.979-1.748,3.205-2.136 c-9.548-13.291-10.199-28.107-9.013-38.358c-14.442,8.09-24.218,23.52-24.218,41.251v10.804 C370.175,219.692,375.485,223.09,379.913,220.756z"/> <g> <path style="fill:#EDEBED;" d="M478.232,360.855c0-5.374,2.134-10.527,5.934-14.327l25.402-25.402 c1.566,3.588,2.432,7.538,2.432,11.635v73.167c0,7.771-6.047,14.07-13.507,14.07h-20.261L478.232,360.855L478.232,360.855z"/> <path style="fill:#EDEBED;" d="M417.451,317.985v102.014h13.507V317.985C426.782,320.409,421.626,320.409,417.451,317.985z"/> </g> <path style="fill:#B48764;" d="M341.659,279.34l-45.724-21.169c-6.074-2.812-9.989-9.087-9.989-16.011v-32.416l-67.28,0.001v32.416 c0,6.924-3.914,13.198-9.989,16.01l-45.725,21.169c-12.149,5.624-19.978,18.174-19.978,32.022v91.115 c0,9.677,7.531,17.521,16.82,17.521h185.023c9.29,0,16.82-7.845,16.82-17.521v-91.114 C361.637,297.515,353.808,284.965,341.659,279.34z"/> <path style="fill:#5D5360;" d="M159.794,419.999l185.023-0.001c9.29,0,16.82-7.845,16.82-17.521v-91.114 c0-13.849-7.83-26.398-19.978-32.023l-45.413-21.024L264.2,290.362c-6.569,6.569-17.219,6.569-23.788,0l-32.047-32.047 l-45.414,21.025c-12.149,5.624-19.978,18.173-19.978,32.022v91.115C142.973,412.154,150.504,419.999,159.794,419.999z"/> <path style="fill:#966D50;" d="M218.665,209.744v32.416c0,3.209-0.916,6.237-2.423,8.887c10.727,5.838,23.015,9.158,36.064,9.158 c13.048,0,25.335-3.319,36.063-9.157c-1.508-2.65-2.423-5.679-2.423-8.888v-32.416L218.665,209.744z"/> <path style="fill:#C39772;" d="M252.306,243.385L252.306,243.385c-32.514,0-58.871-26.358-58.871-58.871v-50.461h117.743v50.461 C311.177,217.027,284.819,243.385,252.306,243.385z"/> <path style="fill:#B48764;" d="M227.075,184.513v-50.461h-33.641v50.461c0,32.514,26.358,58.871,58.871,58.871 c5.849,0,11.488-0.882,16.82-2.47C244.814,233.673,227.075,211.178,227.075,184.513z"/> <path style="fill:#5C414B;" d="M260.716,92.001h-16.82c-32.514,0-58.871,26.358-58.871,58.871v13.454 c0,6.232,6.613,10.464,12.125,7.557c8.532-4.5,18.54-12.896,25.265-21.953c2.716-3.658,7.938-4.2,11.59-1.475 c26.687,19.914,63.858,15.337,78.885,12.369c3.916-0.773,6.699-4.245,6.699-8.236v-1.715 C319.587,118.359,293.229,92.001,260.716,92.001z"/> <path style="fill:#503441;" d="M197.15,171.883c8.532-4.5,18.539-12.896,25.264-21.953c1.029-1.386,2.464-2.177,3.992-2.66 c-11.89-16.551-12.701-35.001-11.224-47.767c-17.985,10.075-30.158,29.289-30.158,51.37v13.454 C185.024,170.559,191.637,174.791,197.15,171.883z"/> <g> <path style="fill:#6F6571;" d="M185.024,346.347c0-6.692-2.658-13.109-7.39-17.841l-31.633-31.633 c-1.95,4.468-3.028,9.387-3.028,14.488v91.115c0,9.677,7.531,17.522,16.82,17.522h25.231V346.347z"/> <path style="fill:#6F6571;" d="M319.586,346.347c0-6.692,2.658-13.109,7.39-17.841l31.633-31.633 c1.95,4.468,3.028,9.387,3.028,14.488v91.115c0,9.677-7.531,17.522-16.82,17.522h-25.231L319.586,346.347L319.586,346.347z"/> <path style="fill:#6F6571;" d="M243.895,292.962v127.037l16.82-0.001V292.962C255.516,295.98,249.095,295.98,243.895,292.962z"/> </g></svg><?php echo $wo['lang']['no_users_found'];?></div>
                    <?php } else { ?>
                        <div class="online-users">
                            <?php
                                if (count($OnlineUsers) == 0) {
                                    echo '';
                                } else {
                                    foreach ($OnlineUsers as $wo['chatList']) {
                                        echo lui_LoadPage('chat/online-user');
                                    }
                                }
                            ?>
                        </div>
                        <div class="offline-users">
                            <?php
                                if (count($Offlineusers) == 0) {
                                    echo '';
                                } else {
                                    foreach ($Offlineusers as $wo['chatList']) {
                                        echo lui_LoadPage('chat/offline-user');
                                    }
                                }
                            ?>
                        </div>
                    <?php } ?>
                    <div class="clear"></div>
                </div>

                <div id="groups-chat" class="tab-pane fade groups chat_groups">
                    <?php $chat_groups = lui_GetChatGroups(); ?>
                    <?php
                        if (count($chat_groups) == 0) {
                            echo '<div class="empty_state single"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <path style="fill:#E6AF78;" d="M141.722,325.247l-29.994-11.248c-5.701-2.138-9.479-7.588-9.479-13.678v-11.787h-43.82v11.788 c0,6.089-3.777,11.539-9.478,13.677l-29.994,11.248C7.554,329.523,0,340.423,0,352.601v52.79c0,8.067,6.54,14.607,14.607,14.607 h146.071v-67.397C160.678,340.423,153.124,329.523,141.722,325.247z"/> <path style="fill:#D29B6E;" d="M80.339,310.445c8.201,0,16.023-1.577,23.269-4.333c-0.793-1.811-1.359-3.73-1.359-5.791v-11.787 h-43.82v11.788c0,2.06-0.565,3.979-1.359,5.789C64.316,308.868,72.138,310.445,80.339,310.445z"/> <path style="fill:#DBD9DC;" d="M14.607,419.999h146.071v-67.397c0-12.178-7.554-23.078-18.957-27.354l-28.848-10.818l-22.205,22.205 c-5.704,5.704-14.953,5.704-20.658,0L47.805,314.43l-28.849,10.818C7.554,329.523,0,340.423,0,352.601v52.79 C0,413.459,6.54,419.999,14.607,419.999z"/> <path style="fill:#F0C087;" d="M80.621,295.838h-0.564c-28.08,0-50.843-22.763-50.843-50.843V222.52 c0-28.08,22.763-50.843,50.843-50.843h0.564c28.08,0,50.843,22.763,50.843,50.843v22.474 C131.464,273.074,108.701,295.838,80.621,295.838z"/> <path style="fill:#E6AF78;" d="M58.429,244.713v-21.911c0-23.156,15.405-42.692,36.518-48.98c-4.631-1.379-9.528-2.145-14.607-2.145 c-28.235,0-51.125,22.889-51.125,51.125v21.911c0,28.235,22.89,51.125,51.125,51.125c5.08,0,9.976-0.766,14.607-2.145 C73.833,287.404,58.429,267.868,58.429,244.713z"/> <g> <path style="fill:#EDEBED;" d="M22.797,355.152L4.611,336.967C1.699,341.549,0,346.919,0,352.601v52.79 c0,8.067,6.54,14.607,14.607,14.607h14.607v-49.353C29.214,364.834,26.906,359.261,22.797,355.152z"/> <path style="fill:#EDEBED;" d="M73.036,338.892v81.107h14.607v-81.107C83.127,341.513,77.551,341.513,73.036,338.892z"/> </g> <circle style="fill:#6E4B53;" cx="80.34" cy="171.68" r="29.21"/> <path style="fill:#5C414B;" d="M29.214,222.802v16.39c8.09-3.832,17.998-9.874,25.58-18.865c2.215-2.627,6.004-3.169,9-1.486 c9.628,5.409,32.206,15.711,67.67,18.042v-14.081c0-28.236-22.889-51.125-51.125-51.125l0,0 C52.104,171.677,29.214,194.566,29.214,222.802z"/> <path style="fill:#503441;" d="M52.428,179.999c-13.967,9.126-23.214,24.873-23.214,42.802v16.39 c8.089-3.831,17.999-9.874,25.58-18.865c1.162-1.378,2.759-2.146,4.445-2.356C53.829,207.689,49.603,194.28,52.428,179.999z"/> <path style="fill:#FAD7A5;" d="M495.957,307.047l-36.718-16.999c-4.878-2.258-8.021-7.297-8.021-12.858v-26.031H397.19v26.031 c0,5.56-3.143,10.599-8.021,12.857l-36.719,17c-9.756,4.516-16.043,14.594-16.043,25.714v87.238h162.085 c7.46,0,13.507-6.299,13.507-14.07v-73.167C512,321.641,505.713,311.563,495.957,307.047z"/> <path style="fill:#DBD9DC;" d="M495.957,307.046l-36.468-16.883l-25.734,25.734c-5.275,5.275-13.827,5.275-19.102,0l-25.734-25.735 l-36.469,16.884c-9.756,4.517-16.043,14.594-16.043,25.715v87.238l162.086-0.001c7.46,0,13.507-6.299,13.507-14.07v-73.167 C512,321.64,505.713,311.563,495.957,307.046z"/> <path style="fill:#F0C891;" d="M397.19,251.159v26.031c0,2.577-0.735,5.008-1.946,7.136c8.614,4.688,18.482,7.354,28.96,7.354 s20.345-2.665,28.959-7.353c-1.211-2.128-1.946-4.56-1.946-7.137v-26.031H397.19z"/> <path style="fill:#FFE1B4;" d="M424.204,278.173L424.204,278.173c-26.109,0-47.275-21.166-47.275-47.275v-40.522h94.55v40.522 C471.479,257.007,450.314,278.173,424.204,278.173z"/> <path style="fill:#FAD7A5;" d="M403.943,230.898v-40.522h-27.014v40.522c0,26.109,21.166,47.275,47.275,47.275 c4.697,0,9.225-0.708,13.507-1.984C418.188,270.375,403.943,252.31,403.943,230.898z"/> <path style="fill:#D59F63;" d="M430.958,156.609h-13.507c-26.109,0-47.275,21.166-47.275,47.275v10.804 c0,5.005,5.31,8.403,9.737,6.068c6.852-3.614,14.888-10.356,20.288-17.629c2.181-2.937,6.375-3.373,9.307-1.185 c21.43,15.992,51.279,12.316,63.346,9.932c3.145-0.621,5.379-3.409,5.379-6.614v-1.377 C478.233,177.774,457.067,156.609,430.958,156.609z"/> <path style="fill:#CD915A;" d="M379.913,220.756c6.852-3.614,14.888-10.356,20.288-17.629c0.826-1.113,1.979-1.748,3.205-2.136 c-9.548-13.291-10.199-28.107-9.013-38.358c-14.442,8.09-24.218,23.52-24.218,41.251v10.804 C370.175,219.692,375.485,223.09,379.913,220.756z"/> <g> <path style="fill:#EDEBED;" d="M478.232,360.855c0-5.374,2.134-10.527,5.934-14.327l25.402-25.402 c1.566,3.588,2.432,7.538,2.432,11.635v73.167c0,7.771-6.047,14.07-13.507,14.07h-20.261L478.232,360.855L478.232,360.855z"/> <path style="fill:#EDEBED;" d="M417.451,317.985v102.014h13.507V317.985C426.782,320.409,421.626,320.409,417.451,317.985z"/> </g> <path style="fill:#B48764;" d="M341.659,279.34l-45.724-21.169c-6.074-2.812-9.989-9.087-9.989-16.011v-32.416l-67.28,0.001v32.416 c0,6.924-3.914,13.198-9.989,16.01l-45.725,21.169c-12.149,5.624-19.978,18.174-19.978,32.022v91.115 c0,9.677,7.531,17.521,16.82,17.521h185.023c9.29,0,16.82-7.845,16.82-17.521v-91.114 C361.637,297.515,353.808,284.965,341.659,279.34z"/> <path style="fill:#5D5360;" d="M159.794,419.999l185.023-0.001c9.29,0,16.82-7.845,16.82-17.521v-91.114 c0-13.849-7.83-26.398-19.978-32.023l-45.413-21.024L264.2,290.362c-6.569,6.569-17.219,6.569-23.788,0l-32.047-32.047 l-45.414,21.025c-12.149,5.624-19.978,18.173-19.978,32.022v91.115C142.973,412.154,150.504,419.999,159.794,419.999z"/> <path style="fill:#966D50;" d="M218.665,209.744v32.416c0,3.209-0.916,6.237-2.423,8.887c10.727,5.838,23.015,9.158,36.064,9.158 c13.048,0,25.335-3.319,36.063-9.157c-1.508-2.65-2.423-5.679-2.423-8.888v-32.416L218.665,209.744z"/> <path style="fill:#C39772;" d="M252.306,243.385L252.306,243.385c-32.514,0-58.871-26.358-58.871-58.871v-50.461h117.743v50.461 C311.177,217.027,284.819,243.385,252.306,243.385z"/> <path style="fill:#B48764;" d="M227.075,184.513v-50.461h-33.641v50.461c0,32.514,26.358,58.871,58.871,58.871 c5.849,0,11.488-0.882,16.82-2.47C244.814,233.673,227.075,211.178,227.075,184.513z"/> <path style="fill:#5C414B;" d="M260.716,92.001h-16.82c-32.514,0-58.871,26.358-58.871,58.871v13.454 c0,6.232,6.613,10.464,12.125,7.557c8.532-4.5,18.54-12.896,25.265-21.953c2.716-3.658,7.938-4.2,11.59-1.475 c26.687,19.914,63.858,15.337,78.885,12.369c3.916-0.773,6.699-4.245,6.699-8.236v-1.715 C319.587,118.359,293.229,92.001,260.716,92.001z"/> <path style="fill:#503441;" d="M197.15,171.883c8.532-4.5,18.539-12.896,25.264-21.953c1.029-1.386,2.464-2.177,3.992-2.66 c-11.89-16.551-12.701-35.001-11.224-47.767c-17.985,10.075-30.158,29.289-30.158,51.37v13.454 C185.024,170.559,191.637,174.791,197.15,171.883z"/> <g> <path style="fill:#6F6571;" d="M185.024,346.347c0-6.692-2.658-13.109-7.39-17.841l-31.633-31.633 c-1.95,4.468-3.028,9.387-3.028,14.488v91.115c0,9.677,7.531,17.522,16.82,17.522h25.231V346.347z"/> <path style="fill:#6F6571;" d="M319.586,346.347c0-6.692,2.658-13.109,7.39-17.841l31.633-31.633 c1.95,4.468,3.028,9.387,3.028,14.488v91.115c0,9.677-7.531,17.522-16.82,17.522h-25.231L319.586,346.347L319.586,346.347z"/> <path style="fill:#6F6571;" d="M243.895,292.962v127.037l16.82-0.001V292.962C255.516,295.98,249.095,295.98,243.895,292.962z"/> </g></svg>' . $wo['lang']['no_groups_found'] . '</div>';
                        }
                        else {
                            foreach ($chat_groups as $wo['group']) {
                                echo lui_LoadPage('chat/group-list');
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (lui_IsMobile() == false) { ?>
<script type="text/javascript">
function Wo_ShowMessageOptions(id) {
    $('.deleteMessage').hide();
    $('#messageId_' + id).find('.deleteMessage').show();
}
$("#edit_group_chat_avatar_").change(function(event) {
	$("#wow_fcov_img_holder_edit").html("<img src='" + window.URL.createObjectURL(this.files[0]) + "' alt='Picture'>")
});

function Wo_GetGChatParticipants(name){
    if (!name) {
        return false;
    }
    $.ajax({
        url: Wo_Ajax_Requests_File(),
        type: 'GET',
        dataType: 'json',
        data: {f: 'chat',s:'get_parts',name:name},
    })
    .done(function(data) {
        if (data.status == 200) {
            $('.group_chat_mbr_list').html(data.html);
        }
        else{
          $('.group_chat_mbr_list').html('<p class="no_participant"><?php echo $wo['lang']['no_result']; ?></p>');
        }
    })
    .fail(function() {
        console.log("error");
    })
}

function Wo_CreateGChat(e){
    e.preventDefault();
    $('#create_group_chat').modal('show');
}
function Wo_EditGChat(e,group_id){
    e.preventDefault();
    $.get(Wo_Ajax_Requests_File(), {f:'chat', s:'get_group_info',group_id:group_id}, function(data) {
    	if (data.status == 200) {
    		// $('#edit_group_chat_avatar').attr('src', data.group.avatar);
    		$('.group_chat_avatar__container').css('background-image', "url('"+data.group.avatar+"')");
    		$('#edit_group_name').val(data.group.group_name);
    		$('#edit_group_id').val(data.group.group_id);
    		$('#edit_group_chat').modal('show');
    	}
    });
}

function socketSide(){
  <?php if ($wo['config']['node_socket_flow'] == "1") { ?>
    console.log("Cambio de estado de usuario registrado")
    socket.on("user_status_change", (data)=>{
      var online_users_container = $('.online-users');
      var offline_users_container = $('.offline-users');
      if (data.online_users.length == 0) {
        online_users_container.html('');
      } else {
          online_users_container.html(data.online_users);
      }
      if (data.offline_users.length == 0) {
        offline_users_container.html('');
      } else {
        offline_users_container.html(data.offline_users);
      }
    })
     console.log("Escribiendo...")
    socket.on("typing",(data)=>{
    var inputs = $("input.chat-user-id");
    if (inputs.length > 0) {
        for(var i = 0; i < inputs.length; i++){
          let id = $(inputs[i]).val()
          if (current_width < 700) {
          return false;
          }
          if ($('body').attr('sending-' + id) == 'true') {
              return false;
          }
          var chat_container = $('.chat-tab').find('.chat_main_' + id);
          var offline_users_container = $('.offline-users');
          var user_id = chat_container.find('.chat-user-id').val();
          var message_id = chat_container.find('.chat-messages-wrapper').find('.messages-wrapper:last').attr('data-message-id');
          var chat_user_tab = chat_container.find('.chat-wrapper').find('.chat-status');
          var online_users_container = $('.online-users');
          var last_id = chat_container.find('.messages-text:last').attr('data-message-id');
          var is_empty_seen = 1;
          var chat_groups = $(".chat_groups");
          var last_group = ($(".groups-list").length > 0) ? $(".groups-list").last().attr('data-chat-group') : 0;

          if (!$('#messageId_'+message_id).find('.message-seen').is(':empty')) {
              is_empty_seen = 0;
          }
          if (typeof user_id === 'undefined') {
            user_id = 0;
          }
          if (typeof message_id === 'undefined') {
            message_id = 0;
          }
          if (typeof last_id === 'undefined') {
            last_id = 0;
          }
          var count_span = $('.count-online-users');

          if ( data.sender_id === +user_id && data.is_typing == 200) {
          		if (chat_container.find('#messageId_'+message_id).find('.message-typing img').length == 0) {
	                chat_container.find('#messageId_'+message_id).find('.message-typing').html('<img class="user-avatar-left" src="' + data.img + '" alt="Profile Picture"><div id="loading"> <svg width="35" height="35" viewBox="0 0 120 30" xmlns="http://www.w3.org/2000/svg" fill="#999"> <circle cx="15" cy="15" r="15"> <animate attributeName="r" from="15" to="15" begin="0s" dur="0.5s" values="15;9;15" calcMode="linear" repeatCount="indefinite"></animate> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.5s" values="1;.5;1" calcMode="linear" repeatCount="indefinite"></animate> </circle> <circle cx="60" cy="15" r="9" fill-opacity="0.3"> <animate attributeName="r" from="9" to="9" begin="0s" dur="0.5s" values="9;15;9" calcMode="linear" repeatCount="indefinite"></animate> <animate attributeName="fill-opacity" from="0.5" to="0.5" begin="0s" dur="0.5s" values=".5;1;.5" calcMode="linear" repeatCount="indefinite"></animate> </circle> <circle cx="105" cy="15" r="15"> <animate attributeName="r" from="15" to="15" begin="0s" dur="0.5s" values="15;9;15" calcMode="linear" repeatCount="indefinite"></animate> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.5s" values="1;.5;1" calcMode="linear" repeatCount="indefinite"></animate> </circle> </svg></div>').show();

	                setTimeout(function(){
		              	chat_container.find('.chat-messages-wrapper').scrollTop(chat_container.find('.chat-messages-wrapper')[0].scrollHeight);
		            }, 100);
	            }
          } else {
              chat_container.find('#messageId_'+message_id).find('.message-typing').empty();
          }
        }
      }
    })
  <?php } ?>
}
$(()=>{
  socketSide()
})
function playMessageSound() {
    const messageSound = document.getElementById('message-sound');
    messageSound.play().catch(function(error) {
        // Si el sonido no se reproduce debido a la falta de interacción, se captura el error
        console.error('Reproducción fallida: ', error);
        // Escucha por la primera interacción para reproducir el sonido
        document.addEventListener('click', function() {
            messageSound.play().catch(function(error) {
                console.error('Error al reproducir después de la interacción: ', error);
            });
        }, { once: true }); // Solo ejecuta la primera vez que el usuario haga clic
    });
}
function Wo_ChatSide(id) {
  // Do this only if socket is not there, else do it via sockets
  <?php if ($wo['config']['node_socket_flow'] == "0") { ?>
    if (current_width < 700) {
        return false;
    }
  
    if ($('body').attr('sending-' + id) == 'true') {
        return false;
    }
    var chat_container = $('.chat-tab').find('.chat_main_' + id);
    var offline_users_container = $('.offline-users');
    var user_id = chat_container.find('.chat-user-id').val();
    var message_id = chat_container.find('.chat-messages-wrapper').find('.messages-wrapper:last').attr('data-message-id');
    var chat_user_tab = chat_container.find('.chat-wrapper').find('.chat-status');
    var online_users_container = $('.online-users');
    var last_id = chat_container.find('.messages-text:last').attr('data-message-id');
    var is_empty_seen = 1;
    var chat_groups = $(".chat_groups");
    var last_group = ($(".groups-list").length > 0) ? $(".groups-list").last().attr('data-chat-group') : 0;

    if (!$('.messages-text:last').find('.message-seen').is(':empty')) {
        is_empty_seen = 0;
    }
    if (typeof user_id === 'undefined') {
       user_id = 0;
    }
    if (typeof message_id === 'undefined') {
       message_id = 0;
    }
    if (typeof last_id === 'undefined') {
       last_id = 0;
    }
    var count_span = $('.count-online-users');
    $.get(Wo_Ajax_Requests_File(), {f:'chat', s:'chat_side', user_id:user_id, message_id:message_id, last_id:last_id,last_group:last_group}, function(data) {
    	if (data.reactions) {
	      	for (var i = data.reactions.length - 1; i >= 0; i--) {
	      		$('.post-reactions-icons-m-'+data.reactions[i].id).html(data.reactions[i].reactions);

	      	}
	      }
        if (data.status == 200  && data.chat_groups.length > 0) {
          chat_groups.html(data.chat_groups);
        }
        if (data.status == 200) {
            count_span.html(data.count_chat);
        }
        if (data.online_users.length == 0) {
            online_users_container.html('');
        } else {
            online_users_container.html(data.online_users);
        }
        if (data.offline_users.length == 0) {
            offline_users_container.html('');
        } else {
            offline_users_container.html(data.offline_users);
        }
        if (data.chat_user_tab == 200) {
            chat_user_tab.html('active');
        } else {
            chat_user_tab.removeClass('active');
        }
        if (data.messages == 200) {
            if (!$('#chat_'+user_id).find('textarea').is(":focus")) {
                $('#chat_'+user_id).find('.online-toggle-hdr').addClass('white_online');
                playMessageSound();  // Llama a la función para reproducir el sonido
            }
            chat_container.find('.chat-messages-wrapper').find("div[class*='message-seen']").empty();
            chat_container.find('.chat-messages-wrapper').find("div[class*='message-typing']").empty();
            chat_container.find('.chat-messages-wrapper').append(data.messages_html);
            setTimeout(function(){
                chat_container.find('.chat-messages-wrapper').scrollTop(chat_container.find('.chat-messages-wrapper')[0].scrollHeight);
            }, 100);
            if (data.sender != user_id) {
                playMessageSound();  // Llama a la función para reproducir el sonido
            }
            if (!$('#sendMessage').is(':focus')) {
                document.title = 'Nuevo mensaje | ' + document_title;
            }
        }

        if (is_empty_seen == 1 && data.can_seen == 1) {
        	chat_container.find('.online-toggle-hdr').attr('style', '').removeClass('white_online');
            chat_container.find('.messages-text:last').find('.message-seen').hide().html('<i class="fa fa-check"></i> <?php echo $wo["lang"]["seen"];?> (<span class="ajax-time" title="' + data.time + '">' + data.seen + '</span>)').fadeIn(300);
            setTimeout(function(){
              	chat_container.find('.chat-messages-wrapper').scrollTop(chat_container.find('.chat-messages-wrapper')[0].scrollHeight);
            }, 100);
        }
        if (data.is_typing == 200) {
            chat_container.find('.messages-text:last').find('.message-typing').html('<img class="user-avatar-left" src="' + data.img + '" alt="Profile Picture"><div id="loading"> <svg width="35" height="35" viewBox="0 0 120 30" xmlns="http://www.w3.org/2000/svg" fill="#999"> <circle cx="15" cy="15" r="15"> <animate attributeName="r" from="15" to="15" begin="0s" dur="0.5s" values="15;9;15" calcMode="linear" repeatCount="indefinite"></animate> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.5s" values="1;.5;1" calcMode="linear" repeatCount="indefinite"></animate> </circle> <circle cx="60" cy="15" r="9" fill-opacity="0.3"> <animate attributeName="r" from="9" to="9" begin="0s" dur="0.5s" values="9;15;9" calcMode="linear" repeatCount="indefinite"></animate> <animate attributeName="fill-opacity" from="0.5" to="0.5" begin="0s" dur="0.5s" values=".5;1;.5" calcMode="linear" repeatCount="indefinite"></animate> </circle> <circle cx="105" cy="15" r="15"> <animate attributeName="r" from="15" to="15" begin="0s" dur="0.5s" values="15;9;15" calcMode="linear" repeatCount="indefinite"></animate> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.5s" values="1;.5;1" calcMode="linear" repeatCount="indefinite"></animate> </circle> </svg></div>').fadeIn(300);

            setTimeout(function(){
              	chat_container.find('.chat-messages-wrapper').scrollTop(chat_container.find('.chat-messages-wrapper')[0].scrollHeight);
            }, 100);

        } else {
            chat_container.find('.messages-text:last').find('.message-typing').empty();
        }
        if (data.chat_color) {
        	if (data.messages != 200) {
	            $(".chat_" + user_id).find('.online-toggle, .outgoing .message-text, .outgoing .message-media').css('background', data.chat_color);
	        }
            $(".chat_" + user_id).find('.outgoing .message-text').css('color', '#fff');
            $(".chat_" + user_id).find('#color').val(data.chat_color);

            $(".chat_" + user_id).find('.close-chat a, .close-chat svg').css('color', data.chat_color);

            $(".chat_" + user_id).find('.select-color').css('color', data.chat_color);
            $(".chat_" + user_id).find('.outgoing .message-text, .outgoing .message-media').css('background', data.chat_color);
             $(".chat_" + user_id).find('.outgoing .message-text').css('color', '#fff');
             $(".chat_" + user_id).find('.select-color path').css('fill', data.chat_color);
             $(".chat_" + user_id).find('#color').val(data.chat_color);
             $(".text-sender-container .red-list").css('background', data.chat_color);
             $(".text-sender-container .btn-file").css('background', data.chat_color);
             $(".text-sender-container .btn-file").css('border-color', data.chat_color);
             $(".chat_" + user_id).find('.record-chat-audio').find('[fill]').attr('fill', data.chat_color);
        }
    });
  <?php } ?>
}

var chat_part_array = [];

$(function() {
    <?php
    if (isset($_SESSION['chat_id'])) {
        if (strpos($_SESSION['chat_id'], ',') !== false) {
            $explode = @explode(',', $_SESSION['chat_id']);
            foreach ($explode as $key => $value) {
            ?>
                Wo_OpenChatTab(<?php echo $value;?>);
            <?php
            }
        } else {
            ?>
                Wo_OpenChatTab(<?php echo $_SESSION['chat_id'];?>);
            <?php
        }
    }
    ?>
    setTimeout(function () {
       Timeout();
    }, 7000);
    <?php if (isset($_SESSION['group_id']) && is_numeric($_SESSION['group_id']) && $_SESSION['group_id'] > 0): ?>
      Wo_OpenChatTab(0,"<?php echo $_SESSION['group_id'];?>");
    <?php endif; ?>

    $(document).on('click', '.group_chat_mbr_part', function(event) {
        event.preventDefault();
        var self_id    = $(this).attr('id');
        if ($.inArray(self_id, chat_part_array) == -1) {
            chat_part_array.push(self_id);
            $("#group_chat_mbrs").text(chat_part_array.length);

            $(this).fadeOut(100,function(){
                $("#chat_group_users").val(chat_part_array.join());
                $(this).remove();
            })
        }
        else{
          $(this).addClass('disabled').removeAttr('title');
        }
    });

    $('#insert-caht-parts').ajaxForm({
      url: Wo_Ajax_Requests_File() + '?f=chat&s=create_group',
      type:'POST',
      dataType:'json',

      beforeSend: function() {
        Wo_progressIconLoader($('#insert-caht-parts').find('button'));
		$('#insert-caht-parts').find('.add_wow_loader').addClass('btn-loading');
      },
      success: function(data) {
        if (data['status'] == 200) {
	        	if (node_socket_flow == "1") {
			      	for (var i = 0; i < chat_part_array.length; i++) {
			         socket.emit("user_notification", { to_id: chat_part_array[i], user_id: _getCookie("user_id"), type: "request" });
					    }
		      	}
            $("#create_group_chat").modal('hide');
            Wo_OpenChatTab(0,data.group_id);
            $("#insert-caht-parts").find('#reset').trigger('click');
            $(".group_chat_mbr_list").empty();
            $(".group_chat_avatar").empty();
            chat_part_array = [];
            socket.emit("sync_groups",{from_id: _getCookie("user_id")})
        }
        else if (data.status == 500){
            $("#insert-caht-alert").html('<div class="alert alert-danger">' + data['message'] + '</div>');
        }
        $('#insert-caht-parts').find('.add_wow_loader').removeClass('btn-loading');
    }});


$('#edit_chat_group_form').ajaxForm({
  url: Wo_Ajax_Requests_File() + '?f=chat&s=edit_group',
  type:'POST',
  dataType:'json',
  beforeSend: function() {
    Wo_progressIconLoader($('#edit_chat_group_form').find('button'));
	$('#edit_chat_group_form').find('.add_wow_loader').addClass('btn-loading');
  },
  success: function(data) {
    if (data['status'] == 200) {
        $("#edit_group_chat").modal('hide');
        location.reload();
    }
    else{
        $("#edit_chat_group_alert").html('<div class="alert alert-danger">' + data['message'] + '</div>');
    }
    $('#edit_chat_group_form').find('.add_wow_loader').removeClass('btn-loading');
}});
});

function Timeout() {
  <?php if ($wo['config']['node_socket_flow'] == "0") { ?>
    var inputs = $("input.chat-user-id");
    if (inputs.length > 0) {
        for(var i = 0; i < inputs.length; i++){
            Wo_ChatSide($(inputs[i]).val());
        }
    } else {
        Wo_ChatSide(0);
    }
    setTimeout(function () {
       Timeout();
    }, 7000);
  <?php } ?>
}

function Wo_ChatSearchUsers(search_query) {
    var input = $($('.search-users-chat'));
    var offline_users_container = $('.online-users');
    if (input.val() == "") {
        Wo_ChatSide(0);
    }
    $.post(Wo_Ajax_Requests_File() + '?f=chat&s=search_for_recipients', {
        search_query: search_query
    }, function(data) {
        if (data.status == 200) {
            if (data.html.length == 0) {
                offline_users_container.html('<div class="empty_state single"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <path style="fill:#E6AF78;" d="M141.722,325.247l-29.994-11.248c-5.701-2.138-9.479-7.588-9.479-13.678v-11.787h-43.82v11.788 c0,6.089-3.777,11.539-9.478,13.677l-29.994,11.248C7.554,329.523,0,340.423,0,352.601v52.79c0,8.067,6.54,14.607,14.607,14.607 h146.071v-67.397C160.678,340.423,153.124,329.523,141.722,325.247z"/> <path style="fill:#D29B6E;" d="M80.339,310.445c8.201,0,16.023-1.577,23.269-4.333c-0.793-1.811-1.359-3.73-1.359-5.791v-11.787 h-43.82v11.788c0,2.06-0.565,3.979-1.359,5.789C64.316,308.868,72.138,310.445,80.339,310.445z"/> <path style="fill:#DBD9DC;" d="M14.607,419.999h146.071v-67.397c0-12.178-7.554-23.078-18.957-27.354l-28.848-10.818l-22.205,22.205 c-5.704,5.704-14.953,5.704-20.658,0L47.805,314.43l-28.849,10.818C7.554,329.523,0,340.423,0,352.601v52.79 C0,413.459,6.54,419.999,14.607,419.999z"/> <path style="fill:#F0C087;" d="M80.621,295.838h-0.564c-28.08,0-50.843-22.763-50.843-50.843V222.52 c0-28.08,22.763-50.843,50.843-50.843h0.564c28.08,0,50.843,22.763,50.843,50.843v22.474 C131.464,273.074,108.701,295.838,80.621,295.838z"/> <path style="fill:#E6AF78;" d="M58.429,244.713v-21.911c0-23.156,15.405-42.692,36.518-48.98c-4.631-1.379-9.528-2.145-14.607-2.145 c-28.235,0-51.125,22.889-51.125,51.125v21.911c0,28.235,22.89,51.125,51.125,51.125c5.08,0,9.976-0.766,14.607-2.145 C73.833,287.404,58.429,267.868,58.429,244.713z"/> <g> <path style="fill:#EDEBED;" d="M22.797,355.152L4.611,336.967C1.699,341.549,0,346.919,0,352.601v52.79 c0,8.067,6.54,14.607,14.607,14.607h14.607v-49.353C29.214,364.834,26.906,359.261,22.797,355.152z"/> <path style="fill:#EDEBED;" d="M73.036,338.892v81.107h14.607v-81.107C83.127,341.513,77.551,341.513,73.036,338.892z"/> </g> <circle style="fill:#6E4B53;" cx="80.34" cy="171.68" r="29.21"/> <path style="fill:#5C414B;" d="M29.214,222.802v16.39c8.09-3.832,17.998-9.874,25.58-18.865c2.215-2.627,6.004-3.169,9-1.486 c9.628,5.409,32.206,15.711,67.67,18.042v-14.081c0-28.236-22.889-51.125-51.125-51.125l0,0 C52.104,171.677,29.214,194.566,29.214,222.802z"/> <path style="fill:#503441;" d="M52.428,179.999c-13.967,9.126-23.214,24.873-23.214,42.802v16.39 c8.089-3.831,17.999-9.874,25.58-18.865c1.162-1.378,2.759-2.146,4.445-2.356C53.829,207.689,49.603,194.28,52.428,179.999z"/> <path style="fill:#FAD7A5;" d="M495.957,307.047l-36.718-16.999c-4.878-2.258-8.021-7.297-8.021-12.858v-26.031H397.19v26.031 c0,5.56-3.143,10.599-8.021,12.857l-36.719,17c-9.756,4.516-16.043,14.594-16.043,25.714v87.238h162.085 c7.46,0,13.507-6.299,13.507-14.07v-73.167C512,321.641,505.713,311.563,495.957,307.047z"/> <path style="fill:#DBD9DC;" d="M495.957,307.046l-36.468-16.883l-25.734,25.734c-5.275,5.275-13.827,5.275-19.102,0l-25.734-25.735 l-36.469,16.884c-9.756,4.517-16.043,14.594-16.043,25.715v87.238l162.086-0.001c7.46,0,13.507-6.299,13.507-14.07v-73.167 C512,321.64,505.713,311.563,495.957,307.046z"/> <path style="fill:#F0C891;" d="M397.19,251.159v26.031c0,2.577-0.735,5.008-1.946,7.136c8.614,4.688,18.482,7.354,28.96,7.354 s20.345-2.665,28.959-7.353c-1.211-2.128-1.946-4.56-1.946-7.137v-26.031H397.19z"/> <path style="fill:#FFE1B4;" d="M424.204,278.173L424.204,278.173c-26.109,0-47.275-21.166-47.275-47.275v-40.522h94.55v40.522 C471.479,257.007,450.314,278.173,424.204,278.173z"/> <path style="fill:#FAD7A5;" d="M403.943,230.898v-40.522h-27.014v40.522c0,26.109,21.166,47.275,47.275,47.275 c4.697,0,9.225-0.708,13.507-1.984C418.188,270.375,403.943,252.31,403.943,230.898z"/> <path style="fill:#D59F63;" d="M430.958,156.609h-13.507c-26.109,0-47.275,21.166-47.275,47.275v10.804 c0,5.005,5.31,8.403,9.737,6.068c6.852-3.614,14.888-10.356,20.288-17.629c2.181-2.937,6.375-3.373,9.307-1.185 c21.43,15.992,51.279,12.316,63.346,9.932c3.145-0.621,5.379-3.409,5.379-6.614v-1.377 C478.233,177.774,457.067,156.609,430.958,156.609z"/> <path style="fill:#CD915A;" d="M379.913,220.756c6.852-3.614,14.888-10.356,20.288-17.629c0.826-1.113,1.979-1.748,3.205-2.136 c-9.548-13.291-10.199-28.107-9.013-38.358c-14.442,8.09-24.218,23.52-24.218,41.251v10.804 C370.175,219.692,375.485,223.09,379.913,220.756z"/> <g> <path style="fill:#EDEBED;" d="M478.232,360.855c0-5.374,2.134-10.527,5.934-14.327l25.402-25.402 c1.566,3.588,2.432,7.538,2.432,11.635v73.167c0,7.771-6.047,14.07-13.507,14.07h-20.261L478.232,360.855L478.232,360.855z"/> <path style="fill:#EDEBED;" d="M417.451,317.985v102.014h13.507V317.985C426.782,320.409,421.626,320.409,417.451,317.985z"/> </g> <path style="fill:#B48764;" d="M341.659,279.34l-45.724-21.169c-6.074-2.812-9.989-9.087-9.989-16.011v-32.416l-67.28,0.001v32.416 c0,6.924-3.914,13.198-9.989,16.01l-45.725,21.169c-12.149,5.624-19.978,18.174-19.978,32.022v91.115 c0,9.677,7.531,17.521,16.82,17.521h185.023c9.29,0,16.82-7.845,16.82-17.521v-91.114 C361.637,297.515,353.808,284.965,341.659,279.34z"/> <path style="fill:#5D5360;" d="M159.794,419.999l185.023-0.001c9.29,0,16.82-7.845,16.82-17.521v-91.114 c0-13.849-7.83-26.398-19.978-32.023l-45.413-21.024L264.2,290.362c-6.569,6.569-17.219,6.569-23.788,0l-32.047-32.047 l-45.414,21.025c-12.149,5.624-19.978,18.173-19.978,32.022v91.115C142.973,412.154,150.504,419.999,159.794,419.999z"/> <path style="fill:#966D50;" d="M218.665,209.744v32.416c0,3.209-0.916,6.237-2.423,8.887c10.727,5.838,23.015,9.158,36.064,9.158 c13.048,0,25.335-3.319,36.063-9.157c-1.508-2.65-2.423-5.679-2.423-8.888v-32.416L218.665,209.744z"/> <path style="fill:#C39772;" d="M252.306,243.385L252.306,243.385c-32.514,0-58.871-26.358-58.871-58.871v-50.461h117.743v50.461 C311.177,217.027,284.819,243.385,252.306,243.385z"/> <path style="fill:#B48764;" d="M227.075,184.513v-50.461h-33.641v50.461c0,32.514,26.358,58.871,58.871,58.871 c5.849,0,11.488-0.882,16.82-2.47C244.814,233.673,227.075,211.178,227.075,184.513z"/> <path style="fill:#5C414B;" d="M260.716,92.001h-16.82c-32.514,0-58.871,26.358-58.871,58.871v13.454 c0,6.232,6.613,10.464,12.125,7.557c8.532-4.5,18.54-12.896,25.265-21.953c2.716-3.658,7.938-4.2,11.59-1.475 c26.687,19.914,63.858,15.337,78.885,12.369c3.916-0.773,6.699-4.245,6.699-8.236v-1.715 C319.587,118.359,293.229,92.001,260.716,92.001z"/> <path style="fill:#503441;" d="M197.15,171.883c8.532-4.5,18.539-12.896,25.264-21.953c1.029-1.386,2.464-2.177,3.992-2.66 c-11.89-16.551-12.701-35.001-11.224-47.767c-17.985,10.075-30.158,29.289-30.158,51.37v13.454 C185.024,170.559,191.637,174.791,197.15,171.883z"/> <g> <path style="fill:#6F6571;" d="M185.024,346.347c0-6.692-2.658-13.109-7.39-17.841l-31.633-31.633 c-1.95,4.468-3.028,9.387-3.028,14.488v91.115c0,9.677,7.531,17.522,16.82,17.522h25.231V346.347z"/> <path style="fill:#6F6571;" d="M319.586,346.347c0-6.692,2.658-13.109,7.39-17.841l31.633-31.633 c1.95,4.468,3.028,9.387,3.028,14.488v91.115c0,9.677-7.531,17.522-16.82,17.522h-25.231L319.586,346.347L319.586,346.347z"/> <path style="fill:#6F6571;" d="M243.895,292.962v127.037l16.82-0.001V292.962C255.516,295.98,249.095,295.98,243.895,292.962z"/> </g></svg> <?php echo $wo["lang"]["no_users_found"];?></div>');
            } else {
                offline_users_container.html(data.html);
            }
            $('.chat-container').scrollTop($('.chat-container')[0].scrollHeight);
        }
    });
}

function Wo_UpdateStatus(status,event) {
    event.preventDefault();
    <?php if ($wo['config']['node_socket_flow'] == "1") { ?>
    if (status == 'offline') {
    	socket.emit('on_user_loggedoff', {from_id: _getCookie("user_id")});
    }
    if (status == 'online') {
    	socket.emit('on_user_loggedin', {from_id: _getCookie("user_id")});
    }
    <?php } ?>
    var status_container = $('.online-content-toggler');
    var offline_status = status_container.find('.chat-opacity');
    $.post(Wo_Ajax_Requests_File() + '?f=chat&s=update_chat_status', {
        status: status
    }, function(data) {
        if (data.status == 0) {
            offline_status.removeClass('active').fadeOut(200);
        } else {
            offline_status.addClass('active').fadeIn(200);
        }
    });
}

function Wo_RegisterTyping(id) {
  recipient_id = $('.chat_main_' + id).find('#user-id').val();
    if (typeof recipient_id === 'undefined') {
       return false;
    }
  <?php if ($wo['config']['node_socket_flow'] == "0") { ?>
    $.get(Wo_Ajax_Requests_File(), {
        f: 'chat',
        s: 'recipient_is_typing',
        recipient_id: recipient_id
    });
  <?php } ?>

  <?php if ($wo['config']['node_socket_flow'] == "1") { ?>
    socket.emit("typing", { recipient_id: recipient_id, user_id: _getCookie("user_id") })
  <?php } ?>

}

function Wo_DeleteTyping(id) {
  <?php if ($wo['config']['node_socket_flow'] == "1") { ?>
    socket.emit("typing_done", {recipient_id: id, user_id: _getCookie("user_id")})
  <?php } ?>
  <?php if ($wo['config']['node_socket_flow'] == "0") { ?>

    chat_container = $('.chat_main_' + id);
    recipient_id = chat_container.find('#user-id').val();
    if (typeof recipient_id === 'undefined') {
       return false;
    }
    $.get(Wo_Ajax_Requests_File(), {
        f: 'chat',
        s: 'remove_typing',
        recipient_id: recipient_id
    });
  <?php } ?>
}

function Wo_CloseChat(id, type) {
  var tab_type = {};
  if (!type) {
    Wo_CleanRecordNodes();
    Wo_StopLocalStream();
    <?php if ($wo['config']['message_typing'] == 1) { ?>
        Wo_DeleteTyping(id);
    <?php } ?>

    $('.chat_main_' + id).fadeOut(200, function () {
        $(this).remove();
    });

    $(document.body).removeAttr('data-chat-recipient');
    tab_type = {f: 'chat',s: 'close_chat',id:id};
  }
  else if(type == 'group'){
    $('.chat_main_0').fadeOut(200, function () {
        $(this).remove();
    });
    tab_type = {f: 'chat',s: 'close_group',id:id};
  }
  else if (type == 'page') {
  	$('.chat_main_0').fadeOut(200, function () {
        $(this).remove();
    });
    tab_type = {f: 'chat',s: 'close_page',id:id};
  }
  <?php if ($wo['config']['node_socket_flow'] == "1") { ?>
    if(type === "group"){
      socket.emit("close_chat", {recipient_id: id, user_id: _getCookie("user_id"), group: true})
    }
    else{
      socket.emit("close_chat", {recipient_id: id, user_id: _getCookie("user_id")})
    }
  <?php } ?>

  <?php //if ($wo['config']['node_socket_flow'] == "0") { ?>
    $.get(Wo_Ajax_Requests_File(),tab_type);
  <?php //} ?>

}
function Wo_DeleteChatMessage(message_id) {
  $.get(Wo_Ajax_Requests_File(), {
    f:'messages',
    s:'delete_message',
    message_id: message_id
  }, function (data) {
    if(data.status == 200) {
      $('#messageId_' + message_id).slideUp(200, function () {
        $(this).remove();
      });
    }
  });
}

function Wo_ShareChatFile(id) {

    <?php if ($wo['config']['node_socket_flow'] == "0") { ?>
    document.title = document_title;
    $("form.chat-sending-form-" + id + " #sendMessage").focus();
    $("form.chat-sending-form-" + id).submit();
  <?php } ?>
  <?php if ($wo['config']['node_socket_flow'] == "1") { ?>
    var main_hash_id = $('.main_session').val();
    var chat_messages_wrapper = $('.chat-messages-wrapper-'+id);

    $('form.chat-sending-form-'+id).ajaxSubmit({
        url: Wo_Ajax_Requests_File() + '?f=chat&s=send_message&hash=' + main_hash_id,
        beforeSend: function() {
            if (chat_messages_wrapper.find('.chat-user-desc').length == 1) {
                chat_messages_wrapper.find('.chat-user-desc').hide();
            }
            var text_message = escapeHTML($('.chat-sending-form-'+id+' #sendMessage').val());
            $('.chat-sending-form-'+id).attr('disabled', true);
            var color = $('.chat-sending-form-'+id+' #color').val();
            <?php  if (!empty($wo['chat']['color'])) { ?>
             var html_message = '<div class="sended_message"><div class="messages-wrapper pull-right messages-text" id="messageId_" data-message-id=""><div class="message outgoing pull-right"><p class="message-text" style="background: ' + color + ';color: #fff" dir="auto">' + text_message + '</p><div class="clear"></div><div class="message-media"></div></div><div class="clear"></div><div class="message-seen text-right message-details"></div><div class="clear"></div><div class="message-typing message-details"></div></div><div class="clear"></div></div>';
            <?php } else { ?>
              var html_message = '<div class="sended_message"><div class="messages-wrapper pull-right messages-text" id="messageId_" data-message-id=""><div class="message outgoing pull-right"><p class="message-text" dir="auto">' + text_message + '</p><div class="clear"></div><div class="message-media"></div></div><div class="clear"></div><div class="message-seen text-right message-details"></div><div class="clear"></div><div class="message-typing message-details"></div></div><div class="clear"></div></div>';
            <?php } ?>
            if (!text_message && $('form.chat-sending-form-'+id).find('input.message-record').val() == '' && $('form.chat-sending-form-'+id).find('#chatSticker').val() == '') {
              $('form.chat-sending-form-'+id).find('#sendMessasgeFile').val('');
              return false;
            }
            $('body').attr('sending-'+id, true);
            if (text_message && $('form.chat-sending-form-'+id+' #sendMessasgeFile').val() == '') {
              if (chat_messages_wrapper.length == 0) {
                chat_messages_wrapper.html(html_message);
              } else {
                chat_messages_wrapper.append(html_message);
              }
            }
            setTimeout(function() {
                  chat_messages_wrapper.scrollTop(chat_messages_wrapper[0].scrollHeight);
            }, 100);
            $('form.chat-sending-form-'+id).clearForm();
        },
        uploadProgress: function () {
		  $('form.chat-sending-form-'+id).find('.ball-pulse').fadeIn(100);
        },
        success: function(data) {
            if (data.status == 200) {
                chat_messages_wrapper.find("div[class*='message-seen']").empty();
                chat_messages_wrapper.find("div[class*='message-typing']").empty();
                if( data.stickers == true ){
                  chat_messages_wrapper.append(data.html);
                }else{
                  chat_messages_wrapper.append(data.html);
                }
                var dom = $($.parseHTML(data.html));
                var mediaId = dom.find(".message").attr("onclick").substr("Wo_ShowMessageOptions(".length, dom.find(".message").attr("onclick").indexOf(')')-"Wo_ShowMessageOptions(".length);

                $('form.chat-sending-form-'+id).find('input.message-record').val('');
                $('form.chat-sending-form-'+id).find('input.media-name').val('');
                $("#chatSticker").val('');
                $("#chat-gifs").removeClass('open');
                if (data.invalid_file == 1) {
                  $("#invalid_file").modal('show');
                  Wo_Delay(function(){
                    $("#invalid_file").modal('hide');
                  },3000);
				          $('form.chat-sending-form-'+id).find('.ball-pulse').fadeOut(100);
                }
                if(data.invalid_file == 2){
                  $("#file_not_supported").modal('show');
                  Wo_Delay(function(){
                    $("#file_not_supported").modal('hide');
                  },3000);
                }

                if (![1,2].includes(data.invalid_file)) {
                  socket.emit("private_message", {
                      to_id: id,
                      from_id: _getCookie("user_id"),
                      username: '<?php echo $wo['user']['username']; ?>',
                      mediaId: mediaId,
                      isSticker: false
                  })
                }

                $('body').attr('sending-'+id, false);
                if (data.file == true) {
                  $('form.chat-sending-form-'+id).find('.ball-pulse').fadeOut(100);
                }

            }
            else if(data.status == 500 && data.invalid_file == 1){
              $("#invalid_file").modal('show');
              Wo_Delay(function(){
                $("#invalid_file").modal('hide');
              },3000);
              $('form.chat-sending-form-'+id).find('.ball-pulse').fadeOut(100);
            }
            else if(data.status == 500 && data.invalid_file == 2){
              $("#file_not_supported").modal('show');
              Wo_Delay(function(){
                $("#file_not_supported").modal('hide');
              },3000);
              $('form.chat-sending-form-'+id).find('.ball-pulse').fadeOut(100);
            }
            else if(data.status == 500 && data.invalid_file == 3){
              $("#pro_upload_file").modal('show');
              Wo_Delay(function(){
                $("#pro_upload_file").modal('hide');
              },3000);
              $('form.chat-sending-form-'+id).find('.ball-pulse').fadeOut(100);
            }
            setTimeout(function() {
              chat_messages_wrapper.scrollTop(chat_messages_wrapper[0].scrollHeight);
            }, 700);
        }
    });
   <?php } ?>
}

function Wo_AddEmoToChat(id, code) {
    inputTag = $('.chat-sending-form-'+ id +' textarea');
    inputVal = inputTag.val();
    $('.emo-container').hide();
    if (typeof(inputTag.attr('placeholder')) != "undefined") {
        inputPlaceholder = inputTag.attr('placeholder');
        if (inputPlaceholder == inputVal) {
            inputTag.val('');
            inputVal = inputTag.val();
        }
    }
    if (inputVal.length == 0) {
        inputTag.val(code + ' ');
    } else {
        inputTag.val(inputVal + ' ' + code);
    }
    inputTag.keyup().focus();
}

function Wo_AddEmoToGroup(id, code,type = '') {
    inputTag = $('.group-chat-sending-'+ id +' textarea');
    if (type == 'page') {
		inputTag = $('.page-chat-sending-'+ id +' textarea');
	}
    inputVal = inputTag.val();
    $('.emo-container').hide();
    if (typeof(inputTag.attr('placeholder')) != "undefined") {
        inputPlaceholder = inputTag.attr('placeholder');
        if (inputPlaceholder == inputVal) {
            inputTag.val('');
            inputVal = inputTag.val();
        }
    }
    if (inputVal.length == 0) {
        inputTag.val(code + ' ');
    } else {
        inputTag.val(inputVal + ' ' + code);
    }
    inputTag.keyup().focus();
}

function Wo_AddEmoToPage(id, code) {
	inputTag = $('.page-chat-sending-'+ id +' textarea');

    inputVal = inputTag.val();
    $('.emo-container').hide();
    if (typeof(inputTag.attr('placeholder')) != "undefined") {
        inputPlaceholder = inputTag.attr('placeholder');
        if (inputPlaceholder == inputVal) {
            inputTag.val('');
            inputVal = inputTag.val();
        }
    }
    if (inputVal.length == 0) {
        inputTag.val(code + ' ');
    } else {
        inputTag.val(inputVal + ' ' + code);
    }
    inputTag.keyup().focus();
}

function Wo_Typing(e, recipient_id){
  <?php if ($wo['config']['node_socket_flow'] == "1") { ?>
    socket.emit("typing", { recipient_id: recipient_id, user_id: _getCookie("user_id") })
  <?php } ?>
}

function Wo_SubmitChatForm(e, id) {
    document.title = document_title;
    <?php if ($wo['config']['message_typing'] == 1) { ?>
    var typing_chat_con = $('.chat_main_' + id);
    if (typing_chat_con.find('#sendMessage').val().length > 1) {
        if (typeof (typing_chat_con.attr('data-typing')) == "undefined" || typing_chat_con.attr('data-typing') == 'false') {
            typing_chat_con.attr('data-typing', 'true');
            Wo_RegisterTyping(id);
        }
    }
    else if (typing_chat_con.find('#sendMessage').val().length == 1) {
        if (typeof (typing_chat_con.attr('data-typing')) != "undefined") {
           if (typing_chat_con.attr('data-typing') == 'true') {
               typing_chat_con.attr('data-typing', 'false');
               //typing_chat_con.removeAttr('data-typing');
               Wo_DeleteTyping(id);
            }
           }
        }
    <?php } ?>
    chat_tab_container = $('.chat_main_' + id);
    if (e.keyCode == 13 && e.shiftKey == 0) {
        Wo_DeleteTyping(id);
        e.preventDefault();
        Wo_RegisterTabMessage(id);
        typing_chat_con.find('.messages-text:last').find('.message-seen').empty();
        $('form.chat-sending-form-' + id).submit()
    } else {
      if(e.keyCode && ![17, 18, 9].includes(e.keyCode)){
        Wo_Typing(e, id)
      }
    }
}

function Wo_SearchGChatParticipants(name,group_id){
  if (!name || !group_id) { return false;}
  $.ajax({
      url: Wo_Ajax_Requests_File(),
      type: 'GET',
      dataType: 'json',
      data: {f: 'chat',s:'search_parts',name:name,group_id:group_id},
  })
  .done(function(data) {
      if (data.status == 200) {
          $('.group_chat_mbr_list_' + group_id).html(data.html);
      }
      else{
        $('.group_chat_mbr_list_' + group_id).html('<p class="search-filter-center-text"><?php echo $wo['lang']['no_result']; ?></p>');
      }
  })
  .fail(function() {
      console.log("error");
  })
}

function Wo_AddGChatPart(group_id, user_id){
  if (!user_id || !group_id) { return false;}
  $.ajax({
    url: Wo_Ajax_Requests_File(),
    type: 'GET',
    dataType: 'json',
    data: {f: 'chat',s:'add_gchat_user',user_id:user_id,group_id:group_id},
  })
  .done(function(data) {
    if (data.status == 200 && data.code == 1) {
      $("[data-group-chat-part='"+user_id+"']").find('span.status').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="red" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg>');
      if (node_socket_flow == "1") {
         socket.emit("user_notification", { to_id: user_id, user_id: _getCookie("user_id"), type: "request" });
      }
    }
    else if(data.status == 200 && data.code == 0){
      $("[data-group-chat-part='"+user_id+"']").find('span.status').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="green" d="M17,13H13V17H11V13H7V11H11V7H13V11H17M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg>');
      if (node_socket_flow == "1") {
         socket.emit("user_notification", { to_id: user_id, user_id: _getCookie("user_id"), type: "request_removed" });
      }
    }
    else{
      return false;
    }
  })
  .fail(function() {
    console.log("error");
  })
}
</script>
<?php } ?>
