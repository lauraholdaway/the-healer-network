<template>
  <div class="verify-email-container">
      <img src="/public/asset/images/Sign.svg" alt="" class="background-sign-img" />
      <div class="verify-email-card">
          <div class="logout-wrapper">
              <button class="btn-logout" @click="logout">Logout</button>
          </div>
          <div class="verify-email-content">
              <div class="logo-wrapper">
                  <router-link to="/">
                      <img src="/public/asset/images/dark-logo.png" alt="Logo" class="logo-img" />
                  </router-link>
              </div>
              <div class="verification-info">
                  <h2 class="verification-title">Email Verification</h2>
                  <p class="verification-text">We have sent you a verification link to your email address</p>
                  <div class="email-display">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="email-icon">
                          <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                          <polyline points="22,6 12,13 2,6"></polyline>
                      </svg>
                      <span class="email-address">{{ auth.user?.email }}</span>
                  </div>
              </div>
              <div class="action-buttons">
                  <div v-if="auth.user.email_verified_at">
                      <router-link class="btn-primary" to="/">Go to Home</router-link>
                  </div>
                  <div v-else>
                      <button class="btn-primary" @click="refreshUser">Continue</button>
                  </div>
                  <button class="btn-send-again" @click="resend">Send Again</button>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
import axios from "axios";
import { useAuthStore } from "@/stores/auth";
import { useRoute, useRouter } from "vue-router";
import { onMounted, ref } from "vue";

export default {
setup() {
  const auth = useAuthStore();
  const route = useRoute();
  const router = useRouter();
  const verified = ref(false);

  onMounted(async () => {
    if (route.query.verified) {
      await refreshUser();
    }
  });

  async function resend() {
    await axios.post("/api/email/verification-notification", {}, {
      headers: { Authorization: `Bearer ${auth.token}` },
    });
    alert("📨 Verification link sent again!");
  }

  async function refreshUser() {
    const res = await axios.get("/api/user", {
      headers: { Authorization: `Bearer ${auth.token}` },
    });
    auth.user = res.data;

    if (auth.user.email_verified_at) {
      verified.value = true;
      alert("✅ Email verified successfully!");
        router.push("/");
    } else {
      alert("❌ Not verified yet. Please check your inbox.");
    }
  }
      async function logout() {
          auth.logout();
      }

  return {
    auth,
    verified,
    refreshUser,
    resend,
      logout,
  };
},
};
</script>

<style scoped>
.verify-email-container {
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #FBF9F7;
  position: relative;
  overflow: hidden;
  padding: 20px;
}

.background-sign-img {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 440px;
  height: auto;
  z-index: 0;
  display: none;
}

@media (min-width: 992px) {
  .background-sign-img {
    display: block;
  }
}

.verify-email-card {
  background: white;
  border-radius: 20px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
  padding: 10px;
  max-width: 500px;
  width: 100%;
  position: relative;
  z-index: 10;
}

.logout-wrapper {
  position: absolute;
  top: 20px;
  right: 20px;
}

.btn-logout {
  background: transparent;
  border: 1px solid #DED1BA;
  color: #5B4C3A;
  padding: 8px 16px;
  border-radius: 8px;
  font-size: 14px;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s ease;
  font-family: 'Avenir', sans-serif;
}

.btn-logout:hover {
  background: #FBF9F7;
  border-color: #8A7356;
  color: #8A7356;
}

.verify-email-content {
  text-align: center;
}

.logo-wrapper {
  margin-bottom:10px;
}

.logo-img {
  height: 200px;
  width: auto;
}

.verification-info {
  margin-bottom: 40px;
}

.verification-title {
  font-family: 'Cormorant Garamond', serif;
  font-size: 32px;
  font-weight: 600;
  color: #2E2D29;
  margin-bottom: 12px;
}

.verification-text {
  font-family: 'Avenir', sans-serif;
  font-size: 15px;
  color: #5B4C3A;
  margin-bottom: 20px;
  line-height: 1.6;
}

.email-display {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: #FBF9F7;
  border: 1px solid #DED1BA;
  border-radius: 12px;
  padding: 12px 20px;
  margin-top: 10px;
}

.email-icon {
  color: #8A7356;
  flex-shrink: 0;
}

.email-address {
  font-family: 'Avenir', sans-serif;
  font-size: 14px;
  color: #2E2D29;
  font-weight: 500;
  word-break: break-all;
}

.action-buttons {
  display: flex;
  gap: 12px;
  justify-content: center;
  flex-wrap: wrap;
}

.btn-primary {
  background: #5B4C3A;
  color: white;
  border: none;
  padding: 12px 28px;
  border-radius: 12px;
  font-size: 15px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  font-family: 'Avenir', sans-serif;
  text-decoration: none;
  display: inline-block;
}

.btn-primary:hover {
  background: #4A3D2F;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(91, 76, 58, 0.2);
}

.btn-send-again {
  background: #8A7356;
  color: white;
  border: none;
  padding: 12px 28px;
  border-radius: 12px;
  font-size: 15px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  font-family: 'Avenir', sans-serif;
}

.btn-send-again:hover {
  background: #6B5B4E;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(138, 115, 86, 0.3);
}

@media (max-width: 576px) {
  .verify-email-card {
      padding: 30px 20px;
  }

  .verification-title {
      font-size: 28px;
  }

  .verification-text {
      font-size: 14px;
  }

  .action-buttons {
      flex-direction: column;
  }

  .btn-primary,
  .btn-send-again {
      width: 100%;
  }
}
</style>

