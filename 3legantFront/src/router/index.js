import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import RegisterView from '@/views/RegisterView.vue'
import LoginView from '@/views/LoginView.vue'
import CartView from '@/views/CartView.vue'
import SingleProductView from '@/views/SingleProductView.vue'
import { useAuthAdminStore } from '@/stores/authAdmin'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/register',
      name: 'register',
      component: RegisterView,
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView,
    },
    {
      path: '/shop',
      name: 'shop',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/ShopView.vue'),
    },
    {
      path: '/cart',
      name: 'cart',
      component: CartView,
    },
    {
      path: '/shop/:id',
      name: 'single-product',
      component: SingleProductView,
      props: true,
    },
    {
      path: '/admin',
      name: 'admin',
      component: () => import('../views/AdminView.vue'),
      meta: { requiresAdmin: true },
    },
    {
      path: '/login-admin',
      name: 'login-admin',
      component: () => import('../views/LoginAdmin.vue'),
    },
  ],
})

router.beforeEach((to, from, next) => {
  const authAdminStore = useAuthAdminStore()

  if (to.path === '/admin' && !authAdminStore.isAuthenticated) {
    return next('/login-admin')
  }

  next()
})

export default router
