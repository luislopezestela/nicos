<div class="page-margin page-wrapper grid">
  <div id="maincontent" class="page-main g-col-lg-12 g-col-md-8 g-col-sm-4">
      <br><?php echo lui_LoadPage('story/content'); ?>
   </div>
</div>
<?php
if (!empty($_GET['ref']) && is_numeric($_GET['ref']) && $_GET['ref'] > 0) {
?>
<script type="text/javascript">
$.fn.scrollTo = function( target, options, callback ){
  if(typeof options == 'function' && arguments.length == 2){ callback = options; options = target; }
  var settings = $.extend({
    scrollTarget  : target,
    offsetTop     : 75,
    duration      : 500,
    easing        : 'swing'
  }, options);
  return this.each(function(){
    var scrollPane = $(this);
    var scrollTarget = (typeof settings.scrollTarget == "number") ? settings.scrollTarget : $(settings.scrollTarget);
    var scrollY = (typeof scrollTarget == "number") ? scrollTarget : scrollTarget.offset().top + scrollPane.scrollTop() - parseInt(settings.offsetTop);
    scrollPane.animate({scrollTop : scrollY }, parseInt(settings.duration), settings.easing, function(){
      if (typeof callback == 'function') { callback.call(this); }
    });
  });
}

$(function () {
  
  var comment_reply = $("#comment_<?php echo $_GET['ref']?>");
  Wo_ViewMoreReplies(<?php echo $_GET['ref']?>);
  setTimeout(function(){
     if (comment_reply.length) {
        $('body').scrollTo("#comment_<?php echo $_GET['ref']?>");
        $("#comment_<?php echo $_GET['ref']?>").addClass("light").delay(1000).queue(function(next){
           $(this).removeClass("light");
           next();
        });
     }
  }, 500);
  
});
</script>
<?php } ?>
