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
                        <form @submit.prevent="register">
                            <input type="text" placeholder="Email, Số điện thoại" v-model="form.email">
                            <input type="password" placeholder="Mật khẩu" v-model="form.password">
                            <input type="password" placeholder="Xác nhận mật khẩu" v-model="form.password_confirmation">
                            <div class="text-center mt-3">
                                <button type="submit" class="site-btn">Đăng ký</button>
                                <hr class="style-eight">
                                <div class="auth__social">
                                    <a href="#"><i class="fa-brands fa-google"></i> - Đăng ký bằng Google</a>
                                </div>
                                <p class="text-dark">Bằng việc đăng ký, bạn đã đồng ý với ShopNow về <br><router-link
                                        class="primary-color" to="/dieu-khoan-dich-vu">điều khoản dịch vụ</router-link>
                                    & <router-link class="primary-color" to="/chinh-sach-bao-mat">chính sách bảo
                                        mật</router-link></p>
                                <p>Bạn đã có tài khoản? <router-link class="primary-color" to="/dang-nhap">Đăng
                                        nhập</router-link></p>
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
import axios from 'axios'

export default {
    name: 'Register',
    data() {
        return {
            form: {
                email: '',
                password: '',
                password_confirmation: ''
            },
            errors: null
        }
    },
    methods: {
        async register() {
            try {
                const response = await $axios.post('register', this.form);

                // Xử lý sau khi đăng ký thành công (ví dụ: lưu token, chuyển hướng)
                alert('Đăng ký thành công!');
                // this.$router.push('/dang-nhap'); // hoặc trang chủ

            } catch (error) {
                if (error.response && error.response.data) {
                    this.errors = error.response.data.errors;
                    alert('Có lỗi xảy ra khi đăng ký.');
                } else {
                    alert('Lỗi kết nối server.');
                }
            }
        }
    }
}
</script>


<style></style>