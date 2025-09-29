<script setup>
import { ref, onMounted ,computed} from "vue";
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
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <h2>Practitioner Panel</h2>
            <router-link to="/Docterdashboard" >Dashboard</router-link>
            <a href="#">Appointments</a>
            <a href="#">Patients</a>
            <router-link to="Docterdashboard/Doctorprofile">Profile</router-link>
            <a href="#" @click="logout" class="logout-btn">Logout</a>
        </div>
        <!-- Content -->
        <div class="content flex-grow-1">

                <div class="col-md-12">
                    <router-view /> <!-- ✅ child pages will render here -->
                </div>

        </div>
    </div>
</template>

<style scoped>
.sidebar {
    height: auto;
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
