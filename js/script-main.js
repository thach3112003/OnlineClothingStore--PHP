document.addEventListener("DOMContentLoaded", function () {
  const itemsliderbar = document.querySelectorAll(".cartegory-left-li"); // Chọn đúng phần tử con của ul
  itemsliderbar.forEach(function (menu) {
    menu.addEventListener("click", function () {
      menu.classList.toggle("block");
    });
  });
});
// Header stiky
const header = document.querySelector(".navbar");
window.addEventListener("scroll", function () {
  x = window.scrollY;
  if (x > 0) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
});
