<template>
    <section
        class="hero-section d-flex align-items-center justify-content-center text-center text-white position-relative">
        <div class="container">
            <!-- Heading -->
            <h1 class="display-4 fw-bold my-2 text-[#A0704C] herotaxt mt-0 pt-11">
                BOOK A HOLISTIC HEALER <br /> THAT YOU LOVE
            </h1>

            <!-- Buttons -->
            <!-- <div class="d-flex justify-content-center gap-3 mb-4 heroButtons">
                <button class="btn btn-outline-light rounded-pill px-4">Highly Rated</button>
                <button class="btn btn-outline-light rounded-pill px-4">Proven Expertise</button>
                <button class="btn btn-outline-light rounded-pill px-4">Genuine Care</button>
            </div> -->

            <!-- Subtext -->
            <p class="mb-5 px-lg-5 hero-subtext">
                Whether it's Acupuncture, Reiki, Hypnotherapy or Counselling we'll help you find the best natural <br>
                therapy healer thats right for you.
            </p>

            <!-- Search Box -->
            <Searchbox />
        </div>




        <!-- Scroll Down -->
        <div class="scroll-down position-absolute" style="bottom:20px; left: 50%; transform: translateX(-50%);">
            <a class="btn btn-light shadow" href="#below">
                <p class="mt-2 color-black">Scroll to discover</p>
                <img :src="Barrow" alt="icon" class="ms-1"
                    style="width: 18px; height: 18px; position: relative; top: -6px;">
            </a>
        </div>


    </section>


    <!-- Hero Section 2 -->
    <section class="hero-section-2 d-flex align-items-center justify-content-center text-center">

    </section>



    <section class="container my-md-5  pt-md--10" id="below">
        <h2 class="section-heading">Your Path to Healing</h2>
        <p class="section-subtext">
            The Healer Network connects you with certified online therapists, providing the tools and support you need
            to book <br>
            therapy sessions tailored to your well-being.
        </p>

        <div class="row gy-1">
            <div class="col-md-4">
                <div
                    class="feature-box position-relative text-center d-flex flex-column justify-content-center align-items-center">
                    <img :src="cardicon" alt="card icon" class="position-absolute"
                        style="width: 180px; height: 180px; bottom: 0; left: 0;">
                    <div class="position-relative" style="z-index: 2;">
                        <h5 class="feature-title">Trusted Healers</h5>
                        <p class="feature-content">
                            Every healer is carefully verified for experience, professionalism, and genuine care.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-box position-relative text-center d-flex flex-column justify-content-center align-items-center"
                    style="background: #C1B39D; overflow: hidden;">
                    <img :src="cardicon2" alt="card icon" class="position-absolute"
                        style="width: 180px; height: 180px; bottom: -20px; right: 0;">
                    <div class="position-relative" style="z-index: 2;">
                        <h5 class="feature-title text-white ">Personalised Search</h5>
                        <p class="feature-content text-white " style="font-size: 14px;">
                            Find healers who align with your goals and preferred healing methods.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div
                    class="feature-box position-relative text-center d-flex flex-column justify-content-center align-items-center">
                    <img :src="cardicon3" alt="card icon" class="position-absolute"
                        style="width: 180px; height: 180px; bottom: 0; left: 50%; transform: translateX(-50%);">
                    <div class="position-relative" style="z-index: 2;">
                        <h5 class="feature-title">Monthly Membership'</h5>
                        <p class="feature-content">
                            Gain access to exclusive resources and monthly healing ceremonies designed to support your
                            ongoing wellbeing.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <Mainslider />

    <br>

    <section>
        <div class="container py-1">
            <!-- Title -->
            <h2 class="section-title">Book a Session</h2>
            <p class="section-subtitle" style="font-size: 13px; color:#5B4C3A; font-weight: 400;">
                Embark on your journey to improved wellbeing and inner peace.
            </p>

            <!-- Button and Navigation -->
            <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
                <div class="text-start">
                    <router-link to="/Alldoctor" class="btn btn-outline-dark btn-outline-custome rounded-pill">
                        View All Healar
                    </router-link>
                </div>
                <div class="d-flex gap-2">
                    <!-- Left Arrow Button -->
                    <button ref="prevEl"
                        class="btn btn-arrow-left rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 30px; height: 30px; background-color: transparent; border: none;">
                        <img src="/public/asset/images/arrowlift.svg" alt="Previous" class="arrow-icon"
                            style="width: 32px; height: 32px;">
                    </button>
                    <!-- Right Arrow Button -->
                    <button @click="swiperNext"
                        class="btn btn-arrow-right rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 30px; height: 30px; background-color: transparent; border: none;">
                        <img src="/public/asset/images/arrowright.svg" alt="Next" class="arrow-icon"
                            style="width: 32px; height: 32px;">
                    </button>
                </div>
            </div>

            <!-- Cards -->
            <div class="row g-4 px-3 px-md-0 py-3 py-md-0 ">
                <Swiper ref="swiperRef" :slides-per-view="3" :space-between="20" :loop="true" :navigation="{
                    nextEl: nextBtn,
                    prevEl: prevBtn,
                }" :autoplay="{ delay: 3000 }" :breakpoints="{
                    0: { slidesPerView: 1 },      // Mobile
                    768: { slidesPerView: 2 },    // Tablet
                    1024: { slidesPerView: 3 }    // Desktop
                }" class="mySwiper">

                    <SwiperSlide class="col-md-4 col-12" v-for="(doctor, index) in doctors" :key="index">
                        <div class="card card-custom">
                            <div class="position-relative d-flex justify-content-center card-image-wrapper">
                                <img :src="doctor?.user?.image ? '/storage/' + doctor.user.image : '/default-image.png'"
                                    class="card-img-top card-image" alt="practitioner">

                                <div class="position-absolute top-0 end-0 p-2">
                                    <router-link :to="`/docter/${doctor.user.id}`">
                                        <svg width="46" height="46" viewBox="0 0 46 46" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="46" height="46" rx="23" fill="#5B4C3A" />
                                            <path
                                                d="M17.168 29.849C17.4155 29.0252 17.9219 28.3032 18.6122 27.79C19.3025 27.2768 20.1398 26.9997 21 27H25C25.8612 26.9997 26.6996 27.2774 27.3904 27.7918C28.0811 28.3062 28.5874 29.0298 28.834 29.855M14 23C14 24.1819 14.2328 25.3522 14.6851 26.4442C15.1374 27.5361 15.8003 28.5282 16.636 29.364C17.4718 30.1997 18.4639 30.8626 19.5558 31.3149C20.6478 31.7672 21.8181 32 23 32C24.1819 32 25.3522 31.7672 26.4442 31.3149C27.5361 30.8626 28.5282 30.1997 29.364 29.364C30.1997 28.5282 30.8626 27.5361 31.3149 26.4442C31.7672 25.3522 32 24.1819 32 23C32 21.8181 31.7672 20.6478 31.3149 19.5558C30.8626 18.4639 30.1997 17.4718 29.364 16.636C28.5282 15.8003 27.5361 15.1374 26.4442 14.6851C25.3522 14.2328 24.1819 14 23 14C21.8181 14 20.6478 14.2328 19.5558 14.6851C18.4639 15.1374 17.4718 15.8003 16.636 16.636C15.8003 17.4718 15.1374 18.4639 14.6851 19.5558C14.2328 20.6478 14 21.8181 14 23ZM20 21C20 21.7956 20.3161 22.5587 20.8787 23.1213C21.4413 23.6839 22.2044 24 23 24C23.7956 24 24.5587 23.6839 25.1213 23.1213C25.6839 22.5587 26 21.7956 26 21C26 20.2044 25.6839 19.4413 25.1213 18.8787C24.5587 18.3161 23.7956 18 23 18C22.2044 18 21.4413 18.3161 20.8787 18.8787C20.3161 19.4413 20 20.2044 20 21Z"
                                                stroke="#FBF9F7" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </router-link>
                                </div>

                                <div class="position-absolute bottom-0 mb-3" style="left: 20%;">
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
                                            <span class="tagb">Online</span>
                                        </div>
                                        <div>
                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect width="32" height="32" rx="16" fill="#DED1BA" />
                                                <path
                                                    d="M18.7222 16H16V12.1111M9 16C9 16.9193 9.18106 17.8295 9.53284 18.6788C9.88463 19.5281 10.4002 20.2997 11.0503 20.9497C11.7003 21.5998 12.4719 22.1154 13.3212 22.4672C14.1705 22.8189 15.0807 23 16 23C16.9193 23 17.8295 22.8189 18.6788 22.4672C19.5281 22.1154 20.2997 21.5998 20.9497 20.9497C21.5998 20.2997 22.1154 19.5281 22.4672 18.6788C22.8189 17.8295 23 16.9193 23 16C23 15.0807 22.8189 14.1705 22.4672 13.3212C22.1154 12.4719 21.5998 11.7003 20.9497 11.0503C20.2997 10.4002 19.5281 9.88463 18.6788 9.53284C17.8295 9.18106 16.9193 9 16 9C15.0807 9 14.1705 9.18106 13.3212 9.53284C12.4719 9.88463 11.7003 10.4002 11.0503 11.0503C10.4002 11.7003 9.88463 12.4719 9.53284 13.3212C9.18106 14.1705 9 15.0807 9 16Z"
                                                    stroke="#2E2D29" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            <span class="tagb">30 Minutes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body" style="display: flex; flex-direction: column; flex-grow: 1;">
                                <div class="d-flex justify-content-between my-3">
                                    <div class="d-flex">
                                        <p class="docter-type px-3 py-1 ms-1"
                                            v-for="(s, index) in doctor.modalities.slice(0, 2)" :key="index">
                                            {{ s?.title }}
                                        </p>
                                    </div>
                                    <p class="price">${{ doctor?.price }}</p>
                                </div>

                                <h5 class="card-title fw-bold" style="font-size: 24px;  font-weight: 600;">{{
                                    doctor.user?.name }} {{ doctor.user?.last_name }}</h5>
                                <p class="card-text doctor-card-summary" :class="{ 'expanded': showFull[index] }">
                                    <span>
                                        {{ truncatedSummary(doctor.about, index) }}
                                        <span v-if="isSummaryTruncated(doctor.about, index)">...</span>
                                    </span>
                                    <a href="#"
                                        class="m-color doctor-card-toggle ms-2"
                                        @click.prevent="toggleText(index)">
                                        {{ showFull[index] ? 'See less' : 'See more' }}
                                    </a>
                                </p>

                                <router-link :to="`/booksession/${doctor.user.id}`" class="btn btn-book"
                                    style="width: 200px; align-self: flex-start;">
                                    Book Session Now
                                    <span style="margin-left: 8px;">
                                        <svg width="14" height="14" viewBox="0 0 20 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.5 1.5L19 9L11.5 1.5ZM19 9L11.5 16.5L19 9ZM19 9L1 9L19 9Z"
                                                fill="#2E2D29" />
                                            <path d="M11.5 1.5L19 9M19 9L11.5 16.5M19 9L1 9" stroke="#2E2D29"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </router-link>
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

    <section>
        <div class="container py-5 blog-container mt-md-5 px-4 px-md-0">
            <div class="blog-header d-flex justify-content-between align-items-center">
                <div class="blog-header-text">
                    <small class="section-sub " style="font-family: 'Cormorant Garamond', serif; color: #8A7356;">Our
                        Blogs</small>
                    <h1 class="blog-section-title  "
                        style="font-size: 40px; font-family: 'Courier New', Courier, monospace; color:#5B4C3A;">Latest
                        Blog And Reads</h1>
                </div>
                <router-link to="/Allblog" class="btn-view btn btn-info border-0" style="border-radius: 12px;">
                    View All Reads
                    <svg width="14" height="14" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.5 1.5L19 9L11.5 1.5ZM19 9L11.5 16.5L19 9ZM19 9L1 9L19 9Z" fill="#2E2D29" />
                        <path d="M11.5 1.5L19 9M19 9L11.5 16.5M19 9L1 9" stroke="#2E2D29" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </router-link>
            </div>

            <div class="row g-4 mt-3">
                <Swiper ref="swiperRef2" :slides-per-view="3" :space-between="20" :loop="true"
                    :autoplay="{ delay: 3000 }" :breakpoints="{
                        0: { slidesPerView: 1 },      // Mobile
                        768: { slidesPerView: 2 },    // Tablet
                        1024: { slidesPerView: 3 }    // Desktop
                    }" class="mySwiper">

                    <!-- Blog Card -->
                    <SwiperSlide class="col-lg-4 col-md-6 col-sm-12" v-for="(blog, index) in blogs" :key="blog.id">
                        <div class="blog-card">
                            <img :src="blog?.image ? '/storage/' + blog.image : '/default-image.png'"
                                class="blog-card-img" alt="Reiki">

                            <div class="blog-card-body">
                                <div class="whitedark w-100">
                                    <span class="tag">{{ blog.time }} read</span>
                                    <span class="thn-text">THN</span>
                                </div>

                                <h6 class="blog-card-title">{{ limitWords(blog.title, 5) }}</h6>
                                <div class="blog-card-text" v-html="limitWords(stripHtml(blog.description), 8)"></div>

                                <div class="blog-card-footer">
                                    <a href="#" class="blog-membership-btn">
                                        {{ blog.subscription }}
                                    </a>
                                    <router-link :to="`/blog/${blog.id}`" class="blog-read-more">Read More</router-link>
                                </div>
                            </div>
                        </div>
                    </SwiperSlide>
                </Swiper>
            </div>
        </div>
    </section>
