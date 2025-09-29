<script setup>
import { ref, onMounted ,computed} from 'vue';
import axios from "axios";

import { useAuthStore } from '../../stores/auth';
const auth = useAuthStore();
const user = ref(null);

const image = ref(null);
const preview = ref(null);



// ✅ Handle image upload preview
function handleImageUpload(event) {
    const file = event.target.files[0];
    if (file) {
        image.value = file;
        preview.value = URL.createObjectURL(file);
    }
}
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

</script>

<template>
     <div class="card p-4 m-4">
                <h3 class="mb-4">Practitioner Dashboard</h3>
                <!-- Profile Image -->
                <div class="text-center mb-4">
                    <img :src="preview || (auth.user?.image ? '/storage/' + auth.user.image : '/default-avatar.png')"
                        class="profile-pic mb-3" alt="Doctor Image" />
                    <div class="d-flex gap-2 justify-content-center">
                        <input type="file" @change="handleImageUpload" class="form-control w-50" />
                        <button class="btn btn-secondary" @click="updateImage">Update Image</button>
                    </div>
                </div>
                <!-- Update Form -->
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td>{{ auth.user.name }}</td>
                            <th>Last Name</th>
                            <td>{{ auth.user.last_name }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ auth.user.number }}</td>
                            <th>Email</th>
                            <td>{{ auth.user.email }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td colspan="3">{{ user?.address }}</td>
                        </tr>
                        <tr>
                            <th>Social Media</th>
                            <td>{{ user?.social_media_handle }}</td>
                            <th>Website</th>
                            <td>{{ user?.website ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Practice Location</th>
                            <td>{{ user?.practice_location }}</td>
                            <th>About</th>
                            <td>{{ user?.about }}</td>
                        </tr>
                        <tr>
                            <th>Practicing Since</th>
                            <td>{{ user?.practicing_since }}</td>
                            <th>Clients Per Month</th>
                            <td>{{ user?.clients_per_month }}</td>
                        </tr>
                        <tr>
                            <th>Free Trial Sessions</th>
                            <td>{{ user?.free_trial_sessions }}</td>
                            <th>Happy to Provide Free Session</th>
                            <td>{{ user?.happy_to_provide_free_session ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <th>Referred By</th>
                            <td colspan="3">{{ user?.referred_by }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ user?.created_at }}</td>
                            <th>Updated At</th>
                            <td>{{ user?.updated_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
</template>

<style scoped>
.profile-pic {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #ddd;
}</style>
