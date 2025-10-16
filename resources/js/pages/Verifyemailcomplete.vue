<template>
    <div class="d-flex justify-content-center align-items-center vh-100 bg-light">
        <div class="bg-white p-5 rounded-4 shadow-sm">
            <div class="text-center">
                <div class="">
                <router-link to="/"><img src="/public/asset/images/dark-logo.png" alt="Logo" class="img-fluid"
                        style="height: 100px;" /></router-link>
            </div>
            <div>
                <h2>Congratulations</h2>
                <p>Your account has been registered successfully.
                    </p>

            </div>
            <br>
            <div v-if="auth.user.role === '2'">
                <router-link class="btn main-btn px-4 mx-1" to="/profile/Chart" >Continue</router-link>
            </div>
            <div v-else>
                <router-link class="btn main-btn px-4 mx-1" to="/Docterdashboard" >Continue</router-link>
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