</template>

<script setup>
import Joinus from '../components/joinus.vue';
import Mainslider from '../components/Mainslider.vue';
import Searchbox from '../components/Searchbox.vue';
import { ref, onMounted, computed } from "vue";
import axios from "axios";
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/swiper-bundle.css';
import Barrow from '/public/asset/images/Barrow.svg';
import cardicon from '/public/asset/images/cardicon.svg';
import cardicon2 from '/public/asset/images/cardicon2.svg';
import cardicon3 from '/public/asset/images/cardicon3.svg';
import { reactive } from 'vue'

const doctors = ref(null);
const swiperRef = ref(null);
const swiperRef2 = ref(null);
const blogs = ref(null);
const nextBtn = ref(null)
const prevBtn = ref(null)
// Function to get doctor image based on index




// Swiper navigation functions
const swiperNext = () => {
    if (swiperRef.value && swiperRef.value.$el) {
        swiperRef.value.$el.swiper.slideNext();
    }
};

const swiperPrev = () => {
    if (swiperRef.value && swiperRef.value.$el) {
        swiperRef.value.$el.swiper.slidePrev();
    }
};

onMounted(async () => {
    try {
        const res = await axios.get('/api/GetAllDoctor');
        doctors.value = res.data;
    } catch (error) {
        console.error('Doctor API', error);
    }
});

