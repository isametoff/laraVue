import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      name: 'main',
      component: () => import('../views/main/index.vue')
    },
    {
      path: '/products',
      name: 'products',
      component: () => import('../components/TheProduct.vue')
    },
      {
      path: '/cart',
      name: 'cart',
      component: () => import('../components/TheCart.vue')
    },
    {
      path: '/products/:id',
      name: 'products.show',
      component: () => import('../components/TheProductShow.vue')
    },
  ]
})

export default router
