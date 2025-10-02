<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useAuthStore } from "../../stores/auth";

const auth = useAuthStore();

// --- refs ---
const user = ref(null);

// user table fields
const name = ref("");
const lastName = ref("");
const email = ref("");

// doctor profile fields
const phone = ref("");
const practiceLocation = ref("");
const about = ref("");
const primaryContactNumber = ref("");
const mobileNumber = ref("");
const address = ref("");
const socialMediaHandle = ref("");
const website = ref("");
const modalities = ref("");
const practicingSince = ref("");
const clientsPerMonth = ref("");
const freeTrialSessions = ref("");
const happyToProvideFreeSession = ref(false);
const referredBy = ref("");

// image handling
const image = ref(null);
const preview = ref(null);

// ✅ Load user + doctor profile
async function getProfile() {
  try {
    // 1) get user info
    const { data: userData } = await axios.get("/api/user");
    name.value = userData.name ?? "";
    lastName.value = userData.last_name ?? "";
    email.value = userData.email ?? "";
    user.value = userData;

    // 2) get doctor profile info
    const { data: docData } = await axios.get("/api/doctor/profile");

    phone.value = docData.number ?? ""; // fallback if doctor profile has phone
    practiceLocation.value = docData.practice_location ?? "";
    about.value = docData.about ?? "";
    primaryContactNumber.value = docData.primary_contact_number ?? "";
    mobileNumber.value = docData.mobile_number ?? "";
    address.value = docData.address ?? "";
    socialMediaHandle.value = docData.social_media_handle ?? "";
    website.value = docData.website ?? "";
    modalities.value = docData.modalities
      ? Array.isArray(docData.modalities)
        ? docData.modalities.join(", ")
        : JSON.parse(docData.modalities).join(", ")
      : "";
    practicingSince.value = docData.practicing_since ?? "";
    clientsPerMonth.value = docData.clients_per_month ?? "";
    freeTrialSessions.value = docData.free_trial_sessions ?? "";
    happyToProvideFreeSession.value = !!docData.happy_to_provide_free_session;
    referredBy.value = docData.referred_by ?? "";
  } catch (error) {
    console.error("Error loading profile:", error);
  }
}

// ✅ Update profile (both tables)
async function updateProfile() {
  try {
    await axios.post("/api/doctor/update", {
      name: name.value,
      last_name: lastName.value,
      phone: phone.value,
      practice_location: practiceLocation.value,
      primary_contact_number: primaryContactNumber.value,
      mobile_number: mobileNumber.value,
      address: address.value,
      social_media_handle: socialMediaHandle.value,
      website: website.value,
      modalities: modalities.value
        ? modalities.value.split(",").map((m) => m.trim())
        : [],
      about: about.value,
      practicing_since: practicingSince.value,
      clients_per_month: clientsPerMonth.value,
      free_trial_sessions: freeTrialSessions.value,
      happy_to_provide_free_session: happyToProvideFreeSession.value ? 1 : 0,
      referred_by: referredBy.value,
    });

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

// ✅ Handle file preview
function handleImageUpload(e) {
  const file = e.target.files[0];
  if (file) {
    image.value = file;
    preview.value = URL.createObjectURL(file);
  }
}

onMounted(() => {
  getProfile();
});
</script>

<template>
    <div class="content flex-grow-1 p-4">
        <div class="card p-4">
            <h3 class="mb-4">Update Profile</h3>

            <!-- Profile Image -->
            <div class="text-center mb-4">
                <img :src="preview || (user?.image ? '/storage/' + user.image : '/default-avatar.png')"
                    class="profile-pic mb-3" alt="Doctor Image" />
                <div class="d-flex gap-2 justify-content-center">
                    <input type="file" @change="handleImageUpload" class="form-control w-50" />
                    <button class="btn btn-secondary" @click="updateImage">
                        Update Image
                    </button>
                </div>
            </div>

            <!-- Update Form -->
            <form @submit.prevent="updateProfile">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">First Name</label>
                        <input v-model="name" type="text" class="form-control" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Last Name</label>
                        <input v-model="lastName" type="text" class="form-control" />
                    </div>
                </div>

                <!-- Email (not editable) -->
                <div class="mb-3">
                    <label class="form-label">Email (not editable)</label>
                    <input :value="email" type="email" class="form-control" disabled />
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

                <!-- More fields -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Primary Contact Number</label>
                        <input v-model="primaryContactNumber" type="text" class="form-control" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mobile Number</label>
                        <input v-model="mobileNumber" type="text" class="form-control" />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input v-model="address" type="text" class="form-control" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Social Media Handle</label>
                    <input v-model="socialMediaHandle" type="text" class="form-control" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Website</label>
                    <input v-model="website" type="text" class="form-control" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Modalities (comma separated)</label>
                    <input v-model="modalities" type="text" class="form-control" />
                </div>

                <div class="mb-3">
                    <label class="form-label">About</label>
                    <textarea v-model="about" rows="3" class="form-control"></textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Practicing Since</label>
                        <input v-model="practicingSince" type="text" class="form-control" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Clients Per Month</label>
                        <input v-model="clientsPerMonth" type="number" class="form-control" />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Free Trial Sessions</label>
                    <input v-model="freeTrialSessions" type="number" class="form-control" />
                </div>

                <div class="mb-3 form-check">
                    <input v-model="happyToProvideFreeSession" type="checkbox" class="form-check-input"
                        id="freeSessionCheck" />
                    <label class="form-check-label" for="freeSessionCheck"> Happy to Provide Free Session </label>
                </div>

                <div class="mb-3">
                    <label class="form-label">Referred By</label>
                    <input v-model="referredBy" type="text" class="form-control" />
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-4 main-btn">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>
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