onMounted(async () => {
    try {
        const res = await axios.get('/api/blogs');
        blogs.value = res.data;
    } catch (error) {
        console.error('Blogs API', error);
    }
});
function stripHtml(html) {
    // Remove all HTML tags and extra spaces
    return html ? html.replace(/<[^>]*>/g, '').trim() : '';
}


const showFull = reactive([])

function toggleText(index) {
    // initialize the index if undefined
    if (showFull[index] === undefined) {
        showFull[index] = false
    }

    showFull[index] = !showFull[index]
    // alert(`Toggled doctor ${index}, showFull = ${showFull[index]}`) // for testing
}
function limitWords(text, count) {
    const words = text.split(' ')
    return words.length > count ? words.slice(0, count).join(' ') + '...' : text
}

const maxSummaryLength = 40

const truncatedSummary = (text, index) => {
    if (!text) return '-'
    if (showFull[index]) {
        return text
    }
    return text.length > maxSummaryLength ? text.substring(0, maxSummaryLength) : text
}

const isSummaryTruncated = (text, index) => {
    if (!text) return false
    return !showFull[index] && text.length > maxSummaryLength
}
</script>

<style scoped>
.btn-arrow-left:hover,
.btn-arrow-right:hover {
    background-color: #5B4C3A !important;
    transition: background-color 0.3s ease;
}

