import { createRouter, createWebHistory } from 'vue-router'
import Documentation from './pages/Documentation.vue'
import Guides from './pages/Guides.vue'
import Help from './pages/Help.vue'

const routerHistory = createWebHistory()

const router = createRouter({
  scrollBehavior(to) {
    if (to.hash) {
      window.scroll({ top: 0 })
    } else {
      document.querySelector('html').style.scrollBehavior = 'auto'
      window.scroll({ top: 0 })
      document.querySelector('html').style.scrollBehavior = ''
    }
  },  
  history: routerHistory,
  routes: [
    {
      path: '/',
      redirect: '/documentation/fundamentals'
    },
    {
      path: '/documentation/fundamentals',
      component: Documentation
    },
    {
      path: '/guides/marketing-api',
      component: Guides
    },
    {
      path: '/help',
      component: Help
    }
  ]
})

export default router
