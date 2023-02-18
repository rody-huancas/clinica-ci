$(function () {
  "use strict";

  $(window).resize(function () {
    minimizeMenu();
  });

  minimizeMenu();

  function minimizeMenu() {
    if (
      window.matchMedia("(min-width: 992px)").matches &&
      window.matchMedia("(max-width: 1299px)").matches
    ) {
      // show only the icons and hide left menu label by default
      $(".menu-item-label,.menu-item-arrow").addClass(
        "op-lg-0-force d-lg-none"
      );
      $("body").addClass("collapsed-menu");
      $(".show-sub + .br-menu-sub").slideUp();
    } else if (
      window.matchMedia("(min-width: 1300px)").matches &&
      !$("body").hasClass("collapsed-menu")
    ) {
      $(".menu-item-label,.menu-item-arrow").removeClass(
        "op-lg-0-force d-lg-none"
      );
      $("body").removeClass("collapsed-menu");
      $(".show-sub + .br-menu-sub").slideDown();
    }
  }
});
