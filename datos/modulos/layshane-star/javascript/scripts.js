setTimeout(console.log.bind(console, "%c¡Detente!", "font-family:Helvetica, Arial, sans-serif; font-weight: bold; color: red; font-size: 45px; padding-top:10px;padding-bottom:10px;"));
setTimeout(console.log.bind(console, "%cEsta función del navegador está pensada para desarrolladores. Si alguien te indicó que copiaras y pegaras algo aquí para habilitar una función de layshane o para hackear la cuenta de alguien, se trata de un fraude. Si lo haces, esta persona podrá acceder a tu cuenta.", "font-family: Helvetica, Arial, sans-serif; color: #555; font-size: 20px; padding-top:15px;padding-bottom:15px;"));
setTimeout(console.log.bind(console, "%cPara obtener más información, consulta https://layshaneperu.com/", "font-family:Helvetica, Arial, sans-serif; font-weight: normal; color: #555; font-size: 20px; padding-top:15px;padding-bottom:15px;"));
current_notification_number = 0;
current_messages_number = 0;
current_follow_requests_number = 0;
current_width = $(window).width();

document_title = document.title;
$(document).on('click', '.filterby li.filter-by-li', function(event) {
  $('.filterby li.filter-by-li').each(function(){
    $(this).removeClass('avtive');
    $(this).find('i').addClass('hidden');
  });
  $(this).find('i').removeClass('hidden');
  $(this).addClass('avtive');
});

$(document).on('click', '.postText', function(event) {
  textAreaAdjust(this, 70);
});
$(function () {
  $(window).on("dragover",function(e){
    e.preventDefault();
  },false);

  $(window).on("drop",function(e){
    e.preventDefault();
  },false);
  $('#movies-comment').autogrow({vertical: true, horizontal: false, height: 200});
  $('#blog-comment').autogrow({vertical: true, horizontal: false, height: 200});
  var api = $('#api').val();
  var hash = $('.main_session').val();
  setTimeout(function (argument) {
    $.ajaxSetup({
    data: {
        hash: hash
    },
    cache: false
  });
  },100)
  $(document).on("click",".mfp-arrow",function(event) {
    Wo_StoryProgress();
  });
  $(document).on('click', '.messages-recipients-list', function(event) {
    scrollToTop();
  });

  $('.nav-tabs a').on('shown.bs.tab', function (e) {
    $('body').scrollTop(0);
  });
  intervalUpdates = setTimeout(Wo_intervalUpdates, 6000);
  if (node_socket_flow == "0") {
    setTimeout(Wo_IsLogged, 30000);
  }
  //  dropdown won't close on click
  $('.dropdown-menu.request-list, .dropdown-menu.post-recipient, .dropdown-menu.post-options').click(function (e) {
    e.stopPropagation();
  });
  scrolled = 0;
  if(current_width > 900 || api) {
    $(window).scroll(function () {
      if($('.footer-wrapper').scrollTop() > 500) {
        $('.footer-wrapper .dropdown-menu').css('bottom', 'auto');
      } else {
        $('.footer-wrapper .dropdown-menu').css('bottom', '100%');
      }
      if($(document).scrollTop() > 200) {
        $('.sidebar-sticky').addClass('Stick');
      } else {
        $('.sidebar-sticky').removeClass('Stick');
      }
      var nearToBottom = 100;
      if($('#posts').length > 0) {
          if ($(window).scrollTop() + $(window).height() > $(document).height() - nearToBottom) {
            if (scrolled == 0) {
               scrolled = 1;
               Wo_GetMorePosts();
            }
          }
      }
    });
  }
});
function Wo_CloseModels() {
  $('.modal').modal('hide');
}
// update user last seen
function Wo_UpdateLastSeen() {
  $.get(Wo_Ajax_Requests_File(), {
    f: 'update_lastseen'
  }, function () {
    setTimeout(Wo_UpdateLastSeen, 40000);
  });
}
// js function
function Wo_CheckUsername(username) {
  var check_container = $('.checking');
  var check_input = $('#username').val();
  if(check_input == '') {
    check_container.empty();
    return false;
  }
  check_container.removeClass('unavailable').removeClass('available').html('<i class="fa fa-clock-o"></i><span id="loading"> Checking <span>.</span><span>.</span><span>.</span></span>');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'check_username',
    username: username
  }, function (data) {
    if(data.status == 200) {
      check_container.html('<i class="fa fa-check"></i> ' + data.message).removeClass('unavailable').addClass('available');
    } else if(data.status == 300) {
      check_container.html('<i class="fa fa-remove"></i> ' + data.message).removeClass('available').addClass('unavailable');
    } else if(data.status == 400) {
      check_container.html('<i class="fa fa-remove"></i> ' + data.message).removeClass('available').addClass('unavailable');
    } else if(data.status == 500) {
      check_container.html('<i class="fa fa-remove"></i> ' + data.message).removeClass('available').addClass('unavailable');
    } else if(data.status == 600) {
      check_container.html('<i class="fa fa-remove"></i> ' + data.message).removeClass('available').addClass('unavailable');
    }
  });
}

// scroll to top function
function scrollToTop() {
  verticalOffset = typeof (verticalOffset) != 'undefined' ? verticalOffset : 0;
  element = $('html');
  offset = element.offset();
  offsetTop = offset.top;
  $('html, body').animate({
    scrollTop: offsetTop
  }, 300, 'linear');
}

// check if user is logged in function
function Wo_IsLogged() {
  $.post(Wo_Ajax_Requests_File() + '?f=session_status', function (data) {
    setTimeout(Wo_UpdateLastSeen, 30000);
    if(data.status == 200) {
      $('#logged-out-modal').modal({
        show: true
      });
    }
  });
}

// get new notifications
function Wo_OpenNotificationsMenu() {
  notification_container = $('.notification-container');
  notification_list = $('#notification-list');
  notification_container.find('.new-update-alert').addClass('hidden').text('0');
  Wo_progressIconLoader(notification_container.find('.notification-loading-progress'));
  $.get(Wo_Ajax_Requests_File(), {
    f: 'get_notifications'
  }, function (data) {
    if(data.status == 200) {
      if(data.html.length == 0) {
        notification_list.html('<div class="empty_state single"><svg height="511pt" viewBox="-21 1 511 511.99998" width="511pt" xmlns="http://www.w3.org/2000/svg"><path d="m311.628906 435.773438c0 35.046874-23.644531 64.554687-55.839844 73.46875-6.488281 1.796874-13.320312 2.757812-20.375 2.757812-42.097656 0-76.226562-34.125-76.226562-76.226562l76.347656-39.234376zm0 0" fill="#e58e13"/><path d="m307.941406 459.285156c-7.847656 24.21875-27.492187 43.132813-52.152344 49.957032-15.503906-4.289063-29.023437-13.351563-38.875-25.503907-7.941406-9.800781-.777343-24.453125 11.835938-24.453125zm0 0" fill="#f7d360"/><path d="m432.210938 359.558594-163.761719 35.414062-229.84375-35.414062c18.035156 0 28.234375-9.433594 34.023437-25.078125 28.003906-75.523438-46.582031-295.632813 162.785156-295.632813 209.367188 0 134.769532 220.109375 162.773438 295.632813 5.800781 15.644531 15.996094 25.078125 34.023438 25.078125zm0 0" fill="#f7d360"/><path d="m470.316406 397.667969c0 21.042969-17.0625 38.105469-38.105468 38.105469h-393.605469c-10.519531 0-20.050781-4.261719-26.945313-11.160157-6.898437-6.894531-11.160156-16.425781-11.160156-26.945312 0-21.046875 17.0625-38.109375 38.105469-38.109375h393.605469c10.519531 0 20.050781 4.265625 26.945312 11.160156 6.898438 6.898438 11.160156 16.425781 11.160156 26.949219zm0 0" fill="#e58e13"/><path d="m398.1875 334.480469h-204.574219c-22.054687 0-39.691406-18.253907-39.007812-40.300781 2.882812-93.265626-11.992188-253.558594 79.277343-255.320313-250.535156 1.296875-90.382812 320.699219-195.269531 320.699219h393.597657c-18.027344 0-28.222657-9.433594-34.023438-25.078125zm0 0" fill="#e58e13"/><path d="m470.316406 397.667969c0 21.042969-17.0625 38.105469-38.105468 38.105469h-283.480469c-10.523438 0-20.054688-4.261719-26.949219-11.160157-6.894531-6.894531-11.160156-16.425781-11.160156-26.945312 0-21.046875 17.0625-38.109375 38.109375-38.109375h283.480469c10.519531 0 20.050781 4.265625 26.945312 11.160156 6.898438 6.898438 11.160156 16.425781 11.160156 26.949219zm0 0" fill="#f7d360"/><path d="m274.148438 41.765625c.082031-.960937.113281-1.933594.113281-2.917969 0-21.449218-17.394531-38.847656-38.847657-38.847656-21.460937 0-38.847656 17.398438-38.847656 38.847656 0 .984375.03125 1.957032.113282 2.917969" fill="#e58e13"/><g fill="#e6e6e6"><path d="m424.613281 167.71875c-4.328125 0-7.835937-3.511719-7.835937-7.835938 0-36.269531-9.324219-67.222656-27.710938-92-13.726562-18.496093-27.683594-26.457031-27.820312-26.539062-3.765625-2.113281-5.121094-6.878906-3.019532-10.652344 2.101563-3.769531 6.84375-5.136718 10.621094-3.050781.667969.371094 16.535156 9.277344 32.25 30.160156 14.304688 19.007813 31.355469 52.148438 31.355469 102.082031 0 4.324219-3.511719 7.835938-7.839844 7.835938zm0 0"/><path d="m459.09375 122.789062c-4.328125 0-7.835938-3.507812-7.835938-7.835937 0-50.023437-29.625-69.910156-30.886718-70.730469-3.613282-2.355468-4.660156-7.195312-2.328125-10.820312 2.335937-3.625 7.140625-4.695313 10.777343-2.378906 1.558594.988281 38.109376 24.929687 38.109376 83.929687 0 4.328125-3.507813 7.835937-7.835938 7.835937zm0 0"/><path d="m46.203125 167.71875c-4.328125 0-7.835937-3.511719-7.835937-7.835938 0-49.933593 17.050781-83.074218 31.351562-102.082031 15.71875-20.882812 31.582031-29.792969 32.25-30.160156 3.789062-2.09375 8.558594-.71875 10.652344 3.070313 2.089844 3.78125.722656 8.539062-3.050782 10.636718-.308593.175782-14.171874 8.15625-27.816406 26.535156-18.390625 24.777344-27.710937 55.730469-27.710937 92-.003907 4.324219-3.511719 7.835938-7.839844 7.835938zm0 0"/><path d="m11.722656 122.789062c-4.328125 0-7.835937-3.507812-7.835937-7.835937 0-59 36.554687-82.941406 38.109375-83.929687 3.652344-2.324219 8.496094-1.246094 10.820312 2.402343 2.316406 3.640625 1.253906 8.46875-2.375 10.796875-1.300781.851563-30.882812 20.746094-30.882812 70.730469 0 4.328125-3.507813 7.835937-7.835938 7.835937zm0 0"/></g></svg>' + data.message + '</div>');
      } else {
        document.getElementById('notification-list').innerHTML = data.html;
        Wo_intervalUpdates();
      }
    }
    Wo_progressIconLoader(notification_container.find('.notification-loading-progress'));
  });
}
function Wo_OpenMessagesMenu() {
  messages_container = $('.messages-notification-container');
  messages_list = $('#messages-list');
  Wo_progressIconLoader(messages_container.find('.notification-loading-progress'));
  $.get(Wo_Ajax_Requests_File(), {
    f: 'get_messages'
  }, function (data) {
    if(data.status == 200) {
      if(data.html.length == 0) {
        messages_list.html('<div class="empty_state single"><svg height="512pt" viewBox="0 -16 512.00002 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="m408.96875 86.230469c0-39.242188 0-70.875 0-72.9375 0-7.3125-5.882812-13.292969-13.078125-13.292969h-342.695313c-7.195312 0-13.082031 5.980469-13.082031 13.292969v72.9375zm0 0" fill="#f4b537"/><path d="m84.101562 0h-30.90625c-7.195312 0-13.082031 5.980469-13.082031 13.292969v72.9375h30.910157c0-39.242188 0-70.875 0-72.9375 0-7.3125 5.882812-13.292969 13.078124-13.292969zm0 0" fill="#eaa01c"/><path d="m334.917969 86.230469 74.050781-72.9375c0-7.3125-5.882812-13.292969-13.078125-13.292969h-342.695313c-7.195312 0-13.082031 5.980469-13.082031 13.292969l74.050781 72.9375zm0 0" fill="#feca57"/><path d="m40.113281 13.292969 30.910157 30.445312c0-17.527343 0-29.214843 0-30.445312 0-7.3125 5.882812-13.292969 13.078124-13.292969h-30.90625c-7.195312 0-13.082031 5.980469-13.082031 13.292969zm0 0" fill="#f4b537"/><path d="m326.84375 387.878906c0-51.132812 41.449219-92.578125 92.578125-92.578125 10.375 0 20.351563 1.707031 29.664063 4.851563 0-80.453125 0-195.015625 0-199.378906 0-8.757813-7.167969-15.921876-15.925782-15.921876h-417.234375c-8.761719 0-15.925781 7.164063-15.925781 15.921876v277.148437c0 8.757813 7.164062 15.921875 15.925781 15.921875h311.113281c-.125-1.972656-.195312-3.960938-.195312-5.964844zm0 0" fill="#feca57"/><path d="m30.90625 377.921875c0-2.886719 0-270.433594 0-277.148437 0-8.757813 7.167969-15.921876 15.925781-15.921876h-30.90625c-8.761719 0-15.925781 7.164063-15.925781 15.921876v277.148437c0 8.757813 7.164062 15.921875 15.925781 15.921875h30.90625c-8.757812 0-15.925781-7.164062-15.925781-15.921875zm0 0" fill="#f4b537"/><path d="m326.84375 387.878906c0-35.171875 19.609375-65.761718 48.496094-81.433594l-69.230469-67.097656-33.820313 32.773438c-26.605468 25.792968-68.886718 25.792968-95.496093 0l-33.816407-32.773438-142.976562 138.574219c0 8.757813 7.164062 15.921875 15.925781 15.921875h311.113281c-.125-1.972656-.195312-3.960938-.195312-5.964844zm0 0" fill="#f4b537"/><path d="m164.503906 260.210938-21.527344-20.863282-142.976562 138.574219c0 8.757813 7.164062 15.921875 15.925781 15.921875h10.695313zm0 0" fill="#eaa01c"/><path d="m433.160156 84.851562h-417.234375c-8.761719 0-15.925781 7.164063-15.925781 15.921876l176.792969 173.410156c26.609375 25.789062 68.890625 25.789062 95.496093 0l176.796876-173.410156c0-8.757813-7.167969-15.921876-15.925782-15.921876zm0 0" fill="#fcd486"/><path d="m0 100.773438 30.90625 30.316406c0-17.546875 0-28.992188 0-30.316406 0-8.757813 7.167969-15.921876 15.925781-15.921876h-30.90625c-8.761719 0-15.925781 7.164063-15.925781 15.921876zm0 0" fill="#feca57"/><path d="m512 387.324219c0 51.433593-41.695312 93.128906-93.132812 93.128906-51.433594 0-93.132813-41.695313-93.132813-93.128906 0-51.4375 41.699219-93.132813 93.132813-93.132813 51.4375 0 93.132812 41.695313 93.132812 93.132813zm0 0" fill="#ff6b6b"/><path d="m356.644531 387.324219c0-46.171875 33.597657-84.488281 77.675781-91.851563-5.023437-.839844-10.1875-1.28125-15.453124-1.28125-51.433594 0-93.132813 41.695313-93.132813 93.128906 0 51.4375 41.699219 93.132813 93.132813 93.132813 5.265624 0 10.429687-.441406 15.453124-1.28125-44.078124-7.363281-77.675781-45.679687-77.675781-91.847656zm0 0" fill="#ee5253"/><path d="m430.347656 387.878906 27.199219-27.199218c3.019531-3.019532 3.019531-7.910157 0-10.929688-3.015625-3.015625-7.910156-3.015625-10.925781 0l-27.199219 27.199219-27.199219-27.199219c-3.015625-3.015625-7.910156-3.015625-10.925781 0-3.019531 3.019531-3.019531 7.910156 0 10.929688l27.199219 27.199218-27.199219 27.195313c-3.019531 3.019531-3.019531 7.910156 0 10.929687 1.507813 1.507813 3.484375 2.261719 5.464844 2.261719 1.976562 0 3.953125-.753906 5.460937-2.261719l27.199219-27.199218 27.199219 27.199218c1.511718 1.507813 3.488281 2.261719 5.464844 2.261719 1.976562 0 3.953124-.753906 5.464843-2.261719 3.015625-3.019531 3.015625-7.910156 0-10.929687zm0 0" fill="#e4eaf8"/></svg>' + data.message + '</div>');
      } else {
        //messages_list.html(data.html);
        document.getElementById('messages-list').innerHTML = data.html;
        messages_list.append('<div class="show-message-link-container"><a href="' + data.messages_url + '" class="show-message-link">' + data.messages_text + '</a></div>');
        //Wo_intervalUpdates();
      }
    }
    Wo_progressIconLoader(messages_container.find('.notification-loading-progress'));
  });
}
// get new friend requests
function Wo_OpenRequestsMenu() {
  requests_container = $('.requests-container');
  requests_List = $('#requests-list');
  Wo_progressIconLoader(requests_container.find('.requests-loading'));
  $.get(Wo_Ajax_Requests_File(), {
    f: 'get_follow_requests'
  }, function (data) {
    if(data.status == 200) {
      requests_container.find('.new-update-alert').addClass('hidden');
      requests_container.find('.new-update-alert').addClass('hidden').text('0').hide();
      if(data.html.length == 0) {
        requests_List.html('<div class="empty_state single"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g> <path xmlns="http://www.w3.org/2000/svg" style="" d="M296.932,314.08c-9.531-1.916-16.387-10.287-16.387-20.009v-46.004h-45.143l0,0h-45.143v46.004  c0,9.721-6.857,18.093-16.387,20.009l-11,2.211v73.876h72.53l0,0h72.53v-73.876L296.932,314.08z" fill="#fce0a2" data-original="#fce0a2" class=""/> <path xmlns="http://www.w3.org/2000/svg" style="" d="M236.594,248.068v63c0,9.721,6.857,18.093,16.387,20.009l11.782,2.877l43.168,12.454v-30.117  l-11-2.211c-9.531-1.916-16.387-10.287-16.387-20.009v-46.004L236.594,248.068L236.594,248.068z" fill="#f2ca91" data-original="#f2ca91" class=""/> <path xmlns="http://www.w3.org/2000/svg" style="" d="M390.924,338.885l-91.681-28.586c-2.138-0.667-4.468-0.231-6.22,1.164l-57.622,45.859l-57.622-45.859  c-1.753-1.395-4.082-1.831-6.22-1.164l-91.681,28.586c-40.145,11.82-67.708,48.669-67.708,90.518v60.322  c0,4.802,3.893,8.695,8.695,8.695h429.072c4.802,0,8.695-3.893,8.695-8.695v-60.322  C458.633,387.554,431.069,350.705,390.924,338.885z" fill="#f7d360" data-original="#4cbad8" class=""/> <path xmlns="http://www.w3.org/2000/svg" style="" d="M390.924,338.885l-91.681-28.586c-2.138-0.667-4.468-0.231-6.221,1.164l-28.259,22.491l82.825,23.895  c39.162,11.108,66.725,47.957,66.725,89.806v50.765h35.624c4.802,0,8.695-3.893,8.695-8.695v-60.322  C458.633,387.554,431.069,350.705,390.924,338.885z" fill="#f39e26" data-original="#37a6c4" class=""/> <path xmlns="http://www.w3.org/2000/svg" style="" d="M70.084,412.721c-4.267,0-7.726,3.459-7.726,7.726v77.974H77.81v-77.974  C77.81,416.18,74.352,412.721,70.084,412.721z" fill="#e58e13" data-original="#2195bd" class=""/> <g xmlns="http://www.w3.org/2000/svg"> <path style="" d="M350.258,200.069h-18.342v-53.192h18.342c9.452,0,17.114,7.662,17.114,17.114v18.965   C367.371,192.407,359.709,200.069,350.258,200.069z" fill="#f2ca8f" data-original="#f2ca8f"/> <path style="" d="M120.546,200.069h18.342v-53.192h-18.342c-9.452,0-17.114,7.662-17.114,17.114v18.965   C103.432,192.407,111.094,200.069,120.546,200.069z" fill="#f2ca8f" data-original="#f2ca8f"/> </g> <path xmlns="http://www.w3.org/2000/svg" style="" d="M235.402,284.124L235.402,284.124c-59.144,0-107.089-47.945-107.089-107.089v-30.096  c0-59.144,47.945-107.089,107.089-107.089l0,0c59.144,0,107.089,47.945,107.089,107.089v30.096  C342.491,236.178,294.546,284.124,235.402,284.124z" fill="#fce0a2" data-original="#fce0a2" class=""/> <path xmlns="http://www.w3.org/2000/svg" style="" d="M235.402,39.85L235.402,39.85c-7.575,0-14.964,0.791-22.094,2.287  c48.543,10.182,84.996,53.233,84.996,104.802v30.096c0,51.569-36.453,94.62-84.996,104.802c7.13,1.496,14.519,2.287,22.093,2.287  l0,0c59.144,0,107.089-47.945,107.089-107.089v-30.096C342.491,87.796,294.546,39.85,235.402,39.85z" fill="#f2ca91" data-original="#f2ca91" class=""/> <path xmlns="http://www.w3.org/2000/svg" style="" d="M253.624,0h-36.445c-61.611,0-111.556,49.945-111.556,111.556v44.07  c2.932-5.218,8.511-8.749,14.922-8.749h7.767c0.008-13.028,2.344-25.511,6.611-37.057c47.353-13.416,95.48,23.199,147.819,23.199  c26.141,0,43.985-5.85,56.053-13.004l0.279-0.003c2.224,8.585,3.41,17.587,3.415,26.866h7.768c6.411,0,11.991,3.531,14.922,8.749  v-44.07C365.18,49.945,315.234,0,253.624,0z" fill="#f9a058" data-original="#f9a058"/> <path xmlns="http://www.w3.org/2000/svg" style="" d="M253.624,0h-36.445c-1.296,0-2.585,0.03-3.871,0.074c59.817,2.041,107.685,51.167,107.685,111.482  v16.232c6.999-2.174,12.89-4.861,17.803-7.774l0.279-0.003c2.223,8.585,3.41,17.587,3.415,26.866h7.767  c6.411,0,11.991,3.531,14.922,8.749v-44.07C365.18,49.945,315.234,0,253.624,0z" fill="#ef8d43" data-original="#ef8d43"/> <circle xmlns="http://www.w3.org/2000/svg" style="" cx="408.28" cy="420.45" r="91.55" fill="#e9f6ff" data-original="#e9f6ff" class=""/> <path xmlns="http://www.w3.org/2000/svg" style="" d="M408.276,328.893c-7.667,0-15.112,0.948-22.23,2.723c39.82,9.933,69.323,45.934,69.323,88.83  s-29.503,78.896-69.323,88.83c7.117,1.775,14.562,2.724,22.23,2.724c50.564,0,91.553-40.99,91.553-91.553  S458.839,328.893,408.276,328.893z" fill="#ccdfed" data-original="#ccdfed" class=""/> <path xmlns="http://www.w3.org/2000/svg" style="" d="M455.346,414.354h-39.344V375.01c0-4.267-3.458-7.726-7.726-7.726c-4.267,0-7.726,3.459-7.726,7.726  v39.344h-39.344c-4.267,0-7.726,3.459-7.726,7.726s3.458,7.726,7.726,7.726h39.344v39.344c0,4.267,3.458,7.726,7.726,7.726  c4.267,0,7.726-3.459,7.726-7.726v-39.344h39.344c4.267,0,7.726-3.459,7.726-7.726S459.613,414.354,455.346,414.354z" fill="#fc6060" data-original="#fc6060" class=""/> <g xmlns="http://www.w3.org/2000/svg"> <path style="" d="M235.402,357.323l-23.358,20.429c-3.868,3.383-9.696,3.189-13.331-0.443l-57.572-57.525   l30.419-9.485c2.138-0.667,4.468-0.231,6.22,1.164L235.402,357.323z" fill="#e58e13" data-original="#2195bd" class=""/> <path style="" d="M235.402,357.323l23.358,20.429c3.868,3.383,9.696,3.189,13.331-0.443l57.572-57.525l-30.419-9.485   c-2.138-0.667-4.468-0.231-6.22,1.164L235.402,357.323z" fill="#e58e13" data-original="#2195bd" class=""/> </g> </g></svg>' + data.message + '</div>');
      } else {
        requests_List.html(data.html);
        Wo_intervalUpdates();
      }
    }
    Wo_progressIconLoader(requests_container.find('.requests-loading'));
  });
}

