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
    <section>
        <div class="container-fluid userdashboard-container p-0" v-if="auth.user.status === 1">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-4">
                    <div class="userdashboard-card text-center">
                        <div class="userdashboard-menu">
                            <router-link class="btn" to="/Docterdashboard">Dashboard</router-link>
                            <router-link class="btn" to="/Docterdashboard/UserBooking">Appointments</router-link>
                            <router-link class="btn" to="/Docterdashboard/Myservice">My Services</router-link>
                            <router-link class="btn" to="/Docterdashboard/Inbox">Inbox</router-link>
                            <a class="btn" href="#">Patients</a>
                            <router-link class="btn" to="/Docterdashboard/setSesion"> Set Session</router-link>
                            <router-link class="btn" to="/Docterdashboard/DoctorTime">Avaible Time</router-link>
                            <router-link class="btn" to="/Docterdashboard/Doctorprofile">Profile</router-link>
                            <a @click="logout" class="btn logout-btn">Logout</a>
                        </div>
                    </div>
                </div>
                <!-- Right section for child routes -->
                <div class="col-md-8">
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
    </section>
</template>

<style scoped>
/* ✅ Unique styles for dashboard */
.userdashboard-container {
    background: #f5f0eb;
    min-height: 100vh;

}

.userdashboard-card {
    background: #F4EFE6;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    padding: 30px 20px;
    height: 100vh;
}



.userdashboard-name {
    font-size: 20px;
    font-weight: 600;
    margin-top: 10px;
    color: #8A7356;
}

.userdashboard-joined {
    color: #888;
    font-size: 14px;
}

.userdashboard-menu {
    margin-top: 20px;
}

.userdashboard-menu .btn {
    background: #F4EFE6;
    border: 1px solid #DED1BA;
    text-align: left;
    padding: 10px 15px;
    margin-bottom: 10px;
    font-size: 15px;
    color: #5B4C3A;
    border-radius: 6px;
    width: 100%;
}

.userdashboard-menu .btn:hover {
    background: #fffffe;
    color: #5B4C3A;
}

.userdashboard-section h5 {
    color: #8A7356;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

.userdashboard-section p {
    color: #999;
    font-size: 14px;
}

.userdashboard-section .btn {
    background: #435c45;
    color: #fff;
    border: none;
    margin-top: 5px;
}

.userdashboard-section .btn:hover {
    background: #2e4030;
}
</style>
