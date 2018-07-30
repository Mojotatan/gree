/**
 * Global variables
 */
"use strict";
var userAgent = navigator.userAgent.toLowerCase(),
  initialDate = new Date(),
  $document = $(document),
  $window = $(window),
  $html = $("html"),
  $body = $("body"),
  isRtl = $html.attr("dir") === "rtl",
  isDesktop = $html.hasClass("desktop"),
  isIE = userAgent.indexOf("msie") !== -1 ? parseInt(userAgent.split("msie")[1], 10) : userAgent.indexOf("trident") !== -1 ? 11 : userAgent.indexOf("edge") !== -1 ? 12 : false,
  isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
  plugins = {
    pointerEvents: isIE < 11 ? "js/pointer-events.min.js" : false,
    rdNavbar: $(".rd-navbar"),
    swiper: $(".swiper-slider"),
    customToggle: $("[data-custom-toggle]"),
  };
/**
 * Initialize All Scripts
 */
$(function () {
  var isNoviBuilder = window.xMode;
  /**
   * Is Mac os
   * @description  add additional class on html if mac os.
   */
  if (navigator.platform.match(/(Mac)/i)) $html.addClass("mac");
  /**
   * RD Navbar
   * @description Enables RD Navbar plugin
   */
  if (plugins.rdNavbar.length) {
    var aliaces, i, j, len, value, values, responsiveNavbar;

    aliaces = ["-", "-sm-", "-md-", "-lg-", "-xl-", "-xxl-"];
    values = [0, 576, 768, 992, 1200, 1600];
    responsiveNavbar = {};

    for (i = j = 0, len = values.length; j < len; i = ++j) {
      value = values[i];
      if (!responsiveNavbar[values[i]]) {
        responsiveNavbar[values[i]] = {};
      }
      if (plugins.rdNavbar.attr('data' + aliaces[i] + 'layout')) {
        responsiveNavbar[values[i]].layout = plugins.rdNavbar.attr('data' + aliaces[i] + 'layout');
      }
      if (plugins.rdNavbar.attr('data' + aliaces[i] + 'device-layout')) {
        responsiveNavbar[values[i]]['deviceLayout'] = plugins.rdNavbar.attr('data' + aliaces[i] + 'device-layout');
      }
      if (plugins.rdNavbar.attr('data' + aliaces[i] + 'hover-on')) {
        responsiveNavbar[values[i]]['focusOnHover'] = plugins.rdNavbar.attr('data' + aliaces[i] + 'hover-on') === 'true';
      }
      if (plugins.rdNavbar.attr('data' + aliaces[i] + 'auto-height')) {
        responsiveNavbar[values[i]]['autoHeight'] = plugins.rdNavbar.attr('data' + aliaces[i] + 'auto-height') === 'true';
      }
      if (plugins.rdNavbar.attr('data' + aliaces[i] + 'stick-up')) {
        responsiveNavbar[values[i]]['stickUp'] = isNoviBuilder ? false : (plugins.rdNavbar.attr('data' + aliaces[i] + 'stick-up') === 'true');
      }
      if (plugins.rdNavbar.attr('data' + aliaces[i] + 'stick-up-offset')) {
        responsiveNavbar[values[i]]['stickUpOffset'] = plugins.rdNavbar.attr('data' + aliaces[i] + 'stick-up-offset');
      }
    }


    plugins.rdNavbar.RDNavbar({
      anchorNav: !isNoviBuilder,
      stickUpClone: (plugins.rdNavbar.attr("data-stick-up-clone") && !isNoviBuilder) ? plugins.rdNavbar.attr("data-stick-up-clone") === 'true' : false,
      responsive: responsiveNavbar,
      callbacks: {
        onStuck: function () {
          var navbarSearch = this.$element.find('.rd-search input');

          if (navbarSearch) {
            navbarSearch.val('').trigger('propertychange');
          }
        },
        onDropdownOver: function () {
          return !isNoviBuilder;
        },
        onUnstuck: function () {
          if (this.$clone === null)
            return;

          var navbarSearch = this.$clone.find('.rd-search input');

          if (navbarSearch) {
            navbarSearch.val('').trigger('propertychange');
            navbarSearch.trigger('blur');
          }

        }
      }
    });


    if (plugins.rdNavbar.attr("data-body-class")) {
      document.body.className += ' ' + plugins.rdNavbar.attr("data-body-class");
    }
  }




  /**
   * Custom Toggles
   */
  if (plugins.customToggle.length) {
    for (var i = 0; i < plugins.customToggle.length; i++) {
      var $this = $(plugins.customToggle[i]);

      $this.on('click', $.proxy(function (event) {
        event.preventDefault();

        var $ctx = $(this);
        $($ctx.attr('data-custom-toggle')).add(this).toggleClass('active');
      }, $this));

      if ($this.attr("data-custom-toggle-hide-on-blur") === "true") {
        $body.on("click", $this, function (e) {
          if (e.target !== e.data[0]
            && $(e.data.attr('data-custom-toggle')).find($(e.target)).length
            && e.data.find($(e.target)).length === 0) {
            $(e.data.attr('data-custom-toggle')).add(e.data[0]).removeClass('active');
          }
        })
      }

      if ($this.attr("data-custom-toggle-disable-on-blur") === "true") {
        $body.on("click", $this, function (e) {
          if (e.target !== e.data[0] && $(e.data.attr('data-custom-toggle')).find($(e.target)).length === 0 && e.data.find($(e.target)).length === 0) {
            $(e.data.attr('data-custom-toggle')).add(e.data[0]).removeClass('active');
          }
        })
      }
    }
  }

});
