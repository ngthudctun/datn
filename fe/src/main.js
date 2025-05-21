import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router'



const app = createApp(App)

const pinia = createPinia()

// Biến toàn cục
app.config.globalProperties.$imageUrl = import.meta.env.VITE_IMAGE_BASE_URL

app.use(pinia)
app.use(router)
app.mount('#app')
