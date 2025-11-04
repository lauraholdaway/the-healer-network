<template>
    <div class="settings-container">
        <div class="settings-wrapper">

            <!-- Update Email Card -->
            <!-- <div class="settings-card">
        <h5 class="card-title">Update Email</h5>
        <form @submit.prevent="updateEmail">
          <div class="form-group">
            <label class="form-label">Your Email</label>
            <input
              type="email"
              v-model="emailForm.email"
              class="form-input"
              placeholder="johndoe.5357@email.com"
            />
          </div>
          <button type="submit" class="save-btn">
            Save
          </button>
        </form>
      </div> -->

            <!-- Update Password Card -->
            <div class="settings-card">
                <h5 class="Seasons-fonts">Update Password</h5>
                <form @submit.prevent="updatePassword">
                    <div class="form-group">
                        <label class="form-label">Your Current Password</label>
                        <div class="password-input-wrapper">
                            <input :type="showCurrentPassword ? 'text' : 'password'"
                                v-model="passwordForm.current_password" class="form-input" placeholder="********" />
                            <button type="button"
                                class="btn btn-link position-absolute end-0 top-50 translate-middle-y pe-3 eye-toggle-btn"
                                @click="toggleCurrentPassword">
                                <!-- Eye Slash Icon SVG (when password is hidden) -->
                                <svg v-if="!showCurrentPassword" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 7c2.76 0 5 2.24 5 5 0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.43-4.75-1.73-4.39-6-7.5-11-7.5-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 7.13 11.35 7 12 7zM2 4.27l2.28 2.28.46.46C3.08 8.3 1.78 10.02 1 12c1.73 4.39 6 7.5 11 7.5 1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22 21 20.73 3.27 3 2 4.27zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65 0 1.66 1.34 3 3 3 .22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53-2.76 0-5-2.24-5-5 0-.79.2-1.53.53-2.2zm4.31-.78l3.15 3.15.02-.16c0-1.66-1.34-3-3-3l-.17.01z"
                                        fill="currentColor" />
                                </svg>
                                <!-- Eye Icon SVG (when password is visible) -->
                                <svg v-else width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"
                                        fill="currentColor" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">New Password</label>
                        <div class="password-input-wrapper">
                            <input :type="showNewPassword ? 'text' : 'password'" v-model="passwordForm.new_password"
                                class="form-input" placeholder="********" />
                            <button type="button"
                                class="btn btn-link position-absolute end-0 top-50 translate-middle-y pe-3 eye-toggle-btn"
                                @click="toggleNewPassword">
                                <!-- Eye Slash Icon SVG (when password is hidden) -->
                                <svg v-if="!showNewPassword" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 7c2.76 0 5 2.24 5 5 0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.43-4.75-1.73-4.39-6-7.5-11-7.5-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 7.13 11.35 7 12 7zM2 4.27l2.28 2.28.46.46C3.08 8.3 1.78 10.02 1 12c1.73 4.39 6 7.5 11 7.5 1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22 21 20.73 3.27 3 2 4.27zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65 0 1.66 1.34 3 3 3 .22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53-2.76 0-5-2.24-5-5 0-.79.2-1.53.53-2.2zm4.31-.78l3.15 3.15.02-.16c0-1.66-1.34-3-3-3l-.17.01z"
                                        fill="currentColor" />
                                </svg>
                                <!-- Eye Icon SVG (when password is visible) -->
                                <svg v-else width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"
                                        fill="currentColor" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Confirm New Password</label>
                        <div class="password-input-wrapper">
                            <input :type="showConfirmPassword ? 'text' : 'password'"
                                v-model="passwordForm.new_password_confirmation" class="form-input"
                                placeholder="********" />
                            <button type="button"
                                class="btn btn-link position-absolute end-0 top-50 translate-middle-y pe-3 eye-toggle-btn"
                                @click="toggleConfirmPassword">
                                <!-- Eye Slash Icon SVG (when password is hidden) -->
                                <svg v-if="!showConfirmPassword" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 7c2.76 0 5 2.24 5 5 0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.43-4.75-1.73-4.39-6-7.5-11-7.5-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 7.13 11.35 7 12 7zM2 4.27l2.28 2.28.46.46C3.08 8.3 1.78 10.02 1 12c1.73 4.39 6 7.5 11 7.5 1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22 21 20.73 3.27 3 2 4.27zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65 0 1.66 1.34 3 3 3 .22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53-2.76 0-5-2.24-5-5 0-.79.2-1.53.53-2.2zm4.31-.78l3.15 3.15.02-.16c0-1.66-1.34-3-3-3l-.17.01z"
                                        fill="currentColor" />
                                </svg>
                                <!-- Eye Icon SVG (when password is visible) -->
                                <svg v-else width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"
                                        fill="currentColor" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="save-btn">
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
import { useNotification } from "@kyvg/vue3-notification";
const { notify } = useNotification()


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

