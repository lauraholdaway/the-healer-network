import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from "../stores/auth";
// Import your pages
import Home from '../pages/Home.vue'
import Services from '../pages/Services.vue'
import HealthGuide from '../pages/HealthGuide.vue'
import Login from '../pages/Login.vue'
import Register from '../pages/Register.vue'
import Dashboard from '../pages/Dashboard.vue'
import About from '../pages/About.vue'

import Docter from '../pages/docter.vue'
import Booksession from '../pages/Booksession.vue'


import practitor_register from '../pages/practitor_register.vue';
import Docterdashboard from '../pages/Docterdashboard.vue';
import Doctorprofile from '../pages/Doctorprofile.vue';


// Update User
import Profile from '../pages/user/Dashboard.vue'
import Updateprofile from '../pages/user/Updateprofile.vue';
import Chart from '../pages/user/Chart.vue';

const routes = [
  { path: '/', name: 'Home', component: Home },
  { path: '/services', name: 'Services', component: Services },
  { path: '/health-guide', name: 'HealthGuide', component: HealthGuide },
  { path: '/login', name: 'Login', component: Login },
  { path: '/register', name: 'Register', component: Register },
  { path: '/dashboard', name: 'Dashboard', component: Dashboard },
  { path: '/about', name: 'About', component: About },

  { path: '/docter', name: 'Docter', component: Docter },
  { path: '/booksession', name: 'Booksession', component: Booksession },


  { path: '/profile', name: 'Profile', component: Profile , meta: { requiresAuth: true },},

  { path: '/practitor_register', name: 'practitor_register', component: practitor_register },
  {
  path: '/Docterdashboard',
  name: 'Docterdashboard',
  component: Docterdashboard,
  meta: { hideNav: true, hideFooter: true ,requiresAuth: true } // ✅ custom flags
},

  {
  path: '/Doctorprofile',
  name: 'Doctorprofile',
  component: Doctorprofile,
  meta: { hideNav: true, hideFooter: true ,requiresAuth: true } // ✅ custom flags
    },

    // update User profile
    {
        path: '/Profile',
        component: Profile,
        meta: { requiresAuth: true },
        children: [
            { path: 'Chart', name: 'Chart', component: Chart }, // default
            { path: 'update-profile', name: 'update-profile', component: Updateprofile },
            // you can add more like:
            // { path: 'bookings', name: 'Bookings', component: Bookings },
            // { path: 'settings', name: 'Settings', component: Settings },
        ]
}



]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

// ✅ Global Navigation Guard
router.beforeEach((to, from, next) => {
  const auth = useAuthStore();

  if (to.meta.requiresAuth && !auth.user) {
    // not logged in → redirect login
    next({ name: "Login" });
  } else {
    next();
  }
})
export default router
