<template>
    <br>

    <section class="my-3 my-md-5">
        <div class="split-section d-flex flex-wrap align-items-center">
            <!-- Left Section -->
            <div class="left-section col-12 col-md-6 p-3 p-md-4">
                <div class="ms-md-5 ps-md-5">
                    <div class="heading-title fw-bold">
                        {{ slides[currentIndex].title }}
                    </div>
                    <div class="heading-text mb-3 mb-md-4">
                        {{ slides[currentIndex].text }}
                    </div>

                    <div class="row g-2 g-md-3">
                        <div class="col-3 col-md-4">
                            <div class="counter-wrapper">
                                <div class="counter-top">
                                    {{ String(currentIndex + 1).padStart(2, '0') }}
                                </div>
                                <div class="counter-line"></div>
                                <div class="counter-bottom">
                                    {{ String(slides.length).padStart(2, '0') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-9 col-md-8">
                            <div class="therapy-box">
                                <h6>{{ slides[currentIndex].heading }}</h6>
                                <p>{{ slides[currentIndex].description }}</p>

                                <div class="therapy-nav mt-1">
                                    <span @click="prevSlide" class="me-2 me-md-3 nav-arrow">
                                        <img :src="'/asset/images/arrowlift.svg'" alt="Previous" />
                                    </span>
                                    <span @click="nextSlide" class="nav-arrow">
                                        <img :src="'/asset/images/arrowright.svg'" alt="Next" />
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Book Now button for mobile -->
                    <div class="d-md-none text-center mt-3">
                        <button class="book-btn">Book Now
                            <svg width="14" height="14" viewBox="0 0 20 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.5 1.5L19 9L11.5 1.5ZM19 9L11.5 16.5L19 9ZM19 9L1 9L19 9Z" fill="#2E2D29" />
                                <path d="M11.5 1.5L19 9M19 9L11.5 16.5M19 9L1 9" stroke="#2E2D29" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Section -->
            <div class="right-section col-md-6 d-none d-md-block">
                <img :src="slides[currentIndex].image" class="img-fluid" :alt="slides[currentIndex].heading"
                    style="object-fit: cover;" />
                <router-link class="book-btn text-dark text-decoration-none" to="Alldoctor">Book Now
                    <svg width="14" height="14" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.5 1.5L19 9L11.5 1.5ZM19 9L11.5 16.5L19 9ZM19 9L1 9L19 9Z" fill="#2E2D29" />
                        <path d="M11.5 1.5L19 9M19 9L11.5 16.5M19 9L1 9" stroke="#2E2D29" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </router-link>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue'

const currentIndex = ref(0)

const slides = [
    {
        title: 'Discover the holistic therapy that is right for you',
        text: "THN's practitioners provide expertise across a wide range of holistic modalities going beyond just the physical body to cover all aspects of health, well-being and self-development.",
        heading: 'Energy Therapy',
        description: 'Explore transformative modalities like Reiki, Kinesiology, and more to restore harmony and balance to your body\'s energy systems.',
        image: '/asset/images/slider1.jpg'
    },
    {
        title: 'Discover the holistic therapy that is right for you',
        text: 'THNs practitioners provide expertise across a wide range of holistic modalities going beyond just the physical body to cover all aspects of health, well-being and self-development.',
        heading: 'Holistic Self-Care',
        description: 'Nurture yourself and those around you with a holistic approach to life through practices like Mindfulness and Holistic Nutrition, promoting overall health and well-being.',
        image: '/asset/images/slider2.jpg'
    },
    {
        title: 'Discover the holistic therapy that is right for you',
        text: 'THNs practitioners provide expertise across a wide range of holistic modalities going beyond just the physical body to cover all aspects of health, well-being and self-development.',
        heading: 'Natural Healing',
        description: 'Harness the power of nature to support your body’s self-healing abilities with practices such as Naturopathy, Ayurveda, and Herbal Medicine.',
        image: '/asset/images/slider3.jpg'
    },
    {
        title: 'Discover the holistic therapy that is right for you',
        text: 'THNs practitioners provide expertise across a wide range of holistic modalities going beyond just the physical body to cover all aspects of health, well-being and self-development.',
        heading: 'Emotional & Mental Support',
        description: 'Boost your emotional and mental well-being with guidance from experts in holistic coaching, hypnotherapy, and NLP (Neuro-Linguistic Programming).',
        image: '/asset/images/slider4.jpg'
    },
    {
        title: 'Discover the holistic therapy that is right for you',
        text: 'THNs practitioners provide expertise across a wide range of holistic modalities going beyond just the physical body to cover all aspects of health, well-being and self-development.',
        heading: 'Fertility & Pregnancy Support',
        description: 'Discover supportive therapies for your fertility and pregnancy journey with methods like Acupuncture, Hypnobirthing, or personalized Doula services.',
        image: '/asset/images/slider5.jpg'
    },
    {
        title: 'Discover the holistic therapy that is right for you',
        text: 'THNs practitioners provide expertise across a wide range of holistic modalities going beyond just the physical body to cover all aspects of health, well-being and self-development.',
        heading: 'Spiritual Growth',
        description: 'Explore spiritual practices that deepen your understanding of yourself, your connections with others, and the world around you through modalities like Past Life Regression or Timeline Therapy.',
        image: '/asset/images/slider6.jpg'
    }
]

function prevSlide() {
    currentIndex.value = (currentIndex.value - 1 + slides.length) % slides.length
}

function nextSlide() {
    currentIndex.value = (currentIndex.value + 1) % slides.length
}
</script>

<style scoped>
.nav-arrow {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0px;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.nav-arrow:hover {
    background-color: #5B4C3A;
    border-radius: 100%;
}

.nav-arrow:hover img {
    filter: brightness(0) invert(1);
}
</style>
