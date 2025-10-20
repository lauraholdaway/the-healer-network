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
import Alldoctor from '../pages/Alldoctor.vue';
import PractitionerIndex from '../pages/PractitionerIndex.vue';
import Forgotpassword from '../pages/Forgotpassword.vue';
import Contact from '../pages/Contact.vue';
import Searchdoctorpage from '../pages/Searchdoctorpage.vue';
import Quiz from '../pages/Quiz.vue';
import DoctorFind from '../pages/DoctorFind.vue';
import Verifyemail from '../pages/Verifyemail.vue';
import Verifyemailcomplete from '../pages/Verifyemailcomplete.vue';
import blog from '../pages/blog.vue';


import Docter from '../pages/docter.vue'
import Booksession from '../pages/Booksession.vue'


import practitor_register from '../pages/practitor_register.vue';

import Docterdashboard from '../pages/doctor/Docterdashboard.vue';
import Doctorprofile from '../pages/doctor/Doctorprofile.vue';
import UserView from '../pages/doctor/UserView.vue';
import setSesion from '../pages/doctor/setSesion.vue';
import DoctorTime from '../pages/doctor/DoctorTime.vue';
import UserBooking from '../pages/doctor/UserBooking.vue';
import Myservice from '../pages/doctor/Myservice.vue';
import AddService from '../pages/doctor/AddService.vue';
import EditService from '../pages/doctor/EditService.vue';
import Inbox from '../pages/doctor/Inbox.vue';
import ViewAppointment from '../pages/doctor/ViewAppointment.vue';


// Update User
import Profile from '../pages/user/Dashboard.vue'
import Updateprofile from '../pages/user/Updateprofile.vue';
import Chart from '../pages/user/Chart.vue';
import bookings from '../pages/user/bookings.vue';
import Settings from '../pages/user/Settings.vue';
import Packages from '../pages/user/Packages.vue';
import UserAppointment from '../pages/user/UserAppointment.vue';

const routes = [
    { path: '/', name: 'Home', component: Home },
    { path: '/services', name: 'Services', component: Services },
    { path: '/health-guide', name: 'HealthGuide', component: HealthGuide },
    { path: '/login', name: 'Login', component: Login, meta: { hideFooter: true, hideNav: true, } },
    { path: '/register', name: 'Register', component: Register, meta: { hideFooter: true, hideNav: true, } },
    { path: '/Forgotpassword', name: 'Forgotpassword', component: Forgotpassword, meta: { hideFooter: true, hideNav: true, } },
    { path: '/dashboard', name: 'Dashboard', component: Dashboard },
    { path: '/about', name: 'About', component: About },
    { path: '/Alldoctor', name: 'Alldoctor', component: Alldoctor },
    { path: '/docter/:id', name: 'Docter', component: Docter },
    { path: '/booksession/:id', name: 'Booksession', component: Booksession, props: true },
    { path: '/profile', name: 'Profile', component: Profile, meta: { requiresAuth: true }, },
    { path: '/practitor_register', name: 'practitor_register', component: practitor_register },
    { path: '/PractitionerIndex', name: 'PractitionerIndex', component: PractitionerIndex },
    { path: '/Contact', name: 'Contact', component: Contact },
    { path: '/ViewAppointment/:id', name: 'ViewAppointment', component: ViewAppointment, props: true, meta: { hideFooter: true, hideNav: true, } },
    { path: '/UserAppointment/:id', name: 'UserAppointment', component: UserAppointment, props: true, meta: { hideFooter: true, hideNav: true, } },
    { path: '/Searchdoctorpage', name: 'Searchdoctorpage', component: Searchdoctorpage },
    { path: '/Quiz', name: 'Quiz', component: Quiz },
    { path: '/DoctorFind', name: 'DoctorFind', component: DoctorFind },
    { path: '/Verifyemail', name: 'Verifyemail', component: Verifyemail, meta: { hideFooter: true, hideNav: true, } },
    { path: '/Verifyemailcomplete', name: 'Verifyemailcomplete', component: Verifyemailcomplete, meta: { hideFooter: true, hideNav: true, } },
    { path: '/blog/:id', name: 'blog', component: blog, },


    // update User profile
    {
        path: '/Profile',
        component: Profile,
        meta: { requiresAuth: true, },
        children: [
            { path: 'Chart', name: 'Chart', component: Chart }, // default
            { path: 'update-profile', name: 'update-profile', component: Updateprofile },
            { path: 'bookings', name: 'bookings', component: bookings },
            { path: 'Settings', name: 'Settings', component: Settings },
            { path: 'Packages', name: 'Packages', component: Packages },



        ]
    },
    {
        path: '/Docterdashboard/',
        component: Docterdashboard,
        meta: { requiresAuth: true, requiresAuth: true, meta: { hideNav: true, hideFooter: true, requiresAuth: true } },
        children: [
            { path: '', name: 'UserView', component: UserView, meta: { hideFooter: true, hideNav: true, requiresAuth: true } }, // default
            { path: 'Doctorprofile', name: 'Doctorprofile', component: Doctorprofile, meta: { hideNav: true, hideFooter: true, requiresAuth: true } },
            { path: 'setSesion', name: 'setSesion', component: setSesion, meta: { hideNav: true, hideFooter: true, requiresAuth: true } },
            { path: 'DoctorTime', name: 'DoctorTime', component: DoctorTime, meta: { hideNav: true, hideFooter: true, requiresAuth: true } },
            { path: 'UserBooking', name: 'UserBooking', component: UserBooking, meta: { hideNav: true, hideFooter: true, requiresAuth: true } },
            { path: 'Myservice', name: 'Myservice', component: Myservice, meta: { hideNav: true, hideFooter: true, requiresAuth: true } },
            { path: 'AddService', name: 'AddService', component: AddService, meta: { hideNav: true, hideFooter: true, requiresAuth: true } },
            { path: 'EditService/:id', name: 'EditService', component: EditService, meta: { hideNav: true, hideFooter: true, requiresAuth: true, props: true } },
            { path: 'Inbox', name: 'Inbox', component: Inbox, meta: { hideNav: true, hideFooter: true, requiresAuth: true, props: true } },
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
        if (auth.user && !auth.user.email_verified_at && to.meta.requiresAuth) {
            next({ name: "Verifyemail" });
        }
    } else {
        next();
    }
})
export default router
