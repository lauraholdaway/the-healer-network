<template>
    <div class="d-flex justify-content-center align-items-center vh-100" style="background-color: #FBF9F7; position: relative; overflow: hidden; padding: 15px;">
        <!-- Background Sign.svg at bottom left - Hidden on mobile -->
        <img src="/public/asset/images/Sign.svg" alt="" class="d-none d-lg-block" style="position: absolute; bottom: 0; left: 0; width: 440px; height: auto; z-index: 0;" />

        <div class="cards shadow p-4 my-5 rounded-5" style="max-width: 650px; width: 100%; position: relative; z-index: 10; background-color: white;">
            <div class="row mb-0 align-items-center">
                <!-- Logo (show first on mobile) -->
                <div class="text-center mb-3">
                <router-link to="/" class="healer-network-title-link">
                    <h1 class="healer-network-title">THE HEALER NETWORK</h1>
                </router-link>
            </div>

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
.form-control:focus {
    border-color: #DED1BA;
    box-shadow: none;
    outline: none;
}

/* Mobile responsive - keeping exact same UI design */
@media (max-width: 768px) {
    .form-control {
        font-size: 16px; /* Prevents zoom on iOS */
    }
    .btn {
        font-size: 16px; /* Prevents zoom on iOS */
    }
}

@media (max-width: 576px) {
    .form-control {
        font-size: 16px; /* Prevents zoom on iOS */
    }
    .btn {
        font-size: 16px; /* Prevents zoom on iOS */
    }
}
</style>
