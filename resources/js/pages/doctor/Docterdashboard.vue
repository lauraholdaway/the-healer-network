<script setup>
import { ref, onMounted, computed } from "vue";
import axios from "axios";
import { useAuthStore } from "../../stores/auth";

const auth = useAuthStore();
const user = ref(null);

const image = ref(null);
const preview = ref(null);

// parse modalities (JSON string → array)
const parsedModalities = computed(() => {
    if (!user.value.modalities) return [];
    try {
        return JSON.parse(user.value.modalities);
    } catch {
        return [];
    }
});

onMounted(async () => {
    try {
        const res = await axios.get("/api/doctor/profile");
        user.value = res.data;
    } catch (err) {
        console.error("Profile load failed:", err);
    }
});


// ✅ Logout
function logout() {
    auth.logout();
}
</script>

<template>
    <div class="d-flex" v-if="auth.user.status === 1">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <h2>Practitioner Panel</h2>
            <router-link to="/Docterdashboard">Dashboard</router-link>
            <router-link to="/Docterdashboard/UserBooking">Appointments</router-link>
            <a href="#">Patients</a>
            <router-link to="/Docterdashboard/setSesion"> Set Session</router-link>
            <router-link to="/Docterdashboard/DoctorTime">Avaible Time</router-link>
            <router-link to="/Docterdashboard/Doctorprofile">Profile</router-link>
            <a href="#" @click="logout" class="logout-btn">Logout</a>
        </div>
        <!-- Content -->
        <div class="content flex-grow-1">

            <div class="col-md-12">
                <router-view /> <!-- ✅ child pages will render here -->
            </div>

        </div>
    </div>
    <div v-else>
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title">Hi : {{ auth?.user?.name }} {{ auth?.user?.last_name }}</h5>
                    <p class="card-text">
                        Please waiting ......
                    <h4>Admin Verifying .....</h4>
                    </p>
                    <div class="text-end">
                        <a href="#" @click="logout" class="logout-btn btn ">Logout</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.sidebar {
    height: auto;
    min-height: fit-content;
        width: 250px;
    background: #eaddcf;
    color: #080808 !important;
}

.sidebar h2 {
    font-size: 22px;
    margin-bottom: 30px;
}

.sidebar a {
    display: block;
    padding: 10px;
    margin: 5px 0;
    text-decoration: none;
    color: #0a0a0a;
    border-radius: 6px;
}

.sidebar a:hover {
    background: #9d8265;
    color: #080808;
}

.logout-btn {
    background: #ef4444;
    color: white !important;
}

.content {
    flex: 1;
}

.profile-pic {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #ddd;
}
</style>
