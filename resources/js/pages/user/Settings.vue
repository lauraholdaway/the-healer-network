<template>
  <div class="container d-flex justify-content-center align-items-center py-5">
    <div class="w-100" style="max-width: 700px;">

      <!-- Update Email Card -->
      <div class="card shadow-sm border-0 rounded-4 p-4 user-profile-card mb-4">
        <h5 class="mb-3 fw-bold">Update Email</h5>
        <form @submit.prevent="updateEmail">
          <div class="mb-3">
            <label class="form-label">Your Email</label>
            <input
              type="email"
              v-model="emailForm.email"
              class="form-control rounded-3"
              placeholder="youremail@example.com"
            />
          </div>
          <button type="submit" class="btn btn-custom px-4 py-2 rounded-3">
            Save
          </button>
        </form>
      </div>

      <!-- Update Password Card -->
      <div class="card shadow-sm border-0 rounded-4 p-4 user-profile-card">
        <h5 class="mb-3 fw-bold">Update Password</h5>
        <form @submit.prevent="updatePassword">
          <div class="mb-3">
            <label class="form-label">Your Current Password</label>
            <input
              type="password"
              v-model="passwordForm.current_password"
              class="form-control rounded-3"
              placeholder="Enter current password"
            />
          </div>

          <div class="mb-3">
            <label class="form-label">New Password</label>
            <input
              type="password"
              v-model="passwordForm.new_password"
              class="form-control rounded-3"
              placeholder="Enter new password"
            />
          </div>

          <div class="mb-3">
            <label class="form-label">Confirm New Password</label>
            <input
              type="password"
              v-model="passwordForm.new_password_confirmation"
              class="form-control rounded-3"
              placeholder="Confirm new password"
            />
          </div>

          <button type="submit" class="btn btn-custom px-4 py-2 rounded-3">
            Save
          </button>
        </form>
      </div>

    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";
import { useAuthStore } from "@/stores/auth";

const auth = useAuthStore();

// Forms
const emailForm = ref({
  email: auth.user?.email || "",
});

const passwordForm = ref({
  current_password: "",
  new_password: "",
  new_password_confirmation: "",
});

// Update Email
const updateEmail = async () => {
  try {
    const { data } = await axios.post("/api/user/update-email", emailForm.value);
    auth.user.email = data.user.email; // update Pinia store
    alert("Email updated successfully!");
  } catch (error) {
    console.error(error);
    alert("Failed to update email.");
  }
};

// Update Password
const updatePassword = async () => {
  try {
    await axios.post("/api/user/update-password", passwordForm.value);
    alert("Password updated successfully!");
    // reset password form
    passwordForm.value = {
      current_password: "",
      new_password: "",
      new_password_confirmation: "",
    };
  } catch (error) {
    console.error(error);
    alert("Failed to update password.");
  }
};
</script>

<style scoped>
.user-profile-card {
  background: #fdfbf9; /* soft beige */
}
.form-control {
  border-radius: 12px !important;
  padding: 10px 14px;
}
.btn-custom {
  background: #d2b48c;
  color: white;
  font-weight: 500;
}
</style>
