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
const number = ref("");
const practiceLocation = ref("");
const about = ref("");
const primaryContactNumber = ref("");
const mobileNumber = ref("");
const address = ref("");
const socialMediaHandle = ref("");
const website = ref("");
const languages = ref("");
const price = ref("");
const currency = ref("");
const modalities = ref("");
const practicingSince = ref("");
const clientsPerMonth = ref("");
const freeTrialSessions = ref("");
const happyToProvideFreeSession = ref(false);
const referredBy = ref("");
const Showmodel = ref(false);
const modalitiesdata = ref([]);

// image handling
const image = ref(null);
const preview = ref(null);
const resultcerticate = ref(null);
const fileInput = ref(null);

// ✅ Load user + doctor profile
async function getProfile() {
    try {
        // 1) get user info
        const { data: userData } = await axios.get("/api/user");
        name.value = userData.name ?? "";
        lastName.value = userData.last_name ?? "";
        email.value = userData.email ?? "";
        number.value = userData.number ?? "";

        user.value = userData;

        // 2) get doctor profile info
        const { data: docData } = await axios.get("/api/doctor/profile");

        practiceLocation.value = docData.practice_location ?? "";
        about.value = docData.about ?? "";
        primaryContactNumber.value = docData.primary_contact_number ?? "";
        mobileNumber.value = docData.mobile_number ?? "";
        address.value = docData.address ?? "";
        socialMediaHandle.value = docData.social_media_handle ?? "";
        website.value = docData.website ?? "";
        languages.value = docData.languages ?? "";
        price.value = docData.price ?? "";
        currency.value = docData.currency ?? "";

        console.log(docData.modalities);
        if (Array.isArray(docData.modalities)) {
            modalities.value = docData.modalities.map(m => Number(m.id)); // ensure numeric
        } else if (typeof docData.modalities === "string" && docData.modalities !== "") {
            modalities.value = docData.modalities.split(",").map(id => Number(id.trim()));
        } else {
            modalities.value = [];
        }
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
            practice_location: practiceLocation.value,
            number: number.value,
            primary_contact_number: primaryContactNumber.value,
            mobile_number: mobileNumber.value,
            address: address.value,
            social_media_handle: socialMediaHandle.value,
            website: website.value,
            languages: languages.value,
            price: price.value,
            currency: currency.value,
            modalities: modalities.value,
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
    if (!image.value) return alert('Please select an image!')

    try {
        const formData = new FormData()
        formData.append('profile_image', image.value)

        const res = await axios.post('/api/doctor/update-image', formData, {
            headers: { 'Content-Type': 'multipart/form-data' }
        })

        user.value.image = res.data.image
        image.value = null
        preview.value = null
        alert('Image updated successfully!')
    } catch (err) {
        alert('Image not updated!')
        console.error('Image update failed:', err)
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

// Trigger file input
function triggerFileInput() {
    fileInput.value?.click();
}

const form = ref({
    title: '',
    certificate: null
})

const certificates = ref([])

const handleFile = (e) => {
    form.value.certificate = e.target.files[0]
}

const saveCertificate = async () => {
    try {
        const formData = new FormData()
        formData.append('title', form.value.title)
        formData.append('certificate', form.value.certificate)

        await axios.post('/api/doctor/savecertificate', formData, {
            headers: { 'Content-Type': 'multipart/form-data' }
        })

        await fetchCertificates()
        form.value.title = ''
        form.value.certificate = null
        Showmodel.value = false

    } catch (error) {
        console.error('Error saving certificate:', error)
    }
}

const fetchCertificates = async () => {
    const res = await axios.get('/api/doctor/getcertificate')
    certificates.value = res.data
}

const deleteCertificate = async (id) => {
    if (confirm('Are you sure you want to delete this certificate?')) {
        await axios.delete(`/api/doctor/deletecertificate/${id}`)
        await fetchCertificates()
    }
}
onMounted(async () => {
    try {
        const res = await axios.get("/api/modalities");
        modalitiesdata.value = res.data;
    } catch (err) {
        console.error("Error fetching modalities:", err);
    }
});

onMounted(() => {
    getProfile();
    fetchCertificates();
});
</script>

<template>
    <div class="flex-grow-1">
        <div class="cards shadow-sm p-4">
            <h4 class="mb-4 Seasons-fonts">Basic Information</h4>
            <hr>
            <!-- Profile Image -->
            <div class="text-center mb-4">
                <div class="profile-uploader-container">
                    <!-- Outer Circle -->
                    <div class="outer-circle">
                        <!-- Inner Circle -->
                        <div class="inner-circle">
                            <img v-if="preview || user?.image"
                                :src="preview || (user?.image ? '/storage/' + user.image : '/default-avatar.png')"
                                alt="Doctor Image" class="profile-image" />
                            <svg v-else xmlns="http://www.w3.org/2000/svg" class="user-icon-svg" viewBox="0 0 24 24"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <!-- Upload Button -->
                    <button @click="triggerFileInput" class="upload-button" type="button">
                        <svg width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="camera-icon">
                            <path
                                d="M3.5 4H4.5C5.03043 4 5.53914 3.78929 5.91421 3.41421C6.28929 3.03914 6.5 2.53043 6.5 2C6.5 1.73478 6.60536 1.48043 6.79289 1.29289C6.98043 1.10536 7.23478 1 7.5 1H13.5C13.7652 1 14.0196 1.10536 14.2071 1.29289C14.3946 1.48043 14.5 1.73478 14.5 2C14.5 2.53043 14.7107 3.03914 15.0858 3.41421C15.4609 3.78929 15.9696 4 16.5 4H17.5C18.0304 4 18.5391 4.21071 18.9142 4.58579C19.2893 4.96086 19.5 5.46957 19.5 6V15C19.5 15.5304 19.2893 16.0391 18.9142 16.4142C18.5391 16.7893 18.0304 17 17.5 17H3.5C2.96957 17 2.46086 16.7893 2.08579 16.4142C1.71071 16.0391 1.5 15.5304 1.5 15V6C1.5 5.46957 1.71071 4.96086 2.08579 4.58579C2.46086 4.21071 2.96957 4 3.5 4Z"
                                stroke="#5B4C3A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M7.5 10C7.5 10.7956 7.81607 11.5587 8.37868 12.1213C8.94129 12.6839 9.70435 13 10.5 13C11.2956 13 12.0587 12.6839 12.6213 12.1213C13.1839 11.5587 13.5 10.7956 13.5 10C13.5 9.20435 13.1839 8.44129 12.6213 7.87868C12.0587 7.31607 11.2956 7 10.5 7C9.70435 7 8.94129 7.31607 8.37868 7.87868C7.81607 8.44129 7.5 9.20435 7.5 10Z"
                                stroke="#5B4C3A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="upload-text">Upload Image</span>
                    </button>
                    <!-- Hidden Input -->
                    <input type="file" ref="fileInput" @change="handleImageUpload" accept="image/*"
                        class="hidden-input" />
                </div>
                <div class="mt-3">
                    <button class="btn save-update-btn" @click="updateImage" type="button">
                        Save And Update
                    </button>
                </div>
            </div>
            <!-- Update Form -->
            <form @submit.prevent="updateProfile">
                <div class="row mb-5">
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
                        <input v-model="number" type="text" class="form-control" />
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

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Website</label>
                        <input v-model="website" type="text" class="form-control" />
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Price</label>
                        <input v-model="price" type="text" class="form-control" />
                    </div>
                    <div class="mb-3 col-md-2">
                        <label class="form-label">currency</label>
                        <select v-model="currency" class="form-control">
                            <option value="US">US</option>
                            <option value="USD">USD</option>
                        </select>
                    </div>

                </div>
                <div class="mb-3 ">
                    <label class="form-label">languages</label>
                    <input v-model="languages" type="text" class="form-control" />
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Select Your Modalities</label>

                    <select v-model="modalities" class="form-select form-select-lg border-info" multiple>
                        <option v-for="modalitie in modalitiesdata" :key="modalitie.id" :value="modalitie.id">
                            {{ modalitie.title }}
                        </option>
                    </select>

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
        <div class="shadow-sm p-4">
            <div class="d-flex justify-content-between">
                <div>
                    <h4 class="my-3">Certifications</h4>
                </div>
                <div>
                    <button class="btn main-btn mt-3" @click="Showmodel = true">Add New Certificate</button>
                </div>
            </div>
            <hr>
            <div>
                <div class="mt-4">
                    <div class="row bordere rounded-3">
                        <div class="col-md-3" v-for="cert in certificates" :key="cert.id">
                            <div class="cards p-3">
                                <img :src="'/storage/' + cert.certificate" alt="" class="image-fluid rounded-3"
                                    style="width: 150px; height:160px;object-fit: cover;">
                                <div class="row my-3">
                                    <div class="col-md-9">
                                        <p class="fs-6 fw-bold mt-2">{{ cert.title }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-sm border-0 bg-white"
                                            @click="deleteCertificate(cert.id)">

                                            <svg width="25" height="25" viewBox="0 0 40 40" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0.5" y="0.5" width="39" height="39" rx="7.5"
                                                    stroke="#DED1BA" />
                                                <path
                                                    d="M12 15H28M18 19V25M22 19V25M13 15L14 27C14 27.5304 14.2107 28.0391 14.5858 28.4142C14.9609 28.7893 15.4696 29 16 29H24C24.5304 29 25.0391 28.7893 25.4142 28.4142C25.7893 28.0391 26 27.5304 26 27L27 15M17 15V12C17 11.7348 17.1054 11.4804 17.2929 11.2929C17.4804 11.1054 17.7348 11 18 11H22C22.2652 11 22.5196 11.1054 22.7071 11.2929C22.8946 11.4804 23 11.7348 23 12V15"
                                                    stroke="#8A7356" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div v-if="Showmodel" class="modal-overlay p-5">
                <div class="logout-modal text-center">
                    <button class="close-btn" @click="Showmodel = false">×</button>
                    <form @submit.prevent="saveCertificate">
                        <div class="col-md-12 mb-3">
                            <label>Title</label>
                            <input v-model="form.title" class="form-control" required />
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Certificate</label>
                            <input type="file" class="form-control" @change="handleFile" required />
                        </div>

                        <div class="d-flex justify-content-center gap-2 mt-3">
                            <button type="button" class="btn cancel-btn" @click="Showmodel = false">Cancel</button>
                            <button type="submit" class="btn confirm-btn main-btn">Save</button>
                        </div>
                    </form>

                </div>
            </div>
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

/* Profile Uploader Styles */
.profile-uploader-container {
    position: relative;
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.outer-circle {
    width: 280px;
    height: 280px;
    border-radius: 50%;
    background-color: #d1c8b8;
    display: flex;
    align-items: center;
    justify-content: center;
}

.inner-circle {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    background-color: #C4B39A;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.profile-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.user-icon-svg {
    width: 96px;
    height: 96px;
    color: #F4EFE6;
}

.upload-button {
    position: absolute;
    bottom: 0px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 10px 14px;
    background-color: #C1B39D;
    color: #695D51;
    border: 3px solid white;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    transform: scale(1);
}

.upload-button:hover {
    background-color: #B8A892;
    transform: scale(1.05);
}

.camera-icon {
    width: 20px;
    height: 20px;
}

.upload-text {
    font-family: 'Cormorant Garamond', serif;
    font-size: 16px;
    color: #5B4C3A;
    font-weight: 400;
}

.hidden-input {
    display: none;
}

/* Save And Update Button Styles */
.save-update-btn {
    background-color: #C1B39D;
    color: #4F3C1E;
    border: none;
    border-radius: 8px;
    padding: 12px 24px;
    font-family: 'Cormorant Garamond', serif;
    font-size: 16px;
    font-weight: 500;
    text-transform: capitalize;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: none;
}

.save-update-btn:hover {
    background-color: #B8A892;
    color: #737373;
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.save-update-btn:active {
    transform: translateY(0);
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
}

.save-update-btn:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(193, 179, 157, 0.3);
}

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

/* Mobile Responsive Styles */
@media (max-width: 768px) {
    .outer-circle {
        width: 200px;
        height: 200px;
    }

    .inner-circle {
        width: 120px;
        height: 120px;
    }

    .user-icon-svg {
        width: 72px;
        height: 72px;
    }

    .upload-button {
        padding: 8px 12px;
        font-size: 14px;
    }

    .camera-icon {
        width: 16px;
        height: 16px;
    }

    .save-update-btn {
        width: 100%;
        padding: 14px 24px;
        font-size: 16px;
    }
}

@media (max-width: 576px) {
    .outer-circle {
        width: 160px;
        height: 160px;
    }

    .inner-circle {
        width: 100px;
        height: 100px;
    }

    .user-icon-svg {
        width: 60px;
        height: 60px;
    }

    .upload-button {
        padding: 6px 10px;
        font-size: 13px;
    }

    .upload-text {
        font-size: 14px;
    }

    .save-update-btn {
        padding: 12px 20px;
        font-size: 15px;
    }
}
</style>
