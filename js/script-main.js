document.addEventListener("DOMContentLoaded", function () {
  // Xử lý các phần tử trong itemsliderbar
  const itemsliderbar = document.querySelectorAll(".cartegory-left-li");
  itemsliderbar.forEach(function (menu) {
    menu.addEventListener("click", function () {
      menu.classList.toggle("block");
    });
  });

  // Xử lý header sticky
  const navbarHeader = document.querySelector(".navbar");
  if (navbarHeader) {
    // Kiểm tra nếu navbarHeader tồn tại
    window.addEventListener("scroll", function () {
      const x = window.scrollY;
      if (x > 0) {
        navbarHeader.classList.add("sticky");
      } else {
        navbarHeader.classList.remove("sticky");
      }
    });
  }
});