.btn-arrow-left:hover .arrow-icon,
.btn-arrow-right:hover .arrow-icon {
    filter: brightness(0) invert(1);
    transition: filter 0.3s ease;
}

.card-image-wrapper {
    background: linear-gradient(180deg, #c4b39a 0%, rgba(91, 76, 58, 0.41) 100%);
    border-radius: 20px;
    overflow: hidden;
    display: block !important;
    width: 100%;
    height: 280px;
}

.card-image-wrapper .card-image {
    width: 100%;
    height: 100%;
    display: block;
    border-radius: 0;
    object-fit: cover;
    object-position: center;
}

.doctor-card-summary {
    color: #5B4C3A;
    font-size: 0.9rem;
    line-height: 1.4;
    margin-bottom: 10px;
    margin: 0;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: normal;
}

.doctor-card-summary.expanded {
    display: block;
    -webkit-line-clamp: unset;
    line-clamp: unset;
    overflow: visible;
    text-overflow: initial;
}

/* Blog Cards Styles */
.blog-card {
    background-color: #DED1BA;
    border: none;
    border-radius: 20px;
    height: 450px;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.blog-card-img {
    height: 240px;
    width: 95%;
    object-fit: cover;
    border-radius: 20px;
    margin: 10px auto;
    display: block;
}

.blog-card-body {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    padding: 0 20px 20px;
}

.blog-card-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 24px;
    font-weight: 500;
    color: #5B4C3A;
    margin-bottom: 15px;
    margin-top: 10px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.blog-card-text {
    font-family: 'Cormorant Garamond', serif;
    color: #5B4C3A;
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 20px;
    flex-grow: 1;
}

.blog-card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: auto;
}

.blog-membership-btn {
    background-color: #F5F0E8;
    color: #5B4C3A;
    border-radius: 10px;
    padding: 8px 20px;
    font-size: 12px;
    text-decoration: none;
    font-family: 'Cormorant Garamond', serif;
    transition: background-color 0.3s ease;
}

.blog-membership-btn:hover {
    background-color: #5B4C3A;
    color: #F5F0E8;
}

.blog-read-more {
    color: #5B4C3A;
    text-decoration: none;
    font-family: 'Cormorant Garamond', serif;
    font-weight: 500;
    transition: color 0.3s ease;
}

.blog-read-more:hover {
    color: #3d2f1f;
    text-decoration: underline;
}



.thn-text {
    font-size: 10px;

    font-weight: 400;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Blog Section Header Responsive */
.blog-container {
    padding: 50px 0px;
}

.blog-header {
    margin-bottom: 20px;
}

.blog-section-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 32px;
}

.btn-view {
    background-color: #DED1BA;
    font-size: 12px;
    padding: 12px 18px;
    font-family: 'Cormorant Garamond', serif;
    display: flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
    transition: background-color 0.3s ease;
}

.btn-view:hover {
    background-color: #c4b39a;
}

/* Responsive Design for Blog Cards */
/* Large Tablets */
@media (max-width: 1024px) {
    .blog-section-title {
        font-size: 28px;
    }

    .blog-card {
        height: 420px;
    }

    .blog-card-title {
        font-size: 22px;
    }

    .blog-card-text {
        font-size: 13px;
    }

    .blog-card-img {
        height: 10px;
    }
}

/* Tablets */
@media (max-width: 768px) {
    .blog-header {
        flex-direction: column;
        align-items: flex-start !important;
        gap: 15px;
    }

    .blog-section-title {
        font-size: 26px;
    }

    .btn-view {
        font-size: 11px;
        padding: 10px 16px;
        align-self: flex-start;
    }

    .blog-card {
        height: 400px;
    }

    .blog-card-title {
        font-size: 20px;
        margin-bottom: 12px;
    }

    .blog-card-text {
        font-size: 13px;
        line-height: 1.5;
        margin-bottom: 15px;
    }

    .blog-card-img {
        height: 170px;
    }

    .blog-membership-btn {
        font-size: 11px;
        padding: 7px 16px;
    }

    .blog-read-more {
        font-size: 13px;
    }
}

/* Mobile Devices */
@media (max-width: 576px) {
    .blog-header {
        margin-bottom: 15px;
    }

    .blog-section-title {
        font-size: 22px;
    }

    .btn-view {
        font-size: 10px;
        padding: 8px 14px;
        gap: 5px;
    }

    .btn-view svg {
        width: 12px;
        height: 12px;
    }

    .blog-card {
        height: auto;
        min-height: 380px;
        margin-bottom: 20px;
    }

    .blog-card-img {
        height: 160px;
        width: 90%;
    }

    .blog-card-body {
        padding: 0 15px 15px;
    }

    .blog-card-title {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .blog-card-text {
        font-size: 12px;
        line-height: 1.4;
        margin-bottom: 12px;
    }

    .blog-card-footer {
        flex-direction: column;
        gap: 10px;
        align-items: stretch;
    }

    .blog-membership-btn {
        font-size: 11px;
        padding: 8px 16px;
        text-align: center;
    }

    .blog-read-more {
        font-size: 12px;
        text-align: center;
    }
}

/* Extra Small Devices */
@media (max-width: 380px) {
    .blog-section-title {
        font-size: 18px;
    }

    .btn-view {
        font-size: 9px;
        padding: 6px 12px;
        gap: 4px;
    }

    .btn-view svg {
        width: 10px;
        height: 10px;
    }

    .blog-card {
        min-height: 360px;
    }

    .blog-card-img {
        height: 140px;
    }

    .blog-card-title {
        font-size: 16px;
    }

    .blog-card-text {
        font-size: 11px;
    }

    .blog-membership-btn {
        font-size: 10px;
        padding: 6px 12px;
    }

    .blog-read-more {
        font-size: 11px;
    }
}
</style>
