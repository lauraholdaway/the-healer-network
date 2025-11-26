<template>
    <div class="d-flex justify-content-center align-items-center vh-100" style="background-color: #FBF9F7; position: relative; overflow: hidden; padding: 15px;">
        <!-- Background Sign.svg at bottom left - Hidden on mobile -->
        <img src="/public/asset/images/Sign.svg" alt="" class="d-none d-lg-block" style="position: absolute; bottom: 0; left: 0; width: 440px; height: auto; z-index: 0;" />

        <div class="cards shadow p-4 my-5 rounded-5" style="max-width: 650px; width: 100%; position: relative; z-index: 10; background-color: white;">
            <div class="mb-3 d-flex align-items-center justify-content-between" style="margin-left: -1rem; margin-right: -1rem; padding-left: 1rem; padding-right: 1rem;">
                <router-link to="/" class="back-btn" style="text-decoration: none; color: #5B4C3A; display: flex; align-items: center; margin-right: auto; padding-left: 0;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 8px;">
                        <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Back To Home</span>
                </router-link>
                <router-link to="/" class="healer-network-title-link" style="text-decoration: none !important; border-bottom: none !important; margin-left: auto;">
                    <div class="logo-container">
                        <img src="/public/asset/images/logo.svg" alt="Logo" class="login-logo">
                    </div>
                </router-link>
            </div>
            <div class="row mb-0 align-items-center">

                <!-- Sign Up text (show after logo on mobile) -->
                <div class="col-md-9 order-2 order-md-1 text-center text-md-start">
                    <h3 class="m-color">Sign Up</h3>
                    <p style="color: #5B4C3A; font-size: 13px; max-width: 370px;">
                        Please provide your full name, email and create a strong password to complete your registration.
                    </p>
                </div>
            </div>

            <hr style="border: 1px solid #DED1BA; margin-top: -8px;">

            <!-- Register Form -->
            <form @submit.prevent="onSubmit">
                <div class="mb-3">
                    <label class="form-label" style="font-size: 13px; color: #737373;">Full Name</label>
                    <input v-model="form.name" type="text" class="form-control" style="border-color: #DED1BA;"
                        placeholder="John" />
                </div>

                <div class="mb-3">
                    <label class="form-label" style="font-size: 13px; color: #737373;">Email</label>
                    <input v-model="form.email" type="email" class="form-control" style="border-color: #DED1BA;" placeholder="Enter your email" />
                </div>

                <!-- Hidden fields for backend compatibility -->
                <input v-model="form.last_name" type="hidden" />
                <input v-model="form.phone" type="hidden" />

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" style="font-size: 13px; color: #737373;">New Password</label>
                        <div class="position-relative">
                            <input v-model="form.password" :type="showPassword ? 'text' : 'password'" class="form-control"
                                style="border-color: #DED1BA; padding-right: 50px;" placeholder="Enter password" />
                            <button type="button" class="btn btn-link position-absolute end-0 top-50 translate-middle-y pe-3"
                                style="border: none; background: none; color: #5B4C3A; padding: 8px; border-radius: 4px; transition: all 0.2s ease;"
                                @click="togglePasswordVisibility"
                                @mouseover="$event.target.style.backgroundColor='#F5F5F5'"
                                @mouseout="$event.target.style.backgroundColor='transparent'">
                                <!-- Eye Slash Icon SVG (when password is hidden) -->
                                <svg v-if="!showPassword" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 7c2.76 0 5 2.24 5 5 0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.43-4.75-1.73-4.39-6-7.5-11-7.5-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 7.13 11.35 7 12 7zM2 4.27l2.28 2.28.46.46C3.08 8.3 1.78 10.02 1 12c1.73 4.39 6 7.5 11 7.5 1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22 21 20.73 3.27 3 2 4.27zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65 0 1.66 1.34 3 3 3 .22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53-2.76 0-5-2.24-5-5 0-.79.2-1.53.53-2.2zm4.31-.78l3.15 3.15.02-.16c0-1.66-1.34-3-3-3l-.17.01z" fill="currentColor"/>
                                </svg>
                                <!-- Eye Icon SVG (when password is visible) -->
                                <svg v-else width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z" fill="currentColor"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" style="font-size: 13px; color: #737373;">Confirm New Password</label>
                        <div class="position-relative">
                            <input v-model="form.password_confirmation" :type="showConfirmPassword ? 'text' : 'password'" class="form-control"
                                style="border-color: #DED1BA; padding-right: 50px;" placeholder="Confirm password" />
                            <button type="button" class="btn btn-link position-absolute end-0 top-50 translate-middle-y pe-3"
                                style="border: none; background: none; color: #5B4C3A; padding: 8px; border-radius: 4px; transition: all 0.2s ease;"
                                @click="toggleConfirmPasswordVisibility"
                                @mouseover="$event.target.style.backgroundColor='#F5F5F5'"
                                @mouseout="$event.target.style.backgroundColor='transparent'">
                                <!-- Eye Slash Icon SVG (when password is hidden) -->
                                <svg v-if="!showConfirmPassword" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 7c2.76 0 5 2.24 5 5 0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.43-4.75-1.73-4.39-6-7.5-11-7.5-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 7.13 11.35 7 12 7zM2 4.27l2.28 2.28.46.46C3.08 8.3 1.78 10.02 1 12c1.73 4.39 6 7.5 11 7.5 1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22 21 20.73 3.27 3 2 4.27zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65 0 1.66 1.34 3 3 3 .22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53-2.76 0-5-2.24-5-5 0-.79.2-1.53.53-2.2zm4.31-.78l3.15 3.15.02-.16c0-1.66-1.34-3-3-3l-.17.01z" fill="currentColor"/>
                                </svg>
                                <!-- Eye Icon SVG (when password is visible) -->
                                <svg v-else width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z" fill="currentColor"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div v-if="error" class="text-danger mt-3 text-center">{{ error }}</div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <button class="btn main-btn px-4 py-2" :disabled="processing"
                        style="border-radius: 8px; background-color: #8A7356; color: white; font-family: 'TheSeasons', serif !important; border: none; padding: 12px 24px; transition: all 0.3s ease;"
                        @mouseover="$event.target.style.backgroundColor='#6B5B47'"
                        @mouseout="$event.target.style.backgroundColor='#8A7356'">
                        {{ processing ? "Registering..." : "Sign Up" }}
                    </button>

                    <div class="text-end">
                        <span style="color: #C4B39A; font-size: 13px;">Are you already registered? </span>
                        <router-link to="/login" class="text-decoration-none" style="color: #5B4C3A; font-size: 13px; font-weight: 500;">Sign In</router-link>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { reactive, ref } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from '../stores/auth'

