<style scoped>
section {
    background-color: #FBF9F7;
    padding-top: 0;
    margin-top: 0;
}

h1 {
    font-size: 2.5rem !important;
}

@media (min-width: 768px) {
    h1 {
        font-size: 42px !important;
    }
}

@media (min-width: 1500px) {
    h1 {
        font-size: 3.5rem !important;
    }
}

p.m-color {
    font-size: 16px !important;
    color: #5B4C3A !important;
}

@media (min-width: 768px) {
    p.m-color {
        font-size: 18px !important;
    }
}

@media (min-width: 1500px) {
    p.m-color {
        font-size: 20px !important;
        max-width: 1120px !important;
        margin-top: 20px !important;
    }
}

.doctor-image-wrapper {
    background-color: #C1B39D;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 220px;
    overflow: hidden;
    position: relative;
}

@media (min-width: 1500px) {
    .doctor-image-wrapper {
        min-height: 280px;
    }
}

.doctorImages {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
    position: absolute;
    top: 0;
    left: 0;
}
</style>


<template>
    <section>
        <div class="container my-0 my-md-0 px-2 px-md-3">
            <div class="container my-0 my-md-0 text-center px-2">
                <h1 class="fw-bold m-color fs-3 fs-md-1"
                    style="font-family: 'Cormorant Garamond', serif !important; color: #2E2D29; margin-top: 0px; padding-top: 80px;">
                    Book a Session with a Trusted Healer</h1>
                <p class="m-color px-2 px-md-0 mx-auto"
                    style="font-size: 14px; padding-bottom: 20px; max-width: 800px;">Find healers by specialty,
                    location and availability. Each healer profile includes experience, areas of expertise, and
                    testimonials from real clients.</p>
            </div>
            <div class="my-0 my-md-0 py-0 py-md-0">
                <Alldoctorsearchbox />
            </div>
            <div v-if="doctors">
                <div v-if="loading" class="loading-container">
                    <div class="loading-bar">
                        <div class="loading-progress"></div>
                    </div>
                    <p class="loading-text">Loading Healar...</p>
                </div>
                <div class="card mx-2 mx-md-5 mb-3" v-for="(doctor, index) in doctors" :key="index">
                    <div class="row g-0 align-items-stretch">
                        <div class="col-12 col-md-3 d-flex">
                            <div class="position-relative rounded-4 p-3 p-md-4 w-100 h-100 doctor-image-wrapper">
                                <img :src="doctor?.user?.image ? '/storage/' + doctor.user.image : '/default-image.png'"
                                    class="card-img-top doctorImages rounded-4 img-fluid" alt="practitioner">
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
                                <div class="position-absolute bottom-0 mb-3" style="left: 5%;">
                                    <DoctorTage :doctor="doctor" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="p-3 p-md-3 h-100">
                                <h3 class="mt-2 mt-md-4 fs-5 fs-md-3">{{ doctor.user?.name }} {{ doctor.user?.last_name
                                }}</h3>
                                <div
                                    class="d-flex flex-column flex-md-row justify-content-between align-items-start my-3">
                                    <div class="d-flex flex-wrap gap-1 mb-2 mb-md-0">
                                        <p class="docter-type px-2 px-md-3 py-1 m-0" style="font-size: 12px;"
                                            v-for="(s, index) in doctor.modalities">
                                            {{ s?.title }}
                                        </p>
                                    </div>
                                    <p class="price fw-bold mb-0 mt-2 mt-md-0">${{ doctor.price }}</p>
                                </div>
                                <p class="mb-2 doctor-card-summary" :class="{ 'expanded': showFull[index] }"
                                    :style="showFull[index] ? 'margin-top: -8px; font-size: 14px; color: #5B4C3A;' : 'margin-top: -8px; font-size: 14px; color: #5B4C3A; padding: 10px 0px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'">
                                    <span v-if="!showFull[index]">{{ limitWords(doctor.about, 13) }}</span>
                                    <span v-else style="white-space: normal;">{{ doctor.about }}</span>
                                    <a href="#" class="m-color ms-2" @click.prevent="toggleText(index)"
                                        v-if="doctor.about && doctor.about.split(' ').length > 20"
                                        style="white-space: nowrap;">
                                        {{ showFull[index] ? 'See less' : 'See more' }}
                                    </a>
                                </p>

                                <div class="d-flex flex-column flex-md-row gap-2 mb-3">
                                    <router-link :to="`/booksession/${doctor.user?.id}`" class="btn main-btn2 w-100"
                                        style="padding: 10px 8px; color: #2E2D29; align-self: flex-start; font-size: 14px; max-width: 160px; background-color: #C1B39D; text-align: center; transition: all 0.3s ease;"
                                        @mouseover="$event.target.style.backgroundColor = '#5B4C3A'; $event.target.style.color = 'white'"
                                        @mouseout="$event.target.style.backgroundColor = '#C1B39D'; $event.target.style.color = '#2E2D29'">Book
                                        Session Now

                                    </router-link>
                                    <router-link :to="`/docter/${doctor.user?.id}`" class="btn main-btn3 w-100"
                                        style="padding: 6px 12px; font-size: 14px; max-width: 120px; text-align: center; display: flex; align-items: center; justify-content: center;">View
                                        Profile</router-link>
                                </div>
                                <div class="mt-2">
                                    <span class="d-flex align-items-center">
                                        <svg width="14" height="17" viewBox="0 0 18 21" fill="none"
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
                                        <span class="ms-2" style="color: #8A7356; font-size: 12px;">{{
                                            doctor.practice_location }}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else class="text-center">
                <b class="main-color">No Have Healar</b>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted, watch, reactive } from "vue";
import { useRoute } from "vue-router";
import axios from "axios";
import Alldoctorsearchbox from '../components/Alldoctorsearchbox.vue';
import DoctorTage from "../components/DoctorTage.vue";

const route = useRoute();
const doctors = ref([]);
const loading = ref(true);
const showFull = reactive([]);

const loadDoctors = async () => {
    loading.value = true;
    try {
        const res = await axios.get("/api/searchdoctor", {
            params: {
                modality: route.query.modality || "",
                location: route.query.location || "",
                modalityType: route.query.modalityType || "",
                availability: route.query.availability || "",
                price: route.query.price || "",
                gender: route.query.gender || "",
                language: route.query.language || "",
                accessibility: route.query.accessibility || "",
                certification: route.query.certification || "",
                rating: route.query.rating || "",
                duration: route.query.duration || "",
            },
        });
        doctors.value = res.data;
    } catch (error) {
        console.error(error);
    } finally {
        loading.value = false;
    }
};

onMounted(loadDoctors);

watch(
    () => route.query,
    () => loadDoctors()
);

function limitWords(text, count) {
    if (!text) return '-';
    const words = text.split(' ');
    return words.length > count ? words.slice(0, count).join(' ') : text;
}

function toggleText(index) {
    if (showFull[index] === undefined) {
        showFull[index] = false;
    }
    showFull[index] = !showFull[index];
}
</script>

