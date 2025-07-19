import { createRouter, createWebHistory } from 'vue-router';
import DoctypeDemo from './features/doctypes/pages/DoctypeDemo.vue';
import DoctypeForm from './features/doctypes/pages/DoctypeForm.vue';

const routes = [
  {
    path: '/doctypes',
    name: 'Doctypes',
    component: DoctypeDemo,
  },
  {
    path: '/doctypes/create',
    name: 'DoctypeCreate',
    component: DoctypeForm,
  },
  // Tambahkan route lain jika perlu
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router; 