// Notifications & follow requests updates
function Wo_intervalUpdates(force_update = 0, loop = 0) {
    if (node_socket_flow == "0" || force_update == 1) {
    var check_posts = true;
    var hash_posts = true;
    if ($('.posts-hashtag-count').length == 0) {
      hash_posts = false;
    }
    var api = $('#api').val();
    if (api) {
      return false;
    }
    if ($('.posts-count').length == 0 || hash_posts == true) {
      check_posts = false;
    }
    if(typeof ($('#posts').attr('data-story-user')) == "string") {
      user_id = $('#posts').attr('data-story-user');
    } else {
      user_id = 0;
    }
    before_post_id = 0;
    if($('.post-container').length > 0) {
      var before_post_id = $('.post-container  > .post:not(.boosted)').attr('data-post-id');
    }
    var notification_container = $('.notification-container');
    var messages_notification_container = $('.messages-notification-container');
    var follow_requests_container = $('.requests-container');
    var ajax_request = {
      f: 'update_data',
      user_id: user_id,
      before_post_id: before_post_id,
      check_posts:check_posts,
      hash_posts:hash_posts
    };
    if (hash_posts == true) {
      ajax_request['hashtagName'] = $('#hashtagName').val();
    }
    $.get(Wo_Ajax_Requests_File(), ajax_request, function (data) {
      if (node_socket_flow == "0" || force_update == 0 || loop == 1) {
          clearTimeout(intervalUpdates);
          intervalUpdates = setTimeout(function () {
            Wo_intervalUpdates(force_update);
          } , 5000);
      }
      if (hash_posts == true) {
          if (data.count_num > 0) {
            $('.posts-count').html(data.count);
          }
      } else {
          if (data.count_num > 0 && $('.filter-by-more').attr('data-filter-by') == 'all') {
            $('.posts-count').html(data.count);
          }
      }
      if(typeof (data.notifications) != "undefined" && data.notifications > 0) {
        notification_container.find('.new-update-alert').removeClass('hidden');
        notification_container.find('.sixteen-font-size').addClass('unread-update');
        notification_container.find('.new-update-alert').text(data.notifications).show();
        if(current_width > 800 && data.pop == 200) {
          Wo_NotifyMe(data.icon, decodeHtml(data.title), decodeHtml(data.notification_text), data.url);
        }
        if(data.notifications != current_notification_number) {
          if (data.notifications_sound == 0 && current_notification_number) {
            document.getElementById('notification-sound').play();
          }
          current_notification_number = data.notifications;
        }
      } else {
        notification_container.find('.new-update-alert').hide();
        notification_container.find('.sixteen-font-size').removeClass('unread-update');
        current_notification_number = 0;
      }
      if(typeof (data.messages) != "undefined" && data.messages > 0) {
        messages_notification_container.find('.new-update-alert').removeClass('hidden');
        messages_notification_container.find('.sixteen-font-size').addClass('unread-update');
        messages_notification_container.find('.new-update-alert').text(data.messages).show();
        if(data.messages != $("[data_messsages_count]").attr('data_messsages_count')) {
          if (data.notifications_sound == 0 && $("[data_messsages_count]").attr('data_messsages_count') < data.messages) {
            document.getElementById('message-sound').play();
          }
          $("[data_messsages_count]").attr('data_messsages_count', data.messages);
          current_messages_number = data.messages;
        }
      } else {
        messages_notification_container.find('.new-update-alert').hide();
        messages_notification_container.find('.sixteen-font-size').removeClass('unread-update');
        current_messages_number = 0;
      }
      if(typeof (data.followRequests) != "undefined" && data.followRequests > 0) {
        follow_requests_container.find('.new-update-alert').removeClass('hidden');
        follow_requests_container.find('.sixteen-font-size').addClass('unread-update');
        follow_requests_container.find('.new-update-alert').text(data.followRequests).show();
        if(data.followRequests != current_follow_requests_number) {
          current_follow_requests_number = data.followRequests;
        }
      } else {
        follow_requests_container.find('.new-update-alert').hide();
        follow_requests_container.find('.sixteen-font-size').removeClass('unread-update');
        current_follow_requests_number = 0;
      }

      if(typeof (data.messages) != "undefined" && data.messages > 0 || typeof (data.notifications) != "undefined" && data.notifications > 0 || typeof (data.followRequests) != "undefined" && data.followRequests > 0) {
        title = Number(data.notifications) + Number(data.messages) + Number(data.followRequests);
        document.title = '(' + title + ') ' + document_title;
      } else {
        document.title = document_title;
      }
      if (data.calls == 200 && $('#re-calling-modal').length == 0 && $('#re-talking-modal').length == 0) {
        if (node_socket_flow != "1") {
          Wo_CheckForCallAnswerTabs(data.call_id);
        }
          if ($('#calling-modal').length == 0) {
            $('body').append(data.calls_html);
            if (!$('#re-calling-modal').hasClass('calling')) {
              $('#re-calling-modal').modal({
              show: true
              });
              Wo_PlayVideoCall('play');
            }
            document.title = 'New video call..';
            setTimeout(function () {
              Wo_CloseModels();
              $('#re-calling-modal').addClass('calling');
              Wo_PlayVideoCall('stop');
              document.title = document_title;
              setTimeout(function () {
                $( '#re-calling-modal' ).remove();
                $( '.modal-backdrop' ).remove();
                $( 'body' ).removeClass( "modal-open" );
              }, 3000);
              $( '#re-calling-modal' ).remove();
              $('.modal-backdrop.in').hide();
            }, 40000);
          }
      } else if (data.audio_calls == 200 && $('#re-calling-modal').length == 0 && $('#re-talking-modal').length == 0) {
        if (node_socket_flow != "1") {
          Wo_CheckForAudioCallAnswerTabs(data.call_id);
        }
        if ($('#calling-modal').length == 0) {
            $('body').append(data.audio_calls_html);
            if (!$('#re-calling-modal').hasClass('calling')) {
              $('#re-calling-modal').modal({
              show: true
              });
              Wo_PlayVideoCall('play');
            }
            document.title = 'New audio call..';
            setTimeout(function () {
              if ($('#re-talking-modal').length == 0) {
                Wo_CloseModels();
                $('#re-calling-modal').addClass('calling');
                Wo_PlayVideoCall('stop');
                document.title = document_title;
                setTimeout(function () {
                  $( '#re-calling-modal' ).remove();
                  $( '.modal-backdrop' ).remove();
                  $( 'body' ).removeClass( "modal-open" );
                }, 3000)
              }
            }, 40000);
          }
      } else if (data.is_audio_call == 0 && data.is_call == 0 && ($('#re-calling-modal').length > 0 || $('#re-talking-modal').length > 0)) {
          Wo_PlayVideoCall('stop');
          $( '#re-calling-modal' ).remove();
          $( '.modal-backdrop' ).remove();
          $( 'body' ).removeClass( "modal-open" );
      }
    }).fail(function() {
      clearTimeout(intervalUpdates);
          if (force_update == 0) {
            intervalUpdates = setTimeout(function () {
              Wo_intervalUpdates(force_update);
            } , 5000);
          }
    });
    }
}

