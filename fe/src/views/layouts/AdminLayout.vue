<template>
  <div>
    <TheHeader />
    <main>
      <router-view />
    </main>
    <TheFooter />
  </div>
</template>

<script>
import "@/assets/css/admincss/css/styles.min.css";
import TheHeader from "@/components/admin/AdminLayout/TheHeader.vue";
import TheFooter from "@/components/admin/AdminLayout/TheFooter.vue";

export default {
  components: {
    TheHeader,
    TheFooter
  }
}
</script>
