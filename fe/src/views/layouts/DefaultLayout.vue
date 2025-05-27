<template>
  <div>
    <TheHeader />
    <Breadcrumb v-if="!isHome" :items="breadcrumbItems" />
    <main>
      <router-view />
    </main>
    <TheFooter />
  </div>
</template>
<script setup>
import { computed } from 'vue'
import { useRoute } from 'vue-router'
import TheHeader from "@/components/user/TheHeader.vue"
import Breadcrumb from "@/components/user/Breadcrumb.vue"
import TheFooter from "@/components/user/TheFooter.vue"

const route = useRoute()

const isHome = computed(() => route.path === '/')

const breadcrumbItems = computed(() => {
  const path = route.path
  const id = route.params.id

  if (path === '/') {
    return [{ label: 'Trang chủ' }]
  } else if (path.startsWith('/cua-hang')) {
    return [
      { label: 'Trang chủ', url: '/' },
      { label: 'Cửa hàng', url: '/cua-hang' }
    ]
  } else if (path.startsWith('/chi-tiet-san-pham/') && id) {
    return [
      { label: 'Trang chủ', url: '/' },
      { label: 'Cửa hàng', url: '/cua-hang' },
      { label: `${id}` }
    ]
  } else if (path.startsWith('/blog/') && id) {
    return [
      { label: 'Trang chủ', url: '/' },
      { label: 'Blog', url: '/blog' },
      { label: `Bài viết ${id}` }
    ]
  }

  return [{ label: 'Trang chủ', url: '/' }, { label: '' }]
})
</script>
  
  <script>
import TheHeader from "@/components/user/TheHeader.vue";
import TheFooter from "@/components/user/TheFooter.vue";

export default {
  components: {
    TheHeader,
    TheFooter,
  },
};

// Local CSS

import "@/assets/css/bootstrap.min.css";
import "@/assets/css/font-awesome.min.css";
import "@/assets/css/elegant-icons.css";
import "@/assets/css/jquery-ui.min.css";
import "@/assets/css/magnific-popup.css";
import "@/assets/css/owl.carousel.min.css";
import "@/assets/css/slicknav.min.css";
import "@/assets/css/style.css";
import "@/assets/css/fixbs.css";

// Local JS
import "@/assets/js/jquery-3.3.1.min.js";
import "@/assets/js/bootstrap.min.js";
import "@/assets/js/jquery.magnific-popup.min.js";
import "@/assets/js/jquery-ui.min.js";
import "@/assets/js/mixitup.min.js";
import "@/assets/js/jquery.countdown.min.js";
import "@/assets/js/jquery.slicknav.js";
import "@/assets/js/owl.carousel.min.js";
import "@/assets/js/jquery.nicescroll.min.js";
import "@/assets/js/main.js";
import "@/assets/js/additional.js";
</script>