// Password visibility states
const showCurrentPassword = ref(false);
const showNewPassword = ref(false);
const showConfirmPassword = ref(false);

// Toggle password visibility functions
const toggleCurrentPassword = () => {
  showCurrentPassword.value = !showCurrentPassword.value;
};

const toggleNewPassword = () => {
  showNewPassword.value = !showNewPassword.value;
};

const toggleConfirmPassword = () => {
  showConfirmPassword.value = !showConfirmPassword.value;
};

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
      await axios.post("/api/update-password", passwordForm.value);
      notify({
          title: "Succes",
          text: "You have been Update Password",
      });
    // reset password form
    passwordForm.value = {
      current_password: "",
      new_password: "",
      new_password_confirmation: "",
    };
  } catch (error) {
    console.error(error);
      notify({ type: "error", text: "" + error?.response?.data?.message || 'Unknown error' });

  }
};
</script>

<style scoped>
.settings-container {
  min-height: 100vh;

  padding: 40px 20px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.settings-wrapper {
  width: 100%;
  max-width: 700px;
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.settings-card {
  background: #fefcf9;
  border-radius: 16px;
  padding: 32px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
  border: none;
}

.card-title {
  font-family: 'Cormorant Garamond', serif;
  font-size: 24px;
  font-weight: 600;
  color: #2E2D29;
  margin-bottom: 24px;
  margin-top: 0;
}

.form-group {
  margin-bottom: 24px;
}

.form-label {
  display: block;
  font-family: 'Avenir', sans-serif;
  font-size: 14px;
  font-weight: 500;
  color: #2E2D29;
  margin-bottom: 8px;
}

.form-input {
  width: 100%;
  padding: 12px 16px;
  border: 1px solid #e0ddd8;
  border-radius: 8px;
  font-family: 'Avenir', sans-serif;
  font-size: 14px;
  color: #2E2D29;
  background-color: #ffffff;
  transition: border-color 0.2s ease;
}

.form-input:focus {
  outline: none;
  border-color: #C4B39A;
  box-shadow: 0 0 0 2px rgba(196, 179, 154, 0.1);
}

.password-input-wrapper {
  position: relative;
}

.eye-toggle-btn {
  border: none !important;
  background: none !important;
  color: #5B4C3A !important;
  padding: 8px !important;
  border-radius: 4px !important;
  transition: all 0.2s ease !important;
  z-index: 10;
}

.eye-toggle-btn:hover {
  background-color: #F5F5F5 !important;
  color: #C4B39A !important;
}

.eye-toggle-btn:focus {
  outline: none !important;
  box-shadow: none !important;
}

.save-btn {
  background-color: #C4B39A;
  color: white;
  border: none;
  border-radius: 8px;
  padding: 12px 24px;
  font-family: 'Avenir', sans-serif;
  font-size: 14px;
  font-weight: 500;
  cursor: pointer;
  transition: background-color 0.2s ease;
}

.save-btn:hover {
  background-color: #b8a68a;
}

.save-btn:active {
  transform: translateY(1px);
}

/* Responsive design */
@media (max-width: 768px) {
  .settings-container {
    padding: 20px 16px;
  }

  .settings-card {
    padding: 24px;
  }

  .card-title {
    font-size: 20px;
  }
}
</style>
