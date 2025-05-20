<template>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="./index.html"><img :src="$imagebaseUrl + 'logo/logo.png'" alt="logo" /></a>
                        </div>
                        <p>Mục tiêu mang đến trải nghiệm mua sắm nhanh chóng, dễ dàng và tin cậy. Chúng tôi tập trung cung cấp sản phẩm chất lượng với giá tốt nhất, dịch vụ giao hàng nhanh và chính sách chăm sóc khách hàng linh hoạt, giúp bạn mua sắm an tâm và tiết kiệm thời gian. ShopNow cam kết luôn đặt lợi ích và sự hài lòng của khách hàng làm trọng tâm trong mọi hoạt động.</p>
                        <div class="footer__payment">
                            <a href="#"><img :src="$imagebaseUrl + 'payment/payment-1.png'" alt="payment" /></a>
                            <a href="#"><img :src="$imagebaseUrl + 'payment/payment-2.png'" alt="payment" /></a>
                            <a href="#"><img :src="$imagebaseUrl + 'payment/payment-3.png'" alt="payment" /></a>
                            <a href="#"><img :src="$imagebaseUrl + 'payment/payment-4.png'" alt="payment" /></a>
                            <a href="#"><img :src="$imagebaseUrl + 'payment/payment-5.png'" alt="payment" /></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-5">
                    <div class="footer__widget">
                        <h6>ShopNow Việt Nam</h6>
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
                        <h6>Account</h6>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Orders Tracking</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Wishlist</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-8">
                    <div class="footer__newslatter">
                        <h6>NEWSLETTER</h6>
                        <form action="#">
                            <input type="text" placeholder="Email" />
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <div class="footer__copyright__text">
                        <p>
                            Copyright &copy; {{ new Date().getFullYear() }} All rights reserved | This template is made
                            with
                            <i class="fa fa-heart" aria-hidden="true"></i> by
                            <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p>
                    </div>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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
