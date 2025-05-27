import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router'

// Local CSS
import './assets/css/bootstrap.min.css'
import './assets/icons/css/all.min.css'
import './assets/css/jquery-ui.min.css'
import './assets/css/magnific-popup.css'
import './assets/css/owl.carousel.min.css'
import './assets/css/slicknav.min.css'
import './assets/css/style.css'
import './assets/css/fixbs.css'



const app = createApp(App)

const pinia = createPinia()

// Biến toàn cục
app.config.globalProperties.$imageUrl = import.meta.env.VITE_IMAGE_BASE_URL

app.use(pinia)
app.use(router)
app.mount('#app')
