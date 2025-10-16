<template>
    <nav class="custom-navbar">
        <div class="navbar-container">
            <!-- Left Section - Light Beige Background -->
            <div class="navbar-left">
                <!-- Logo/Brand -->
                <div class="navbar-brand">
                    <router-link to="/" class="brand-link">THE HEALER NETWORK</router-link>
                </div>

                <!-- Hamburger Menu Button (Mobile Only) -->
                <button class="hamburger-menu" @click="toggleMobileMenu" :class="{ 'active': isMobileMenuOpen }">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <!-- Navigation Links -->
                <div class="navbar-nav-links" :class="{ 'mobile-menu-open': isMobileMenuOpen }">
                    <router-link to="/" class="nav-link" @click="closeMobileMenu">Home</router-link>
                    <router-link to="/corporate" class="nav-link" @click="closeMobileMenu">Corporate</router-link>
                    <router-link to="/resources" class="nav-link" @click="closeMobileMenu">Resources</router-link>
                    <router-link to="/about" class="nav-link" @click="closeMobileMenu">About</router-link>

                    <!-- Services Dropdown -->
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" @click.prevent="toggleDropdown('services')">
                            Services
                            <!-- <span class="dropdown-arrow">▼</span> -->
                        </a>
                        <div v-if="activeDropdown === 'services'" class="dropdown-menu">
                            <router-link to="/services" class="dropdown-item" @click="closeMobileMenu">All Services</router-link>
                            <router-link to="/Quiz" class="dropdown-item" @click="closeMobileMenu">Health Quiz</router-link>
                            <router-link to="/consultation" class="dropdown-item" @click="closeMobileMenu">Consultation</router-link>

                        </div>
                    </div>

                    <!-- Find My Healer Dropdown -->
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" @click.prevent="toggleDropdown('healer')">
                            Find My Healer
                            <!-- <span class="dropdown-arrow">▼</span> -->
                        </a>
                        <div v-if="activeDropdown === 'healer'" class="dropdown-menu">
                            <router-link to="/PractitionerIndex" class="dropdown-item" @click="closeMobileMenu">All Healers</router-link>
                            <router-link to="/location" class="dropdown-item" @click="closeMobileMenu">By Location</router-link>
                        </div>
                    </div>

                    <!-- Mobile Book Now Button (Inside mobile menu) -->
                    <div class="mobile-book-now">
                        <button v-if="!isAuthenticated" @click="handleMobileLogin" class="book-now-btn mobile">
                            Book Now
                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.5 1.5L19 9L11.5 1.5ZM19 9L11.5 16.5L19 9ZM19 9L1 9L19 9Z" fill="#2E2D29"/>
                                <path d="M11.5 1.5L19 9M19 9L11.5 16.5M19 9L1 9" stroke="#2E2D29" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>

                        <button v-else @click="handleMobileRedirect" class="book-now-btn mobile">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.16797 16.849C4.41548 16.0252 4.92194 15.3032 5.61222 14.79C6.30249 14.2768 7.13982 13.9997 7.99997 14H12C12.8612 13.9997 13.6996 14.2774 14.3904 14.7918C15.0811 15.3062 15.5874 16.0298 15.834 16.855M1 10C1 11.1819 1.23279 12.3522 1.68508 13.4442C2.13738 14.5361 2.80031 15.5282 3.63604 16.364C4.47177 17.1997 5.46392 17.8626 6.55585 18.3149C7.64778 18.7672 8.8181 19 10 19C11.1819 19 12.3522 18.7672 13.4442 18.3149C14.5361 17.8626 15.5282 17.1997 16.364 16.364C17.1997 15.5282 17.8626 14.5361 18.3149 13.4442C18.7672 12.3522 19 11.1819 19 10C19 8.8181 18.7672 7.64778 18.3149 6.55585C17.8626 5.46392 17.1997 4.47177 16.364 3.63604C15.5282 2.80031 14.5361 2.13738 13.4442 1.68508C12.3522 1.23279 11.1819 1 10 1C8.8181 1 7.64778 1.23279 6.55585 1.68508C5.46392 2.13738 4.47177 2.80031 3.63604 3.63604C2.80031 4.47177 2.13738 5.46392 1.68508 6.55585C1.23279 7.64778 1 8.8181 1 10ZM7 8C7 8.79565 7.31607 9.55871 7.87868 10.1213C8.44129 10.6839 9.20435 11 10 11C10.7956 11 11.5587 10.6839 12.1213 10.1213C12.6839 9.55871 13 8.79565 13 8C13 7.20435 12.6839 6.44129 12.1213 5.87868C11.5587 5.31607 10.7956 5 10 5C9.20435 5 8.44129 5.31607 7.87868 5.87868C7.31607 6.44129 7 7.20435 7 8Z" stroke="#FBF9F7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            {{ auth.user?.name }}
                        </button>
                    </div>
                </div>
            </div>

            <!-- Separator Line -->
            <div class="navbar-separator"></div>

            <!-- Right Section - Dark Taupe Background (Desktop Only) -->
            <div class="navbar-right">
                <!-- If not logged in -->
                <button v-if="!isAuthenticated" @click="$router.push('/login')" class="book-now-btn">

                    Book Now
                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.5 1.5L19 9L11.5 1.5ZM19 9L11.5 16.5L19 9ZM19 9L1 9L19 9Z" fill="#2E2D29"/>
                        <path d="M11.5 1.5L19 9M19 9L11.5 16.5M19 9L1 9" stroke="#2E2D29" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>

                <!-- If logged in -->
                <button v-else @click="handleRedirect" class="book-now-btn">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.16797 16.849C4.41548 16.0252 4.92194 15.3032 5.61222 14.79C6.30249 14.2768 7.13982 13.9997 7.99997 14H12C12.8612 13.9997 13.6996 14.2774 14.3904 14.7918C15.0811 15.3062 15.5874 16.0298 15.834 16.855M1 10C1 11.1819 1.23279 12.3522 1.68508 13.4442C2.13738 14.5361 2.80031 15.5282 3.63604 16.364C4.47177 17.1997 5.46392 17.8626 6.55585 18.3149C7.64778 18.7672 8.8181 19 10 19C11.1819 19 12.3522 18.7672 13.4442 18.3149C14.5361 17.8626 15.5282 17.1997 16.364 16.364C17.1997 15.5282 17.8626 14.5361 18.3149 13.4442C18.7672 12.3522 19 11.1819 19 10C19 8.8181 18.7672 7.64778 18.3149 6.55585C17.8626 5.46392 17.1997 4.47177 16.364 3.63604C15.5282 2.80031 14.5361 2.13738 13.4442 1.68508C12.3522 1.23279 11.1819 1 10 1C8.8181 1 7.64778 1.23279 6.55585 1.68508C5.46392 2.13738 4.47177 2.80031 3.63604 3.63604C2.80031 4.47177 2.13738 5.46392 1.68508 6.55585C1.23279 7.64778 1 8.8181 1 10ZM7 8C7 8.79565 7.31607 9.55871 7.87868 10.1213C8.44129 10.6839 9.20435 11 10 11C10.7956 11 11.5587 10.6839 12.1213 10.1213C12.6839 9.55871 13 8.79565 13 8C13 7.20435 12.6839 6.44129 12.1213 5.87868C11.5587 5.31607 10.7956 5 10 5C9.20435 5 8.44129 5.31607 7.87868 5.87868C7.31607 6.44129 7 7.20435 7 8Z" stroke="#FBF9F7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    {{ auth.user?.name }}
                </button>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { computed, ref, onMounted, onUnmounted } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from '../stores/auth'

