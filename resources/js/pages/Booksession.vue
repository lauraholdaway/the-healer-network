<template>
    <section class="booking-section py-5 ">
        <div class="container">
            <div class="row g-4 align-items-stretch mb-5 mt-3">
                <!-- Left Profile Card -->
                <div class="col-md-4" v-if="doctor">
                    <div class="card card-custom">
                        <div class="position-relative d-flex justify-content-center"
                            style="background: linear-gradient(180deg, #c4b39a 0%, rgb(91 76 58 / 41%) 100%); border-radius: 20px; overflow: hidden; padding: 6px; min-height: 100px;">
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
                            <!-- Original Content for Steps 1-3 -->
                            <div v-if="step !== 4">
                                <!-- ✅ safe name -->
                                <div class="text-center">
                                    <h5 class="card-title fw-bold">{{ doctor?.user?.name }}</h5>

                                </div>
                                <div class="d-flex justify-content-center mt-1 flex-wrap gap-2"
                                    style="max-height: 60px; overflow: hidden;">
                                    <p class="docter-type px-2 py-1 text-center" v-for="item in doctor.modalities"
                                        style="width:auto; margin: 2px;">{{ item.title }}</p>
                                </div>
                                <div class="d-flex justify-content-between my-1">
                                </div>
                                <!-- ✅ limit to 20 words -->
                                <p class="card-text m-color fw-bold text-center">
                                    Wednesday 8 October 2025 11:30 am
                                </p>

                                <div
                                    style="background-color: #5B4C3A;border-radius: 10px; padding: 8px 8px;color:white; text-align: center;">

                                    <p class="text-[#F4EFE6] mb-1" style="font-size: 12px;">Freshwater NSW 2096,
                                        Australia</p>
                                    <hr class="my-1">
                                    <b class="text-white" style="font-size: 14px;">
                                        ${{ doctor?.price }}
                                    </b>
                                </div>
                                <br>
                                <div>
                                    <p
                                        style="background-color: #F4EFE6;border-radius: 10px; font-size: 12px; padding: 4px 10px;">
                                        Every practitioner on Bodhi Holistic Hub is carefully vetted, highly rated and a
                                        certified expert in their fields.
                                    </p>
                                </div>
                            </div>

                            <!-- Session Details Content for Step 4 -->
                            <div v-if="step === 4">
                                <!-- Category and Price -->
                                <div class="category-price-row">
                                    <div class="category-tag">Meditation</div>
                                    <div class="price-tag">$300.00</div>
                                </div>

                                <!-- Session Title -->
                                <div class="session-title">
                                    <h4>Your Child's Soul Essence Akashic Record Reading</h4>
                                </div>

                                <!-- Session Description -->
                                <div class="session-description">
                                    <p>Enhancing your parenting wisdom: Supporting your child's aut... <a href="#"
                                            class="see-more-link">See more</a></p>
                                </div>

                                <!-- Book Session Button -->
                                <div class="book-session-btn-local">
                                    <button class="btn-book-session">
                                        Book Session Now
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M6 4L10 8L6 12" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Booking Form -->
                <div class="col-md-8">
                    <div class="booking-wrapper shadow-sm rounded-4 bg-white p-4 h-100">
                        <div class="d-flex justify-content-center">
                            <h5 class="fw-boldd mb-4 mt-3 text-center"
                                style="font-size: 20px; font-weight: bolder;   color: #7D684E;">Book a session</h5>
                        </div>

                        <!-- Stepper -->
                        <div class="stepper d-flex justify-content-between align-items-center mb-2">
                            <div class="step" :class="{ active: step >= 1 }">1</div>
                            <div class="line"></div>
                            <div class="step" :class="{ active: step >= 2 }">2</div>
                            <div class="line"></div>
                            <div class="step" :class="{ active: step >= 3 }">3</div>
                            <div class="line"></div>
                            <div class="step" :class="{ active: step >= 4 }">4</div>
                        </div>

                        <div v-if="step !== 4">
                            <div class="d-flex justify-content-center">
                                <h5 class="fw-bold mb-3 mt-3 text-center" style="font-size: 28px; color: #7D684E;">
                                    {{ step === 2 ? 'Select a session date & time' : step === 3 ? 'Confirm your details'
                                    :
                                    'Select a session' }}</h5>

                            </div>

                            <div class="d-flex justify-content-center">


                                <input type="hidden" v-model="currency" class="form-control" />


                                <select v-model="timezone" class="custom-select mb-3"
                                    style="background-color: #F4EFE6; color: #7D684E; font-weight: bold; width: 200px; padding: 10px; border-radius: 10px; border: 2px solid #F4EFE6; outline: none; box-shadow: none;">
                                    <option value="Australia (GMT+10)" style="color: #7D684E; font-weight: bold;">
                                        Australia (GMT+10)
                                    </option>
                                    <option value="United States (GMT-5)" style="color: #7D684E; font-weight: bold;">
                                        United States (GMT-5)
                                    </option>
                                    <option value="Pakistan (GMT+5)" style="color: #7D684E; font-weight: bold;">
                                        Pakistan (GMT+5)
                                    </option>
                                </select>

                            </div>
                        </div>
                        <div v-if="step === 1">

                            <!-- Dropdown -->
                            <div class="d-flex justify-content-center">
                                <select v-model="docterPackage" class="form-select mb-3"
                                    style="width: 500px; color: #7D684E; text-align: center; font-weight: bold;">
                                    <option v-for="(pkgata, index) in packagesdata" :key="index" :value="pkgata.id"
                                        :selected="index === 0"
                                        style="color: #7D684E; text-align: center; font-weight: bold;">
                                        {{ pkgata.type }} ({{ pkgata.price }}, {{ pkgata.time }})
                                    </option>
                                </select>
                            </div>


                            <div class="text-center">
                                <!-- Radio -->
                                <div class="d-flex justify-content-center gap-4 mb-4 mt-2">
                                    <div class="form-check d-flex align-items-center">
                                        <input type="radio" v-model="type" class=" form-check-input me-2"
                                            name="sessionType" value="online" checked style="accent-color: #7D684E;">
                                        <label class="form-check-label" style="color: #7D684E;">Online session</label>
                                    </div>
                                    <div class="form-check d-flex align-items-center">
                                        <input type="radio" v-model="type" class="form-check-input me-2"
                                            name="sessionType" value="offline" style="accent-color: #7D684E;">
                                        <label class="form-check-label" style="color: #7D684E;">In-Person</label>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="d-flex justify-content-between">
                                    <router-link to="/" class="btn btn-outline-dark btn-outline-custome px-5"
                                        style="border-radius: 999px;">Back</router-link>

                                    <button v-if="auth?.user?.id" class="btn btn-dark main-btn2 px-5 ms-3"
                                        style="border-radius: 999px;" @click="handleNext">
                                        Next
                                    </button>

                                    <router-link v-else to="/login" class="btn btn-dark main-btn2 px-5 ms-3"
                                        style="border-radius: 999px;">Login</router-link>

                                </div>
                            </div>
                        </div>
                        <div v-if="step === 2" style=" padding: 2px;">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item mb-3" v-for="(tm, index) in doctortime" :key="index"
                                    style="border: 1px solid #E8E2D5; border-radius: 12px; overflow: hidden;">
                                    <h2 class="accordion-header" :id="`heading${index}`">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" :data-bs-target="`#collapse${index}`"
                                            aria-expanded="false" :aria-controls="`collapse${index}`"
                                            style="background-color: #F4EFE6; color: #7D684E; font-weight: bold; border: none; padding: 15px 20px;">
                                            {{ new Date(tm.date).toLocaleString('en-US', {
                                            day: '2-digit', month: 'short', year:
                                            'numeric'
                                            }) }}
                                        </button>
                                    </h2>
                                    <div :id="`collapse${index}`" class="accordion-collapse collapse"
                                        :aria-labelledby="`heading${index}`" data-bs-parent="#accordionExample">
                                        <div class="accordion-body" style="background-color: #FFFFFF; padding: 20px;">
                                            <div class="d-flex flex-wrap gap-3" role="group" aria-label="Time Slot">
                                                <template v-for="(time, tIndex) in tm.times" :key="tIndex">
                                                    <input type="radio" class="btn-check" :name="`time-group-${index}`"
                                                        :id="`time${index}-${tIndex}`" :value="time"
                                                        v-model="selectedTime" @change="selectedDate = tm.date" />

                                                    <label class="btn btn-outline-custom"
                                                        :for="`time${index}-${tIndex}`"
                                                        style="border: 2px solid #E8E2D5; color: #7D684E; background-color: #F4EFE6; border-radius: 8px; padding: 10px 20px; font-weight: 500; min-width: 100px;">
                                                        {{ formatTime(time) }}
                                                    </label>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-check mb-4 d-flex justify-content-center align-items-center mt-4">
                                    <input type="radio" class="form-check-input me-2" name="sessionType2" value="online"
                                        checked style="accent-color: #7D684E;">
                                    <label class="form-check-label" style="color: #7D684E; font-weight: 500;">Online
                                        session</label>
                                </div> -->
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-between mt-4">
                                <button class="btn btn-outline-custom px-4 py-2"
                                    style="border: 2px solid #7D684E; color: #7D684E; border-radius: 999px; font-weight: 500; background: transparent;"
                                    @click="handleBack">Back</button>
                                <button class="btn px-4 py-2 ms-3"
                                    style="background: linear-gradient(135deg, #7D684E 0%, #5B4C3A 100%); color: white; border-radius: 999px; font-weight: 500; box-shadow: 0 4px 8px rgba(0,0,0,0.2);"
                                    @click="handleNext">
                                    Next
                                </button>
                            </div>
                        </div>
                        <div v-if="step === 3">

                            <div class="p-4">

                                <!-- <h3 class="m-color text-center my-4">Confirm your details</h3> -->

                                <div class="user-details-container mb-4">
                                    <div class="detail-item mb-3">
                                        <span class="detail-label">Name:</span>
                                        <span class="detail-value">{{ auth?.user?.name }}</span>
                                    </div>
                                    <div class="detail-item mb-3">
                                        <span class="detail-label">Email:</span>
                                        <span class="detail-value">{{ auth?.user?.email }}</span>
                                    </div>
                                    <div class="detail-item mb-3">
                                        <span class="detail-label">Phone:</span>
                                        <span class="detail-value">{{ auth?.user?.number }}</span>
                                    </div>
                                </div>

                                <div class="reminder-box mb-4">
                                    <div class="d-flex align-items-center">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" class="me-2">
                                            <path d="M12 2L20 6L20 18L12 22L4 18L4 6L12 2Z" stroke="#7D684E"
                                                stroke-width="2" fill="#F4EFE6" />
                                            <path d="M12 8V12" stroke="#7D684E" stroke-width="2"
                                                stroke-linecap="round" />
                                            <circle cx="12" cy="15" r="1" fill="#7D684E" />
                                        </svg>
                                        <span class="reminder-text">Booking reminders will be sent via email and
                                            text</span>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="d-flex justify-content-between mt-4">
                                    <button class="btn btn-outline-custom px-4 py-2"
                                        style="border: 2px solid #7D684E; color: #7D684E; border-radius: 999px; font-weight: 500; background: transparent;"
                                        @click="handleBack">Back</button>
                                    <button class="btn px-4 py-2 ms-3"
                                        style="background: linear-gradient(135deg, #7D684E 0%, #5B4C3A 100%); color: white; border-radius: 999px; font-weight: 500; box-shadow: 0 4px 8px rgba(0,0,0,0.2);"
                                        @click="handleNext">
                                        Confirm
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div v-if="step === 4">
                            <div class="payment-form-container">
                                <!-- Email Section -->
                                <div class="form-group mb-4">
                                    <label class="form-label-custom">Email</label>
                                    <input v-model="email" type="email" class="form-input-custom"
                                        placeholder="Enter your email" required />
                                </div>

                                <!-- Payment Method Section -->
                                <div class="form-group mb-4">
                                    <label class="form-label-custom">Payment Method</label>
                                    <div class="payment-method-selector">
                                        <select class="form-select-custom" v-model="paymenttype">
                                            <option value="credit">Credit Card</option>
                                            <option value="debit">Debit Card</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Card Information Section -->
                                <div class="form-group mb-4">
                                    <label class="form-label-custom">Card information</label>
                                    <div id="card-element"></div>
                                </div>

                                <!-- Cardholder Name Section -->
                                <div class="form-group mb-4">
                                    <label class="form-label-custom">Cardholder name</label>
                                    <input v-model="name" type="text" class="form-input-custom"
                                        placeholder="Full name on card" />
                                </div>
                                <!-- Country and ZIP Combined Section -->
                                <div class="form-group mb-4">
                                    <label class="form-label-custom">Country or region</label>
                                    <div class="combined-input-container">
                                        <div class="country-section">
                                            <select v-model="setcountry" class="form-select-custom country-select">
                                                <option value="United States" selected>United States</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Pakistan">Pakistan</option>
                                            </select>
                                        </div>
                                        <div class="separator-line"></div>
                                        <!-- <div class="zip-section">
                                            <input type="text" v-model="zip" class="form-input-custom zip-input"
                                                placeholder="ZIP" />
                                        </div> -->
                                    </div>
                                </div>

                                <!-- Error Messages -->
                                <div v-if="Object.keys(errors).length" class="error-container mb-4">
                                    <ul class="error-list">
                                        <li v-for="(message, field) in errors" :key="field">
                                            {{ message }}
                                        </li>
                                    </ul>
                                </div>
                                <div v-if="cus_message.text" :class="['alert', message.type]" class="mt-3 p-3 rounded">
                                    {{ cus_message.text }}
                                </div>

                                <!-- Pay Button -->
                                <div class="payment-actions">
                                    <button class="btn pay-button" :disabled="loading" @click="payNow">
                                        <span v-if="loading">Processing...</span>
                                        <span v-else>Pay</span>
                                    </button>
                                </div>

                                <!-- Terms and Privacy -->
                                <div class="terms-text">
                                    By clicking Pay, you agree to the <a href="#" class="terms-link">Terms</a> and <a
                                        href="#" class="terms-link">Privacy Policy</a>.
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
const doctortime = ref([]);


