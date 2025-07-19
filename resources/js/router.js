import { createRouter, createWebHistory } from 'vue-router';
import DoctypeDemo from './features/doctypes/pages/DoctypeDemo.vue';
import DoctypeForm from './features/doctypes/pages/DoctypeForm.vue';
import DoctypeList from './features/doctypes/pages/DoctypeList.vue';
import DocumentList from './features/doctypes/pages/DocumentList.vue';
import GeneratedForm from './features/doctypes/pages/GeneratedForm.vue';

const routes = [
  {
    path: '/',
    redirect: '/demo'
  },
  {
    path: '/demo',
    name: 'Demo',
    component: DoctypeDemo,
    meta: { title: 'DocType Demo' }
  },
  {
    path: '/list',
    name: 'DoctypeList',
    component: DoctypeList,
    meta: { title: 'DocType List' }
  },
  {
    path: '/create',
    name: 'DoctypeCreate',
    component: DoctypeForm,
    meta: { title: 'Create DocType' }
  },
  {
    path: '/edit/:id',
    name: 'DoctypeEdit',
    component: DoctypeForm,
    props: true,
    meta: { title: 'Edit DocType' }
  },
  {
    path: '/:doctype/documents',
    name: 'DocumentList',
    component: DocumentList,
    props: true,
    meta: { title: 'Documents' }
  },
  {
    path: '/:doctype/documents/create',
    name: 'DocumentCreate',
    component: GeneratedForm,
    props: true,
    meta: { title: 'Create Document' }
  },
  {
    path: '/:doctype/documents/:id/edit',
    name: 'DocumentEdit',
    component: GeneratedForm,
    props: true,
    meta: { title: 'Edit Document' }
  },
  // Fallback route
  {
    path: '/:pathMatch(.*)*',
    redirect: '/demo'
  }
];

const router = createRouter({
  history: createWebHistory('/doctypes'),
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition;
    }
    return { top: 0 };
  }
});

// Navigation guards
router.beforeEach((to, from, next) => {
  // Set page title
  if (to.meta?.title) {
    document.title = `${to.meta.title} - DocTypes`;
  }
  next();
});

export default router; 