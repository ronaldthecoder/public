import $ from "jquery";

class SmoothScroll {
  constructor() {
    this.link = $("#menu-item-26 a");
    this.view = $("#services-section");
    this.events();
  }

  events() {
    this.link.on("click", this.smoothScrollHandler.bind(this));
  }

  //MODULES
  smoothScrollHandler() {
    this.view.scrollIntoView({
      behavior: "smooth",
      block: "center",
    });
  }
}

export default SmoothScroll;
