<template>
  <main>
  <ToastList />
    <router-view /> 
  </main>
</template>

<script setup>
import ToastList from "@/components/common/ToastList.vue"
import { RouterView } from 'vue-router';
import axios from "axios";
</script>