// State management
const isAuthenticated = computed(() => !!auth.user)
const user = computed(() => auth.user)
const router = useRouter()
const auth = useAuthStore()

// Dropdown state
const activeDropdown = ref(null)

// Mobile menu state
const isMobileMenuOpen = ref(false)

// Methods
function logout() {
    auth.logout();
}

function toggleDropdown(dropdownName) {
    activeDropdown.value = activeDropdown.value === dropdownName ? null : dropdownName;
}

function toggleMobileMenu() {
    isMobileMenuOpen.value = !isMobileMenuOpen.value;
    // Prevent body scroll when mobile menu is open
    if (isMobileMenuOpen.value) {
        document.body.style.overflow = 'hidden';
    } else {
        document.body.style.overflow = '';
    }
}

function closeMobileMenu() {
    isMobileMenuOpen.value = false;
    document.body.style.overflow = '';
    activeDropdown.value = null;
}

// Close dropdown when clicking outside
const handleClickOutside = (e) => {
    if (!e.target.closest('.dropdown')) {
        activeDropdown.value = null;
    }
}

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
})

onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
    document.body.style.overflow = '';
})

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

const handleMobileLogin = () => {
    closeMobileMenu();
    router.push('/login');
}

const handleMobileRedirect = async () => {
    closeMobileMenu();
    await handleRedirect();
}
</script>

<style scoped>
.custom-navbar {
    width: 100%;
    height: 70px;
    display: flex;
    align-items: center;
    background:#F3EFE7;

    position: relative;
    z-index: 1000;
    overflow: visible;
}

.navbar-container {
    width: 100%;
    display: flex;
    align-items: center;
    height: 100%;
}

.navbar-left {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 100%;
    padding: 0 40px;
    background: #FBF9F7;
    overflow: visible;
    position: relative;
}

.navbar-brand {
    margin-right: auto;
}

.brand-link {
    font-family: 'Cormorant Garamond', serif;
    font-size: 18px;
    font-weight: 600;
    color: #5C5C5C;
    text-decoration: none;
    letter-spacing: 1px;
}

.navbar-nav-links {
    display: flex;
    align-items: center;
    gap: 35px;
    overflow: visible;
    position: relative;
}

.nav-link {
    font-family: 'Cormorant Garamond', serif;
    font-size: 16px;
    font-weight: 400;
    color: #5B4C3A;
    text-decoration: none;
    transition: color 0.3s ease;
    display: flex;
    align-items: center;
    gap: 2px;
}

