<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useAuthStore } from "../stores/auth";

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

    await axios.post("/api/profile/update-image", formData, {
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
function logout() { auth.logout(); }
</script>

<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card shadow-lg border-0 rounded-3 text-center p-4">
          <!-- ✅ Clickable Image -->
          <label for="uploadImage" style="cursor: pointer;">
            <img
              :src="preview || (auth.user?.image ? '/storage/' + auth.user.image : '/default-avatar.png')"
              class="rounded-circle shadow"
              alt="User Image"
              style="width: 150px; height: 150px; object-fit: cover;"
            />
          </label>

          <!-- ✅ Hidden Input -->
          <input
            type="file"
            id="uploadImage"
            class="d-none"
            accept="image/*"
            @change="handleImageUpload"
          />

          <!-- ✅ User Info -->
          <h4 class="mt-3">{{ user?.name }}</h4>
          <p class="text-muted">{{ user?.email }}</p>
          <p class="text-muted">{{ user?.number }}</p>
          <button class="btn btn-outline-danger btn-sm" @click="logout"> Logout </button>
        </div>
      </div>
    </div>
  </div>
</template>
