<template>
  <main>
    <div id="toastbox" class="toastbox"></div>

    <!-- Hiệu ứng quả cầu loading -->
    <div v-if="isLoading" class="loading-overlay">
      <div class="bouncing-ball"></div>
    </div>

    <router-view />
    <ScrollToTop />
  </main>
</template>

<script setup>
import ScrollToTop from './components/user/button/ScrollToTop.vue';
import { useLoadingStore } from '@/stores/loading';
import { computed } from 'vue';

const loadingStore = useLoadingStore();
const isLoading = computed(() => loadingStore.isLoading);
</script>

<style>
.loading-overlay {
  position: fixed;
  z-index: 9999;
  background: rgba(255, 255, 255, 0.7);
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Bouncing Ball Animation */
.bouncing-ball {
  width: 20px;
  height: 20px;
  background: #ca1515;
  border-radius: 50%;
  animation: bounce-ball 2s ease-in-out infinite;
  box-shadow: 0 0 20px rgba(202, 21, 21, 0.5);
}

@keyframes bounce-ball {
  0%, 20%, 50%, 80%, 100% {
    transform: translateY(0);
  }
  40% {
    transform: translateY(-30px);
  }
  60% {
    transform: translateY(-15px);
  }
}
</style>
