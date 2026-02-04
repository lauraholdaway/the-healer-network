<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useAuthStore } from "../../stores/auth";

const user = ref(null);
const preview = ref(null);
const auth = useAuthStore();
const showModal = ref(false);
const sidebarOpen = ref(false);

// ✅ Icon paths served from public directory to avoid Vite import resolution
const ICONS = {
    manage: "/asset/images/D-Manage.svg",
    package: "/asset/images/D-Package.svg",
    profile: "/asset/images/D-Profile.svg",
    inbox: "/asset/images/D-Inbox.svg",
    settings: "/asset/images/D-Settings.svg",
    help: "/asset/images/D-Help Center.svg",
    logout: "/asset/images/D-Logout.svg",
};

const toggleSidebar = () => {
    sidebarOpen.value = !sidebarOpen.value;
};

const closeSidebar = () => {
    sidebarOpen.value = false;
};

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
        <!-- Mobile Hamburger Button -->
        <button class="mobile-menu-toggle" @click="toggleSidebar" :class="{ active: sidebarOpen }">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <!-- Mobile Sidebar Overlay -->
        <div class="sidebar-overlay" :class="{ active: sidebarOpen }" @click="closeSidebar"></div>

        <div class="container-fluid userdashboard-container p-0">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3 sidebar-wrapper" :class="{ active: sidebarOpen }">
                    <div class="userdashboard-card text-center">
                        <div class="userdashboard-menu">
                            <router-link to="/profile/Chart"
                                class="btn menu-btn d-flex align-items-center justify-content-between"
                                @click="closeSidebar">
                                <span class="d-flex align-items-center gap-2">
                                    <img :src="ICONS.manage" alt="Manage" class="menu-icon" />
                                    <span>Dashboard</span>
                                </span>
                            </router-link>

                            <router-link to="/profile/bookings"
                                class="btn menu-btn d-flex align-items-center justify-content-between"
                                @click="closeSidebar">
                                <span class="d-flex align-items-center gap-2">
                                    <img :src="ICONS.package" alt="Package" class="menu-icon" />
                                    <span>Manage Your Bookings</span>
                                </span>
                            </router-link>
                            <!-- <router-link to="/profile/packages"
                                class="btn menu-btn d-flex align-items-center justify-content-between"
                                @click="closeSidebar">
                                <span class="d-flex align-items-center gap-2">
                                    <img :src="ICONS.package" alt="Package" class="menu-icon" />
                                    <span>Package</span>
                                </span>
                            </router-link> -->

                            <router-link to="/profile/update-profile"
                                class="btn menu-btn d-flex align-items-center justify-content-between"
                                @click="closeSidebar">
                                <span class="d-flex align-items-center gap-2">
                                    <img :src="ICONS.profile" alt="Profile" class="menu-icon" />
                                    <span>Profile</span>
                                </span>
                            </router-link>

                            <!-- <router-link to="/profile/inbox"
                                class="btn menu-btn d-flex align-items-center justify-content-between"
                                @click="closeSidebar">
                                <span class="d-flex align-items-center gap-2">
                                    <img :src="ICONS.inbox" alt="Inbox" class="menu-icon" />
                                    <span>Inbox</span>
                                </span>
                            </router-link> -->

                            <router-link to="/profile/settings"
                                class="btn menu-btn d-flex align-items-center justify-content-between"
                                @click="closeSidebar">
                                <span class="d-flex align-items-center gap-2">
                                    <img :src="ICONS.settings" alt="Settings" class="menu-icon" />
                                    <span>Settings</span>
                                </span>
                            </router-link>

                            <router-link to="/profile/help"
                                class="btn menu-btn d-flex align-items-center justify-content-between d-none"
                                @click="closeSidebar">
                                <span class="d-flex align-items-center gap-2">
                                    <img :src="ICONS.help" alt="Help Center" class="menu-icon" />
                                    <span>Help Center</span>
                                </span>
                            </router-link>

                            <button @click="showModal = true; closeSidebar()"
                                class="btn menu-btn logout-btn d-flex align-items-center justify-content-between">
                                <span class="d-flex align-items-center gap-2">
                                    <img :src="ICONS.logout" alt="Logout" class="menu-icon" />
                                    <span class="Seasons-fonts">Logout</span>
                                </span>
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
                <div class="modal-icon">
                    <svg width="80" height="80" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="100" height="100" rx="50" fill="#F4EFE6" />
                        <path
                            d="M45.9997 33.9995H50.0336C53.8375 33.9995 55.7395 33.9995 56.9195 35.1715C57.5795 35.8235 57.8714 36.6994 57.9994 37.9994M45.9997 65.9988H50.0336C53.8375 65.9988 55.7395 65.9988 56.9195 64.8268C57.5795 64.1749 57.8714 63.2989 57.9994 61.9989M65.9993 49.9992H51.9996M62.9993 44.9993C62.9993 44.9993 67.9992 48.6792 67.9992 49.9992C67.9992 51.3191 62.9993 54.9991 62.9993 54.9991M32.786 33.9995C32 35.2335 32 36.8254 32 40.0074V59.9949C32 63.1769 32 64.7688 32.786 65.9988C32.926 66.2188 33.0826 66.4268 33.256 66.6228C34.222 67.7148 35.7539 68.1528 38.8159 69.0268C41.8818 69.9027 43.4158 70.3407 44.5277 69.6847C44.7202 69.5704 44.8994 69.4349 45.0617 69.2807C45.9997 68.3908 45.9997 66.7988 45.9997 63.6049V36.3934C45.9997 33.2015 45.9997 31.6076 45.0617 30.7196C44.8994 30.5654 44.7202 30.4299 44.5277 30.3156C43.4178 29.6596 41.8818 30.0956 38.8139 30.9736C35.7539 31.8475 34.222 32.2855 33.254 33.3775C33.082 33.573 32.9255 33.7796 32.786 33.9995Z"
                            stroke="#8A7356" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>

                <h4 class=" Seasons-fonts">Logout</h4>
                <p class="modal-message">Are you sure you want to end this session?</p>
                <div class="modal-buttons">
                    <button class="btn cancel-btn Seasons-fonts" @click="showModal = false">Cancel</button>
                    <button class="btn confirm-btn Seasons-fonts text-white" @click="logout">Confirm, Logout</button>
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

