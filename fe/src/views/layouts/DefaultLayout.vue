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
const slug = computed(() => route.params.slug)

const isHome = computed(() => route.path === '/')

const breadcrumbItems = computed(() => {
  const path = route.path
  const id = route.params.id

  let breadcrumbs = [{ label: '', url: '/' }]

  switch (true) {
    case path.startsWith('/cua-hang'):
      breadcrumbs.push({ label: 'Cửa hàng', url: '/cua-hang' });
      if (route.path.includes('/cua-hang/') && slug.value) {
  breadcrumbs.push({ label: slug.value });
}
      break;

    case path.startsWith('/chi-tiet-san-pham/') && !!id:
      breadcrumbs.push(
        { label: 'Cửa hàng', url: '/cua-hang' },
        { label: `${id}` }
      )
      break

    case path.startsWith('/lien-he'):
      breadcrumbs.push({ label: 'Liên hệ', url: '/lien-he' })
      break

    case path.startsWith('/gio-hang'):
      breadcrumbs.push({ label: 'Giỏ hàng', url: '/gio-hang' })
      break

    case path.startsWith('/thanh-toan'):
      breadcrumbs.push({ label: 'Thanh toán', url: '/thanh-toan' })
      break

    case path.startsWith('/bai-viet'):
      breadcrumbs.push({ label: 'Bài viết', url: '/bai-viet' })
      break

    case path.startsWith('/blog/') && !!id:
      breadcrumbs.push(
        { label: 'Blog', url: '/blog' },
        { label: `Bài viết ${id}` }
      )
      break

    default:
      breadcrumbs.push({ label: '' })
      break
  }

  return breadcrumbs
})
</script>

