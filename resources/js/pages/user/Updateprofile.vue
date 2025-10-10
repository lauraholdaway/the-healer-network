<template>
    <div class="container d-flex justify-content-center align-items-center py-5">
        <div class="card shadow-sm border-0 rounded-4 p-4 user-profile-card w-100" style="max-width: 900px;">
            <h5 class="mb-4 fw-bold">Basic Information</h5>

            <form @submit.prevent="updateProfile" enctype="multipart/form-data">
                <div class="row g-4">
                    <!-- Left Column (Inputs) -->
                    <div class="col-md-8">
                        <div class="row g-3">
                            <!-- First Name -->
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" v-model="form.name" class="form-control rounded-3"
                                    placeholder="John" />
                            </div>

                            <!-- Last Name -->
                            <div class="col-md-6">
                                <label class="form-label">Second Name</label>
                                <input type="text" v-model="form.last_name" class="form-control rounded-3"
                                    placeholder="Doe" />
                            </div>

                            <!-- Phone Number -->
                            <div class="col-md-12">
                                <label class="form-label">Phone Number</label>
                                <input type="text" v-model="form.number" class="form-control rounded-3"
                                    placeholder="+92 321 586 97 378" />
                            </div>

                            <!-- Location -->
                            <div class="col-md-12">
                                <label class="form-label">Address</label>
                                <input type="text" v-model="form.address" class="form-control rounded-3"
                                    placeholder="US" />
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="mt-4 d-flex gap-3">
                            <button type="submit" class="btn btn-custom main-btn px-4 py-2 rounded-3">
                                Save And Update
                            </button>
                        </div>
                    </div>

                    <!-- Right Column (Profile Image) -->
                    <div class="col-md-4 d-flex flex-column align-items-center justify-content-center">
                        <div class="profile-img-wrapper mb-3">
                            <img v-if="preview"
                                :src="preview || (auth.user?.image ? '/storage/' + auth.user.image : '/default-avatar.png')"
                                class="rounded-circle border shadow-sm" width="120" height="120" alt="Profile" />
                            <div v-else
                                class="default-avatar rounded-circle d-flex align-items-center justify-content-center">
                                <div style="margin-top: 61px;">
                                    <i class="bi bi-person fs-1 text-white"></i>
                                </div>
                            </div>
                        </div>

                        <label class="btn btn-upload rounded-3 px-3 py-2">
                            <i class="bi bi-camera me-2"></i> Upload Image
                            <input type="file" @change="handleImageUpload" hidden />
                        </label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";
import { useAuthStore } from "@/stores/auth";

const auth = useAuthStore();
const preview = ref(null);

// Form data initialized from current user
const form = ref({
    name: auth.user?.name || "",
    last_name: auth.user?.last_name || "",
    number: auth.user?.number || "",
    password: "",
    address: auth.user?.address || "",
    image: null,
});

// Handle file input
const handleImageUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        form.value.image = file;
        preview.value = URL.createObjectURL(file);
    }
};

// Update profile
const updateProfile = async () => {
    try {
        const formData = new FormData();
        formData.append("name", form.value.name);
        formData.append("last_name", form.value.last_name);
        formData.append("number", form.value.number);
        formData.append("address", form.value.address);
        if (form.value.password) {
            formData.append("password", form.value.password);
        }
        if (form.value.image) {
            formData.append("image", form.value.image);
        }

        const { data } = await axios.post("/api/user/update", formData, {
            headers: { "Content-Type": "multipart/form-data" },
        });

        auth.user = data.user; // ✅ Update Pinia store with new user info
        alert("Profile updated successfully!");
    } catch (error) {
        console.error(error);
        alert("Failed to update profile.");
    }
};
</script>
