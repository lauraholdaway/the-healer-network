<style scoped>
.settings-container {
  min-height: 100vh;

  padding: 40px 20px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.settings-wrapper {
  width: 100%;
  max-width: 700px;
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.settings-card {
  background: #fefcf9;
  border-radius: 16px;
  padding: 32px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
  border: none;
}

.card-title {
  font-size: 24px;
  margin-bottom: 24px;
  margin-top: 0;
}

.form-group {
  margin-bottom: 24px;
}

.form-label {
  display: block;
  font-family: 'Avenir', sans-serif;
  font-size: 14px;
  font-weight: 500;
  color: #2E2D29;
  margin-bottom: 8px;
}

.form-input {
  width: 100%;
  padding: 12px 16px;
  border: 1px solid #e0ddd8;
  border-radius: 8px;
  font-family: 'Avenir', sans-serif;
  font-size: 14px;
  color: #2E2D29;
  background-color: #ffffff;
  transition: border-color 0.2s ease;
}

.form-input:focus {
  outline: none;
  border-color: #C4B39A;
  box-shadow: 0 0 0 2px rgba(196, 179, 154, 0.1);
}

.password-input-wrapper {
  position: relative;
}

.eye-toggle-btn {
  border: none !important;
  background: none !important;
  color: #5B4C3A !important;
  padding: 8px !important;
  border-radius: 4px !important;
  transition: all 0.2s ease !important;
  z-index: 10;
}

.eye-toggle-btn:hover {
  background-color: #F5F5F5 !important;
  color: #C4B39A !important;
}

.eye-toggle-btn:focus {
  outline: none !important;
  box-shadow: none !important;
}

.save-btn {
  background-color: #C4B39A;
  color: white;
  border: none;
  border-radius: 8px;
  padding: 12px 24px;
  font-family: 'Avenir', sans-serif;
  font-size: 14px;
  font-weight: 500;
  cursor: pointer;
  transition: background-color 0.2s ease;
}

.save-btn:hover {
  background-color: #b8a68a;
}

.save-btn:active {
  transform: translateY(1px);
}

/* Responsive design */
@media (max-width: 768px) {
  .settings-container {
    padding: 20px 16px;
  }

  .settings-card {
    padding: 24px;
  }

  .card-title {
    font-size: 20px;
  }
}

.stripe-status {
  padding: 10px 14px;
  border-radius: 8px;
  font-size: 14px;
  font-weight: 500;
  margin-bottom: 16px;
}

.stripe-status.connected {
  background: #e8f8ef;
  color: #1e7f43;
}

.stripe-status.pending {
  background: #fff6e5;
  color: #b7791f;
}

.stripe-status.not {
  background: #fdecec;
  color: #b91c1c;
}

.stripe-desc {
  font-size: 14px;
  color: #4a4a4a;
  margin-bottom: 20px;
  line-height: 1.6;
}

.stripe-note {
  font-size: 12px;
  color: #6b7280;
  margin-top: 14px;
}

</style>
<template>
  <div class="settings-container">
    <div class="settings-wrapper">

      <!-- Stripe Card -->
      <div class="settings-card">
        <h4 class="card-title">Stripe Payout Settings</h4>

        <!-- Status Badge -->
        <div class="stripe-status" :class="statusClass">
          {{ stripeStatusText }}
        </div>

        <!-- Description -->
        <p class="stripe-desc">
          To receive payments from patients, you must connect your Stripe
          account. Stripe securely handles your payments and sends money
          directly to your bank account.
        </p>

        <!-- Action Button -->
        <button
          class="save-btn"
          :disabled="loading || stripeStatus === 'connected'"
          @click="connectStripe"
        >
          {{ buttonText }}
        </button>

        <!-- Small Note -->
        <p class="stripe-note">
          🔒 Your banking details are never shared with us.
        </p>
      </div>

    </div>
  </div>
</template>


 <script setup>
import { ref, onMounted, computed } from 'vue'
import axios from 'axios'

const loading = ref(false)
const stripeStatus = ref('loading') 
// loading | not_connected | pending | connected

onMounted(() => {
  fetchStripeStatus()
})

const fetchStripeStatus = async () => {
  try {
    const res = await axios.get('/api/stripe/status')
    stripeStatus.value = res.data.status
  } catch (e) {
    stripeStatus.value = 'not_connected'
  }
}

const connectStripe = async () => {
  try {
    loading.value = true
    const res = await axios.post('/api/stripe/create-account-link')

    if (res.data?.url) {
      window.location.href = res.data.url
    }
  } catch (error) {
    alert('Unable to connect Stripe. Try again.')
  } finally {
    loading.value = false
  }
}

const stripeStatusText = computed(() => {
  if (stripeStatus.value === 'connected') return '🟢 Stripe Connected'
  if (stripeStatus.value === 'pending') return '🟡 Verification Pending'
  if (stripeStatus.value === 'loading') return 'Checking Stripe status...'
  return '🔴 Stripe Not Connected'
})

const statusClass = computed(() => {
  return {
    connected: stripeStatus.value === 'connected',
    pending: stripeStatus.value === 'pending',
    not: stripeStatus.value === 'not_connected',
  }
})

const buttonText = computed(() => {
  if (stripeStatus.value === 'connected') return 'Stripe Connected'
  if (loading.value) return 'Redirecting...'
  return 'Connect to Stripe'
})
</script>

