<template>
    <section class="booking-section py-5">
        <div class="container">
            <div class="row g-4 align-items-start">
                <!-- Left Profile Card -->
                <div class="col-md-4" v-if="doctor">
                    <div class="card card-custom">
                        <div class="position-relative d-flex justify-content-center"
                            style="background: linear-gradient(180deg, #c4b39a 0%, rgb(91 76 58 / 41%) 100%); border-radius: 20px; overflow: hidden; padding: 10px; min-height: 300px;">
                            <!-- ✅ safe optional chaining -->
                            <img :src="doctor?.user?.image ? '/storage/' + doctor.user.image : '/public/asset/images/docter.png'"
                                class="card-img-top" alt="Doctor Image" 
                                style="width: 100%; height: 100%; object-fit: contain;" />
                            <div class="position-absolute top-0 end-0 p-2">
                                <!-- avatar svg -->
                            </div>
                            <!-- tags -->
                            <div class="position-absolute bottom-0 mb-3" style="left: 20%;">
                                <div class="d-flex justify-content-center">
                                    <div>
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="32" height="32" rx="16" fill="#DED1BA" />
                                            <path d="M19.8974 14.0388V17.8847L23 20.5V11.5L19.8974 14.0388Z"
                                                stroke="#2E2D29" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M9.68989 11.5H17.5299C18.6717 11.5 19.8889 12.4023 19.8889 13.6023V19.7493C19.8908 19.9455 19.8121 20.1345 19.67 20.275C19.528 20.4155 19.334 20.4961 19.1306 20.4993H11.0627C9.76611 20.4993 9 19.3742 9 18.2492L9.00778 12.2493C8.99315 12.1545 9.00003 12.0578 9.02797 11.9659C9.0559 11.8739 9.10421 11.7889 9.16956 11.7168C9.23411 11.6455 9.31447 11.5891 9.40467 11.5519C9.49488 11.5146 9.59263 11.4974 9.69067 11.5015L9.68989 11.5Z"
                                                stroke="#2E2D29" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        <span class="tag">Online</span>
                                    </div>
                                    <div>
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="32" height="32" rx="16" fill="#DED1BA" />
                                            <path
                                                d="M18.7222 16H16V12.1111M9 16C9 16.9193 9.18106 17.8295 9.53284 18.6788C9.88463 19.5281 10.4002 20.2997 11.0503 20.9497C11.7003 21.5998 12.4719 22.1154 13.3212 22.4672C14.1705 22.8189 15.0807 23 16 23C16.9193 23 17.8295 22.8189 18.6788 22.4672C19.5281 22.1154 20.2997 21.5998 20.9497 20.9497C21.5998 20.2997 22.1154 19.5281 22.4672 18.6788C22.8189 17.8295 23 16.9193 23 16C23 15.0807 22.8189 14.1705 22.4672 13.3212C22.1154 12.4719 21.5998 11.7003 20.9497 11.0503C20.2997 10.4002 19.5281 9.88463 18.6788 9.53284C17.8295 9.18106 16.9193 9 16 9C15.0807 9 14.1705 9.18106 13.3212 9.53284C12.4719 9.88463 11.7003 10.4002 11.0503 11.0503C10.4002 11.7003 9.88463 12.4719 9.53284 13.3212C9.18106 14.1705 9 15.0807 9 16Z"
                                                stroke="#2E2D29" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg><span class="tag">30 Minutes</span>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <!-- ✅ safe name -->
                            <div class="text-center">
                                <h5 class="card-title fw-bold">{{ doctor?.user?.name }}</h5>

                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <p class="docter-type px-3 py-1 text-center" v-for="item in doctor.modalities"
                                    style="width:auto;">{{ item.title }}</p>
                            </div>
                            <div class="d-flex justify-content-between my-3">
                            </div>
                            <!-- ✅ limit to 20 words -->
                            <p class="card-text m-color fw-bold text-center">
                                Wednesday 8 October 2025 11:30 am
                            </p>

                            <div
                                style="background-color: #5B4C3A;border-radius: 10px; padding: 20px;color:white; text-align: center;">

                                <p class="text-white">Freshwater NSW 2096, Australia</p>
                                <hr>
                                <b class="text-white">
                                    ${{ doctor?.price }}
                                </b>
                            </div>
                            <br>
                            <div>
                                <p style="background-color: #F4EFE6;border-radius: 10px;padding: 10px;">
                                    Every practitioner on Bodhi Holistic Hub is carefully vetted, highly rated and a
                                    certified expert in their fields.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Booking Form -->
                <div class="col-md-8">
                    <div class="booking-wrapper  shadow-sm rounded-4 bg-white mt-3 p-5">
                        <div class="d-flex justify-content-center">
                            <h5 class="fw-bold mb-3 m-color">Book a session</h5>
                        </div>

                        <!-- Stepper -->
                        <div class="stepper d-flex justify-content-between align-items-center mb-4">
                            <div class="step" :class="{ active: step >= 1 }">1</div>
                            <div class="line"></div>
                            <div class="step" :class="{ active: step >= 2 }">2</div>
                            <div class="line"></div>
                            <div class="step" :class="{ active: step >= 3 }">3</div>
                            <div class="line"></div>
                            <div class="step" :class="{ active: step >= 4 }">4</div>
                        </div>

                        <div>
                            <div class="d-flex justify-content-center">
                                <h5 class="fw-bold mb-3 m-color">Select a session</h5>

                            </div>

                            <div class="d-flex justify-content-center">

                                <select v-model="setimezone" class="form-select mb-3"
                                    style="background-color: #F4EFE6; width: 200px; padding: 10px; border-radius: 10px;">
                                    <option value="AU">Australia (GMT+10)</option>
                                    <option value="US">United States (GMT-5)</option>
                                    <option value="PK">Pakistan (GMT+5)</option>
                                </select>
                            </div>
                        </div>
                        <div v-if="step === 1">

                            <!-- Dropdown -->
                            <select v-model="docterPackage" class="form-select mb-3">
                                <option v-for="(pkgata, index) in packagesdata" :key="index" :value="pkgata.id"
                                    :selected="index === 0">
                                    {{ pkgata.type }} ({{ pkgata.price }}, {{ pkgata.time }})
                                </option>
                            </select>


                            <div class="text-center">
                                <!-- Radio -->
                                <div class="form-check mb-4 d-flex justify-content-center align-item-center">
                                    <div class="p-1 mt-2"
                                        style="background-color: #7D684E; border-radius: 50%; width: 12px; height: 12px;">
                                    </div>
                                    <label class="form-check-label m-color ms-2">Online session</label>
                                </div>

                                <!-- Buttons -->
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-outline-dark btn-outline-custome px-5">Back</button>

                                    <button v-if="auth?.user?.id" class="btn btn-dark main-btn2 px-5 rounded-4 ms-3"
                                        @click="handleNext">
                                        Next
                                    </button>

                                    <router-link v-else to="/login"
                                        class="btn btn-dark main-btn2 px-5 rounded-4 ms-3">Login</router-link>

                                </div>
                            </div>
                        </div>
                        <div v-if="step === 2">

                            <div class="text-center m-2">

                                <div class="accordion" id="accordionExample">
                                    <!-- Item 1 -->

                                    <div class="accordion-item m-4" v-for="(tm, index) in doctortime" :key="index">
                                        <h2 class="accordion-header" :id="`heading${index}`">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" :data-bs-target="`#collapse${index}`"
                                                aria-expanded="false" :aria-controls="`collapse${index}`">
                                                {{ new Date(tm.date).toLocaleString('en-US', {
    day: '2-digit', month: 'short', year:
        'numeric'
                                                }) }}
                                            </button>
                                        </h2>

                                        <div :id="`collapse${index}`" class="accordion-collapse collapse"
                                            :aria-labelledby="`heading${index}`" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">

                                                <div class="" role="group" aria-label="Time Slot">
                                                    <template v-for="(time, tIndex) in tm.times" :key="tIndex">
                                                        <input type="radio" class="btn-check"
                                                            :name="`time-group-${index}`" :id="`time${index}-${tIndex}`"
                                                            :value="time" v-model="selectedTime"
                                                            @change="selectedDate = tm.date" />

                                                        <label class="btn btn-outline-dark btn-outline-custome"
                                                            :for="`time${index}-${tIndex}`">
                                                            {{ formatTime(time) }}
                                                        </label>
                                                    </template>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-check mb-4 d-flex justify-content-center align-item-center">
                                        <div class="p-1 mt-2"
                                            style="background-color: #7D684E; border-radius: 50%; width: 12px; height: 12px;">
                                        </div>
                                        <label class="form-check-label m-color ms-2">Online session</label>
                                    </div>
                                </div>
                                <!-- Buttons -->
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-outline-dark btn-outline-custome px-5"
                                        @click="handleBack">Back</button>
                                    <button class="btn btn-dark main-btn2 px-5 rounded-4 ms-3" @click="handleNext">
                                        Next
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div v-if="step === 3">

                            <div class="p-2">

                                <h3 class="m-color text-center my-4">Confirm your details</h3>

                                <div class="my-1">
                                    <b>Name :</b> <span>{{ auth?.user?.name }}</span>
                                </div>
                                <div class="my-1">
                                    <b>Email :</b> <span>{{ auth?.user?.email }}</span>
                                </div>
                                <div class="my-1">
                                    <b>Phone :</b> <span>{{ auth?.user?.number }}</span>
                                </div>
                                <br>
                                <span
                                    style="background-color: #F4EFE6;padding: 10px;border-radius: 20px;margin: 10px;">Booking
                                    reminders will be sent via email and text</span>
                                <!-- Buttons -->
                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-outline-dark btn-outline-custome px-5"
                                        @click="handleBack">Back</button>
                                    <button class="btn btn-dark main-btn2 px-5 rounded-4 ms-3" @click="handleNext">
                                        Confirm
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div v-if="step === 4">
                            <div class="">
                                <h5 class="fw-bold text-center m-color">Payment</h5>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input v-model="email" type="email" class="form-control"
                                        placeholder="Enter your Email" required />
                                </div>
                                <label class="form-label">Card information</label>
                                <!-- ✅ Single Stripe Card Input -->
                                <div id="card-element"></div>
                                <div class="mb-3">
                                    <label class="form-label">Cardholder name</label>
                                    <input v-model="name" type="text" class="form-control"
                                        placeholder="Enter your Name" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Country or region</label>
                                    <select v-model="setcountry" class="form-select">
                                        <option value="US">United States</option>
                                        <option value="AU">Australia</option>
                                    </select>
                                </div>
                                <div>
                                    <div v-if="Object.keys(errors).length" class="alert alert-danger">
                                        <ul class="mb-0">
                                            <li v-for="(message, field) in errors" :key="field">
                                                {{ message }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Buttons -->
                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-outline-dark btn-outline-custome px-5"
                                        @click="handleBack">Back</button>
                                    <button class="btn btn-dark main-btn2 px-5 rounded-4 ms-3 " :disabled="loading"
                                        @click="payNow">
                                        <span v-if="loading">Processing...</span>
                                        <span v-else>Pay Now</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, watch, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import axios from "axios";
import { useAuthStore } from "../stores/auth";
import { loadStripe } from "@stripe/stripe-js";

const stripePromise = loadStripe("pk_test_51RxKS91z2jyYxDbYk2b5OEAEMATsWughmWumjqLOOMLvaou30ylrtQuvqzegUeux9XMJntbx3b8zd7miFtjzf5cf002mfUnCby");
let elements, cardElement;

const doctor = ref(null);
const route = useRoute();
const router = useRouter();
const auth = useAuthStore();
const setimezone = ref("AU")

// 👀 Watch when step changes
const step = ref(1);
watch(step, async (newStep) => {
    if (newStep === 4) {
        const stripe = await stripePromise;
        if (!elements) {
            elements = stripe.elements();
        }
        if (!cardElement) {
            cardElement = elements.create("card");
            cardElement.mount("#card-element");
        }
    }
});





const doctortime = ref([]);
const packagesdata = ref([]);
const docterPackage = ref(null);
const selectedDate = ref(null);
const selectedTime = ref(null);
const name = ref(null);
const email = ref(null);
const setcountry = ref("");
const loading = ref(false);
const Doctor_id = ref(route.params.id);
const user_id = ref(auth?.user?.id);
const token = ref({}); // Stripe token for example

const errors = ref({});

// ✅ Validation function
const validateForm = () => {
    errors.value = {};

    if (!Doctor_id.value) errors.value.doctor_id = "Doctor is required";
    if (!user_id.value) errors.value.user_id = "User is required";
    if (!docterPackage.value) errors.value.doctortime = "Package is required";
    if (!selectedDate.value) errors.value.date = "Date is required";
    if (!selectedTime.value) errors.value.time = "Time is required";
    if (!email.value) errors.value.email = "Email is required";
    if (!name.value) errors.value.name = "Name is required";
    if (!setcountry.value) errors.value.country = "Country is required";

    return Object.keys(errors.value).length === 0;
};

// ✅ Submit handler
const payNow = async () => {
    const stripe = await stripePromise;
    const { token, error } = await stripe.createToken(cardElement);
    if (error) {
        alert(error.message);
        return;
    }
    if (!validateForm()) return;


    try {
        const payload = {
            doctor_id: Doctor_id.value,
            user_id: user_id.value,
            doctortime: docterPackage.value,
            currency: "usd",
            amount: 150,
            date: selectedDate.value,
            time: selectedTime.value,
            token: token.id,
            email: email.value,
            name: name.value,
            country: setcountry.value,
        };
        loading.value = true;

        const response = await fetch("/api/userpayment", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(payload),
        });

        const data = await response.json();
        console.log("Server response:", data);

        if (response.ok) {
            alert("✅ Payment successful!");
            route.push('/')
        } else {
            alert("❌ Payment failed: " + (data.message || "Unknown error"));
        }
    } catch (error) {
        console.error(error);
        alert("❌ Payment failed: " + error.message);
    } finally {
        loading.value = false;
    }
};





