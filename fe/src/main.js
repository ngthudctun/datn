// import './assets/css/color.min.css';

import router from "./router"; // Import Vue Router
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'


/* axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`; */   //auto gửi token

const app = createApp(App);
app.config.globalProperties.$imagebaseUrl = import.meta.env.VITE_IMAGE_BASE_URL; 
//base url images
const pinia = createPinia()

app.use(pinia);
app.use(router); // Kích hoạt Vue Router
app.mount("#app");