function RemoveNotification(obj) {
  current_notifications = $('.notification-container').find('.new-update-alert').text();
  $('.notification-container').find('.new-update-alert').removeClass('hidden');
  if (Number(current_notifications) > 0) {
     if ((Number(current_notifications) - 1) == 0) {
        $('.notification-container').find('.new-update-alert').addClass('hidden');
        $('.notification-container').find('.new-update-alert').addClass('hidden').text('0').hide();
     } else {
        $('.notification-container').find('.sixteen-font-size').addClass('unread-update');
        $('.notification-container').find('.new-update-alert').text(Number(current_notifications) - 1).show();
     }
  } else if (Number(current_notifications) == 0) {
     $('.notification-container').find('.new-update-alert').addClass('hidden');
     $('.notification-container').find('.new-update-alert').addClass('hidden').text('0').hide();
  }
  $(obj).fadeOut(1000, function () {
    $(this).remove();
  });
}

function Wo_GetLastNotification() {
    if(current_width > 800) {
      $.get(Wo_Ajax_Requests_File(), { f: 'get_last_notification', }, function (data) {
          Wo_NotifyMe(data.icon, decodeHtml(data.title), decodeHtml(data.notification_text), data.url);
          $('#notification-popup').append(data.html);
          setTimeout(function () {
            $('#notification-popup').find("[data-id='" + data.id + "']").fadeOut(2000, function () {
              $(this).remove();
            });
          }, 3000)
      });
    }
}
function Wo_GetNewHashTagPosts() {
  before_post_id = 0;
  if($('.post-container').length > 0) {
    var before_post_id = $('.post-container  > .post:not(.boosted)').attr('data-post-id');
  }
  var hashtagName = $('#hashtagName').val();
  if (!hashtagName) {
    return false;
  }
 var api = $('#api').val();
  var api_ = 0;
  if (api) {
    api_ = 1;
  }
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: 'get_new_hashtag_posts',
    before_post_id: before_post_id,
    hashtagName: hashtagName,
    api: api_
  }, function (data) {
    if(data.length > 0) {
      $('#posts_hashtag').find('.posts-container').remove();
      $('#posts_hashtag').prepend(data);
    }
     $('.posts-count').empty();
  });
}
// intervel new posts
function Wo_GetNewPosts() {
  var filter_by_more = $('#load-more-filter').find('.filter-by-more').attr('data-filter-by');
  if(filter_by_more != 'all') {
    return false;
  }
  if(typeof ($('#posts').attr('data-story-user')) == "string") {
    user_id = $('#posts').attr('data-story-user');
  } else {
    user_id = 0;
  }
  var api = $('#api').val();
  var api_ = 0;
  if (api) {
    api_ = 1;
  }
  before_post_id = 0;
  if($('.post-container').length > 0) {
    var before_post_id = $('.post-container  > .post:not(.boosted)').attr('data-post-id');
  }
  $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: 'get_new_posts',
    before_post_id: before_post_id,
    user_id: user_id,
    api: api_
  }, function (data) {
    if(data.length > 0) {
      $('#posts').find('.posts-container').remove();
      $('#posts').prepend(data);
    }
     $('.posts-count').empty();
  });
}

// load more posts
function Wo_GetMorePosts() {
  var more_posts = $('#load-more-posts');
  var filter_by_more = $('#load-more-filter').find('.filter-by-more').attr('data-filter-by');
  var after_post_id = $('div.post:last').attr('data-post-id');
  var page_id = 0;
  var user_id = 0;
  var group_id = 0;
  var event_id = 0;
  var is_api = 0;
  var ad_id    = 0;
  var story_id = 0;
  var api = $('#api').val();
  if (api) {
    is_api = 1;
  }
  if(after_post_id != null) {
    more_posts.show();
  }
  if(typeof ($('#posts').attr('data-story-user')) == "string") {
    user_id = $('#posts').attr('data-story-user');
  } else if(typeof ($('#posts').attr('data-story-page')) == "string") {
    page_id = $('#posts').attr('data-story-page');
  } else if(typeof ($('#posts').attr('data-story-group')) == "string") {
    group_id = $('#posts').attr('data-story-group');
  } else if(typeof ($('#posts').attr('data-story-event')) == "string") {
    event_id = $('#posts').attr('data-story-event');
  }
  $('#posts').append('<div class="hidden loading-status loading-single post-container"></div>');
  $('#load-more-posts').hide();
  $('.loading-status').hide().html('<div class="wo_loading_post "><div class="lightui1-shimmer"> <div class="_2iwr"></div> <div class="_2iws"></div> <div class="_2iwt"></div> <div class="_2iwu"></div> <div class="_2iwv"></div> <div class="_2iww"></div> <div class="_2iwx"></div> <div class="_2iwy"></div> <div class="_2iwz"></div> <div class="_2iw-"></div> <div class="_2iw_"></div> <div class="_2ix0"></div> </div></div>').removeClass('hidden').show();
  Wo_progressIconLoader($('#load-more-posts'));
  posts_count = 0;
  if ($('.post').length > 0) {
    posts_count = $('.post').length;
  }

  if ($(".user-ad-container").length > 0) {
    ad_id = $(".user-ad-container").last().attr('id');
  }

  if ($(".user-story-container").length > 0) {
    story_id = $(".user-story-container").last().attr('id');
  }

  if ($('body').attr('no-more-posts')) {
    $('#load-more-posts').html('<div class="white-loading list-group"><div class="cs-loader"><div class="no-more-posts-to-show">' + $('#get_no_posts_name').val() + '</div></div>');
      $('#load-more-posts').show();
      $('.loading-status').remove();
      scrolled = 0;
      return false;
  }
  if ($('#page_post_jobs_filter').length > 0) {
    filter_by_more = 'job';
  }
  if ($('#page_post_offer_filter').length > 0) {
    filter_by_more = 'offer';
  }
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: 'load_more_posts',
    filter_by_more: filter_by_more,
    after_post_id: after_post_id,
    user_id: user_id,
    page_id: page_id,
    group_id: group_id,
    event_id: event_id,
    posts_count: posts_count,
    is_api: is_api,
    ad_id: ad_id,
    story_id:story_id
  }, function (data) {
    if (data.length == 0) {
      $('body').attr('no-more-posts', "true");
      $('#load-more-posts').html('<div class="white-loading list-group"><div class="cs-loader"><div class="no-more-posts-to-show">' + $('#get_no_posts_name').val() + '</div></div>');
     } else {
      if (data != 'Por favor iniciar sesion o registrarse para continuar.') {
          $('body').removeAttr('no-more-posts');
          $('#posts').append(data);
      } else {
         $('body').attr('no-more-posts', "true");
      }
    }
    $('#load-more-posts').show();
    $('.loading-status').remove();
    Wo_progressIconLoader($('#load-more-posts'));
    scrolled = 0;
  });
}

function animateStory(element) {
  if ($(element).hasClass('opacity')) {
      $(element).removeClass('opacity');
      $(element).addClass('no-opacity');
    } else {
       $(element).removeClass('no-opacity');
       $(element).addClass('opacity');
    }
}
function Wo_LoadStory(type, user_id, element) {

  var filter_by_more = $('#load-more-filter').find('.filter-by-more');
  filter_by_more.attr("data-filter-by", 'story');
  var filter_by_progress_icon = $('.filter-container').find('.type-story');
  Wo_progressIconLoader(filter_by_progress_icon);
  var story = null;
  var user  = null;
  if (type == 'all') {
    story   = 'a';
    user    = 0;
  }
  else if(type == 'prof' && user_id){
    story   = 'p';
    user    = user_id;
  }
  animateStory(element);
  var animation = setInterval(function () {
    animateStory(element);
  }, 500);
  $.ajax({
    url: Wo_Ajax_Requests_File(),
    type: 'GET',
    dataType: 'json',
    data: {f: 'status',s:story,id:user},
  })
  .done(function(data) {
    if (data.status == 200) {
      $('#posts').html(data.html);
    }
    else if(data.status == 404){
      $('#posts').html(data.html);
    }
    $(element).removeClass('opacity');
    clearInterval(animation);
    Wo_progressIconLoader(filter_by_progress_icon);
  })
  .fail(function() {
    console.log("error");
  })

}
function Wo_ResetStory() {
  $('.mfp-progress-line span').css('width', '0%');
}

// register post share
function Wo_RegisterShare(post_id) {
  var post = $('#post-' + post_id);
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: 'register_share',
    post_id: post_id
  }, function (data) {
    if(data.status == 200) {
      post.find("#share-button").addClass('active');
      post.find("[id^=shares]").text(data.shares);
    } else {
      post.find("#share-button").removeClass('active');
      post.find("[id^=shares]").text(data.shares);
    }
    if (data.can_send == 1) {
        Wo_SendMessages();
    }
  });
}

// open post share buttons
function Wo_OpenShareBtns(post_id) {
  post_wrapper = $('#post-' + post_id);
  post_wrapper.find('.post-share').slideToggle(200);
}
// register post comment
function Wo_RegisterCommentClick(text, post_id, user_id, page_id, type) {
    post_wrapper = $('[id=post-' + post_id + ']');
    comment_textarea = post_wrapper.find('.post-comments');
    comment_btn = comment_textarea.find('.emo-comment');
    textarea_wrapper = comment_textarea.find('.textarea');
    comment_list = post_wrapper.find('.comments-list');
    if(text == '') {
      return false;
    }
    textarea_wrapper.val('');
    Wo_progressIconLoader(comment_btn);
    $.post(Wo_Ajax_Requests_File() + '?f=posts&s=register_comment', {
      post_id: post_id,
      text: text,
      user_id: user_id,
      page_id: page_id
    }, function (data) {
      if(data.status == 200) {
        post_wrapper.find('.comment-container:first-child').before(data.html);
        post_wrapper.find('[id=comments]').html(data.comments_num);
      }
      Wo_progressIconLoader(comment_btn);
      if (data.can_send == 1) {
        Wo_SendMessages();
      }
    });
}
// register post comment
function Wo_LightBoxComment(text, post_id, user_id, event, page_id) {
  if(event.keyCode == 13 && event.shiftKey == 0) {
    post_wrapper = $('#lightbox-post-' + post_id);
    comment_textarea = post_wrapper.find('.post-comments');
    comment_btn = comment_textarea.find('.comment-btn');
    textarea_wrapper = comment_textarea.find('.textarea');
    comment_list = post_wrapper.find('.comments-list');
    if(textarea_wrapper.val() == '') {
      return false;
    }
    textarea_wrapper.val('');
    Wo_progressIconLoader(comment_btn);
    $.post(Wo_Ajax_Requests_File() + '?f=posts&s=register_comment', {
      post_id: post_id,
      text: text,
      user_id: user_id,
      page_id: page_id
    }, function (data) {
      if(data.status == 200) {
        post_wrapper.find('.comment-container:first-child').before(data.html);
        post_wrapper.find('#comments').html(data.comments_num);
      }
      Wo_progressIconLoader(comment_btn);
      if (data.can_send == 1) {
        Wo_SendMessages();
      }
    });
  }
}

function Wo_loadPostMoreComments(post_id,self) {
  main_wrapper = $('#post-' + post_id);
  view_more_wrapper = main_wrapper.find('.view-more-wrapper');
  Wo_progressIconLoader(view_more_wrapper);
  $('#post-' + post_id).find('.view-more-wrapper .ball-pulse').fadeIn(100);
  comment_id = main_wrapper.find('.comment').last().attr('data-comment-id');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: 'load_more_post_comments',
    post_id: post_id,
    comment_id: comment_id
  }, function (data) {
    if(data.status == 200) {
      main_wrapper.find('.comments-list').append(data.html);
      //view_more_wrapper.remove();
      if (data.no_more == 1) {
        $(self).remove();
      }

      $('.ball-pulse-'+post_id).fadeOut('100');
    }
  });
}
function Wo_UpdateLocation(position) {
  if (!position) {
    return false;
  }
  $.post(Wo_Ajax_Requests_File() + '?f=save_user_location', {lat: position.coords.latitude, lng:position.coords.longitude}, function(data, textStatus, xhr) {
    if (data.status == 200) {
      return true;
    }
  });
  return false;
}
// load all post comments
function Wo_loadAllComments(post_id,self) {
  main_wrapper = $('#post-' + post_id);
  view_more_wrapper = main_wrapper.find('.view-more-wrapper');
  Wo_progressIconLoader(view_more_wrapper);
  $('#post-' + post_id).find('.view-more-wrapper .ball-pulse').fadeIn(100);
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: 'load_more_comments',
    post_id: post_id
  }, function (data) {
    if(data.status == 200) {
      main_wrapper.find('.comments-list').html(data.html);
      $(self).remove();
      $('.ball-pulse-'+post_id).fadeOut('100');
    }
  });
}
function Wo_loadAllCommentslightbox(post_id) {
  main_wrapper_light = $('#post-' + post_id);
  view_more_wrapper_light = main_wrapper_light.find('.view-more-wrapper');
  $('.lightpost-' + post_id).find('.view-more-wrapper .ball-pulse').fadeIn(100);
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: 'load_more_comments',
    post_id: post_id
  }, function (data) {
    if(data.status == 200) {
      $('.comments-list-lightbox').html(data.html);
      $('.view-more-wrapper').remove();
    }
  });
}
// show post comments
function Wo_ShowComments(post_id) {
  $('#post-comments-' + post_id).toggleClass('hidden');
}

// open post edit modal
function Wo_OpenPostEditBox(post_id) {
  var edit_box = $('#post-' + post_id).find('#edit-post');
  edit_box.modal({
    show: true
  });
}

function DeleteUploadedImageById(name,id,post_id) {
  $('#delete_uploaded_image_by_id_'+id).remove();
  if ($('#edit-post-form-'+post_id).find('.thumb-image-old').length < 1) {
    $('#edit-post-form-'+post_id).find('#all_images').val('1');
  }
  if ($('#edit-post-form-'+post_id).find('.thumb-image').length < 1) {
    $('#edit-post-form-'+post_id).find('#publisher-post-photos-'+post_id).val('');
  }
}
function DeletePostImage(post_id,image_id = 0) {
  if (image_id > 0) {
    $('#edit-post-form-'+post_id).find('#delete_image_by_id_'+image_id).remove();
  }
  else{
    $('#edit-post-form-'+post_id).find('#delete_image_by_id').remove();
  }
  if ($('#edit-post-form-'+post_id).find('.thumb-image-old').length < 1) {
    $('#edit-post-form-'+post_id).find('#all_images').val('1');
  }
  if ($('#edit-post-form-'+post_id).find('.thumb-image').length < 1) {
    $('#edit-post-form-'+post_id).find('#publisher-post-photos-'+post_id).val('');
  }
  $.post(Wo_Ajax_Requests_File() + '?f=posts&s=delete_post_image', {post_id: post_id,image_id: image_id}, function(data, textStatus, xhr) {});
}

