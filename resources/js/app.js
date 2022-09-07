import { createApp } from 'vue'
import App from './App.vue'
// import Header from "./components/Header"
import router from './router'
import axios from "axios";

const app = createApp(App)

import './bootstrap'

app.use(router)
app.config.globalProperties.axios = axios
app.mount('#app')
