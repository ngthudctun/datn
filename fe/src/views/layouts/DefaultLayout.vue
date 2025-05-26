<template>
    <div>
      <TheHeader />
      <main>
        <router-view /> <!-- Hiển thị nội dung của từng trang -->
      </main>
      <TheFooter />
    </div>
  </template>
  
  <script>
  import TheHeader from "@/components/user/TheHeader.vue";
  import TheFooter from "@/components/user/TheFooter.vue";
  
  export default {
    components: {
      TheHeader,
      TheFooter,
    },
  };
  </script>
  