// open delete post modal
function Wo_OpenPostDeleteBox(post_id) {
  var delete_box = $('#post-' + post_id).find('#delete-post');
  delete_box.modal({
    show: true
  });
}

// delete post
function Wo_DeletePost(post_id) {
  Wo_CloseLightbox();
  var delete_box = $('#post-' + post_id).find('#delete-post');
  var delete_button = delete_box.find('#delete-all-post');
  $('#post-' + post_id).find('#delete-post .ball-pulse').fadeIn(100);
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: 'delete_post',
    post_id: post_id
  }, function (data) {
    if(data.status == 200) {
      $('#user_post_count').html(data.post_count);
      delete_box.modal('hide');
      setTimeout(function () {
        $('#post-' + post_id).slideUp(200, function () {
          $(this).remove();
        });
      }, 300);
    }
    $('#post-' + post_id).find('#delete-post .ball-pulse').fadeOut(100);
  });
}

// open comment textarea
function Wo_OpenCommentEditBox(comment_id) {
  comment = $('[id=comment_' + comment_id + ']');
  comment_text = comment.find('.comment-edit');
  comment_text.slideToggle(100);
}

function Wo_ReportComment( comment_id ){
  if (!comment_id || comment_id <= 0) {
    return false;
  }
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: 'report_comment',
    comment_id: comment_id
  }, function (data) {
    if(data.status == 200) {
      $('#comment_report_box .msg').html(data.text);
      $('#comment_report_box').modal('show');
      setTimeout(function () {
        $('#comment_report_box').modal('hide');
        $('#reportComment'+comment_id).css({"color":"#55acee"});
      }, 1500);
    }else if(data.status == 300) {
      $('#comment_report_box .msg').html(data.text);
      $('#comment_report_box').modal('show');
      setTimeout(function () {
        $('#comment_report_box').modal('hide');
        $('#reportComment'+comment_id).css({"color":"inherit"});
      }, 1500);
    }
  });

}
// save edited comment
function Wo_EditComment(text, comment_id, event) {
  comment_ = $('#edit_comment_'+comment_id);
  Wo_Get_Mention(comment_);
  comment = $('[id=comment_' + comment_id + ']');
  comment_text = comment.find('.comment-text');
  if(event.keyCode == 13 && event.shiftKey == 0) {
    Wo_progressIconLoader(comment.find('#editComment'));
    $.post(Wo_Ajax_Requests_File() + '?f=posts&s=edit_comment', {
      comment_id: comment_id,
      text: text
    }, function (data) {
      if(data.status == 200) {
        comment_text.html(data.html);
        Wo_OpenCommentEditBox(comment_id);
      }
      Wo_progressIconLoader(comment.find('#editComment'));
    });
  }
}

// delete comment
function Wo_DeleteComment(comment_id) {
  var delete_box = $('[id=comment_' + comment_id + ']').find('#delete-comment');
  var delete_button = delete_box.find('#delete-all-post');
  delete_box.modal({
    show: true
  });
  var comment = $('[id=comment_' + comment_id + ']');
  delete_button.on('click', function () {
    $('[id=comment_' + comment_id + ']').find('#delete-comment .ball-pulse').fadeIn(100);
    $.get(Wo_Ajax_Requests_File(), {
      f: 'posts',
      s: 'delete_comment',
      comment_id: comment_id
    }, function (data) {
      if(data.status == 200) {
        delete_box.modal('hide');
        $('.modal').modal('hide');
        comment.fadeOut(300, function () {
          comment.remove();
        });
      }
    });
  });
}

function Wo_DeleteReplyComment(reply_id) {
  var delete_box = $('[id=comment_reply_' + reply_id + ']').find('#delete-comment-reply');
  var delete_button = delete_box.find('#delete-all-reply');
  delete_box.modal({
    show: true
  });
  var comment = $('[id=comment_reply_' + reply_id + ']');
  delete_button.on('click', function () {
    $('[id=comment_reply_' + reply_id + ']').find('#delete-comment-reply .ball-pulse').fadeIn(100);
    $.get(Wo_Ajax_Requests_File(), {
      f: 'posts',
      s: 'delete_comment_reply',
      reply_id: reply_id
    }, function (data) {
      if(data.status == 200) {
        delete_box.modal('hide');
        comment.fadeOut(300, function () {
          $(this).remove();
        });
      }
    });
  });
}

function Wo_RegisterCommentWonder(comment_id) {
  var comment = $('[id=comment_' + comment_id + ']');
  comment_text = comment.find('div.comment-text').text();
  Wo_progressIconLoader(comment.find('#WonderComment'));
  $.post(Wo_Ajax_Requests_File() + '?f=posts&s=register_comment_wonder', {
    comment_id: comment_id,
    comment_text: comment_text
  }, function (data) {
    if(data.status == 200) {
      if (node_socket_flow == "1") {
        socket.emit("comment_notification", { comment_id: comment_id, user_id: _getCookie("user_id"), type: "added" });
      }
      if (data.dislike == 1) {
          comment.find("#comment-likes").text(data.likes_c);
          comment.find("#LikeComment").html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>');
      }
      comment.find("#WonderComment").html('<span class="active-wonder">' + data.icon + '</span>').fadeIn(150);
      comment.find("#comment-wonders").text(data.wonders);
    } else if (data.status == 300)  {
      if (node_socket_flow == "1") {
        socket.emit("comment_notification", { comment_id: comment_id, user_id: _getCookie("user_id"), type: "removed" });
      }
      comment.find("#WonderComment").html('' + data.icon + '').fadeIn(150);
      comment.find("#comment-wonders").text(data.wonders);
    }
  });
}

// register comment wonder
function Wo_RegisterCommentReplyWonder(reply_id) {
  var comment = $('[id=comment_reply_' + reply_id + ']');
  comment_text = comment.find('div.reply-text').text();
  Wo_progressIconLoader(comment.find('#WonderReplyComment'));
  $.post(Wo_Ajax_Requests_File() + '?f=posts&s=register_comment_reply_wonder', {
    reply_id: reply_id,
    comment_text: comment_text
  }, function (data) {
    if(data.status == 200) {
      if (node_socket_flow == "1") {
        socket.emit("reply_notification", { reply_id: reply_id, user_id: _getCookie("user_id"), type: "added" });
      }
      if (data.dislike == 1) {
          comment.find("#comment-reply-likes").text(data.likes_r);
          comment.find("#LikeReplyComment").html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>');
      }
      comment.find("#WonderReplyComment").html('<span class="active-wonder">' + data.icon + '</span>').fadeIn(150);
      comment.find("#comment-reply-wonders").text(data.wonders);
    } else if (data.status == 300){
      if (node_socket_flow == "1") {
        socket.emit("reply_notification", { reply_id: reply_id, user_id: _getCookie("user_id"), type: "removed" });
      }
      comment.find("#WonderReplyComment").html('' + data.icon + '').fadeIn(150);
      comment.find("#comment-reply-wonders").text(data.wonders);
    }
  });
}

function Wo_RegisterCommentReplyLike(reply_id) {
  var comment = $('[id=comment_reply_' + reply_id + ']');
  comment_text = comment.find('div.reply-text').text();
  Wo_progressIconLoader(comment.find('#LikeReplyComment'));
  $.post(Wo_Ajax_Requests_File() + '?f=posts&s=register_comment_reply_like', {
    reply_id: reply_id,
    comment_text: comment_text
  }, function (data) {
    if(data.status == 200) {
      if (node_socket_flow == "1") {
        socket.emit("reply_notification", { reply_id: reply_id, user_id: _getCookie("user_id"), type: "added" });
      }
      if (data.dislike == 1) {
          comment.find("#comment-reply-wonders").text(data.wonders_r);
          comment.find("#WonderReplyComment").html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-down"><path d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h2.67A2.31 2.31 0 0 1 22 4v7a2.31 2.31 0 0 1-2.33 2H17"></path></svg>');
      }
      comment.find("#LikeReplyComment").html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up active-like"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>').fadeIn(150);
      comment.find("#comment-reply-likes").text(data.likes);
    } else if (data.status == 300){
      if (node_socket_flow == "1") {
        socket.emit("reply_notification", { reply_id: reply_id, user_id: _getCookie("user_id"), type: "removed" });
      }
      comment.find("#LikeReplyComment").html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>').fadeIn(150);
      comment.find("#comment-reply-likes").text(data.likes);
    }
  });
}
// save post
function Wo_SavePost(post_id) {
  var post = $('#post-' + post_id);
  post.find('.save-post').html('<div class="post_drop_menu_loading"><div class="ball-pulse"><div></div><div></div><div></div></div></div>');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: 'save_post',
    post_id: post_id
  }, function (data) {
    if(data.status == 200) {
      post.find('.save-post').html(data.text);
    } else if(data.status == 300) {
      post.find('.save-post').html(data.text);
    }
  });
}

// report post
function Wo_ReportPost(post_id) {
  var post = $('#post-' + post_id);
  post.find('.report-post').html('<div class="post_drop_menu_loading"><div class="ball-pulse"><div></div><div></div><div></div></div></div>');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: 'report_post',
    post_id: post_id
  }, function (data) {
    if(data.status == 200) {
      post.find('.report-post').html(data.text);
    } else if(data.status == 300) {
      post.find('.report-post').html(data.text);
    }
  });
}

function Wo_DisableComment(post_id, type) {
  var post = $('#post-' + post_id);
  var p = post.find('.disable-comments').find('p').text();
  post.find('.disable-comments').html('<div class="post_drop_menu_loading"><div class="ball-pulse"><div></div><div></div><div></div></div></div>');
  if (type == 0 ) {
    post.find('.disable-comments').attr('onclick', 'Wo_DisableComment(' + post_id + ', 1);');
    post.find('.post-comments').show()
  } else {
    post.find('.disable-comments').attr('onclick', 'Wo_DisableComment(' + post_id + ', 0);');
    post.find('.post-comments').hide()
  }
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: 'disable_comment',
    post_id: post_id,
    type: type
  }, function (data) {
    post.find('.disable-comments').html('<svg viewBox="0 0 24 24"><path fill="currentColor" d="M9,22A1,1 0 0,1 8,21V18H4A2,2 0 0,1 2,16V4C2,2.89 2.9,2 4,2H20A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H13.9L10.2,21.71C10,21.9 9.75,22 9.5,22V22H9M5,5V7H19V5H5M5,9V11H13V9H5M5,13V15H15V13H5Z" /></svg>&nbsp;&nbsp;&nbsp;<div><b>'+data.text+'</b><p>'+p+'</p></div>');
  });
}

function Wo_PinPost(post_id, id, type) {
  var post = $('#post-' + post_id);
  var p = post.find('.pin-post').find('p').text();
  post.find('.pin-post').html('<div class="post_drop_menu_loading"><div class="ball-pulse"><div></div><div></div><div></div></div></div>');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: 'pin_post',
    post_id: post_id,
    id: id,
    type: type
  }, function (data) {
    post.find('.pin-post').html('<svg viewBox="0 0 24 24"><path fill="currentColor" d="M16,12V4H17V2H7V4H8V12L6,14V16H11.2V22H12.8V16H18V14L16,12Z" /></svg>&nbsp;&nbsp;&nbsp;<div><b>'+data.text+'</b><p>'+p+'</p></div>');
  });
}

function Wo_BoostPost(post_id) {
  var post = $('#post-' + post_id);
  var p = post.find('.boost-post').find('p').text();
  post.find('.boost-post').html('<div class="post_drop_menu_loading"><div class="ball-pulse"><div></div><div></div><div></div></div></div>');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: 'boost_post',
    post_id: post_id
  }, function (data) {
    post.find('.boost-post').html('<svg viewBox="0 0 24 24"><path fill="currentColor" d="M16,12V4H17V2H7V4H8V12L6,14V16H11.2V22H12.8V16H18V14L16,12Z" /></svg>&nbsp;&nbsp;&nbsp;<div><b>'+data.text+'</b><p>'+p+'</p></div>');
  });
}

// open post Reacted users
function Wo_OpenPostReactedUsers(post_id, type,col) {
  if (col != 'story') {
    $('body').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
  }
  if (col == 'story') {
    $('.width_').css('width', $('.width_').css('width'));
    value = $('.story_lightbox').attr('data-post-id');
    $('.story_lightbox').addClass('dont_close_story_'+value);
  }
  $('.reacted_users_load_more').css('display', 'inline');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: 'get_post_reacted',
    post_id: post_id,
    type: type,
    col:col
  }, function (data) {
    if(data.status == 200) {
      if (col != 'story') {
        setTimeout(function () {
          $('.lightbox-container').remove();
        },100);
      }

      //$('#views_info_title').html(data.title);
      if(data.html.length == 0) {
        $('.reacted_users_load_more').attr('data-type', '');
        $('#reacted_users_box').html('<span class="view-more-wrapper text-center">' + data.message + '</span>');
        $('#reacted_users_load').css('display', 'none');
        $('#users-reacted-modal').modal('show');
      } else {
        $('.reacted_users_load_more').attr('col-type', col);
        $('.reacted_users_load_more').attr('data-type', type);
        $('.reacted_users_load_more').attr('post-id', post_id);
        $('#reacted_users_load').css('display', 'block');
        $('#reacted_users_box').html(data.html);
        $('#users-reacted-modal').modal('show');
      }
    }
  });
}

function Wo_ClosePostReactedUsers(post_id) {
  var post = $('#post-' + post_id);post_likes_container = post.find('.post-reacted');
  post_likes_container.slideUp(200).empty();
}

// open post liked users
function Wo_OpenPostLikedUsers(post_id,table) {
  $('body').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
  $('.views_info_load_more').css('display', 'inline');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: 'get_post_likes',
    post_id: post_id,
    table:table
  }, function (data) {
    if(data.status == 200) {
      setTimeout(function () {
        $('.lightbox-container').remove();
      },100);
      $('#views_info_title').html(data.title);
      if(data.html.length == 0) {
        $('.views_info_load_more').attr('data-type', '');
        $('#views_info').html('<span class="view-more-wrapper text-center">' + data.message + '</span>');
        $('#views_info_load').css('display', 'none');
        $('#views-info-modal').modal('show');
      } else {
        $('.views_info_load_more').attr('data-type', 'like');
        $('.views_info_load_more').attr('table-type', table);
        $('.views_info_load_more').attr('post-id', post_id);
        $('#views_info_load').css('display', 'block');
        $('#views_info').html(data.html);
        $('#views-info-modal').modal('show');
      }
    }
  });
}

// open post wodered users
function Wo_OpenPostWonderedUsers(post_id,table) {
  $('body').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
  $('.views_info_load_more').css('display', 'inline');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: 'get_post_wonders',
    post_id: post_id,
    table:table
  }, function (data) {
    if(data.status == 200) {
      setTimeout(function () {
        $('.lightbox-container').remove();
      },100);
      $('#views_info_title').html(data.title);
      if(data.html.length == 0) {
        $('.views_info_load_more').attr('data-type', '');
        $('#views_info').html('<span class="view-more-wrapper text-center">' + data.message + '</span>');
        $('#views_info_load').css('display', 'none');
        $('#views-info-modal').modal('show');
      } else {
        $('.views_info_load_more').attr('data-type', 'wonder');
        $('.views_info_load_more').attr('table-type', table);
        $('.views_info_load_more').attr('post-id', post_id);
        $('#views_info_load').css('display', 'block');
        $('#views_info').html(data.html);
        $('#views-info-modal').modal('show');
      }
    }
  });
}