.userdashboard-container .row {
    min-height: 100vh;
}

.userdashboard-container .col-md-3 {
    height: 100vh;
    position: sticky;
    top: 0;
    overflow-y: auto;
}

/* Custom scrollbar for sidebar */
.userdashboard-container .col-md-3::-webkit-scrollbar {
    width: 5px;
}

.userdashboard-container .col-md-3::-webkit-scrollbar-track {
    background: #E9DCC5;
}

.userdashboard-container .col-md-3::-webkit-scrollbar-thumb {
    background: #8A7356;
    border-radius: 10px;
}

.userdashboard-container .col-md-3::-webkit-scrollbar-thumb:hover {
    background: #5B4C3A;
}

/* Content area with scroll */
.userdashboard-container .col-md-9 {
    max-height: 100vh;
    overflow-y: auto;
    padding: 20px;
}

/* Custom scrollbar for content */
.userdashboard-container .col-md-9::-webkit-scrollbar {
    width: 6px;
}

.userdashboard-container .col-md-9::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.userdashboard-container .col-md-9::-webkit-scrollbar-thumb {
    background: #8A7356;
    border-radius: 10px;
}

.userdashboard-container .col-md-9::-webkit-scrollbar-thumb:hover {
    background: #5B4C3A;
}

.userdashboard-card {
    background: #F4EFE6;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    padding: 30px 20px;
    height: 100%;
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

.menu-btn {
    gap: 8px;
}

.menu-icon {
    width: 22px;
    height: 22px;
}

.userdashboard-menu .btn:hover {
    background: #fffffe;
    color: #5B4C3A;
}

/* Active route link: make background white */
.userdashboard-menu .btn.router-link-active,
.userdashboard-menu .btn.router-link-exact-active {
    background: #ffffff;
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
    background-color: #ffffff;
    border-radius: 20px;
    padding: 40px 30px;
    width: 420px;
    max-width: 90vw;
    position: relative;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    border: 1px solid #f0f0f0;
}

/* Close Button */
.close-btn {
    position: absolute;
    top: 15px;
    right: 20px;
    background: #f8f9fa;
    border: none;
    border-radius: 50%;
    width: 32px;
    height: 32px;
    font-size: 18px;
    color: #6c757d;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}

.close-btn:hover {
    background: #e9ecef;
    color: #495057;
}

/* Modal Icon */
.modal-icon {
    margin-bottom: 20px;
}

/* Modal Title */
.modal-title {
    color: #2c3e50;
    font-weight: 600;
    font-size: 24px;
    margin-bottom: 12px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Modal Message */
.modal-message {
    color: #6c757d;
    font-size: 16px;
    margin-bottom: 30px;
    line-height: 1.5;
}

/* Modal Buttons */
.modal-buttons {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-top: 25px;
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
    background-color: #DED1BA;

    color: #8A7356;
    font-family: 'Cormorant Garamond', serif;
    border-radius: 8px;
    padding: 12px 24px;
    font-weight: 500;
    font-size: 14px;
    transition: all 0.2s ease;
    min-width: 100px;
}

.cancel-btn:hover {
    background-color: #5B4C3A;
    border-color: #dee2e6;
    color: #ffffff;
}

.confirm-btn {
    background-color: #8A7356;
    color:#F4EFE6;
    font-family: 'Courier New', Courier, monospace;

    border-radius: 8px;
    padding: 12px 24px;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.2s ease;
    min-width: 120px;
}

.confirm-btn:hover {
    background-color: #5B4C3A;

}

/* Mobile Hamburger Menu Button */
.mobile-menu-toggle {
    display: none;
    position: fixed;
    top: 80px;
    right: 20px;
    z-index: 1100;
    background: #F4EFE6;
    border: 1px solid #DED1BA;
    border-radius: 8px;
    width: 45px;
    height: 45px;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 5px;
    padding: 10px;
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.mobile-menu-toggle span {
    width: 25px;
    height: 3px;
    background: #5B4C3A;
    border-radius: 2px;
    transition: all 0.3s ease;
}

.mobile-menu-toggle.active span:nth-child(1) {
    transform: rotate(45deg) translate(7px, 7px);
}

.mobile-menu-toggle.active span:nth-child(2) {
    opacity: 0;
}

.mobile-menu-toggle.active span:nth-child(3) {
    transform: rotate(-45deg) translate(7px, -7px);
}

/* Sidebar Overlay for Mobile */
.sidebar-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1040;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.sidebar-overlay.active {
    opacity: 1;
}

/* Mobile Responsive Styles */
@media (max-width: 992px) {
    .mobile-menu-toggle {
        display: flex;
    }

    .sidebar-overlay {
        display: block;
        pointer-events: none;
    }

    .sidebar-overlay.active {
        pointer-events: all;
    }

    .userdashboard-container .row {
        min-height: auto;
    }

    .userdashboard-container .col-md-3 {
        position: fixed;
        top: 0;
        left: -100%;
        width: 280px;
        height: 100vh;
        z-index: 1050;
        transition: left 0.3s ease;
        padding: 0;
    }

    .userdashboard-container .col-md-3.sidebar-wrapper.active {
        left: 0;
    }

    .userdashboard-card {
        height: 100vh;
        border-radius: 0;
    }

    .userdashboard-container .col-md-9 {
        width: 100%;
        max-width: 100%;
        padding: 80px 15px 20px 15px;
        max-height: none;
    }
}

@media (max-width: 768px) {
    .mobile-menu-toggle {
        top: 75px;
        right: 15px;
        width: 40px;
        height: 40px;
    }

    .mobile-menu-toggle span {
        width: 22px;
        height: 2.5px;
    }

    .userdashboard-container .col-md-3 {
        width: 260px;
    }

    .userdashboard-card {
        padding: 20px 15px;
    }

    .userdashboard-menu .btn {
        padding: 10px 12px;
        font-size: 14px;
    }

    .menu-icon {
        width: 20px;
        height: 20px;
    }
}

@media (max-width: 480px) {
    .mobile-menu-toggle {
        top: 70px;
        right: 12px;
        width: 38px;
        height: 38px;
    }

    .mobile-menu-toggle span {
        width: 20px;
        height: 2px;
    }

    .userdashboard-container .col-md-3 {
        width: 240px;
    }

    .userdashboard-card {
        padding: 15px 10px;
    }

    .userdashboard-menu .btn {
        padding: 8px 10px;
        font-size: 13px;
        margin-bottom: 8px;
    }

    .menu-icon {
        width: 18px;
        height: 18px;
    }

    .userdashboard-container .col-md-9 {
        padding: 70px 10px 15px 10px;
    }
}
</style>
