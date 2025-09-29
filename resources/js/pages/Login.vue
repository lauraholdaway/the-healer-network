<template>
    <div class="d-flex justify-content-center align-items-center vh-100 bg-light">
        <div class="card shadow p-4 my-5" style="max-width: 400px; width: 100%;">
            <!-- ✅ Logo -->
            <div class="text-center mb-3">
                <img src="/public/asset/images/dark-logo.png" alt="Logo" class="img-fluid" style="height: 60px;" />
            </div>

            <h3 class="text-center mb-4  m-color">Login</h3>

            <form @submit.prevent="onSubmit">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input v-model="form.email" type="email" class="form-control" required />
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input v-model="form.password" type="password" class="form-control" required />
                </div>

                <div class="d-grid">
                    <button class="btn btn-primary main-btn" :disabled="processing">Login</button>
                </div>

                <div class="d-flex justify-content-between">
                    <div class="mt-3 ">
                    <router-link to="/register">User Register</router-link>
                </div>
                <div class="mt-3 ">
                    <router-link to="/practitor_register">Practitor Register</router-link>
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


        if (auth.user.role === '2') {
            await router.push('/profile/Chart')
        } else {
            await router.push('/Docterdashboard')
        }
    } catch (e) {
        error.value =
            e.response?.data?.message ||
            (e.response?.data?.errors ? Object.values(e.response.data.errors)[0][0] : 'Login failed')
    } finally {
        processing.value = false
    }
}
</script>
