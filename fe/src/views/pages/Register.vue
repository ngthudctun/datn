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
                            <div class="form-group">
                                <label for="username" class="sr-only">Họ và tên</label>
                                <input 
                                    type="text" 
                                    id="username" 
                                    placeholder="Họ và tên" 
                                    v-model.trim="form.username"
                                    :class="{ 'is-invalid': errors.username }"
                                    aria-describedby="username-error"
                                >
                                <div v-if="errors.username" class="invalid-feedback" id="username-error">
                                    {{ errors.username }}
                                </div>
                            </div>
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
                            <div class="form-group">
                                <label for="password_confirmation" class="sr-only">Xác nhận mật khẩu</label>
                                <input 
                                    type="password" 
                                    id="password_confirmation" 
                                    placeholder="Xác nhận mật khẩu" 
                                    v-model.trim="form.password_confirmation"
                                    :class="{ 'is-invalid': errors.password_confirmation }"
                                    aria-describedby="password_confirmation-error"
                                >
                                <div v-if="errors.password_confirmation" class="invalid-feedback" id="password_confirmation-error">
                                    {{ errors.password_confirmation }}
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <button 
                                    type="submit" 
                                    class="site-btn" 
                                    :disabled="isLoading"
                                >
                                    <span v-if="isLoading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    {{ isLoading ? 'Đang xử lý...' : 'Đăng ký' }}
                                </button>
                                <hr class="style-eight">
                                <div class="auth__social">
                                    <a href="#"><i class="fa-brands fa-google"></i> - Đăng ký bằng Google</a>
                                </div>
                                <p class="text-dark">Bằng việc đăng ký, bạn đã đồng ý với ShopNow về <br>
                                    <router-link class="primary-color" to="/dieu-khoan-dich-vu">điều khoản dịch vụ</router-link>
                                    & <router-link class="primary-color" to="/chinh-sach-bao-mat">chính sách bảo mật</router-link>
                                </p>
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
import axios from 'axios'

export default {
    name: 'Register',
    data() {
        return {
            form: {
                username: '',
                email: '',
                password: '',
                password_confirmation: ''
            },
            errors: {
                username: '',
                email: '',
                password: '',
                password_confirmation: ''
            },
            isLoading: false
        }
    },
    methods: {
        validateForm() {
            this.errors = {
                username: '',
                email: '',
                password: '',
                password_confirmation: ''
            };
            let isValid = true;

            // Validate username
            if (!this.form.username) {
                this.errors.username = 'Vui lòng nhập họ và tên.';
                isValid = false;
            } else if (this.form.username.length < 2 || this.form.username.length > 255) {
                this.errors.username = 'Họ và tên phải từ 2 đến 255 ký tự.';
                isValid = false;
            } else {
                const usernameRegex = /^[a-zA-Z\sàáảãạăắằẳẵặâấầẩẫậèéẻẽẹêếềểễệìíỉĩịòóỏõọôốồổỗộơớờởỡợùúủũụưứừửữựỳýỷỹỵ]+$/;
                if (!usernameRegex.test(this.form.username)) {
                    this.errors.username = 'Họ và tên chỉ chứa chữ cái và khoảng trắng.';
                    isValid = false;
                }
            }

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

            // Validate password confirmation
            if (!this.form.password_confirmation) {
                this.errors.password_confirmation = 'Vui lòng xác nhận mật khẩu.';
                isValid = false;
            } else if (this.form.password !== this.form.password_confirmation) {
                this.errors.password_confirmation = 'Mật khẩu xác nhận không khớp.';
                isValid = false;
            }

            return isValid;
        },
        async register() {
            if (!this.validateForm()) {
                return;
            }

            this.isLoading = true;
            try {
                const response = await axios.post('/api/register', this.form);
                alert('Đăng ký thành công!');
                this.$router.push('/dang-nhap');
            } catch (error) {
                if (error.response && error.response.data && error.response.data.errors) {
                    Object.keys(error.response.data.errors).forEach(key => {
                        this.errors[key] = error.response.data.errors[key][0];
                    });
                    alert('Có lỗi xảy ra khi đăng ký.');
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