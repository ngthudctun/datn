<template>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <router-link to="/"><img :src="$imageUrl + 'logo/logo.png'" alt="logo" heigh="31"/></router-link>
                        </div>
                        <p>Mục tiêu mang đến trải nghiệm mua sắm nhanh chóng, dễ dàng và tin cậy. Chúng tôi tập trung cung cấp sản phẩm chất lượng với giá tốt nhất, dịch vụ giao hàng nhanh và chính sách chăm sóc khách hàng linh hoạt, giúp bạn mua sắm an tâm và tiết kiệm thời gian. ShopNow cam kết luôn đặt lợi ích và sự hài lòng của khách hàng làm trọng tâm trong mọi hoạt động.</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-5">
                    <div class="footer__widget">
                        <h6>ShopNow</h6>
                        <ul>
                            <li><a href="#">Về ShopNow</a></li>
                            <li><a href="#">Điều Khoản ShopNow</a></li>
                            <li><a href="#">Chính Sách Bảo Mật</a></li>
                            <li><a href="#">ShopNow Blog</a></li>
                            <li><a href="#">Liên hệ ShopNow</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="footer__widget">
                        <h6>Tài khoản</h6>
                        <ul>
                            <li><a href="#">Tài khoản của tôi</a></li>
                            <li><a href="#">Đơn hàng</a></li>
                            <li><a href="#">Thanh toán</a></li>
                            <li><a href="#">Yêu thích</a></li>
                            <li><a href="#">Khuyến mãi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-8">
                    <div class="footer__newslatter">
                        <h6>Theo dõi ShopNow</h6>
                        <div class="footer__social">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright__text">
                        <p>
                            &copy; {{ new Date().getFullYear() }} ShopNow. Tất cả các quyền được bảo lưu.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {};
</script>

<style scoped>
/* Thêm style nếu cần */
</style>