const router = useRouter()
const auth = useAuthStore()

// Form data
const form = reactive({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
})

const error = ref(null)
const processing = ref(false)
const showPassword = ref(false)
const showConfirmPassword = ref(false)

function togglePasswordVisibility() {
    showPassword.value = !showPassword.value
}

function toggleConfirmPasswordVisibility() {
    showConfirmPassword.value = !showConfirmPassword.value
}

async function onSubmit() {
    processing.value = true
    error.value = null
    try {
        await auth.register(form)
        alert('Registration successful!')
        await router.push('/login')
    } catch (e) {
        error.value =
            e.response?.data?.message ||
            (e.response?.data?.errors ? Object.values(e.response.data.errors)[0][0] : 'Register failed')
    } finally {
        processing.value = false
    }
}
</script>

<style scoped>
.back-btn {
    transition: all 0.3s ease;
    padding: 8px 12px;
    border-radius: 8px;
}

.back-btn:hover {
    background-color: #F4EFE6;
    color: #5B4C3A;
}

.logo-container {
    display: inline-block;
    background: transparent;
}

.login-logo {
    height: 60px;
    max-width: 100%;
    background: transparent;
    display: block;
}

.form-control:focus {
    border-color: #DED1BA;
    box-shadow: none;
    outline: none;
}

/* Mobile responsive - keeping exact same UI design */
@media (max-width: 768px) {
    .cards {
        max-width: 100% !important;
        padding: 1.5rem !important;
        margin: 1rem 0 !important;
    }

    .back-btn {
        font-size: 14px;
        padding: 6px 10px;
    }

    .back-btn svg {
        width: 18px;
        height: 18px;
    }

    .login-logo {
        height: 50px;
        max-width: 200px;
    }

    h3.m-color {
        font-size: 24px;
        text-align: center;
    }

    .text-center.text-md-start p {
        text-align: center !important;
        margin: 0 auto !important;
        max-width: 100% !important;
        font-size: 12px !important;
    }

    .form-control {
        font-size: 16px; /* Prevents zoom on iOS */
        padding: 10px 12px;
    }

    .form-label {
        font-size: 12px !important;
    }

    .btn.main-btn {
        font-size: 16px; /* Prevents zoom on iOS */
        padding: 10px 20px !important;
        width: 100%;
        margin-bottom: 10px;
    }

    .d-flex.justify-content-between.align-items-center.mt-4 {
        flex-direction: column;
        align-items: stretch !important;
        gap: 15px;
    }

    .text-end {
        text-align: center !important;
        width: 100%;
    }

    .row .col-md-6 {
        margin-bottom: 1rem;
    }
}

@media (max-width: 576px) {
    .cards {
        max-width: 100% !important;
        padding: 1.25rem !important;
        margin: 0.5rem 0 !important;
        border-radius: 20px !important;
    }

    .back-btn {
        font-size: 13px;
        padding: 5px 8px;
    }

    .back-btn svg {
        width: 16px;
        height: 16px;
        margin-right: 6px !important;
    }

    .login-logo {
        height: 45px;
        max-width: 180px;
    }

    h3.m-color {
        font-size: 22px;
        text-align: center;
    }

    .text-center.text-md-start p {
        text-align: center !important;
        margin: 0 auto !important;
        max-width: 100% !important;
        font-size: 11px !important;
        padding: 0 10px;
    }

    .form-control {
        font-size: 16px; /* Prevents zoom on iOS */
        padding: 10px 12px;
    }

    .form-label {
        font-size: 12px !important;
    }

    .btn.main-btn {
        font-size: 15px; /* Prevents zoom on iOS */
        padding: 10px 18px !important;
        width: 100%;
        margin-bottom: 10px;
    }

    .d-flex.justify-content-between.align-items-center.mt-4 {
        flex-direction: column;
        align-items: stretch !important;
        gap: 12px;
    }

    .text-end {
        text-align: center !important;
        width: 100%;
    }

    .text-end span,
    .text-end a {
        font-size: 12px !important;
    }

    hr {
        margin-top: -5px !important;
    }

    .row .col-md-6 {
        margin-bottom: 1rem;
    }
}
</style>
