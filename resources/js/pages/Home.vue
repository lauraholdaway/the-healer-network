<template>
    <section class="hero-section d-flex align-items-center text-center text-white position-relative">
        <div class="container">
            <!-- Heading -->
            <h1 class="display-4 fw-bold my-4 herotaxt mt-5">
                FIND AND BOOK A HOLISTIC <br />
                PRACTITIONER YOU CAN TRUST
            </h1>

            <!-- Buttons -->
            <div class="d-flex justify-content-center gap-3 mb-4">
                <button class="btn btn-light rounded-pill active-hero">Highly Rated ✓</button>
                <button class="btn btn-outline-light rounded-pill">Proven Expertise</button>
                <button class="btn btn-outline-light rounded-pill">Genuine Care</button>
            </div>

            <!-- Subtext -->
            <p class="mb-5 px-lg-5">
                Whether it’s Acupuncture, Reiki, or Hypnotherapy, our thorough vetting process ensures you can
                confidently book the best natural therapy practitioners, both online and locally.
            </p>

            <!-- Search Box -->
            <Searchbox />
            <!-- Scroll Down -->
        </div>
        <br>
        <div class="scroll-down mt-5 position-absolute" style="right:45%;bottom:-7%;">
            <a class="btn btn-light  shadow" href="#below">
                <p class="mt-2">Scroll to discover</p>
                <i class="bi bi-arrow-down"></i>
            </a>

        </div>
    </section>

    <br>
    <section class="container my-md-5 pt-md-5" id="below">
        <h2 class="section-heading">Your Path to Healing</h2>
        <p class="section-subtext">
            THN connects you with certified online therapists, providing the tools and support you need to book therapy
            sessions <br> tailored to your well-being.
        </p>

        <div class="row gy-4">
            <div class="col-md-4">
                <div class="feature-box">
                    <h5 class="feature-title">Trusted Therapists</h5>
                    <p class="feature-content">
                        Our therapists are carefully selected, highly rated, and certified in their respective fields,
                        ensuring that you receive professional and compassionate care from the most skilled providers.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-box" style="background: #C1B39D;">
                    <h5 class="feature-title text-white">Personalized Search</h5>
                    <p class="feature-content text-white">
                        You can search for therapists based on your specific concerns, availability, preferred
                        communication methods, and location. Additionally, you can explore reviews and testimonials from
                        past clients to find the best match for your therapy needs.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-box">
                    <h5 class="feature-title">In-Depth Learning</h5>
                    <p class="feature-content">
                        THN is more than just a therapy booking platform. Our learning hub empowers you with valuable
                        resources and information on mental health practices, helping you understand how therapy can
                        enhance your personal growth and overall well-being.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <Mainslider />
    <br>
    <br>
    <section>
        <div class="container py-5">
            <!-- Title -->
            <h2 class="section-title">Book A Session Revitalize Your Health And Wellbeing</h2>
            <p class="section-subtitle">
                Embark on a transformative journey to rejuvenate your body, mind, and spirit. Whether you’re aiming to
                detox, break free from unhelpful habits, or elevate your overall well-being, we offer tailored sessions
                to support your unique needs and aspirations.
            </p>

            <!-- Button -->
            <div class="text-start mb-4">
                <router-link to="/Alldoctor" class="btn btn-outline-dark btn-outline-custome rounded-pill">View All
                    Practitioners</router-link>
            </div>

            <!-- Cards -->
            <div class="row g-4">
                <!-- Card 1 -->
                <Swiper :slides-per-view="3" :space-between="20" :loop="true" :autoplay="{ delay: 3000 }" :breakpoints="{
                    0: { slidesPerView: 1 },      // Mobile
                    768: { slidesPerView: 2 },    // Tablet
                    1024: { slidesPerView: 3 }    // Desktop
                }" class="mySwiper">
                    <SwiperSlide class="col-md-4 col-12" v-for="doctor in doctors">
                        <div class="card card-custom">
                            <div class="position-relative"
                                style="background: linear-gradient(180deg, rgb(91 76 58 / 41%) 50.9%, #5B4C3A 100%);">
                                <img :src="doctor.user.image ? '/storage/' + doctor.user.image : '/default-image.png'"
                                    class="card-img-top" alt="practitioner">
                                <div class="position-absolute top-0 end-0 p-2">
                                    <svg width="46" height="46" viewBox="0 0 46 46" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect width="46" height="46" rx="23" fill="#5B4C3A" />
                                        <path
                                            d="M17.168 29.849C17.4155 29.0252 17.9219 28.3032 18.6122 27.79C19.3025 27.2768 20.1398 26.9997 21 27H25C25.8612 26.9997 26.6996 27.2774 27.3904 27.7918C28.0811 28.3062 28.5874 29.0298 28.834 29.855M14 23C14 24.1819 14.2328 25.3522 14.6851 26.4442C15.1374 27.5361 15.8003 28.5282 16.636 29.364C17.4718 30.1997 18.4639 30.8626 19.5558 31.3149C20.6478 31.7672 21.8181 32 23 32C24.1819 32 25.3522 31.7672 26.4442 31.3149C27.5361 30.8626 28.5282 30.1997 29.364 29.364C30.1997 28.5282 30.8626 27.5361 31.3149 26.4442C31.7672 25.3522 32 24.1819 32 23C32 21.8181 31.7672 20.6478 31.3149 19.5558C30.8626 18.4639 30.1997 17.4718 29.364 16.636C28.5282 15.8003 27.5361 15.1374 26.4442 14.6851C25.3522 14.2328 24.1819 14 23 14C21.8181 14 20.6478 14.2328 19.5558 14.6851C18.4639 15.1374 17.4718 15.8003 16.636 16.636C15.8003 17.4718 15.1374 18.4639 14.6851 19.5558C14.2328 20.6478 14 21.8181 14 23ZM20 21C20 21.7956 20.3161 22.5587 20.8787 23.1213C21.4413 23.6839 22.2044 24 23 24C23.7956 24 24.5587 23.6839 25.1213 23.1213C25.6839 22.5587 26 21.7956 26 21C26 20.2044 25.6839 19.4413 25.1213 18.8787C24.5587 18.3161 23.7956 18 23 18C22.2044 18 21.4413 18.3161 20.8787 18.8787C20.3161 19.4413 20 20.2044 20 21Z"
                                            stroke="#FBF9F7" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="position-absolute  bottom-0 mb-3" style="left: 20%;">
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
                            <div class="card-body">

                                <div class="d-flex justify-content-between my-3">
                                    <p class="docter-type px-3 py-1">Meditation</p>
                                    <p class="price">${{ doctor?.price }}</p>
                                </div>
                                <h5 class="card-title fw-bold">{{ doctor.user?.name }} {{ doctor.user?.last_name }}</h5>
                                <p class="card-text">{{ doctor.about }} <a href="#" class="m-color">See more</a></p>
                                <router-link :to="`/booksession/${doctor.user.id}`" class="btn btn-book">
                                    Book Session Now
                                    →</router-link>
                            </div>
                        </div>
                    </SwiperSlide>
                </Swiper>
            </div>
        </div>

        <br>
    </section>

    <Joinus />

    <br>
    <br>
    <section style="background: #fdfaf7;">
        <div class="container py-5 mt-md-5">
            <div class="d-flex justify-content-between align-items-center ">
                <div>
                    <small class="section-sub m-color">Our Blogs</small>
                    <h1 class="section-title m-color fw-bold">Latest Blog And Reads</h1>
                </div>
                <a href="#" class="btn-view btn btn-info border-0" style="background-color: #DED1BA;">View All Reads
                    →</a>
            </div>

            <div class="row g-4">
                <!-- Blog Card 1 -->
                <div class="col-md-4">
                    <div class="card card-custom" style="background-color: #DED1BA;">
                        <img src="/public/asset/images/blog.png" class="card-img-top" alt="Reiki">
                        <div class="card-body">
                            <div class="whitedark">
                                <span class="tag">10 mins read</span>
                                <span class="">T/N</span>
                            </div>
                            <h5 class="card-title">Reiki for Chakra Balancing</h5>
                            <p class="card-text">Explore the transformative effects of Reiki in balancing your chakras.
                                Discover how this powerful technique can restore harmony...</p>
                            <a href="#" class="btn-read btn btn-info border-0"
                                style="background-color: #5B4C3A;color:white;">Read More</a>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>

</template>
<script setup>
import Joinus from '../components/joinus.vue';
import Mainslider from '../components/Mainslider.vue'
import Searchbox from '../components/Searchbox.vue';
import { ref, onMounted, computed } from "vue";
import axios from "axios";
import { Swiper, SwiperSlide } from 'swiper/vue'
import 'swiper/swiper-bundle.css'

const doctors = ref(null);
onMounted(async () => {
    try {
        const res = await axios.get('/api/GetAllDoctor');
        doctors.value = res.data;

    } catch (error) {
        console.error('Doctor APi'.error);

    }
});
</script>
