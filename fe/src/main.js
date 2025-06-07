import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router'
import axios from './axios'
// Local CSS
import './assets/css/bootstrap.min.css'
import './assets/icons/css/all.min.css'
import './assets/css/elegant-icons.css'
import './assets/css/jquery-ui.min.css'
import './assets/css/magnific-popup.css'
import './assets/css/owl.carousel.min.css'
import './assets/css/slicknav.min.css'
import './assets/css/style.css'
import './assets/css/fixbs.css'

// Local JS
import './assets/js/jquery-3.3.1.min.js'
import './assets/js/bootstrap.min.js'
import './assets/js/jquery.magnific-popup.min.js'
import './assets/js/jquery-ui.min.js'
import './assets/js/mixitup.min.js'
import './assets/js/jquery.countdown.min.js'
import './assets/js/jquery.slicknav.js'
import './assets/js/owl.carousel.min.js'
import './assets/js/jquery.nicescroll.min.js'
import './assets/js/main.js'
import './assets/js/additional.js'

const app = createApp(App)

const pinia = createPinia()

// Biến toàn cục
app.config.globalProperties.$imageUrl = import.meta.env.VITE_IMAGE_BASE_URL

/* axios toan cuc */
app.config.globalProperties.$axios = axios;
app.use(pinia)
app.use(router)
app.mount('#app')
