<template>
    <div class="d-flex justify-content-center align-items-center vh-100 bg-light">
        <div class="cards bg-white shadow p-4 my-5 rounded-3" style="max-width: 650px; width: 100%;">
            <div class="row mb-2 align-items-center">
                <!-- Logo (show first on mobile) -->
                <div class="col-md-3 order-1 order-md-2 text-md-end text-center mb-3 mb-md-0">
                    <img src="/public/asset/images/dark-logo.png" alt="Logo" class="img-fluid" style="height: 100px;" />
                </div>

                <!-- Sign Up text (show after logo on mobile) -->
                <div class="col-md-9 order-2 order-md-1 text-center text-md-start">
                    <h3 class="m-color">Forgot Password</h3>
                    <p style="color: #5B4C3A;">
                       Enter your email to get a password reset link.
                    </p>
                </div>
            </div>
            <form @submit.prevent="onSubmit">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input v-model="form.email" type="email" class="form-control" required />
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="d-grid">
                        <button class="btn btn-primary main-btn" :disabled="processing">Reset Password</button>
                    </div>

                </div>

                <div v-if="error" class="text-danger mt-2 text-center">{{ error }}</div>
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
