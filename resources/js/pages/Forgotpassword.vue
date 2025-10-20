<template>
    <div class="d-flex justify-content-center align-items-center vh-100" style="background-color: #FBF9F7; position: relative; overflow: hidden; padding: 15px;">
        <!-- Background Sign.svg at bottom left - Hidden on mobile -->
        <img src="/public/asset/images/Sign.svg" alt="" class="d-none d-lg-block" style="position: absolute; bottom: 0; left: 0; width: 440px; height: auto; z-index: 0;" />
        
        <div class="cards shadow p-4 my-5 rounded-5" style="max-width: 650px; width: 100%; position: relative; z-index: 10; background-color: white;">
            <div class="row mb-0 align-items-center">
                <!-- Logo (show first on mobile) -->
                <div class="col-md-3 order-1 order-md-2 text-md-end text-center mb-0 mb-md-0">
                    <router-link to="/"><img src="/public/asset/images/dark-logo.png" alt="Logo" class="img-fluid" style="height: 150px;" /></router-link>
                </div>
                <!-- Forgot Password text (show after logo on mobile) -->
                <div class="col-md-9 order-2 order-md-1 text-center text-md-start">
                    <h3 class="m-color">Forgot Password</h3>
                    <p style="color: #5B4C3A; font-size: 13px; max-width: 370px;">
                        Enter your email to get a password reset link.
                    </p>
                </div>
            </div>
            <hr style="border: 1px solid #DED1BA; margin-top: -8px;">
            <form @submit.prevent="onSubmit">
                <div class="mb-3">
                    <label class="form-label" style="font-size: 13px; color: #737373;">Email</label>
                    <input v-model="form.email" type="email" class="form-control" style="border-color: #DED1BA;" required />
                </div>
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <button class="btn main-btn px-4 py-2" :disabled="processing" style="border-radius: 8px; background-color: #8A7356; color: white; font-family: 'Cormorant Garamond', serif !important; border: none; padding: 12px 24px; transition: all 0.3s ease;" @mouseover="$event.target.style.backgroundColor='#6B5B47'" @mouseout="$event.target.style.backgroundColor='#8A7356'">
                        Reset Password
                    </button>
                    <!-- <div class="text-end">
                        <span style="color: #C4B39A; font-size: 13px;">Remember your password? </span>
                        <router-link to="/login" class="text-decoration-none" style="color: #5B4C3A; font-size: 13px; font-weight: 500;">Sign In</router-link>
                    </div> -->
                </div>
                <div v-if="error" class="text-danger mt-3 text-center">{{ error }}</div>
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

const form = reactive({ email: '', password: '' })
const error = ref(null)
const processing = ref(false)

async function onSubmit() {
    processing.value = true
    error.value = null
    try {
        await auth.login({ email: form.email, password: form.password })
    } catch (e) {
        error.value =
            e.response?.data?.message ||
            (e.response?.data?.errors ? Object.values(e.response.data.errors)[0][0] : 'Login failed')
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
