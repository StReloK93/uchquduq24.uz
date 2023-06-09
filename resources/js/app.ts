import { useAuthStore } from './store/useAuthStore'
import {createApp} from 'vue'
import App from './components/App.vue'
import { createPinia } from 'pinia'
import router from './router'
import axios from 'axios'

axios.defaults.baseURL = '/api/'
const pinia = createPinia()
const app = createApp(App)
app.use(pinia)

const store = useAuthStore()

async function init(){
    await store.getUser()
    app.use(router)
    app.mount("#app")
}
init()