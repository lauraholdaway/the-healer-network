<template>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="cards shadow-lg p-4 my-5 rounded-3" style="max-width: 650px; width: 100%;">

            <div class="row mb-2 align-items-center">
                <!-- Logo (show first on mobile) -->
                <div class="col-md-3 order-1 order-md-2 text-md-end text-center mb-3 mb-md-0">
                    <router-link to="/"><img src="/public/asset/images/dark-logo.png" alt="Logo" class="img-fluid"
                            style="height: 100px;" /></router-link>
                </div>

                <!-- Sign Up text (show after logo on mobile) -->
                <div class="col-md-9 order-2 order-md-1 text-center text-md-start">
                    <h3 class="m-color">Sign Up</h3>
                    <p style="color: #5B4C3A;">
                        Please provide your full name, email or phone number, and create a strong
                        password to complete your registration.
                    </p>
                </div>
            </div>


            <!-- ✅ Register Form -->
            <form @submit.prevent="onSubmit">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">First Name</label>
                        <input v-model="form.name" type="text" class="form-control"
                            placeholder="Enter your First Name" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Last Name</label>
                        <input v-model="form.last_name" type="text" class="form-control"
                            placeholder="Enter your Last Name" />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input v-model="form.email" type="email" class="form-control" placeholder="Enter your email" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input v-model="form.phone" type="text" class="form-control" placeholder="Enter your Numbere" />
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Password</label>
                        <input v-model="form.password" type="password" class="form-control"
                            placeholder="Enter password" />
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Confirm Password</label>
                        <input v-model="form.password_confirmation" type="password" class="form-control"
                            placeholder="Confirm password" />
                    </div>
                </div>

                <div v-if="error" class="alert alert-danger py-2">{{ error }}</div>

                <div class="d-md-flex justify-content-between mt-2 mb-1">
                    <div class="d-grid">
                        <button class="btn btn-primary main-btn" :disabled="processing">
                            {{ processing ? "Registering..." : "Sign Up" }}
                        </button>
                    </div>

                    <!-- ✅ Link to Login -->
                    <div class="text-center mt-3">
                        <p class="mb-0 m-color">Are you already registered?
                            <router-link to="/login" class="text-decoration-none" style="color: #5B4C3A;">Sign
                                In</router-link>
                        </p>
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

// ✅ Added password_confirmation field
const form = reactive({
    name: '',
    last_name: '',
    phone: '',
    email: '',
    password: '',
    password_confirmation: ''
})

const error = ref(null)
const processing = ref(false)

async function onSubmit() {
    processing.value = true
    error.value = null
    try {
        await auth.register(form)   // ✅ send confirmation too
        await router.push('/profile')
    } catch (e) {
        error.value =
            e.response?.data?.message ||
            (e.response?.data?.errors ? Object.values(e.response.data.errors)[0][0] : 'Register failed')
    } finally {
        processing.value = false
    }
}
</script>
