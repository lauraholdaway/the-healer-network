<style scoped>
.service-card {
    background-color: #faf8f6;
    border: 1px solid #eee;
    transition: all 0.3s ease;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.1);
}

.icon-wrapper {
    font-size: 2rem;
    color: #a66d55;
}

h5 {
    color: #3b2d2a;
}

.tag {
    font-size: 0.9rem;
    font-weight: 500;
    margin-left: 5px;
}

.docter-type {
    background: #5B4C3A;
    border-radius: 20px;
    font-size: 0.85rem;
}

.price {
    color: #5B4C3A;
}

.testimonial-section {
    background-color: #EEE9E3;
}

.subheading {
    font-size: 1.1rem;
    color: #5B4C3A;
}



.card-text {
    font-size: 0.95rem;
    color: #555;
}

.card {
    transition: all 0.3s ease;
    background-color: #E5D9CB;

}

.card:hover {
    transform: translateY(-5px);
}
</style>
<template>
    <section>
        <div class="container">

            <!-- Doctor card -->
            <div class="cards mx-md-5 my-5">
                <div class="row" v-if="doctor">
                    <!-- Left image & icons -->
                    <div class="col-md-4">
                        <div class="position-relative rounded-4"
                            style="background: linear-gradient(180deg, rgb(91 76 58 / 41%) 50.9%, #5B4C3A 100%);">
                            <img :src="doctor?.user?.image ? '/storage/' + doctor.user.image : '/default-image.png'"
                                class="doctorImages" alt="practitioner">
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

                    <!-- Right content -->
                    <div class="col-md-8">
                        <div class="d-flex justify-content-between my-3">
                            <p class="docter-type px-3 py-1">Meditation</p>
                            <p class="price fw-bold">$300.00</p>
                        </div>
                        <h4 class="fw-bold">{{ doctor?.user?.name }} {{ doctor?.user?.last_name }}</h4>
                        <div class="my-4">
                            <div class="rating-box d-flex align-items-center">
                                <div class="stars me-2">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                                <div class="rating-text px-3 py-1">
                                    5.0 &nbsp; 162 Reviews
                                </div>
                            </div>

                        </div>
                        <p class="card-text m-color">
                            {{ doctor?.about ? doctor.about.split(" ").slice(0, 20).join(" ") : "" }}...
                            <a href="#" class="m-color">See more</a>
                        </p>
                        <router-link v-if="doctor?.user?.id" :to="`/booksession/${doctor.user.id}`"
                            class="btn main-btn2" style="background-color: #2E2D29;">
                            Book Session Now →
                        </router-link>
                        <button class="btn btn-outline-info border-0 ms-2 m-color" style="background-color: #DED1BA;">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.992188 18.0106L2.29219 14.1106C1.16863 12.4489 0.762181 10.481 1.14841 8.57288C1.53463 6.66477 2.68725 4.94625 4.39195 3.73685C6.09666 2.52745 8.23745 1.90947 10.4163 1.99782C12.5951 2.08616 14.6637 2.87481 16.2375 4.21714C17.8112 5.55946 18.7831 7.36412 18.9723 9.29556C19.1614 11.227 18.5551 13.1538 17.2661 14.7177C15.977 16.2816 14.0928 17.3762 11.964 17.7979C9.83512 18.2197 7.60639 17.9399 5.69219 17.0106L0.992188 18.0106Z"
                                    stroke="#5B4C3A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </button>
                        <button class="btn btn-outline-info border-0 ms-2 m-color" style="background-color: #DED1BA;">
                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.0002 0.997437V4.99744C4.42519 6.02544 1.98019 11.7854 1.00019 16.9974C0.963188 17.2034 6.38419 11.0354 11.0002 10.9974V14.9974L19.0002 7.99744L11.0002 0.997437Z"
                                    stroke="#5B4C3A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </button>
                    </div>
                </div>
            </div>
            <div class="container my-5">
                <section class="info-bar my-5">
                    <div class="container">
                        <div class="row text-center text-white py-4 px-3 rounded-4 info-box">

                            <div class="col-md-3 col-6 mb-3 mb-md-0 border-end border-light">
                                <h6 class="fw-semibold fst-italic">Focus Areas</h6>
                                <p class="mb-0 small">Personal Development & Life Transitions</p>
                            </div>

                            <div class="col-md-3 col-6 mb-3 mb-md-0 border-end border-light">
                                <h6 class="fw-semibold fst-italic">Location</h6>
                                <p class="mb-0 small">Kingston Beach TAS 7050,<br>Australia</p>
                            </div>

                            <div class="col-md-3 col-6 mb-3 mb-md-0 border-end border-light">
                                <h6 class="fw-semibold fst-italic">Languages</h6>
                                <p class="mb-0 small">English, Spanish, German</p>
                            </div>

                            <div class="col-md-3 col-6">
                                <h6 class="fw-semibold fst-italic">Certifications</h6>
                                <p class="mb-0 small">Evolutionary Astrologer – Sydney Astrology School (2025)</p>
                            </div>

                        </div>
                    </div>
                </section>

            </div>
            <br>
            <!-- Service cards -->
            <div class="my-5">
                <div class="row g-4">

                    <!-- Trauma therapy -->
                    <div class="col-md-6" v-for="s in services" :key="s.id">
                        <div class="service-card p-4 h-100 shadow-sm rounded-3">
                            <div class="align-items-start">
                                <div class="my-3 d-flex justify-content-between">
                                    <!-- Example SVG -->
                                    <div>
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_18_178)">
                                                <path
                                                    d="M39.3094 19.3642C39.3094 30.0749 30.6353 38.6736 20 38.6736C12.4572 38.6736 5.97044 34.4496 2.72705 28.1892C2.95333 27.8875 3.10419 27.5857 3.25504 27.3595C3.4059 27.1332 3.55675 26.9069 3.63218 26.7561C5.81958 23.5127 8.45955 20.6465 11.5521 18.1573C11.5521 19.515 12.6081 20.571 13.9657 20.571C15.3235 20.571 16.3795 19.515 16.3795 18.1573C16.3795 17.1013 15.7006 16.1962 14.7201 15.8945C15.3988 15.4419 16.0777 15.0648 16.832 14.6122C17.8126 14.6122 18.8686 14.5368 19.9246 14.5368C26.2605 14.5368 32.2946 15.5173 38.0271 17.2522L39.1585 17.5538C39.234 18.1573 39.234 18.7607 39.234 19.3642H39.3094ZM14.1166 5.18377C11.3258 5.41004 8.53498 5.78718 5.74416 6.31518C9.28926 2.46837 14.3429 0.0546875 20 0.0546875C22.112 0.0546875 24.0731 0.431826 26.0342 1.03524C21.8102 1.86495 17.8126 3.29807 14.1166 5.18377ZM26.4114 30.0749C26.8639 30.5275 27.6181 30.452 28.0707 29.9995C28.5233 29.4715 28.5233 28.7171 27.9953 28.2646C26.4114 26.8315 23.9222 25.3984 20.6034 25.3984C19.3211 25.3984 18.1897 25.6246 17.2091 25.9264C16.5303 26.1526 16.2286 26.8315 16.3795 27.4349C16.6057 28.1137 17.2846 28.4155 17.888 28.2646C18.7177 28.0384 19.5474 27.8875 20.6034 27.8875C23.168 27.8875 25.1291 28.9435 26.4114 30.0749ZM26.0342 20.571C27.3919 20.571 28.4479 19.515 28.4479 18.1573C28.4479 16.8751 27.3919 15.7436 26.0342 15.7436C24.6765 15.7436 23.6205 16.8751 23.6205 18.1573C23.6205 19.515 24.6765 20.571 26.0342 20.571Z"
                                                    fill="#C1B39D" />
                                                <path
                                                    d="M34.1804 6.31513C29.8811 5.48543 25.4308 4.95743 20.9051 4.95743C23.7714 3.97687 26.7885 3.2226 29.9564 2.84546C31.465 3.82601 32.8982 4.95743 34.1804 6.31513ZM36.4432 9.2568C37.4992 10.9916 38.2535 12.8773 38.7815 14.9139C32.8227 13.1036 26.4868 12.123 20 12.123C18.6423 12.123 17.36 12.1985 16.1533 12.2739C12.5326 12.5002 8.98759 12.9528 5.59334 13.7824C4.08479 14.0842 2.65167 14.4613 1.14312 14.9139C1.67111 12.8773 2.42539 10.9916 3.48138 9.2568C7.17732 8.4271 10.9487 7.82368 14.7955 7.52197C16.4549 7.37111 18.1898 7.29568 20 7.29568C23.0172 7.29568 25.9588 7.52197 28.825 7.89911C31.3896 8.20082 33.9542 8.65339 36.4432 9.2568ZM11.6275 15.1402C7.70532 17.931 4.31108 21.4761 1.59568 25.4737C0.992263 23.5127 0.690552 21.4761 0.690552 19.3642C0.690552 19.1378 0.690552 18.9115 0.690552 18.6853C1.14312 18.1573 1.59568 17.7047 2.04825 17.1767C5.14078 16.2715 8.30874 15.5928 11.6275 15.1402ZM14.7201 15.8944C15.7006 16.1962 16.3795 17.1013 16.3795 18.1573C16.3795 19.5149 15.3235 20.5709 13.9658 20.5709C12.6081 20.5709 11.5521 19.5149 11.5521 18.1573C12.6081 17.403 13.6641 16.5733 14.7201 15.8944ZM26.0343 20.5709C24.6765 20.5709 23.6205 19.5149 23.6205 18.1573C23.6205 16.875 24.6765 15.7435 26.0343 15.7435C27.3919 15.7435 28.4479 16.875 28.4479 18.1573C28.4479 19.5149 27.3919 20.5709 26.0343 20.5709Z"
                                                    fill="#A28F71" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_18_178">
                                                    <rect width="40" height="40" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="px-2">Rate Per Session</span>
                                        <span class="px-2">$ {{ s.rate_per_session }}</span>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="fw-bold">{{ s.title }}</h5>
                                    <p class="text-muted">
                                        {{ s.description }}
                                    </p>
                                </div>
                                <div class="text-center p-2 rounded-2" style="background-color: #F4EFE6;">
                                    <p>{{ s.ideal_for }}</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <section class="testimonial-section py-5">
            <div class="container-fluid text-center">

                <!-- Heading -->
                <p class="subheading fw-bold">We’ve helped over 35,000

                    <br>
                    Australians improve their mental health
                </p>

                <!-- Rating -->
                <div class="d-flex justify-content-center align-items-center mb-3">
                    <div class="stars me-2">
                        <img src="/public/asset/images/rating.png" width="200px" alt="">
                    </div>
                    <br>
                </div>
                <p class="text-muted">Excellent rating from 200 reviews</p>
                <div class="container-fluid mt-4">
                    <Swiper :slides-per-view="3" :space-between="20" :loop="true" class="mySwiper" :breakpoints="{
                        576: { slidesPerView: 2 },
                        768: { slidesPerView: 3 },
                        1200: { slidesPerView: 4 }
                    }" :autoplay="{ delay: 3000 }">

                        <SwiperSlide v-for="(doctor, index) in doctors" :key="index">
                            <div class="card h-100 shadow-sm border-0 rounded-4 p-0">

                                <!-- Alternate layout -->
                                <div v-if="index % 2 === 0">
                                    <!-- Image on top -->
                                    <img :src="doctor.user.image ? '/storage/' + doctor.user.image : '/default-image.png'"
                                        class="card-img-top" alt="User" />
                                    <div class="card-body">
                                        <p class="card-text">{{ doctor?.about }}</p>
                                        <h6 class="fw-bold mt-3">{{ doctor?.user?.name }} {{ doctor?.user?.last_name }}
                                        </h6>
                                    </div>
                                </div>

                                <div v-else>
                                    <!-- Text on top -->
                                    <div class="card-body">
                                        <p class="card-text">{{ doctor?.about }}</p>
                                        <h6 class="fw-bold mt-3">{{ doctor?.user?.name }} {{ doctor?.user?.last_name }}
                                        </h6>
                                    </div>
                                    <img :src="doctor.user.image ? '/storage/' + doctor.user.image : '/default-image.png'"
                                        class="card-img-top" alt="User" />
                                </div>
                            </div>
                        </SwiperSlide>
                    </Swiper>
                </div>


            </div>
        </section>
        <Joinus />
    </section>
</template>
<script setup>
import Joinus from '../components/joinus.vue';
import { ref, watch, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import axios from "axios";

import { Swiper, SwiperSlide } from 'swiper/vue'
import 'swiper/swiper-bundle.css'

const doctor = ref(null);
const services = ref(null);
const route = useRoute();
const router = useRouter();
const doctors = ref(null);

async function loaddoctor() {
    try {
        axios.get(`/api/doctor/${route.params.id}`).then(({ data }) => {
            doctor.value = data;
        });
    }
    catch (err) { console.error("Failed to load Doctor:", err); }
}


onMounted(async () => {
    try {
        const res = await axios.get(`/api/doctorservice/${route.params.id}`);
        services.value = res.data;

    } catch (error) {
        console.error('Doctor  Serivece APi'.error);

    }
});

onMounted(async () => {
    try {
        const res = await axios.get('/api/GetAllDoctor');
        doctors.value = res.data;

    } catch (error) {
        console.error('Doctor APi'.error);

    }
});

onMounted(() => {
    loaddoctor();
});


</script>
