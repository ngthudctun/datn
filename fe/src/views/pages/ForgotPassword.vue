<template>
  <section class="login mt-5">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-6 col-md-6">
          <div class="auth__form">
            <div class="section-title">
              <h4>Quên mật khẩu</h4>
            </div>
            <form @submit.prevent="notify">
              <input type="text" placeholder="Email" v-model="email" />
              <div class="text-center mt-3">
                <button type="submit" class="site-btn">Gửi yêu cầu</button>
                <hr class="style-eight" />
                <p>
                  Bạn mới biết đến ShopNow?
                  <router-link class="primary-color" to="/dang-ky">Đăng ký</router-link>
                </p>
              </div>
              <notifications group="foo" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'ForgotPassword',
  data() {
    return {
      email: ''
    };
  },
  methods: {
    notify() {
      if (!this.email) {
        this.$notify({
          group: 'foo',
          title: 'Lỗi',
          text: 'Vui lòng nhập email!',
          type: 'error'
        });
        return;
      }

      // Tạm thời giả lập gửi yêu cầu
      this.$notify({
        group: 'foo',
        title: 'Thành công',
        text: `Yêu cầu đặt lại mật khẩu đã được gửi đến ${this.email}`,
        type: 'success'
      });

      // TODO: gửi request qua axios nếu muốn
    }
  }
};
</script>

<style scoped>
/* Tuỳ chỉnh thêm nếu cần */
</style>
