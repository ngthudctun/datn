<template>
  <form>
    <div ref="slider" class="my-4"></div>
    <p>Khoảng giá: {{ min }}đ → {{ max }}đ</p><br>
    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
  </form>
</template>
<style>
.noUi-connect {
  background: #0051e8; /* Màu vàng */
}
</style>
<script>
export default {
  data() {
    return {
      min: 0,
      max: 1000,
    };
  },
  mounted() {
    // Dùng window.noUiSlider từ CDN
    window.noUiSlider.create(this.$refs.slider, {
      start: [200, 800],
      connect: true,
      range: {
        min: 0,
        max: 1000,
      },
      step: 10,
      tooltips: true,
      format: {
        to: (value) => Math.round(value),
        from: (value) => Number(value),
      },
    });

    this.$refs.slider.noUiSlider.on("update", (values) => {
      this.min = values[0];
      this.max = values[1];
    });
  },
};
</script>