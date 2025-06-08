<template>
    <!-- Register Section Begin -->
    <section class="register mt-5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="auth__form">
                        <div class="section-title">
                            <h4>Đăng ký</h4>
                        </div>
                        <form action="#">
                            <input type="text" placeholder="Email, Số điện thoại">
                            <input type="password" placeholder="Mật khẩu">
                            <input type="password" placeholder="Xác nhận mật khẩu">
                            <div class="text-center mt-3">
                                <button type="submit" class="site-btn">Đăng ký</button>
                                <hr class="style-eight">
                                <div class="auth__social">
                                    <a href="#"><i class="fa-brands fa-google"></i> - Đăng ký bằng Google</a>
                                </div>
                                <p class="text-dark">Bằng việc đăng ký, bạn đã đồng ý với ShopNow về <br><router-link class="primary-color" to="/dieu-khoan-dich-vu">điều khoản dịch vụ</router-link> & <router-link class="primary-color" to="/chinh-sach-bao-mat">chính sách bảo mật</router-link></p>
                                <p>Bạn đã có tài khoản? <router-link class="primary-color" to="/dang-nhap">Đăng nhập</router-link></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Register Section End -->
</template>

<script>
export default {
    name: 'Register'
}
</script>

<style></style>