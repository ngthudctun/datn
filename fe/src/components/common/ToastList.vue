<!-- src/components/common/ToastList.vue -->
<template>
  <div class="toast-container">
    <div
      v-for="toast in toasts"
      :key="toast.id"
      class="toast"
      :class="'toast-' + toast.type"
    >
      <strong>{{ toast.title }}</strong>
      <p>{{ toast.message }}</p>
    </div>
  </div>
</template>

<script setup>
import { useToast } from '@/assets/js/toast.js'
const { toasts } = useToast()
</script>

<style scoped>
.toast-container {
  position: fixed;
  top: 20px;
  right: 20px;
  z-index: 9999;
}
.toast {
  background: #fff;
  padding: 10px 15px;
  margin-bottom: 10px;
  border-left: 5px solid;
  border-radius: 5px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  min-width: 250px;
}
.toast-success { border-color: #28a745; }
.toast-error { border-color: #dc3545; }
.toast-info { border-color: #17a2b8; }
.toast-warning { border-color: #ffc107; }
</style>