// add emo to input
function Wo_AddEmo(code, input) {
  inputTag = $(input);
  inputVal = inputTag.val();
  if(typeof (inputTag.attr('placeholder')) != "undefined") {
    inputPlaceholder = inputTag.attr('placeholder');
    if(inputPlaceholder == inputVal) {
      inputTag.val('');
      inputVal = inputTag.val();
    }
  }
  if(inputVal.length == 0) {
    inputTag.val(code + ' ');
  } else {
    inputTag.val(inputVal + ' ' + code);
  }
  inputTag.keyup();
}

// accept follow request
function Wo_AcceptFollowRequest(user_id) {
  var main_container = $('.user-follow-request-' + user_id);
  var follow_main_container = main_container.find('#accept-' + user_id);
  Wo_progressIconLoader(follow_main_container);
  $.get(Wo_Ajax_Requests_File(), {
    f: 'accept_follow_request',
    following_id: user_id
  }, function (data) {
    if(data.status == 200) {
      main_container.find('.accept-btns').html(data.html);
    }
  });
}

// open chat tab
function Wo_OpenChatTab(recipient_id, group_id,product_id = 0,page_id = 0,page_user_id = 0,story_id = 0) {
  CheckIfCanUse();
 
  if ($(".chat_"+recipient_id).length > 0 && story_id == 0) {
    SendSeen(recipient_id);
    $('.chat_'+recipient_id).find('.online-toggle-hdr').attr('style', '');
    return false;
  }
  go_to = '';

  if(group_id != 0){
    $("#group_tab_" + group_id).find('.group-lastseen').empty();
  }
  if (group_id == null) {
    group_id = 0;
  }
  if (story_id != 0) {
    Wo_CloseLightbox();
  }

  if(node_socket_flow === "0"){
    $.get(Wo_Ajax_Requests_File(), {
      f: 'chat',
      s: 'is_chat_on',
      recipient_id: recipient_id,
      story_id: story_id
    }, function (data) {
      length = 0;
      if ($('body').attr('chat-off')) {
      length = $('body').attr('chat-off').length;
      }
      if(current_width < 720 || length > 0) {
        if (page_id > 0) {
          document.location = websiteUrl+"/messages/"+page_user_id+"&page="+page_id;
        }
        else{
          go_to = data.url;
          // document.location = data.url;
        }
        return false;
      }
      if(data.chat != 1 && group_id === 0) {
        document.location = data.url;
        return false;
      }
    });
  }
  if(current_width < 720) {
    $.get(Wo_Ajax_Requests_File(), {
      f: 'chat',
      s: 'close_chat',
      recipient_id: recipient_id,
      story_id: story_id
    }, function (data) {
      if(node_socket_flow !== "0"){
      go_to = data.url;
      }
    });
    // return false;
  }
  placement = 1;
  if ($('.chat-wrapper').length == 1) {
    placement = 2;
  } else if ($('.chat-wrapper').length == 2) {
    placement = 3;
  }
  var loading_icon = '<svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="11" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg>';
  $('#online_' + recipient_id).find('.new-message-alert').html('0').hide();
  if (group_id) {
    var loading_div = $('.chat-container').find('#group_tab_' + group_id).find('.chat-loading-icon');
  }else{
    var loading_div = $('.chat-container').find('#online_' + recipient_id).find('.chat-loading-icon');
  }

  loading_div.html(loading_icon);
  chat_container = $('.chat-container');
  $(document.body).attr('data-chat-recipient-'+recipient_id, recipient_id);
  $('.chat-wrapper').show();
  /* var data_html = '<div class="chat-wrapper" id="chat_"><div class="online-toggle pointer" onclick="javascript:$(\'.chat-tab-container\').slideToggle(100);"><a style="color:#fff;" href=""><span class="chat-tab-status">......</span></a></div><div class="chat-tab-container"><div class="chat-messages-wrapper"><div class="chat-messages"></div><div class="clear"></div></div><div class="chat-textarea btn-group"><div class="emo-container"></div><form action="#" method="post" class="chat-sending-form"><textarea name="textSendMessage" disabled id="sendMessage" class="form-control" cols="10" rows="5" placeholder=""  onkeydown="Wo_SubmitChatForm(event);" onfocus="Wo_SubmitChatForm(event);" dir="auto"></textarea><input type="hidden" id="user-id" name="user_id" value="" /></form></div></div></div>';
  $('.chat-tab').append('<span class="chat_main chat_main_"></span>');
  $('.chat_main_').append(data_html); */
  $.get(Wo_Ajax_Requests_File(), {
    f: 'chat',
    s: 'load_chat_tab',
    recipient_id: recipient_id,
    placement:placement,
    group_id:group_id,
    page_id:page_id,
    page_user_id:page_user_id,
    story_id:story_id
  }, function (data) {
    if(data.status == 200) {
      if (go_to != '') {
        document.location = go_to;
      }
      // $("#online_" + recipient_id).find('svg path').attr('fill', '#fff');
      if ($('.chat-wrapper').length == 3) {
         if ($('.chat_main_' + recipient_id).length == 0) {
            $('.chat_main:first-child').remove();
            $('.chat-tab').append('<span class="chat_main chat_main_' + recipient_id +'"></span>');
         } else {
            $('.chat_main_' + recipient_id).remove();
         }
         $('.chat_main_' + recipient_id).html(data.html).hide().fadeIn(100);
      } else {
        if ($('.chat_main_' + recipient_id).length > 0) {
          $('.chat_main_' + recipient_id).html(data.html).hide().fadeIn(100);
        } else {
          $('.chat-tab').append('<span class="chat_main chat_main_' + recipient_id +'"></span>');
          $('.chat_main_' + recipient_id).append(data.html).hide().fadeIn(100);
        }
      }
      if (page_id > 0) {
        setTimeout(function () {

          $('.page-messages-wrapper-'+page_id).scrollTop($('.page-messages-wrapper-'+page_id)[0].scrollHeight);

        }, 1000);

      }
      $('.chat-wrapper').fadeIn(200);
      loading_div.empty();
      $('.chat-textarea textarea').keyup();
      if (group_id == 0 && page_id == 0) {
        setTimeout(function () {
        $.get(Wo_Ajax_Requests_File(), {
          f: 'chat',
          s: 'load_chat_messages',
          recipient_id: recipient_id,
          product_id: product_id
        }, function (data) {
          Wo_intervalUpdates();
          if (data.messages.length > 0) {
             $('.chat-tab').find('.chat_' + recipient_id).find('.chat-messages').html(data.messages);
          } else {
            $('.chat_' + recipient_id).find('.chat-user-desc').addClass('chat-user-desc-show');
          }
          if (node_socket_flow === "1") {
            var chat_container = $('.chat-tab').find('.chat_main_' + recipient_id);
            var last_id = chat_container.find('.messages-text:last').attr('data-message-id');
            socket.emit("is_chat_on", {
              message_id: last_id,
              user_id: _getCookie("user_id"),
              recipient_id: recipient_id
            })
          }
          if ($('.chat-messages-wrapper').length > 0) {

            setTimeout(function () {

              $('.chat-messages-wrapper').scrollTop($('.chat-messages-wrapper')[0].scrollHeight);

            }, 1000);
          }
          if (node_socket_flow == "1") {
            socket.emit("count_unseen_messages", { user_id: _getCookie("user_id") });
          }
        });
      }, 300);
      }else if(group_id!==0){
        if (node_socket_flow === "1") {
          var chat_container = $('.chat-tab').find('.chat_main_' + group_id);
          var last_id = chat_container.find('.messages-text:last').attr('data-message-id');
          socket.emit("is_chat_on", {
            message_id: last_id,
            user_id: _getCookie("user_id"),
            recipient_id: group_id,
            isGroup: true
          })
        }
      }
    }
  });
}

function Wo_OpenChatUsersTab() {
  if (node_socket_flow === "0") {
    $('.chat-container').toggleClass('full');
    $('.online-content-toggler').slideToggle(100);
    $.get(Wo_Ajax_Requests_File(), {
      f: 'chat',
      s: 'open_tab'
    });
  }
  else {
    socket.emit("open_tab")
  }
}

function Wo_SearchForPosts(query) {
  var type = '';
  if ($('.page-margin').attr('data-page') == "timeline") {
    type = 'user';
  } else if ($('.page-margin').attr('data-page') == "page"){
    type = 'page';
  } else if ($('.page-margin').attr('data-page') == "group") {
    type = 'group'
  } else {
    return false;
  }
  Wo_progressIconLoader($('.search-for-posts-container'));
  var id = $('.page-margin').attr('data-id');
  if (id == null || id == "undefined") {
    return false;
  }
  $.get(Wo_Ajax_Requests_File(), {f:'posts', s:'search_for_posts', id: id, search_query: query, type: type}, function (data) {
     if (data.status == 200) {
        $('#posts').html(data.html);
     }
     Wo_progressIconLoader($('.search-for-posts-container'));
  });
}

function Wo_Fetch(id, post_id) {
   var clickedOnBody = true;
   var user_from_post_id = '#post-' + post_id;
   var user_from_image = '#post-' + post_id + ' .post-heading';
   var div = '.user-fetch-post-' + post_id + '-user-' + id;
   var bla = user_from_post_id + ', ' + div;
   clearTimeout(timeout);
   $(div).fadeIn(200);
   var timeout;
   function hidepanel() {
     $(div).fadeOut(0);
   }
    $(div).mouseleave(doTimeout);
    $(user_from_image).mouseleave(doTimeout);
     function doTimeout(){
        clearTimeout(timeout);
        timeout = setTimeout(hidepanel, 0);
     }
}

function Wo_RequestVerification(id, type) {
  $.get(Wo_Ajax_Requests_File(), {f:'request_verification', id:id, type:type}, function(data) {
    if (data.status == 200) {
      $('#verification-request').html(data.html);
    }
  });
}

function Wo_DeleteUserVerification(id, type) {
  if (confirm("Are you sure ?") == false) {
      return false;
  }
  var verify_icon = $('form').find('div.verification');
  Wo_progressIconLoader(verify_icon);
  $.get(Wo_Ajax_Requests_File(), {f:'delete_verification', id:id, type:type}, function(data) {
    if (data.status == 200) {
      $('#verification-request').html(data.html);
    }
  });
}

function Wo_RemoveVerification(id, type) {
  $.get(Wo_Ajax_Requests_File(), {f:'remove_verification', id:id, type:type}, function(data) {
    if (data.status == 200) {
      $('#verification-request').html(data.html);
    }
  });
}

$('body').on('mouseenter', '.user-popover', function() {
    var popover = $(this);
    var type = popover.attr('data-type');
    var id = popover.attr('data-id');
    var placement = popover.attr('data-placement') || 'none';
    var placement_code = 'user-details not-profile';
    if (placement == 'profile') {
      placement_code = 'user-details';
    }
    var over_time = setTimeout(function() {
       var offset = popover.offset();
       var posY = (offset.top - $(window).scrollTop()) + popover.height();
       var posX = offset.left - $(window).scrollLeft();
       var available = $(window).width() - posX;
       if ($(window).width() > 800) {
       if (available < 400) {
         var right = available - popover.width();
         if (posY > 0) {
          $('body').append('<div class="' + placement_code + ' right" style="position: fixed; top: ' + posY + 'px; right:' + right + 'px"><div class="loading-user"><div class="fa fa-spinner fa-spin"></div></div></div>');
         }
       } else {
        if (posY > 0) {
         $('body').append('<div class="' + placement_code + '" style="position: fixed; top: ' + posY + 'px; left:' + posX + 'px"><div class="loading-user"><div class="fa fa-spinner fa-spin"></div></div></div>');
        }
       }
       }
       $.get(Wo_Ajax_Requests_File(), {f:'popover', id:id, type:type}, function(data) {
         if (data.status == 200) {
             $('.user-details').html(data.html);
         }
       });
    }, 1000);
    popover.data('timeout', over_time);
});

$('body').on('mouseleave', '.user-popover', function(e) {
    var to = e.toElement || e.relatedTarget;
      if (!$(to).is(".user-details")) {
        clearTimeout($(this).data('timeout'));
        $('.user-details').remove();
      }
});
$('body').on('mouseleave', '.user-details', function() {
    $('.user-details').remove();
});

function Wo_OpenReplyBox(id) {
  Wo_ViewMoreReplies(id);
   $('#comment_' + id).find('.comment-replies').slideDown(50, function () {
     $('#comment_' + id).find('.comment-reply').slideDown(50);
   });
}
// register post comment
function Wo_RegisterReply(text, comment_id, user_id, event, page_id, type) {
  if(event.keyCode == 13 && event.shiftKey == 0) {
    comment_wrapper = $('[id=comment_' + comment_id + ']');
    reply_textarea = comment_wrapper.find('.comment-replies');
    textarea_wrapper = reply_textarea.find('.textarea');
    reply_list = comment_wrapper.find('.comment-replies-text');
    var comment_src_image = $('#comment_src_image_'+comment_id);
    var comment_image = '';
    if (comment_src_image.length > 0) {
      comment_image = comment_src_image.val();
    }

    if(text == '' && comment_image == '') {
      return false;
    }

    $.post(Wo_Ajax_Requests_File() + '?f=posts&s=register_reply', {
      comment_id: comment_id,
      text: text,
      user_id: user_id,
      page_id: page_id,
      comment_image: comment_image
    }, function (data) {
      textarea_wrapper.val('');
      if(data.status == 200) {
        if (node_socket_flow == "1") {
          socket.emit("comment_notification", { comment_id: comment_id, user_id: _getCookie("user_id"), type: "added", for: "replies" });
        }
        if (data.mention.length > 0 && node_socket_flow == "1") {
          $.each(data.mention, function( index, value ) {
            socket.emit("user_notification", { to_id: value, user_id: _getCookie("user_id")});
          });
        }
        $('.comment-image-con').empty();
        $('#comment_src_image_'+comment_id).val('');
        $('#comment_src_image_'+comment_id).val('');
        $('#comment_reply_image_' + comment_id).val('');
        Wo_OpenReplyBox(comment_id);
        comment_wrapper.find('.reply-container:last-child').after(data.html);
        comment_wrapper.find('[id=comment-replies]').html(data.replies_num);
      }
    });
  }
}
// register post comment
function Wo_RegisterReply2(comment_id, user_id, page_id, type,gif_url = '') {
  $('.chat-box-stickers-cont').html('');
  $('#gif-form-'+comment_id).slideUp(200);
    comment_wrapper = $('[id=comment_' + comment_id + ']');
    text = $('#comment_'+comment_id).find('.comment-reply-textarea').val();

    reply_textarea = comment_wrapper.find('.comment-replies');
    textarea_wrapper = reply_textarea.find('.textarea');
    reply_list = comment_wrapper.find('.comment-replies-text');
    var comment_src_image = $('#comment_src_image_'+comment_id);
    var comment_image = '';
    if (comment_src_image.length > 0) {
      comment_image = comment_src_image.val();
    }

    if(text == '' && comment_image == '' && gif_url == '') {
      return false;
    }
    $.post(Wo_Ajax_Requests_File() + '?f=posts&s=register_reply', {
      comment_id: comment_id,
      text: text,
      user_id: user_id,
      page_id: page_id,
      comment_image: comment_image,
      gif_url: gif_url
    }, function (data) {
      if (node_socket_flow == "1") {
          socket.emit("comment_notification", { comment_id: comment_id, user_id: _getCookie("user_id"), type: "added", for: "replies" });
        }
        if (data.mention.length > 0 && node_socket_flow == "1") {
          $.each(data.mention, function( index, value ) {
            socket.emit("user_notification", { to_id: value, user_id: _getCookie("user_id")});
          });
        }
      textarea_wrapper.val('');
      if(data.status == 200) {
        $('.comment-image-con').empty();
        $('#comment_src_image_'+comment_id).val('');
        $('#comment_src_image_'+comment_id).val('');
        $('#comment_reply_image_' + comment_id).val('');
        Wo_OpenReplyBox(comment_id);
        comment_wrapper.find('.reply-container:last-child').after(data.html);
        comment_wrapper.find('[id=comment-replies]').html(data.replies_num);
      }
    });
}