function handleNext() {
    if (!auth.user) {
        router.push("/login");
    } else if (step.value < 4) {
        step.value++;
    }
}
function handleBack() {
    if (step.value > 1) step.value--;
}


async function loaddoctor() {
    try {
        axios.get(`/api/doctor/${route.params.id}`).then(({ data }) => {
            doctor.value = data;
        });
    }
    catch (err) { console.error("Failed to load Doctor:", err); }
}

async function getime() {
    try {
        const res = await axios.get(`/api/availability/${route.params.id}`);
        doctortime.value = res.data;
    }
    catch (err) { console.error("Failed to load packages:", err); }
}

async function getPackages() {
    try {
        const res = await axios.get(`/api/package/${route.params.id}`);
        packagesdata.value = res.data;
        if (packagesdata.value.length > 0) {
            docterPackage.value = packagesdata.value[0].id;
        }
    }
    catch (err) { console.error("Failed to load packages:", err); }
}


onMounted(() => {
    getime();
    getPackages();
    loaddoctor();
});



function formatTime(time) {
    const [hours, minutes] = time.split(":");
    let h = parseInt(hours);
    const ampm = h >= 12 ? "PM" : "AM";
    h = h % 12 || 12; // convert 0 -> 12
    return `${h}:${minutes} ${ampm}`;
}
</script>

<style scoped>
.booking-section {
    background-color: #f8f6f4;
}

.profile-card {
    background: #fff;
}

.stepper .step {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: #ddd;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: bold;
}

.stepper .step.active {
    background: #a28f71;
    color: #fff;
}

.stepper .line {
    flex: 1;
    height: 2px;
    background: #ddd;
    margin: 0 5px;
}
</style>
