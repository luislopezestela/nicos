<script type="text/javascript">
  (function (factory) {
  if (typeof define === 'function' && define.amd) {
    define(['jquery'], factory);
  } else {
    factory(jQuery);
  }
}(function ($) {
  $.timeago = function(timestamp) {
    if (timestamp instanceof Date) {
      return inWords(timestamp);
    } else if (typeof timestamp === "string") {
      return inWords($.timeago.parse(timestamp));
    } else if (typeof timestamp === "number") {
      return inWords(new Date(timestamp));
    } else {
      return inWords($.timeago.datetime(timestamp));
    }
  };
  var $t = $.timeago;

  $.extend($.timeago, {
    settings: {
      refreshMillis: 60000,
      allowPast: true,
      allowFuture: false,
      localeTitle: false,
      cutoff: 0,
      strings: {
        prefixAgo: null,
        prefixFromNow: null,
        suffixAgo: "<?php echo $wo['lang']['time_ago'];?>",
        suffixFromNow: "<?php echo $wo['lang']['time_from_now'];?>",
        inPast: "<?php echo $wo['lang']['time_any_moment_now'];?>",
        seconds: "<?php echo $wo['lang']['now'];?>",
        minute: "<?php echo $wo['lang']['minute'];?>",
        minutes: "<?php echo $wo['lang']['minutes'];?>",
        hour: "<?php echo $wo['lang']['hour'];?>",
        hours: "<?php echo $wo['lang']['hours'];?>",
        day: "<?php echo $wo['lang']['day'];?>",
        days: "<?php echo html_entity_decode($wo['lang']['days']);?>",
        week: "<?php echo $wo['lang']['week'];?>",
        weeks: "<?php echo $wo['lang']['weeks'];?>",
        month: "<?php echo $wo['lang']['month'];?>",
        months: "<?php echo $wo['lang']['months'];?>",
        year: "<?php echo $wo['lang']['year'];?>",
        years: "<?php echo $wo['lang']['years'];?>",
        wordSeparator: " ",
        numbers: []
      }
    },

    inWords: function(distanceMillis,type = '') {
      if(!this.settings.allowPast && ! this.settings.allowFuture) {
          throw 'timeago allowPast and allowFuture settings can not both be set to false.';
      }

      var $l = this.settings.strings;
      var prefix = $l.prefixAgo;
      var suffix = $l.suffixAgo;
      if (this.settings.allowFuture) {
        if (distanceMillis < 0) {
          prefix = $l.prefixFromNow;
          suffix = $l.suffixFromNow;
        }
      }

      if(!this.settings.allowPast && distanceMillis >= 0) {
        return this.settings.strings.inPast;
      }

      var seconds = Math.abs(distanceMillis) / 1000;
      var minutes = seconds / 60;
      var hours = minutes / 60;
      var days = hours / 24;
      var weeks = days / 7;
      var years = days / 365;

      function substitute(stringOrFunction, number) {
        var string = $.isFunction(stringOrFunction) ? stringOrFunction(number, distanceMillis) : stringOrFunction;
        var value = ($l.numbers && $l.numbers[number]) || number;
        return number+' '+string.replace(/%d/i, value);
      }
        var words = '';
        if (type != 'notification') {
            if (seconds < 45) {
                words = substitute($l.seconds, '');
            }
            else if (seconds < 90) {
                words = substitute('<?php echo $wo['lang']['_time_m'];?>', 1);
            }
            else if (minutes < 45) {
                words = substitute('<?php echo $wo['lang']['_time_m'];?>', Math.round(minutes));
            }
            else if (minutes < 90) {
                words = substitute('<?php echo $wo['lang']['_time_h'];?>', 1);
            }
            else if (hours < 24) {
                words = substitute('<?php echo $wo['lang']['_time_hrs'];?>', Math.round(hours));
            }
            else if (hours < 42) {
                words = substitute('<?php echo $wo['lang']['_time_d'];?>', 1);
            }
            else if (days < 7) {
                words = substitute('<?php echo $wo['lang']['_time_d'];?>', Math.round(days));
            }
            else if (weeks < 2) {
                words = substitute('<?php echo $wo['lang']['_time_w'];?>', 1);
            }
            else if (weeks < 52) {
                words = substitute('<?php echo $wo['lang']['_time_w'];?>', Math.round(weeks));
            }
            else if (years < 1.5) {
                words = substitute('<?php echo $wo['lang']['_time_y'];?>', 1);
            }
            else {
                words = substitute('<?php echo $wo['lang']['_time_yrs'];?>', Math.round(years));
            }
        }
        else{
            if (seconds < 45) {
                words = substitute($l.seconds, '');
            }
            else if (seconds < 90) {
                words = substitute($l.minute + ' <?php echo $wo['lang']['ago'];?>', 1);
            }
            else if (minutes < 45) {
                words = substitute($l.minutes + ' <?php echo $wo['lang']['ago'];?>', Math.round(minutes));
            }
            else if (minutes < 90) {
                words = substitute($l.hour + ' <?php echo $wo['lang']['ago'];?>', 1);
            }
            else if (hours < 24) {
                words = substitute($l.hours + ' <?php echo $wo['lang']['ago'];?>', Math.round(hours));
            }
            else if (hours < 42) {
                words = substitute($l.day + ' <?php echo $wo['lang']['ago'];?>', 1);
            }
            else if (days < 7) {
                words = substitute($l.days + ' <?php echo $wo['lang']['ago'];?>', Math.round(days));

            }
            else if (weeks < 2) {
                words = substitute($l.week + ' <?php echo $wo['lang']['ago'];?>', 1);
            }
            else if (weeks < 52) {
                words = substitute($l.weeks + ' <?php echo $wo['lang']['ago'];?>', Math.round(weeks));
            }
            else if (years < 1.5) {
                words = substitute($l.year + ' <?php echo $wo['lang']['ago'];?>', 1);
            }
            else {
                words = substitute($l.years + ' <?php echo $wo['lang']['ago'];?>', Math.round(years));
            }
        }
            



      var separator = $l.wordSeparator || "";
      if ($l.wordSeparator === undefined) { separator = " "; }

      <?php if ($wo['language'] != 'Arabic') { ?>

         return $.trim([prefix, words].join(separator));

      <?php } else { ?>

         return $.trim([prefix, suffix].join(separator));

      <?php } ?>
    },

    parse: function(iso8601) {
      var s = $.trim(iso8601);
      s = s.replace(/\.\d+/,""); // remove milliseconds
      s = s.replace(/-/,"/").replace(/-/,"/");
      s = s.replace(/T/," ").replace(/Z/," UTC");
      s = s.replace(/([\+\-]\d\d)\:?(\d\d)/," $1$2"); // -04:00 -> -0400
      s = s.replace(/([\+\-]\d\d)$/," $100"); // +09 -> +0900
      return new Date(s);
    },
    datetime: function(elem) {
      var iso8601 = $t.isTime(elem) ? $(elem).attr("datetime") : $(elem).attr("title");
      return $t.parse(iso8601);
    },
    isTime: function(elem) {
      // jQuery's `is()` doesn't play well with HTML5 in IE
      return $(elem).get(0).tagName.toLowerCase() === "time"; // $(elem).is("time");
    }
  });

  // functions that can be called via $(el).timeago('action')
  // init is default when no action is given
  // functions are called with context of a single element
  var functions = {
    init: function(){
      var refresh_el = $.proxy(refresh, this);
      refresh_el();
      var $s = $t.settings;
      if ($s.refreshMillis > 0) {
        this._timeagoInterval = setInterval(refresh_el, $s.refreshMillis);
      }
    },
    update: function(time){
      var parsedTime = $t.parse(time);
      $(this).data('timeago', { datetime: parsedTime });
      if($t.settings.localeTitle) $(this).attr("title", parsedTime.toLocaleString());
      refresh.apply(this);
    },
    updateFromDOM: function(){
      $(this).data('timeago', { datetime: $t.parse( $t.isTime(this) ? $(this).attr("datetime") : $(this).attr("title") ) });
      refresh.apply(this);
    },
    dispose: function () {
      if (this._timeagoInterval) {
        window.clearInterval(this._timeagoInterval);
        this._timeagoInterval = null;
      }
    }
  };

  $.fn.timeago = function(action, options) {
    var fn = action ? functions[action] : functions.init;
    if(!fn){
      throw new Error("Unknown function name '"+ action +"' for timeago");
    }
    // each over objects here and call the requested function
    this.each(function(){
      fn.call(this, options);
    });
    return this;
  };

  function refresh() {
    var data = prepareData(this);
    var $s = $t.settings;

    if (!isNaN(data.datetime)) {
      if ( $s.cutoff == 0 || Math.abs(distance(data.datetime)) < $s.cutoff) {
        let tType = '';
        if ($(this).hasClass('notification-time')) {
          tType = 'notification';
        }
        $(this).text(inWords(data.datetime,tType));
      }
    }
    return this;
  }

  function prepareData(element) {
    element = $(element);
    if (!element.data("timeago")) {
      element.data("timeago", { datetime: $t.datetime(element) });
      var text = $.trim(element.text());
      if ($t.settings.localeTitle) {
        element.attr("title", element.data('timeago').datetime.toLocaleString());
      } else if (text.length > 0 && !($t.isTime(element) && element.attr("title"))) {
        element.attr("title", text);
      }
    }
    return element.data("timeago");
  }

  function inWords(date,type) {
    return $t.inWords(distance(date),type);
  }

  function distance(date) {
    return (new Date().getTime() - date.getTime());
  }

  // fix for IE6 suckage
  document.createElement("abbr");
  document.createElement("time");
}));


$(function () {
  setInterval(function () {
    
    if ( $('.ajax-time').length > 0) {
      $('.ajax-time').timeago()
        .removeClass('.ajax-time');
    }
  },
  1000);
});
</script>