.nav-link:hover {
    color: #A0704C;
}

.nav-link.router-link-active {
    color: #A0704C;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-toggle {
    cursor: pointer;
}

.dropdown-arrow {
    font-size: 10px;
    margin-left: 5px;
    transition: transform 0.3s ease;
}

.dropdown:hover .dropdown-arrow {
    transform: rotate(180deg);
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    background: white;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    min-width: 180px;
    z-index: 1001;
    padding: 8px 0;
    margin-top: 5px;
    display: block;
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
    transition: all 0.3s ease;
}

.dropdown-item {
    display: block;
    padding: 10px 16px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    font-size: 14px;
    font-weight: 400;
    color: #333;
    text-decoration: none;
    transition: all 0.2s ease;
    border: none;
    background: transparent;
    white-space: nowrap;
    border-bottom: 1px solid #f5f5f5;
}

.dropdown-item:hover {
    background-color: #f0f8ff;
    color: #A0704C;
}

.dropdown-item:first-child {
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}

.dropdown-item:last-child {
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
    border-bottom: none;
}



.navbar-right {
    width: 250px;
    height: 100%;
    background: #C4B39A;
    border-left: 1px solid #8A7356;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 30px;
}

.book-now-btn {
    background: transparent;
    border: none;
    font-family: 'Cormorant Garamond', serif;
    font-size: 16px;
    font-weight: 500;
    color: #2E2D29;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 20px;
    transition: all 0.3s ease;
    transform: scale(1);
}

.book-now-btn:hover {
    transform: scale(1.05);
}



/* Hamburger Menu Button */
.hamburger-menu {
    display: none;
    flex-direction: column;
    justify-content: space-between;
    width: 30px;
    height: 24px;
    background: transparent;
    border: none;
    cursor: pointer;
    padding: 0;
    z-index: 1002;
    margin-left: auto;
}

.hamburger-menu span {
    display: block;
    width: 100%;
    height: 3px;
    background-color: #5B4C3A;
    border-radius: 3px;
    transition: all 0.3s ease;
}

.hamburger-menu.active span:nth-child(1) {
    transform: rotate(45deg) translate(8px, 8px);
}

.hamburger-menu.active span:nth-child(2) {
    opacity: 0;
}

.hamburger-menu.active span:nth-child(3) {
    transform: rotate(-45deg) translate(7px, -7px);
}

/* Mobile Book Now Button (Hidden by default) */
.mobile-book-now {
    display: none;
}

/* Mobile Responsiveness */
@media (max-width: 992px) {
    .custom-navbar {
        height: 70px;
    }

    .navbar-left {
        justify-content: space-between;
        padding: 0 20px;
        position: relative;
    }

    .navbar-brand {
        margin-right: 0;
        flex-shrink: 0;
    }

    /* Show hamburger menu */
    .hamburger-menu {
        display: flex;
    }

    /* Hide desktop navigation and right section */
    .navbar-nav-links {
        position: fixed;
        top: 70px;
        left: -100%;
        width: 100%;
        height: calc(100vh - 70px);
        background: #FBF9F7;
        flex-direction: column;
        align-items: flex-start;
        padding: 30px 20px;
        gap: 20px;
        transition: left 0.3s ease;
        overflow-y: auto;
        z-index: 1000;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    }

    .navbar-nav-links.mobile-menu-open {
        left: 0;
    }

    .navbar-separator {
        display: none;
    }

    .navbar-right {
        display: none;
    }

    /* Show mobile book now button */
    .mobile-book-now {
        display: block;
        width: 100%;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 2px solid #E8E0D5;
    }

    .book-now-btn.mobile {
        width: 100%;
        justify-content: center;
        background: #C4B39A;
        border-radius: 8px;
        padding: 15px 20px;
    }

    .book-now-btn.mobile svg path {
        stroke: #2E2D29;
    }

    /* Dropdown adjustments for mobile */
    .dropdown {
        width: 100%;
    }

    .nav-link {
        width: 100%;
        padding: 10px 0;
        font-size: 18px;
    }

    .dropdown-menu {
        position: static;
        box-shadow: none;
        border: none;
        border-radius: 0;
        background: #F4EFE6;
        margin: 10px 0;
        padding: 10px 0 10px 20px;
    }

    .dropdown-item {
        padding: 12px 16px;
        font-size: 16px;
    }
}

/* Tablet adjustments */
@media (max-width: 768px) {
    .brand-link {
        font-size: 16px;
    }

    .nav-link {
        font-size: 16px;
    }
}

/* Small mobile phones */
@media (max-width: 480px) {
    .navbar-left {
        padding: 0 15px;
    }

    .brand-link {
        font-size: 14px;
        letter-spacing: 0.5px;
    }

    .nav-link {
        font-size: 15px;
    }

    .dropdown-item {
        font-size: 14px;
    }

    .book-now-btn.mobile {
        font-size: 14px;
        padding: 12px 16px;
    }

    .navbar-nav-links {
        padding: 20px 15px;
    }
}

/* Prevent body scroll when mobile menu is open */
body.menu-open {
    overflow: hidden;
}
</style>
