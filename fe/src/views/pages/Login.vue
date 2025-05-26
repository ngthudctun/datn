<template>
    <!-- Login Section Begin -->
    <section class="login mt-5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="auth__form">
                        <div class="section-title">
                            <h4>Đăng nhập</h4>
                        </div>
                        <form action="#">
                            <input type="text" placeholder="Email, số điện thoại">
                            <input type="password" placeholder="Mật khẩu">
                            <a href="">Quên mật khẩu?</a>
                            <div class="text-center mt-3">
                                <button type="submit" class="site-btn">Đăng nhập</button>
                                <hr class="style-eight">
                                <div class="auth__social">
                                    <a href="#"><i class="fa-brands fa-google"></i> - Đăng nhập bằng Google</a>
                                </div>
                                <p>Bạn mới biết đến ShopNow? <a class="primary-color" href="register.html">Đăng kí</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section End -->
</template>

<script>
export default {
    name: 'Login'
}
</script>

<style></style>