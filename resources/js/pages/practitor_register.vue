<template>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="cards rounded-4 shadow-lg p-4 my-5" style="max-width: 750px; width: 100%;">
            <!-- Logo -->
            <div class="row mb-2 align-items-center">
                <!-- Logo (show first on mobile) -->
                <div class="col-md-3 order-1 order-md-2 text-md-end text-center mb-3 mb-md-0">
                    <img src="/public/asset/images/dark-logo.png" alt="Logo" class="img-fluid" style="height: 100px;" />
                </div>

                <!-- Sign Up text (show after logo on mobile) -->
                <div class="col-md-9 order-2 order-md-1 text-center text-md-start">
                    <h3 class="m-color">Sign Up</h3>
                    <p style="color: #5B4C3A;">
                        Please provide your full name, email or phone number, and create a strong password to complete
                        your registration.
                    </p>
                </div>
            </div>
            <br>
            <!-- Register Form -->
            <form @submit.prevent="onSubmit">
                <!-- Basic Info -->
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

                <!-- Modality -->
                <div class="mb-3">
                    <label class="form-label">Which modality are you offering?</label>
                    <select v-model="form.modalities" class="form-select" multiple>
                        <option value="Akashic Therapy">Akashic Therapy</option>
                        <option value="Access Bars">Access Bars</option>
                        <option value="Access Space and Land Clearing">Access Space and Land Clearing</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Practice Location</label>
                    <input v-model="form.practice_location" type="text" class="form-control" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Tell us about yourself</label>
                    <textarea v-model="form.about" class="form-control" rows="3"></textarea>
                </div>

                <!-- Experience -->
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



                <!-- Referral -->
                <div class="mb-3">
                    <label class="form-label">Referred By (Optional)</label>
                    <input v-model="form.referred_by" type="text" class="form-control" />
                </div>

                <!-- Password -->
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

                <!-- Error -->
                <div v-if="error" class="alert alert-danger py-2">{{ error }}</div>

                <!-- Submit -->
                <div class="row my-2">
                    <div class="d-grid col-md-6">
                        <button class="btn btn-primary main-btn" :disabled="processing">
                            {{ processing ? "Registering..." : "Register" }}
                        </button>
                    </div>
                    <!-- Link to Login -->
                    <div class="text-end mt-3 col-md-6">
                        <p class="mb-0">Already have an account?
                            <router-link to="/login" class="text-decoration-none"
                                style="color: #5B4C3A;">Login</router-link>
                        </p>
                    </div>
                </div>

            </form>


        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            form: {
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
            },
            error: null,
            processing: false,
        };
    },
    methods: {
        async onSubmit() {
            this.processing = true;
            this.error = null;

            try {
                await axios.post("/api/practitioners/register", this.form);
                this.$router.push("/login"); // redirect to login after success
            } catch (err) {
                this.error = err.response?.data?.message || "Registration failed.";
            } finally {
                this.processing = false;
            }
        },
    },
};
</script>
