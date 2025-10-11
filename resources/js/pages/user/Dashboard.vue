<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useAuthStore } from "../../stores/auth";

const user = ref(null);
const preview = ref(null);
const auth = useAuthStore();
const showModal = ref(false);

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
        <div class="container-fluid userdashboard-container p-0">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3">
                    <div class="userdashboard-card text-center">
                        <div class="userdashboard-menu">
                            <router-link to="/profile/Chart" class="btn">Dashboard</router-link>
                            <router-link to="/profile/bookings" class="btn">Manage your bookings</router-link>
                            <!-- <router-link to="/profile/Packages" class="btn">Packages</router-link> -->
                            <router-link to="/profile/update-profile" class="btn">Profile</router-link>
                            <router-link to="/profile/settings" class="btn">Settings</router-link>
                            <!-- <router-link to="/profile/help" class="btn">Help Center</router-link> -->
                            <button @click="showModal = true" class="btn logout-btn">
                                Log Out
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Right section for child routes -->
                <div class="col-md-9">
                    <router-view /> <!-- ✅ child pages will render here -->
                </div>
            </div>
        </div>

        <!-- Logout Modal -->
        <div v-if="showModal" class="modal-overlay">
            <div class="logout-modal text-center">
                <button class="close-btn" @click="showModal = false">×</button>
                <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="100" height="100" rx="50" fill="#F4EFE6" />
                    <path
                        d="M45.9997 33.9995H50.0336C53.8375 33.9995 55.7395 33.9995 56.9195 35.1715C57.5795 35.8235 57.8714 36.6994 57.9994 37.9994M45.9997 65.9988H50.0336C53.8375 65.9988 55.7395 65.9988 56.9195 64.8268C57.5795 64.1749 57.8714 63.2989 57.9994 61.9989M65.9993 49.9992H51.9996M62.9993 44.9993C62.9993 44.9993 67.9992 48.6792 67.9992 49.9992C67.9992 51.3191 62.9993 54.9991 62.9993 54.9991M32.786 33.9995C32 35.2335 32 36.8254 32 40.0074V59.9949C32 63.1769 32 64.7688 32.786 65.9988C32.926 66.2188 33.0826 66.4268 33.256 66.6228C34.222 67.7148 35.7539 68.1528 38.8159 69.0268C41.8818 69.9027 43.4158 70.3407 44.5277 69.6847C44.7202 69.5704 44.8994 69.4349 45.0617 69.2807C45.9997 68.3908 45.9997 66.7988 45.9997 63.6049V36.3934C45.9997 33.2015 45.9997 31.6076 45.0617 30.7196C44.8994 30.5654 44.7202 30.4299 44.5277 30.3156C43.4178 29.6596 41.8818 30.0956 38.8139 30.9736C35.7539 31.8475 34.222 32.2855 33.254 33.3775C33.082 33.573 32.9255 33.7796 32.786 33.9995Z"
                        stroke="#8A7356" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <h5 class="fw-semibold mt-3">Logout</h5>
                <p class="text-muted">Are you sure you want to end this session?</p>
                <div class="d-flex justify-content-center gap-2 mt-3">
                    <button class="btn cancel-btn" @click="showModal = false">Cancel</button>
                    <button class="btn confirm-btn main-btn" @click="logout">Confirm Logout</button>
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

.logout-btn {
    background-color: #6c5433;
    color: #fff;
    border-radius: 8px;
    padding: 10px 18px;
    transition: 0.3s;
}

.logout-btn:hover {
    background-color: #5b462b;
}

/* Overlay */
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(43, 29, 15, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1050;
}

/* Modal Box */
.logout-modal {
    background-color: #f8f4ee;
    border-radius: 16px;
    padding: 30px 20px;
    width: 320px;
    position: relative;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
}

/* Close Button */
.close-btn {
    position: absolute;
    top: 12px;
    right: 15px;
    background: transparent;
    border: none;
    font-size: 22px;
    color: #5b4c3a;
    cursor: pointer;
}

/* Icon */
.icon-circle {
    width: 60px;
    height: 60px;
    background-color: #e9dcc5;
    border-radius: 50%;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    color: #6c5433;
}

/* Buttons */
.cancel-btn {
    background-color: #f0e8dc;
    color: #2b1d0f;
    border: none;
    border-radius: 6px;
    padding: 8px 18px;
}

.confirm-btn {
    background-color: #6c5433;
    color: #fff;
    border: none;
    border-radius: 6px;
    padding: 8px 18px;
}

.confirm-btn:hover {
    background-color: #5b462b;
}
</style>
