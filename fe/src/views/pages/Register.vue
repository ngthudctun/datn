<template>
    <!-- Register Section Begin -->
    <section class="register mt-5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="auth__form">
                        <div class="section-title">
                            <h4>Đăng kí</h4>
                        </div>
                        <form action="#">
                            <input type="text" placeholder="Email, Số điện thoại">
                            <input type="password" placeholder="Mật khẩu">
                            <input type="password" placeholder="Xác nhận mật khẩu">
                            <div class="text-center mt-3">
                                <button type="submit" class="site-btn">Đăng kí</button>
                                <hr class="style-eight">
                                <div class="auth__social">
                                    <a href="#"><i class="fa-brands fa-google"></i> - Đăng kí bằng Google</a>
                                </div>
                                <p class="text-dark">Bằng việc đăng kí, bạn đã đồng ý với ShopNow về <br><a class="primary-color" href="terms.html">điều khoản dịch vụ</a> & <a class="primary-color" href="privacy.html">chính sách bảo mật</a></p>
                                <p>Bạn đã có tài khoản? <a class="primary-color" href="login.html">Đăng nhập</a></p>
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