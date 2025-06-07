<template>
    <!-- Login Section Begin -->
    <section class="login mt-5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="auth__form">
                        <div class="section-title">
                            <h4>Quên mật khẩu</h4>
                        </div>
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <div class="text-center mt-3">
                                <button type="submit" class="site-btn">Gửi yêu cầu</button>
                                <hr class="style-eight">
                                <p>Bạn mới biết đến ShopNow? <router-link class="primary-color" to="dang-ky">Đăng
                                        kí</router-link></p>
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
// import axios from 'axios'
export default {
    name: 'ForgotPassword',
}
</script>

<style></style>