<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useAuthStore } from "../stores/auth";

const auth = useAuthStore();
const user = ref(null);

const firstName = ref("");
const lastName = ref("");
const phone = ref("");
const practiceLocation = ref("");
const about = ref("");

const image = ref(null);
const preview = ref(null);





// ✅ Update profile
async function updateProfile() {
    try {
        const res = await axios.post("/api/doctor/update", {
            name: firstName.value,
            last_name: lastName.value,
            phone: phone.value,
            practice_location: practiceLocation.value,
            about: about.value,
        });

        user.value = res.data;
        alert("Profile updated successfully!");
    } catch (err) {
        console.error("Update failed:", err);
        alert("Error updating profile!");
    }
}

// ✅ Update profile image
async function updateImage() {
    if (!image.value) return alert("Please select an image!");

    try {
        const formData = new FormData();
        formData.append("profile_image", image.value);

        const res = await axios.post("/api/doctor/update-image", formData, {
            headers: { "Content-Type": "multipart/form-data" },
        });

        user.value.image = res.data.image;
        image.value = null;
        preview.value = null;
        alert("Image updated successfully!");
    } catch (err) {
        console.error("Image update failed:", err);
    }
}

// ✅ Logout
function logout() {
    auth.logout();
}
</script>
<template>
  <div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar p-3">
      <h2>Doctor Panel</h2>
      <router-link to="Docterdashboard">Dashboard</router-link>
      <a href="#">Appointments</a>
      <a href="#">Patients</a>
      <router-link to="Doctorprofile">Profile</router-link>
      <a href="#" @click="logout" class="logout-btn">Logout</a>
    </div>

    <!-- Content -->
    <div class="content flex-grow-1 p-4">
      <div class="card p-4">
        <h3 class="mb-4">Update Profile</h3>

        <!-- Profile Image -->
        <div class="text-center mb-4">
          <img
            :src="preview || (auth.user?.image ? '/storage/' + auth.user.image : '/default-avatar.png')"
            class="profile-pic mb-3"
            alt="Doctor Image"
          />
          <div class="d-flex gap-2 justify-content-center">
            <input type="file" @change="handleImageUpload" class="form-control w-50" />
            <button class="btn btn-secondary" @click="updateImage">Update Image</button>
          </div>
        </div>

        <!-- Update Form -->
        <form @submit.prevent="updateProfile">
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">First Name</label>
              <input v-model="firstName" type="text" value="{{ firstName }}" class="form-control" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Last Name</label>
              <input v-model="lastName" type="text" class="form-control" />
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Phone</label>
              <input v-model="phone" type="text" class="form-control" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Practice Location</label>
              <input v-model="practiceLocation" type="text" class="form-control" />
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">About</label>
            <textarea v-model="about" rows="3" class="form-control"></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Email (not editable)</label>
            <input :value="user?.email" type="email" class="form-control" disabled />
          </div>

          <div class="text-end">
            <button type="submit" class="btn btn-primary px-4">Update Profile</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<style scoped>
.sidebar {
    height: 100vh;
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
