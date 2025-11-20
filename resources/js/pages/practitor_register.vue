<template>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="cards rounded-4 shadow-lg p-4 my-5" style="max-width: 750px; width: 100%;">
            <!-- Header -->
            <div class="text-center mb-3">
                <router-link to="/" class="healer-network-title-link">
                    <h1 class="healer-network-title">THE HEALER NETWORK</h1>
                </router-link>
            </div>
            <div class="text-center text-md-start mb-3">
                <h3 class="m-color">Sign Up</h3>
                <p style="color: #5B4C3A;">
                    Please provide your full name, email or phone number, and create a strong password to complete
                    your registration.
                </p>
            </div>

            <!-- Form -->
            <form @submit.prevent="onSubmit">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">First Name</label>
                        <input v-model="form.first_name" type="text" class="form-control"
                            placeholder="Enter First Name" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Last Name</label>
                        <input v-model="form.last_name" type="text" class="form-control"
                            placeholder="Enter Last Name" />
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Primary Contact Number</label>
                        <input v-model="form.primary_contact_number" type="text" class="form-control" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Mobile Number</label>
                        <input v-model="form.mobile_number" type="text" class="form-control" />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input v-model="form.address" type="text" class="form-control" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Social Media Handle</label>
                    <input v-model="form.social_media_handle" type="text" class="form-control" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input v-model="form.email" type="email" class="form-control" />
                </div>

                <!-- Modalities -->
                <div class=" mb-3">
                    <div class="card-body">
                        <h5 class="card-title mb-3 text-primary">Select Your Modalities</h5>

                        <select v-model="form.modalities" class="form-select form-select-lg border-info" multiple>
                            <option v-for="modalitie in modalities" :key="modalitie.id" :value="modalitie.id">
                                {{ modalitie.title }}
                            </option>
                        </select>

                        <p class="text-muted mt-2 mb-0">
                            <i class="bi bi-info-circle"></i>
                            Hold <kbd>Ctrl</kbd> (Windows) or <kbd>Cmd</kbd> (Mac) to select multiple.
                        </p>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Practice Location</label>
                    <input v-model="form.practice_location" type="text" class="form-control" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Tell us about yourself</label>
                    <textarea v-model="form.about" class="form-control" rows="3"></textarea>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">How long have you been practicing?</label>
                        <select v-model="form.practicing_since" class="form-select">
                            <option value="Hasn't started yet">Hasn't started yet</option>
                            <option value="1-5">1-5 years</option>
                            <option value="5+">5+ years</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Average Clients per Month</label>
                        <input v-model="form.clients_per_month" type="number" class="form-control" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Free Trial Sessions</label>
                        <input v-model="form.free_trial_sessions" type="number" class="form-control" />
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Happy to Provide Free Trial?</label>
                        <select v-model="form.happy_to_provide_free_session" class="form-select">
                            <option :value="true">Yes</option>
                            <option :value="false">No</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Referred By (Optional)</label>
                    <input v-model="form.referred_by" type="text" class="form-control" />
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Password</label>
                        <input v-model="form.password" type="password" class="form-control" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Confirm Password</label>
                        <input v-model="form.password_confirmation" type="password" class="form-control" />
                    </div>
                </div>

                <div v-if="error" class="alert alert-danger py-2">{{ error }}</div>

                <div class="row my-2">
                    <div class="d-grid col-md-6">
                        <button class="btn btn-primary main-btn" :disabled="processing">
                            {{ processing ? "Registering..." : "Register" }}
                        </button>
                    </div>

                    <div class="text-end mt-3 col-md-6">
                        <p class="mb-0">
                            Already have an account?
                            <router-link to="/login" class="text-decoration-none"
                                style="color: #5B4C3A;">Login</router-link>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

const router = useRouter();
const modalities = ref([]);
const form = ref({
    first_name: "",
    last_name: "",
    primary_contact_number: "",
    mobile_number: "",
    address: "",
    social_media_handle: "",
    email: "",
    modalities: [],
    practice_location: "",
    about: "",
    practicing_since: "",
    clients_per_month: 0,
    free_trial_sessions: 0,
    happy_to_provide_free_session: false,
    referred_by: "",
    password: "",
    password_confirmation: "",
});
const error = ref(null);
const processing = ref(false);

// Fetch modalities
onMounted(async () => {
    try {
        const res = await axios.get("/api/modalities");
        modalities.value = res.data;
    } catch (err) {
        console.error("Error fetching modalities:", err);
    }
});

// Submit form
const onSubmit = async () => {
    processing.value = true;
    error.value = null;
    try {
        await axios.post("/api/practitioners/register", form.value);
        alert('Healar Registration successful!')
        router.push("/login");
    } catch (err) {
        error.value = err.response?.data?.message || "Registration failed.";
    } finally {
        processing.value = false;
    }
};
</script>
