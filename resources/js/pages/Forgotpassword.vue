<template>
    <div class="d-flex justify-content-center align-items-center vh-100"
        style="background-color: #FBF9F7; position: relative; overflow: hidden; padding: 15px;">

        <img src="/public/asset/images/Sign.svg" alt="" class="d-none d-lg-block"
            style="position: absolute; bottom: 0; left: 0; width: 440px; height: auto; z-index: 0;" />

        <div class="cards shadow p-4 my-5 rounded-5"
            style="max-width: 650px; width: 100%; background-color: white; position: relative; z-index: 10;">
            <div class="row mb-0 align-items-center">
                <div class="col-md-3 order-1 order-md-2 text-md-end text-center">
                    <router-link to="/">
                        <img src="/public/asset/images/dark-logo.png" alt="Logo" class="img-fluid"
                            style="height: 150px;" />
                    </router-link>
                </div>
                <div class="col-md-9 order-2 order-md-1 text-center text-md-start">
                    <h3 class="m-color">Forgot Password</h3>
                    <p style="color: #5B4C3A; font-size: 13px; max-width: 370px;">
                        {{ step === 1 ? 'Enter your email to get a password reset OTP.' :
                            step === 2 ? 'Enter the OTP sent to your email.' :
                        'Set your new password.' }}
                    </p>
                </div>
            </div>

            <hr style="border: 1px solid #DED1BA; margin-top: -8px;">

            <!-- Step 1: Email -->
            <form v-if="step === 1" @submit.prevent="sendOtp">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input v-model="form.email" type="email" class="form-control" required />
                </div>
                <button class="btn main-btn w-100" :disabled="processing">Send OTP</button>
            </form>

            <!-- Step 2: OTP -->
            <form v-else-if="step === 2" @submit.prevent="verifyOtp">
                <div class="mb-3">
                    <label class="form-label">Enter OTP</label>
                    <input v-model="form.otp" type="text" class="form-control" required maxlength="6" />
                </div>
                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input v-model="form.password" type="password" class="form-control" required minlength="6" />
                </div>
                <button class="btn main-btn w-100" :disabled="processing">Verify OTP & Reset</button>
            </form>

            <div v-if="message" class="text-success text-center mt-3">{{ message }}</div>
            <div v-if="error" class="text-danger text-center mt-3">{{ error }}</div>
        </div>
    </div>
</template>

<script setup>
import { reactive, ref } from 'vue'
import axios from 'axios'

const step = ref(1)
const form = reactive({
    email: '',
    otp: '',
    password: ''
})
const message = ref('')
const error = ref('')
const processing = ref(false)

async function sendOtp() {
    processing.value = true
    error.value = message.value = ''
    try {
        const res = await axios.post('/api/findLogin', { email: form.email })
        message.value = res.data.message
        step.value = 2
    } catch (e) {
        error.value = e.response?.data?.message || 'Failed to send OTP'
    } finally {
        processing.value = false
    }
}

async function verifyOtp() {
    processing.value = true
    error.value = message.value = ''
    try {
        const res = await axios.post('/api/verify-otp', form)
        message.value = res.data.message
        setTimeout(() => location.href = '/login', 2000)
    } catch (e) {
        error.value = e.response?.data?.message || 'Invalid OTP'
    } finally {
        processing.value = false
    }
}
</script>

<style scoped>
.form-control {
    border-color: #DED1BA;
}

.main-btn {
    border-radius: 8px;
    background-color: #8A7356;
    color: white;
    border: none;
    padding: 12px;
}

.main-btn:hover {
    background-color: #6B5B47;
}
</style>
 