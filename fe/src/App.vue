<template>
  <main>
    <div id="toastbox" style="height: 100px" class="toastbox"></div>
    <router-view />
  </main>
</template>

<script setup>
import { RouterView } from 'vue-router';
import axios from "axios";
</script>
