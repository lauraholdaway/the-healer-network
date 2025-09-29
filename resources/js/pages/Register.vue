<template>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4 my-5" style="max-width: 450px; width: 100%;">

      <!-- ✅ Logo -->
      <div class="text-center mb-4">
        <img src="/public/asset/images/dark-logo.png" alt="Logo" class="img-fluid" style="max-height: 60px;" />
        <h3 class="mt-3 m-color">Create Account</h3>
      </div>

      <!-- ✅ Register Form -->
      <form @submit.prevent="onSubmit">
        <div class="mb-3">
          <label class="form-label">First Name</label>
          <input v-model="form.name" type="text" class="form-control" placeholder="Enter your First Name" />
        </div>
        <div class="mb-3">
          <label class="form-label">Last Name</label>
          <input v-model="form.last_name" type="text" class="form-control" placeholder="Enter your Last Name" />
        </div>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input v-model="form.email" type="email" class="form-control" placeholder="Enter your email" />
        </div>

        <div class="mb-3">
          <label class="form-label">Phone Number</label>
          <input v-model="form.phone" type="text" class="form-control" placeholder="Enter your Numbere" />
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input v-model="form.password" type="password" class="form-control" placeholder="Enter password" />
        </div>

        <div class="mb-3">
          <label class="form-label">Confirm Password</label>
          <input v-model="form.password_confirmation" type="password" class="form-control" placeholder="Confirm password" />
        </div>

        <div v-if="error" class="alert alert-danger py-2">{{ error }}</div>

        <div class="d-grid">
          <button class="btn btn-primary main-btn" :disabled="processing">
            {{ processing ? "Registering..." : "Register" }}
          </button>
        </div>
      </form>

      <!-- ✅ Link to Login -->
      <div class="text-center mt-3">
        <p class="mb-0">Already have an account?
          <router-link to="/login" class="text-decoration-none">Login</router-link>
        </p>
      </div>

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
