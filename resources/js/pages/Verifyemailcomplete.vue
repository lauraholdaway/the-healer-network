<template>
    <div class="d-flex justify-content-center align-items-center vh-100 bg-light">
        <div class="bg-white p-5 rounded-4 shadow-sm">
            <div class="text-center">
                <div class="text-center mb-3">
                    <router-link to="/" class="healer-network-title-link" style="text-decoration: none !important; border-bottom: none !important;">
                        <div class="logo-container">
                            <img src="/public/asset/images/logo.svg" alt="Logo" class="login-logo">
                        </div>
                    </router-link>
                </div>
                <div>
                    <h2>Congratulations</h2>
                    <p>Your account has been registered successfully.
                    </p>

                </div>
                <br>
                <div v-if="auth.user?.role">
                    <div v-if="auth.user.role === '2'">
                        <router-link class="btn main-btn px-4 mx-1" to="/profile/Chart">Continue</router-link>
                    </div>
                    <div v-else>
                        <router-link class="btn main-btn px-4 mx-1" to="/Docterdashboard">Continue</router-link>
                    </div>
                </div>
                <div v-else>
                    <router-link class="btn main-btn px-4 mx-1" to="/">Home</router-link>
                </div>

            </div>
        </div>
    </div>
</template>

<script setup>
import { useAuthStore } from "@/stores/auth";
import { useRoute, useRouter } from "vue-router";
const auth = useAuthStore();

</script>

