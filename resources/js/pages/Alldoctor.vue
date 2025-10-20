<template>
    <section>
        <div class="container my-5 px-md-3">

            <div class="container my-5 text-center">
                <h1 class="fw-bold m-color mt-3">Book A Session</h1>
                <p class="m-color" style="color: #5B4C3A;">Embark on a transformative journey to rejuvenate your body, mind, and spirit. Whether
                    you’re aiming to detox, break free from <br></br> unhelpful habits, or elevate your overall well-being, we
                    offer tailored sessions to support your unique needs and goals.</p>

            </div>
            <div class="my-4 py-md-4">
                <Searchbox />
            </div>

            <div class="my-5 px-md-5">
                <button class="btn btn-outline-success border-0 rounded-5 text-white" @click="GetDoctorByModality('')"
                    style="background-color: #C1B39D; height: 40px; margin-right: 12px; display: inline-flex; align-items: center; white-space: nowrap;">View ALL</button>

                <button v-for="modalitie in modalities" @click="GetDoctorByModality(modalitie.id)"
                    class="btn btn-outline-success btn-outline-custome" style="margin-right: 12px;">{{
                    modalitie?.title }}</button>

            </div>

            <div v-if="doctors">

                <div v-if="loading" class="loading-container">
                    <div class="loading-bar">
                        <div class="loading-progress"></div>
                    </div>
                    <p class="loading-text">Loading Practitioner...</p>
                </div>


                <div class="card mx-md-5" v-for="(doctor, index) in doctors">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="position-relative rounded-4 p-4"
                                style="background-color: #C1B39D;">
                                <img :src="getDoctorImage(index)"
                                    class="card-img-top rounded-4" alt="practitioner" style="width: 100%; height: 220px; object-fit: cover; overflow: hidden;">
                                <div class="position-absolute top-0 end-0 p-2">
                                    <svg width="30" height="30" viewBox="0 0 46 46" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect width="46" height="46" rx="23" fill="#5B4C3A" />
                                        <path
                                            d="M17.168 29.849C17.4155 29.0252 17.9219 28.3032 18.6122 27.79C19.3025 27.2768 20.1398 26.9997 21 27H25C25.8612 26.9997 26.6996 27.2774 27.3904 27.7918C28.0811 28.3062 28.5874 29.0298 28.834 29.855M14 23C14 24.1819 14.2328 25.3522 14.6851 26.4442C15.1374 27.5361 15.8003 28.5282 16.636 29.364C17.4718 30.1997 18.4639 30.8626 19.5558 31.3149C20.6478 31.7672 21.8181 32 23 32C24.1819 32 25.3522 31.7672 26.4442 31.3149C27.5361 30.8626 28.5282 30.1997 29.364 29.364C30.1997 28.5282 30.8626 27.5361 31.3149 26.4442C31.7672 25.3522 32 24.1819 32 23C32 21.8181 31.7672 20.6478 31.3149 19.5558C30.8626 18.4639 30.1997 17.4718 29.364 16.636C28.5282 15.8003 27.5361 15.1374 26.4442 14.6851C25.3522 14.2328 24.1819 14 23 14C21.8181 14 20.6478 14.2328 19.5558 14.6851C18.4639 15.1374 17.4718 15.8003 16.636 16.636C15.8003 17.4718 15.1374 18.4639 14.6851 19.5558C14.2328 20.6478 14 21.8181 14 23ZM20 21C20 21.7956 20.3161 22.5587 20.8787 23.1213C21.4413 23.6839 22.2044 24 23 24C23.7956 24 24.5587 23.6839 25.1213 23.1213C25.6839 22.5587 26 21.7956 26 21C26 20.2044 25.6839 19.4413 25.1213 18.8787C24.5587 18.3161 23.7956 18 23 18C22.2044 18 21.4413 18.3161 20.8787 18.8787C20.3161 19.4413 20 20.2044 20 21Z"
                                            stroke="#FBF9F7" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>

                                </div>
                                <div class="position-absolute  bottom-0 mb-3" style="left: 3%;">

                                    <div class="d-flex justify-content-cetner">
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
                        </div>
                        <div class="col-md-8">
                            <h3 class="fw-bold mt-4">{{ doctor.user?.name }} {{ doctor.user?.last_name }}</h3>

                            <div class="d-flex justify-content-between my-3">
                                <div class="d-flex">
                                    <p class="docter-type px-3 py-1 ms-1" v-for="(s, index) in doctor.modalities">
                                        {{ s?.title }}
                                    </p>
                                </div>
                                <p class="price fw-bold">${{ doctor.price }}</p>

                            </div>
                            <p class="card-text mb-2" style="margin-top: -8px; font-family: roboto;">{{ doctor.about }} <router-link :to="`/docter/${doctor.user.id}`"
                                    class="m-color">See
                                    more</router-link></p>

                            <router-link :to="`/booksession/${doctor.user.id}`" class="btn main-btn2 " style="padding: 6px 12px; align-self: flex-start;">Book
                                Session
                                Now
                                <svg width="14" class="main-btn2-icon" height="14" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.5 1.5L19 9L11.5 1.5ZM19 9L11.5 16.5L19 9ZM19 9L1 9L19 9Z" fill="#4b4032"/>
                                            <path d="M11.5 1.5L19 9M19 9L11.5 16.5M19 9L1 9" stroke="#4b4032" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                             </router-link>
                            <router-link :to="`/docter/${doctor.user.id}`" class=" btn main-btn3 ms-2" style="padding: 6px 12px; ">View
                                Profile</router-link>

                            <div class=" mt-3">
                                <span><svg width="14" height="17" viewBox="0 0 18 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6 9.25763C6 10.0533 6.31607 10.8163 6.87868 11.379C7.44129 11.9416 8.20435 12.2576 9 12.2576C9.79565 12.2576 10.5587 11.9416 11.1213 11.379C11.6839 10.8163 12 10.0533 12 9.25763C12 8.46198 11.6839 7.69892 11.1213 7.13631C10.5587 6.5737 9.79565 6.25763 9 6.25763C8.20435 6.25763 7.44129 6.5737 6.87868 7.13631C6.31607 7.69892 6 8.46198 6 9.25763Z"
                                            stroke="#2E2D29" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M14.657 14.9143L10.414 19.1573C10.039 19.532 9.53059 19.7424 9.0005 19.7424C8.47042 19.7424 7.96202 19.532 7.587 19.1573L3.343 14.9143C2.22422 13.7955 1.46234 12.37 1.15369 10.8182C0.845043 9.26636 1.00349 7.65785 1.60901 6.19607C2.21452 4.73428 3.2399 3.48488 4.55548 2.60584C5.87107 1.72681 7.41777 1.25763 9 1.25763C10.5822 1.25763 12.1289 1.72681 13.4445 2.60584C14.7601 3.48488 15.7855 4.73428 16.391 6.19607C16.9965 7.65785 17.155 9.26636 16.8463 10.8182C16.5377 12.37 15.7758 13.7955 14.657 14.9143Z"
                                            stroke="#2E2D29" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <span class="ms-2 mt-3" style="color: #8A7356; font-size: 12px;">{{ doctor.practice_location }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else class="text-center ">
                <b>
                    No Have practitioner
                </b>
            </div>

        </div>
        <Joinus />
    </section>
</template>
<script setup>
import Joinus from '../components/joinus.vue';
import Mainslider from '../components/Mainslider.vue'
import Searchbox from '../components/Searchbox.vue';
import { ref, onMounted, computed } from "vue";
import axios from "axios";

const modalities = ref([]);
const doctors = ref(null);
const loading = ref(false)

const doctorImages = [
    '/asset/images/docter.png',
    '/asset/images/docter2.png',
    '/asset/images/docter3.png'
];

const getDoctorImage = (index) => {
    return doctorImages[index % doctorImages.length];
};

const GetDoctorByModality = async (id) => {

    loading.value = true;
    try {
        if (id) {
            const res = await axios.get(`/api/GetDoctorByModality/${id}`)
        doctors.value = res.data;

        } else {
            const res = await axios.get(`/api/GetAllDoctor`)
            doctors.value = res.data;

        }
    } catch (error) {
        error.value = err.response?.data?.message || "Registration failed.";

    } finally {
        loading.value = false;
    }
}
onMounted(async () => {
    try {
        const res = await axios.get("/api/modalities");
        modalities.value = res.data;
    } catch (err) {
        console.error("Error fetching modalities:", err);
    }
});

onMounted(GetDoctorByModality);
</script>
