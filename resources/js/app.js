import '../css/app.css';
import './bootstrap';
import { createApp } from 'vue';
import DoctypeDemo from './features/doctypes/pages/DoctypeDemo.vue';
import router from './router';

createApp(DoctypeDemo).use(router).mount('#app');
