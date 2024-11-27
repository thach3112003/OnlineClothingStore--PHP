<!---------------- footer ------------------->
<div class="footer-top">
    <li>
        <a href=""><img src="../image/img-congthuong.png" alt="" /></a>
    </li>
    <li><a href="">Liên hệ</a></li>
    <li><a href="">Tuyển dụng</a></li>
    <li><a href="">Giới thiệu</a></li>
    <li>
        <a href="" class="fa fa-facebook-f"></a>
        <a href="" class="fa fa-twitter"></a>
        <a href="" class="fa fa-youtube"></a>
    </li>
</div>

<div class="footer-center">
    <p>
        Công ty Đồ si Anh Tú với số đăng kí kinh doanh: 08 676767 75 <br />
        Địa chỉ kinh doanh: 55/22 đường số 12, P. Bình Hưng Hòa A, Q.Bình Tân,
        Hồ Chí Minh, Việt Nam - 08 67676775 <br />
        Đặt hàng online: <span>08 67676775.</span>
    </p>
</div>
<div class="footer-bottom">
    <p>@Dosianhtu All right reserved</p>
</div>
</body>
<script>
    const header = document.querySelector(".navbar");
    window.addEventListener("scroll", function() {
        x = window.scrollY;
        if (x > 0) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    });
</script>

</html>