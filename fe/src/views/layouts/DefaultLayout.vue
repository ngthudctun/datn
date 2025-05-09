<template>
    <div>
      <TheHeader />
      <main>
        <router-view /> <!-- Hiển thị nội dung của từng trang -->
      </main>
    </div>
  </template>
  
  <script>
  import TheHeader from "@/components/TheHeader.vue";
  
  export default {
    components: {
      TheHeader,
    },
  };
  </script>
  