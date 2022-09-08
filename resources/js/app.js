import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import axios from 'axios';

const app = createApp(App).use(router); 

import './bootstrap';

app.mount('#app');
// app;
app.config.globalProperties.axios = axios;
