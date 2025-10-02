<template>
    <br>
    <br>
    <section class="my-5">
        <div class="split-section d-flex flex-wrap align-items-center">
            <!-- Left Section -->
            <div class="left-section col-md-6 p-4 ">
                <div class="ms-5 ps-md-5">
                    <div class="heading-title fw-bold">
                        {{ slides[currentIndex].title }}
                    </div>
                    <div class="heading-text mb-4">
                        {{ slides[currentIndex].text }}
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-4">
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
                        <div class="col-md-8 col-7">
                            <div class="therapy-box">
                                <h6>{{ slides[currentIndex].heading }}</h6>
                                <p>{{ slides[currentIndex].description }}</p>

                                <br>
                                <div class="therapy-nav mt-5">
                                    <span @click="prevSlide" class="me-3 nav-arrow">&larr;</span>
                                    <span @click="nextSlide" class="nav-arrow">&rarr;</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section -->

            <div class="right-section">
                <!-- Replace with your uploaded image URL -->
                <img :src="slides[currentIndex].image" class="img-fluid" :alt="slides[currentIndex].heading"
                    style="object-fit: cover;" />
                <button class="book-btn">Book Now →</button>
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
        text: "THN’s practitioners provide expertise across a wide range of holistic modalities going beyond just the physical body to cover all aspects of health, well-being and self-development.",
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
