import Glide from "@glidejs/glide";

class TestimonySlider {
  constructor() {
    if (document.querySelector(".testimony-section")) {
      // count how many slides there are
      const dotCount = document.querySelectorAll(".glide__slide").length;

      // Generate the HTML for the navigation dots
      let dotHTML = "";
      for (let i = 0; i < dotCount; i++) {
        dotHTML += `<button class="glide__bullet" data-glide-dir="=${i}"></button>`;
      }

      // Add the dots HTML to the DOM
      document
        .querySelector(".glide__bullets")
        .insertAdjacentHTML("beforeend", dotHTML);

      // Actually initialize the glide / slider script
      var glide = new Glide(".testimony-section", {
        type: "carousel",
        perView: 2,
        gap: 50,
        breakpoints: {
          1273: {
            perView: 1,
          },
        },
        // autoplay: 3000,
      });
      glide.mount();
    }
  }
}

export default TestimonySlider;
