<template>
  <div class="container">
    <div class="userdashboard-section">
    <h3>Update Your Profile</h3>

    <form @submit.prevent="updateProfile" enctype="multipart/form-data">
      <!-- Name -->
      <div class="mb-3">
        <label class="form-label">First Name</label>
        <input type="text" v-model="form.name" class="form-control" placeholder="Enter first name" />
      </div>

      <!-- Last Name -->
      <div class="mb-3">
        <label class="form-label">Last Name</label>
        <input type="text" v-model="form.last_name" class="form-control" placeholder="Enter last name" />
      </div>

      <!-- Phone Number -->
      <div class="mb-3">
        <label class="form-label">Phone Number</label>
        <input type="text" v-model="form.number" class="form-control" placeholder="Enter phone number" />
      </div>

      <!-- Profile Image -->
      <div class="mb-3">
        <label class="form-label">Profile Image</label>
        <input type="file" @change="handleImageUpload" class="form-control" />
        <div v-if="preview" class="mt-2">
          <img :src="preview" alt="Preview" class="img-thumbnail" width="120" />
        </div>
      </div>

      <!-- New Password -->
      <div class="mb-3">
        <label class="form-label">New Password</label>
        <input type="password" v-model="form.password" class="form-control" placeholder="Enter new password" />
      </div>

      <!-- Submit -->
      <button type="submit" class="btn btn-primary main-btn">Update Profile</button>
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
