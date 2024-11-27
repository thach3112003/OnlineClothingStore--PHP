//Ẩn hiện chi tiết sản phẩm
const chitiet = document.querySelector(".chitiet");
const baoquan = document.querySelector(".baoquan");
const gioithieu = document.querySelector(".gioithieu");
if (chitiet) {
  chitiet.addEventListener("click", function () {
    document.querySelector(
      ".product-content-right-bottom-content-details2"
    ).style.display = "block";
    document.querySelector(
      ".product-content-right-bottom-content-details"
    ).style.display = "none";
    document.querySelector(
      ".product-content-right-bottom-content-details3"
    ).style.display = "none";
  });
}
window.addEventListener("load", function () {
  if (gioithieu) {
    gioithieu.click(); // Tự động kích hoạt sự kiện click vào .chitiet
  }
});
if (baoquan) {
  baoquan.addEventListener("click", function () {
    document.querySelector(
      ".product-content-right-bottom-content-details3"
    ).style.display = "block";
    document.querySelector(
      ".product-content-right-bottom-content-details"
    ).style.display = "none";
    document.querySelector(
      ".product-content-right-bottom-content-details2"
    ).style.display = "none";
  });
}
if (gioithieu) {
  gioithieu.addEventListener("click", function () {
    document.querySelector(
      ".product-content-right-bottom-content-details"
    ).style.display = "block";
    document.querySelector(
      ".product-content-right-bottom-content-details2"
    ).style.display = "none";
  });
  document.querySelector(
    ".product-content-right-bottom-content-details3"
  ).style.display = "none";
}

document
  .querySelector(".product-content-right-bottom-top")
  .addEventListener("click", function () {
    var contentDiv = document.querySelector(
      ".product-content-right-bottom-content-details"
    );
    var readMoreDiv = document.querySelector(".read-more");

    // Toggle hiển thị nội dung
    if (
      readMoreDiv.style.display === "none" ||
      readMoreDiv.style.display === ""
    ) {
      readMoreDiv.style.display = "block";
      contentDiv.classList.add("expanded"); // Mở rộng chiều cao
    } else {
      readMoreDiv.style.display = "none";
      contentDiv.classList.remove("expanded"); // Thu gọn lại
    }
  });
///Big and small img
const bigImg = document.querySelector(".product-content-left-bigImg img");
const smallImg = document.querySelectorAll(
  ".product-content-left-smallImg img"
);
smallImg.forEach(function (imgItem, X) {
  imgItem.addEventListener("click", function () {
    bigImg.src = imgItem.src;
  });
});
document
  .querySelectorAll(".product-content-left-smallImg img")
  .forEach((img) => {
    img.addEventListener("click", function () {
      document.querySelector(".product-content-left-bigImg img").src = this.src;
    });
  });
