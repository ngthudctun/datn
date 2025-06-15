<template>
  <section class="login mt-5">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-6 col-md-6">
          <div class="auth__form">
            <div class="section-title">
              <h4>Quên mật khẩu</h4>
            </div>
            <form @submit.prevent="handleSubmit">
              <div class="form-group">
                <input
                  type="text"
                  placeholder="Email"
                  v-model="email"
                  @input="validateEmail"
                  :class="{ 'is-invalid': emailError }"
                  aria-describedby="email-error"
                />
                <div v-if="emailError" class="invalid-feedback" id="email-error">
                  {{ emailError }}
                </div>
              </div>
              <div class="text-center mt-3">
                <button
                  type="submit"
                  class="site-btn"
                  :disabled="isLoading"
                >
                  <span v-if="isLoading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  {{ isLoading ? 'Đang xử lý...' : 'Gửi yêu cầu' }}
                </button>
                <hr class="style-eight" />
                <p>
                  Bạn mới biết đến ShopNow?
                  <router-link class="primary-color" to="/dang-ky">Đăng ký</router-link>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { useShowtoast } from '@/assets/js/toast';

const toastStore = useShowtoast();

const email = ref('');
const emailError = ref('');
const isLoading = ref(false);

const validateEmail = () => {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!email.value) {
    emailError.value = 'Vui lòng nhập email!';
  } else if (!emailRegex.test(email.value)) {
    emailError.value = 'Email không hợp lệ!';
  } else {
    emailError.value = '';
  }
};

const handleSubmit = async () => {
  validateEmail();
  if (emailError.value) {
    return; // Chỉ hiển thị lỗi trong invalid-feedback, không toast
  }

  isLoading.value = true;
  try {
    const response = await axios.get('/api/forgot-password', {
      email: email.value,
    });
    toastStore.toast({
      title: 'Thành công',
      message: response.data.message || `Yêu cầu đặt lại mật khẩu đã được gửi đến ${email.value}`,
      type: 'success',
    });
    email.value = ''; // Reset form
    emailError.value = ''; // Reset lỗi
  } catch (error) {
    toastStore.toast({
      title: 'Lỗi',
      message: error.response?.data?.message || 'Không thể gửi yêu cầu, vui lòng thử lại sau!',
      type: 'error',
    });
  } finally {
    isLoading.value = false;
  }
};
</script>

<style scoped>
.form-group {
  margin-bottom: 1rem;
}

.is-invalid {
  border-color: #dc3545;
}

.invalid-feedback {
  color: #dc3545;
  font-size: 12px;
  display: block;
  margin-top: 5px;
}

.site-btn:disabled {
  background-color: #ccc;
  cursor: not-allowed;
}

/* Đảm bảo spinner hiển thị đúng */
.site-btn .spinner-border {
  margin-right: 5px;
}
</style>