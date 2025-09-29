<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useAuthStore } from "../../stores/auth";

const user = ref(null);
const preview = ref(null);
const auth = useAuthStore();

// ✅ Fetch user on mount
onMounted(async () => {
    try {
        const res = await axios.get("/api/user");
        user.value = res.data;
    } catch (err) {
        console.error("Failed to fetch user:", err);
    }
});

// ✅ Handle Image Upload + Auto Update
async function handleImageUpload(event) {
    const file = event.target.files[0];
    if (!file) return;

    preview.value = URL.createObjectURL(file);

    const formData = new FormData();
    formData.append("profile_image", file);

    try {
        const res = await axios.post("/api/profile/update-image", formData, {
            headers: { "Content-Type": "multipart/form-data" },
            withCredentials: true, // ✅ important for Sanctum
        });

        user.value = res.data; // update user with new image path
        alert("Profile image updated!");
    } catch (err) {
        console.error("Update failed:", err);
        alert("Something went wrong!");
    }
}

function logout() {
    auth.logout();
}
</script>

<template>
    <section>
        <div class="container-fluid userdashboard-container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-4">
                    <div class="userdashboard-card text-center">
                        <label for="uploadImage" style="cursor: pointer;">
                            <img :src="preview || (auth.user?.image ? '/storage/' + auth.user.image : '/default-avatar.png')"
                                alt="User Image" />
                        </label>
                        <input type="file" id="uploadImage" class="d-none" accept="image/*"
                            @change="handleImageUpload" />

                        <h4 class="userdashboard-name">{{ auth.user?.name }}</h4>
                        <p class="userdashboard-joined">Joined since {{ auth.user?.created_at }}</p>

                        <div class="userdashboard-menu">
                            <router-link to="/profile/Chart" class="btn">Dashboard</router-link>
                            <router-link to="/profile/bookings" class="btn">Manage your bookings</router-link>
                            <router-link to="/profile/packages" class="btn">Packages</router-link>
                            <router-link to="/profile/update-profile" class="btn">Edit your profile</router-link>
                            <router-link to="/profile/settings" class="btn">Settings</router-link>
                            <router-link to="/profile/help" class="btn">Help Center</router-link>
                            <button @click="logout" class="btn">Log Out</button>
                        </div>
                    </div>
                </div>

                <!-- Right section for child routes -->
                <div class="col-md-8">
                    <router-view /> <!-- ✅ child pages will render here -->
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
    padding: 40px 0;
}

.userdashboard-card {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    padding: 30px 20px;
}

.userdashboard-card img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
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
    background: #f1eae4;
    border: none;
    text-align: left;
    padding: 10px 15px;
    margin-bottom: 10px;
    font-size: 15px;
    color: #8A7356;
    border-radius: 6px;
    width: 100%;
}

.userdashboard-menu .btn:hover {
    background: #d9b8a6;
    color: #fff;
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
