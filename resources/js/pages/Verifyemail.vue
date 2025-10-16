<template>
    <div class="d-flex justify-content-center align-items-center vh-100 bg-light">
        <div class="bg-white p-5 rounded-4 shadow-sm">
            <div class="text-center">
                <div class="">
                <router-link to="/"><img src="/public/asset/images/dark-logo.png" alt="Logo" class="img-fluid"
                        style="height: 100px;" /></router-link>
            </div>
            <div>
                <h2>Verification</h2>
                <p>We have sent you a link on your email
                    </p>
                    <span>
                     {{ auth.user?.email }}
                    </span>
            </div>
            <br>
            <div>
                <button class="btn main-btn px-4 mx-1" @click="refreshUser">Continue</button>
                <button class="btn main-btn2 px-4 mx-1" @click="resend">Send Again</button>
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
        router.push("/dashboard");
      } else {
        alert("❌ Not verified yet. Please check your inbox.");
      }
    }

    return {
      auth,
      verified,
      refreshUser,
      resend,
    };
  },
};
</script>

