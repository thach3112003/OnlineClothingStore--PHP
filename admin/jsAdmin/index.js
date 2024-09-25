document.addEventListener("DOMContentLoaded", function () {
  const menuToggle = document.getElementById("menu-toggle");
  const menuSlider = document.querySelector(".menu-slider");

  if (menuToggle) {
    menuToggle.addEventListener("click", function () {
      menuSlider.classList.toggle("active");
    });
  }
});
