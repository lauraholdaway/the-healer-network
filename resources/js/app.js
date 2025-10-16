import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router'
import { useAuthStore } from './stores/auth'
import NProgress from 'nprogress'
import 'nprogress/nprogress.css'

const app = createApp(App)
const pinia = createPinia()
app.use(pinia)
app.use(router)

const auth = useAuthStore()
auth.initialize() // ✅ restore user on refresh

// Start progress on route change start
router.beforeEach((to, from, next) => {
    NProgress.start()
    next()
})

// Stop progress on route complete
router.afterEach(() => {
    NProgress.done()
})
app.mount('#app')
