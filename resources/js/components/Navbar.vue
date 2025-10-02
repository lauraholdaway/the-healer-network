<template>
    <nav class="navbar navbar-expand-lg navbar-light  shadow-sm p-0 m-0">
        <div class="container-fluid p-0 m-0">
            <!-- ✅ Logo -->
            <router-link to="/" class="navbar-brand d-flex align-items-center ps-md-5">
                <img src="/public/asset/images/white_logo.png" alt="Logo" style="height: 60px;" />

            </router-link>

            <!-- ✅ Toggler for mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- ✅ Menu Items -->
            <div class="collapse navbar-collapse text-end text-white  ps-md-5" id="mainNavbar">
                <ul class="navbar-nav mx-auto ">
                    <li class="nav-item">
                        <router-link class="nav-link" to="/">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/about">About</router-link>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="findHealerDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="findHealerDropdown">
                            <li><router-link class="dropdown-item" to="/Services">Services</router-link></li>
                            <li><router-link class="dropdown-item" to="/locations">Services</router-link></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="findHealerDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Find My Healer
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="findHealerDropdown">
                            <li><router-link class="dropdown-item" to="/PractitionerIndex">All Healers</router-link>
                            </li>
                            <li><router-link class="dropdown-item" to="/locations">By Location</router-link></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link d-md-none d-sm-flix text-white" to="/login">Book Now</router-link>
                    </li>
                </ul>

                <!-- ✅ Auth Buttons -->
                <div class="d-flex shopnowBTN">
                    <!-- If not logged in -->
                    <button v-if="!isAuthenticated" @click="$router.push('/login')" class="booknow border-0">
                        Book Now →
                    </button>

                    <!-- If logged in -->
                    <div v-else class="">
                        <div class="">
                            <button class="booknow border-0" @click="handleRedirect">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.16797 16.849C4.41548 16.0252 4.92194 15.3032 5.61222 14.79C6.30249 14.2768 7.13982 13.9997 7.99997 14H12C12.8612 13.9997 13.6996 14.2774 14.3904 14.7918C15.0811 15.3062 15.5874 16.0298 15.834 16.855M1 10C1 11.1819 1.23279 12.3522 1.68508 13.4442C2.13738 14.5361 2.80031 15.5282 3.63604 16.364C4.47177 17.1997 5.46392 17.8626 6.55585 18.3149C7.64778 18.7672 8.8181 19 10 19C11.1819 19 12.3522 18.7672 13.4442 18.3149C14.5361 17.8626 15.5282 17.1997 16.364 16.364C17.1997 15.5282 17.8626 14.5361 18.3149 13.4442C18.7672 12.3522 19 11.1819 19 10C19 8.8181 18.7672 7.64778 18.3149 6.55585C17.8626 5.46392 17.1997 4.47177 16.364 3.63604C15.5282 2.80031 14.5361 2.13738 13.4442 1.68508C12.3522 1.23279 11.1819 1 10 1C8.8181 1 7.64778 1.23279 6.55585 1.68508C5.46392 2.13738 4.47177 2.80031 3.63604 3.63604C2.80031 4.47177 2.13738 5.46392 1.68508 6.55585C1.23279 7.64778 1 8.8181 1 10ZM7 8C7 8.79565 7.31607 9.55871 7.87868 10.1213C8.44129 10.6839 9.20435 11 10 11C10.7956 11 11.5587 10.6839 12.1213 10.1213C12.6839 9.55871 13 8.79565 13 8C13 7.20435 12.6839 6.44129 12.1213 5.87868C11.5587 5.31607 10.7956 5 10 5C9.20435 5 8.44129 5.31607 7.87868 5.87868C7.31607 6.44129 7 7.20435 7 8Z"
                                        stroke="#2E2D29" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                {{ auth.user?.name }}
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </nav>
</template>

<script setup>
import { computed, ref } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from '../stores/auth'

// Example state (later connect to Vuex/Pinia or API)
const isAuthenticated = computed(() => !!auth.user)
const user = computed(() => auth.user)
const router = useRouter()
const auth = useAuthStore()

function logout() {
    auth.logout();
}





const handleRedirect = async () => {
    if (!auth.user) return router.push('/login')

    if (auth.user.role === '1') {
        // await router.push('/dashboard') // superadmin
    } else if (auth.user.role === '2') {
        await router.push('/profile/Chart') // user
    } else if (auth.user.role === '3') {
        await router.push('/Docterdashboard') // doctor
    } else {
        await router.push('/') // fallback
    }
}
</script>
