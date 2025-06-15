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
                        <form @submit.prevent="login">
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input 
                                    type="text" 
                                    id="email" 
                                    placeholder="Email" 
                                    v-model.trim="form.email"
                                    :class="{ 'is-invalid': errors.email }"
                                    aria-describedby="email-error"
                                >
                                <div v-if="errors.email" class="invalid-feedback" id="email-error">
                                    {{ errors.email }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Mật khẩu</label>
                                <input 
                                    type="password" 
                                    id="password" 
                                    placeholder="Mật khẩu" 
                                    v-model.trim="form.password"
                                    :class="{ 'is-invalid': errors.password }"
                                    aria-describedby="password-error"
                                >
                                <div v-if="errors.password" class="invalid-feedback" id="password-error">
                                    {{ errors.password }}
                                </div>
                            </div>
                            <div class="text-right mb-3">
                                <router-link to="/quen-mat-khau">Quên mật khẩu?</router-link>
                            </div>
                            <div class="text-center mt-3">
                                <button 
                                    type="submit" 
                                    class="site-btn" 
                                    :disabled="isLoading"
                                >
                                    <span v-if="isLoading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    {{ isLoading ? 'Đang xử lý...' : 'Đăng nhập' }}
                                </button>
                                <hr class="style-eight">
                                <div class="auth__social">
                                    <a href="#"><i class="fa-brands fa-google"></i> - Đăng nhập bằng Google</a>
                                </div>
                                <p>Bạn mới biết đến ShopNow? 
                                    <router-link class="primary-color" to="/dang-ky">Đăng ký</router-link>
                                </p>
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
import axios from 'axios'

export default {
    name: 'Login',
    data() {
        return {
            form: {
                email: '',
                password: ''
            },
            errors: {
                email: '',
                password: ''
            },
            isLoading: false
        }
    },
    methods: {
        validateForm() {
            this.errors = {
                email: '',
                password: ''
            };
            let isValid = true;

            // Validate email
            if (!this.form.email) {
                this.errors.email = 'Vui lòng nhập email.';
                isValid = false;
            } else {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                const phoneRegex = /^\+?\d{10,12}$/;
                if (!emailRegex.test(this.form.email) && !phoneRegex.test(this.form.email)) {
                    this.errors.email = 'Vui lòng nhập email hợp lệ.';
                    isValid = false;
                }
            }

            // Validate password
            if (!this.form.password) {
                this.errors.password = 'Vui lòng nhập mật khẩu.';
                isValid = false;
            } else if (this.form.password.length < 8) {
                this.errors.password = 'Mật khẩu phải có ít nhất 8 ký tự.';
                isValid = false;
            }

            return isValid;
        },
        async login() {
            // Reset errors and validate form
            if (!this.validateForm()) {
                return;
            }

            this.isLoading = true;
            try {
                const response = await axios.post('/api/login', this.form);
                alert('Đăng nhập thành công!');
                // Lưu token hoặc thông tin người dùng nếu cần
                // Ví dụ: localStorage.setItem('token', response.data.token);
                this.$router.push('/'); // Chuyển hướng đến trang chủ
            } catch (error) {
                if (error.response && error.response.data && error.response.data.errors) {
                    Object.keys(error.response.data.errors).forEach(key => {
                        this.errors[key] = error.response.data.errors[key][0];
                    });
                    alert('Có lỗi xảy ra khi đăng nhập.');
                } else {
                    alert('Lỗi kết nối server.');
                }
            } finally {
                this.isLoading = false;
            }
        }
    }
}
</script>

<style scoped>
</style>