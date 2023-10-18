import $ from "jquery";

class NavMenu {
  constructor() {
    this.navMobileMenu = $(".mobile-menu");
    this.document = $(document);
    this.overlay = $(".overlay");
    this.header = $(".header");
    this.events();
  }

  //EVENT
  events() {
    this.document.on("click", this.navMobileMenuClickHandler.bind(this));
  }

  //MODULES
  navMobileMenuClickHandler(event) {
    if (
      !event.target.closest(".mobile-menu") &&
      this.header.hasClass("active")
    ) {
      this.header.removeClass("active");
      this.overlay.addClass("hidden");
    } else if (!!event.target.closest(".mobile-menu")) {
      this.header.toggleClass("active");
      this.overlay.toggleClass("hidden");
    }
  }
}

export default NavMenu;