function Wo_ViewMoreReplies(comment_id) {
  main_wrapper = $('[id=comment_' + comment_id + ']');
  view_more_wrapper = main_wrapper.find('.view-more-replies');
  Wo_progressIconLoader(view_more_wrapper);
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: 'load_more_replies',
    comment_id: comment_id
  }, function (data) {
    if(data.status == 200) {
      main_wrapper.find('.comment-replies-text').html(data.html);
      main_wrapper.find('.comment-reply').fadeIn(100);
      view_more_wrapper.remove();
    }
  });
}

function Wo_RegsiterRecent(id, type) {
  $.get(Wo_Ajax_Requests_File(), {
    f: 'register_recent_search',
    id: id,
    type:type
  }, function (data) {
    if(data.status == 200) {
      window.location.href = data.href;
    }
  });
}

function Wo_RemoveAlbumImage(post_id, id) {
  $.get(Wo_Ajax_Requests_File(), {
    f: 'delete_album_image',
    id: id,
    post_id: post_id
  }, function (data) {
    if(data.status == 200) {
      $('#post-' + post_id).find('#image-' + id).fadeOut(200, function () {
        $(this).remove();
      });
      $('div[data_image_parent="image-' + post_id + '"]').remove();
    }
  });
}
function Wo_ShowDeleteButton(post_id, id) {
  $('#post-' + post_id).find('#image-' + id).find('span').fadeIn(200);
}
function Wo_HideDeleteButton(post_id, id) {
  $('#post-' + post_id).find('#image-' + id).find('span').fadeOut(200);
}
function Wo_RegisterInvite(user_id, page_id) {
  Wo_progressIconLoader($('#invite-' + user_id).find('button'));
  $.get(Wo_Ajax_Requests_File(), {
    f: 'register_page_invite',
    user_id: user_id,
    page_id: page_id
  }, function (data) {
    if(data.status == 200) {
      if (node_socket_flow == "1") {
         socket.emit("user_notification", { to_id: user_id, user_id: _getCookie("user_id"), type: "added" });
      }
      $('#invite-' + user_id).fadeOut(200, function () {
        $(this).remove();
      });
    }
  });
}

function Wo_RegisterAddGroup(user_id, group_id) {
  Wo_progressIconLoader($('#add-' + user_id).find('button'));
  $.get(Wo_Ajax_Requests_File(), {
    f: 'register_group_add',
    user_id: user_id,
    group_id: group_id
  }, function (data) {
    if(data.status == 200) {
      if (node_socket_flow == "1") {
         socket.emit("user_notification", { to_id: user_id, user_id: _getCookie("user_id"), type: "added" });
      }
      $('#add-' + user_id).fadeOut(200, function () {
        $(this).remove();
      });
    }
  });
}

function Wo_SkipStep(type) {
  $.get(Wo_Ajax_Requests_File(), {
    f: 'skip_step',
    type: type
  }, function (data) {
    if(data.status == 200) {
     window.location.reload();
    }
  });
}
function Wo_AddEmoToCommentInput(post_id, code, type) {
    inputTag = $('[id=post-' + post_id + ']').find('.comment-textarea');
    if (type == 'lightbox-post-footer') {
       inputTag = $('.lightbox-post-footer').find('.comment-textarea');
    }
    inputVal = inputTag.val();
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
function Wo_SendMessages() {
  $.get(Wo_Ajax_Requests_File(), {f: 'send_mails'});
}
document.addEventListener('DOMContentLoaded', function () {
  if (Notification.permission !== "granted")
    Notification.requestPermission();
});

function Wo_NotifyMe(icon, title, notification_text, url) {
  if (!Notification) {
    return;
  }
  if (Notification.permission !== "granted")
    Notification.requestPermission();
  else {
    var notification = new Notification(title, {
      icon: icon,
      body: notification_text,
    });

    notification.onclick = function () {
      window.open(url);
      notification.close();
      Wo_OpenNotificationsMenu();
    };
  }
}
function Wo_CheckForCallAnswer(id) {
  $.get(Wo_Ajax_Requests_File(), {f:'check_for_answer', id:id}, function (data1) {
    if (data1.status == 200) {
      clearTimeout(checkcalls);
      $('#calling-modal').find('.modal-title').html('<i class="fa fa fa-video-camera"></i> ' + data1.text_answered);
      $('#calling-modal').find('.modal-body p').text(data1.text_please_wait);
      setTimeout(function () {
          window.location.href = data1.url;
      }, 1000);
      return false;
    } else if (data1.status == 400) {
      clearTimeout(checkcalls);
      Wo_PlayAudioCall('stop');
      $('#calling-modal').find('.modal-title').html('<i class="fa fa fa-times"></i> ' + data1.text_call_declined);
      $('#calling-modal').find('.modal-body p').text(data1.text_call_declined_desc);
    }
    checkcalls = setTimeout(function () {
        Wo_CheckForCallAnswer(id);
    }, 2000);
  });
}

function Wo_CheckForAudioCallAnswer(id) {
  $.get(Wo_Ajax_Requests_File(), {f:'check_for_audio_answer', id:id}, function (data1) {
    if (data1.status == 200) {
      clearTimeout(checkcalls);
      $('#calling-modal').find('.modal-title').html('<i class="fa fa fa-phone"></i> ' + data1.text_answered);
      $('#calling-modal').find('.modal-body p').text(data1.text_please_wait);
      Wo_PlayAudioCall('stop');
      setTimeout(function () {
          $( '#calling-modal' ).remove();
          $( '.modal-backdrop' ).remove();
          $( 'body' ).removeClass( "modal-open" );
          $('body').append(data1.calls_html);
          $('#re-talking-modal').modal({
            show: true
          });
      }, 3000);
    } else if (data1.status == 400) {
      clearTimeout(checkcalls);
      Wo_PlayAudioCall('stop');
      $('#calling-modal').find('.modal-title').html('<i class="fa fa fa-times"></i> ' + data1.text_call_declined);
      $('#calling-modal').find('.modal-body p').text(data1.text_call_declined_desc);
    } else {
      checkcalls = setTimeout(function () {
        Wo_CheckForAudioCallAnswer(id);
      }, 2000);
    }
  });
}

function Wo_AnswerCall(id, url, type) {
  type1 = 'video';
  if (type == 'video') {
     type1 = 'video';
  } else if (type == 'audio') {
    type1 = 'audio';
  }
  Wo_progressIconLoader($('#re-calling-modal').find('.answer-call'));
  $.get(Wo_Ajax_Requests_File(), {f:'answer_call', id:id, type:type1}, function (data) {
    Wo_PlayVideoCall('stop');
    if (type1 == 'video') {
      if (data.status == 200) {
         window.location.href = url;
      }
    } else {
      $( '#re-calling-modal' ).remove();
      $( '.modal-backdrop' ).remove();
      $( 'body' ).removeClass( "modal-open" );
      $('body').append(data.calls_html);
      $('#re-talking-modal').modal({
        show: true
      });
    }
    Wo_progressIconLoader($('#re-calling-modal').find('.answer-call'));
  });
}
function Wo_DeclineCall(id, url, type) {
  type1 = 'video';
  if (type == 'video') {
     type1 = 'video';
  } else if (type == 'audio') {
    type1 = 'audio';
  }
  Wo_progressIconLoader($('#re-calling-modal').find('.decline-call'));
  $.get(Wo_Ajax_Requests_File(), {f:'decline_call', id:id, type:type1}, function (data) {
    if (data.status == 200) {
      if (node_socket_flow == "1") {
        socket.emit("decline_call", {user_id: _getCookie("user_id") });
      }
      Wo_PlayVideoCall('stop');
      Wo_PlayAudioCall('stop');
      $( '#re-calling-modal' ).remove();
      $( '.modal-backdrop' ).remove();
      $( 'body' ).removeClass( "modal-open" );
    }
  });
}

function Wo_CloseCall(id) {
  Wo_progressIconLoader($('#re-talking-modal').find('.decline-call'));
  $.get(Wo_Ajax_Requests_File(), {f:'close_call', id:id}, function (data) {
    if (data.status == 200) {
      $( '#re-talking-modal' ).remove();
      $( '.modal-backdrop' ).remove();
      $( 'body' ).removeClass( "modal-open");
    }
  });
}

function Wo_CancelCall() {
  Wo_progressIconLoader($('#calling-modal').find('.cancel-call'));
  $.get(Wo_Ajax_Requests_File(), {f:'cancel_call'}, function (data) {
    if (data.status == 200) {
      Wo_PlayAudioCall('stop');
      $( '#calling-modal' ).remove();
      $( '.modal-backdrop' ).remove();
      $( 'body' ).removeClass( "modal-open" );
    }
  });
}
function Wo_GenerateVideoCall(user_id1, user_id2) {
  $.get(Wo_Ajax_Requests_File(), {f:'create_new_video_call', 'new': 'true', user_id1: user_id1, user_id2:user_id2}, function(data) {
      if (data.status == 200) {
          if (node_socket_flow == "1") {
            socket.emit("user_notification", { to_id: user_id2, user_id: _getCookie("user_id"), type: "create_video" });
          }
          $('body').append(data.html);
           $('#calling-modal').modal({
             show: true
           });
           checkcalls = setTimeout(function () {
              Wo_CheckForCallAnswer(data.id);
           }, 2000);
           setTimeout(function() {
            $('#calling-modal').find('.modal-title').html('<i class="fa fa fa-video-camera"></i> ' + data.text_no_answer);
            $('#calling-modal').find('.modal-body p').text(data.text_please_try_again_later);
            clearTimeout(checkcalls);
            Wo_PlayAudioCall('stop');
           }, 43000);
          Wo_PlayAudioCall('play');
    }
   });
}

function Wo_GenerateVoiceCall(user_id1, user_id2) {
  $.get(Wo_Ajax_Requests_File(), {f:'create_new_audio_call', 'new': 'true', user_id1: user_id1, user_id2:user_id2}, function(data) {
      if (data.status == 200) {
           if (node_socket_flow == "1") {
            socket.emit("user_notification", { to_id: user_id2, user_id: _getCookie("user_id"), type: "create_video" });
          }
          $('body').append(data.html);
           $('#calling-modal').modal({
             show: true
           });
           checkcalls = setTimeout(function () {
              Wo_CheckForAudioCallAnswer(data.id);
           }, 2000);
           setTimeout(function() {
            $('#calling-modal').find('.modal-title').html('<i class="fa fa fa-phone"></i> ' + data.text_no_answer);
            $('#calling-modal').find('.modal-body p').text(data.text_please_try_again_later);
            clearTimeout(checkcalls);
            Wo_PlayAudioCall('stop');
           }, 43000);
          Wo_PlayAudioCall('play');
    }
   });
}

function Wo_PlayAudioCall(type) {
  if (type == 'play') {
    document.getElementById('calling-sound').play();
    window.playmusic_ = setTimeout(function() {
       Wo_PlayAudioCall('play');
    }, 100);
  } else {
    clearTimeout(window.playmusic_);
    document.getElementById('calling-sound').pause();
  }
}
function Wo_PlayVideoCall(type) {
  if (type == 'play') {
    document.getElementById('video-calling-sound').play();
    window.playmusic = setTimeout(function() {
       Wo_PlayVideoCall('play');
    }, 100);
  } else {
    clearTimeout(window.playmusic);
    document.getElementById('video-calling-sound').pause();
  }
}
function textAreaAdjust(o, h, n) {
    if (n == 'lightbox') {
      recording_node = "comm";
    } else {
       o.style.height = h + 'px';
       o.style.height = (5+o.scrollHeight)+"px";
    }
    if (n == 'comm') {
      recording_node = "comm";
    }
}

function Wo_MarkAsSold(post_id, product_id) {
  var post = $('#post-' + post_id);
  var p = post.find('.mark-as-sold-post').find('p').text();
  post.find('.mark-as-sold-post').html('<div class="post_drop_menu_loading"><div class="ball-pulse"><div></div><div></div><div></div></div></div>');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: 'mark_as_sold_post',
    post_id: post_id,
    product_id: product_id
  }, function (data) {
    if(data.status == 200) {
      post.find('.product-status').text(data.text);
      post.find('.mark-as-sold-post').html('<svg viewBox="0 0 24 24"><path fill="currentColor" d="M19 13C19.34 13 19.67 13.04 20 13.09V8H4V21H13.35C13.13 20.37 13 19.7 13 19C13 15.69 15.69 13 19 13M9 13V11.5C9 11.22 9.22 11 9.5 11H14.5C14.78 11 15 11.22 15 11.5V13H9M21 7H3V3H21V7M22.5 17.25L17.75 22L15 19L16.16 17.84L17.75 19.43L21.34 15.84L22.5 17.25Z" /></svg>&nbsp;&nbsp;&nbsp;<div><b>'+data.text+'</b><p>'+p+'</p></div>');
      post.find('.mark-as-sold-post').removeAttr('onclick');
    }
  });
}

function Wo_UploadReplyCommentImage(id) {
  var image_container = $('#post-' + id);
  var fetched_image = $('.comment-reply-image-'+id);
  var data = new FormData();
  data.append('image', $('#comment_reply_image_' + id).prop('files')[0]);
  image_container.find('#wo_comment_combo .ball-pulse').fadeIn(100);
  $.ajax({
        type: "POST",
        url: Wo_Ajax_Requests_File() + '?f=upload_image&id=' + id,
        data: data,
        processData: false,
        contentType: false,
        success: function (data) {
          if (data.status == 200) {
            fetched_image.html('<img src="' + data.image + '"><div class="remove-icon" onclick="Wo_EmptyReplyCommentImage(' + id + ')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></div>');
            $('#comment_src_image_' + id).val(data.image_src);
            fetched_image.removeClass('hidden');
            image_container.find('.comment-reply-textarea').focus();
          }
          image_container.find('#wo_comment_combo .ball-pulse').fadeOut(100);
        }
    });
}
function Wo_EmptyReplyCommentImage(id) {
  var image_container = $('#post-' + id);
  var fetched_image = $('.comment-reply-image-'+id);
  $('.comment-image-con').empty();
  $('#comment_src_image_'+id).val('');
  $('#comment_src_image_'+id).val('');
  $('#comment_reply_image_' + id).val('');
}


function Wo_UploadCommentImage(id) {
  var image_container = $('#post-' + id);
  var fetched_image = image_container.find('#comment-image');
  var data = new FormData();
  data.append('image', $('#comment_image_' + id).prop('files')[0]);
  image_container.find('#wo_comment_combo .ball-pulse').fadeIn(100);
  $.ajax({
        type: "POST",
        url: Wo_Ajax_Requests_File() + '?f=upload_image&id=' + id,
        data: data,
        processData: false,
        contentType: false,
        success: function (data) {
          if (data.status == 200) {
            fetched_image.html('<img src="' + data.image + '"><div class="remove-icon" onclick="Wo_EmptyCommentImage(' + id + ')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></div>');
            image_container.find('#comment_src_image').val(data.image_src);
            fetched_image.removeClass('hidden');
            image_container.find('.comment-textarea').focus();
          }
          image_container.find('#wo_comment_combo .ball-pulse').fadeOut(100);
        }
    });
}

function Wo_EmptyCommentImage(id) {
  var image_container = $('#post-' + id);
  var fetched_image = image_container.find('#comment-image');
  image_container.find('.comment-image-con').empty().addClass('hidden');
  image_container.find('#comment_src_image').val('');
  image_container.find('#comment_src_image').val('');
  image_container.find('#comment_image_' + id).val('');
}