// 👀 Watch when step changes
const step = ref(1);





const setimezone = ref("AU")
const paymenttype = ref("credit")
const timezone = ref('Australia (GMT+10)')
const type = ref("Online")
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
const currency = ref('');
const errors = ref({});
const cus_message = ref({ text: "", type: "" });

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
            currency: currency.value,
            date: selectedDate.value,
            time: selectedTime.value,
            token: token.id,
            email: email.value,
            name: name.value,
            country: setcountry.value,
            type: type.value,
            payment_method: paymenttype.value,
            timezone: timezone.value,
        };
        loading.value = true;
        const response = await fetch("/api/userpayment", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(payload),
        });
        const data = await response.json();

        if (response.ok) {
            alert("✅ Payment successful!");
            router.push("/");

        } else {
            cus_message.value = {
                text: "❌ Payment failed: " + (data.message || "Unknown error"),
                type: "alert-danger",
            }; alert("❌ Payment failed: " + (data.message || "Unknown error"));
        }
    } catch (error) {
        cus_message.value = {
            text: "⚠️ Network error. Please try again." + (error || "Unknown error"),
            type: "alert-warning",
        };
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
    if (newStep === 2) {
        if (!doctortime.value || doctortime.value.length === 0) {
            alert("⚠️ This doctor has no available time slots!");
            step.value-- // 🚫 stop here — do not move to next step
        }
    }
});
async function loaddoctor() {
    try {
        axios.get(`/api/doctor/${route.params.id}`).then(({ data }) => {
            doctor.value = data;
            currency.value = doctor.value.currency
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
    background-image: url('/public/asset/images/Book-session.png');
    background-repeat: no-repeat;
    background-position: bottom right;
    background-size: auto;
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

.custom-select {
    border: 2px solid #F4EFE6 !important;
    outline: none !important;
    box-shadow: none !important;
}

.custom-select:focus {
    border: 2px solid #F4EFE6 !important;
    outline: none !important;
    box-shadow: none !important;
}

.custom-select:hover {
    border: 2px solid #F4EFE6 !important;
}

.form-select {
    border: 2px solid #E8E2D5 !important;
    outline: none !important;
    box-shadow: none !important;
}

.form-select:focus {
    border: 2px solid #E8E2D5 !important;
    outline: none !important;
    box-shadow: none !important;
}

.form-select:hover {
    border: 2px solid #E8E2D5 !important;
}


/* Step 3 styling */
.user-details-container {

    padding: 20px;

}

.detail-item {
    display: flex;
    align-items: center;
    padding: 8px 0;
}

.detail-label {
    font-weight: 400;
    color: #51624A;
    min-width: 80px;
    margin-right: 10px;
}

.detail-value {

    color: #5B4C3A;
    font-weight: 500;

}

.reminder-box {
    background-color: #F4EFE6;
    border-radius: 12px;
    padding: 15px 20px;
    border: 1px solid #E8E2D5;
}

.reminder-text {
    color: #7D684E;
    font-weight: 500;
    font-size: 14px;
}

/* Step 4 Payment Form Styling */
.payment-form-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 15px 10px;
}

.form-group {
    margin-bottom: 20px;
}

.form-label-custom {
    display: block;
    font-weight: 500;
    color: #6B7280;
    margin-bottom: 8px;
    font-size: 14px;
}

.form-input-custom {
    width: 100%;
    padding: 6px 16px;
    border: 1px solid #D1D5DB;
    border-radius: 8px;
    font-size: 16px;
    background-color: #FFFFFF;
    transition: all 0.2s ease;
    color: #6B7280;
    box-shadow: none;
    height: 36px;
}

.form-input-custom:focus {
    outline: none;
    border-color: #7D684E;
    background-color: #FFFFFF;
    box-shadow: 0 0 0 2px rgba(125, 104, 78, 0.1);
}

.form-input-custom::placeholder {
    color: #6B7280;
}

.form-select-custom {
    width: 100%;
    padding: 6px 16px;
    border: 1px solid #D1D5DB;
    border-radius: 8px;
    font-size: 16px;
    background-color: #FFFFFF;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 12px center;
    background-repeat: no-repeat;
    background-size: 16px;
    padding-right: 40px;
    appearance: none;
    color: #6B7280;
    box-shadow: none;
    height: 36px;
}

.form-select-custom:focus {
    outline: none;
    border-color: #7D684E;
    background-color: #FFFFFF;
    box-shadow: 0 0 0 2px rgba(125, 104, 78, 0.1);
}

.payment-method-selector {
    position: relative;
}

/* Card Information Container */
.card-info-container {
    border: 1px solid #D1D5DB;
    border-radius: 8px;
    background-color: #FFFFFF;
    overflow: hidden;
}

.card-number-section {
    position: relative;
    padding: 6px 16px;
}

.card-number-input {
    border: none;
    background: transparent;
    padding: 0;
    font-size: 16px;
    color: #6B7280;
    width: 100%;
    box-shadow: none;
    padding-right: 120px;
}

.card-number-input:focus {
    outline: none;
    box-shadow: none;
}

.card-number-input::placeholder {
    color: #6B7280;
}

.card-icons {
    position: absolute;
    right: 16px;
    top: 50%;
    transform: translateY(-50%);
    display: flex;
    gap: 6px;
    align-items: center;
}

.card-separator-line {
    height: 1px;
    background-color: #E5E7EB;
    margin: 0;
}

.expiry-cvc-section {
    display: flex;
    padding: 6px 16px;
    gap: 0;
    position: relative;
}

.expiry-cvc-section::before {
    content: '';
    position: absolute;
    left: 50%;
    top: 0;
    bottom: 0;
    width: 1px;
    background-color: #E5E7EB;
    transform: translateX(-50%);
}

.expiry-container {
    flex: 1;
    padding-right: 12px;
}

.expiry-input {
    border: none;
    background: transparent;
    padding: 0;
    font-size: 16px;
    color: #6B7280;
    width: 100%;
    box-shadow: none;
}

.expiry-input:focus {
    outline: none;
    box-shadow: none;
}

.expiry-input::placeholder {
    color: #6B7280;
}

.cvc-container {
    flex: 1;
    position: relative;
    padding-left: 12px;
}

.cvc-input {
    border: none;
    background: transparent;
    padding: 0;
    font-size: 16px;
    color: #6B7280;
    width: 100%;
    box-shadow: none;
    padding-right: 40px;
}

.cvc-input:focus {
    outline: none;
    box-shadow: none;
}

.cvc-input::placeholder {
    color: #6B7280;
}

.cvc-help-icon {
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    cursor: help;
}

/* Combined Country and ZIP Container */
.combined-input-container {
    border: 1px solid #D1D5DB;
    border-radius: 8px;
    background-color: #FFFFFF;
    overflow: hidden;
}

.country-section {
    padding: 6px 16px;
}

.country-select {
    border: none;
    background: transparent;
    padding: 0;
    font-size: 16px;
    color: #6B7280;
    width: 100%;
    box-shadow: none;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 0 center;
    background-repeat: no-repeat;
    background-size: 16px;
    padding-right: 20px;
    appearance: none;
}

.country-select:focus {
    outline: none;
    box-shadow: none;
}

.separator-line {
    height: 1px;
    background-color: #E5E7EB;
    margin: 0;
}

.zip-section {
    padding: 6px 16px;
}

.zip-input {
    border: none;
    background: transparent;
    padding: 0;
    font-size: 16px;
    color: #6B7280;
    width: 100%;
    box-shadow: none;
}

.zip-input:focus {
    outline: none;
    box-shadow: none;
}

.zip-input::placeholder {
    color: #6B7280;
}


.error-container {
    background-color: #FEF2F2;
    border: 1px solid #FECACA;
    border-radius: 8px;
    padding: 12px 16px;
}

.error-list {
    margin: 0;
    padding: 0;
    list-style: none;
}

.error-list li {
    color: #DC2626;
    font-size: 14px;
    margin-bottom: 4px;
}

.payment-actions {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 32px;
    margin-bottom: 16px;
}

.pay-button {
    background: #B8A78F;
    color: white;
    border: none;
    border-radius: 50px;
    padding: 12px 32px;
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.2s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 100%;
    margin: 0 auto;
    display: block;
}

.pay-button:hover:not(:disabled) {
    background: #A6967F;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.pay-button:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none;
}

.terms-text {
    text-align: center;
    margin-top: 16px;
    font-size: 14px;
    color: #6B7280;
    line-height: 1.4;
}

.terms-link {
    color: #7D684E;
    text-decoration: underline;
    font-weight: 500;
}

.terms-link:hover {
    text-decoration: underline;
}

/* Session Details Styling for Step 4 */
.category-price-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
}

.category-tag {
    background: #7D684E;
    color: white;
    padding: 4px 12px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
}

.price-tag {
    font-size: 16px;
    font-weight: 700;
    color: #7D684E;
}

.session-title {
    margin-bottom: 12px;
}

.session-title h4 {
    font-size: 18px;
    font-weight: 700;
    color: #2E2D29;
    line-height: 1.4;
    margin: 0;
}

.session-description {
    margin-bottom: 20px;
}

.session-description p {
    font-size: 14px;
    color: #6B7280;
    line-height: 1.5;
    margin: 0;
}

.see-more-link {
    color: #7D684E;
    text-decoration: none;
    font-weight: 500;
}

.see-more-link:hover {
    text-decoration: underline;
}

/* local wrapper to avoid global brown background */
.book-session-btn-local {
    width: 100%;
    background-color: transparent !important;
    border: 0;
    padding: 0;
}

.btn-book-session {
    width: 100%;
    background-color: transparent !important;
    color: #6B7280;
    border: none;
    border-radius: 0;
    padding: 0;
    font-size: 14px;
    font-weight: 500;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 8px;
    cursor: pointer;
    transition: color 0.2s ease;
    text-decoration: none;
    box-shadow: none;
    appearance: none;
    -webkit-appearance: none;
}

.btn-book-session:hover {
    background-color: transparent !important;
    color: #7D684E;
}

.btn-book-session:focus {
    background-color: transparent !important;
    outline: none;
    box-shadow: none;
}

.InputContainer .InputElement {
    border: 2px solid #C1B39D !important;
    border-radius: 10px !important;
    padding: 10px !important;
    background-color: white !important;
    color: #2E2D29 !important;
    font-family: 'Cormorant Garamond', serif !important;
    font-size: 14px !important;
    transition: all 0.3s ease !important;
}
</style>
