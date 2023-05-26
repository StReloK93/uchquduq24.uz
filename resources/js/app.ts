import { useAuthStore } from './store/useAuthStore'
import {createApp} from 'vue'
import App from './components/App.vue'
import { createPinia } from 'pinia'
import router from './router'



const pinia = createPinia()
const app = createApp(App)
app.use(pinia)

const store = useAuthStore()

store.getUser().then(() => {
    app.use(router)
    app.mount("#app")
})
