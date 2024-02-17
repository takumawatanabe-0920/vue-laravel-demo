import axios from 'axios'
import { createApp } from 'vue'
import VueAxios from 'vue-axios'
import router from './router'
import Home from './view/Home.vue'

const app = createApp(Home)
app.use(VueAxios, axios)
app.use(router)
app.mount('#app')