function Wo_TurnOffSound() {
  var sound = $('.turn-off-sound');
  Wo_progressIconLoader(sound);
  $.get(Wo_Ajax_Requests_File(), {
    f: 'turn-off-sound'
  }, function (data) {
    if(data.status == 200) {
      sound.find('span').html(data.message);
    }
  });
}

function Wo_Del_Article(id) {
    $("#delete-blog").find('.ball-pulse').fadeIn(100);
    $.ajax({
        type: "GET",
        url: Wo_Ajax_Requests_File(),
        data: {
            id: id,
            f: 'delete-my-blog'
        },
        dataType: 'json',
        success: function(data) {
            if (data['status'] == 200) {
                $("#delete-blog").modal("hide");
                $("div[data-rm-blog='" + data['id'] + "']").fadeOut(function() {
                    $(this).remove()
                });
            }
            $("#delete-blog").find('.ball-pulse').fadeOut(100);
        }
    });
}

function Wo_DelReply(id) {
  if (!id) {
    return false;
  }else{

      Wo_progressIconLoader($('#delete-reply').find('button'));
      $.ajax({
          type: "GET",
          url: Wo_Ajax_Requests_File(),
          data: {
              id: id,
              f: 'delete-reply'
          },
          dataType: 'json',
          success: function(data) {
              if (data['status'] == 200) {
                  $("#delete-reply").modal("hide");
                  $("[data-thread-reply='" + id + "']").slideUp(function() {
                      $(this).remove()
                  });
              }
              Wo_progressIconLoader($('#delete-reply').find('button'));
          }
      });
  }
}

var Wo_Delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();
function Wo_AddVideoViews(post_id){
  $('.video-js').each(function(index, el) {
    if ($(this).attr('data-post-video') != post_id) {
      $(this).get(0).pause();
    }
  });
    if (post_id && typeof(Number(post_id)) == 'number'  && post_id > 0) {
      Wo_Delay(function(){
        $.ajax({
          url: Wo_Ajax_Requests_File(),
          type: 'GET',
          dataType: 'json',
          data: {f:'posts', s:'add-video-view',post_id:post_id},
        })
        .done(function(data) {
          if (data.status == 200) {
            $("span[data-post-video-views="+post_id+"]").text(data.views);
            $("video[data-post-video="+post_id+"]").removeAttr('onplay');
          }
        })
      },5000)
    }
  }
function Wo_DeleteStatus(id){
  if (!id || !confirm('Are you sure you want to delete your status?')) {
    return false;
  }

  $.ajax({
    url: Wo_Ajax_Requests_File(),
    type: 'GET',
    dataType: 'json',
    data: {f: 'status',s:'remove',id:id},
  })
  .done(function(data) {
    if (data.status == 200) {
      location.reload();
      $("[data-status-id='"+id+"']").slideUp(function(){
        $(this).remove();
      })
    }
  })
  .fail(function() {
  })
}

function Wo_StoryProgress(){
  $('.mfp-progress-line').html('<span width="0"></span>').find('span').delay(1).queue(function () {
    $(this).css('width', '100%')
  });
}
function Wo_EditReplyComment(id){
  if (!id) { return false;}
  var self = $("div[data-post-comm-reply-edit='"+id+"']").toggleClass('hidden');
}

function Wo_UpdatCommReply(id,event,self){
  if (!id || !event || !self) {
    return false;
  }

  else if (event.keyCode == 13 && event.shiftKey == 0) {
    var text = $(self).val();
    var id   = id;
    $.ajax({
      url: Wo_Ajax_Requests_File() + "?f=posts&s=update-reply",
      type: 'POST',
      dataType: 'json',
      data: {id:id,text:text},
    })
    .done(function(data) {
      if (data.status == 200) {
        $("div[data-post-comm-reply-text='"+id+"']").html(data.text);
        var edit_box = $("div[data-post-comm-reply-edit='"+id+"']").addClass('hidden');
        edit_box.find('textarea').val(data.orginal);
      }
    })
    .fail(function() {
      console.log("error");
    })

  }
  else{
    Wo_Get_Mention(self);
  }

}

function SearchFor(self,type){
  name = $(self).val();
  $.ajax({
    url: Wo_Ajax_Requests_File(),
    type: 'GET',
    dataType: 'json',
    data: {f: 'search_for',s:type,name:name},
  })
  .done(function(data) {
    if (data.status == 200) {
      $(self).autocomplete({
        source: data.info,
        select: function (event, ui) {
            $('#SearchForInputTypeId').val(ui.item.id);
        }
      });
    }
    else{

    }
  })
  .fail(function() {
  })
}

function Wo_OpenLighteBox(self ,event){
  if (!self || !event) {
    return false;
  }
  event.stopPropagation();
  var url = $(self).attr('data-href');
  $('#modal_light_box').modal('show').find('.image').attr('src', url);
}

var Wo_ElementLoad = function(selector, callback){
    $(selector).each(function(){
        if (this.complete || $(this).height() > 0) {
            callback.apply(this);
        }
        else {
            $(this).on('load', function(){
                callback.apply(this);
            });
        }
    });
};

function decodeHtml(html) {
    var txt = document.createElement("textarea");
    txt.innerHTML = html;
    return txt.value;
}

function Wo_IsFileAllowedToUpload(filename, allowed) {
    var extension = filename.replace(/^.*\./, '').toLowerCase();
    var allowed_array = allowed.split(',');
    if (isInArray(extension, allowed_array)) {
      return true;
    }
    return false;
}

function isInArray(value, array) {
  return array.indexOf(value) > -1;
}

function escapeHtml(html){
    var text = document.createTextNode(html);
    var div = document.createElement('div');
    div.appendChild(text);
    return div.innerHTML;
}

function decodeHTMLEntities(text) {
    var entities = [
        ['amp', '&'],
        ['apos', '\''],
        ['#x27', '\''],
        ['#x2F', '/'],
        ['#39', '\''],
        ['#47', '/'],
        ['lt', '<'],
        ['gt', '>'],
        ['nbsp', ' '],
        ['quot', '"']
    ];

    for (var i = 0, max = entities.length; i < max; ++i)
        text = text.replace(new RegExp('&'+entities[i][0]+';', 'g'), entities[i][1]);

    return text;
}

function Wo_RegisterCommentReaction(comment_id,reaction){
  if (!comment_id && !reaction)
    return false;
  $('.reactions-comment-container-' + comment_id).css('display', 'none');
  $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'register_comment_reaction', comment_id: comment_id, reaction: reaction}, function (data) {
    if(data.status == 200) {
      if (node_socket_flow == "1") {
        socket.emit("comment_notification", { comment_id: comment_id, user_id: _getCookie("user_id"), type: "added" });
      }
        $('.comment-reactions-icons-'+comment_id).html(data.reactions);
        $('.comment-status-reaction-'+comment_id).addClass("active-like");
    } else {
    }
    if (data.can_send == 1) {
      Wo_SendMessages();
    }
  });
}

function Wo_RegisterBlogCommentReaction(comment_id,reaction){
  if (!comment_id && !reaction)
    return false;
  $('.reactions-comment-container-' + comment_id).css('display', 'none');
  $.get(Wo_Ajax_Requests_File(), {f: 'blog', s: 'register_blog_comment_reaction', comment_id: comment_id, reaction: reaction}, function (data) {
    if(data.status == 200) {
      if (node_socket_flow == "1") {
            socket.emit("user_notification", { to_id: data.user_id, user_id: _getCookie("user_id"), type: "added" });
        }
        $('.comment-reactions-icons-'+comment_id).html(data.reactions);
        $('.comment-status-reaction-'+comment_id).addClass("active-like");
    } else {
    }
    if (data.can_send == 1) {
      Wo_SendMessages();
    }
  });
}

function Wo_RegisterBlogReplyReaction(user_id,reply_id,reaction){
  if (!reply_id && !reaction)
    return false;

  $('.reactions-box-comment-replay-container-' + reply_id).css('display', 'none');
  $.get(Wo_Ajax_Requests_File(), {f: 'blog', s: 'register_reply_reaction', user_id: user_id, reply_id: reply_id, reaction: reaction}, function (data) {
    if(data.status == 200) {
        if (node_socket_flow == "1") {
            socket.emit("user_notification", { to_id: data.user_id, user_id: _getCookie("user_id"), type: "added" });
        }
        $('.replay-reactions-icons-'+reply_id).html(data.reactions);
        $('.replay-status-reaction-'+reply_id).addClass("active-like");
    } else {
    }
    if (data.can_send == 1) {
      Wo_SendMessages();
    }
  });

}

function Wo_RegisterlightboxCommentReaction(comment_id,reaction){
  if (!comment_id && !reaction)
    return false;


  $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'register_comment_reaction', comment_id: comment_id, reaction: reaction}, function (data) {
    if(data.status == 200) {
        if (node_socket_flow == "1") {
          socket.emit("comment_notification", { comment_id: comment_id, user_id: _getCookie("user_id"), type: "added" });
        }
        $('.lightbox-comment-reactions-icons-'+comment_id).html(data.reactions);
        $('.lightbox-comment-status-reaction-'+comment_id).addClass("active-like");
    } else {
    }
    if (data.can_send == 1) {
      Wo_SendMessages();
    }
  });
}

function Wo_RegisterReplyReaction(user_id,reply_id,reaction){
  if (!reply_id && !reaction)
    return false;
  $('.reactions-box-comment-replay-container-' + reply_id).css('display', 'none');

  $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'register_replay_reaction', user_id: user_id, reply_id: reply_id, reaction: reaction}, function (data) {
    if(data.status == 200) {
      if (node_socket_flow == "1") {
        socket.emit("reply_notification", { reply_id: reply_id, user_id: _getCookie("user_id"), type: "added" });
      }
        $('.replay-reactions-icons-'+reply_id).html(data.reactions);
        $('.replay-status-reaction-'+reply_id).addClass("active-like");
    } else {
    }
    if (data.can_send == 1) {
      Wo_SendMessages();
    }
  });

}

