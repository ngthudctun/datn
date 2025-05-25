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