function load_ajax_emojii(id, path){
    var emojjii = "😀*😁*😂*🤣*😃*😄*😅*😆*😉*😊*😋*😎*😍*😘*😗*😙*😚*🙂*🤗*🤩*🤔*🤨*😐*😑*😶*🙄*😏*😣*😥*😮*🤐*😯*😪*😫*😴*😌*😛*😜*😝*🤤*😒*😓*😔*😕*🙃*🤑*😲*☹️*🙁*😖*😞*😟*😤*😢*😭*😦*😧*😨*😩*🤯*😬*😰*😱*😳*🤪*😵*😡*😠*🤬*😷*🤒*🤕*🤢*🤮*🤧*😇*🤠*🤡*🤥*🤫*🤭*🧐*🤓*😈*👿*👹*👺*💀*👻*👽*🤖*💩*😺*😸*😹*😻*😼*😽*🙀*😿*😾*👶*👧*🧒*👦*👩*🧑*👨*👵*🧓*👴*👲*💅*🤳*💃*🕺*🕴*👫*👭*👬*💑*🤲*👐*🙌*👏*🤝*👍*👎*👊*✊*🤛*🤜*🤞*✌️*🤟*🤘*👌*👈*👉*👆*👇*☝️*✋*🤚*🖐*🖖*👋*🤙*💪*🖕*✍️*🙏*💍*💄*💋*👄*👅*👂*👃*👣*👁*👀*🧠*🗣*👤*👥";

  $('.emo-comment-container-' + id ).html("");
  $.each(emojjii.split('*'), function(key, value) {
    $('.emo-comment-container-' + id ).append("<span class=\"emoji_holder\" onclick=\"Wo_AddEmoToCommentInput("+ id +",'"+ value +"');\"><span>"+ value + "</span>");
  });
}
function load_ajax_chat_emojii(id, path){
    var emojjii = "😀*😁*😂*🤣*😃*😄*😅*😆*😉*😊*😋*😎*😍*😘*😗*😙*😚*🙂*🤗*🤩*🤔*🤨*😐*😑*😶*🙄*😏*😣*😥*😮*🤐*😯*😪*😫*😴*😌*😛*😜*😝*🤤*😒*😓*😔*😕*🙃*🤑*😲*☹️*🙁*😖*😞*😟*😤*😢*😭*😦*😧*😨*😩*🤯*😬*😰*😱*😳*🤪*😵*😡*😠*🤬*😷*🤒*🤕*🤢*🤮*🤧*😇*🤠*🤡*🤥*🤫*🤭*🧐*🤓*😈*👿*👹*👺*💀*👻*👽*🤖*💩*😺*😸*😹*😻*😼*😽*🙀*😿*😾*👶*👧*🧒*👦*👩*🧑*👨*👵*🧓*👴*👲*💅*🤳*💃*🕺*🕴*👫*👭*👬*💑*🤲*👐*🙌*👏*🤝*👍*👎*👊*✊*🤛*🤜*🤞*✌️*🤟*🤘*👌*👈*👉*👆*👇*☝️*✋*🤚*🖐*🖖*👋*🤙*💪*🖕*✍️*🙏*💍*💄*💋*👄*👅*👂*👃*👣*👁*👀*🧠*🗣*👤*👥";

  $('.emo-container-' + id ).html("");
  $.each(emojjii.split('*'), function(key, value) {
    $('.emo-container-' + id ).append("<span class=\"emoji_holder\" onclick=\"Wo_AddEmoToChat("+ id +",'"+ value +"');\"><span>"+ value + "</span>");
  });
}
function load_ajax_chat_group_emojii(id, path){
    var emojjii = "😀*😁*😂*🤣*😃*😄*😅*😆*😉*😊*😋*😎*😍*😘*😗*😙*😚*🙂*🤗*🤩*🤔*🤨*😐*😑*😶*🙄*😏*😣*😥*😮*🤐*😯*😪*😫*😴*😌*😛*😜*😝*🤤*😒*😓*😔*😕*🙃*🤑*😲*☹️*🙁*😖*😞*😟*😤*😢*😭*😦*😧*😨*😩*🤯*😬*😰*😱*😳*🤪*😵*😡*😠*🤬*😷*🤒*🤕*🤢*🤮*🤧*😇*🤠*🤡*🤥*🤫*🤭*🧐*🤓*😈*👿*👹*👺*💀*👻*👽*🤖*💩*😺*😸*😹*😻*😼*😽*🙀*😿*😾*👶*👧*🧒*👦*👩*🧑*👨*👵*🧓*👴*👲*💅*🤳*💃*🕺*🕴*👫*👭*👬*💑*🤲*👐*🙌*👏*🤝*👍*👎*👊*✊*🤛*🤜*🤞*✌️*🤟*🤘*👌*👈*👉*👆*👇*☝️*✋*🤚*🖐*🖖*👋*🤙*💪*🖕*✍️*🙏*💍*💄*💋*👄*👅*👂*👃*👣*👁*👀*🧠*🗣*👤*👥";

  $('.emo-group-container-' + id ).html("");
  $.each(emojjii.split('*'), function(key, value) {
    $('.emo-group-container-' + id ).append("<span class=\"emoji_holder\" onclick=\"Wo_AddEmoToGroup("+ id +",'"+ value +"');\"><span>"+ value + "</span>");
  });
}
function load_ajax_chat_page_emojii(id, path){
    var emojjii = "😀*😁*😂*🤣*😃*😄*😅*😆*😉*😊*😋*😎*😍*😘*😗*😙*😚*🙂*🤗*🤩*🤔*🤨*😐*😑*😶*🙄*😏*😣*😥*😮*🤐*😯*😪*😫*😴*😌*😛*😜*😝*🤤*😒*😓*😔*😕*🙃*🤑*😲*☹️*🙁*😖*😞*😟*😤*😢*😭*😦*😧*😨*😩*🤯*😬*😰*😱*😳*🤪*😵*😡*😠*🤬*😷*🤒*🤕*🤢*🤮*🤧*😇*🤠*🤡*🤥*🤫*🤭*🧐*🤓*😈*👿*👹*👺*💀*👻*👽*🤖*💩*😺*😸*😹*😻*😼*😽*🙀*😿*😾*👶*👧*🧒*👦*👩*🧑*👨*👵*🧓*👴*👲*💅*🤳*💃*🕺*🕴*👫*👭*👬*💑*🤲*👐*🙌*👏*🤝*👍*👎*👊*✊*🤛*🤜*🤞*✌️*🤟*🤘*👌*👈*👉*👆*👇*☝️*✋*🤚*🖐*🖖*👋*🤙*💪*🖕*✍️*🙏*💍*💄*💋*👄*👅*👂*👃*👣*👁*👀*🧠*🗣*👤*👥";

  $('.emo-container-' + id ).html("");
  $.each(emojjii.split('*'), function(key, value) {
    $('.emo-container-' + id ).append("<span class=\"emoji_holder\" onclick=\"Wo_AddEmoToPage("+ id +",'"+ value +"');\"><span>"+ value + "</span>");
  });
}
function load_ajax_message_emojii(path){
    var emojjii = "😀*😁*😂*🤣*😃*😄*😅*😆*😉*😊*😋*😎*😍*😘*😗*😙*😚*🙂*🤗*🤩*🤔*🤨*😐*😑*😶*🙄*😏*😣*😥*😮*🤐*😯*😪*😫*😴*😌*😛*😜*😝*🤤*😒*😓*😔*😕*🙃*🤑*😲*☹️*🙁*😖*😞*😟*😤*😢*😭*😦*😧*😨*😩*🤯*😬*😰*😱*😳*🤪*😵*😡*😠*🤬*😷*🤒*🤕*🤢*🤮*🤧*😇*🤠*🤡*🤥*🤫*🤭*🧐*🤓*😈*👿*👹*👺*💀*👻*👽*🤖*💩*😺*😸*😹*😻*😼*😽*🙀*😿*😾*👶*👧*🧒*👦*👩*🧑*👨*👵*🧓*👴*👲*💅*🤳*💃*🕺*🕴*👫*👭*👬*💑*🤲*👐*🙌*👏*🤝*👍*👎*👊*✊*🤛*🤜*🤞*✌️*🤟*🤘*👌*👈*👉*👆*👇*☝️*✋*🤚*🖐*🖖*👋*🤙*💪*🖕*✍️*🙏*💍*💄*💋*👄*👅*👂*👃*👣*👁*👀*🧠*🗣*👤*👥";

  $('.emo-message-container').html("");
  $.each(emojjii.split('*'), function(key, value) {
    $('.emo-message-container').append("<span class=\"emoji_holder\" onclick=\"Wo_AddEmoToMessageInput('"+ value +"');\"><span>"+ value + "</span>");
  });
}
function load_ajax_publisher_emojii(path){
    var emojjii = "😀*😁*😂*🤣*😃*😄*😅*😆*😉*😊*😋*😎*😍*😘*😗*😙*😚*🙂*🤗*🤩*🤔*🤨*😐*😑*😶*🙄*😏*😣*😥*😮*🤐*😯*😪*😫*😴*😌*😛*😜*😝*🤤*😒*😓*😔*😕*🙃*🤑*😲*☹️*🙁*😖*😞*😟*😤*😢*😭*😦*😧*😨*😩*🤯*😬*😰*😱*😳*🤪*😵*😡*😠*🤬*😷*🤒*🤕*🤢*🤮*🤧*😇*🤠*🤡*🤥*🤫*🤭*🧐*🤓*😈*👿*👹*👺*💀*👻*👽*🤖*💩*😺*😸*😹*😻*😼*😽*🙀*😿*😾*👶*👧*🧒*👦*👩*🧑*👨*👵*🧓*👴*👲*💅*🤳*💃*🕺*🕴*👫*👭*👬*💑*🤲*👐*🙌*👏*🤝*👍*👎*👊*✊*🤛*🤜*🤞*✌️*🤟*🤘*👌*👈*👉*👆*👇*☝️*✋*🤚*🖐*🖖*👋*🤙*💪*🖕*✍️*🙏*💍*💄*💋*👄*👅*👂*👃*👣*👁*👀*🧠*🗣*👤*👥";

  $('.publisher-box-emooji').html("");
  $.each(emojjii.split('*'), function(key, value) {
    $('.publisher-box-emooji').append("<span class=\"emoji_holder\" onclick=\"Wo_AddEmo('"+ value +"', '#post-textarea textarea'), Wo_ShowPosInfo();\"><span>"+ value + "</span>");
  });
}
function load_ajax_reply_emojii(id, path){
    var emojjii = "😀*😁*😂*🤣*😃*😄*😅*😆*😉*😊*😋*😎*😍*😘*😗*😙*😚*🙂*🤗*🤩*🤔*🤨*😐*😑*😶*🙄*😏*😣*😥*😮*🤐*😯*😪*😫*😴*😌*😛*😜*😝*🤤*😒*😓*😔*😕*🙃*🤑*😲*☹️*🙁*😖*😞*😟*😤*😢*😭*😦*😧*😨*😩*🤯*😬*😰*😱*😳*🤪*😵*😡*😠*🤬*😷*🤒*🤕*🤢*🤮*🤧*😇*🤠*🤡*🤥*🤫*🤭*🧐*🤓*😈*👿*👹*👺*💀*👻*👽*🤖*💩*😺*😸*😹*😻*😼*😽*🙀*😿*😾*👶*👧*🧒*👦*👩*🧑*👨*👵*🧓*👴*👲*💅*🤳*💃*🕺*🕴*👫*👭*👬*💑*🤲*👐*🙌*👏*🤝*👍*👎*👊*✊*🤛*🤜*🤞*✌️*🤟*🤘*👌*👈*👉*👆*👇*☝️*✋*🤚*🖐*🖖*👋*🤙*💪*🖕*✍️*🙏*💍*💄*💋*👄*👅*👂*👃*👣*👁*👀*🧠*🗣*👤*👥";

  $('.emo-comment-container-' + id ).html("");
  $.each(emojjii.split('*'), function(key, value) {
    $('.emo-comment-container-' + id ).append("<span class=\"emoji_holder\" onclick=\"Wo_AddEmoTo_replyCommentInput("+ id +",'"+ value +"');\"><span>"+ value + "</span>");
  });
}
function Wo_AddEmoTo_replyCommentInput(post_id, code, type) {
    inputTag = $('[id=post-' + post_id + ']').find('.comment-reply-textarea');
    if (type == 'lightbox-post-footer') {
       inputTag = $('.lightbox-post-footer').find('.comment-reply-textarea');
    }
    inputVal = inputTag.val();
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

function _getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
          c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
      }
  }
  if (cname == 'user_id') {
    return _getSession('user_id');
  }
  return "";
}

var _shortcut_helper = _getCookie("shortcut_helper");
if ( _shortcut_helper == "false" ) {
  $('#shortcut_helper').hide();
}

$(window).on('load', function() {
  window.post = 0;
  $('body').on('keypress', function(key) {
    var tag = key.target.tagName.toLowerCase();
    key.stopPropagation();
    var k = parseInt(key.which, 10);
    if( window.post >= 0 ){
      if( k == 106 && tag != 'input' && tag != 'textarea'){
        var date = new Date();
        var expires = "";
            date.setTime(date.getTime() + (7*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
            document.cookie = "shortcut_helper=false" + expires + "; path=/";
        $('#shortcut_helper').show();
        if( $( '.post-container' ).eq( window.post ).hasClass( 'user-ad-container' ) ){
          $("html, body").animate({ scrollTop: $(document).height() }, "slow");
        }

        var listItems = $( '.post-container .post' ).eq( window.post ).find('.panel');
            if (listItems.length) {
              listItems.addClass('active_shadow');
              $('html, body').animate({
                  scrollTop: parseInt(listItems.offset().top - 60)
              }, 600);
              setTimeout(function(){
                listItems.removeClass('active_shadow');
              }, 500);
            }
            window.post++;
      }else if( k == 107 && tag != 'input' && tag != 'textarea'){
        $('#shortcut_helper').show();
        window.post--;
        var listItems = $( '.post-container .post' ).eq( post ).find('.panel');
        if (listItems.length) {
            listItems.addClass('active_shadow');
            $('html, body').animate({
                scrollTop: parseInt(listItems.offset().top - 60)
            }, 500);
            setTimeout(function(){
              listItems.removeClass('active_shadow');
            }, 500);
        }
      }

    }else{
    }
  });

});

function Wo_ShowCommentCombo(post_id){
  comment_combo_wrapper = $('.wo_comment_combo_' + post_id);
  comment_combo_wrapper.addClass('comment-toggle');
}

function Wo_Get_Mention(self) {
  $(self).triggeredAutocomplete({
       source: Wo_Ajax_Requests_File() + "?f=mention",
       trigger: "@"
    });
}

function Wo_RemoveBlur(self,id) {
  $('.remover_blur_btn_'+id).remove();
  $('.remover_blur_'+id).removeClass('image_blur');
}
function Wo_RemoveBlurAlbum(self,id) {
  $('.show_album_'+id).remove();
}

function Wo_ShowCommonUserProfile(user_id) {
  $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
  $.get(Wo_Ajax_Requests_File(), {f:'show_common_user',s:'show', user_id:user_id}, function(data) {
    if (data.status == 200) {
    document.body.style.overflow = 'hidden';
      $('.lightbox-container').html(data.html);
    }
    if (data.html.length == 0) {
       document.body.style.overflow = 'auto';
    }
  });
}

function Wo_DeleteFund(id) {
    $("#delete-fund").find('.ball-pulse').fadeIn(100);
    $.ajax({
        type: "GET",
        url: Wo_Ajax_Requests_File(),
        data: {
            id: id,
            f: 'funding',
            s: 'delete_fund'
        },
        dataType: 'json',
        success: function(data) {
            if (data['status'] == 200) {
                $("#delete-fund").modal("hide");
                $("div[data-rm-blog='" + id + "']").fadeOut(function() {
                    $(this).remove()
                });
            }
            $("#delete-fund").find('.ball-pulse').fadeOut(100);
        }
    });
}



function Wo_OpenAlbumLightBox(image_id, type) {
  $('body').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
  $.get(Wo_Ajax_Requests_File(), {f:'open_album_lightbox', image_id:image_id, type:type}, function(data) {
    if (data.status == 200) {
    document.body.style.overflow = 'hidden';
      $('.lightbox-container').html(data.html);
    }
    if (data.html.length == 0) {
       document.body.style.overflow = 'auto';
    }
  });
}
function Wo_CloseLightbox() {
  $('.lightbox-container').remove();
  document.body.style.overflow = 'auto';
}
function Wo_OpenLightBox(post_id) {
  $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
  $.get(Wo_Ajax_Requests_File(), {f:'open_lightbox', post_id:post_id}, function(data) {
    if (data.status == 200) {
    document.body.style.overflow = 'hidden';
      $('.lightbox-container').html(data.html);
    }
    if (data.html.length == 0) {
       document.body.style.overflow = 'auto';
    }
  });
}
function Wo_OpenMultiLightBox(url) {
  $('body').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
  $.post(Wo_Ajax_Requests_File() + '?f=open_multilightbox', {url:url}, function(data) {
    if (data.status == 200) {
    document.body.style.overflow = 'hidden';
      $('.lightbox-container').html(data.html);
    }
    if (data.html.length == 0) {
       document.body.style.overflow = 'auto';
    }
  });
}
function Wo_NextAlbumPicture(post_id, id) {
  Wo_CloseLightbox();
  $('body').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
  $.get(Wo_Ajax_Requests_File(), {f:'get_next_album_image', post_id:post_id, after_image_id:id}, function(data) {
    if (data.status == 200) {
  document.body.style.overflow = 'hidden';
      $('.lightbox-container').html(data.html);
      $( ".changer").fadeIn(200);
    }
    if (data.html.length == 0) {
       document.body.style.overflow = 'auto';
    }
  });
}
function Wo_PreviousAlbumPicture(post_id, id) {
  Wo_CloseLightbox();
  $('body').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
  $.get(Wo_Ajax_Requests_File(), {f:'get_previous_album_image', post_id:post_id, before_image_id:id}, function(data) {
    if (data.status == 200) {
    document.body.style.overflow = 'hidden';
      $('.lightbox-container').html(data.html);
      $( ".changer").fadeIn(200);
    }
    if (data.html.length == 0) {
       document.body.style.overflow = 'auto';
    }
  });
}

function Wo_NextPicture(post_id) {
  var id = 0;
  var type = 'none';
  if(typeof ($('[data-page=timeline]').attr('data-id')) == "string") {
    id = $('[data-page=timeline]').attr('data-id');
    type = 'profile';
  } else if(typeof ($('[data-page=page]').attr('data-id')) == "string") {
    id = $('[data-page=page]').attr('data-id');
    type = 'page';
  } else if (typeof ($('[data-page=group]').attr('data-id')) == "string") {
    id = $('[data-page=group]').attr('data-id');
    type = 'group';
  }
   Wo_CloseLightbox();
  $('body').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');

  $.get(Wo_Ajax_Requests_File(), {f:'get_next_image', post_id:post_id, type:type, id:id}, function(data) {
    if (data.status == 200) {
    document.body.style.overflow = 'hidden';
      $('.lightbox-container').html(data.html);
      $( ".changer" ).fadeIn(200);
    }
    if (data.html.length == 0) {
       document.body.style.overflow = 'auto';
    }
  });
}

function Wo_PreviousPicture(post_id) {
  var id = 0;
  var type = 'none';
  if(typeof ($('[data-page=timeline]').attr('data-id')) == "string") {
    id = $('[data-page=timeline]').attr('data-id');
    type = 'profile';
  } else if(typeof ($('[data-page=page]').attr('data-id')) == "string") {
    id = $('[data-page=page]').attr('data-id');
    type = 'page';
  } else if (typeof ($('[data-page=group]').attr('data-id')) == "string") {
    id = $('[data-page=group]').attr('data-id');
    type = 'group';
  }
  Wo_CloseLightbox();
  $('body').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
  $.get(Wo_Ajax_Requests_File(), {f:'get_previous_image', post_id:post_id, type:type, id:id}, function(data) {
    if (data.status == 200) {
    document.body.style.overflow = 'hidden';
      $('.lightbox-container').html(data.html);
      $( ".changer" ).fadeIn(200);
    }
    if (data.html.length == 0) {
       document.body.style.overflow = 'auto';
    }
  });
}

function Wo_NextProductPicture(product_id, id) {
  Wo_CloseLightbox();
  $('body').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
  $.get(Wo_Ajax_Requests_File(), {f:'get_next_product_image', product_id:product_id, after_image_id:id}, function(data) {
    if (data.status == 200) {
    document.body.style.overflow = 'hidden';
      $('.lightbox-container').html(data.html);
      $( ".changer").fadeIn(200);
    }
    if (data.html.length == 0) {
       document.body.style.overflow = 'auto';
    }
  });
}

function Wo_PreviousProductPicture(product_id, id) {
  Wo_CloseLightbox();
  $('body').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
  $.get(Wo_Ajax_Requests_File(), {f:'get_previous_product_image', product_id:product_id, before_image_id:id}, function(data) {
    if (data.status == 200) {
    document.body.style.overflow = 'hidden';
      $('.lightbox-container').html(data.html);
      $( ".changer").fadeIn(200);
    }

    if (data.html.length == 0) {
       document.body.style.overflow = 'auto';
    }
  });
}